<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\IndicatorTarget;
use App\ManualData;
use App\Operations;
use App\Project;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Common;
use App\Area;
use Illuminate\Http\Request;
use DB;
use App\MongoModel;
use Auth;
use App\Chart;
use App\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;


class SiteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $date = [];//BanglaCalendar::convertToBgCal();
        view()->share('date', $date);
    }

    public function index(Request $request)
    {
        $slug = $request->slug;
//        if ($slug == 'digital-center') {
//            ini_set('memory_limit', '-1');
//        }

        $service_details = Project::where('slug', $slug)->first();

        $owner = Common::get_own_project();

        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            if (!in_array($service_details->id, $owner)) {
                return redirect('access_denied');
            }
        }

        $operation_date = Operations::where('project_id', $service_details->id)->where('to_mysql', 1)->where('to_mongo', 1)->max('date');

        if ($operation_date) {
            $date = $operation_date;
        }
//        else {
//            if (date('d') == 31) {
//                $date = date("Y-m-d", strtotime("-31 days"));
//            } else {
//                $date = date("Y-m-d", strtotime("-1 months"));
//            }
//        }

        $indicator_lists = Indicator::where('project_id', $service_details->id)->where('status', 1)->orderBy('priority', 'ASC')->get();
//        $without_geo_indicators = Indicator::where('project_id', $service_details->id)->where('geo_type', 0)->where('status', 1)->orderBy('priority', 'ASC')->get();
//        $without_geo_indicators = Indicator::where('project_id', $service_details->id)->where('status', 1)->orderBy('priority', 'ASC')->get();
//        if ($indicator_lists->isEmpty() || $without_geo_indicators->isEmpty()) {
        if ($indicator_lists->isEmpty()) {
            return Redirect::back()->withErrors(['msg' => 'কোনো সক্রিয় সূচক পাওয়া যায়নি ']);
        }

        $disag_indicator_lists = Indicator::where('project_id', $service_details->id)->where('status', 1)->where('indicator_user_type', 'main')->get(['bangla_name', 'indicator_user_category', 'id']);

        $indicator_status = Common::get_compare_data($date, $indicator_lists, $service_details);
        $last_update_data_count = Common::get_last_date_of_dat($service_details->id, $date);

        $date_display_intervals = Common::get_project_wise_date_interval();
//        $mainService = $slug;
//        $divisions = Area::where('type_id', '=', 4)->get();
//        $districts = Area::where('type_id', '=', 5)->get();

        $divisions_data = Area::where('type_id', '=', 4)->pluck('name', 'bbscode')->toArray();

//        $indicatorLists = Common::indicatorList($slug);
//        $serviceLists = Common::serviceList($slug);
//        $serviceProviderInfo = Common::serviceProviderInfo($slug);

//        $serviceIndicator = Common::serviceIndicatorList($slug);
//        \Session::put('serviceIndicator', $serviceIndicator);

//        $colors = Common::getColor();
//        $serviceIndicatorNote = Common::serviceIndicatorList($slug . '_note');

//        $display_section = json_decode($service_details->display_rules, true);

//service
//        $service_data = array();
//        if ($service_details->id == 3 || $service_details->id == 13) {
//            $service_data = Common::get_service_list_with_monthly_value($service_details->id);
//        }

        $service_data = Common::get_service_list($service_details->id, $date);

//        view()->share('districts', $districts);
//        view()->share('divisions', $divisions);
//        view()->share('service', $slug);
//        view()->share('mainService', $mainService);
//        view()->share('serviceLists', $serviceLists);
//        view()->share('serviceIndicatorNote', $serviceIndicatorNote);
//        view()->share('serviceProviderInfo', $serviceProviderInfo);
//        view()->share('indicatorLists', $indicatorLists);
//        view()->share('serviceIndicator', $serviceIndicator);
//        view()->share('colors', $colors);

        $date_array = Common::get_dates_for_filter($service_details->id);

