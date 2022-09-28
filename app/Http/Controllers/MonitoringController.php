<?php

namespace App\Http\Controllers;


use App\Common;
use App\Indicator;
use App\IndicatorTarget;
use App\ManualData;
use App\Operations;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Monitoring;
use App\MongoModel;
use App\Project;
use Auth;
use DB;

class MonitoringController extends Controller
{
    public function project_wise_monitoring(Request $request)
    {
        $project_id=0;
        if($request->project_id !="")
        {
            $project_id=$request->project_id;
        }
        $projects = Project::get();
        return view('monitoring.project_wise_monitoring', compact('projects','project_id'));
    }

    //for ajax use
    public function get_project_wise_monitoring(Request $request)
    {
        $data = array();
        $today = date('Y-m-d');
        $date = date('Y-m', strtotime('-1 months', strtotime($today)));
        $project_id = $request->project_id;
        //$project_status=Monitoring::get_project_status($project_id,$date);

        $project_details = Project::where('id', $project_id)->first();
        $indicator_lists = Indicator::where('project_id', $project_details->id)->where('status', 1)->get();
        $success = 0;
        foreach ($indicator_lists as $indicator_list) {
            $data['details'][$indicator_list->id]['name'] = $indicator_list->name;
            $real_data = 0;
            $target_data = 0;
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$indicator_list->id)->first();
            if (isset($mongo_data['data']['summary'])) {
                foreach ($mongo_data['data']['summary'] as $summary) {
                    $dt = date('Y-m', strtotime(mongo_date_to_regular_date($summary['date'])));
                    $compare_date = date('Y-m', strtotime($date));
                    if (strtotime($dt) == strtotime($compare_date)) {
                        $success++;
                        $real_data = 1;
                        $target_data = 1;
                        break;
                    }
                }
            }
            $data['details'][$indicator_list->id]['data'] = $real_data;
            $data['details'][$indicator_list->id]['target_data'] = $target_data;
            $data['details'][$indicator_list->id]['data_process'] = $indicator_list->data_process;

        }
        $data['success_percent'] = ($success * 100) / count($indicator_lists);
        return view('monitoring.get_project_wise_monitoring', compact('data'));
    }

    //top level monitoring
    public function top_level_monitoring(Request $request)
    {
        $api=0;
        $man=0;
//        $running_date=date('Y-m', strtotime('last day of previous month'));
//        $running_date = date('Y-m-d', strtotime('last day'));

        $running_date = Operations::whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->where('to_mongo', 1)
            ->where('to_mysql', 1)
            ->max('date');

        $owner = Common::get_own_project();
        $query = Project::where('status', 1);
        if(Auth::user()->role != 1 && Auth::user()->role != 5 ){
            $query->whereIn('id', $owner);
        }
        $projects = $query->pluck('name', 'id');

        if(isset($request->project_id) && $request->project_id != "")
        {
            $project_lists = Project::where('id',$request->project_id)->where('status',1)->get();
        }else{
            $query = Project::where('status',1);
            if(Auth::user()->role != 1 && Auth::user()->role != 5 ){
                $query->whereIn('id', $owner);
            }
            $project_lists = $query->get();
        }

        $pr_arr=array();
        foreach($project_lists as $r)
        {
            $pr_arr[$r->id]=$r->id;
        }
        $indicator=Indicator::where('status',1)->whereIn('project_id',$pr_arr)->get();
        foreach ($indicator as $r)
        {
            if($r->data_process == 'MAN')
            {
                $man++;
            }else{
                $api++;
            }
        }
        return view('monitoring.top_level_monitoring',compact('projects', 'project_lists','running_date', 'man', 'api'));
    }

    public function get_api_indicator_list(Request $request)
    {
        $month_array = array();

        $project_id = $request->project_id;
        $project_details = Project::where('id',$project_id)->first();
        $date = $request->date;

        if(date('Y-m', strtotime($date)) == date('Y-m')){
            $date = Operations::whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))
                ->where('to_mongo', 1)
                ->where('to_mysql', 1)
                ->max('date');
        }

        // $indicators=Indicator::where('status',1)->where('project_id',$project_id)
        //     ->where(function ($query) {
        //                 $query->where('data_process', '!=', 'MAN')
        //                     ->orWhereNull('data_process');
        //                 }
        //             )->get();

        //sorting process
        $indicator_sorting=$project_details->indicator_sorting;
        $indicator_sorting=substr($indicator_sorting, 0, -1);
        if($indicator_sorting == "")
        {
            $indicator_sorting=0;
        }
        $q = "select * from indicators where project_id=".$project_id." and status = 1 and (data_process IS NULL OR data_process != 'MAN') order by FIELD(id,$indicator_sorting)";
        $indicators = DB::select(DB::raw($q));
        //get the data from mongo
        $data = array();
        $last_date = "";

        $total_indicator=count($indicators);
        //$total_indicator_data_get=0;

        $to_date = date('Y-m-d');
        $from_date = date("Y-m-d", strtotime("-12 months".$to_date));

        $monthly_date_range = [];
        $period = CarbonPeriod::create($from_date, $to_date)->month();
        $current_date = Carbon::now();
        for ($i = 1; $i < count($period); $i++) {
            $monthly_date_range[$current_date->format('Y-m')]['year'] = $current_date->format('Y');
            $monthly_date_range[$current_date->format('Y-m')]['month'] = $current_date->format('m');
            $current_date->subMonths(1)->format('Y-m');
        }

        $last_operation_dates = max_operation_dates($monthly_date_range, $project_details->id);

        foreach ($indicators as $indicator)
        {
            $data[$indicator->id]['success']=0;
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator->id)
                ->whereIn('date', $last_operation_dates)
                ->get();

            if (isset($mongo_data)) {
                foreach ($mongo_data as $summary) {
                    $dt = date('Y-m-d', strtotime(mongo_date_to_regular_date($summary['date'])));

                    $year = date('Y', strtotime(mongo_date_to_regular_date($summary['date'])));
                    $month = date('m', strtotime(mongo_date_to_regular_date($summary['date'])));
                    $target_data = IndicatorTarget::where('indicator_id', $indicator->id)->where('year', $year)->where('month', $month)->value('target_data');
                    //for month check
                    if($summary['summary'] != 0) {                             //mongo null and 0 problem
                        $month_array[$indicator->id][$dt] = $dt;
                    }

                    //last date find
                    if($last_date == "")
                    {
                        $last_date=$dt;
                    }else{
                        if(strtotime($last_date) < strtotime($dt))
                        {
                            $last_date=$dt;
                        }
                    }

                    $compare_date = date('Y-m-d', strtotime($date));
                    if (strtotime($dt) == strtotime($compare_date)) {
                        $data[$indicator->id]['success'] = 1;
                        $data[$indicator->id]['value'] = $summary['summary'];
                        $data[$indicator->id]['target_value'] = $target_data ? $target_data : 0;
                        $data[$indicator->id]['date'] = $dt;
                        //break;
                    }
                }
            }
        }

        //for month check
        $has_month = array();
        ksort($monthly_date_range);

        foreach ($monthly_date_range as $value) {
            $max_operation_date = Operations::whereMonth('date', $value['month'])
                ->whereYear('date', $value['year'])
                ->where('project_id', $project_id)
                ->where('to_mongo', 1)
                ->where('to_mysql', 1)
                ->max('date');

            $max_date_of_month = date('Y-m-t', strtotime($value['year']. '-'. $value['month']));

            $has_month[$max_date_of_month]['data_complete'] = 0;
            $has_month[$max_date_of_month]['data_incomplete'] = 0;
            $has_month[$max_date_of_month]['no_data'] = 0;

            $ruuning_loop_month_total_indicator_data_has = 0;

            foreach ($indicators as $indicator)
            {
                if(isset($month_array[$indicator->id][$max_operation_date]))
                {
                    $ruuning_loop_month_total_indicator_data_has ++;
                }
            }

            if($ruuning_loop_month_total_indicator_data_has == 0)
            {
                $has_month[$max_date_of_month]['no_data'] = 1;
            }
            else if($ruuning_loop_month_total_indicator_data_has < $total_indicator)
            {
                $has_month[$max_date_of_month]['data_incomplete'] = 1;
            }else{
                $has_month[$max_date_of_month]['data_complete'] = 1;
            }
        }

        return view('monitoring.get_api_indicator_list',compact('project_id','indicators','data','last_date','has_month'));
    }

    public function get_manual_indicator_list(Request $request)
    {
        $month_array=array();

        $last_date="";
        $project_id=$request->project_id;
        $project_details=Project::where('id',$project_id)->first();
        $date=$request->date;

        //sorting process
        $indicator_sorting=$project_details->indicator_sorting;
        $indicator_sorting=substr($indicator_sorting, 0, -1);
        if($indicator_sorting == "")
        {
            $indicator_sorting=0;
        }
        $q=" select * from indicators where project_id=".$project_id." and status=1 and data_process='MAN' order by FIELD(id,$indicator_sorting) ";

        $indicators=DB::select(DB::raw($q));
        //$indicators=Indicator::where('status',1)->where('project_id',$project_id)->where('data_process', 'MAN')->get();

        $total_indicator=count($indicators);

        //get the data from mongo
        $data=array();
        $mysql_data=array();
        foreach ($indicators as $indicator)
        {
            $data[$indicator->id]['success']=0;
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id',(int)$indicator->id)->first();
            if (isset($mongo_data['data']['summary'])) {
                foreach ($mongo_data['data']['summary'] as $summary) {
                    $dt = date('Y-m', strtotime(mongo_date_to_regular_date($summary['date'])));

                    //for month check
                    if($summary['data'] != 0) {                             //mongo null and 0 problem
                        $month_array[$indicator->id][$dt] = $dt;

                        //last date find
                        if($last_date == "")
                        {
                            $last_date=$dt;
                        }else{
                            if(strtotime($last_date) < strtotime($dt))
                            {
                                $last_date=$dt;
                            }
                        }
                    }

                    $compare_date = date('Y-m', strtotime($date));
                    if (strtotime($dt) == strtotime($compare_date)) {
                        $data[$indicator->id]['success']=1;
                        $data[$indicator->id]['value']=$summary['data'];
                        $data[$indicator->id]['target_value']=$summary['target_data'];
                        $data[$indicator->id]['date']=$dt;
                        break;
                    }
                }
            }
        }

        //for month check
        $has_month=array();
        $current_date=date('Y-m');
        //echo $current_date."<br>";
        $newdate = date("Y-m", strtotime("-11 months".$current_date));
        //echo $newdate."<br>"; die;
        while(strtotime($newdate) < strtotime($current_date))
        {
            $has_month[$newdate]['data_complete']=0;
            $has_month[$newdate]['data_incomplete']=0;
            $has_month[$newdate]['no_data']=0;

            $ruuning_loop_month_total_indicator_data_has=0;


            foreach ($indicators as $indicator)
            {
                if(isset($month_array[$indicator->id][$newdate]))
                {
                    $ruuning_loop_month_total_indicator_data_has++;
                }
            }

            if($ruuning_loop_month_total_indicator_data_has == 0)
            {
                $has_month[$newdate]['no_data']=1;
            }
            else if($ruuning_loop_month_total_indicator_data_has < $total_indicator)
            {
                $has_month[$newdate]['data_incomplete']=1;
            }else{
                $has_month[$newdate]['data_complete']=1;
            }
            $newdate = date("Y-m", strtotime("+1 months".$newdate));
        }

        foreach ($indicators as $indicator)
        {
            $mysql_data[$indicator->id]['success']=0;
            $year=date('Y',strtotime($date));
            $month=date('m',strtotime($date));
            $m_data=array();

            $m_data = ManualData::where('project_id',$project_id)->where('indicator_id',$indicator->id)->whereYear('date',"=",$year)->whereMonth('date',"=",$month)->get();
            if (!empty($m_data))
            {
                foreach ($m_data as $r)
                {
                    $mysql_data[$indicator->id]['success']=1;
                    $mysql_data[$indicator->id]['value']=$r['data_value'];
                    $mysql_data[$indicator->id]['target_value']=$r['target_value'];
                    $mysql_data[$indicator->id]['date']=$r['date'];//$date;
                    $mysql_data[$indicator->id]['is_authorized']=$r['is_authorized'];
                    $mysql_data[$indicator->id]['created_by']=$r['created_by'];
                    $mysql_data[$indicator->id]['created_at']=$r['created_at'];
                    $mysql_data[$indicator->id]['manual_id']=$r['id'];

                }
            }
        }
        return view('monitoring.get_man_indicator_list',compact('project_id','indicators','data','mysql_data','last_date','has_month'));
    }
    public function man_indicator_entry(Request $request)
    {
        $project_id=$request->project_id;
        $project_details=Project::where('id',$project_id)->first();
        $date=$request->date;
        //sorting process
        $indicator_sorting=$project_details->indicator_sorting;
        $indicator_sorting=substr($indicator_sorting, 0, -1);
        if($indicator_sorting == "")
        {
            $indicator_sorting=0;
        }
        $q=" select * from indicators where project_id=".$project_id." and status=1 and data_process='MAN' order by FIELD(id,$indicator_sorting) ";

        $indicators=DB::select(DB::raw($q));
        // $indicators=Indicator::where('status',1)->where('project_id',$project_id)->where('data_process', 'MAN')->get();

        return view('monitoring.man_indicator_entry',compact('indicators','date','project_details'));
    }
}
