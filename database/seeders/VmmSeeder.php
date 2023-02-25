<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VmmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('v_m_m_s')->insert([
            'title' => 'Test Vmm',
            'lifetime' => 0,
            'minimum_invest' => 10,
            'distribute_coin' => 210,
            'prepration_time' => 5,
            'execution_time' => 5,
            'start_time' => '2023-02-24 10:01:00',
            'status' => 'active'
        ]);
    }
}
