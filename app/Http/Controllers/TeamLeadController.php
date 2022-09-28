<?php

namespace App\Http\Controllers;

use App\Area;
use App\Chart;
use App\CiProgressBuy;
use App\CiProgressFinancial;
use App\CiProgressPurchase;
use App\Common;
use App\Indicator;
use App\IndicatorTarget;
use App\Libraries\ApiCall;
use App\ManualData;
use App\MongoModel;
use App\Operations;
use App\Project;
use App\ProjectCategory;
use App\UserRoleMapping;
use Carbon\Carbon;

//use Carbon\CarbonPeriod;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TeamLeadController extends Controller
{

    public function index($project_category_id)
    {
        $owner = Common::get_own_project();
        $permitted_projects = Common::get_permitted_projects('has_operation_permission');
        $operation_view = True;
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            if($permitted_projects[0] == 0){
                $operation_view = FALSE;
            }
        }
        $query = Project::where('status', 1)->orderBy('id', 'ASC');

        if (Auth::user()->role == 1) {
            $query->where('project_category_id', $project_category_id);
        } else {
            $query->whereIn('id', $owner);
        }

        $projects = $query->get();
        if ($projects->isEmpty()) {
            return Redirect::back()->withErrors(['msg' => 'কোনো উদ্যোগ পাওয়া যায়নি ']);
        }

        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $current_monthyear = $current_month . '-' . $current_year;
        $current_month_year = english_to_bangla(Carbon::createFromFormat('m-Y', $current_monthyear)->format('F, Y'));

        $total_team_indicators = 0;
        $total_target_met_indicator_count = 0;
        $total_target_not_met_count = 0;

        $indicatorInfo = [];
        $chart_data = [];

        foreach ($projects as $project) {
            $operation_date = lastOperationDate($project->id);
            $project_indicators = Indicator::where('project_id', $project->id)->where('status', 1)->get();

            $total_indicators = 0;
            $target_met_indicator_count = 0;
            $target_not_met_indicator_count = 0;

            if ($project_indicators->isNotEmpty()) {
                $total_team_indicators += count($project_indicators);
                $total_indicators = count($project_indicators);

                foreach ($project_indicators as $indicator) {
                    $target_data = IndicatorTarget::where('project_id', $project->id)
                        ->where('indicator_id', $indicator->id)
                        ->where('year', $current_year)
                        ->where('month', $current_month)
                        ->value('target_data');

                    $query = MongoModel::setCollection($project->reference_table_name)
                        ->where('indicator_id', (int)$indicator->id);

                    if($indicator->data_process == "MAN"){
                        $last_manual_operation_date = ManualData::where('indicator_id', $indicator->id)
                            ->where('is_authorized', 1)->max('date');
                        if($last_manual_operation_date){
                            $query->where('date', mongoFormattedDate($last_manual_operation_date));
                        }
                    }else{
                        $query->where('date', mongoFormattedDate($operation_date));
                    }

                    $mongo_indicator_data = $query->first();

                    $real_data = 0;
                    if ($mongo_indicator_data) {
                        $real_data = $mongo_indicator_data['summary'];
                    }

                    if ($target_data && ($real_data == $target_data || $real_data > $target_data)) {
                        $target_met_indicator_count++;
                        $total_target_met_indicator_count++;
                    }

                    $target_not_met_indicator_count = $total_indicators - $target_met_indicator_count;
                }
            }

            $indicatorInfo[$project->id]['total_indicators'] = english_to_bangla($total_indicators);
            $indicatorInfo[$project->id]['target_met_indicator_count'] = english_to_bangla($target_met_indicator_count);
            $indicatorInfo[$project->id]['target_not_met_indicator_count'] = english_to_bangla($target_not_met_indicator_count);
            $indicatorInfo[$project->id]['last_operation_date'] = '';
            if ($operation_date) {
                $indicatorInfo[$project->id]['last_operation_date'] = english_to_bangla(date('d/m/Y', strtotime($operation_date)));
            }
            $indicator_met_target_percentage = get_percentage_to_hundrade($target_met_indicator_count, $total_indicators);
            $indicatorInfo[$project->id]['total_progress'] = round($indicator_met_target_percentage);
            $chart_data[$project->bangla_name] = $indicatorInfo[$project->id]['total_progress'];
        }

        $indicator_met_target_percentage = get_percentage_to_hundrade($target_met_indicator_count, $total_indicators);
        $indicator_met_target_percentage = number_format((float)$indicator_met_target_percentage, 2, '.', '');
        $indicator_met_target_percentage_bangla = english_to_bangla($indicator_met_target_percentage);

        $indicator_not_met_target_percentage = get_percentage_to_hundrade($target_not_met_indicator_count, $total_indicators);
        $indicator_not_met_target_percentage = number_format((float)$indicator_not_met_target_percentage, 2, '.', '');
        $indicator_not_met_target_percentage = english_to_bangla($indicator_not_met_target_percentage);

        $total_target_not_met_count = $total_team_indicators - $total_target_met_indicator_count;

//Common code for both financial and purchase Progress
        $fiscal_start_year = $current_year;
        $fiscal_end_year = ($current_year + 1);
        if ($current_month <= 6) {
            $fiscal_start_year = ($current_year - 1);
            $fiscal_end_year = $current_year;
        }
        $fiscal_start_year_month = 'July, ' . $fiscal_start_year;
        $fiscal_end_year_month = 'June, ' . $fiscal_end_year;
        $data = Common::querterly_month_range($fiscal_start_year_month);
        $querter_month_range = $data['quarter_month_range'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $query = CiProgressFinancial::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $last_data_update_date = $query->max('end_date');

        $running = Common::runnning_querter($querter_month_range);
        $approved_amount = [];
        for ($i = 1; $i <= 4; $i++) {
            $query = CiProgressFinancial::whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $project_category_id);
            }
            $approved_amount['q' . $i] = $query->sum('approved_amount');
        }
        $total_financial_year_approved = array_sum($approved_amount);

        $expenditure_amount = [];
        for ($i = 1; $i <= 4; $i++) {
            $query = CiProgressFinancial::whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $project_category_id);
            }
            $expenditure_amount['q' . $i] = $query->sum('expenditure_amount');
        }

        $expenditure_percenatge = [];
        for ($i = 1; $i <= 4; $i++) {
            $expenditure_percenatge['q' . $i] = 0;
            if ($expenditure_amount['q' . $i] && $approved_amount['q' . $i]) {
                $expenditure_percenatge['q' . $i] = get_percentage_to_hundrade($expenditure_amount['q' . $i], $approved_amount['q' . $i]);
            }
        }

        $total_financial_year_expanditure = array_sum($expenditure_amount);
        $expenditure_percentage = get_percentage_to_hundrade($total_financial_year_expanditure, $total_financial_year_approved);

