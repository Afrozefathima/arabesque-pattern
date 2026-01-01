<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            ['company_name' => 'AutoZone UAE', 'contact_person' => 'Faisal Khan', 'email' => 'faisal@autozone.ae', 'phone' => '+971544000001', 'password_hash' => Hash::make('password123'), 'location' => 'Dubai', 'status' => 'verified'],
            ['company_name' => 'Sharjah Auto Parts', 'contact_person' => 'Imran Ali', 'email' => 'imran@sharjahparts.ae', 'phone' => '+971544000002', 'password_hash' => Hash::make('password123'), 'location' => 'Sharjah', 'status' => 'verified'],
            ['company_name' => 'German Motors', 'contact_person' => 'Hans Becker', 'email' => 'hans@germanmotors.ae', 'phone' => '+971544000003', 'password_hash' => Hash::make('password123'), 'location' => 'Abu Dhabi', 'status' => 'pending'],
            ['company_name' => 'SpareHub', 'contact_person' => 'Yusuf Kareem', 'email' => 'yusuf@sparehub.ae', 'phone' => '+971544000004', 'password_hash' => Hash::make('password123'), 'location' => 'Dubai', 'status' => 'verified'],
            ['company_name' => 'AutoConnect', 'contact_person' => 'Ravi Nair', 'email' => 'ravi@autoconnect.ae', 'phone' => '+971544000005', 'password_hash' => Hash::make('password123'), 'location' => 'Ajman', 'status' => 'pending'],
        ]);
    }
}
