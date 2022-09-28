<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Project;

class projects_table_seeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$projects=[
			[
				'name'=>'Digital Center',
				'reference_table_name'=>'digital_centers',
				'model_name'=>'App\DigitalCenter'
			],
			[
				'name'=>'DFS',
				'reference_table_name'=>'dfs',
				'model_name'=>'App\Dfs'
			],
			[
				'name'=>'Ek Shop',
				'reference_table_name'=>'ek_shops',
				'model_name'=>'App\EkShop'
			],
			[
				'name'=>'MMC',
				'reference_table_name'=>'mmcs',
				'model_name'=>'App\Mmc'
			],
			[
				'name'=>'Teachers\' Portal',
				'reference_table_name'=>'teacher_portals',
				'model_name'=>'App\TeacherPortal'
			],
			[
				'name'=>'Muktopaath',
				'reference_table_name'=>'mukto_paths',
				'model_name'=>'App\MuktoPath'
			],
			[
				'name'=>'Kishore Konnect',
				'reference_table_name'=>'kishore_konnects',
				'model_name'=>'App\KishoreKonnect'
			],
			[
				'name'=>'Land',
				'reference_table_name'=>'lands',
				'model_name'=>'App\Land'
			],
			[
				'name'=>'Nothi',
				'reference_table_name'=>'nothis',
				'model_name'=>'App\Nothi'
			],
			[
				'name'=>'National Portal',
				'reference_table_name'=>'national_portals',
				'model_name'=>'App\NationalPortal'
			],
			[
				'name'=>'SPS',
				'reference_table_name'=>'sps',
				'model_name'=>'App\Sps'
			],
			[
				'name'=>'Ilab',
				'reference_table_name'=>'ilabs',
				'model_name'=>'App\Ilab'
			]
		];

		foreach($projects as $project){
			Project::updateOrCreate(
				[
					'name'=>$project['name']
				],
				[
					'reference_table_name'=>$project['reference_table_name'],
					'model_name'=>$project['model_name']
				]
			);
		}
	}
}
