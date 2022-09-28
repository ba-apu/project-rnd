<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\TaskMeta;
use App\Task;

class TaskMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskMetas = TaskMeta::orderBy('id', 'desc')->paginate(10);
        return view('admin.taskMeta.index', compact('taskMetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.taskMeta.create');
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
        ]);
        $TaskMeta = new TaskMeta();
		$TaskMeta->task_id = $request->input('task_id');
		$TaskMeta->event_id = $request->input('event_id');
		$TaskMeta->key = $request->input('key');
        $TaskMeta->value = $request->input('amount');
        
        if ($TaskMeta->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Task Meta successfully added!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect('dashboard/task-meta');
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
        $taskMeta = TaskMeta::findOrFail($id);
        $getProjectId = Task::findOrFail($taskMeta->task_id);
        $projectIdForTaskMeta = $getProjectId->project_id;
        return view('admin.taskMeta.edit', compact('taskMeta', 'projectIdForTaskMeta'));
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
        $rules = [
			'project_id' => 'required',
		];
        $this->validate($request, $rules);
        
        $TaskMeta = TaskMeta::findOrFail($id);

		$TaskMeta->task_id = $request->input('task_id');
		$TaskMeta->event_id = $request->input('event_id');
		$TaskMeta->key = $request->input('key');
        $TaskMeta->value = $request->input('amount');
        
        if ($TaskMeta->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Task Meta was successfully updated!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect('dashboard/task-meta');
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
    public function get_amount_against_an_event(Request $request){
        $event_id=$request->event_id;
        $flag=$request->flag;

        $data=TaskMeta::where('event_id',$event_id)->where('key',$flag)->sum('value');

        dd($data);
        return $data;

    }

    public function get_task(Request $request){
        $project_id = $request->project_id;
        $taskInfo = Task::select('id', 'task_name')->where('project_id',$project_id)->get();
        return $taskInfo;
    }
    public function get_event(Request $request){
        $task_id = $request->task_id;
        $eventInfo = Event::select('id', 'title')->where('task_id',$task_id)->get();
        return $eventInfo;
    }
}
