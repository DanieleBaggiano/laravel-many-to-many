<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('technologies')->insert([
            ['name' => 'Technology 1'],
            ['name' => 'Technology 2'],
            ['name' => 'Technology 3'],
        ]);
    }
}
