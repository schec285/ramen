<?php

namespace Database\Factories;

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
        $prefecture = fake()->prefecture();
        $city = fake()->city();
        $address = fake()->streetAddress();
        return [
            'id' => Str::uuid(),
            'store_name' => 'fake店 ' . fake()->word(),
            'ramen_name' => fake()->word() . 'ラーメン',
            'price' => fake()->numberBetween(700, 1500),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'place_id' => Str::random(20),
            'country_iso' => 'JP',
            'postal_code' => fake()->postcode(),
            'prefecture' => $prefecture,
            'city' => $city,
            'address' => $address,
            'formatted_address' => $address,
            'thumbnail_image_path' => null,
            'score' => fake()->numberBetween(0, 100),
            'body' => fake()->realText(),
        ];
    }
}
