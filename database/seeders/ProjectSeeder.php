<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Progetto Alpha',
                'description' => 'Descrizione del Progetto Alpha',
                'slug' => Str::slug('Progetto Alpha'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Progetto Beta',
                'description' => 'Descrizione del Progetto Beta',
                'slug' => Str::slug('Progetto Beta'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
