<?php

use Illuminate\Database\Seeder;
use App\Process;

class ProcessesTableSeeder extends Seeder
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
                'name'=>'Degital',
                'name_bng'=>'ডিজিটাল'
            ],
            [
                'name'=>'Manual',
                'name_bng'=>'ম্যানুয়াল'
            ],
            [
                'name'=>'এন আই ডি ভিত্তিক',
                'name_bng'=>'NID Based'
            ]
        ];

        foreach($datas as $data){
            Process::UpdateOrCreate([
                'name'=>$data['name'],
                'name_bng'=>$data['name_bng']
            ]);
        }
    }
}
