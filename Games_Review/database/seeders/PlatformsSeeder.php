<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plataforma;

class PlatformsSeeder extends Seeder
{
    public function run(): void
    {
        $plataformas = [
            'PC',
            'PlayStation 4',
            'PlayStation 5',
            'Xbox One',
            'Xbox Series X/S',
            'Nintendo Switch',
            'Android',
            'iOS',
        ];

        foreach ($plataformas as $nome) {
            Plataforma::create(['name' => $nome]);
        }
    }
}