//chart list
        $chart_list = array();
        $chart_list_q = Chart::get();
        foreach ($chart_list_q as $r) {
            $chart_list[$r->id] = $r->chart_name;
        }

        $has_geo_data = false;
        $total_geo_indicator = Indicator::where('project_id', $service_details->id)
            ->where('status', 1)->where('geo_type', '!=', 0)->get();

        $geo_type = 0;
        if ($total_geo_indicator->isNotEmpty()) {
            $has_geo_data = true;
            $geo_type = $total_geo_indicator[0]->geo_type;
        }

        $has_disaggrigation = false;
        $total_user_indicator = Indicator::where('project_id', $service_details->id)
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('indicator_user_type', 'main');
            })
            ->get();

        if ($total_user_indicator->isNotEmpty()) {
            $has_disaggrigation = true;
        }

        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');

        $indicator_data = [];
        $chart_data = [];

        foreach ($indicator_lists as $indicator) {
            $indicator_data[$indicator->id]['id'] = $indicator->id;
            $indicator_data[$indicator->id]['bangla_name'] = $indicator->bangla_name;
            $indicator_data[$indicator->id]['geo_type'] = $indicator->geo_type;
            $indicator_data[$indicator->id]['unit'] = $indicator->unit;

            $target_data = IndicatorTarget::where('project_id', $service_details->id)
                ->where('indicator_id', $indicator->id)
                ->where('year', $current_year)
                ->where('month', $current_month)
                ->value('target_data');

            $query = MongoModel::setCollection($service_details->reference_table_name)
                ->where('indicator_id', (int)$indicator->id);

            if ($indicator->data_process == "MAN") {
                $last_manual_operation_date = ManualData::where('indicator_id', $indicator->id)
                    ->where('is_authorized', 1)->max('date');
                if ($last_manual_operation_date) {
                    $query->where('date', mongoFormattedDate($last_manual_operation_date));
                }
            } else {
                $query->where('date', mongoFormattedDate($operation_date));
            }

            $mongo_indicator_data = $query->first();

            $real_data = 0;
            if ($mongo_indicator_data) {
                $real_data = $mongo_indicator_data['summary'];
            }

            $indicator_data[$indicator->id]['target_data'] = $target_data ? $target_data : 0;
            $indicator_data[$indicator->id]['real_data'] = $real_data;
            $indicator_data[$indicator->id]['percentage'] = 0.00;
            $indicator_data[$indicator->id]['project_id'] = $service_details->id;
            if ($target_data != 0) {
                $percentage = get_percentage_to_hundrade($real_data, $target_data);
                $indicator_data[$indicator->id]['percentage'] = round($percentage);
            }

//                if($indicator->geo_type == 0){
            $chart_data[$indicator->bangla_name] = $indicator_data[$indicator->id]['percentage'];
//                }
        }

        $selected_indicator = $indicator_lists[0]->id;
        if ($service_details->home_page_indicators) {
            $home_page_indicator = str_replace(['[', ']', '"'], '', $service_details->home_page_indicators);
            $home_page_indicator = explode(',', $home_page_indicator);
            $selected_indicator = $home_page_indicator[0];
        }

        $current_month_year = $current_month . '-' . $current_year;
        $current_month_year = english_to_bangla(Carbon::createFromFormat('m-Y', $current_month_year)->format('F, Y'));

        return view('project.project', compact('service_details', 'indicator_lists', 'selected_indicator', 'disag_indicator_lists',
            'date_display_intervals', 'indicator_status', 'date', 'service_data', 'date_array', 'chart_list', 'current_month_year', 'indicator_data', 'slug',
            'chart_data', 'last_update_data_count', 'has_disaggrigation', 'has_geo_data', 'divisions_data', 'geo_type'));
    }

    public function get_districts_for_division(Request $request)
    {
        $districts_data = [];
        if ($request->bbs_code) {
            $divisions_id = Area::where('type_id', '=', 4)->where('bbscode', '=', $request->bbs_code)->first(['id']);
            $districts_data = Area::where('type_id', '=', 5)->where('parent_id', '=', $divisions_id->id)->pluck('name', 'bbscode')->toArray();
        }
        return response()->json($districts_data);
    }

    public function get_upazilas_for_district(Request $request)
    {
        $upazila_data = [];
        if ($request->bbs_code) {
            $districts_id = Area::where('type_id', '=', 5)->where('bbscode', '=', $request->bbs_code)->first(['id']);
            $upazila_data = Area::where('type_id', '=', 6)->where('parent_id', '=', $districts_id->id)->pluck('name', 'bbscode')->toArray();
        }
        return response()->json($upazila_data);
    }

    public function serviceDetail_v1($service)
    {
        $divisions = Area::where('type_id', '=', 4)->get();
        $districts = Area::where('type_id', '=', 5)->get();

        $indicatorLists = Common::indicatorList($service);
        $serviceLists = Common::serviceList($service);
        $serviceName = Common::serviceName($service);
        $serviceProviderInfo = Common::serviceProviderInfo($service);
//        $serviceIndicator = Common::serviceIndicatorList($service);
        $sample_udc = Common::serviceList('sample_udc');
        view()->share('districts', $districts);
        view()->share('divisions', $divisions);
        view()->share('service', $service);
        view()->share('serviceLists', $serviceLists);
        view()->share('sample_udc', $sample_udc);
        view()->share('service_name', $serviceName);
        view()->share('serviceProviderInfo', $serviceProviderInfo);
        view()->share('indicatorLists', $indicatorLists);
//        view()->share('serviceIndicator', $serviceIndicator);
        return view('components.service-dashboard-backup');
    }

    public function cluster($service)
    {
        $cluster = Common::clusterName($service);
        view()->share('service_name', $cluster);
        return view('components.cluster-dashboard');
    }

    public function map($service)
    {
        $districts = Area::where('type_id', '=', 5)->get();
        $services = Common::services();
        $serviceLists = Common::serviceList('digital_centre');
//        $serviceIndicator = Common::serviceIndicatorList($service);
        $divisions = Area::where('type_id', '=', 4)->get();
        $pabna = Area::where('parent_id', '=', 989)->get();
        $serviceName = Common::serviceName($service);
        view()->share('serviceName', $serviceName);
        view()->share('divisions', $divisions);
        view()->share('services', $services);
//        view()->share('serviceIndicator', $serviceIndicator);
        view()->share('service', 'all');
        view()->share('districts', $districts);
        view()->share('serviceLists', $serviceLists);
        view()->share('pabna', $pabna);
        return view('components.map-dashboard');
    }

    public function serviceDetail($service)
    {
        $divisions = Area::where('type_id', '=', 4)->get();
        $districts = Area::where('type_id', '=', 5)->get();
        $serviceLists = Common::serviceList($service);
        $sample_udc = Common::serviceList('sample_udc');
        view()->share('districts', $districts);
        view()->share('divisions', $divisions);
        view()->share('service', $service);
        view()->share('serviceLists', $serviceLists);
        view()->share('sample_udc', $sample_udc);
        return view('components.service-detail');
    }

    public function graph($id, Request $request)
    {
        view()->share('type', $id);
        $numbers = $request->get('numbers', '1');
        $unit = $request->get('unit', 'MONTH');
        $calendarDates = Common::getCalanderDate($numbers, $unit);
        $is_service = $request->is_service;
        view()->share('is_service', $is_service);
        view()->share('calendarDates', $calendarDates);

        switch ($id) {
            case 'service_timeline':
                return view('graph/service_timeline');
                break;

            case 'service_cluster_timeline':

                $indicator_id = $request->indicator_id;
                $compare_indicator_id = $request->compare_indecator_id;
//                $graph_data = "";
                if ($compare_indicator_id == "") {
                    if ($is_service) {
                        $graph_data = Common::get_service_data($indicator_id);
                    } else {
                        $graph_data = Common::get_data($indicator_id);
                    }
                } else {
                    if ($is_service) {
                        $graph_data = Common::get_service_data_compare($indicator_id, $compare_indicator_id);
                    } else {
                        $graph_data = Common::get_data_compare($indicator_id, $compare_indicator_id);
                    }
                }
                $height = $request->get('height', '300');
                view()->share('height', $height);
                return view('graph/service_cluster_timeline', compact('graph_data'));
                break;

            case 'service_pie':
                return view('graph/service_pie');
                break;

            case 'services_lists_timeline':
                $indicator_id = $request->indicator_id;
                $graph_data = Common::service_graph_data($indicator_id);
                //echo "<pre>"; print_r($graph_data);
                return view('graph/services_lists_timeline', compact('graph_data'));
                break;

            case 'provider-timeline':
                return view('graph/provider-timeline');
                break;

            case 'provider-stability-timeline':
                return view('graph/provider-stability-timeline');
                break;


            case 'dash-board-indicator':
                return view('graph/dash-board-indicator');
                break;

            case 'office-reach':
                return view('graph/office-reach');
                break;

            case 'officer-training':
                return view('graph/officer-training');
                break;
        }
    }

    public function load_district_wise_indicator_data(Request $request)
    {
        $indicator_id = $request->indicator_id;
        $project_id = $request->project_id;
        $geo_name = $request->geo_name;
        $division_color = '#7b3525';

        $project_details = Project::where('id', $project_id)->first();
        $indicator = Indicator::where('project_id', $project_id)->where('status', 1)->where('id', $indicator_id)->first();

        if ($indicator && $indicator->geo_type == 3) {
            $has_upazila = 1;
        } elseif ($indicator->geo_type == 2 || $indicator->geo_type == 1) {
            $has_upazila = 0;
        } else {
            return response()->json([
                'error' => true,
                'message' => "Indicator is not geo type"
            ]);
        }

        $for_map_page = $request->for_map_page;
        $date = date('Y-m-d', strtotime($request->map_date));

        if ($geo_name) {
            if ($geo_name == 'division') {
                $division_id = Area::where('type_id', '=', 4)->where('bbscode', '=', $request->division_bbs_code)->value('id');
                $map_data = Area::where('type_id', '=', 5)->where('parent_id', '=', $division_id)->get();
            } elseif ($geo_name == 'district') {
                $division_id = Area::where('type_id', '=', 4)->where('bbscode', '=', $request->division_bbs_code)->value('id');
                $district_id = Area::where('type_id', '=', 5)->where('parent_id', '=', $division_id)->where('bbscode', '=', $request->district_bbs_code)->value('id');
                $map_data = Area::where('type_id', '=', 6)->where('parent_id', '=', $district_id)->get();
            } elseif ($geo_name == 'upazila') {
                $division_id = Area::where('type_id', '=', 4)->where('bbscode', '=', $request->division_bbs_code)->value('id');
                $district_id = Area::where('type_id', '=', 5)->where('parent_id', '=', $division_id)->where('bbscode', '=', $request->district_bbs_code)->value('id');
                $map_data = Area::where('type_id', '=', 6)->where('bbscode', '=', $request->upazila_bbs_code)->where('parent_id', '=', $district_id)->get();
            }
        } else {
            $map_data = Cache::remember('users', (7 * 86400), function () {
                return Area::where('type_id', '=', 5)->get();   // By Using Eloquent
            });
        }

        //mongo data
        $data = [];
        if (empty($date)) {
            $last_date = mongoFormattedDate(lastOperationDate($project_details->id));
        } else {
            $last_date = mongoFormattedDate($date);
        }

        $mongo_indicator_data = MongoModel::setCollection($project_details->reference_table_name)
            ->where('indicator_id', (int)$indicator_id)
            ->where('date', $last_date)
            ->first();

        if ($mongo_indicator_data) {
            if ($request->geo_name == 'district') {
                if (isset($mongo_indicator_data['division'][$request->division_bbs_code]['district'][$request->district_bbs_code]['upazila'])) {
                    $upazila_data_summary = $mongo_indicator_data['division'][$request->division_bbs_code]['district'][$request->district_bbs_code]['upazila'];
                    foreach ($upazila_data_summary as $upazila_bbs_code => $upazila_data) {
                        if (isset($upazila_data['summary'])) {
                            $data[$upazila_bbs_code]['value'] = $upazila_data['summary'];
                            $data[$upazila_bbs_code]['color'] = $division_color;
                        }
                    }
                }
            } else if ($request->geo_name == 'upazila') {
                if (isset($mongo_indicator_data['division'][$request->division_bbs_code]['district'][$request->district_bbs_code]['upazila'][$request->upazila_bbs_code]['summary'])) {
                    $data[$request->upazila_bbs_code]['value'] = $mongo_indicator_data['division'][$request->division_bbs_code]['district'][$request->district_bbs_code]['upazila'][$request->upazila_bbs_code]['summary'];
                    $data[$request->upazila_bbs_code]['color'] = $division_color;
                }
            } else {
                foreach ($mongo_indicator_data['division'] as $division_bbs_code => $division_summary) {
                    if ($division_bbs_code != 0) {
                        foreach ($division_summary['district'] as $district_bbs_code => $district_data) {
                            if (isset($district_data['summary'])) {
                                $data[$district_bbs_code]['value'] = $district_data['summary'];
                                $data[$district_bbs_code]['color'] = $division_color;
                            }
                        }
                    }
                }
            }
        }

        $data = $this->get_brightness_by_range($data);

        if ($request->view == 'team_lead') {
            return view('dashboard_team_lead.map_country', compact('data', 'date', 'indicator', 'has_upazila', 'map_data', 'geo_name', 'for_map_page', 'division_color'));
        }

        return view('graph/table', compact('data', 'date', 'indicator', 'has_upazila', 'map_data', 'geo_name', 'for_map_page', 'division_color'));
    }

    public function get_map_drill_down(Request $request)
    {
        $project_id = $request->project_id;
        $district_bbscode = $request->geo_id;
        $district_id = Area::where('type_id', 5)->where('bbscode', $district_bbscode)->value('id');
        $type = $request->type;
        $date = date('Y-m-d', strtotime($request->map_date));
        $division_color = '#7b3525';

        if ($date) {
            $last_operation_date = mongoFormattedDate($date);
        } else {
            $last_operation_date = mongoFormattedDate(lastOperationDate($request->project_id));
        }
        $indicator_id = $request->indicator_id;

        $data = [];
        $indicator = Indicator::where('project_id', $project_id)->where('id', $indicator_id)->first();

        if ($indicator->geo_type == 4) {
            $has_union = 1;
        } else {
            $has_union = 0;
        }

        if ($type == 3) {
            $project_details = Project::where('id', $request->project_id)->first();
            $mongo_indicator_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator_id)
                ->where('date', $last_operation_date)
                ->first();

            $upazila = Area::where('parent_id', $district_id)->where('type_id', '=', 6)->get();

            if ($mongo_indicator_data) {
                foreach ($mongo_indicator_data['division'] as $division_bbs_code => $division_summary) {
                    if ($division_bbs_code != 0) {
                        if (isset($division_summary['district'][$district_bbscode]['upazila'])) {
                            foreach ($division_summary['district'][$district_bbscode]['upazila'] as $upazila_bbs_code => $upazila_data) {
                                if (isset($upazila_data['summary'])) {
                                    $data[$upazila_bbs_code]['value'] = $upazila_data['summary'];
                                    $data[$upazila_bbs_code]['color'] = $division_color;
                                }
                            }
                        }
                    }
                }
            }

            $data = $this->get_brightness_by_range($data);
        } elseif ($type == 4) {
//            $compare_data = Common::get_compare_data($project_id, $date, $type);
            $upazila = Area::where('parent_id', $district_id)->where('type_id', '=', 6)->get();
        }

        return view('components.get_map_drill_down', compact('data', 'has_union', 'upazila', 'indicator', 'division_color'));
    }

    private function get_brightness_by_range($data)
    {

        $max_data_length = 3;
        $first_digit = 0;
        if ($data) {
            $first_digit = substr(max($data)['value'], 0, 1);
            $max_data_length = strlen(max($data)['value']);
            if ($first_digit == 9) {
                $max_data_length = $max_data_length + 1;
            }
        }
        $max_number = (str_pad($first_digit + 1, $max_data_length, 0, STR_PAD_RIGHT));
        $min_number = $max_number / 5;
        $conditions = [];
        for ($x = 0; $x <= 5; $x++) {
            if ($x == 0) {
                $conditions[$x]['start'] = $x;
                $conditions[$x]['end'] = $min_number - 1;
            } elseif ($x == 5) {
                $conditions[$x]['start'] = $conditions[$x - 1]['end'] + 1;
                $conditions[$x]['end'] = null;
            } else {
                $conditions[$x]['start'] = $conditions[$x - 1]['end'] + 1;
                $conditions[$x]['end'] = $conditions[$x - 1]['end'] + $min_number;
            }
        }
        arsort($conditions);

        foreach ($data as $key => $value) {
            $brightness = 0.5;
            foreach ($conditions as $condition) {
                if ($value['value'] >= $condition['start'] && $value['value'] <= $condition['end']) {
                    $data[$key]['brightness'] = $brightness;
                } elseif ($value['value'] >= $condition['start'] && $condition['end'] == null) {
                    $data[$key]['brightness'] = $brightness;
                }
                $brightness += 0.5;
            }
        }
        $data['range'] = $conditions;

        return $data;
    }

    public function get_the_dashboard_box_data(Request $request)
    {
        $date = date('Y-m-d');
        $last_month = date('Y-m', strtotime($date . ' -1 month'));

        $existing_list = $request->existing_list; //echo $existing_list;
        $indicator_array = explode(',', $existing_list);
        $indicator_lists = Indicator::whereIn('id', $indicator_array)->get();
        $data = array();
        foreach ($indicator_lists as $indicator_list) {
            $project_details = Project::where('id', $indicator_list->project_id)->first();

            //mongo

            $indica = 5;
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$indicator_list->id)->first();
            if (isset($mongo_data['data']['summary'])) {
                foreach ($mongo_data['data']['summary'] as $summery) {
                    $temp_date = date('Y-m', strtotime(mongo_date_to_regular_date($summery['date'])));
                    if ($temp_date == $last_month) {
                        $data[$indicator_list->id]['sum'] = $summery['data'];
                        $data[$indicator_list->id]['list'][] = $summery['data'];
                        break;
                    } else {
                        $data[$indicator_list->id]['list'][] = $summery['data'];
                        $data[$indicator_list->id]['sum'] = $summery['data'];
                        continue;
                    }
                }
            }

            $data[$indicator_list->id]['spark_line_data'] = implode(',', $data[$indicator_list->id]['list']);
            $data[$indicator_list->id]['project_name'] = $project_details->bangla_name;
            $data[$indicator_list->id]['slug'] = $project_details->slug;
        }
        return view('components/get_the_dashboard_box_data', compact('indicator_lists', 'data'));
    }

    public function get_task_list(Request $request)
    {
        $type = $request->type;
        $project_id = $request->project_id;
        $data = Common::get_transactional_data($project_id, $type);
        return view('components.task_list', compact('data', 'type'));
    }

    public function find_lowset_highest($prev_value, $currnt_value, $flag)
    {
        if ($flag == 'H') {
            if ($currnt_value > $prev_value) {
                return $currnt_value;
            } else {
                return $prev_value;
            }
        } else {
            if ($currnt_value < $prev_value) {
                return $currnt_value;
            } else {
                return $prev_value;
            }
        }
    }

    public function set_user_session_data(Request $request)
    {
        $user_id = $request->user_id;
        $page = $request->page;
        $value = $request->value;
        $flag = $request->flag;

        if ($flag == 'get') {
            $val = get_set_session_value($user_id, $page, 'GET');
            if ($val) {
                return $val;
            } else {
                return false;
            }
        } else {
            if (get_set_session_value($user_id, $page, 'SET', $value)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_indicator_wise_raw_data(Request $request)
    {
        $data = array();
        if ($request->indicator_id == "") {
            return false;
        }
        $indicator_details = Indicator::where('id', $request->indicator_id)->first();
        $project_details = Project::where('id', $indicator_details->project_id)->first();
        $mongo_data_existing = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$request->indicator_id)->first();
        if (!empty($mongo_data_existing)) {
            $data = $mongo_data_existing['data']['summary'];
        }
        //echo "<pre>"; print_r($data);
        return view('components.get_indicator_wise_raw_data', compact('data', 'indicator_details'));
    }

    public function get_graph_data_for_service_page(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $indicator_id = $request->indicator_id;
        $geo_name = $request->geo_name;
        $type = $request->type;
        $specFlag = $request->specFlag;

        $data = Common::get_graph_point($indicator_id, $from_date, $to_date, $geo_name, $request->division_bbs_code, $request->district_bbs_code, $request->upazila_bbs_code, $type, $specFlag);

        return json_encode($data);
    }

    public function get_project_data_report(Request $request)
    {
        $project_id = $request->project_id;
        $project_details = Project::where('id', $project_id)->first();
        $to_date = Carbon::parse($request->date)->format('Y-m');
        $from_date = Carbon::now()->format('Y-m');
        $indicator_lists = Indicator::where('project_id', $project_details->id)->where('status', 1)->get();
        $data = Common::get_project_data_report($project_details, $from_date, $to_date);
        $start_date = $data['start_date'];
        unset($data['start_date']);
        return view('components.get_project_data_report', compact('project_details',
            'data', 'from_date', 'to_date', 'indicator_lists', 'start_date'));
    }

    public function get_event_list(Request $request)
    {
        $event_lists = DB::table('events')
            ->join('tasks', 'tasks.id', '=', 'events.task_id')
            ->where('task_id', $request->task_id)
            ->select('events.*', 'tasks.task_name', 'tasks.date');

        $event_lists = $event_lists->get();

        return $event_lists;
    }

    public function get_event_details(Request $request)
    {
        $event_lists = Event::where('id', $request->id)->get();

        return $event_lists;
    }

    public function get_formate_manual_indicator_report_for_excel_upload(Request $request)
    {
        $project_id = $request->project_id;
//        $project_details = Project::where('id', $project_id)->first();
        //sorting process
//        $indicator_sorting = $project_details->indicator_sorting;
//        $indicator_sorting = substr($indicator_sorting, 0, -1);
//        if ($indicator_sorting == "") {
//            $indicator_sorting = 0;
//        }
//        $q = " select * from indicators where project_id=" . $project_id . " and status=1 and data_process='MAN' order by FIELD(id,$indicator_sorting) ";
//        $indicator_lists = DB::select(DB::raw($q));

        $year = date('y');
        $indicator_lists=Indicator::where('project_id',$project_id)->where('data_process','MAN')->where('status',1)->get();
        $months = ['31-01-'.$year, '28-02-'.$year, '31-03-'.$year,
            '30-04-'.$year, '31-05-'.$year, '30-06-'.$year,
            '31-07-'.$year, '31-08-'.$year, '30-09-'.$year,
            '31-10-'.$year, '30-11-'.$year, '31-12-'.$year];
        return view('components.get_formate_manual_indicator_report_for_excel_upload', compact('indicator_lists', 'months'));
    }

    public function get_disaggrigation_data(Request $request)
    {
        $project_id = $request->project_id;
        $geo_name = $request->geo_name;
        $total_user_indicator = Indicator::where('project_id', $project_id)
            ->where('indicator_user_category', $request->indicator_user_category)
            ->get(['id', 'indicator_user_type']);

        $date = date('Y-m-d', strtotime($request->date));

        if ($date) {
            $last_date = mongoFormattedDate($date);
        } else {
            $last_date = mongoFormattedDate(lastOperationDate($project_id));
        }

        $project_details = Project::where('id', $project_id)->first();

        $response = [];
        $main_value = 0;
        $gender_value[] = 0;

        foreach ($total_user_indicator as $user_indicator) {
            $male_indicator = Indicator::find($user_indicator->id);

            $response[$user_indicator->indicator_user_type]['name'] = $male_indicator->bangla_name;
            $response[$user_indicator->indicator_user_type]['unit'] = $male_indicator->unit;

            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$user_indicator->id)
                ->where('date', $last_date)
                ->where('user_category', $request->indicator_user_category)
                ->first();

            $summary_data = isset($mongo_data['summary']) ? $mongo_data['summary'] : 0;
            if ($geo_name) {
                $summary_data = Common::getGeoDataIndex($geo_name, $request->division_bbs_code, $request->district_bbs_code, $request->upazila_bbs_code, $mongo_data);
            }

            if ($user_indicator->indicator_user_type == 'main') {
                $main_value = $summary_data;
                $response[$user_indicator->indicator_user_type]['value'] = english_to_bangla(bdtFormat($summary_data));
            } else {
                $gender_value[$user_indicator->indicator_user_type] = $summary_data;
                $response[$user_indicator->indicator_user_type]['value'] = english_to_bangla(bdtFormat($summary_data));
            }
        }

        if (isset($gender_value['male'])) {
            $response['male']['pvalue'] = ($gender_value['male']) ? get_percentage_to_hundrade($gender_value['male'], $main_value) : 0;
            $response['male']['percentage'] = english_to_bangla(bdtFormat($response['male']['pvalue']));
        }

        if (isset($gender_value['female'])) {
            $response['female']['pvalue'] = ($gender_value['female']) ? get_percentage_to_hundrade($gender_value['female'], $main_value) : 0;
            $response['female']['percentage'] = english_to_bangla(bdtFormat($response['female']['pvalue']));
        }

        if (isset($gender_value['others'])) {
            $response['others']['pvalue'] = ($gender_value['others']) ? get_percentage_to_hundrade($gender_value['others'], $main_value) : 0;
            $response['others']['percentage'] = english_to_bangla(bdtFormat($response['others']['pvalue']));
        }

        return $response;
    }

    public function get_occupational_data(Request $request)
    {
        $project_id = $request->project_id;
        $date = date('Y-m-d', strtotime($request->date));
        if ($date) {
            $last_date = mongoFormattedDate($date);
        } else {
            $last_date = mongoFormattedDate(lastOperationDate($project_id));
        }
        $geo_type = $request->geo_type;
        $geo_name = $request->geo_name;

        $project_details = Project::where('id', $project_id)->first();

        $total_user_indicator = Indicator::where('project_id', $project_id)
            ->where('indicator_user_category', $request->indicator_user_category)
            ->where('indicator_user_type', '!=', 'main')
            ->get(['id', 'indicator_user_type']);

        $occupation = [];
        $occupation_percentage = [];
        $p_key = 0;

        foreach ($total_user_indicator as $user_indicator) {

            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$user_indicator->id)
                ->where('date', $last_date)
                ->where('user_category', $request->indicator_user_category)
                ->first();

            $key = 0;

            if ($geo_name) {

                $user_details = Common::getGeoDataUserDetailsIndex($geo_name, $request->division_bbs_code, $request->district_bbs_code, $request->upazila_bbs_code, $mongo_data, $geo_type);

                if ($user_details) {

                    foreach ($user_details[0] as $user_detail) {

                        $subtitle = ucfirst(str_replace('_', ' ', $user_detail['sub_title']));

                        $occupation_percentage[$subtitle][$p_key] = $user_detail['summary'];
                        $p_key++;

                        if ($user_indicator->indicator_user_type == 'male') {
                            $occupation[$subtitle]['male'][$key] = $user_detail['summary'];
                            $key++;
                        }
                        if ($user_indicator->indicator_user_type == 'female') {
                            $occupation[$subtitle]['female'][$key] = $user_detail['summary'];
                            $key++;
                        }
                        if ($user_indicator->indicator_user_type == 'others') {
                            $occupation[$subtitle]['others'][$key] = $user_detail['summary'];
                            $key++;
                        }
                    }
                }
            } else {

                if ($geo_type == 3) {

                    if (isset($mongo_data['division'])) {
                        foreach ($mongo_data['division'] as $division_summary) {
                            foreach ($division_summary['district'] as $district_data) {
                                foreach ($district_data['upazila'] as $upazila_data) {
                                    if (isset($upazila_data['user_details'])) {
                                        foreach ($upazila_data['user_details'] as $user_detail) {
                                            $subtitle = ucfirst(str_replace('_', ' ', $user_detail['sub_title']));

                                            $occupation_percentage[$subtitle][$p_key] = $user_detail['summary'];
                                            $p_key++;

                                            if ($user_indicator->indicator_user_type == 'male') {
                                                $occupation[$subtitle]['male'][$key] = $user_detail['summary'];
                                                $key++;
                                            }
                                            if ($user_indicator->indicator_user_type == 'female') {
                                                $occupation[$subtitle]['female'][$key] = $user_detail['summary'];
                                                $key++;
                                            }
                                            if ($user_indicator->indicator_user_type == 'others') {
                                                $occupation[$subtitle]['others'][$key] = $user_detail['summary'];
                                                $key++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                } elseif ($geo_type == 2) {

                    if (isset($mongo_data['division'])) {
                        foreach ($mongo_data['division'] as $division_summary) {
                            foreach ($division_summary['district'] as $district_data) {
                                if (isset($district_data['user_details'])) {
                                    foreach ($district_data['user_details'] as $user_detail) {
                                        $subtitle = ucfirst(str_replace('_', ' ', $user_detail['sub_title']));

                                        $occupation_percentage[$subtitle][$p_key] = $user_detail['summary'];
                                        $p_key++;

                                        if ($user_indicator->indicator_user_type == 'male') {
                                            $occupation[$subtitle]['male'][$key] = $user_detail['summary'];
                                            $key++;
                                        }
                                        if ($user_indicator->indicator_user_type == 'female') {
                                            $occupation[$subtitle]['female'][$key] = $user_detail['summary'];
                                            $key++;
                                        }
                                        if ($user_indicator->indicator_user_type == 'others') {
                                            $occupation[$subtitle]['others'][$key] = $user_detail['summary'];
                                            $key++;
                                        }
                                    }
                                }
                            }
                        }
                    }

                } else {

                    if (isset($mongo_data['division'])) {
                        foreach ($mongo_data['division'] as $division_data) {
                            if (isset($division_data['user_details'])) {
                                foreach ($division_data['user_details'] as $user_detail) {
                                    $subtitle = ucfirst(str_replace('_', ' ', $user_detail['sub_title']));

                                    $occupation_percentage[$subtitle][$p_key] = $user_detail['summary'];
                                    $p_key++;

                                    if ($user_indicator->indicator_user_type == 'male') {
                                        $occupation[$subtitle]['male'][$key] = $user_detail['summary'];
                                        $key++;
                                    }
                                    if ($user_indicator->indicator_user_type == 'female') {
                                        $occupation[$subtitle]['female'][$key] = $user_detail['summary'];
                                        $key++;
                                    }
                                    if ($user_indicator->indicator_user_type == 'others') {
                                        $occupation[$subtitle]['others'][$key] = $user_detail['summary'];
                                        $key++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $response['occupation_percentage'] = [];
        foreach ($occupation_percentage as $key => $occupy) {
            $response['occupation_percentage'][$key] = array_sum($occupy);
        }

        $response['data'] = [];
        foreach ($occupation as $key => $occupy) {
            foreach ($occupy as $type => $data) {
                $response['data'][$key][$type] = array_sum($data);
            }
        }

        return $response;
    }

}