//Purchase Progress
        $type_wise_purchase = [];
        for ($i = 1; $i <= 4; $i++) {

            $query = CiProgressPurchase::select(DB::raw('
                                            COUNT(CASE WHEN TYPE = "EOI" THEN 1 ELSE NULL END) AS "eoi",
                                            COUNT(CASE WHEN TYPE = "TOR" THEN 1 ELSE NULL END) AS "tor",
                                            COUNT(CASE WHEN TYPE = "Approval" THEN 1 ELSE NULL END) AS "approval",
                                            COUNT(CASE WHEN TYPE = "RFP" THEN 1 ELSE NULL END) AS "rfp",
                                            COUNT(CASE WHEN TYPE = "WorkOrder" THEN 1 ELSE NULL END) AS "workOrder"
                                            '))
                ->whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $project_category_id);
            }
            $type_wise_purchase['q' . $i] = $query->first()
                ->toArray();
        }

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $purchase_info['proposed_total_purchase'] = $query->count('status');


        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']])
            ->where('status', 'complete');
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $purchase_info['completed_purchase'] = $query->count('status');

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']])
            ->where('status', 'ongoing');
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $purchase_info['ongoing_purchase'] = $query->count('status');

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']])
            ->where('status', 'notStarted');
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $purchase_info['yet_to_start_purchase'] = $query->count('status');

        $purchase_info['completed_purchase_percentage'] = get_percentage_to_hundrade($purchase_info['completed_purchase'], $purchase_info['proposed_total_purchase']);
        $purchase_info['not_completed_purchase_percentage'] = '-';
        if ($purchase_info['completed_purchase_percentage'] != 0) {
            $purchase_info['not_completed_purchase_percentage'] = (100 - (int)$purchase_info['completed_purchase_percentage']);
        }

        return view('dashboard_team_lead.main-dashboard', compact('projects', 'project_category_id',
            'total_team_indicators', 'total_indicators', 'target_met_indicator_count', 'target_not_met_indicator_count', 'operation_view',
            'indicator_met_target_percentage', 'indicator_met_target_percentage_bangla', 'indicator_not_met_target_percentage',
            'current_month_year', 'indicatorInfo', 'chart_data', 'approved_amount', 'start_date', 'end_date', 'querter_month_range',
            'expenditure_percenatge', 'fiscal_start_year_month', 'fiscal_end_year_month', 'total_financial_year_approved', 'running', 'expenditure_percentage',
            'type_wise_purchase', 'purchase_info', 'last_data_update_date', 'total_target_not_met_count', 'total_target_met_indicator_count', 'permitted_projects'
        ));
    }

    public function indicator_wise_acquisition($project_category_id)
    {
        $owner = Common::get_own_project();

        $query = Project::where('project_category_id', $project_category_id)->where('status', 1)->orderBy('id', 'ASC');
        if (Auth::user()->role != 1) {
            $query->whereIn('id', $owner);
        }
        $projects = $query->get();

        $total_indicators = 0;
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $last_operation_date = '';
        $target_met_indicator_count = 0;

        $indicator_data = [];
        foreach ($projects as $project) {
            $operation_date = lastOperationDate($project->id);
            $project_indicators = Indicator::where('project_id', $project->id)->where('status', 1)->orderBy('priority', 'ASC')->get();

            if ($operation_date) {
                $last_operation_date = english_to_bangla(date('d F Y', strtotime($operation_date)));
            }

            if ($project_indicators->isNotEmpty()) {
                $total_indicators += count($project_indicators);

                foreach ($project_indicators as $indicator) {
                    $indicator_data[$indicator->id]['id'] = $indicator->id;
                    $indicator_data[$indicator->id]['bangla_name'] = $indicator->bangla_name;
                    $indicator_data[$indicator->id]['unit'] = $indicator->unit;

                    $target_data = IndicatorTarget::where('project_id', $project->id)
                        ->where('indicator_id', $indicator->id)
                        ->where('year', $current_year)
                        ->where('month', $current_month)
                        ->value('target_data');

                    $target_end_data = IndicatorTarget::where('project_id', $project->id)
                        ->where('indicator_id', $indicator->id)
                        ->where('year', $current_year)
                        ->where('month', '12')
                        ->value('target_data');

                    $mongo_indicator_data = MongoModel::setCollection($project->reference_table_name)
                        ->where('indicator_id', (int)$indicator->id)
                        ->where('date', mongoFormattedDate($operation_date))
                        ->first();

                    $real_data = 0;
                    if ($mongo_indicator_data) {
                        $real_data = $mongo_indicator_data['summary'];
                    }

                    if ($target_data && ($real_data == $target_data || $real_data > $target_data)) {
                        $target_met_indicator_count++;
                    }

                    $indicator_data[$indicator->id]['target_data'] = $target_data ? $target_data : 0;
                    $indicator_data[$indicator->id]['real_data'] = $real_data;
                    $indicator_data[$indicator->id]['percentage'] = 0.00;
                    $indicator_data[$indicator->id]['project_id'] = $project->id;
                    $indicator_data[$indicator->id]['project_name'] = $project->bangla_name;
                    if ($target_data != 0) {
                        $percentage = get_percentage_to_hundrade($real_data, $target_data);
                        $indicator_data[$indicator->id]['percentage'] = round($percentage);
                    }

                    $indicator_data[$indicator->id]['target_end_real_data'] = $real_data ? $real_data : 0;
                    $indicator_data[$indicator->id]['target_end_data'] = $target_end_data ? $target_end_data : 0;
                    $indicator_data[$indicator->id]['target_end_percentage'] = 0.00;
                    if ($real_data != 0 && $target_end_data != 0) {
                        $target_end_percentage = get_percentage_to_hundrade($real_data, $target_end_data);
                        $indicator_data[$indicator->id]['target_end_percentage'] = round($target_end_percentage);
                    }

                }
            }
        }
        if ($total_indicators == 0) {
            return Redirect::back()->withErrors(['msg' => 'কোনো সক্রিয় সূচক পাওয়া যায়নি ']);
        }

        $target_not_met_indicator_count = $total_indicators - $target_met_indicator_count;

        $indicator_met_target_percentage = get_percentage_to_hundrade($target_met_indicator_count, $total_indicators);
        $indicator_met_target_percentage = number_format((float)$indicator_met_target_percentage, 2, '.', '');
        $indicator_met_target_percentage_bangla = english_to_bangla($indicator_met_target_percentage);

        $indicator_not_met_target_percentage = get_percentage_to_hundrade($target_not_met_indicator_count, $total_indicators);
        $indicator_not_met_target_percentage = number_format((float)$indicator_not_met_target_percentage, 2, '.', '');
        $indicator_not_met_target_percentage = english_to_bangla($indicator_not_met_target_percentage);

        $current_month_year = $current_month . '-' . $current_year;
        $current_month_year = english_to_bangla(Carbon::createFromFormat('m-Y', $current_month_year)->format('F, Y'));

        return view('dashboard_team_lead.indicatorWiseAcquisition', compact('projects', 'project_category_id',
            'current_month_year', 'current_year', 'last_operation_date', 'indicator_data', 'target_met_indicator_count', 'target_not_met_indicator_count',
            'indicator_met_target_percentage_bangla', 'indicator_not_met_target_percentage', 'indicator_met_target_percentage', 'total_indicators'
        ));
    }

    public function projectDashboard($project_id)
    {
        $owner = Common::get_own_project();

        if (Auth::user()->role != 1 && !in_array($project_id, $owner)) {
            return redirect('access_denied');
        }

        $project = Project::where('id', $project_id)->where('status', 1)->first();

        $total_indicators = 0;
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $last_operation_date = '';

        $indicator_data = [];
        $chart_data = [];
        $compare_data = [];

        $divisions = Area::where('type_id', '=', 4)->pluck('name', 'bbscode')->toArray();

        $operation_date = lastOperationDate($project_id);

        //$date = last operation date
        if ($operation_date) {
            $date = $operation_date;
            $last_operation_date = english_to_bangla(date('d F Y', strtotime($operation_date)));
        }
//        else {
//            if (date('d') == 31) {
//                $date = date("Y-m-d", strtotime("-31 days"));
//            } else {
//                $date = date("Y-m-d", strtotime("-1 months"));
//            }
//        }

//        $project_indicators = Indicator::where('project_id', $project->id)->where('geo_type', 0)->where('status', 1)->orderBy('priority', 'ASC')->get();
        $project_indicators = Indicator::where('project_id', $project->id)->where('status', 1)->orderBy('priority', 'ASC')->get();

        if ($project_indicators->isEmpty()) {
            return Redirect::back()->withErrors(['msg' => 'কোনো সক্রিয় সূচক পাওয়া যায়নি ']);
        }

        if ($project_indicators->isNotEmpty()) {
            $total_indicators += count($project_indicators);
            foreach ($project_indicators as $indicator) {
                $indicator_data[$indicator->id]['id'] = $indicator->id;
                $indicator_data[$indicator->id]['bangla_name'] = $indicator->bangla_name;
                $indicator_data[$indicator->id]['geo_type'] = $indicator->geo_type;
                $indicator_data[$indicator->id]['unit'] = $indicator->unit;

                $target_data = IndicatorTarget::where('project_id', $project->id)
                    ->where('indicator_id', $indicator->id)
                    ->where('year', $current_year)
                    ->where('month', $current_month)
                    ->value('target_data');

                $query = MongoModel::setCollection($project->reference_table_name)
                    ->where('indicator_id', (int)$indicator->id);

                if($indicator->data_process == "MAN"){
                    $last_manual_operation_date = ManualData::where('indicator_id', $indicator->id)
                        ->where('is_authorized', 1)->max('date');
                    if($last_manual_operation_date){
                        $query->where('date', mongoFormattedDate($last_manual_operation_date));
                    }
                }else{
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
                $indicator_data[$indicator->id]['project_id'] = $project->id;
                if ($target_data != 0) {
                    $percentage = get_percentage_to_hundrade($real_data, $target_data);
                    $indicator_data[$indicator->id]['percentage'] = round($percentage);
                }

//                if($indicator->geo_type == 0) {
                $chart_data[$indicator->bangla_name] = $indicator_data[$indicator->id]['percentage'];
                $compare_data[$indicator->id]['id'] = $indicator->id;
                $compare_data[$indicator->id]['bangla_name'] = $indicator->bangla_name;
//                }
            }
        }

        if ($total_indicators == 0) {
            return Redirect::back()->withErrors(['msg' => 'কোনো সক্রিয় সূচক পাওয়া যায়নি']);
        }

        $compare_indicator_lists = [];
        foreach ($indicator_data as $key => $info) {
            if ($info['geo_type'] == 0) {
                $compare_indicator_lists[] = $info;
            }
        }

        $has_disaggregation = false;
        $total_user_indicator = Indicator::where('project_id', $project->id)
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('indicator_user_type', 'main');
            })
            ->get();

        if ($total_user_indicator->isNotEmpty()) {
            $has_disaggregation = true;
        }

        $has_geo_data = false;
        $total_geo_indicator = Indicator::where('project_id', $project->id)
            ->where('status', 1)->where('geo_type', '!=', 0)->get();

        $geo_type = 0;
        if ($total_geo_indicator->isNotEmpty()) {
            $has_geo_data = true;
            $geo_type = $total_geo_indicator[0]->geo_type;
        }

        $disag_indicator_lists = Indicator::where('project_id', $project->id)->where('status', 1)->where('indicator_user_type', 'main')->get(['bangla_name', 'indicator_user_category', 'id']);

        $current_month_year = $current_month . '-' . $current_year;
        $current_month_year = english_to_bangla(Carbon::createFromFormat('m-Y', $current_month_year)->format('F, Y'));

        $date_array['all'] = date("Y-m-d", strtotime("-10 years", strtotime($date)));
        $date_array['daily'] = "daily";
        $date_array['current_date'] = $date;
        $date_array['3month'] = date("Y-m-d", strtotime("-3 months", strtotime($date)));
        $date_array['6month'] = date("Y-m-d", strtotime("-6 months", strtotime($date)));
        $date_array['9month'] = date("Y-m-d", strtotime("-9 months", strtotime($date)));
        $date_array['3month'] = date("Y-m-d", strtotime("-3 months", strtotime($date)));;
        $date_array['12month'] = date("Y-m-d", strtotime("-12 months", strtotime($date)));

        return view('dashboard_team_lead.project-dashboard', compact(
            'current_month_year', 'chart_data', 'compare_data', 'current_year', 'last_operation_date',
            'indicator_data', 'total_indicators', 'date_array', 'divisions', 'date', 'project',
            'has_disaggregation', 'disag_indicator_lists', 'total_geo_indicator', 'has_geo_data', 'geo_type', 'compare_indicator_lists'
        ));
    }

    public function get_buy_progress_report_data(Request $request)
    {
        $types = ['TOR', 'Approval', 'EOI', 'RFP', 'WorkOrder'];
        $report_data = [];
        $permitted_projects = Common::get_permitted_projects('has_operation_permission');

        foreach ($types as $type) {
            $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date])
                ->where('type', $type);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $request->team_id);
            }
            $report_data[$type]['total'] = $query->count('status');

            $query = CiProgressPurchase::where('expenditure_date', '<', $request->end_date)
                ->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->where('type', $type);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $request->team_id);
            }
            $report_data[$type]['within_time_line'] = $query->count('status');

            $query = CiProgressPurchase::where('expenditure_date', '>', $request->end_date)
                ->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->where('type', $type);
            if (Auth::user()->role != 1) {
                $query->whereIn('project_id', $permitted_projects);
            } else {
                $query->where('team_id', $request->team_id);
            }
            $report_data[$type]['exceed_time_line'] = $query->count('status');
        }

        $left_days = '-';
        $total_incomplete_purchase = 0;
        $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $request->team_id);
        }
        $max_end_date = $query->max('end_date');

        if ($max_end_date) {
            $max_end_date = new DateTime(date('Y-m-d', strtotime($max_end_date)));
            $today = new DateTime(date('Y-m-d'));
            if ($today < $max_end_date) {
                $left_days = date_diff($max_end_date, $today)->days;
                $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date]);
                if (Auth::user()->role != 1) {
                    $query->whereIn('project_id', $permitted_projects);
                } else {
                    $query->where('team_id', $request->team_id);
                }
                $total_incomplete_purchase = $query->where('status', '!=', 'complete')
                    ->count();
            }
        }

        return view("dashboard_team_lead.side-chart", compact('report_data', 'left_days', 'total_incomplete_purchase'));
    }

    public function get_financial_progress_report_data(Request $request)
    {
        $permitted_projects = Common::get_permitted_projects('has_operation_permission');
        $end_date = Carbon::parse($request->end_date);
        $now = Carbon::now()->format('Y-m-d');
        $time_left = strtotime($end_date) - strtotime($now);
        $time_left = round($time_left / (86400));

        $query = CiProgressFinancial::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $request->team_id);
        }
        $approved_amount = $query->sum('approved_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $request->team_id);
        }
        $expenditure_amount = $query->sum('expenditure_amount');

        $unused_amount = ($approved_amount - $expenditure_amount);
        $unused_percentage = ($approved_amount && $unused_amount) ? get_percentage_to_hundrade($unused_amount, $approved_amount) : 0;
        $q_name = $request->q_name;
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->format('F, Y');
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->format('F, Y');

        if (Auth::user()->role != 1) {
            $permitted_projects = '(' . implode(',', $permitted_projects) . ')';
            $query_var = "project_id IN $permitted_projects AND ";
        } else {
            $query_var = "team_id = '$request->team_id' AND ";
        }

        $spending_initiatives = DB::select("SELECT activity_type,SUM(approved_amount) Allocated,SUM(expenditure_amount) Used,SUM(UnUsed) UnUsed
                                FROM (SELECT activity_type, approved_amount, expenditure_amount,(approved_amount-expenditure_amount) UnUsed
                                FROM ci_progress_financial WHERE $query_var start_date BETWEEN '$request->start_date' AND '$request->end_date') sub
                                GROUP BY activity_type");

        return view("dashboard_team_lead.financial-side-chart",
            compact('time_left', 'approved_amount', 'spending_initiatives',
                'unused_amount', 'unused_percentage', 'q_name', 'start_date', 'end_date'));
    }

    public function get_financial_progress_detail_data(Request $request, $project_category_id)
    {
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $current_month_year = Carbon::createFromFormat('m-Y', $current_month . '-' . $current_year);
        $financial_start_year = $current_year;
        $financial_end_year = ($current_year + 1);
        if ($current_month <= 6) {
            $financial_start_year = ($current_year - 1);
            $financial_end_year = $current_year;
        }
        $financial_start_year_month = '06-' . $financial_start_year;
        $financial_start_date = Carbon::createFromFormat('m-Y', $financial_start_year_month)->firstOfMonth()->format('Y-m-d');

        $financial_end_year_month = '06-' . $financial_end_year;
        $financial_end_date = Carbon::createFromFormat('m-Y', $financial_end_year_month)->LastOfMonth()->format('Y-m-d');

        $permitted_projects = Common::get_permitted_projects('has_operation_permission');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $approved_amount = $query->sum('approved_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $expenditure_amount = $query->sum('expenditure_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $disburse_amount = $query->sum('disbursement_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1) {
            $query->whereIn('project_id', $permitted_projects);
        } else {
            $query->where('team_id', $project_category_id);
        }
        $data = $query->get();

        if ($request->ajax()) {
            return view('dashboard_team_lead.get_financial_project_data_report',
                compact('data', 'financial_end_date'));
        }

        $initiative_options = CiProgressFinancial::select('initiative')->distinct()->get()->toArray();
        $status_options = CiProgressFinancial::select('status')->distinct()->get()->toArray();
        $fund_source_options = CiProgressFinancial::select('fund_source')->distinct()->get()->toArray();

        $unused_amount = $approved_amount - $expenditure_amount;
        $unused_amount_percentage = 0;
        if ($unused_amount && $approved_amount) {
            $unused_amount_percentage = get_percentage_to_hundrade($unused_amount, $approved_amount);
        }
        $financial_end_year_month_format = Carbon::createFromFormat('m-Y', $financial_end_year_month);
        $diffInMonths = $current_month_year->diffInMonths($financial_end_year_month_format);

        $permitted_projects = '(' . implode(',', $permitted_projects) . ')';

        if (Auth::user()->role != 1) {
            $query_var = "project_id IN $permitted_projects AND ";
        } else {
            $query_var = "team_id = '$project_category_id' AND ";
        }

        $spending_initiatives = DB::select("SELECT activity_type,SUM(approved_amount) Allocated,SUM(expenditure_amount) Used,SUM(UnUsed) UnUsed
                                FROM (SELECT activity_type, approved_amount, expenditure_amount, (approved_amount-expenditure_amount) UnUsed
                                FROM ci_progress_financial WHERE $query_var start_date BETWEEN '$financial_start_date' AND '$financial_end_date') sub
                                GROUP BY activity_type");

        $fund_sources = DB::select("SELECT fund_source,SUM(approved_amount) Allocated,SUM(expenditure_amount) Used,SUM(UnUsed) UnUsed,
                                ((SUM(expenditure_amount)/SUM(approved_amount))*100) Percentage
                                FROM (SELECT fund_source, approved_amount, expenditure_amount, (approved_amount-expenditure_amount) UnUsed
                                FROM ci_progress_financial WHERE $query_var start_date BETWEEN '$financial_start_date' AND '$financial_end_date') sub
                                GROUP BY fund_source");

        $spending_data = [];
        if ($spending_initiatives) {
            foreach ($spending_initiatives as $spending) {
                $spending_data[$spending->activity_type] = get_percentage_to_hundrade($spending->UnUsed, $unused_amount);
            }
        }
        $doughnut_data = [];
        if ($fund_sources) {
            foreach ($fund_sources as $fund_source) {
                $doughnut_data[$fund_source->fund_source] = $fund_source->Percentage;
            }
        }

        return view('dashboard_team_lead.financial-progress-details',
            compact('approved_amount', 'expenditure_amount', 'unused_amount', 'data', 'disburse_amount', 'spending_data', 'status_options', 'initiative_options', 'fund_source_options',
                'doughnut_data', 'fund_sources', 'spending_initiatives', 'diffInMonths', 'unused_amount_percentage', 'financial_end_date', 'project_category_id'));
    }

    public function get_buy_progress_detail_data(Request $request, $project_category_id)
    {
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $financial_start_year = $current_year;
        $financial_end_year = ($current_year + 1);
        if ($current_month <= 6) {
            $financial_start_year = ($current_year - 1);
            $financial_end_year = $current_year;
        }

        $financial_start_year_month = 'July-' . $financial_start_year;
        $financial_start_date = Carbon::parse($financial_start_year_month)->format('Y-m-t');

        $financial_end_year_month = 'June-' . $financial_end_year;
        $financial_end_date = Carbon::parse($financial_end_year_month)->format('Y-m-t');

        if (Auth::user()->role != 1) {
            $permitted_projects = Common::get_permitted_projects('has_operation_permission');
            $permitted_projects = '(' . implode(',', $permitted_projects) . ')';
            $query_var = "project_id IN $permitted_projects AND ";
        } else {
            $query_var = "team_id = '$project_category_id' AND ";
        }

        $data = DB::select("SELECT
                       team_name,type,start_date,end_date,expenditure_date,status,
                       DATEDIFF(end_date, start_date) AS 'proposed_date' FROM `ci_progress_purchase`
                    WHERE $query_var start_date BETWEEN '$financial_start_date' AND '$financial_end_date'
                    GROUP BY type");

        $purchase_report_data = [];

        foreach ($data as $key => $data) {
            $start_date = ($data->start_date) ? Carbon::createFromFormat('Y-m-d', $data->start_date) : 0;
            $end_date = ($data->end_date) ? Carbon::createFromFormat('Y-m-d', $data->end_date) : 0;
            $expenditure_date = ($data->expenditure_date) ? Carbon::createFromFormat('Y-m-d', $data->end_date) : 0;

            $purchase_report_data[$data->team_name][$key]['type'] = $data->type;
            $purchase_report_data[$data->team_name][$key]['end_date'] = $data->end_date;
            $purchase_report_data[$data->team_name][$key]['expend_date'] = $expenditure_date;
            $purchase_report_data[$data->team_name][$key]['exact_date'] = ($data->status == 'complete') ? $start_date->diffInDays($expenditure_date) : '-';
            $purchase_report_data[$data->team_name][$key]['proposed_date'] = $data->proposed_date;
            $purchase_report_data[$data->team_name][$key]['status'] = $data->status;
            $purchase_report_data[$data->team_name][$key]['color'] = 'danger';
            if ($data->status == 'complete' && $expenditure_date <= $end_date) {
                $purchase_report_data[$data->team_name][$key]['prolonged_time'] = '-';
                $purchase_report_data[$data->team_name][$key]['color'] = 'black';
            } elseif ($data->status == 'complete' && $expenditure_date > $end_date) {
                $purchase_report_data[$data->team_name][$key]['prolonged_time'] = $end_date->diffInDays($expenditure_date);
            } else {
                $purchase_report_data[$data->team_name][$key]['prolonged_time'] = $end_date->diffInDays(date('Y-m-d'));
            }

        }
        if ($request->ajax()) {
            return view('dashboard_team_lead.get_buy_progress_data_report',
                compact('purchase_report_data'));
        }

        return view('dashboard_team_lead.buy-progress-details',
            compact('purchase_report_data', 'financial_start_year_month', 'financial_end_year_month', 'project_category_id'));
    }

    public function indicator_wise_prediction($project_id, $indicator_id)
    {
        $project = Project::where('id', $project_id)->where('status', 1)->first();
        $collection_name = $project->reference_table_name;

        $monthly_date_range = [];
        $monthly_filtered_data = [];

        $from_date = date('Y-m-01', strtotime("-9 month"));
        $to_date = date('Y-m-d');

        $from_date_in_dateTime = new DateTime($from_date);
        $to_date_in_dateTime = new DateTime($to_date);

        if($to_date == date('Y-m-t', strtotime($to_date))){
            $period = count(CarbonPeriod::create($from_date_in_dateTime, $to_date_in_dateTime)->month()) + 1;
        }else{
            $period = $to_date_in_dateTime->diff($from_date_in_dateTime)->m +
                ($to_date_in_dateTime->diff($from_date_in_dateTime)->y * 12);
        }

        $current_date = Carbon::now();

        for ($i = 0; $i < $period; $i++) {
            $monthly_date_range[$current_date->format('Y-m')]['year'] = $current_date->format('Y');
            $monthly_date_range[$current_date->format('Y-m')]['month'] = $current_date->format('m');
            $current_date->subMonths(1)->format('Y-m');
        }

        $last_operation_dates = max_operation_dates($monthly_date_range, $project->id);

        $mongo_data = MongoModel::setCollection($collection_name)
            ->where('indicator_id', (int)$indicator_id)
            ->whereIn('date', $last_operation_dates)
            ->orderBy('date', 'ASC')
            ->get();

        if ($mongo_data) {

            foreach ($mongo_data as $summary_data) {
                $year = date('Y', strtotime(mongo_date_to_regular_date($summary_data['date'])));
                $month = date('m', strtotime(mongo_date_to_regular_date($summary_data['date'])));
                $target_data = IndicatorTarget::where('indicator_id', $indicator_id)->where('year', $year)->where('month', $month)->value('target_data');
                $date = date('M-Y', strtotime(mongo_date_to_regular_date($summary_data['date'])));
                $monthly_filtered_data[$date]['month'] = $date;
                $monthly_filtered_data[$date]['observed'] = $summary_data['summary'];
                $monthly_filtered_data[$date]['target'] = $target_data ? $target_data : 0;
            }

        }

        $dissection_month = 0;

        if ($monthly_filtered_data) {
            $monthly_filtered_data = array_slice($monthly_filtered_data, -9);
            $monthly_filtered_data_count = count($monthly_filtered_data);

            $i = 0;
            foreach ($monthly_filtered_data as $key => $value) {

                if (++$i === $monthly_filtered_data_count) {
                    $monthly_filtered_data[$key]['projection'] = $value['observed'];
                    $monthly_filtered_data[$key]['bullet'] = true;

                    $dissection_month = $value['month'];
                }

            }
        }

        $forecast_from_date = date('Y-m', strtotime($to_date . " +1 month")) . "-01";
        $forecast_to_date = date('Y-m-d', strtotime($to_date . " +3 month"));

        $forecast_api_params = [
            'start_date' => $forecast_from_date,
            'end_date' => $forecast_to_date,
            'collection_name' => $collection_name,
            'indicator_id' => $indicator_id
        ];

        $forecast = new ApiCall();
        $forecast_raw_data = $forecast->callApi($forecast_api_params, 'forecast_service_url');

        $monthly_forecast_data = [];
        if ($forecast_raw_data['data']) {

            foreach ($forecast_raw_data['data'] as $key => $value) {
                $last_date = date("Y-m-t", strtotime($key));

                if ($key == $last_date) {

                    $year = date('Y', strtotime($key));
                    $month = date('m', strtotime($key));
                    $target_data = IndicatorTarget::where('indicator_id', $indicator_id)->where('year', $year)->where('month', $month)->value('target_data');

                    $date = date('M-Y', strtotime($key));
                    $monthly_forecast_data[$date]['month'] = $date;
                    $monthly_forecast_data[$date]['projection'] = $value;
                    $monthly_forecast_data[$date]['target'] = $target_data ? $target_data : 0;

                }
            }
        }

        foreach ($monthly_forecast_data as $key => $value) {
            $monthly_filtered_data[$key] = $value;
        }

        $operation_date = Operations::where('project_id', $project_id)->where('to_mysql', 1)->where('to_mongo', 1)->max('date');
        $indicator = Indicator::where('id', $indicator_id)->where('status', 1)->first();
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $indicator_data = [];
        $indicator_data['id'] = $indicator->id;
        $indicator_data['bn_name'] = $indicator->bangla_name;

        $target_data = IndicatorTarget::where('project_id', $project_id)
            ->where('indicator_id', $indicator->id)
            ->where('year', $current_year)
            ->where('month', $current_month)
            ->value('target_data');

        $present_data = MongoModel::setCollection($collection_name)
            ->where('date', mongoFormattedDate($operation_date))
            ->where('indicator_id', (int)$indicator->id)
            ->first();

        $indicator_data['target_data'] = $target_data ? $target_data : 0;
        $indicator_data['real_data'] = $present_data['summary'] ? $present_data['summary'] : 0;
        $indicator_data['percentage'] = 0.00;
        if ($target_data != 0) {
            $percentage = get_percentage_to_hundrade($present_data['summary'], $target_data);
            $indicator_data['percentage'] = number_format((float)$percentage, 2, '.', '');
        }

        $monthly_filtered_data = array_values($monthly_filtered_data);

        return view('dashboard_team_lead.indicatorWisePrediction', compact('project', 'collection_name', 'monthly_filtered_data', 'dissection_month', 'indicator_data'));
    }

    public function get_coefficient_data(Request $request)
    {
        $indicator_bn_name = $request->indicator_name;
        $coefficient_api_params = [
            'collection_name' => $request->collection_name,
            'indicator_id' => $request->indicator_id
        ];

        $coefficient = new ApiCall();
        $coefficient_raw_data = $coefficient->callApi($coefficient_api_params, 'coefficient_service_url');
        $coefficient_data = [];

        foreach ($coefficient_raw_data['data'] as $raw_data) {
            if ($raw_data[2] == 'Significant') {
                $indicator_id = explode('_', $raw_data[0])[1];
                $indicator_name = Indicator::where('id', $indicator_id)->value('bangla_name');
                $coefficient_data[$indicator_name] = $raw_data[1];
            }
        }
        $coefficient_view = view("dashboard_team_lead.coefficient-data-view", compact('coefficient_data', 'indicator_bn_name'))->render();
        return response()->json(['viewData' => $coefficient_view]);
    }

}
