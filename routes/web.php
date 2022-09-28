<?php

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function() {
    if(Auth::check()){
        return redirect()->intended('/dashboard');
    } else {
        return redirect('/login');
    }
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
////////////////////// ADMIN //////////////////////////////////////////////////
Route::group(['middleware' => ['HasPermission']], function() {
    Route::resource('/dashboard/user', 'Admin\UserController');
    Route::resource('/dashboard/role', 'Admin\RoleController');
    Route::resource('/dashboard/team', 'Admin\TeamController');
    Route::resource('/dashboard/indicator', 'Admin\IndicatorController');
    Route::get('/dashboard/indicator-status-change/{id}/{status}', 'Admin\IndicatorController@changeIndicatorStatus');
    Route::resource('/dashboard/project', 'Admin\ProjectController');
    Route::resource('/dashboard/workPlan', 'Admin\WorkPlanController');
    Route::resource('/dashboard/event', 'Admin\EventController');
    Route::resource('/dashboard/task-meta', 'Admin\TaskMetaController');
    Route::resource('/dashboard/financialprogress', 'Admin\FinancialProgressController');
    Route::resource('/dashboard/sector', 'Admin\SectorController');
    Route::resource('/dashboard/task', 'Admin\TaskController');
    Route::resource('/dashboard/project-api','ProjectApiController');
    Route::resource('/dashboard/project-categories', 'Admin\ProjectCategoriesController');
    Route::resource('manual-data-entry', 'Admin\ManualDataEntryController');
    Route::get('manual-data-authorize', 'Admin\ManualDataAuthorizedController@index');
    // data reload
    Route::resource('reload-data','Admin\ReloadData');
    Route::post('reload-data', 'Admin\ReloadData@reloadData');
    //indicator-target-set
    Route::get('/dashboard/indicator-target-set/{project_id}', 'Admin\IndicatorTargetController@index');
    Route::get('/dashboard/indicator-target-set/create/{project_id}', 'Admin\IndicatorTargetController@createForm');
    Route::post('/dashboard/indicator-target-set/store', 'Admin\IndicatorTargetController@store');
    Route::get('/dashboard/indicator-target-set/edit/{target_id}', 'Admin\IndicatorTargetController@editForm');
    Route::post('/dashboard/indicator-target-set/update', 'Admin\IndicatorTargetController@update');
    Route::any('/dashboard/make-summery', 'MakeSummeryToMongo@load_project');
    Route::resource('upload-manual-data', 'Admin\ManualDataUpload');
    //admin
    Route::any('/change-password','Admin\ChangePassword@index');
    //permission
    Route::resource('/dashboard/permission', 'Admin\PermissionComtroller');
    Route::any('/dashboard/permission-role', 'Admin\RolePermissionController@index');
    //login
    Route::any('/setting', 'SettingController@index');

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get( '/', 'DashboardController@index' );
        Route::get('/get-total-buy-progress-detail-data','DashboardController@get_buy_progress_detail_data');
        Route::get('/get-total-financial-progress-detail-data','DashboardController@get_financial_progress_detail_data');

        Route::get('/{slug}', 'SiteController@index');    //new

        Route::get('/get-buy-progress-detail-data/{id}','TeamLeadController@get_buy_progress_detail_data');
        Route::get('/get-financial-progress-detail-data/{id}','TeamLeadController@get_financial_progress_detail_data');

        Route::get('/team-lead-main/{project_category_id}', 'TeamLeadController@index');    //new
        Route::get('/indicator-wise-acquisition/{id}', 'TeamLeadController@indicator_wise_acquisition');    //new
        Route::get('/indicator-wise-prediction/{id}/{indicator_id}', 'TeamLeadController@indicator_wise_prediction');    //new
        Route::get('/team-lead-project/{id}', 'TeamLeadController@projectDashboard');    //new

        Route::any('/import/importcsv', 'FileParseController@importData');
        Route::any('/import/import-manual-indicator-csv', 'FileParseController@import_manual_indicator_csv');

        //Route::get( '/service/{service}', 'SiteController@serviceDashboard' );
        /*Route::get( '/map/{service}', 'SiteController@map' );
        Route::get( '/service-detail/{service}', 'SiteController@serviceDetail' );
        Route::get( '/service-v2/{service}', 'SiteController@serviceDetail_v1' );
        Route::get( '/cluster/{service}', 'SiteController@cluster' );*/
    });

    Route::group(['prefix' => 'monitoring'], function() {
        Route::get('/product-wise-monitoring-system','MonitoringController@project_wise_monitoring');
        Route::get('/','MonitoringController@top_level_monitoring');
        Route::resource('/get-project-wise-monitoring','Admin\MonitoringSettingsController');
    });

    Route::group(['prefix' => 'compare'], function() {
        Route::get('/indicator','CompareController@index');
    });

    Route::group(['prefix' => 'map'], function() {
        Route::get('/','MapController@index');
    });

    Route::group(['prefix'=>'report'],function (){
        Route::get('/project-wise-indicator-report','ReportController@project_wise_indicator_data_index');
        Route::get('/project-wise-indicator-data','ReportController@project_wise_indicator_data_report');
        Route::get('/generate_pdf','ReportController@generatePDF');
        Route::get('/print-friendly','ReportController@print_friendly');
    });
});

