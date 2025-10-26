<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Devotion>
 */
class DevotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'bible_verse' => fake()->randomElement(['Filipi 4:13', 'Amsal 3:1-35', 'Matius 6:9-13', 'Yohanes 6:16-21']),
            'source' => fake()->url(),
            'body' => '<p class="text-gray-700 leading-relaxed mb-6">' . fake()->text('1000') . '</p>',
            'category_id' => fake()->numberBetween(1, 10),
            'user_id' => 1,
        ];
    }
}
