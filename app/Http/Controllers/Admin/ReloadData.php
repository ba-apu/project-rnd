<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MessageBroker;
use App\Operations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReloadData extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reload.index');
    }

    public function reloadData(Request $request){
        $project_id = $request->project_id;
        $date = $request->daterange;
        $date = date('Y-m-d', strtotime($date));

        if($date == date('Y-m-d') || $date > date('Y-m-d')){
            Session::flash('error', 'You can not select today or future date');
            return redirect()->back();
        }

        $max_operation = Operations::where('project_id', $project_id)->max('updated_at');

        $max_operation = Carbon::parse($max_operation);
        $now = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $now->diffInMinutes($max_operation);
        if($totalDuration <= 1){
            Session::flash('error', 'Please wait minimum 1 minute before next reload');
            return redirect()->back();
        }

        $operation = Operations::where('project_id', $project_id)->where('date', $date)
            ->where('to_mysql', 1)->where('to_mongo', 1)->first();

        if($operation){
//            Session::flash('error', 'Date already present');
//            return redirect()->back();
            $operation->to_mysql = 0;
            $operation->to_mongo = 0;

            $operation->save();
        }

        $mq_config = MessageBroker::where('status', 1)->where('project_id', $project_id)->first();

        $data = [
            'syncDataForDate' => date('d-M-Y', strtotime($date)),
            'dateFormat' => "dd-MMM-yyyy",
            'syncFor' => $mq_config->project_name
        ];

        app('amqp')->publish(json_encode($data), $mq_config->reload_route_key, [
            'exchange' => [
                'name'    => $mq_config->reload_exchange,
            ],
            'queue' => [
                'name'    => $mq_config->reload_queue,
            ],
        ]);

        Session::flash('success', 'Date sent for reloading data');
        return redirect('reload-data');
    }
}
