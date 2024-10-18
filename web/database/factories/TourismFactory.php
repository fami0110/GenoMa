<?php

namespace Database\Factories;

use App\Models\Tourism;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tourism>
 */
class TourismFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 
    protected $model = Tourism::class;

    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->words(3, true)),
            'category' => strval(fake()->numberBetween(1, 8)),
            'photos' => json_encode(['tmp.jpg']),
            'description' => fake()->paragraph(),
            'link' => 'https://maps.app.goo.gl/EC1TcCpjMbQeHyTJA',
            'address' => fake()->address(),
            'longitude' => 112.631085,
            'latitude' => -7.983299,
            'price_min' => fake()->numberBetween(1000, 10000),
            'price_max' => fake()->numberBetween(10001, 20000),
            'facilities' => json_encode([
                fake()->sentence(3),
                fake()->sentence(3),
                fake()->sentence(3),
            ]),
            'rate' => fake()->randomFloat(1, 1, 5),
            'is_recomended' => fake()->boolean(),
        ];
    }
}
