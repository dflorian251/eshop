<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'title' => Str::random(10),
            'description' => Str::random(20),
            'price' => '2.5'
        ]);

        DB::table('items')->insert([
            'title' => Str::random(10),
            'description' => Str::random(20),
            'price' => '5.5'
        ]);

        DB::table('items')->insert([
            'title' => Str::random(10),
            'description' => Str::random(20),
            'price' => '10'
        ]);
    }
}
