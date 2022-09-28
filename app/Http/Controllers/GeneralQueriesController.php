<?php

namespace App\Http\Controllers;

use App\GeneralQueries;
use Illuminate\Http\Request;
use DB;

class GeneralQueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share('pageTitle', 'Users');
        $general_queries = GeneralQueries::where(function ($q){
                    })->orderby('id', 'DESC')->paginate(15);

        return view('generalQueries.index',compact('general_queries'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generalQueries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required|numeric',
            'details' => 'required',
        ],
        [
            'mobile_no.required'    => 'The mobile no must be 11 degit'
        ]);

        $general_queries = new GeneralQueries();
        $general_queries->name = $request->name;
        $general_queries->email = $request->email;
        $general_queries->mobile_no = $request->mobile_no;
        $general_queries->details = $request->details;
        //dd($general_queries);

        if($general_queries->save()){
            $request->session()->flash('message', __('lavel.general_queries_save'));
            return redirect('/login');
        }else{
            $request->session()->flash('message', __('lavel.general_queries_not_save'));
            return redirect('/general-queries');
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
        $general_queries = GeneralQueries::findOrFail($id);
        view()->share('general_queries', $general_queries);
        return view('generalQueries.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
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
