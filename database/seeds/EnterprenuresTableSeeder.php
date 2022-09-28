<?php

use Illuminate\Database\Seeder;
use App\Enterprenure;
use Illuminate\Support\Facades\DB;

class EnterprenuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
                ['name'=>'Entrepreneur 01'],
                ['name'=>'Entrepreneur 02'],
                ['name'=>'Entrepreneur 03'],
                ['name'=>'Entrepreneur 04'],
                ['name'=>'Entrepreneur 05'],
                ['name'=>'Entrepreneur 06'],
                ['name'=>'Entrepreneur 07'],
                ['name'=>'Entrepreneur 08'],
                ['name'=>'Entrepreneur 09'],
                ['name'=>'Entrepreneur 10']
            ];

        foreach ($datas as $data)
        {
            DB::table('enterprenures')->insert($data);
        }
    }
}
