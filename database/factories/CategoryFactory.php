<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(), // Un nombre de categoría único
            'description' => fake()->sentence(), // Una descripción corta
        ];
    }
}
