<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InquirySeeder extends Seeder
{
    public function run()
    {
        DB::table('inquiries')->insert([
            ['part_id' => 1, 'user_id' => 1, 'whatsapp_no' => '+971500000001', 'email' => 'ali@example.com', 'name' => 'Ali Khan', 'location' => 'Dubai', 'message' => 'Need front bumper urgently.'],
            ['part_id' => 2, 'user_id' => 2, 'whatsapp_no' => '+971500000002', 'email' => 'sara@example.com', 'name' => 'Sara Ahmed', 'location' => 'Sharjah', 'message' => 'Looking for air filter for 2018 Altima.'],
            ['part_id' => 3, 'user_id' => 3, 'whatsapp_no' => '+971500000003', 'email' => 'john@example.com', 'name' => 'John Mathew', 'location' => 'Abu Dhabi', 'message' => 'Need genuine brake pads.'],
            ['part_id' => 4, 'user_id' => 4, 'whatsapp_no' => '+971500000004', 'email' => 'rashid@example.com', 'name' => 'Rashid Noor', 'location' => 'Ajman', 'message' => 'Need oil filter.'],
            ['part_id' => 5, 'user_id' => 5, 'whatsapp_no' => '+971500000005', 'email' => 'lina@example.com', 'name' => 'Lina Joseph', 'location' => 'Al Ain', 'message' => 'Need headlight assembly.'],
        ]);
    }
}
