<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), // Título de 3 palabras
            'content' => fake()->paragraph(), // Contenido largo
            'is_pinned' => fake()->boolean(20), // 20% de probabilidad de estar fijada
            'category_id' => Category::factory(), // Esto crea una categoría automáticamente para la nota
        ];
    }
}