////////////////////// Ajax //////////////////////////////////////////////////
Route::group(['prefix' => 'ajax'], function() {
    Route::get('/get-last-month-target-data', 'Admin\IndicatorTargetController@getLastMonthTargetData');
    Route::get('/get-usedColumn', 'Admin\IndicatorController@getUsedColumn');
    Route::get('/check-indicator-user-category', 'Admin\IndicatorController@checkIndicatorUserCategory');
    Route::get('/get-columns', 'Admin\IndicatorController@getColumns');
    Route::get('/get-indicator-list', 'Admin\IndicatorController@get_indecator_list');
    Route::get('/get-manual-indicator-list', 'Admin\IndicatorController@get_manual_indecator_list');
    Route::get('/get-district-wise-indicator-data', 'SiteController@load_district_wise_indicator_data');
    Route::get('/get-the-dashboard-box-data', 'SiteController@get_the_dashboard_box_data');
    Route::get('/get-tasks-list', 'SiteController@get_task_list');
    Route::get('/get-map-drill-down', 'SiteController@get_map_drill_down');
    Route::get('/get-apply-amount-against-event','Admin\TaskmetaController@get_amount_against_an_event');
    Route::get('/set-user-session','SiteController@set_user_session_data');
    Route::get('/get-task','Admin\TaskMetaController@get_task');
    Route::get('/get-event','Admin\TaskMetaController@get_event');
    Route::get('/get-indicator-value-from-mongo','Admin\ManualDataUpload@get_indicator_value_from_mongo');
    Route::get('/get-indicator-wise-raw-data','SiteController@get_indicator_wise_raw_data');
    Route::get('/get-districts-for-division','SiteController@get_districts_for_division');
    Route::get('/get-upazilas-for-district','SiteController@get_upazilas_for_district');

    Route::get('/get-total-buy-progress-report-data','DashboardController@get_buy_progress_report_data');
    Route::get('/get-total-financial-progress-report-data','DashboardController@get_financial_progress_report_data');

    Route::get('/get-buy-progress-report-data','TeamLeadController@get_buy_progress_report_data');
    Route::get('/get-financial-progress-report-data','TeamLeadController@get_financial_progress_report_data');
    Route::get('/get-coefficient-api-data', 'TeamLeadController@get_coefficient_data');

    Route::get('/get-total-financial-progress-detail-data', 'DashboardController@get_financial_progress_detail_data');
    Route::get('/get-financial-progress-detail-data/{id}', 'TeamLeadController@get_financial_progress_detail_data');

    Route::get('/get-total-buy-progress-detail-data','DashboardController@get_buy_progress_detail_data');
    Route::get('/get-indicator-wise-dashboard-data','DashboardController@get_indicator_wise_dashboard_data');

    Route::get('/get-buy-progress-detail-data/{id}', 'TeamLeadController@get_buy_progress_detail_data');
    //new
    Route::get('/get-graph-data-for-service-page','SiteController@get_graph_data_for_service_page');
    Route::get('/get-project-data-report','SiteController@get_project_data_report');
    Route::get('/get-formate-manual-indicator-report-for-excel-upload','SiteController@get_formate_manual_indicator_report_for_excel_upload');
    //for financial data
    Route::get('/get-financial-progress-data','SiteController@get_financial_progress_data');
    //monitoring
    Route::get('/get-project-wise-monitoring','MonitoringController@get_project_wise_monitoring');
    Route::get('/get-manual-data','Admin\ManualDataAuthorizedController@get_manual_data');
    Route::get('/manual-data-approve','Admin\ManualDataAuthorizedController@manual_data_approve');
    Route::get('/manual-data-un-approve','Admin\ManualDataAuthorizedController@manual_data_un_approve');
    //financial
    Route::get('/get-finansial-data','SiteController@get_finansial_data');
    //new monitoring
    Route::get('/get-api-indicator-list','MonitoringController@get_api_indicator_list');
    Route::get('/get-man-indicator-list','MonitoringController@get_manual_indicator_list');
    Route::get('/man-indicator-entry','MonitoringController@man_indicator_entry');
    Route::post('/post-manual-data','Admin\ManualDataEntryController@save_man_indicator_entry');
    // event management
    Route::get('/get_work_plan_list', 'Admin\EventController@get_work_plan_list');
    //map
    Route::get('/get-map-district-wise-indicator-data', 'MapController@load_district_wise_indicator_data');
    Route::get('/get-event-list', 'SiteController@get_event_list');
    Route::get('/get-event-details', 'SiteController@get_event_details');
    Route::get('/approve-all-manual-data', 'Admin\ManualDataAuthorizedController@approve_all_manual_data');
    Route::get('/get-project-list','Admin\ProjectController@get_project_list');
    Route::get('/get-task-list','Admin\ProjectController@get_project_list');
    //team sorting ajax
    Route::get('/set-team-sorting','Admin\ProjectCategoriesController@set_team_sorting_data');
    //indicator sorting ajax
    Route::get('/set-indicator-sorting','Admin\IndicatorController@set_indicator_sorting_data');
    //get sorted indicator list
    Route::get('/get-sorted-indicator-list', 'Admin\IndicatorController@get_indecator_sorted_list');
    //delete manual data
    Route::get('/delete-manual-data', 'Admin\ManualDataEntryController@delete_manual_data');
    //get disaggrigation data
    Route::get('/get-disaggrigation-data', 'SiteController@get_disaggrigation_data');
    //get occupational data
    Route::get('/get-occupational-data', 'SiteController@get_occupational_data');
    //get task management list
    Route::get('/get-task-management-list', 'HomeController@get_task_management_list');
    // set project indicator priority 
    Route::get('/set-project-indicator-priority', 'Admin\IndicatorController@set_project_indicator_priority');
});

