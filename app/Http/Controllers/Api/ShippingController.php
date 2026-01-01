<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    public function run()
    {
        DB::table('shippings')->insert([
            [
                'order_id' => 1,
                'address' => '123 Sheikh Zayed Rd',
                'city' => 'Dubai',
                'country' => 'UAE',
                'postal_code' => '00000',
                'status' => 'processing',
                'tracking_number' => 'DXB-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'address' => 'Al Nahda St',
                'city' => 'Sharjah',
                'country' => 'UAE',
                'postal_code' => '00002',
                'status' => 'shipped',
                'tracking_number' => 'SHJ-002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'address' => 'Corniche Rd',
                'city' => 'Abu Dhabi',
                'country' => 'UAE',
                'postal_code' => '00003',
                'status' => 'delivered',
                'tracking_number' => 'AD-003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}