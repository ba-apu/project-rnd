<?php

use Illuminate\Database\Seeder;
use App\Indicator;

class IndecatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicators = [
            ['project_id' => 1, 'parent_id' => 0, 'priority' => 1, 'name' => '% of digital centers financially sustainable (Income BDT 15,000+ for each entrepreneur)'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => '% of digital centre in category A (Income BDT 20,000+ per month for each 
entrepreneur)'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => '% of digital centre in category B (Income BDT 15,001-20,000 per month for each 
entrepreneur)'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => '% of digital centre in category C (Income BDT 10,001-15,000 per month for each 
entrepreneur)'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => '% of digital centre in category D (Income BDT 5,001-10,000 per month for each
 entrepreneur)'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => '% of digital centre in category E or financially weak (Income below BDT 5,000 per 
month for each entrepreneur) '],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => 'Total Amount (BDT) of earning from Digital Centres'],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => 'Amount (BDT) of income from public services '],
            ['project_id' => 1, 'parent_id' => 1, 'priority' => 0, 'name' => 'Amount (BDT) of income from private services'],
            ['project_id' => 1, 'parent_id' => 0, 'priority' => 1, 'name' => '% of e-Services provided from Digital Centres '],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types (Total) of services provided (At present 116 types of services are being 
provided from Digital Centres)'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of public services provided'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of private services provided'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of services provided manually'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of services provided through online'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of public services provided through online'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'Types of private services provided through online'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => '# of services provided'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => '# of services provided electronically'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => '# of public service provided monthly '],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => '# of private service provided monthly'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'of public service provided monthly through online (monthly)'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => '# of public service provided manually (monthly)'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'of private service provided through online (monthly)'],
            ['project_id' => 1, 'parent_id' => 10, 'priority' => 0, 'name' => 'of private service provided manually (monthly)'],
            ['project_id' => 1, 'parent_id' => 0, 'priority' => 1, 'name' => '% of TCV reduced due to receiving services from Digital Centres '],
            ['project_id' => 1, 'parent_id' => 0, 'priority' => 1, 'name' => 'Citizens satisfaction (Qualitative and Quantitative) from digital centre'],
        ];

        foreach($indicators as $indicator)
        {
            Indicator::updateOrCreate([
                'project_id'=>$indicator['project_id'],
                'parent_id'=>$indicator['parent_id'],
                'name'=>$indicator['name']
            ],[
                'priority'=>$indicator['priority'],
                'is_calculated'=>1
            ]);
        }
    }
}
