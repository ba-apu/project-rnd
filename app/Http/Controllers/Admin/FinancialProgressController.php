<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FinancialProgress;

class FinancialProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query=FinancialProgress::query();
        if($request){
            if($request->project_id != ""){ 
                $query = $query->where('project_id', $request->project_id);
            }
        }
        $financialProgresses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.financialprogress.index', compact('financialProgresses','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.financialprogress.create');
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
           
        $financialProgress = new FinancialProgress();
        $financialProgress->project_id = $request->project_id;
        $financialProgress->estimated_expenditure = $request->estimated_expenditure;
        $financialProgress->approve_expenditure = $request->approve_expenditure;
        $financialProgress->actual_expenditure = $request->actual_expenditure;
        
        $financialProgress->save();

        return redirect('dashboard/financialprogress');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $financialProgress = FinancialProgress::findOrFail($id);
       
        view()->share('financialProgress', $financialProgress);
        return view('admin.financialprogress.show');    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $financialProgress = FinancialProgress::findOrFail($id);
       
        view()->share('financialProgress', $financialProgress);
        return view('admin.financialprogress.edit');    
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
            'project_id' => 'required'
        ];

        $financialProgress = FinancialProgress::findOrFail($id);
        
        $this->validate($request, $rules);

        $financialProgress->project_id = $request->input('project_id');
        $financialProgress->estimated_expenditure = $request->input('estimated_expenditure');
        $financialProgress->approve_expenditure = $request->input('approve_expenditure');
        $financialProgress->actual_expenditure = $request->input('actual_expenditure');
        
        if ($financialProgress->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Financial Progress was successfully updated!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }

        return redirect('dashboard/financialprogress');
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

    public function searchFinancialProgress()
    {
        $q = Input::get ( 'q' );
        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($user) > 0)
            return view('welcome')->withDetails($user)->withQuery ( $q );
        else return view ('welcome')->withMessage('No Details found. Try to search again !');
    }
}
