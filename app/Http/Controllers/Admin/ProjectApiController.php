<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\ProjectApis;
use Rap2hpoutre\FastExcel\FastExcel;

class ProjectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$project_apis = ProjectApis::all();

        $project_apis = DB::table('project_apis')
        ->join('projects','projects.id','=','project_apis.project_id')
        ->select('project_apis.*','projects.name'); 

        $project_apis = $project_apis->get();
        //dd($project_apis);
        return view('admin.projectApi.index', compact('project_apis'));

        // $sheet = (new FastExcel)->import('D:\test.xlsx');        

        // foreach ($sheet as $rowData) {
        //     foreach($rowData as $key => $indicator_data)
        //     {
        //         if($key != 'id' && $key != 'indicator_name')
        //         {
        //             $data[$rowData['id']][$key]=$indicator_data;
        //         } 
        //     }
        // }
        // dd($data);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $geo_types=\App\Common::get_geo_type();
		$tables = DB::select('select table_name from information_schema.tables where TABLE_SCHEMA="a2i_dashboard"');
        return view('admin.projectApi.create', compact('geo_types', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_id = $request->project_id;
        $method = $request->method;
        $url = $request->url;
        $param = $request->param;
        $header = $request->header;

        $mail_url = new \stdClass();
        $mail_url->method = $method;
        $mail_url->url = $url;
        $mail_url->param=json_decode($param);
        $mail_url->header=json_decode($header);

        

        $token_url = new \stdClass();
        $token_url->method = $method;
        $token_url->url = $url;

        $replace_string = "{".Self::replaceBrace($param).",".Self::replaceBrace($header)."}";
        $replace_obj=new \stdClass();
        $replace_obj->replace_url=json_decode($replace_string);



        $alter_obj =$request->alter_obj;

        $project_apis = new ProjectApis;
        $project_apis->project_id = $project_id;
        $project_apis->url_obj = json_encode($mail_url);
        $project_apis->token_url=json_encode($token_url);
        $project_apis->replace_obj=json_encode($replace_obj);
        $project_apis->alter_obj=$alter_obj;
        
        //dd($project_apis);
        
        $project_apis->save();


        return redirect('/dashboard/project-api');
       //dd($alter_obj);
    }

    private function replaceBrace($value){
        $p = str_replace('{', '', $value);
        $p = str_replace('}', '', $p);

        return $p;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_apis = DB::table('project_apis')
        ->join('projects','projects.id','=','project_apis.project_id')
        ->where('project_apis.id', '=', $id)
        ->select('project_apis.*','projects.name'); 


        $project_apis = $project_apis->get();
        //dd($project_apis);
        return view('admin.projectApi.show', compact('project_apis'));
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
