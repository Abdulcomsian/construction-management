<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $faker = \Faker\Factory::create();
        $companies = [
            [
                'name' => 'Balfour Beatty Plc',
                'email' => 'company_a1@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'Kier Group Plc',
                'email' => 'company_a2@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'Interserve Plc',
                'email' => 'company_a3@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'Morgan Sindall Group Plc',
                'email' => 'company_a4@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => '	Wates Group Ltd',
                'email' => 'company_a5@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'Willmott Dixon Holdings Ltd',
                'email' => 'company_a6@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'VolkerWessels UK Ltd',
                'email' => 'company_a7@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],  [
                'name' => 'J Murphy & Sons Ltd',
                'email' => 'company_a8@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => $faker->address,
            ],
        ];

//        foreach ($companies as $item){
//            $company = User::create($item);
//            $company->assignRole('company');
//            $p = Project::WhereDoesntHave('company')->inRandomOrder()->first();
//            $company->companyProjects()->save($p);
//        }

    }
}
