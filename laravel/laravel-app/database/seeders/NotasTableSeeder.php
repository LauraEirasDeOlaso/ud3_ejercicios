<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar DB
use Illuminate\Support\Carbon;    // Importar Carbon para fechas

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            ['alumno_id' => 1, 'asignatura_id' => 1, 'nota' => 8.5],
            ['alumno_id' => 2, 'asignatura_id' => 2, 'nota' => 7.3],
            ['alumno_id' => 3, 'asignatura_id' => 3, 'nota' => 9.0],
        ]);
    }
}
