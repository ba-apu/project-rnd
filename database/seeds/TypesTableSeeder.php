<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
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
                'name'=>'নাগরিক',
                'name_bng'=>'নাগরিক'
            ],[
                'name'=>'সামাজিক নিরাপত্তা',
                'name_bng'=>'সামাজিক নিরাপত্তা'
            ],[
                'name'=>'Type 03',
                'name_bng'=>'Type 03'
            ],[
                'name'=>'Type 04',
                'name_bng'=>'Type 04'

            ],[
                'name'=>'Type 05',
                'name_bng'=>'Type 05'
            ],[
                'name'=>'Type 06',
                'name_bng'=>'Type 06'

            ],[
                'name'=>'Type 07',
                'name_bng'=>'Type 07'
            ],[
                'name'=>'Type 08',
                'name_bng'=>'Type 08'

            ],[
                'name'=>'Type 09',
                'name_bng'=>'Type 09'
            ],[
                'name'=>'Type 10',
                'name_bng'=>'Type 10'

            ],[
                'name'=>'Type 11',
                'name_bng'=>'Type 11'
            ],[
                'name'=>'Type 12',
                'name_bng'=>'Type 12'

            ],[
                'name'=>'Primary',
                'name_bng'=>'প্রাথমিক'
            ],[
                'name'=>'Secondary',
                'name_bng'=>'মাধ্যমিক'
            ],[
                'name'=>'Higher Secondary',
                'name_bng'=>'উচ্চ মাধ্যমিক'
            ]];
        foreach($datas as $data){
            Type::updateOrCreate([
                'name'=>$data['name'],
                'name_bng'=>$data['name_bng']
            ]);
        }
    }
}
