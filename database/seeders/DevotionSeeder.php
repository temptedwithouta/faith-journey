<?php

namespace Database\Seeders;

use App\Models\Devotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Devotion::factory()->count(10)->create();
    }
}
