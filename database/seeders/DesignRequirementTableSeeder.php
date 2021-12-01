<?php

namespace Database\Seeders;

use App\Models\DesignRequirementLevelOne;
use Illuminate\Database\Seeder;

class DesignRequirementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level_one = [
            [
                'name'  =>  'Excavation/ Earthworks',
            ],
            [
                'name'  =>  'Formwork / Falsework',
            ],
            [
                'name'  =>  'Equipment and Plant',
            ],
            [
                'name'  =>  'Site Establishment',
            ],
            [
                'name'  =>  'Access / Scaffolding',
            ],
            [
                'name'  =>  'Structure',
            ],
            [
                'name'  =>  'Structural Stability',
            ],
            [
                'name'  =>  'Permanent Works',
            ]
        ];
        foreach ($level_one as $item){
            DesignRequirementLevelOne::create($item);
        }
    }
}
