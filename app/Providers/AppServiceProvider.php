<?php

namespace App\Providers;

use App\Libraries\Encryption;
use App\OAuthClient;
use App\UserRoleMapping;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::environment('production')) {
            \URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);

        View::composer('layout.header',function($view){
            $report_module_credential = OAuthClient::where('id', 1)->where('revoked', 0)->first(['name', 'secret']);

            $str = $report_module_credential->name.
                "$$$".
                $report_module_credential->secret.
                "$$$".
                Auth::user()->id.
                "$$$".
                Auth::user()->email.
                "$$$".
                time().
                "$$$".
                '1x101'.
                "$$$".
                Auth::user()->name.
                "$$$".
                Auth::user()->mobile_no;


            $view->with('report_url', Encryption::encode($str));
        });
        View::composer('*',function($view){
            if (Auth::check()){
                $data = UserRoleMapping::where('user_id',Auth::user()->id)->get()->toArray();
                $user_role_mapping = [];
                if($data){
                    foreach($data as $value){
                        $user_role_mapping[$value['project_id']]['has_entry_permission'] = $value['has_entry_permission'];
                        $user_role_mapping[$value['project_id']]['has_approve_permission'] = $value['has_approve_permission'];
                        $user_role_mapping[$value['project_id']]['has_operation_permission'] = $value['has_operation_permission'];
                    }
                }
                $view->with('user_role_mapping', $user_role_mapping);
            }


        });
    }
}
