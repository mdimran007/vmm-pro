<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'utype' => 'USR',
            'name' => 'Md User 01',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('useruser'),

        ]);

        DB::table('users')->insert([
            'utype' => 'USR',
            'name' => 'Md User 02',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('useruser'),

        ]);

        DB::table('users')->insert([
            'utype' => 'ADM',
            'name' => 'Md Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),

        ]);
    }
}
