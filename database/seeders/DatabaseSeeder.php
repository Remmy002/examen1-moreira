<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear 5 usuarios
        $users = \App\Models\User::factory(5)->create();

        // 2. Crear 5 categorías
        $categories = \App\Models\Category::factory(5)->create();

        // 3. Crear 10 notas
        $notes = \App\Models\Note::factory(10)->recycle($categories)->create();

        // 4. Relacionar notas con usuarios (Tabla Pivote)
        foreach ($notes as $note) {
            // Asignar un dueño aleatorio
            $owner = $users->random();
            $note->users()->attach($owner->id, ['role' => 'owner']);

            // Asignar un colaborador aleatorio (que no sea el mismo dueño)
            $collaborator = $users->where('id', '!=', $owner->id)->random();
            $note->users()->attach($collaborator->id, ['role' => 'collaborator']);
        }
    }
}
