<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(DesignRequirementTableSeeder::class);
        $this->call(SetPermissionSeeder::class);
        $this->call(TagTableSeeder::class);
//         \App\Models\User::factory(10)->create();
    }
}
