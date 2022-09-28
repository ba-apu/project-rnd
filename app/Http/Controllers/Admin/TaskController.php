<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tasks=Task::with('projects')->paginate(15);

        return view('admin.task.index', compact('tasks', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.create');
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
            'task_name' => 'required',
            'date' => 'required'
            //'status' => 'required'
        ]);

        $date = strtotime($request->date);
        $date = date("Y-m-d",$date);

        $task = new Task();
        $task->project_id = $request->project_id;
        $task->sector_id = 1;
        $task->task_name = $request->task_name;
        $task->amount = $request->amount;
        $task->date = $date;


       // dd($task);
        $task->save();

        return redirect('dashboard/task');
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
        $task = Task::findOrFail($id);

        view()->share('task', $task);
        return view('admin.task.edit');
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
            'task_name' => 'required',
            'date' => 'required',
            'status' => 'required'
        ];

        $task = Task::findOrFail($id);

        $date = strtotime($request->date);
        $date = date("Y-m-d",$date);

        $this->validate($request, $rules);

        $task->project_id = $request->input('project_id');
        $task->sector_id = $request->input('sector_id');
        $task->task_name = $request->input('task_name');
        $task->amount = $request->input('amount');
        $task->date = $date;
        $task->status = $request->status;

        //dd($project);
        if ($task->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Task was successfully updated!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect($request->redirect_to);
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
}
