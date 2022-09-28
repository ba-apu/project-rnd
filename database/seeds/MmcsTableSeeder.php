<?php

use Illuminate\Database\Seeder;
use App\Mmc;
use App\Area;

class MmcsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date='2017-01-01';
        $stop=false;
        while(!$stop)
        {
            $this->insert_data($date);
            $date=date('Y-m-d',strtotime( "+1 month", strtotime($date) ));
            echo  $date."<br>";
            $running_month=date('m',strtotime($date));
            $running_year=date('Y',strtotime($date));

            if($running_month == 05 && $running_year == 2019)
            {
                $stop=true;
            }
        }
    }
    public function insert_data($date){

        $division=array();
        $district=array();
        $upazila=array();
        $union=array();

        $areas=Area::where('parent_id',0)->where('type_id',4)->get();
        foreach($areas as $area){
            $division[$area->id]['name']=$area->id;

            $district_arrays=Area::where('parent_id',$area->id)->where('type_id',5)->get();
            foreach ($district_arrays as $district_array)
            {
                $district[$area->id][$district_array->id]=$district_array->id;

                $upazila_arrays=Area::where('parent_id',$district_array->id)->where('type_id',6)->get();
                foreach ($upazila_arrays as $upazila_array){
                    $upazila[$district_array->id][$upazila_array->id]=$upazila_array->id;

                    $union_arrays=Area::where('parent_id',$upazila_array->id)->get();
                    foreach ($union_arrays as  $union_array){
                        $union[$upazila_array->id][$union_array->id]=$union_array->id;
                    }
                }
            }
        }


        for ($i=0;$i<70;$i++){


            $division_id=array_rand($division,1);
            $district_id=array_rand($district[$division_id],1);
            $upazila_id=array_rand($upazila[$district_id],1);
            $union_id=isset($union[$upazila_id])?array_rand($union[$upazila_id],1):$upazila_id;

            $last_row_mmcs=array();
            $last_row_mmcs=Mmc::orderBy('id','desc')->first();
            if(!empty($last_row_mmcs))
            {
                $old_total_teacher = $last_row_mmcs->total_teacher;
                $total_teacher=rand($old_total_teacher,$old_total_teacher+200);
                $total_mmc_monitoring_connected_school = $last_row_mmcs->total_mmc_monitoring_connected_school;
                $total_teacher = rand($old_total_teacher, $total_teacher + 100);
                $total_mmc_monitoring_connected_school = rand($total_mmc_monitoring_connected_school, $total_mmc_monitoring_connected_school + 5);
            }
            else
            {
                $total_teacher=rand(200,500);
                $total_mmc_monitoring_connected_school=rand(5,100);
            }
            $total_institute_w_func=rand(200,800);
            $primary=rand($total_institute_w_func-100,$total_institute_w_func);
            $sec=rand($primary,$total_institute_w_func);
            $total_school_taking_mmc_2=rand($total_institute_w_func-100,$total_institute_w_func);

            Mmc::updateOrCreate(
                [
                    'project_id'=>1,
                    'division_id'=>$division_id,
                    'district_id'=>$district_id,
                    'upazila_id'=>$upazila_id,
                    'union_id'=>$union_id,
                    'provided_date'=>$date
                ],[
                'total_institution_with_functional'=>$total_institute_w_func,
                'total_multimedia_class_room'=>rand(1000,8000),
                'total_primary_school_with_mmc'=>$primary,
                'total_secondary_school_with_mmc'=>$sec,
                'total_school_taking_mmc_2'=>$total_school_taking_mmc_2,
                'total_school_connected_mmc_monitoring_system'=>$total_mmc_monitoring_connected_school,
                'total_teacher_capabel'=>rand(1000,5000),
                'data'=>null

                //'total_institute'=>12000,
                //'type'=>rand(4,6),
                //'total_multimedia_class_room'=>rand(1000,8000),
                //'total_teacher'=>$total_teacher,
                //'total_mmc_monitoring_connected_school'=>$total_mmc_monitoring_connected_school,
                //'total_institute_two_class_day'=>rand($total_mmc_monitoring_connected_school,$total_mmc_monitoring_connected_school-10),

            ]);


        }


    }


    function randomDateInRange()
    {
        // Convert the supplied date to timestamp
        $fMin = strtotime('2015-01-01');
        $fMax = strtotime('2019-12-31');
        // Generate a random number from the start and end dates
        $fVal = mt_rand($fMin, $fMax);
        // Convert back to the specified date format
        return date('Y-m-d', $fVal);
    }
}
