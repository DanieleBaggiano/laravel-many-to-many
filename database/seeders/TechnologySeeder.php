<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technology::insert([
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
        ]);
    }
}
