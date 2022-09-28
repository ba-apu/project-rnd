<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\TaskMeta;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = Event::orderBy('id', 'desc')->paginate(10);
       return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_id' => 'required',
            'task_id' => 'required',
            'title' => 'required',
            //'place' => 'required',
            'date' => 'required'
        ]);

        $event = new Event;
        $event->project_id = $request->project_id;
        $event->task_id = $request->task_id;
        // $event->sector_id = $request->sector_id;
        $event->title = $request->title;
        $event->place = "";
        $event->details = ($request->details == "")?" ":$request->details;
        // $event->amount=($request->amount == "")?0:$request->amount;
        $event->date = date('Y-m-d',strtotime($request->date));

        //dd($event);
        $event->save();

        //save amount to task meta
        //$this->_update_task_meta($request->task_id,$event->id,'Apply',$request->amount);

        return redirect('dashboard/event');
    }
    public function _update_task_meta($task_id,$event_id,$key,$value)
    {

            $data =TaskMeta::updateOrCreate(
                [
                    'task_id'=>$task_id,
                    'event_id'=>$event_id,
                    'key'=>$key
                ],
                [
                    'value'=>$value
                ]
            );



            if ($data) {
                return true;
            } else {
                return false;
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        view()->share('event', $event);
        return view('admin.event.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        view()->share('event', $event);
        return view('admin.event.edit');
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
        $this->validate($request, [
            'project_id' => 'required',
            'task_id' => 'required',
            'title' => 'required',
            //'place' => 'required',
            'date' => 'required'
        ]);

        $event =Event::find($id);
        $event->project_id = $request->project_id;
        $event->task_id = $request->task_id;
        //$event->sector_id = $request->sector_id;
        $event->title = $request->title;
        $event->place = "";
        $event->details = ($request->details == "")?" ":$request->details;
        //$event->amount=($request->amount == "")?0:$request->amount;
        $event->date = date('Y-m-d',strtotime($request->date));

        $event->save();

        //save amount to task meta
        //$this->_update_task_meta($request->task_id,$id,'Apply',$request->amount);

        return redirect('dashboard/event');
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

    public function get_work_plan_list(Request $request)
    {
        $project_id=$request->project_id;
        $work_plan_list=\App\Task::where('project_id',$project_id)->where('status',1)->get();
        return json_encode($work_plan_list);
    }
}