Route::get('dashboard/indicator-target-set/search/all', 'Admin\IndicatorTargetController@search');
////////////////////// External //////////////////////////////////////////////////
route::get('/generate-token','ApiTokenGenerateController@get_api_tokens');
Route::get('/mongo','MongoTetsterController@get_data');
Route::get('/popo','HomeController@popo');
Route::match(['get','post'],'page1','HomeController@project_page')->name('page1.project_page');
Route::post('ajax/event-list','HomeController@save_event_list');
Route::get('ajax/event-show','HomeController@show_event');
Route::get('ajax/event-edit','HomeController@edit_event');
Route::post('ajax/event-update','HomeController@update_event');
Route::any('/editplane/{id}','HomeController@edit_plan');
Route::get('/page2/{id}','HomeController@show_task');
Route::get('/page2/delete/{id}','HomeController@delete_task');
Route::get('/page2','HomeController@page2');
Route::get('/page4','HomeController@page4');
Route::get('/page5','HomeController@page5');
//graph
Route::get( 'dashboard/graph/{id}', 'SiteController@graph' );
Route::get( '/map/{service}', 'SiteController@map' );
Route::get( '/service-detail/{service}', 'SiteController@serviceDetail' );
Route::get( '/service-v2/{service}', 'SiteController@serviceDetail_v1' );
Route::get( '/cluster/{service}', 'SiteController@cluster' );
Route::get('access_denied', 'HomeController@access_denied');
Route::any('forget-password','HomeController@forget_password');
Route::any('verify','HomeController@verify');
//notification
Route::any('check-notification','NotificationController@get_notification');
Route::any('set-notification','NotificationController@set_notification');
Route::any('compare','NotificationController@get_notification');
Route::resource('general-queries','GeneralQueriesController');
Route::resource('project-data-sync','ProjectDataSyncController');
Route::get('project-data-sync/error/{id}', 'ProjectDataSyncController@error');
Route::resource('qpr','QprController');
Route::get('qpr-report','QprController@report');

Route::get('load-specific-data/{project_id}','MakeSummeryToMongo@load_specific_data');
