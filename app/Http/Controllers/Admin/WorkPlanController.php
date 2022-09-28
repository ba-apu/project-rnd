<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkPlan;

class WorkPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workPlans = WorkPlan::orderBy('id', 'desc')->paginate(10);
        return view('admin.workPlan.index', compact('workPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workPlan.create');
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
            'title' => 'required',
            'date' => 'required'
        ]);
        //dd($request->all());
        $date = strtotime($request->date);
        $date = date("Y-m-d",$date);

        $done_date = strtotime($request->done_date);
        $done_date = date("Y-m-d", $done_date);
       
        $workplan = new WorkPlan();
        $workplan->project_id = $request->project_id;
        $workplan->title = $request->title;
        $workplan->date = $date;
        //$workplan->details = strip_tags($request->details);
        $workplan->details = $request->details;
        $workplan->done_date = $done_date;
        //dd($workplan);
        $workplan->save();

        return redirect('dashboard/workPlan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workPlan = WorkPlan::findOrFail($id);
       //dd($workPlan);
        return view('admin.workPlan.show', compact('workPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workPlan = WorkPlan::findOrFail($id);

        view()->share('workPlan', $workPlan);
        return view('admin.workPlan.edit');
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
            'title' => 'required',
            'date' => 'required'
        ];

        $workplan = WorkPlan::findOrFail($id);
        
        $this->validate($request, $rules);
        $date = strtotime($request->date);
        $date = date("Y-m-d",$date);

        $done_date = strtotime($request->done_date);
        $done_date = date("Y-m-d", $done_date);

        $workplan->project_id = $request->input('project_id');
        $workplan->title = $request->input('title');
        $workplan->date = $date;
        $workplan->details = $request->input('details');
        $workplan->done_date = $done_date;
        //dd($project);
        if ($workplan->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Work Plan was successfully updated!');
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
