<?php

namespace App\Http\Controllers\Api;

use App\Operations;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Common;
use App\Event;
use App\Indicator;
use App\Area;
use App\Chart;

class DashboardController extends BaseController
{
    public function index(Request $request)
    {

        $color_array[0]='#95cfd8';
        $color_array[1]='#e0adc5';
        $color_array[2]='#c1d95d';
        $color_array[3]='#b69cf2';
        $color_array[4]='#f7cf5f';

        $user = auth('api')->user();


        //dashboard data
        $user_id=Auth::user()->id;
        $indicator_project_lists=Common::get_dashboard_data($user_id);
        //$serviceProviderInfo =   Common::servicesInfo();
        $c=0;
        $color=0;
        $indicator_data=[];
        foreach($indicator_project_lists as $key=>$project)
        {
            if(isset($project['indicator_last_value']['data']))
            {
                $indicator_data[$c]['project_name']=$project['name'];
                $indicator_data[$c]['project_id']=$project['id'];
                $indicator_data[$c]['indicator_name']=($project['indicators'][0]['bangla_name'] != "")?$project['indicators'][0]['short_form']:$project['indicators'][0]['short_form'];
                $indicator_data[$c]['indicator_value']=$project['indicator_last_value']['data'];
                $indicator_data[$c]['unit']=$project['indicators'][0]['unit'];
                $indicator_data[$c]['background_color']=$color_array[$color];
                $c++;
                $color++;
                if($color > 4)
                {
                    $color = 0;
                }
            }

        }

        //sector
        $financial_progress_data['transactional_data']=Common::get_transactional_sum();
        $financial_progress_data['transactional_graph_data']=Common::load_tansactional_graph_data();

        //sectorapi
        $from_date= isset($request->from_date)?$request->from_date:'2020-01-01';
        $to_date= isset($request->to_date)?$request->to_date:date('Y-m-d');
        $financial_progress_data['transactional_data']=Common::get_transactional_sum_for_api(null,$from_date,$to_date);
        $financial_progress_data['transactional_graph_data']=Common::load_tansactional_graph_data_for_api(null,$from_date,$to_date);
        //$fin_data['']=

        //financial graph
        //$project_id=$request->project_id;
        //$from_date=$request->from_date;

        $financial_lists = Event::where('start_date','>=',$from_date)->where('start_date','<=',$to_date)->get();

        $c=0;
        $wanted=0;
        $accepted=0;
        $real=0;

        $new_fin=[];
        $fin_graph_data=[];
        foreach ($financial_lists as $r)
        {
            $dt=date('Y-m-d',strtotime($r->start_date));
            //echo $dt." = ";
            $fin_graph_data['point'][$c]['date']=$dt;

            $wa[$c]['date']=$dt;
            $acc[$c]['date']=$dt;
            $rea[$c]['date']=$dt;

            $wa[$c]['amount']=$r->apply;
            //echo $r->apply."<br>";
            //$fin_graph_data['point'][$c]['wanted']=$r->amount;
            $wanted =$wanted+$r->apply;

            $acc[$c]['amount']=$r->post_approve;
            //$fin_graph_data['point'][$c]['accepted']=$r->accept;
            $accepted=$accepted+$r->post_approve;

            $rea[$c]['amount']=$r->real;
            //$fin_graph_data['point'][$c]['real']=$r->real;
            $real=$real+$r->real;

            $c++;
        }

        $data_artihk['wanted']=$wanted;
        $data_artihk['accepted']=$accepted;
        $data_artihk['real']=$real;
        //end

        //end
        $new_fin[0]['name']='প্রাক্কলিত ব্যয়';
        $new_fin[0]['color']='#f7cf5f';
        $new_fin[0]['data']=$wa;

        $new_fin[1]['name']='অনুমোদিত ব্যয়';
        $new_fin[1]['color']='#8BC541';
        $new_fin[1]['data']=$acc;

        $new_fin[2]['name']='প্রকৃত ব্যয়';
        $new_fin[2]['color']='#9ac7e0';
        $new_fin[2]['data']=$rea;

        $success['top_slider_data']=$indicator_data;
        $success['financial_graph_data']=$new_fin;
        $success['total']=$data_artihk;


        return $this->sendResponse($success, 'Data successfully generated');
        //return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    }
    public function project(Request $request)
    {
        $success=[];
        $project_id=$request->project_id;

        $service_details=Project::find($project_id);

        $operation_date = Operations::where('project_id', $service_details->id)->where('to_mysql', 1)->where('to_mongo', 1)->orderBy('id', 'desc')->limit(1)->value('date');

//        if (isset($request->date)) {
//            $date = $request->date;
//            $date = date("Y-m-01", strtotime($date));
//        }
        if($operation_date){
            $date=$operation_date;
        }else{
            if (date('d') == 31) {
                $date = date("Y-m-d", strtotime("-31 days"));
            } else {
                $date = date("Y-m-d", strtotime("-1 months"));
            }
        }

        $success['project_name']=$service_details->bangla_name?$service_details->bangla_name:name;
        $indecator_lists=Indicator::where('project_id',$service_details->id)->where('status',1)->orderBy('priority')->get();

        $c=0;
        foreach($indecator_lists as $r)
        {
            $drop_down[$c]['id']=$r->id;
            $drop_down[$c]['name']=$r->short_form;
            $c++;
        }

        //find the top lavel indicator
        $accept_indicator=array();
        $top_lavel_indecator_lists=array();

        if($service_details->main_indicator != "" && $service_details->main_indicator != 'null')
        {
            $accept_indicator=json_decode($service_details->main_indicator,1);
            $top_lavel_indecator_lists = Indicator::where('project_id', $service_details->id)->whereIn('id',$accept_indicator)->where('status', 1)->orderBy('priority')->get();
        }else{
            $top_lavel_indecator_lists=$indecator_lists;
        }
        //end

        //to text
        $success['top_text']="";
        $indecator_status=Common::get_compare_data($service_details->id,$date);
        $last_update_data_count=Common::get_last_date_of_dat($service_details->id,$date);
        if($last_update_data_count['last_date'])
        {
            $success['top_text']=" সর্বশেষ  ".english_to_bangla(date('t F,Y',strtotime($last_update_data_count['last_date'])))." তারিখে ডাটা হালনাগাদ করা হয়েছে। সর্বমোট ". english_to_bangla($last_update_data_count['total_indicator']) ." টি সূচক আছে, ডাটা এসেছে ".  english_to_bangla($last_update_data_count['available'])  ." টির ";
        }else{
            $success['top_text']='এখন পর্যন্ত কোনো ডাটা হালনাগাদ করা হয় নাই';
        }

        //for indicator list
        $color_array[0]='#95cfd8';
        $color_array[1]='#e0adc5';
        $color_array[2]='#c1d95d';
        $color_array[3]='#b69cf2';
        $color_array[4]='#f7cf5f';

        $top_indicator_list=array();
        $c=0;
        $color=0;
        foreach($top_lavel_indecator_lists as $key=>$indecator_list)
        {
            $tpi=[];
            $tpi['name']=$indecator_list->short_form;
            $tpi['background_color']=$color_array[$color];
            if($indecator_status[$indecator_list->id]['value'] != "")
            {
                if($c==0)
                {
                    $c++;
                    $success['first_indicator']=$indecator_list->id;
                }
                $tpi['has_value']=true;
                $tpi['id']=$indecator_list->id;
                $tpi['value']=english_to_bangla(bdtFormat($indecator_status[$indecator_list->id]['value']));
                $tpi['unit'] = $indecator_list->unit;
                $target_topbar_value=english_to_bangla(bdtFormat($indecator_status[$indecator_list->id]['target_value']));
                $target_top_bar_achive=english_to_bangla(get_percentage_to_hundrade($indecator_status[$indecator_list->id]['value'],$indecator_status[$indecator_list->id]['target_value']));
                $tpi['buttom_text'] = __('lavel.target_achive', ['target_value' => $target_topbar_value,'target_achive_parcent'=>$target_top_bar_achive]);
                $tpi['progress_percent']=rand(10,100);
                $tpi['no_value_messege']="";
            }
            else
            {
                $tpi['has_value']=false;
                $tpi['id']=$indecator_list->id;
                $tpi['value']=null;
                $tpi['unit'] =null;
                $tpi['buttom_text']=null;
                $tpi['no_value_messege']=english_to_bangla(date('F, Y',strtotime($date))) ." মাসে	এখনো ডাটা পাওয়া যায় নাই। ";
                $tpi['progress_percent']=0;
            }
            $success['top_lavel_indicator_lists'][]=$tpi;
            $color++;
            if($color > 4)
            {
                $color=0;
            }
        }
        //get first indicator
        $first_indicator=0;
        foreach ($indecator_lists as $r)
        {
            $first_indicator=$r->id; break;
        }

        $date_display_intervals=Common::get_project_wise_date_interval();
        //$mainService = $slug;
        $divisions = Area::where('type_id', '=', 4)->get();
        $districts = Area::where('type_id', '=', 5)->get();

        $indicatorLists =   Common::indicatorList($service_details->slug);
        $serviceLists =   Common::serviceList($service_details->slug);
        //\Session::put('serviceLists', $serviceLists);
        //\Session::put('indicatorLists', $indicatorLists);

        $serviceName =   Common::serviceName($service_details->slug);
        $serviceProviderInfo =   Common::serviceProviderInfo($service_details->slug);

//        $serviceIndicator =   Common::serviceIndicatorList($service_details->slug);
//        \Session::put('serviceIndicator', $serviceIndicator);

        $colors =   Common::getColor();
//        $serviceIndicatorNote =   Common::serviceIndicatorList($service_details->slug.'_note');

        $pabna = Area::where('parent_id', '=', 989)->get();

        $display_section=json_decode($service_details->display_rules,true);

        //sector
        $from_date= isset($request->from_date)?$request->from_date:'2019-08-01';
        $to_date= isset($request->to_date)?$request->to_date:date('Y-m-d');

        $tasks=\App\Task::where('project_id',$service_details->id)->orderBy('id','desc')->get();
        $transactional_data=Common::get_transactional_sum_for_api($service_details->id,$from_date,$to_date);
        $transactional_graph_data=Common::load_tansactional_graph_data_for_api($service_details->id,$from_date,$to_date);

        //task list
        $task_lists=Common::get_task_list($service_details->id);
        //dd($task_lists);
        //view()->share('task_lists', $task_lists);

        //service
        $service_data=array();
        if($service_details->slug == 'digital-center')
        {
            $service_data=Common::get_service_list_with_monthly_value($service_details->id);
        }
        //dd($service_data);

        //chart list
        $chart_list=array();
        $chart_list_q=Chart::get();
        foreach($chart_list_q as $r)
        {
            $chart_list[$r->id]=$r->chart_name;
        }

        //fin start
        $fin_graph_data=array();
        $financial_lists = Event::get();

        $c=0;
        $wanted=0;
        $accepted=0;
        $real=0;
        //dd($financial_lists);

        $new_fin=[];

        foreach ($financial_lists as $r)
        {
            $dt=date('Y-m-d',strtotime($r['date']));
            $fin_graph_data['point'][$c]['date']=$dt;

            $wa[$c]['date']=$dt;
            $acc[$c]['date']=$dt;
            $rea[$c]['date']=$dt;

            $wa[$c]['amount']=$r->amount;
            //$fin_graph_data['point'][$c]['wanted']=$r->amount;
            $wanted =$wanted+$r->amount;

            $acc[$c]['amount']=$r->accept;
            //$fin_graph_data['point'][$c]['accepted']=$r->accept;
            $accepted=$accepted+$r->accept;

            $rea[$c]['amount']=$r->real;
            //$fin_graph_data['point'][$c]['real']=$r->real;
            $real=$real+$r->real;

            $c++;
        }
        $data_artihk['wanted']=$wanted;
        $data_artihk['accepted']=$accepted;
        $data_artihk['real']=$real;
        //end
        //dd($fin_graph_data);


        //end
        $new_fin[0]['name']='প্রাক্কলিত ব্যয়';
        $new_fin[0]['color']='#f7cf5f';
        $new_fin[0]['data']=$wa;

        $new_fin[1]['name']='অনুমোদিত ব্যয়';
        $new_fin[1]['color']='#8BC541';
        $new_fin[1]['data']=$acc;

        $new_fin[2]['name']='প্রকৃত ব্যয়';
        $new_fin[2]['color']='#9ac7e0';
        $new_fin[2]['data']=$rea;

        $success['drop_down']=$drop_down;

        $success['financial_graph_data']=$new_fin;
        $success['total']=$data_artihk;
        //fin end


        //dd($success);
        return $this->sendResponse($success, 'Data successfully generated');
    }

    public function indicator_graph(Request $request)
    {
        $indicator_id=$request->indicator_id;
        $success=[];

        if($request->from_date)
        {
            $from_date=$request->from_date;
        }else{
            $from_date='2011-12-01';
        }

        if($request->to_date)
        {
            $to_date=$request->to_date;
        }else{
            $to_date=date('Y-m-d');
        }

        $data=Common::get_graph_point($indicator_id,$from_date,$to_date);

        $point=[];
        $d=[];
        $tr=[];
        $c=0;
        foreach ($data['point_data'] as $r)
        {
            $d[$c]['date']=$r['date'];
            $d[$c]['data']=$r['data'];

            $tr[$c]['date']=$r['date'];
            $tr[$c]['data']=$r['target_data'];
            $c++;
        }

        $point[0]['name']='Data';
        $point[0]['color']="#8BC541";
        $point[0]['data']=$d;

        $point[1]['name']='Target Data';
        $point[1]['color']="#f7cf5f";
        $point[1]['data']=$tr;

        //map
        //$map


        $default_chart=Chart::where('id',$data['default_chart'])->first();
        $success['chart_type']=$default_chart->chart_name;
        $success['points']=$point;//$data['point_data'];
        $success['title']=$data['indicator_short_name'];
        $success['chart_y_name']=$data['unit'];
        $success['data_part']=$data['details_data'];
        //sdd($data);

        //return json_encode($data);

        return $this->sendResponse($success, 'Data successfully generated');
    }
}
