<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sector;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=Sector::query();
        if($request){
            if($request->project_id != ""){ 
                $query = $query->where('project_id', $request->project_id);
            }
        }
        $sectors = $query->orderBy('id', 'desc')->paginate(20);

       // $sectors = Sector::orderBy('id', 'desc')->paginate(20);
        return view('admin.sector.index', compact('sectors', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sector.create');
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
            'name' => 'required',
            'bangla_name' => 'required'
        ]);

        $sector = new Sector();
        $sector->project_id = $request->project_id;
        $sector->name = $request->name;
        $sector->bangla_name = $request->bangla_name;
    
        //dd($sector);
        $sector->save();

        return redirect('dashboard/sector');
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
        $sector = Sector::findOrFail($id);

        view()->share('sector', $sector);
        return view('admin.sector.edit');
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
            'name' => 'required',
            'bangla_name' => 'required'
        ];

        $Sector = Sector::findOrFail($id);
        
        $this->validate($request, $rules);
        


        $Sector->project_id = $request->input('project_id');
        $Sector->name = $request->input('name');
        $Sector->bangla_name = $request->input('bangla_name');
      
        //dd($project);
        if ($Sector->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Sector was successfully updated!');
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
    public function destroy(Request $request, $id)
    {
        $sector = Sector::findOrFail($id);
      // dd($project);
        if ($sector->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'sector was successfully removed!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect($request->redirect_to);
    }
}
