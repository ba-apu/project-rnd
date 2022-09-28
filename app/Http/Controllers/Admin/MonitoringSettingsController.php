<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MonitoringSetting;

class MonitoringSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitoring = MonitoringSetting::with(['projects','product_owners','team_leads','cluster_heads','managements_id'])
            ->orderBy('id', 'desc')->paginate(15);
        //dd($monitoring);
        //return json_encode($monitoring);
        return view('admin.monitoringSettings.index',compact('monitoring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monitoringSettings.create');
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
            'product_owner' => 'required',
            'product_owner_email_days' => 'required',
            'team_lead' => 'required',
            'team_lead_email_days' => 'required',
            'cluster_head' => 'required',
            'cluster_head_email_days' => 'required'

        ]);

        $monitoring=new MonitoringSetting();

        $monitoring->project_id=$request->project_id;
        $monitoring->product_owner=$request->product_owner;
        $monitoring->product_owner_email_days=$request->product_owner_email_days;
        $monitoring->team_lead=$request->team_lead;
        $monitoring->team_lead_email_days=$request->team_lead_email_days;
        $monitoring->cluster_head=$request->cluster_head;
        $monitoring->cluster_head_email_days=$request->cluster_head_email_days;
        $monitoring->management=$request->management;
        $monitoring->management_email_days=$request->management_email_days;

        $monitoring->save();
        return redirect('monitoring/get-project-wise-monitoring');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitoring = MonitoringSetting::findOrFail($id);

        view()->share('monitoring', $monitoring);
        return view('admin.monitoringSettings.edit');
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
            'product_owner' => 'required',
            'product_owner_email_days' => 'required',
            'team_lead' => 'required',
            'team_lead_email_days' => 'required',
            'cluster_head' => 'required',
            'cluster_head_email_days' => 'required'

        ]);

        $monitoring=MonitoringSetting::find($id);

        $monitoring->project_id=$request->project_id;
        $monitoring->product_owner=$request->product_owner;
        $monitoring->product_owner_email_days=$request->product_owner_email_days;
        $monitoring->team_lead=$request->team_lead;
        $monitoring->team_lead_email_days=$request->team_lead_email_days;
        $monitoring->cluster_head=$request->cluster_head;
        $monitoring->cluster_head_email_days=$request->cluster_head_email_days;
        $monitoring->management=$request->management;
        $monitoring->management_email_days=$request->management_email_days;

        $monitoring->save();
        return redirect('monitoring/get-project-wise-monitoring');
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
