<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genero;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = Genero::all()->pluck('id', 'name')->toArray();

        DB::table('movies')->insert([
            ['title' => 'Movie 1', 'year' => 2023, 'studio' => 'Studio 1', 'genero_id' => $genres['Comedias']],
            ['title' => 'Movie 2', 'year' => 2022, 'studio' => 'Studio 2', 'genero_id' => $genres['Drama']],
            ['title' => 'Movie 3', 'year' => 2021, 'studio' => 'Studio 3', 'genero_id' => $genres['Románticas']],
            ['title' => 'Movie 4', 'year' => 2020, 'studio' => 'Studio 4', 'genero_id' => $genres['Animación']],
            ['title' => 'Movie 5', 'year' => 2019, 'studio' => 'Studio 5', 'genero_id' => $genres['Acción']],
        ]);
    }
}
