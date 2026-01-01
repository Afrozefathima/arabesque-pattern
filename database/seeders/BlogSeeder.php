<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        DB::table('blogs')->insert([
            ['title' => 'Top 10 Spare Parts for 2024', 'slug' => Str::slug('Top 10 Spare Parts for 2024'), 'content' => 'A detailed guide to top-selling auto parts in UAE.', 'author_id' => 1, 'status' => 'published'],
            ['title' => 'How to Verify Genuine Auto Parts', 'slug' => Str::slug('How to Verify Genuine Auto Parts'), 'content' => 'Learn how to distinguish genuine parts from replicas.', 'author_id' => 1, 'status' => 'published'],
            ['title' => 'Best Practices for Suppliers', 'slug' => Str::slug('Best Practices for Suppliers'), 'content' => 'Supplier verification and stock management tips.', 'author_id' => 2, 'status' => 'draft'],
            ['title' => 'Trends in Spare Parts Market', 'slug' => Str::slug('Trends in Spare Parts Market'), 'content' => 'Market analysis for 2025 spare parts industry.', 'author_id' => 1, 'status' => 'published'],
            ['title' => 'Eco-Friendly Car Parts', 'slug' => Str::slug('Eco-Friendly Car Parts'), 'content' => 'Future of sustainable vehicle parts.', 'author_id' => 3, 'status' => 'draft'],
        ]);
    }
}
