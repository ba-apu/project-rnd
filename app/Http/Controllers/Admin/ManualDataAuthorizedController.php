<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\IndicatorTarget;
use App\Operations;
use App\UserRoleMapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ManualData;
use App\MongoModel;
use App\Project;
use App\Indicator;
use Auth;
use MongoDB;
use BSON;
use UTCDateTime;
use DateTime;
use ISODate;
use MongoDate;

class ManualDataAuthorizedController extends Controller
{
    public function index(Request $request)
    {
//        $owner = Common::get_own_project();
        $owner = UserRoleMapping::where('user_id',Auth::user()->id)->where('has_approve_permission',1)->pluck('project_id');
        $query = Project::where('status', 1);
        if(Auth::user()->role != 1 && Auth::user()->role != 5 ){
            $query->whereIn('id', $owner);
        }
        $projects = $query->pluck('name', 'id');
        $project_id = isset($request->project_id) ? $request->project_id : -1;
        isset($request->n_id) ? update_notification_data($request->n_id) : '';
        $ManualDatas = ManualData::get();
        return view('admin.manualDataAuthorized.index', compact('projects', 'ManualDatas', 'project_id'));
    }

    public function get_manual_data(Request $request)
    {
        ini_set('memory_limit', '-1');

        $manualDatas = ManualData::where('project_id', $request->project_id)
            ->where('is_view', 0)
            ->where('is_authorized', 0)->get();

        return view('admin.manualDataAuthorized.manual_data_show', compact('manualDatas'));
    }

    public function manual_data_approve(Request $request)
    {
        $manual_details = ManualData::where('id', $request->manual_data_id)->first();
        $data_date = $manual_details->date;
        $date = date('Y-m-t',strtotime($data_date));
        $year = date('Y', strtotime($manual_details->date));
        $month = date('m', strtotime($manual_details->date));
        $project_details = Project::where('id', $manual_details->project_id)->first();

        $mongo_data_existing = MongoModel::setCollection($project_details->reference_table_name)
            ->where('indicator_id', (int)$manual_details->indicator_id)
            ->where('date',mongoFormattedDate($date))
            ->first();

        if (!empty($mongo_data_existing)) {
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->find($mongo_data_existing->id);
        } else {
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name);
        }

        $mongo_data->date = new MongoDB\BSON\UTCDateTime((new DateTime($data_date))->getTimestamp() * 1000);
        $mongo_data->indicator_id = (int)$manual_details->indicator_id;
        $mongo_data->date_hash = md5($mongo_data->date);
        $mongo_data->summary = $manual_details->data_value;

        $previous_date_data = MongoModel::setCollection($project_details->reference_table_name)
            ->where('indicator_id', (int)$manual_details->indicator_id)
            ->where('date', '<', mongoFormattedDate($date))
            ->orderBy('date', 'desc')->limit(1)
            ->first(['date', 'summary']);

        $previous_date_summary = 0;
        $summary_daily = 0;
        if($previous_date_data){
            $previous_date_summary = $previous_date_data->summary;
            $summary_daily = ($manual_details->data_value - $previous_date_data->summary);
        }

        if($previous_date_summary > $manual_details->data_value){
            return "Data should be cumulative & can not be smaller";
        }

        $mongo_data->summary_daily = $summary_daily;

        $mongo_data->type = 'manual';
        $mongo_data->save();

        $target_data = IndicatorTarget::firstOrNew([
            'project_id' => $manual_details->project_id,
            'indicator_id' => (int)$manual_details->indicator_id,
            'year' => (int)$year,
            'month' => (int)$month,
        ]);

        $target_data->project_id = $manual_details->project_id;
        $target_data->indicator_id = $manual_details->indicator_id;
        $target_data->year = (int)$year;
        $target_data->month = (int)$month;
        $target_data->target_data = $manual_details->target_value;
        $target_data->save();

        $operation_data_check = Operations::where('project_id', $manual_details->project_id)
            ->where('date', $date)->exists();

