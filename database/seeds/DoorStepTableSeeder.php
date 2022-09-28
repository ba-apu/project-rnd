<?php

use Illuminate\Database\Seeder;
use App\Area;
use App\DoorStepService;

class DoorStepTableSeeder extends Seeder
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
        for ($i=0;$i<64;$i++) {
            $division_id=array_rand($division,1);
            $district_id=array_rand($district[$division_id],1);
            $upazila_id=array_rand($upazila[$district_id],1);
            $union_id=isset($union[$upazila_id])?array_rand($union[$upazila_id],1):$upazila_id;

            $total_register_user=rand(5000,10000);
            $total_user_enrolled_course=rand($total_register_user-2000,$total_register_user);
            //$total_user_complete_course=rand($total_user_enrolled_course-1500,$total_user_enrolled_course);

            $total_service=rand(5000,10000);
            $total_service_np=rand($total_register_user-2000,$total_service);

            DoorStepService::updateOrCreate(
                [
                    'project_id'=>8,
                    //'division_id'=>$division_id,
                    //'district_id'=>$district_id,
                    //'upazila_id'=>$upazila_id,
                    //'union_id'=>$union_id,
                    'provided_date'=>$date
                ],[
                'total_hit'=>rand(500000,1000000),
                'total_office'=>$total_register_user,
                'total_office_update_regularly'=>$total_user_enrolled_course,
                'total_servie_linked_np'=>$total_service,
                'total_e_ervice_lined_np'=>$total_service_np,
                'data'=>null
            ]);
        }
    }
}
