<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                
        DB::table('users')->insert([
            [
            //admin 
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gamil.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'status' => 'active',
            ],
            [
            //vendor 
            'name' => 'zubair user',
            'username' => 'vendor',
            'email' => 'vendor@gamil.com',
            'password' => Hash::make('111'),
            'role' => 'vendor',
            'status' => 'active',
            ],
            [
            //admin 
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gamil.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'status' => 'active',
            ],

        ]);
    }
}
