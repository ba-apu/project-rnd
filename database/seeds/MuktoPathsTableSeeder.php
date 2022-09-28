<?php

use Illuminate\Database\Seeder;
use App\MuktoPath;
use App\Area;

class MuktoPathsTableSeeder extends Seeder
{
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


        for ($i=0;$i<500;$i++) {

            $total_no_of_order=rand(5,100);
            $no_of_order_delivaery=rand(5,$total_no_of_order);
            $no_of_product_deliverd_with_period=rand(5,$no_of_order_delivaery);

            $total_transaction=rand(1000,10000);
            $profit=rand(0,$total_transaction);

            $division_id=array_rand($division,1);
            $district_id=array_rand($district[$division_id],1);
            $upazila_id=array_rand($upazila[$district_id],1);
            $union_id=isset($union[$upazila_id])?array_rand($union[$upazila_id],1):$upazila_id;

            MuktoPath::updateOrCreate(
                [
                    'project_id'=>8,
                    'division_id'=>$division_id,
                    'district_id'=>$district_id,
                    'upazila_id'=>$upazila_id,
                    'union_id'=>$union_id,
                    'provided_date'=>$date
                ],[
                'total_register_user'=>$total_no_of_order,
                'total_user_enrolled_course'=>$no_of_order_delivaery,
                'total_user_complete_course'=>rand($no_of_order_delivaery-60, $no_of_order_delivaery),
                'total_course_available'=>rand(5000,6000),
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
