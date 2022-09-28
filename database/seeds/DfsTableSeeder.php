<?php

use Illuminate\Database\Seeder;
use App\Dfs;
use App\Area;

class DfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++) {
            $this->insert_data($this->randomDateInRange());
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

        for ($i=0;$i<800;$i++){

            $division_id=array_rand($division,1);
            $district_id=array_rand($district[$division_id],1);
            $upazila_id=array_rand($upazila[$district_id],1);
            $union_id=isset($union[$upazila_id])?array_rand($union[$upazila_id],1):$upazila_id;

            $total_service_recipient=rand(10,100);
            $male=rand(10,$total_service_recipient);
            $female=$total_service_recipient-$male;


            Dfs::updateOrCreate(
                [
                    'project_id'=>2,
                    'dfs_type'=>rand(1,4),
                    'service_id'=>rand(1,7),
                    'division_id'=>$division_id,
                    'district_id'=>$district_id,
                    'upazila_id'=>$upazila_id,
                    'union_id'=>$union_id,
                    'provided_date'=>$date
                ],[
                'provider_id'=>rand(1,2),
                'entrepreneur_id'=>rand(1,11),
                'center_id'=>rand(1,9),
                'no_of_service_delivery'=>rand(1,10),
                'service_creator_id'=>rand(1,2),
                'service_type_id'=>rand(1,2),
                'process_id'=>rand(1,2),
                'transaction_amount'=>rand(5000,10000),
                'profit_amount'=>rand(500,3000),
                'no_of_service_recipient'=>$total_service_recipient,
                'no_of_male'=>$male,
                'no_of_female'=>$female,
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
