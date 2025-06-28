<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Ação',
            'Aventura',
            'RPG',
            'Estratégia',
            'Esporte',
            'Simulação',
            'Corrida',
            'Terror',
            'Puzzle',
            'Multiplayer',
        ];

        foreach ($categorias as $nome) {
            Categoria::create(['name' => $nome]);
        }
    }
}

