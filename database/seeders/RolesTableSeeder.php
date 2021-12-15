<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin'
            ], [
                'name' => 'company'
            ], [
                'name' => 'user'
            ], [
                'name' => 'supervisor'
            ], [
                'name' => 'scaffolder'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
