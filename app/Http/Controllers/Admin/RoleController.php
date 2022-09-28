<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash, Auth;

class RoleController extends Controller {

	public function __construct() {
//		$this->middleware('auth');
	}

	public function index(Request $request) {
		view()->share('pageTitle', 'Role');
		$role = Role::orderBy('id', 'desc')->paginate(10);

		if ($request->ajax()) {
			return view('admin.role.ajax', ['role' => $role])->render();
		}

		return view('admin.role.index')->with('role', $role);
	}

	public function create() {
		view()->share('pageTitle', "Create New Role");
		return view('admin.role.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|unique:roles,name',
			'display_name' => 'required'
		]);

		$role = new Role();
		$role->name = $request->input('name');
		$role->display_name = $request->input('display_name');
		$role->description = $request->input('description');

		if ($role->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Role was successfully added!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect('dashboard/role');
	}

	public function show($id) {

	}

	public function edit($id) {
		$role = Role::findOrFail($id);

		view()->share('role', $role);
		view()->share('pageTitle', 'Edit ' . $role->name);
		return view('admin.role.edit');
	}

	public function update(Request $request, $id) {
		$rules = [
			'name' => 'required',
			'display_name' => 'required'
		];

		$role = Role::findOrFail($id);

		if($role->name != $request->input('name')){
			$rules['name'] = 'required|unique:roles,name';
		}

		$this->validate($request, $rules);


		$role->name = $request->input('name');
		$role->display_name = $request->input('display_name');
		$role->description = $request->input('description');

		if ($role->save()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', __('lavel.successfully_updated', ['name' => ' ']) );
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', __('lavel.error_message') );
		}
		return redirect($request->redirect_to);
	}

	public function destroy(Request $request, $id) {
		$role = Role::findOrFail($id);
		if ($role->delete()) {
			$request->session()->flash('status', 'success');
			$request->session()->flash('message', 'Role was successfully removed!');
		} else {
			$request->session()->flash('status', 'danger');
			$request->session()->flash('message', 'Error Occurred!');
		}
		return redirect($request->redirect_to);
	}

}
