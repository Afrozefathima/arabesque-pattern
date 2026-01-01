<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Ali Khan', 'email' => 'ali@example.com', 'whatsapp_no' => '+971500000001', 'location' => 'Dubai'],
            ['name' => 'Sara Ahmed', 'email' => 'sara@example.com', 'whatsapp_no' => '+971500000002', 'location' => 'Sharjah'],
            ['name' => 'John Mathew', 'email' => 'john@example.com', 'whatsapp_no' => '+971500000003', 'location' => 'Abu Dhabi'],
            ['name' => 'Rashid Noor', 'email' => 'rashid@example.com', 'whatsapp_no' => '+971500000004', 'location' => 'Ajman'],
            ['name' => 'Lina Joseph', 'email' => 'lina@example.com', 'whatsapp_no' => '+971500000005', 'location' => 'Al Ain'],
        ]);
    }
}
