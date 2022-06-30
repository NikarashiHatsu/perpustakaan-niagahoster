<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->name();

        return [
            'publisher_id' => Publisher::inRandomOrder()->limit(1)->first()->id,
            'category_id' => Category::inRandomOrder()->limit(1)->first()->id,
            'title' => $title,
            'slug' => str()->slug($title),
            'cover' => 'image/book-cover-default.jpeg',
            'published_date' => $this->faker->date(),
        ];
    }
}
