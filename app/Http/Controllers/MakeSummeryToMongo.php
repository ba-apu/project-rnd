<?php

namespace App\Http\Controllers;
use App\Operations;
use App\Project;
use App\Indicator;
use App\MongoModel;
use DB;
use log;

use Illuminate\Http\Request;

class MakeSummeryToMongo extends Controller
{
    public function load_project(Request $request)
    {
        if($request->isMethod('post')){
            $rules = [
                'project' => 'required',
                'year' => 'required',
                'month' => 'required'
            ];
            $messege="";
            $this->validate($request, $rules);

            $project = Project::find($request->project);
            $indicators=Indicator::where('project_id',$project->id)->where('status',1)->get();

            foreach($indicators as $indicator)
            {
                $month="'$request->month'";
                $month_r="$request->month";
                $year="'$request->year'";
                $year_r="$request->year";
                $date=$year_r."-".$month_r."-"."01 00:00:00";
                //echo $date; die;
                $rules=$indicator->rules;
                $rules=str_replace("__month__",$month,$rules);
                $rules=str_replace("__year__",$year,$rules);
                //echo $rules;
                $db_result=DB::select($rules);
                //echo "<pre>"; print_r($db_result); die;
                foreach ($db_result as $val)
                {
                    foreach($val as $key=>$r)
                    {
                        if($r != "")
                        {
                            $mongo_data_existing = MongoModel::setCollection($project->reference_table_name)->where('indicator_id', $indicator->id)->first();
                            if(!empty($mongo_data_existing))
                            {
                                $has_summery=0;
                                foreach($mongo_data_existing['data']['summary'] as $data_summery)
                                {
                                    if(date('Y-m',strtotime(mongo_date_to_regular_date($data_summery['date']))) == date('Y-m',strtotime($date)))
                                    {
                                        $has_summery=1;
                                        $messege="In  this month already summary data included ";
                                        //echo $messege; die;
                                        break;

                                    }
                                }
                                //echo $mongo_data->id; die;
                                if(!$has_summery) {
                                    $mongo_data = MongoModel::setCollection($project->reference_table_name)->find($mongo_data_existing->id);
                                    //echo "<pre>"; print_r($mongo_data); die;

                                    $data_existing = $mongo_data_existing['data'];
                                    //echo "<pre>";
                                    //print_r($data_existing);
                                    $dt = date('c', strtotime($date));

                                    $save_data['date'] = $dt;
                                    $save_data['data'] = (int)$r;
                                    $save_data['target_data'] = 0;

                                    $data_existing['summary'][] = $save_data;
                                    //echo "<pre>";
                                    //print_r($data_existing);
                                    //die;

                                    $mongo_data->data = $data_existing;

                                    $mongo_data->save();
                                    $messege="Summery data is successfully completed";
                                }
                            }else{

                                $c=0;
                                //$data['indicator_id']=$indicator->id;
                                $dt=date('c',strtotime($date));
                                $data['summary'][$c]['date']=$dt;
                                $data['summary'][$c]['data']=(int)$r;
                                $data['summary'][$c]['target_data']=0;

                                $mongo_data=MongoModel::setCollection($project->reference_table_name);

                                $mongo_data->indicator_id=(int)$indicator->id;
                                $mongo_data->data=$data;

                                $mongo_data->save();

                                $messege="Data summery  for this date '.$date.'  successfully completed.";
                            }
                            //end mongo
                        }
                    }
                    //echo "<pre>"; print_r($r); die;
                }
                //secho "<pre>"; print_r($data); die;
                //$josn_data=json_encode($data); //echo $josn_data; die;
            }
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', $messege);
        }
        return view('makeSummeryToMongo.load_project');
    }

    public function load_specific_data($project_id){
        $collection_name = Project::where('id', $project_id)->value('reference_table_name');
        $indicators = Indicator::where('project_id', $project_id)->where('status', 1)->get(['id']);

        Operations::where('project_id', $project_id)->where('to_mysql', 1)->where('to_mongo', 1)
            ->chunk(5, function($operations) use($collection_name, $indicators){
                $count = 0;
                foreach ($operations as $operation){
                    foreach ($indicators as $indicator){
                        $mongo_data = MongoModel::setCollection($collection_name)
                            ->where('date', mongoFormattedDate($operation->date))
                            ->where('indicator_id', $indicator->id)
                            ->first();

                        if($mongo_data){
                            $previous_date_data = MongoModel::setCollection($collection_name)
                                ->where('indicator_id', $indicator->id)
                                ->where('date', '<', mongoFormattedDate($operation->date))
                                ->orderBy('date', 'desc')->limit(1)
                                ->first(['date', 'summary']);

                            $mongo_data->summary_daily = 0;
                            if($previous_date_data){
                                if($previous_date_data->summary < $mongo_data->summary){
                                    $mongo_data->summary_daily = ($mongo_data->summary - $previous_date_data->summary);
                                }
                            }
                            $mongo_data->save();
                        }
                    }
                    $count++;
                    echo $count;
                }
            });
    }

}
