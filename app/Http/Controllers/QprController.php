<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qpr;
use DB;
class QprController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qpr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qpr.create');
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
            'project_category_id' => 'required',
            'year' => 'required',
            'quarter' => 'required',
            'project_category_id' => 'required',
            'challenge' => 'required',
            'major_learnings' => 'required',
            'collaboration_made' => 'required',
            'resource_mobilization' => 'required',
            'resource_leveraging' => 'required',
            'major_risks' => 'required',
            'Potential_collaboration' => 'required'

        ]);


        $qpr=new Qpr;

        $qpr->category_id=$request->project_category_id;
        $qpr->year=$request->year;
        $qpr->quarter=$request->quarter;
        $qpr->challenge=$request->challenge;
        $qpr->major_learnings=$request->major_learnings;
        $qpr->collaboration_made=$request->collaboration_made;
        $qpr->resource_mobilization=$request->resource_mobilization;
        $qpr->resource_leveraging=$request->resource_leveraging;
        $qpr->major_risks=$request->major_risks;
        $qpr->Potential_collaboration=$request->Potential_collaboration;

        $qpr->save();

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Qpr data was successfully added!');

        $url=url('qpr-report')."?qpr_id=".$qpr->id;
        return redirect($url);

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
        $qpr=Qpr::find($id);
        return view('qpr.edit',compact('qpr'));
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
            'project_category_id' => 'required',
            'year' => 'required',
            'quarter' => 'required',
            'project_category_id' => 'required',
            'challenge' => 'required',
            'major_learnings' => 'required',
            'collaboration_made' => 'required',
            'resource_mobilization' => 'required',
            'resource_leveraging' => 'required',
            'major_risks' => 'required',
            'Potential_collaboration' => 'required'

        ]);


        $qpr=Qpr::find($id);

        $qpr->category_id=$request->project_category_id;
        $qpr->year=$request->year;
        $qpr->quarter=$request->quarter;
        $qpr->challenge=$request->challenge;
        $qpr->major_learnings=$request->major_learnings;
        $qpr->collaboration_made=$request->collaboration_made;
        $qpr->resource_mobilization=$request->resource_mobilization;
        $qpr->resource_leveraging=$request->resource_leveraging;
        $qpr->major_risks=$request->major_risks;
        $qpr->Potential_collaboration=$request->Potential_collaboration;

        $qpr->save();

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Qpr data was successfully Updateded!');

        $url=url('qpr-report')."?qpr_id=".$qpr->id;
        return redirect($url);
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
    public function report(Request $request)
    {
        $year= $request->year;
        $quarter= $request->quarter;
        $qpr_id=0;
        if($request->qpr_id)
        {
              $qpr_id=$request->qpr_id;
        }
        if($request->category_id != "")
        {
            $category_id=$request->category_id;
        }else{
            $category_id=0;
        }
        view()->share('category_id',$category_id);

        $qpr="";
        if($qpr_id)
        {
            $qpr= DB::table('qprs')
           ->where([
               ['id',$qpr_id],
               ['category_id',$category_id],
               ['year',$year],
               ['quarter',$quarter]
           ])->first();
           // $qpr=Qpr::where('id',$qpr_id)->first();
        }
        else if($category_id)
        {
            $qpr= DB::table('qprs')
           ->where([
               ['category_id',$category_id],
               ['year',$year],
               ['quarter',$quarter]
           ])->first();
            //$qpr=Qpr::where('category_id',$category_id)->first();
        }




        return view('qpr.report',compact('qpr'));
    }
}
