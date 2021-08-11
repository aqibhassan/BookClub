<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText($maxNbChars = 10),
            'iban' => $this->faker->unique()->regexify('[0-9]{10}'),
            'rating' => $this->faker->randomKey([1, 5]),
        ];
    }
}
