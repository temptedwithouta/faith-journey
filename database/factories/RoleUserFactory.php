<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleUser>
 */
class RoleUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => 2
        ];
    }

    public function admin(): RoleUserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 1
            ];
        });
    }
}
