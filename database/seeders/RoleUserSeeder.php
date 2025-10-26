<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleUser::factory()->admin()->create([
            'user_id' => 1
        ]);

        $userIds = collect(fake()->shuffle([2, 3, 4, 5, 6, 7, 8, 9, 10]));

        $userIds->each(function (int $item, int $key) {
            RoleUser::factory()->create([
                'user_id' => $item
            ]);
        });
    }
}
