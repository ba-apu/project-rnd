<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionComtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.permission.create');
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
			// 'name' => 'required',
			// 'display_name' => 'required',
			// 'description' => 'required',
        ]);
        $permission = new Permission();
		$permission->name = $request->input('name');
		$permission->display_name = $request->input('display_name');
		$permission->description = $request->input('description');
        
        if ($permission->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Permission was successfully added!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect('dashboard/permission');
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
        $permission = Permission::findOrFail($id);
		return view('admin.permission.edit', compact('permission'));
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
            // 'name' => 'required',
            // 'display_name' => 'required',
            // 'description' => 'required',
		];
        $this->validate($request, $rules);
        $permission = Permission::findOrFail($id);
		$permission->name = $request->input('name');
		$permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        
        if ($permission->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Permission was successfully updated!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect('dashboard/permission');
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
