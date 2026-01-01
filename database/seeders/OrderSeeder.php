<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::insert([
            [
                'user_id' => 1,
                'order_status' => 'pending',
                'total_price' => 250.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'order_status' => 'completed',
                'total_price' => 480.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
