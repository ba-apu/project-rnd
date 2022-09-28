<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use \Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user) {
        $user_data = User::where('id',$user->id)->first();

        if(!$user_data){
            return redirect('/');
        }

        $project_owner = $user_data->project_owner;

        $url="dashboard/";

        if($project_owner == NULL || $project_owner == "")
        {
            $request->session()->put('project_access', "All");
        }else{
            $project_owner=json_decode($project_owner,1);

            if(count($project_owner) == 1)
            {
                $slug = Project::where('id', $project_owner[0])->value('slug');
                $url="dashboard/".$slug;
            }

            $project_owner_str=implode(',',$project_owner);

            $request->session()->put('project_ids', $project_owner_str);
            $request->session()->put('project_access', "Limit");
        }

        if($user->role == 3) //for team lead
        {
            $url="dashboard/team-lead-main/".$user->team;
        }

        return redirect($url);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile_no' => 'required',
        ]);

        $user = User::where(['mobile_no' => $request->get('mobile_no')])->first();

        //dd($hashedPassword);
        if($user != null && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return $this->authenticated($request, auth()->user());
        }else{
            $request->session()->flash('data', __('lavel.login_failed'));
            return redirect('/login');
        }
    }


}
