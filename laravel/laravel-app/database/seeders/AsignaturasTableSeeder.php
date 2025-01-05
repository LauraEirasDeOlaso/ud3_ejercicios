<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar DB
use Illuminate\Support\Carbon;    // Importar Carbon para fechas

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asignaturas')->insert([
            ['nombre' => 'Matemáticas', 'descripcion' => 'Curso básico de matemáticas'],
            ['nombre' => 'Historia', 'descripcion' => 'Historia mundial'],
            ['nombre' => 'Ingles', 'descripcion' => 'Lengua extranjera'],
        ]);
    }
}
