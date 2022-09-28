<?php

use Illuminate\Database\Seeder;
use App\Area;
use App\Drr;

class DrrsTableSeeder extends Seeder
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

            if($running_month == 03 && $running_year == 2019)
            {
                $stop=true;
            }
        }
    }
    public function insert_data($date){
        //define areas
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
            $upazila_id=null;
            $union_id=null;

            $total_register_office=1;
            $total_active_office=rand(0,1);

            if($total_active_office) {
                $total_service_request = rand(70000, 150000);
                $total_service_provided = rand($total_service_request, $total_service_request - 5000);
                $total_court_fee_amount = rand(70000, 300000);
                $total_active_user = rand(500, 3000);
            }else{
                $total_service_request = 0;
                $total_service_provided = 0;
                $total_court_fee_amount = 0;
                $total_active_user = 0;
            }


            Drr::updateOrCreate(
                [
                    'project_id'=>24,
                    'division_id'=>$division_id,
                    'district_id'=>$district_id,
                    'provided_date'=>$date
                ],[
                    'total_service_request'=>$total_service_request,
                    'total_service_provided'=>$total_service_provided,
                    'total_court_fee_amount'=>$total_court_fee_amount,
                    'total_active_user'=>$total_active_user,
                    'total_register_office'=>$total_register_office,
                    'total_active_office'=>$total_active_office,
                    'data'=>null
                ]
            );
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
