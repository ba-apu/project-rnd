<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PermissionRole;
use App\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissionData=array();
        //dd($_POST['permission_id']);
        if($_POST)
        {
            //echo "<pre>"; print_r($_POST['permission_id']); die;
            PermissionRole::where('role_id', $request->role_id)->delete();
            foreach($_POST['permission_id'] as $key=>$r)
            {
                PermissionRole::updateOrCreate(
                    [
                        'permission_id'=>$key,
                        'role_id'=>$request->role_id
                    ]
                );  
            }
            
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Save successfully !');
            return redirect(url('dashboard/permission-role?role_id='.$request->role_id));
        }
        $permissions = Permission::get();
        $role_id=$request->role_id;
        
        if(!empty($request->role_id)){
            $permissionDatas = PermissionRole::select('permission_id')->where('role_id', $role_id)->get();
            foreach($permissionDatas as  $permissionData){
                $permissionarray[$permissionData['permission_id']] = $permissionData['permission_id'];
            }
        }

        foreach ($permissions as $permission) {
            $controllerName = strtok($permission->name, '@');
            $controllerArrays[] = $controllerName;
        }
        foreach ($permissions as $key => $permission) {
            $controllerName = strtok($permission->name, '@');
            foreach ($controllerArrays as $key2 => $controllerArray) {
               if($controllerName == $controllerArray){
                    $methodArrays[$controllerName]['id'] = $permission->id;
                    $methodArrays[$controllerName]['display_name'] = $permission->display_name;
                    $methodArrays[$controllerName][substr($permission->name, strrpos($permission->name, '@' )+1)] = $permission->id;
               }
            }
        }

        return view('admin.rolePermission.edit', compact('methodArrays','permissions','role_id','permissionarray'));
    }

    
}