<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'New Tech Innovations in 2024',
                'content' => 'Content about technology innovations in 2024...',
                'date' => Carbon::parse('2024-07-01'),
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Health Tips for the Summer',
                'content' => 'Content about health tips...',
                'date' => Carbon::parse('2024-07-02'),
                'id_category' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Business Trends to Watch',
                'content' => 'Content about business trends...',
                'date' => Carbon::parse('2024-07-03'),
                'id_category' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
