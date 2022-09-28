<?php

namespace App\Http\Controllers\Admin;

use App\IndicatorTarget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Indicator;
use App\Project;
use App\MongoModel;
use MongoDB;
use BSON;
use UTCDateTime;
use DateTime;
use ISODate;
use MongoDate;

class ManualDataUpload extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manualDataUpload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'project_id' => 'required',
            'indicator_id' => 'required',
            'date' => 'required',
            'target_data' => 'required'
        ];
        $this->validate($request, $rules);

        $messege="";
        //save to mongo
        $indicator_details=Indicator::where('id',$request->indicator_id)->first();
        $project_details=Project::where('id',$indicator_details->project_id)->first();
        $mongo_data_existing = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$request->indicator_id)->first();
        //echo "<pre>"; print_r($mongo_data_existing); die;
        if(!empty($mongo_data_existing))
        {
            $has_summery=0;
            foreach($mongo_data_existing['data']['summary'] as $key => $data_summery)
            {
                if(date('Y-m',strtotime(mongo_date_to_regular_date($data_summery['date']))) == date('Y-m',strtotime($request->date)))
                {
                    $has_summery=1;
                    //$messege="In  this month already summary data included ";
                    //echo $messege; die;
                   // break;
                   $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->find($mongo_data_existing->id);
                   //dd($mongo_data->toArray());
                   $data_existing = $mongo_data_existing['data'];

                   $dt = date('c', strtotime($request->date));
                   //dd($dt);
                   $nDate = new MongoDB\BSON\UTCDateTime((new DateTime($request->date))->getTimestamp()*1000);

                   //dd($nDate);
                   $save_data['date'] = $nDate;
                   $save_data['data'] = (int)$request->data;
                   $save_data['target_data'] = (int)$request->target_data;;


                   //dd($save_data);
                   $data_existing['summary'][$key] = $save_data;

                   $mongo_data->data = $data_existing;

                   //dd($mongo_data->toArray());
                   $mongo_data->save();
                   $messege="Summery data is successfully Updated";


                }
            }
            //echo $mongo_data->id; die;
            if(!$has_summery) {
                $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->find($mongo_data_existing->id);
                //echo "<pre>"; print_r($mongo_data); die;

                $data_existing = $mongo_data_existing['data'];
                //echo "<pre>";
                //print_r($data_existing);
                $dt = date('c', strtotime($request->date));

                $nDate = new MongoDB\BSON\UTCDateTime((new DateTime($request->date))->getTimestamp()*1000);
                $save_data['date'] = $nDate;
                $save_data['data'] = (int)$request->data;
                $save_data['target_data'] = (int)$request->target_data;;

                $data_existing['summary'][] = $save_data;

                $mongo_data->data = $data_existing;


                $mongo_data->save();
                $messege="Summery data is successfully completed";

            }
        }else{

            $c=0;
            //$data['indicator_id']=$indicator->id;
            $dt=date('c',strtotime($request->date));
            $nDate = new MongoDB\BSON\UTCDateTime((new DateTime($request->date))->getTimestamp()*1000);
            $data['summary'][$c]['date']=$nDate;
            $data['summary'][$c]['data']=(int)$request->data;
            $data['summary'][$c]['target_data']=(int)$request->target_data;

            $mongo_data=MongoModel::setCollection($project_details->reference_table_name);

            $mongo_data->indicator_id=(int)$request->indicator_id;
            $mongo_data->data=$data;

            $mongo_data->save();

            $messege="Data summery  for this date '.$request->date.'  successfully completed.";
        }
        //end mongo

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', $messege);

        return redirect('upload-manual-data/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function get_indicator_value_from_mongo(Request $request)
    {
        $data =[];

        $project_id = Indicator::where('id',$request->indicator_id)->value('project_id');
        $reference_table_name = Project::where('id',$project_id)->value('reference_table_name');
        $date = date('Y-m-t',strtotime($request->date));
        $year = date('Y',strtotime($request->date));
        $month = date('m',strtotime($request->date));


        $mongo_data_existing = MongoModel::setCollection($reference_table_name)
                                ->where('indicator_id', (int)$request->indicator_id)
                                ->where('date',mongoFormattedDate($date))
                                ->first();

        $target_data = IndicatorTarget::where('project_id',$project_id)
            ->where('indicator_id',(int)$request->indicator_id)
            ->where('year',(int)$year)
            ->where('month',(int)$month)
            ->value('target_data');

        $data['summary'] = !empty($mongo_data_existing) ? $mongo_data_existing['summary'] : 0;
        $data['target_data'] = !empty($target_data) ? $target_data : 0;

        return json_encode($data);
    }
}
