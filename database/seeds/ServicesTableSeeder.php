<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services=[
            [
            'project_id'=>'1',
            'name'=>'নাম জারী',
            'creator'=>'সরকারি',
            'type'=>'নাগরিক',
            'process'=>'ডিজিটাল'
        ],
        [
            'project_id'=>'1',
            'name'=>'ডিজিটাল রেকর্ড রুম',
            'creator'=>'সরকারি',
            'type'=>'নাগরিক',
            'process'=>'ডিজিটাল'
        ],
        [
            'project_id'=>'1',
            'name'=>'কৃষি ও ফসলি ঋণের আবেদন',
            'creator'=>'সরকারি',
            'type'=>'নাগরিক',
            'process'=>'ডিজিটাল'
        ],
        [
            'project_id'=>'1',
            'name'=>'তথ্য কমিশনে অভিযোগ দায়ের',
            'creator'=>'সরকারি',
            'type'=>'নাগরিক',
            'process'=>'ডিজিটাল'
        ],
        [
            'project_id'=>'1',
            'name'=>'হজ প্রাক্-নিবন্ধন ও নিবন্ধন',
            'creator'=>'সরকারি',
            'type'=>'নাগরিক',
            'process'=>'ডিজিটাল'
        ]
        ];

        foreach ($services as $service){
            Service::updateOrCreate(
                [
                    'project_id'=>$service['project_id'],
                    'name'=>$service['name'],
                    'creator'=>$service['creator'],
                    'type'=>$service['type'],
                    'process'=>$service['process']
                ]
            );
        }
    }
}
