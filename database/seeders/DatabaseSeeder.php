<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            SupplierSeeder::class,
            PartSeeder::class,
            UserSeeder::class,
            InquirySeeder::class,
            SupplierPartSeeder::class,
            StockSeeder::class,
            BlogSeeder::class,
        OrderSeeder::class,
        ShippingSeeder::class,
        ]);
    }
}
