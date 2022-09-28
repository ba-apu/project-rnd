<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\AuthController@login');
Route::post('user-help', 'Api\AuthController@user_help');
Route::post('forget-password', 'Api\AuthController@forget_password');
Route::post('pin-verify', 'Api\AuthController@pin_verify');
Route::post('new-password', 'Api\AuthController@new_password');



Route::middleware('auth:api')->group( function () {
    Route::post('dashboard', 'Api\DashboardController@index');
    Route::post('project', 'Api\DashboardController@project');
    Route::post('indicator-graph','Api\DashboardController@indicator_graph');
});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'set-notification'], function() {
    Route::get('/{id}', 'NotificationController@set_notification');
});
Route::group(['prefix' => 'graph-api'], function() {
    Route::get('/{id}', 'GraphAPIController@getIndicatorData');
});
Route::group(['prefix' => 'service-graph-api'], function() {
    Route::get('/{id}', 'GraphAPIController@getServiceData');
});

Route::get('/drr', function (Request $request) {
    $project_id = 24;
    $date = $request->date;
    $data = '{
	"status": "success",
	"code": 200,
	"response": {
		"project_name": "DRR",
		"project_id": ' .$project_id . ',
		"date": "' . $date . '",
		"data":[
			{
				"bbs_division": "001",
				"bbs_district": "002",
				"bbs_upazila": "003",
				"bbs_union": "004",
				"data":{
					"total_service_request": 5000,   
					"total_service_provided": 4000,
					"total_court_fee_amount": 50000,
					"total_active_user": 5
				}
			},
			{
				"bbs_division": "001",
				"bbs_district": "002",
				"bbs_upazila": "003",
				"bbs_union": "005",
				"data":{
					"total_service_request": 1000,   
					"total_service_provided": 2000,
					"total_court_fee_amount": 30000,
					"total_active_user": 1
				}
			},
			{
				"bbs_division": "001",
				"bbs_district": "002",
				"bbs_upazila": "003",
				"bbs_union": "006",
				"data":{
					"total_service_request": 500,   
					"total_service_provided": 1000,
					"total_court_fee_amount": 3000,
					"total_active_user": 2
				}
			}
		]
	}
}';
//    $data = '{
//	"status": "error",
//	"code": 401,
//	"response": "Unauthorized"
//}';
    return $data;
});


Route::get('/national-portal', function (Request $request) {
    $project_id = 12;
    $date = $request->date;
    $data = '{
	"status": "success",
	"code": 200,
	"response": {
		"project_name": "National Portal",
		"project_id": ' .$project_id . ',
		"date": "' . $date . '",
		"data":{
            "total_hit": "",
            "total_office": "",
            "total_office_update_regularly": "",
            "total_servie_linked_np": "",
            "total_e_srvice_lined_np": ""
        }
	}
}';
    return $data;
});

Route::get('/ekpay', function (Request $request) {
    $project_id = 25;
    $date = $request->date;
    $data = '{
        "status": "error",
        "code": 401,
        "response": "Unauthorized"
    }';
    return $data;
});
*/