<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['name' => 'Comedias'],
            ['name' => 'Drama'],
            ['name' => 'Románticas'],
            ['name' => 'Animación'],
            ['name' => 'Acción'],
        ]);
    }
}
