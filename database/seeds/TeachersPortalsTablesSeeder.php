<?php

use App\Area;
use Illuminate\Database\Seeder;
use App\TeacherPortal;

class TeachersPortalsTablesSeeder extends Seeder
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

        for ($i=0;$i<70;$i++) {
            $division_id=array_rand($division,1);
            $district_id=array_rand($district[$division_id],1);
            $upazila_id=array_rand($upazila[$district_id],1);
            $union_id=isset($union[$upazila_id])?array_rand($union[$upazila_id],1):$upazila_id;

            $last_row_teachers_portals=array();
            $last_row_teachers_portals=TeacherPortal::where('project_id',7)->orderBy('id','desc')->first();
            if(!empty($last_row_teachers_portals))
            {
                $old_total_register_user = $last_row_teachers_portals->total_register_user;
                $total_register_user=rand($old_total_register_user,$old_total_register_user+100);
                $total_active_user=rand($total_register_user-500,$total_register_user);
                $total_active_user_urban=rand($total_active_user-200,$total_active_user);
                $total_active_user_rural=$total_active_user-$total_active_user_urban;
                $old_total_content=$last_row_teachers_portals->total_content;
                $total_content=rand($old_total_content,$old_total_content+5000);

                $total_content_in_rural=rand($total_content,$total_content-500);
                $total_content_in_urban=$total_content-$total_content_in_rural;
                $total_model_content_by_teacher=rand(300,500);
                $total_school=rand(600,7000);
                $total_school_in_rural=rand($total_school,rand(300,600));
                $total_school_in_urban=$total_school-$total_content_in_rural;
                $total_blogger_user=$total_school_in_rural;
                $total_active_user_weekly_hit=rand($total_register_user,$total_school_in_rural-6000);

            }
            else
            {
                $total_register_user=rand(500,2000);
                $total_active_user=rand($total_register_user-500,$total_register_user);
                $total_active_user_urban=rand($total_active_user-200,$total_active_user);
                $total_active_user_rural=$total_active_user-$total_active_user_urban;
                $total_content=rand(1000,5000);
                //chnage
                $total_content_in_rural=rand(500,600);
                $total_content_in_urban=$total_content-$total_content_in_rural;
                $total_model_content_by_teacher=rand(300,500);
                $total_school=rand(600,7000);
                $total_school_in_rural=$total_school - rand(300,600);
                $total_school_in_urban=$total_school-$total_content_in_rural;
                $total_blogger_user=$total_school_in_rural;
                $total_active_user_weekly_hit=rand($total_register_user,$total_school_in_rural-6000);
            }


            TeacherPortal::updateOrCreate(
                [
                    'project_id'=>7,
                    'division_id'=>$division_id,
                    'district_id'=>$district_id,
                    'upazila_id'=>$upazila_id,
                    'union_id'=>$union_id,
                    'provided_date'=>$date
                ],[
                    'total_register_user'=>$total_register_user,
                    'total_active_user'=>$total_active_user,
                    'total_active_user_rural'=>$total_active_user_rural,
                    'total_active_user_urban'=>$total_active_user_urban,
                    'total_content'=>$total_content,
                    'total_content_in_rural'=>$total_content_in_rural,
                    'total_content_in_urban'=>$total_active_user_urban,
                    'total_content_by_teacher'=>rand(500,70000),
                    'total_inovation_content'=>rand(500,6000),
                    'total_model_content_by_teacher'=>rand(500,6000),
                    'total_school'=>$total_school,
                    'type'=>rand(1,3),
                    'total_school_in_rural'=>$total_school_in_rural,
                    'total_school_in_urban'=>$total_school_in_urban,
                    'total_blogger_user'=>rand(5,$total_school_in_urban),
                    'total_active_user_weekly_hit'=>rand(500,7000),
                    'data'=>null
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
