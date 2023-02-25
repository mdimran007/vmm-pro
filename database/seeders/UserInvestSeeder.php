<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserInvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_invests')->insert([
            'user_id' => 1,
            'vmm_id' => 1,
            'invest_ammount' => 50,
            'status' => 'running',

        ]);

        DB::table('user_invests')->insert([
            'user_id' => 2,
            'vmm_id' => 1,
            'invest_ammount' => 100,
            'status' => 'running',

        ]);
    }
}
