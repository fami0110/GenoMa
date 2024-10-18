<?php

namespace Database\Factories;

use App\Models\Culinary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Culinary>
 */
class CulinaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Culinary::class;

    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->words(3, true)),
            'category' => strval(fake()->numberBetween(1, 5)),
            'photos' => json_encode(['tmp.jpg']),
            'description' => fake()->paragraph(),
            'link' => 'https://maps.app.goo.gl/EC1TcCpjMbQeHyTJA',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'price_min' => fake()->numberBetween(1000, 10000),
            'price_max' => fake()->numberBetween(10001, 20000),
            'schedules' => json_encode([
                'mon' => [
                    'time-start' => '09:00',
                    'time-end' => '21:00',
                ],
                'thu' => [
                    'time-start' => '09:00',
                    'time-end' => '21:00',
                ],
            ]),
            'rate' => fake()->randomFloat(1, 1, 5),
            'is_recomended' => fake()->boolean(),
        ];
    }
}