        if(!$operation_data_check){
            $operation = new Operations();
            $operation->project_id = $manual_details->project_id;
            $operation->date = $date;
            $operation->to_mysql = 1;
            $operation->to_mongo = 1;

            $operation->save();
        }

        $user = Auth::user();

        $data = ManualData::find($request->manual_data_id);
        $data->is_authorized = 1;
        $data->is_view = 1;
        $data->updated_by = $user->id;
        $data->authorized_by = $user->id;
        $data->save();
        return "Data Approved Successfully";
    }

    public function approve_all_manual_data(Request $request)
    {
        $d = $request->man_id;

        if (!empty($d)) {
            foreach ($d as $id_man) {
                $manual_details = ManualData::where('id', $id_man)->first();
                $data_date = $manual_details->date;
                $date = date('Y-m-t',strtotime($data_date));
                $year = date('Y', strtotime($manual_details->date));
                $month = date('m', strtotime($manual_details->date));
                $project_details = Project::where('id', $manual_details->project_id)->first();

                $previous_date_summary = 0;
                $summary_daily = 0;
                $previous_date_data = MongoModel::setCollection($project_details->reference_table_name)
                    ->where('indicator_id', (int)$manual_details->indicator_id)
                    ->where('date', '<', mongoFormattedDate($date))
                    ->orderBy('date', 'desc')->limit(1)
                    ->first(['date', 'summary']);

                if($previous_date_data){
                    $previous_date_summary = $previous_date_data->summary;
                    $summary_daily = ($manual_details->data_value - $previous_date_data->summary);
                }

                if($previous_date_summary < $manual_details->data_value){

                    $mongo_data_existing = MongoModel::setCollection($project_details->reference_table_name)
                        ->where('indicator_id', (int)$manual_details->indicator_id)
                        ->where('date',mongoFormattedDate($date))
                        ->first();

                    if (!empty($mongo_data_existing)) {
                        $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->find($mongo_data_existing->id);
                    } else {
                        $mongo_data = MongoModel::setCollection($project_details->reference_table_name);
                    }

                    $mongo_data->date = new MongoDB\BSON\UTCDateTime((new DateTime($data_date))->getTimestamp() * 1000);
                    $mongo_data->indicator_id = (int)$manual_details->indicator_id;
                    $mongo_data->date_hash = md5($mongo_data->date);
                    $mongo_data->summary = $manual_details->data_value;
                    $mongo_data->summary_daily = $summary_daily;
                    $mongo_data->type = 'manual';
                    $mongo_data->save();
                    //end mongo

                    $target_data = IndicatorTarget::firstOrNew([
                        'project_id' => $manual_details->project_id,
                        'indicator_id' => (int)$manual_details->indicator_id,
                        'year' => (int)$year,
                        'month' => (int)$month,
                    ]);

                    $target_data->project_id = $manual_details->project_id;
                    $target_data->indicator_id = $manual_details->indicator_id;
                    $target_data->year = (int)$year;
                    $target_data->month = (int)$month;
                    $target_data->target_data = $manual_details->target_value;
                    $target_data->save();

                    $operation_data_check = Operations::where('project_id', $manual_details->project_id)
                        ->where('date', $date)->exists();

                    if(!$operation_data_check){
                        $operation = new Operations();
                        $operation->project_id = $manual_details->project_id;
                        $operation->date = $date;
                        $operation->to_mysql = 1;
                        $operation->to_mongo = 1;

                        $operation->save();
                    }

                    $user = Auth::user();

                    $data = ManualData::find($id_man);
                    $data->is_authorized = 1;
                    $data->is_view = 1;
                    $data->updated_by = $user->id;
                    $data->authorized_by = $user->id;
                    $data->save();
                }
            }
        }
        return "success";
    }

    public function manual_data_un_approve(Request $request)
    {
        $manual_details = ManualData::where('id', $request->manual_data_id)->first();

        $user = Auth::user();

        $data = ManualData::find($manual_details->id);

        $data->is_view = 1;
        $data->updated_by = $user->id;
        $data->authorized_by = $user->id;
        $data->save();

        return "Success";
    }
}
