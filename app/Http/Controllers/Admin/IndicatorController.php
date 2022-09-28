<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IndicatorRequest;
use App\Indicator;
use App\IndicatorUserCategory;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Hash, Auth;
use App\Chart;
use URL;
use Session;
use App\Common;

class IndicatorController extends Controller
{
    public function __construct()
    {
//		$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $geo_types = \App\Common::get_geo_type();
        view()->share('pageTitle', 'Indicator');
        //$indicators = Indicator::paginate(10);
        $query = Indicator::query();
        if ($request) {
            if ($request->project_id != "") {
                $query = $query->where('project_id', $request->project_id)
                ->where('project_id','!=','null');
                $indicators = $query->orderBy('priority', 'asc')->paginate(20);
            }
            else{
                $indicators = Indicator::where('project_id','!=','')
                ->orderBy('project_id', 'asc')
                ->orderBy('priority', 'asc')
                ->paginate(20);
            }
        }
        return view('admin.indicator.index', compact('indicators', 'geo_types', 'request'));
    }

    public function create()
    {
        $geo_types = \App\Common::get_geo_type();
        $tables = DB::select('select table_name from information_schema.tables where TABLE_SCHEMA="a2i_dashboard"');
        $projects = Project::where('status', 1)->pluck('bangla_name', 'id');
        $charts = Chart::pluck('bn_chart_name', 'id');
        $indicator_user_category = IndicatorUserCategory::pluck('name', 'key');
        //view()->share('pageTitle', "Create New Indicator");

        return view('admin.indicator.create', compact('geo_types', 'tables', 'charts', 'projects', 'indicator_user_category'));
        //return view('admin.create', compact('geo_types', 'tables'));
    }

