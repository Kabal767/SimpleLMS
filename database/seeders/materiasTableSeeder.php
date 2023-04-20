<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class materiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materias = [
            'Lengua y Literatura I',
            'Matemáticas I',
            'Inglés I',
            'Filosofía',
            'Sistema de Información Contable',
            'Educación física'
        ];
        foreach($materias as $materia){
            Materia::create([
                'name' => $materia
            ]);
        }
    }
}
