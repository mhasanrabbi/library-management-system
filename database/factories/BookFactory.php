<?php

namespace Database\Factories;

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
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'isbn' => $this->faker->numberBetween(1000, 9999),
            'category' => $this->faker->name(),
            'author' => $this->faker->name(),
            'total_books' => $this->faker->numberBetween(0, 99),
            'book_source' => $this->faker->name(),
            'rack_no' => $this->faker->numberBetween(0, 50),
        ];
    }
}