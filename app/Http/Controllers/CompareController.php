<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Common;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function index()
    {
        $owner = Common::get_own_project();
        $project_list = Project::whereIn('id', $owner)->pluck('bangla_name', 'id');

        if(Auth::user()->role == 1 || Auth::user()->role == 5){
            $project_list = Project::pluck('bangla_name', 'id');
        }

        return view('compare.index', compact('project_list'));
    }
}
