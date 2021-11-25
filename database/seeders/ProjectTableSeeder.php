<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Euston HS2',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'HS2 Northolt Tunnels	',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'The Stag Brewery Regeneration',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'Elephant & Castle Town Centre-Phase 2',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'HS2 Chiltern & Colne Valley',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'Northern Estates Programme',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'Phase 1 Energy Centre',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],  [
                'name' => 'Durieshill, Stirling	',
                'no' => substr(uniqid(mt_rand()), 0, 5)
            ],
        ];

        foreach ($projects as $item){
            Project::create($item);
        }
    }
}
