<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\User;

class ChangePassword extends Controller
{
    public function index(Request $request)
    {
        if($_POST)
        {
            //
            $user = Auth::user();
            $request->validate([
                'new_password' => 'required|confirmed|min:8',
                'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!\Hash::check($value, $user->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }],
            ]);
            //
            //form save
            $user_save = User::find($user->id);
            $user_save->password = Hash::make($request->new_password);
            $user_save->save();
            //success messege
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Your new password set successfully!');
        }
        return view('admin.changePassword.index');
    }
}
