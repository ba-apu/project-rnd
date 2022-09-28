<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;
use DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $projects = Project::orderBy('id', 'desc')->paginate(20);
        $search = $request->project_category_id;
        $projectname = $request->projectname;
        // $projects = DB::table('projects')
        // ->leftjoin('project_categories','project_categories.id','=','projects.project_category_id')
        // ->select('projects.*','project_categories.name as p_category_name');

        // $query=Project::query();
        //     if($request->project_category_id != ""){
        //         $query = $query->where('project_category_id', $request->project_category_id);
        //     }

        // $projects = $query->paginate(20);

        $owner = Common::get_own_project();

        $query = Project::with('projectcategories');
        $query->when($search,function($query1,$search){
            $query1->where('project_category_id', $search);
        });
        $query->when($projectname,function($query1,$projectname){
            $query1->where('name','like','%'. $projectname.'%');
        });
        if(Auth::user()->role == 3 || Auth::user()->role == 7){
            $query->whereIn('id', $owner);
        }
        $projects = $query->paginate(20);

        return view('admin.project.index',compact('projects','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'project_category_id' => 'required',
            'name' => 'required',
            'bangla_name' => 'required',
            'reference_table_name' => 'required',
//            'logo' => 'required',
        ];

        $messages = [
            'reference_table_name_unique.required' => 'দুঃখিত এই নাম একটি টেবিল রয়েছে , অন্য নাম দিয়ে আবার চেষ্টা করুন'
        ];

        if (Schema::hasTable($request->reference_table_name)) {
            $rules['reference_table_name_unique'] = 'required';
        }

        $validation = validator(
            $request->toArray(),
            $rules,
            $messages
        );

        if($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation->messages());
        } else{
            $slug = str_slug($request->name);
            $list_count = Project::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->count();
            $slug = $list_count ? "{$slug}-{$list_count}" : $slug;

            $project = new Project();
            $project->project_category_id = $request->project_category_id;
            $project->name = $request->name;
            $project->slug = $slug;
            $project->bangla_name = $request->bangla_name;
            $project->reference_table_name = $request->reference_table_name;
            if($request->reference_child_table_name){
                $project->reference_child_table_name = $request->reference_child_table_name;
            }
            if($request->reference_child_2_table_name){
                $project->reference_child_2_table_name = $request->reference_child_2_table_name;
            }
//            $project->model_name = $request->reference_table_name;
            //$project->teams = json_encode($request->teams);
//            $project->first_segment_indicator = json_encode($request->first_segment_indicator);
//            $project->second_segment_indicator = json_encode($request->second_segment_indicator);
//            $project->third_segment_indicator = json_encode($request->third_segment_indicator);

//            if ($files = $request->file('logo')) {
//                $destinationPath = public_path('/assets/img/projects/'); // upload path
//                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
//                $files->resize(75,75);
//                $files->move($destinationPath, $profileImage);
//                $project->logo=$profileImage;
//            }

            if($request->hasFile('logo')) {
                $image       = $request->file('logo');
                $filename    = trim(uniqid('Logo-' . time() . '_', true) . '.' . $image->getClientOriginalExtension());
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(75, 75);
                $image_resize->save(public_path('/assets/img/projects/' .$filename));
                $project->logo=$filename;
            }
            $project->save();
            return redirect('dashboard/project');
        }
    }

    public function edit($id, Request $request)
    {
        $project = Project::findOrFail($id);
        view()->share('project', $project);
        return view('admin.project.edit');
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
            'name' => 'required',
            'bangla_name' => 'required',
            'project_category_id' => 'required',
//            'logo' => 'required',
            'reference_table_name' => 'required',
            //'model_name' => 'required',
            //'teams' => 'required'
        ];
        $project = Project::findOrFail($id);

        $this->validate($request, $rules);

        $slug = $request->slug;
        if($slug != $project->slug || $slug == ''){
            $slug = str_slug($request->name);
            $list_count = Project::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->count();
            $slug = $list_count ? "{$slug}-{$list_count}" : $slug;
        }

        $project->project_category_id = $request->project_category_id;
        $project->name = $request->input('name');
        $project->slug = $slug;
        $project->bangla_name = $request->input('bangla_name');
        $project->reference_table_name = $request->input('reference_table_name');
        if($request->input('reference_child_table_name')){
            $project->reference_child_table_name = $request->input('reference_child_table_name');
        }
        if($request->input('reference_child_2_table_name')){
            $project->reference_child_2_table_name = $request->input('reference_child_2_table_name');
        }
        $project->model_name = $request->input('model_name');
        //$project->teams = json_encode($request->teams);
//        $project->main_indicator = json_encode($request->main_indicator);
//        $project->first_segment_name = $request->input('first_segment_name');
//        $project->first_segment_indicator = json_encode($request->first_segment_indicator);
//        $project->second_segment_name = $request->input('second_segment_name');
//        $project->second_segment_indicator = json_encode($request->second_segment_indicator);
//        $project->third_segment_name = $request->input('third_segment_name');
//        $project->third_segment_indicator = json_encode($request->third_segment_indicator);
        $project->home_page_indicators = json_encode($request->home_page_indicators);
        $project->status = $request->input('status');

        if($request->hasFile('logo')) {
            $image       = $request->file('logo');
            $filename    = trim(uniqid('Logo-' . time() . '_', true) . '.' . $image->getClientOriginalExtension());
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(75, 75);
            $image_resize->save(public_path('/assets/img/projects/' .$filename));
            $project->logo=$filename;
        }

        if ($project->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Project was successfully updated!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        //return redirect($request->redirect_to);
        return redirect('dashboard/project');
    }

    function destroy(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if ($project->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Project was successfully removed!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
        return redirect($request->redirect_to);
    }
    public function get_project_list(Request $request)
    {
        $projects="";
        if(isset($request->project_category_id))
        {
            $projects=Project::where('project_category_id',$request->project_category_id)->where('status',1)->get();
        }else{
            $projects=Project::where('status',1)->get();
        }
        return json_encode($projects);
    }

}
