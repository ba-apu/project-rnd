<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Carbon\Carbon;

class ProjectDataSyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        view()->share('pageTitle', 'Users');
        $selectedDate="";
        $project_id="";

        $projectApiStatus = DB::table('operations')
            ->join('projects','projects.id','=','operations.project_id')
            ->select('operations.*','projects.name');  

        if($request->date){
            $date = DateTime::createFromFormat('m/d/Y', $request->date);            
            $month = $date->format('m');
            $year = $date->format('20y');
            $projectApiStatus = $projectApiStatus->whereMonth('operations.date', '=', $month);
            $projectApiStatus = $projectApiStatus->whereYear('operations.date', '=', $year);
            $selectedDate=$request->date;
        }else{
            $now = Carbon::now();
            $year = $now->year;
            $month = $now->month-1;
            //dd($year);
            $projectApiStatus = $projectApiStatus->whereMonth('operations.date', '=', $month);
            $projectApiStatus = $projectApiStatus->whereYear('operations.date', '=', $year);

            $selectedDate = $month.'/'.$now->day.'/'.$year;
        }

        if($request->project_id){
            $projectApiStatus = $projectApiStatus->where('operations.project_id', '=', $request->project_id);
            $project_id=$request->project_id;
        }
        

        $projectApiStatus=$projectApiStatus
        ->paginate(30);

        return view('admin.projectDataSync.index',compact('projectApiStatus','selectedDate','project_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        view()->share('pageTitle', 'Users');
        $projectApiDetails = DB::table('operation_logs')
            ->join('projects','projects.id','=','operation_logs.project_id')
            ->where('operation_logs.operation_id', '=', $id)
            ->select('operation_logs.*','projects.name')
            ->paginate(10);

           // dd($projectApiDetails);

        return view('admin.projectDataSync.show',compact('projectApiDetails'));

    }

    public function error($id){
        view()->share('pageTitle', 'Users');
        $projectApiDetails = DB::table('operation_logs')
            ->join('projects','projects.id','=','operation_logs.project_id')
            ->join('api_errors','api_errors.operation_logs_id','=','operation_logs.id')
            ->where('operation_logs.operation_id', '=', $id)
            ->select('operation_logs.*','projects.name','api_errors.message')
            ->paginate(10);

           // dd($projectApiDetails);

        return view('admin.projectDataSync.error',compact('projectApiDetails'));
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
}