    public function store(IndicatorRequest $request)
    {
        $indicator = new Indicator();
        $indicator->name = $request->name;
        $indicator->bangla_name = $request->bangla_name;
        $indicator->project_id = $request->project_id;
        $indicator->priority = 1;
        $indicator->unit = $request->unit;
        $indicator->short_form = $request->short_form;
        $indicator->short_form_en = $request->short_form_en;
        $indicator->data_process = $request->data_process;
        $indicator->default_chart = $request->default_chart;
        $indicator->chart = json_encode($request->chart);
        $indicator->status = $request->status;
//		  $indicator->parent_id = $request->input('parent_id');
//        $indicator->first_process = $request->first_process;
//        $indicator->indicator_user_category = $request->indicator_user_category;
//        $indicator->indicator_user_type = $request->indicator_user_type;
//        if (isset($request->has_user_details)) {
//            $indicator->has_user_details = 1;
//
//            if ($request->indicator_user_type != 'main') {
//                $parent_id = Indicator::where('indicator_user_category', $request->indicator_user_category)
//                    ->where('indicator_user_type', 'main')
//                    ->where('project_id', $request->project_id)
//                    ->value('id');
//                $indicator->parent_id = $parent_id;
//            }
//        }

//        $validated_date = 'DAY(provided_date)=__day__ AND MONTH(provided_date)=__month__ AND YEAR(provided_date)=__year__';
//        $ambigious_validated_date = 'DAY(' . $request->ref_table_name . 'provided_date)=__day__ AND MONTH(' . $request->ref_table_name . 'provided_date)=__month__ AND YEAR(' . $request->ref_table_name . 'provided_date)=__year__';
//        $rules = '';
//        $column = "__geo_type__ sum(" . $request->table_columns . ")";
//        $group_geo = '__group_by_geo_type__';
//        if ($request->geo_type == 0) {
//            $column = $request->table_columns;
//            $group_geo = '';
//        }
//        $ref_name = Project::where('id', $request->project_id)->where('status', 1)->first(['reference_child_table_name', 'reference_child_2_table_name']);

//        if ($request->data_process == 'API') {
//            if ($request->geo_type == 0 && $request->has_user_details == '') {
//                $rules = "SELECT " . $column . " FROM " . $request->ref_table_name . " WHERE " . $validated_date;
//            } elseif ($request->user_based != 0 && $request->geo_type != 0 && $request->has_user_details == 0) {
//                $rules = "SELECT " . $column . " AS " . $request->table_columns . " FROM " . $request->ref_table_name . " WHERE " . $validated_date . " " . $group_geo;
//            } elseif ($request->user_based != 0 && $request->geo_type != 0 && $request->has_user_details == 1) {
//                $rules = "SELECT " . $column . " AS " . $request->table_columns . " FROM " . $request->ref_table_name . " LEFT JOIN " . $ref_name->reference_child_2_table_name . " ON " . $ref_name->reference_child_table_name . ".id WHERE " . $request->ref_table_name . ".title = '" . $request->indicator_user_category . "' AND " . $validated_date . " " . $group_geo;
//            }
//            $indicator->geo_type = $request->geo_type;
//            $indicator->rules = $rules;
//            $indicator->used_column = $request->table_columns;
//            $indicator->used_table = $request->ref_table_name;
//        }

        if ($indicator->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Indicator was successfully added!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect('dashboard/indicator');
    }

    public function edit($id, Request $request)
    {
        $charts = Chart::get();
        $indicator = Indicator::findOrFail($id);
        view()->share('pageTitle', 'Edit ' . $indicator->name);

        $previous_page_url = url()->previous();
        $check_url = strstr($previous_page_url, 'edit');
        if ($check_url) {

        } else {
            $request->session()->put('previous_page_url', $previous_page_url);
        }

        return view('admin.indicator.edit', compact('indicator', 'charts'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'bangla_name' => 'required',
            'project_id' => 'required',
            'default_chart' => 'required'
        ];
        $this->validate($request, $rules);

        $indicator = Indicator::findOrFail($id);

        $indicator->name = $request->input('name');
        $indicator->bangla_name = $request->input('bangla_name');
        $indicator->project_id = $request->input('project_id');
        $indicator->priority = 1;
        $indicator->unit = $request->input('unit');
        $indicator->short_form = $request->input('short_form');
        $indicator->short_form_en = $request->input('short_form_en');
//        $indicator->first_process = $request->input('first_process');
        $indicator->default_chart = $request->input('default_chart');
        $indicator->chart = json_encode($request->chart);
        $indicator->status = $request->input('status');

        if ($indicator->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Indicator was successfully updated!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }

        $previous_page_url = $request->session()->get('previous_page_url');
        if ($previous_page_url == "") {
            $previous_page_url = url('dashboard/indicator');
        }
        return redirect($previous_page_url);
    }

//    public function edit($id, Request $request)
//    {
//        $geo_types = \App\Common::get_geo_type();
//        $rules = array(
//            'SELECT' => 'SELECT',
//            'INSERT' => 'INSERT',
//            'UPDATE' => 'UPDATE',
//            'DELETE' => 'DELETE',
//            'ALTER' => 'ALTER',
//            'DROP' => 'DROP',
//            'CREATE' => 'CREATE',
//            'USE' => 'USE',
//            'SHOW' => 'SHOW',
//            'FROM' => 'FROM',
//            'WHERE' => 'WHERE',
//            '*' => '*',
//            '=' => '=',
//            '>' => '>',
//            '<' => '<',
//            '!=' => '!=',
//            'AND' => 'AND',
//            'OR' => 'OR',
//            'NOT' => 'NOT',
//            'BETWEEN' => 'BETWEEN',
//            'GROUP' => 'GROUP',
//            'BY' => 'BY',
//            'ON' => 'ON',
//            'DESC' => 'DESC',
//            'INTO' => 'INTO',
//            'LIKE' => 'LIKE',
//        );
//        // $columns = Schema::getColumnListing('indicators');
//
//        $charts = Chart::get();
//        $indicator = Indicator::findOrFail($id);
//        $tables = DB::select('select table_name from information_schema.tables where TABLE_SCHEMA="a2i_dashboard"');
//        $indicator->equation = Self::getEquation($indicator->rules);
//        view()->share('pageTitle', 'Edit ' . $indicator->name);
//
//        $previous_page_url = url()->previous();
//        $check_url = strstr($previous_page_url, 'edit');
//        if ($check_url) {
//
//        } else {
//            $request->session()->put('previous_page_url', $previous_page_url);
//        }
//
//
//        return view('admin.indicator.edit', compact('geo_types', 'indicator', 'tables', 'rules', 'charts'));
//    }

//    public function update(Request $request, $id)
//    {
//        $rules = [
//            'name' => 'required',
//            'bangla_name' => 'required',
//            'project_id' => 'required',
//            'default_chart' => 'required',
//            'data_process' => 'required',
//            //'priority' => 'required'
//            //'geo_type' => 'required',
//            //'rules' => 'required'
//        ];
//        $this->validate($request, $rules);
//
//        $used_table = json_encode(array($request->input('used_table')));
//        $indicator = Indicator::findOrFail($id);
//
//        $indicator->name = $request->input('name');
//        $indicator->bangla_name = $request->input('bangla_name');
//        $indicator->project_id = $request->input('project_id');
//        $indicator->used_column = $used_table;
//        $indicator->priority = 1;
//        $indicator->unit = $request->input('unit');
//        $indicator->short_form = $request->input('short_form');
//        $indicator->short_form_en = $request->input('short_form_en');
//        $indicator->first_process = $request->input('first_process');
//        $indicator->status = $request->input('status');
//        $indicator->rules = $request->input('equation');
//        $geo_type = $request->input('geo_type');
//        if ($geo_type != "") {
//            $indicator->geo_type = $request->input('geo_type');
//        }
//        //$indicator->rules = $request->input('rules');
//        $indicator->data_process = $request->input('data_process');
//        $indicator->default_chart = $request->default_chart;
//        $indicator->chart = json_encode($request->chart);
//        if ($indicator->save()) {
//            $request->session()->flash('status', 'success');
//            $request->session()->flash('message', 'Indicator was successfully updated!');
//        } else {
//            $request->session()->flash('status', 'danger');
//            $request->session()->flash('message', 'Error Occurred!');
//        }
//
//        $previous_page_url = $request->session()->get('previous_page_url');
//        if ($previous_page_url == "") {
//            $previous_page_url = url('dashboard/indicator');
//        }
//        return redirect($previous_page_url);
//
//    }

    public function destroy(Request $request, $id)
    {
        $indicator = Indicator::findOrFail($id);
        if ($indicator->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Indicator was successfully removed!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
    }

    public function getcolumns(Request $request)
    {
        $project_id = $request->project_id;
        $user_based = $request->user_based;
        $geo_type = $request->geo_type;
        $has_user_details = $request->has_user_details;
        $reference_table = '';
        if ($geo_type == 0 && $has_user_details == "") {
            $reference_table = 'reference_table_name';
        } elseif ($user_based != 0 && $geo_type != 0 && $has_user_details == 0) {
            $reference_table = 'reference_child_table_name';
        } elseif ($user_based != 0 && $geo_type != 0 && $has_user_details == 1) {
            $reference_table = 'reference_child_2_table_name';
        }
        $ref_name = Project::where('id', $project_id)->where('status', 1)->value($reference_table);
        $columns = Common::getSanitizedColumn($project_id, $ref_name);
        $data = [
            'columns' => $columns,
            'table' => $ref_name,
            'ref_tbl_type' => $reference_table
        ];
        return $data;
    }

    public function checkIndicatorUserCategory(Request $request)
    {
        $existing = Indicator::where('indicator_user_category', $request->indicator_user_category)
            ->where('indicator_user_type', $request->indicator_user_type)
            ->where('project_id', $request->project_id)
            ->count();
        $message = ['status' => 422, 'message' => 'সূচক সংযোজিত আছে'];
        if ($existing == 0) {
            $main_category = 1;
            if ($request->indicator_user_type != 'main') {
                $main_category = Indicator::where('indicator_user_category', $request->indicator_user_category)
                    ->where('indicator_user_type', 'main')
                    ->where('project_id', $request->project_id)
                    ->count();
            }
            $message = ($main_category != 0) ? ['status' => 200, 'message' => ''] : ['status' => 422, 'message' => 'মূল সূচক নেই'];
        }
        return $message;
    }

    public function get_indecator_list(Request $request)
    {
        $project_id = $request->project_id;
        $indecator_list = Indicator::where('project_id', $project_id)->where('status', 1)->get();

        return json_encode($indecator_list);
    }

    public function get_manual_indecator_list(Request $request)
    {
        $project_id = $request->project_id;
        $indecator_list = Indicator::where('project_id', $project_id)->where('data_process', 'MAN')->where('status', 1)->get();

        return json_encode($indecator_list);
    }

    public function changeIndicatorStatus($id, $status)
    {
        Indicator::where('id', $id)->update(['status'=> $status]);
        return redirect()->back();
    }

    public function set_project_indicator_priority(Request $request){
        $project_total_indicator = Indicator::where('project_id','=',$request->projectId)->count();
        if($request->priority > $project_total_indicator || $request->priority < 1){
            return response()->json(['warning'=>"Please, enter value between 1 to ".$project_total_indicator]);
        }
        
        $indicator = Indicator::where('id','=',$request->indicatorId)->first();
        $prev_indicator = Indicator::where('priority','=',$request->priority)
        ->where('project_id','=',$request->projectId)->first();
        if($indicator->priority!=$request->priority){
            if($prev_indicator != ''){
                $temp                       = $indicator->priority;
                $indicator->priority        = $request->priority;
                $prev_indicator->priority   = $temp;
                $result=$indicator->save();
                $prev_indicator->save();
                return response()->json(['success'=>"Piority ".$request->priority." set successfully"]);
            }
            else{
                $indicator->priority        = $request->priority;
                $result=$indicator->save();
                return response()->json(['success'=>"Piority ".$request->priority." set successfully"]);
            }
        } 
       
       
      /*   $update_priorities = Indicator::orderBy('priority','asc')
                            ->where('project_id','=', $request->projectId)
                            ->where('priority', '>=', $request->priority)
                            ->get();
        foreach($update_priorities as $update_priority){
            $update_priority->priority = $update_priority->priority + 1;
            $update_priority->save();
        } */

        // $indi = $indicator->priority;
     
       /*  $result=$indicator->update([
            'priority'  => $request->priority
        ]);
        */
        /*  $update_priorities = Indicator::orderBy('priority','asc')
        ->where('project_id','=', $request->projectId)
        ->where('priority','>', $indi)
        ->get();
        */
        /* foreach($update_priorities as $update_priority){
            $update_priority->priority = $update_priority->priority - 1;
            $update_priority->save();
        }

        if($result){
            return response()->json(['success'=>$result]);
        } */
        // return response()->json(['success'=>$result]);
        
    }
}
