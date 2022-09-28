<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Indicator;
use App\IndicatorTarget;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class IndicatorTargetController extends Controller
{
    public function index($project_id)
    {
        $indicator_target_data = $this->filterTargetData($project_id);

        return view('admin.indicator.target-data', compact('project_id', 'indicator_target_data'));
    }

    public function createForm($project_id)
    {
        $project = ProjectCategory::leftJoin('projects as pr', 'pr.project_category_id', '=', 'project_categories.id')
            ->where('pr.id', $project_id)
            ->first(['pr.id', 'pr.bangla_name', 'project_categories.name']);
        $indicators_data = [];
        $indicators = Indicator::where('project_id', $project_id)->where('status', 1)->get(['id', 'bangla_name'])->toArray();
        foreach ($indicators as $key => $value) {
            $indicators_data[$value['id']] = $value['bangla_name'];
        }
        return view('admin.indicator.create-target-data', compact('project', 'indicators_data'));
    }

    public function store(Request $request)
    {
        $rules = [
            'project_id' => 'required',
            'indicator' => 'required',
            'target_year' => 'required',
            'last_data' => 'required',
            'target_data' => 'required'
        ];
        $validation = validator($request->toArray(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation->messages());
        }
//        $prev_year = ($request->target_year - 1);
//        $target_prev_data = IndicatorTarget::where('project_id',$request->project_id)
//            ->where('indicator_id',$request->indicator)
//            ->where('year',$prev_year)
//            ->where('month',12)
//            ->value('target_data');

//        if(!$target_prev_data){
//            $target_prev_data= 0;
//        }

        $target_data = ($request->target_data / 12);
        $per_month_target_data = 0;
        $target_prev_data = $request->last_data;
        for ($x = 1; $x <= 12; $x++) {
            $IndicatorTarget = IndicatorTarget::firstOrNew(
                [
                    'project_id' => $request->project_id,
                    'indicator_id' => $request->indicator,
                    'year' => $request->target_year,
                    'month' => $x,
                ]
            );

            $per_month_target_data += $target_prev_data + $target_data;
            $IndicatorTarget->target_data = $per_month_target_data;
            $target_prev_data = 0;
            $IndicatorTarget->save();
        }

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Target successfully stored!');

        return redirect('dashboard/indicator-target-set/' . $request->project_id);
    }

    public function editForm($target_id)
    {
        $targetDetails = IndicatorTarget::leftJoin('projects', 'projects.id', '=', 'indicator_target_data.project_id')
            ->leftJoin('project_categories', 'projects.project_category_id', '=', 'project_categories.id')
            ->leftJoin('indicators', 'indicators.id', '=', 'indicator_target_data.indicator_id')
            ->where('indicator_target_data.id', $target_id)
            ->first([
                'indicator_target_data.*',
                'projects.id as project_id',
                'projects.bangla_name as project_name',
                'project_categories.name as project_category_name',
                'indicators.bangla_name'
            ]);

        return view('admin.indicator.edit-target-data', compact('targetDetails'));
    }

    public function update(Request $request)
    {
        $rules = [
            'target_data' => 'required'
        ];
        $validation = validator($request->toArray(), $rules);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $IndicatorTarget = IndicatorTarget::find($request->target_id);
        $target_increment_decrement = $request->target_data - $IndicatorTarget->target_data;
        $IndicatorTarget->target_data = $request->target_data;
        $IndicatorTarget->save();

        for ($x = $IndicatorTarget->month + 1; $x <= 12; $x++) {
            $IndicatorTarget = IndicatorTarget::firstOrNew(
                [
                    'project_id' => $IndicatorTarget->project_id,
                    'indicator_id' => $IndicatorTarget->indicator_id,
                    'year' => $IndicatorTarget->year,
                    'month' => $x,
                ]
            );

            $per_month_target_data = $IndicatorTarget->target_data + ($target_increment_decrement);
            $IndicatorTarget->target_data = $per_month_target_data;
            $IndicatorTarget->save();
        }

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Target successfully updated!');

        return redirect('dashboard/indicator-target-set/' . $IndicatorTarget->project_id);
    }

    public function getLastMonthTargetData(request $request)
    {
        $target_data = IndicatorTarget::where('indicator_id',$request->indicator_id)
            ->where('year',$request->year)
            ->where('month','12')
            ->value('target_data');

        return response()->json(['target_data'=>$target_data]);
    }

    public function filterTargetData($project_id, $indicator_id = null, $date = null)
    {
        $query = IndicatorTarget::leftJoin('projects as pr', 'pr.id', '=', 'indicator_target_data.project_id')
            ->leftJoin('indicators as ir', 'ir.id', '=', 'indicator_target_data.indicator_id')
            ->where('indicator_target_data.project_id', $project_id);
        if ($date) {
            $date = explode('-', $date);
            $month = $date[0];
            $year = $date[1];
            $query->where('month',$month)->where('year',$year);
        }
        if($indicator_id){
            $query->where('ir.id',$indicator_id);
        }
        $indicator_target_data = $query->select(
            'ir.bangla_name as ind_name',
            'pr.bangla_name as pr_name',
            'pr.id as pr_id',
            'indicator_target_data.id as target_id',
            'target_data',
            'year',
            'month')->paginate(20);

        return $indicator_target_data;
    }

    public function search(Request $request)
    {
        $project_id = $request->project_id;
        $indicator_id = $request->indicator_id ?? null;
        $date = $request->date ?? null;
        $indicator_target_data = $this->filterTargetData($project_id, $indicator_id, $date);
        return view('admin.indicator.target-data', compact('project_id', 'indicator_target_data','date'));
    }
}
