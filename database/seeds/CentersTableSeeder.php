<?php

use Illuminate\Database\Seeder;
use App\Center;

class CentersTableSeeder extends Seeder
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
                'name'=>'Center 01'
            ],[
                'name'=>'Center 02'
            ],[
                'name'=>'Center 03'
            ],[
                'name'=>'Center 04'
            ],[
                'name'=>'Center 05'
            ],[
                'name'=>'Center 06'
            ],[
                'name'=>'Center 07'
            ],[
                'name'=>'Center 08'
            ],[
                'name'=>'Center 09'
            ],[
                'name'=>'Center 10'
            ],[
                'name'=>'Center 11'
            ],[
                'name'=>'Center 12'
            ],[
                'name'=>'Center 13'
            ],[
                'name'=>'Center 14'
            ],[
                'name'=>'Center 15'
            ]
        ];

        foreach($datas as  $data){
            Center::updateOrCreate([
                'title'=>$data['name']
            ]);
        }
    }
}
