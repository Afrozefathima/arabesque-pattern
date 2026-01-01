<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            ['name' => 'Super Admin', 'email' => 'admin@sparehub.ae', 'password_hash' => Hash::make('admin123'), 'role' => 'superadmin'],
            ['name' => 'Content Manager', 'email' => 'content@sparehub.ae', 'password_hash' => Hash::make('admin123'), 'role' => 'editor'],
            ['name' => 'Verifier', 'email' => 'verify@sparehub.ae', 'password_hash' => Hash::make('admin123'), 'role' => 'verifier'],
            ['name' => 'Blog Writer', 'email' => 'writer@sparehub.ae', 'password_hash' => Hash::make('admin123'), 'role' => 'editor'],
            ['name' => 'Support', 'email' => 'support@sparehub.ae', 'password_hash' => Hash::make('admin123'), 'role' => 'editor'],
        ]);
    }
}
