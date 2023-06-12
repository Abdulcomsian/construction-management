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
                'job_title'=>'Director',
            ],
            [
                'name' => 'Designer',
                'email' =>  'haroon@designer.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'Designer',
            ],
            [
                'name' => 'Checker',
                'email' =>  'haroon@checker.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'Checker',
                'di_designer_id'=>3,
            ],
            [
                'name' => 'Designer and Design Checker',
                'email' =>  'haroon@designer.checker.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'Designer & Checker',
                'di_designer_id'=>3,
            ],
            [
                'name' => 'Designer 2',
                'email' =>  'haroon2@designer.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'status' => Status::Active,
                'job_title'=>'Designer',
                'di_designer_id'=>3,
            ],
        ];

        foreach ($users as $key => $user){
            if ($key == 0){
                $admin = User::create($user);
                $admin->assignRole('admin');
            }elseif ($key == 1){
                $user = User::create($user);
                $user->assignRole('company');
            }elseif ($key == 2){
                $user = User::create($user);
                $user->assignRole('designer');
            }elseif ($key == 3){
                $user = User::create($user);
                $user->assignRole('Design Checker');
            }elseif ($key == 4){
                $user = User::create($user);
                $user->assignRole('Designer and Design Checker');
            }elseif ($key == 5){
                $user = User::create($user);
                $user->assignRole('designer');
            }
        }
    }
}
