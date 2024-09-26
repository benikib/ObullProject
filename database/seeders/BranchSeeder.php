<?php

namespace Database\Seeders;

use App\Models\Branche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branche::factory()->count(10)->create();
    }
}
