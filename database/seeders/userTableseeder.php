<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrUser = [
            [
                'name' => 'Jibon Ahamed',
                'email' => 'jibon@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('1234'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
            ],
        ];

        $hasRolePermission = [
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ],
            [
                'role_id' => 3,
                'model_type' => 'App\Models\User',
                'model_id' => 3,
            ],
        ];

//        $hasRole = [
//            ['name' => 'super-admin', 'guard_name' => 'web'],
//            ['name' => 'admin', 'guard_name' => 'web'],
//            ['name' => 'user', 'guard_name' => 'web'],
//            ['name' => 'staff', 'guard_name' => 'web'],
//        ];


        // Truncate tables
        User::truncate();
        Module::truncate();


        // Insert data
        User::insert($arrUser);
        Module::insert($hasRolePermission);
    }
}
