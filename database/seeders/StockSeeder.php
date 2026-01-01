<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    public function run()
    {
        DB::table('stock')->insert([
            ['supplier_part_id' => 1, 'stock_quantity' => 10, 'on_order' => 2, 'sold' => 3],
            ['supplier_part_id' => 2, 'stock_quantity' => 25, 'on_order' => 0, 'sold' => 10],
            ['supplier_part_id' => 3, 'stock_quantity' => 5, 'on_order' => 5, 'sold' => 0],
            ['supplier_part_id' => 4, 'stock_quantity' => 12, 'on_order' => 1, 'sold' => 4],
            ['supplier_part_id' => 5, 'stock_quantity' => 8, 'on_order' => 3, 'sold' => 2],
        ]);
    }
}
