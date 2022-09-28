<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersTableSeeder extends Seeder
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
                'name'=>'ডিজিটাল সেন্টার'
            ],[
                'name'=>'Provider 02'
            ]
        ];

        foreach($datas as  $data){
            Provider::updateOrCreate([
                'title'=>$data['name']
            ]);
        }
    }
}
