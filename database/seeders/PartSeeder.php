<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    public function run()
    {
        DB::table('parts')->insert([
            ['make' => 'Toyota', 'model' => 'Camry', 'year_range' => '2018-2021', 'part_name' => 'Front Bumper', 'part_number' => 'TY123456', 'category' => 'Body Parts', 'subcategory' => 'Bumpers'],
            ['make' => 'Nissan', 'model' => 'Altima', 'year_range' => '2017-2020', 'part_name' => 'Air Filter', 'part_number' => 'NI654321', 'category' => 'Engine Parts', 'subcategory' => 'Filters'],
            ['make' => 'Honda', 'model' => 'Civic', 'year_range' => '2016-2019', 'part_name' => 'Brake Pads', 'part_number' => 'HO987654', 'category' => 'Braking System', 'subcategory' => 'Pads'],
            ['make' => 'BMW', 'model' => 'X5', 'year_range' => '2019-2022', 'part_name' => 'Oil Filter', 'part_number' => 'BM111222', 'category' => 'Engine Parts', 'subcategory' => 'Filters'],
            ['make' => 'Mercedes', 'model' => 'C-Class', 'year_range' => '2018-2023', 'part_name' => 'Headlight Assembly', 'part_number' => 'ME998877', 'category' => 'Electrical', 'subcategory' => 'Lights'],
        ]);
    }
}
