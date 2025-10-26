<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Daniel Sulistio",
            "email" => "danielsulistio125@gmail.com",
            "password" => Hash::make("Papoi_1205"),
            "remember_token" => null
        ]);

        User::factory()->count(9)->create([
            'remember_token' => null,
        ]);
    }
}
