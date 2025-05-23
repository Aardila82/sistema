<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrada;  //llamar al modelo

class EntradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Entrada::create([
            'user_id' => 1,
            'titulo' => 'Primer titulo',
            'iamagen' => 'imagen1.jpg',
            'tag' => 'Etiqueta1',
            'contenido' => 'Este es el contenido del primer registro'
        ]);

        Entrada::create([
            'user_id' => 1,
            'titulo' => 'Segundo titulo',
            'iamagen' => 'imagen2.jpg',
            'tag' => 'Etiqueta2',
            'contenido' => 'Este es el contenido del Segundo registro'
        ]);
        */

        Entrada::factory()->count(100)->create();
    }
}
