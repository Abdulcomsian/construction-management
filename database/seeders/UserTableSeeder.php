<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utils\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        $users = [
            [
                'name' => 'Admin',
                'email' =>  'hani.thaher@gmail.com',
                'password' => Hash::make('Hani@123'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'admin',
            ],
            [
                'name' => 'Abdul Basit',
                'email' =>  'basitawan.abdul@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'asad yaqoob',
            ],
        ];

        foreach ($users as $key => $user){
            if ($key == 0){
                $admin = User::create($user);
                $admin->assignRole('admin');
            }else{
                $user = User::create($user);
                $user->assignRole('company');
            }
        }
    }
}
