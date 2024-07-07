<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'name' => 'Books'
        ]);
        DB::table('tags')->insert([
            'name' => 'Home Items'
        ]);
        DB::table('tags')->insert([
            'name' => 'Clothing'
        ]);
    }
}
