<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($_POST)
        {
            foreach ($_POST as $key => $req) {

                if($key != '_token'){
                    DB::table('settings')
                        ->where('name', $key)
                        ->update(['value' => $req]);
                }

            }
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Save successfully !');
            return redirect(url('setting'));
        }
        $settings = DB::table('settings')->get();
        return view('setting.edit', compact('settings'));
    }
}
