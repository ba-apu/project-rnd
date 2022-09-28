<?php

use Illuminate\Database\Seeder;
use App\Geo;
class GeosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$geo_data=
			[
				[
					'bbs_code'=>'001',
					'parent_id'=>'0',
					'name'=>'Dhaka',
					'is_urban'=>1
				],
				[
					'bbs_code'=>'002',
					'parent_id'=>'1',
					'name'=>'Dhaka',
					'is_urban'=>1
				],
				[
					'bbs_code'=>'003',
					'parent_id'=>'2',
					'name'=>'Keranigonj',
					'is_urban'=>1
				],
				[
					'bbs_code'=>'06',
					'parent_id'=>'3',
					'name'=>'Aganagar',
					'is_urban'=>1
				],
				[
					'bbs_code'=>'25',
					'parent_id'=>'3',
					'name'=>'Kalatia',
					'is_urban'=>1
				],
				[
					'bbs_code'=>'34',
					'parent_id'=>'3',
					'name'=>'Kalindi',
					'is_urban'=>0
				],
				[
					'bbs_code'=>'94',
					'parent_id'=>'3',
					'name'=>'Zinjira',
					'is_urban'=>0
				],
				[
					'bbs_code'=>'08',
					'parent_id'=>'3',
					'name'=>'Basta',
					'is_urban'=>0
				]
			];
		foreach ($geo_data as $data){
			Geo::updateOrCreate(
				[
					'bbs_code'=>$data['bbs_code'],
					'parent_id'=>$data['parent_id'],
					'name'=>$data['name']
				],[
					'is_urban'=>$data['is_urban']
				]
			);
		}
	}
}
