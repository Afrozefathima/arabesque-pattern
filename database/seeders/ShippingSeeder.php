<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Shipping::insert([
            [
                'order_id' => 1,
                'address' => 'Dubai Industrial City, UAE',
                'city' => 'Dubai',
                'country' => 'UAE',
                'postal_code' => '00000',
                'shipping_status' => 'shipped',
                'tracking_number' => 'DXB123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'address' => 'Sharjah Al Nahda',
                'city' => 'Sharjah',
                'country' => 'UAE',
                'postal_code' => '00001',
                'shipping_status' => 'delivered',
                'tracking_number' => 'SHJ654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
