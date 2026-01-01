<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'part_id' => 1,
                'quantity' => 2,
                'total_price' => 500.00,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'customer_id' => 2,
                'part_id' => 3,
                'quantity' => 1,
                'total_price' => 320.00,
                'status' => 'shipped',
                'created_at' => now(),
            ],
            [
                'customer_id' => 3,
                'part_id' => 5,
                'quantity' => 1,
                'total_price' => 750.00,
                'status' => 'delivered',
                'created_at' => now(),
            ],
        ]);
    }
}