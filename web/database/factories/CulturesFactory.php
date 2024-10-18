<?php

namespace Database\Factories;

use App\Models\Cultures;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cultures>
 */
class CulturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Cultures::class;

    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->words(3, true)),
            'category' => strval(fake()->numberBetween(1, 5)),
            'cover' => 'tmp.jpg',
            'content' => "<div><strong>Example Article</strong></div><div><br>Lorem ipsum dolor sit amet consectetur, <em>adipisicing elit</em>. Ullam beatae modi ea veritatis quas doloremque autem, unde ipsum tempora necessitatibus praesentium, officia cupiditate laudantium distinctio dolores aliquam magni corrupti libero ratione repudiandae. Provident, excepturi voluptatibus in nulla iure accusamus illum cum, eos dolore laboriosam nihil natus numquam blanditiis dolorem voluptates.</div>",
        ];
    }
}
