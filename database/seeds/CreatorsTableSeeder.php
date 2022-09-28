<?php

use Illuminate\Database\Seeder;
use App\Creator;

class CreatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                'name'=>'Public',
                'name_bng'=>'সরকারি'
            ],[
                'name'=>'Private',
                'name_bng'=>'বেসরকারি'
            ]
        ];
        foreach($datas as $data){
            Creator::updateOrCreate([
                'name'=>$data['name'],
                'name_bng'=>$data['name_bng']
            ]);
        }
    }
}
