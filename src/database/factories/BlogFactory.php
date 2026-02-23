<?php

namespace Database\Factories;

use App\Models\Prefecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'store_name' => 'fake店 ' . fake()->word(),
            'ramen_name' => fake()->word() . 'ラーメン',
            'price' => fake()->numberBetween(700, 1500),
            'postal_code' => fake()->postcode(),
            'prefecture_id' => Prefecture::inRandomOrder()->first()->id,
            'city' => fake()->city(),
            'address' => fake()->streetAddress(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'thumbnail_image_path' => null,
            'score' => fake()->numberBetween(0, 100),
            'body' => fake()->realText(),
        ];
    }
}
