<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierPartSeeder extends Seeder
{
    public function run()
    {
        DB::table('supplier_parts')->insert([
            ['supplier_id' => 1, 'part_id' => 1, 'price' => 350.00, 'condition' => 'new', 'verification_status' => 'approved'],
            ['supplier_id' => 2, 'part_id' => 2, 'price' => 80.00, 'condition' => 'new', 'verification_status' => 'approved'],
            ['supplier_id' => 3, 'part_id' => 3, 'price' => 120.00, 'condition' => 'refurbished', 'verification_status' => 'pending'],
            ['supplier_id' => 4, 'part_id' => 4, 'price' => 45.00, 'condition' => 'new', 'verification_status' => 'approved'],
            ['supplier_id' => 5, 'part_id' => 5, 'price' => 900.00, 'condition' => 'used', 'verification_status' => 'pending'],
        ]);
    }
}
