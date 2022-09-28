<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\ProjectCategory;
use App\Role;
use App\UserRoleMapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserMeta;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function index(Request $request)
    {
        //return 'ok';
        //self::sendMail();
        view()->share('pageTitle', 'Users');
        $users = User::where(function ($q) {
//	        $q->whereRoleIs('admin');
        })->orderby('id', 'DESC');

        if ($request->name) {
            $users = $users->where('name', "LIKE", "%" . $request->name . "%");
        }
        view()->share('name', $request->name);

        if ($request->email) {
            $users = $users->where('email', "LIKE", "%" . $request->email . "%");
        }
        view()->share('email', $request->email);

        if ($request->role) {
            $users = $users->whereRoleIs($request->role);
        }
        view()->share('role', $request->role);

        if ($request->status) {
            $status = ($request->status == 't') ? 1 : 0;
            $users = $users->where('status', "$status");
        }
        view()->share('status', $request->status);

        $users = $users->paginate(10);

        if ($request->ajax()) {
            return view('admin.user.ajax', ['users' => $users])->render();
        }

        return view('admin.user.index')->with('users', $users);
    }

    public function create()
    {
        $roles = Role::where('status',1)->pluck('display_name', 'id');
        $projectCategory = ProjectCategory::pluck('name', 'id');
        $project = Project::pluck('name', 'id');
        return view('admin.user.create', compact('roles', 'projectCategory', 'project'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|numeric',
            'status' => 'required',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required|exists:roles,id',
            'team' => 'required',
            //'project_owner' => 'required|exists:projects,id',
        ]);

        DB::beginTransaction();
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            $user->designation = $request->designation;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            $user->role = $request->roles;
            $user->team = $request->team;
            $user->project_owner = ($request->project_owner) ? json_encode(array_values(array_unique($request->project_owner))) : NULL;

            if($request->roles == 1 || $request->roles == 5){
                $user->project_owner = NULL;
            }

            $user->save();

            if($user->project_owner){
                foreach ($request->project_owner as $key => $value) {
                    $user_role_mapping = new UserRoleMapping;
                    $user_role_mapping->user_id = $user->id;
                    $user_role_mapping->project_id = $value;
                    $user_role_mapping->has_entry_permission = isset($request->data_entry[$key]) ? 1 : 0;
                    $user_role_mapping->has_approve_permission = isset($request->data_approve[$key]) ? 1 : 0;
                    $user_role_mapping->has_operation_permission = isset($request->operation[$key]) ? 1 : 0;
                    $user_role_mapping->save();
                }
            }

            // Role Management
//            $user->roleUpdate($request->roles);
            DB::commit();
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'User was successfully added!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }

        return redirect('dashboard/user');
    }

    public function show($id) {

    }

    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);
        $userRoleMapping = UserRoleMapping::where('user_id', $id)->get()->toArray();
        $roles = Role::where('status',1)->pluck('display_name', 'id');
        $projectCategory = ProjectCategory::pluck('name', 'id');
        $project = Project::pluck('name', 'id');
        return view('admin.user.edit', compact('user', 'roles', 'projectCategory', 'project', 'userRoleMapping'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required|numeric|size:11',
            'status' => 'required',
            'roles' => 'required|exists:roles,id',
            'team' => 'required|exists:teams,id'
        ];

        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            if ($user->email != $request->input('email')) {
                $rules['email'] = 'required|email|unique:users,email';
            }
            if ($request->input('password')) {
                $rules['password'] = 'required|confirmed';
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            $user->designation = $request->designation;
            $user->status = $request->status;
            $user->role = $request->roles;
            $user->team = $request->team;
            $user->project_owner = ($request->project_owner) ? json_encode(array_values(array_unique($request->project_owner))) : NULL;

            if($request->roles == 1 || $request->roles == 5){
                $user->project_owner = NULL;
            }

            if ($request->input('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();
            if($request->roles == 1 || $request->roles == 5){
                UserRoleMapping::where('user_id', $id)->delete();
            }else{
                $roleMappingIds = [];
                foreach ($request->project_owner as $key => $value) {
                    $user_role_mapping_id = UserRoleMapping::where('user_id', $user->id)->where('project_id', $value)->value('id');
                    $user_role_mapping = UserRoleMapping::findOrNew($user_role_mapping_id ? $user_role_mapping_id : '');
                    $user_role_mapping->user_id = $user->id;
                    $user_role_mapping->project_id = $value;
                    $user_role_mapping->has_entry_permission = isset($request->data_entry[$key]) ? 1 : 0;
                    $user_role_mapping->has_approve_permission = isset($request->data_approve[$key]) ? 1 : 0;
                    $user_role_mapping->has_operation_permission = isset($request->operation[$key]) ? 1 : 0;
                    $user_role_mapping->save();

                    $roleMappingIds[] = $user_role_mapping->id;
                }

                if (count($roleMappingIds)>0) {
                    UserRoleMapping::where('user_id', $id)->whereNotIn('id', $roleMappingIds)->delete();
                }
            }
//            $user->roleUpdate($request->roles);
            DB::commit();
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', __('lavel.successfully_updated', ['name' => ' ']));

        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }

        return redirect($request->redirect_to);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            UserMeta::where('user_id', $id)->delete();
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'User was successfully removed!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Error Occurred!');
        }
    }

}
