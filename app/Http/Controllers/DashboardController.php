<?php

namespace App\Http\Controllers;

use App\CiProgressFinancial;
use App\CiProgressPurchase;
use App\Indicator;
use App\IndicatorTarget;
use App\ManualData;
use App\MongoModel;
use App\Project;
use App\ProjectCategory;
use App\UserRoleMapping;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Common;
use DB;
use Auth;


class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $date = [];//BanglaCalendar::convertToBgCal();
        view()->share('date', $date);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $indicator_project_lists = Common::get_dashboard_data($user_id);
        $date_array = Common::get_dates_for_filter();

        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $current_monthyear = $current_month . '-' . $current_year;
        $current_month_year = english_to_bangla(Carbon::createFromFormat('m-Y', $current_monthyear)->format('F, Y'));

        $total_indicators = 0;

        $indicatorInfo = [];
        $chart_data = [];

        $permitted_projects = Common::get_permitted_projects('has_operation_permission');
        $operation_view = TRUE;
        $query = Project::where('status', 1)->orderBy('id', 'ASC');

        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('id', $permitted_projects);
            if($permitted_projects[0] == 0){
                $operation_view = FALSE;
            }
        }
        $projects = $query->get();

        foreach ($projects as $project) {
            $operation_date = lastOperationDate($project->id);
            $project_indicators = Indicator::where('project_id', $project->id)->where('status', 1)->get();

            if ($project_indicators->isNotEmpty()) {
                $total_indicators = count($project_indicators);

                $target_met_indicator_count = 0;
                $total_target_met_indicator_count = 0;

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

            $indicatorInfo[$project->id]['total_indicators'] = english_to_bangla(count($project_indicators));
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
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $last_data_update_date = $query->max('end_date');

        $running = Common::runnning_querter($querter_month_range);
        $approved_amount = [];
        for ($i = 1; $i <= 4; $i++) {
            $query = CiProgressFinancial::whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
            $approved_amount['q' . $i] = $query->sum('approved_amount');
        }
        $total_financial_year_approved = array_sum($approved_amount);

        $expenditure_amount = [];
        for ($i = 1; $i <= 4; $i++) {
            $query = CiProgressFinancial::whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
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

            $query = CiProgressPurchase::select(\Illuminate\Support\Facades\DB::raw('
                                            COUNT(CASE WHEN TYPE = "EOI" THEN 1 ELSE NULL END) AS "eoi",
                                            COUNT(CASE WHEN TYPE = "TOR" THEN 1 ELSE NULL END) AS "tor",
                                            COUNT(CASE WHEN TYPE = "Approval" THEN 1 ELSE NULL END) AS "approval",
                                            COUNT(CASE WHEN TYPE = "RFP" THEN 1 ELSE NULL END) AS "rfp",
                                            COUNT(CASE WHEN TYPE = "WorkOrder" THEN 1 ELSE NULL END) AS "workOrder"
                                            '))
                ->whereBetween('start_date', [$querter_month_range['start_date']['q' . $i], $querter_month_range['end_date']['q' . $i]]);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
            $type_wise_purchase['q' . $i] = $query->first()
                ->toArray();
        }
        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $purchase_info['proposed_total_purchase'] = $query->count('status');

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $purchase_info['completed_purchase'] = $query->where('status', 'complete')->count('status');

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $purchase_info['ongoing_purchase'] = $query->where('status', 'ongoing')->count('status');

        $query = CiProgressPurchase::whereBetween('start_date', [$querter_month_range['start_date']['q1'], $querter_month_range['end_date']['q4']]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $purchase_info['yet_to_start_purchase'] = $query->where('status', 'notStarted')->count('status');

        $purchase_info['completed_purchase_percentage'] = get_percentage_to_hundrade($purchase_info['completed_purchase'], $purchase_info['proposed_total_purchase']);
        $purchase_info['not_completed_purchase_percentage'] = '-';
        if ($purchase_info['completed_purchase_percentage'] != 0) {
            $purchase_info['not_completed_purchase_percentage'] = (100 - (int)$purchase_info['completed_purchase_percentage']);
        }

        return view('dashboard.dashboard_new', compact('indicator_project_lists', 'date_array',
            'current_year', 'current_month_year', 'projects', 'indicatorInfo', 'chart_data', 'permitted_projects', 'operation_view',
            'approved_amount', 'start_date', 'end_date', 'querter_month_range', 'expenditure_percenatge',
            'fiscal_start_year_month', 'fiscal_end_year_month', 'total_financial_year_approved', 'running', 'expenditure_percentage',
            'type_wise_purchase', 'purchase_info', 'last_data_update_date'));
    }

    public function get_indicator_wise_dashboard_data(Request $request)
    {
        $data = Common::get_dashboard_chart_data($request->project_id, $request->indicator_id);
        echo json_encode($data);
    }

    public function get_buy_progress_report_data(Request $request)
    {
        $types = ['TOR', 'Approval', 'EOI', 'RFP', 'WorkOrder'];
        $report_data = [];
        $permitted_projects = Common::get_permitted_projects('has_operation_permission');
        foreach ($types as $type) {
            $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date]);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
            $report_data[$type]['total'] = $query->where('type', $type)
                ->count('status');

            $query = CiProgressPurchase::where('expenditure_date', '<', $request->end_date);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
            $report_data[$type]['within_time_line'] = $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->where('type', $type)
                ->count('status');

            $query = CiProgressPurchase::where('expenditure_date', '>', $request->end_date);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
            $report_data[$type]['exceed_time_line'] = $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->where('type', $type)
                ->count('status');
        }

        $left_days = '-';
        $total_incomplete_purchase = 0;
        $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $max_end_date = $query->max('end_date');

        if ($max_end_date) {
            $max_end_date = new DateTime(date('Y-m-d', strtotime($max_end_date)));
            $today = new DateTime(date('Y-m-d'));
            if ($today < $max_end_date) {
                $left_days = date_diff($max_end_date, $today)->days;
                $query = CiProgressPurchase::whereBetween('start_date', [$request->start_date, $request->end_date]);
                if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                    $query->whereIn('project_id', $permitted_projects);
                }
                $total_incomplete_purchase = $query->where('status', '!=', 'complete')
                    ->count();
            }
        }

        return view("dashboard.side-chart", compact('report_data', 'left_days', 'total_incomplete_purchase'));
    }

    public function get_financial_progress_report_data(Request $request)
    {
        $permitted_projects = Common::get_permitted_projects('has_operation_permission');
        $end_date = Carbon::parse($request->end_date);
        $now = Carbon::now()->format('Y-m-d');
        $time_left = strtotime($end_date) - strtotime($now);
        $time_left = round($time_left / (86400));

        $query = CiProgressFinancial::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $approved_amount = $query->sum('approved_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$request->start_date, $request->end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $expenditure_amount = $query->sum('expenditure_amount');

        $unused_amount = ($approved_amount - $expenditure_amount);
        $unused_percentage = ($approved_amount && $unused_amount) ? get_percentage_to_hundrade($unused_amount, $approved_amount) : 0;
        $q_name = $request->q_name;
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->format('F, Y');
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->format('F, Y');
        $query_var = '';
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $permitted_projects = '(' . implode(',', $permitted_projects) . ')';
            $query_var = "project_id IN $permitted_projects AND ";
        }
        $spending_initiatives = \Illuminate\Support\Facades\DB::select("SELECT activity_type,SUM(approved_amount) Allocated,SUM(expenditure_amount) Used,SUM(UnUsed) UnUsed
                                FROM (SELECT activity_type, approved_amount, expenditure_amount,(approved_amount-expenditure_amount) UnUsed
                                FROM ci_progress_financial WHERE $query_var start_date BETWEEN '$request->start_date' AND '$request->end_date') sub
                                GROUP BY activity_type");

        return view("dashboard.financial-side-chart",
            compact('time_left', 'approved_amount', 'spending_initiatives',
                'unused_amount', 'unused_percentage', 'q_name', 'start_date', 'end_date'));
    }

    public function get_financial_progress_detail_data(Request $request)
    {
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $current_month_year = Carbon::createFromFormat('m-Y', $current_month . '-' . $current_year);
        $financial_start_year = $current_year;
        $financial_end_year = ($current_year + 1);
        if ($current_month < 6) {
            $financial_start_year = ($current_year - 1);
            $financial_end_year = $current_year;
        }
        $financial_start_year_month = '06-' . $financial_start_year;
        $financial_start_date = Carbon::createFromFormat('m-Y', $financial_start_year_month)->firstOfMonth()->format('Y-m-d');

        $financial_end_year_month = '06-' . $financial_end_year;
        $financial_end_date = Carbon::createFromFormat('m-Y', $financial_end_year_month)->LastOfMonth()->format('Y-m-d');

        $permitted_projects = Common::get_permitted_projects('has_operation_permission');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $approved_amount = $query->sum('approved_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $expenditure_amount = $query->sum('expenditure_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('project_id', $permitted_projects);
        }
        $disburse_amount = $query->sum('disbursement_amount');

        $query = CiProgressFinancial::whereBetween('start_date', [$financial_start_date, $financial_end_date]);
            if (Auth::user()->role != 1 && Auth::user()->role != 5) {
                $query->whereIn('project_id', $permitted_projects);
            }
          $data = $query->get();

        if ($request->ajax()) {
            return view('dashboard.get_financial_project_data_report',
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

        $query_var = '';
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $permitted_projects = '(' . implode(',', $permitted_projects) . ')';
            $query_var = "project_id IN $permitted_projects AND ";
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

        return view('dashboard.financial-progress-details',
            compact('approved_amount', 'expenditure_amount', 'unused_amount', 'data', 'disburse_amount', 'spending_data', 'status_options', 'initiative_options', 'fund_source_options',
                'doughnut_data', 'fund_sources', 'spending_initiatives', 'diffInMonths', 'unused_amount_percentage', 'financial_end_date'));
    }

    public function get_buy_progress_detail_data(Request $request)
    {
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m');
        $financial_start_year = $current_year;
        $financial_end_year = ($current_year + 1);
        if ($current_month < 6) {
            $financial_start_year = ($current_year - 1);
            $financial_end_year = $current_year;
        }

        $financial_start_year_month = 'July-' . $financial_start_year;
        $financial_start_date = Carbon::parse($financial_start_year_month)->format('Y-m-t');

        $financial_end_year_month = 'June-' . $financial_end_year;
        $financial_end_date = Carbon::parse($financial_end_year_month)->format('Y-m-t');
        $query_var = '';
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $permitted_projects = Common::get_permitted_projects('has_operation_permission');
            $permitted_projects = '(' . implode(',', $permitted_projects) . ')';
            $query_var = "project_id IN $permitted_projects AND ";
        }

        $data = DB::select("SELECT
                       team_name, type,start_date,end_date,expenditure_date,status,
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
            return view('dashboard.get_buy_progress_data_report',
                compact('purchase_report_data'));
        }

        return view('dashboard.buy-progress-details',
            compact('purchase_report_data', 'financial_start_year_month', 'financial_end_year_month'));
    }

}
