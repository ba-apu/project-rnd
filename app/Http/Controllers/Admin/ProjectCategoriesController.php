<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectCategory;
use DB;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryname= $request->categoryname;

        if($request->categoryname == ""){
            $projectCategories = ProjectCategory::orderBy('id', 'desc')->get();
        }else{
            $projectCategories = ProjectCategory::query()
                ->where('name_en','like','%'. $categoryname.'%')
                ->orWhere('name','like','%'. $categoryname.'%')->get();
        }

        //sorting
        $sorting=get_settings('team_sorting');
        $sorting=substr($sorting, 0, -1);
        //$sorting_array=explode(',',$sorting);

        $q=" SELECT * FROM project_categories WHERE id IN ($sorting) and status=1 ORDER BY FIELD(ID,$sorting)  ";
        $q2=" SELECT * FROM project_categories WHERE id NOT IN ($sorting) and status=1  ";
        //echo $q; die;
        //2echo $q; die;
        $query = DB::select(DB::raw($q));
        $query2 = DB::select(DB::raw($q2));

        foreach($query2 as $r)
        {
            $query[]=$r;
        }
//         User::query()
//    ->where('name', 'LIKE', "%{$searchTerm}%")
//    ->orWhere('email', 'LIKE', "%{$searchTerm}%")
//    ->get();

        return view('admin.projectCategories.index', compact('projectCategories','query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projectCategories.create');
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $projectCategories = new ProjectCategory;
        $projectCategories->name = $request->name;
        $projectCategories->name_en = $request->name_en;
        $projectCategories->status = $request->status;
        $projectCategories->description = $request->description;

        if ($projectCategories->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Project Category was successfully saved!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }

        return redirect('dashboard/project-categories');
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
        $projectCategories = ProjectCategory::findOrFail($id);

        view()->share('projectCategories', $projectCategories);
        return view('admin.projectCategories.edit');
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $projectCategories = ProjectCategory::findOrFail($id);
        $projectCategories->name =$request->name;
        $projectCategories->name_en = $request->name_en;
        $projectCategories->description = $request->description;
        $projectCategories->status = $request->status;

        if ($projectCategories->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Project Category was successfully updated!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        //return redirect($request->redirect_to);
        return redirect('dashboard/project-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $projectCategories = ProjectCategory::findOrFail($id);

        if ($projectCategories->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Project was successfully removed!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect('dashboard/project-categories');
    }
    public function set_team_sorting_data(Request $request)
    {
        $value=$request->value;
        $save_data=\App\Setting::updateOrCreate(
            [
                'key'=>'team_sorting'
            ],
            [
                'value'=>$value
            ]
        );
        if($save_data){
            return 1;
        }else{
            return 0;
        }
    }
}
