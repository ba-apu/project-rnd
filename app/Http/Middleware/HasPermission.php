<?php

namespace App\Http\Middleware;


use Closure;
use Auth;
use Route;
use App\PermissionRole;
use App\Permission;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        //if this is admin access all
        if(!$user)
        {
            return redirect('login');
        }
        if($user->role == 1 || $user->role == 5)
        {
            return $next($request);
        }
        $controllerAction = class_basename(Route::currentRouteAction());
        if(strpos($controllerAction, 'create') || strpos($controllerAction, 'store') || strpos($controllerAction, 'update'))
        {
            $controllerAction=strstr($controllerAction, '@', true);
            $controllerAction .='@index';

        }
        if(strpos($controllerAction, 'edit'))
        {
            $controllerAction=strstr($controllerAction, '@', true);
            $controllerAction .='@index';

        }
        if(strpos($controllerAction, 'delete'))
        {
            $controllerAction=strstr($controllerAction, '@', true);
            $controllerAction .='@index';

        }

        $controllerAction_first = explode('@', $controllerAction)[0];

//        if(($user->role == 1 || $user->role == 3 || $user->role == 5) && $controllerAction_first == "TeamLeadController")
        if($controllerAction_first == "TeamLeadController")
        {
            $controllerAction = $controllerAction_first;
        }

        if($user->role != 3 && $controllerAction_first == "DashboardController")
        {
            $controllerAction = $controllerAction_first;
        }

        $permission=false;
        $permission_id_id=0;
        $permission_result=Permission::where('name',$controllerAction)->exists();
        $permission_id=Permission::where('name',$controllerAction)->first();
        if($permission_result)
        {
            $permission_id_id=$permission_id->id;
        }
        $permission_data=PermissionRole::where('role_id',$user->role)->where('permission_id',$permission_id_id)->exists();
        if($permission_data)
        {
            $permission=true;
        }
        if($permission){
            return $next($request);
        }
        else {
            //return 'blocked';
            return redirect('access_denied');
            //return redirect()->back()->with('flash_warning', 'you are not allowed for requesting page');
        }

        /*if($user->can($controllerAction)){
            return $next($request);
        }
        else {
            //return 'blocked';
            return redirect('access_denied');
            //return redirect()->back()->with('flash_warning', 'you are not allowed for requesting page');
        }*/
    }
}
