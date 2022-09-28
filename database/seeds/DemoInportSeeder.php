<?php

use Illuminate\Database\Seeder;

class DemoInportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DfsTableSeeder::class,
            DrrsTableSeeder::class,
            EkShopsTableSeeder::class,
            KishoreKonnectTableSeeder::class,
            MmcsTableSeeder::class,
            MuktoPathsTableSeeder::class,
            NationalPortalTableSeeder::class,
            RsksTableSeeder::class
        ]);
    }
}
