<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topics')->insert([
            ['title' => 'Laravel', 'slug' => 'laravel', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'VueJS', 'slug' => 'vue-js', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'InertiaJS', 'slug' => 'inertia-js', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Blade', 'slug' => 'blade', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
