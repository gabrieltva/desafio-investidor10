<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Technology'],
            ['title' => 'Health'],
            ['title' => 'Business'],
            ['title' => 'Entertainment'],
            ['title' => 'Sports'],
        ]);
    }
}
