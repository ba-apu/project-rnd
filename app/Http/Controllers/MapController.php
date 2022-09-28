<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicator;
use App\Common;
use App\Area;
use App\MongoModel;
use App\Project;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function index()
    {
        $owner = Common::get_own_project();
        $project_list = Project::whereIn('id', $owner)->pluck('bangla_name', 'id');

        if(Auth::user()->role == 1 || Auth::user()->role == 5){
            $project_list = Project::pluck('bangla_name', 'id');
        }

        return view('map.index', compact('project_list'));
    }

    public function load_district_wise_indicator_data(Request $request)
    {
        $project_id = $request->project_id;
        $indicator_id = $request->indicator_id;
        $indicator_id_2 = $request->indicator_id_2;
        $indicator_array[$indicator_id] = $indicator_id;
        $indicator_array[$indicator_id_2] = $indicator_id_2;

        $compare = false;
        if ($indicator_id_2 != "") {
            $compare = true;
        }

        $sorting = $request->sorting;
//        $project_details = Project::where('id', $project_id)->first();
//        $indicator_drop_down = Indicator::where('project_id', $project_id)->get();
        $query = Indicator::where('status', 1);
        if ($compare) {
            $query->whereIn('id', $indicator_array);
        } else {
            $query->where('id', $indicator_id);
        }
        $indecator_lists = $query->get();

        $has_upazila = $request->has_upazila;
//        $for_map_page = $request->for_map_page;
        $date = $request->date;

        $date = date('Y-m-d', strtotime($date));
        $sort = array();

        if (!Common::is_geo_enable_project($project_id)) {
            echo "কোনো জেলার ডাটা নাই";
            die;
        }

        $districts = Area::where('type_id', '=', 5)->get();
        $upazilas = Area::where('type_id', '=', 6)->whereIn('parent_id', [1040, 1004, 28])->get();

        //mongo data
        $data = array();
        foreach ($indicator_array as $indicator_item) {
            if (empty($indicator_item)) {
                continue;
            }
            $project_id = Indicator::where('id', $indicator_item)->value('project_id');
            $reference_table_name = Project::where('id', $project_id)->value('reference_table_name');

            $mongo_data = MongoModel::setCollection($reference_table_name)
                ->where('indicator_id', (int)$indicator_item)
                ->where('date', mongoFormattedDate($date))
                ->first();

            if (!empty($mongo_data)) {
                foreach ($mongo_data['division'] as $division_data) {
                    foreach ($division_data['district'] as $district_bbs => $district_data) {
                        $data[$district_bbs][$indicator_item]['value'] = $district_data['summary'];
                        if (!$compare) {
                            $sort[$district_bbs]['bbs'] = $district_bbs;
                            $sort[$district_bbs]['data'] = $district_data['summary'];
                        }
                    }
                }
            }
        }

        $sort_data = array();
        if (!$compare) {
            $keys = array_column($sort, 'data');
            if ($sorting == "" || $sorting == 'up') {
                array_multisort($keys, SORT_DESC, $sort);
            } else {
                array_multisort($keys, SORT_ASC, $sort);
            }
            $temp_district = array();
            foreach ($districts as $r) {
                $temp_district[$r->id] = $r;
            }

            foreach ($sort as $r) {
                if (isset($temp_district[$r['bbs']])) {
                    $sort_data[] = $temp_district[$r['bbs']];
                    unset($temp_district[$r['bbs']]);
                }
            }
            if (!empty($temp_district)) {
                foreach ($temp_district as $r) {
                    $sort_data[] = $r;
                }
            }
            $districts = $sort_data;
        }
        return view('map/table', compact('data', 'indecator_lists', 'districts', 'upazilas', 'indicator_id', 'has_upazila', 'date', 'sort_data', 'compare'));
    }

    public function load_district_wise_indicator_data____(Request $request)
    {
        $indicator_id = $request->indicator_id;
        $project_id = $request->project_id;
        $indicator_id_2 = $request->indicator_id_2;
        $indicator_array[$indicator_id] = $indicator_id;
        $indicator_array[$indicator_id_2] = $indicator_id_2;

        $compare = false;
        if ($indicator_id_2 != "") {
            $compare = true;
        }

        $sorting = $request->sorting;
        $project_details = Project::where('id', $project_id)->first();
        $indicator_drop_down = Indicator::where('project_id', $project_id)->get();

        if ($compare) {
            $indecator_lists = Indicator::whereIn('id', $indicator_array)->where('status', 1)->get();
        } else {
            $indecator_lists = Indicator::where('id', $indicator_id)->where('status', 1)->get();
        }
        $has_upazila = $request->has_upazila;
        $for_map_page = $request->for_map_page;
        $date = $request->date;
        $date = date('Y-m', strtotime($date));
//        $data=array();
        $sort = array();

        if (!Common::is_geo_enable_project($project_id)) {
            echo "কোনো জেলার ডাটা নাই";
            die;
        }

        $districts = Area::where('type_id', '=', 5)->get();

        //mongo data
        $data = array();
        foreach ($indicator_array as $indicator_item) {
            if (empty($indicator_item)) {
                continue;
            }
            $distrct_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$indicator_item)->first();
            if (!empty($distrct_data)) {
                foreach ($distrct_data['data']['district'] as $district_id => $district_data) {
//                    $bbs_id = get_geo_id($district_id, 'D');
//                    $sum = 0;
                    foreach ($district_data as $key => $district_summery) {
                        if ($key == 'upazila') {
                            //echo $district_id; echo "<pre>"; print_r($summery); echo "----------";
                        } else {

                            foreach ($district_summery as $data_value) {
                                $dt = date('Y-m', strtotime(mongo_date_to_regular_date($data_value['date'])));
                                if (strtotime($dt) == strtotime($date)) {
                                    $bbs_id_d = get_geo_id($district_id, 'D');
                                    $data[$bbs_id_d][$indicator_item]['value'] = $data_value['data'];
                                    if (!$compare) {
                                        $sort[$bbs_id_d]['bbs'] = $bbs_id_d;
                                        $sort[$bbs_id_d]['data'] = $data_value['data'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if (!$compare) {
            $keys = array_column($sort, 'data');
            if ($sorting == "" || $sorting == 'up') {
                array_multisort($keys, SORT_DESC, $sort);
            } else {
                array_multisort($keys, SORT_ASC, $sort);
            }
            $temp_district = array();
            foreach ($districts as $r) {
                $temp_district[$r->id] = $r;
            }
            $sort_data = array();
            foreach ($sort as $r) {
                if (isset($temp_district[$r['bbs']])) {
                    $sort_data[] = $temp_district[$r['bbs']];
                    unset($temp_district[$r['bbs']]);
                }
            }
            if (!empty($temp_district)) {
                foreach ($temp_district as $r) {
                    $sort_data[] = $r;
                }
            }
            $districts = $sort_data;
        }
        return view('map/table', compact('data', 'indecator_lists', 'districts', 'indicator_id', 'has_upazila', 'indicator_drop_down', 'for_map_page', 'date', 'sort_data', 'compare'));
    }
}
