<?php

use Illuminate\Database\Seeder;

class AutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Autor::create([
            'nombre' => 'Daniel',
            'apellido_p' => 'Escorza',
            'apellido_m' => '',
            'foto' => 'daniel_escorza.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Agustín',
            'apellido_p' => 'Cadena',
            'apellido_m' => '',
            'foto' => 'agustin_cadena.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Jesús',
            'apellido_p' => 'Cruz',
            'apellido_m' => '',
            'foto' => 'jesus_cruz.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Alfonso',
            'apellido_p' => 'Pescador',
            'apellido_m' => '',
            'foto' => 'alfonso_pescador.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Raquel',
            'apellido_p' => 'Barceló',
            'apellido_m' => 'Quintal',
            'foto' => 'raquel_barcelo_quintal.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'E.J',
            'apellido_p' => 'Valdés',
            'apellido_m' => '',
            'foto' => 'ej_valdes.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Jesus',
            'apellido_p' => 'Alfonso',
            'apellido_m' => 'Iglesias',
            'foto' => 'jesus_alfonso_iglesias.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Norma',
            'apellido_p' => 'Pérez',
            'apellido_m' => 'Vences',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Elvira',
            'apellido_p' => 'Hernández',
            'apellido_m' => 'Carballido',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Hazel',
            'apellido_p' => 'Gloria',
            'apellido_m' => 'Virgina',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'María Elena',
            'apellido_p' => 'Ortega',
            'apellido_m' => 'Ruíz',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Oscar Rául',
            'apellido_p' => 'Pérez',
            'apellido_m' => 'Cabrera',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Sandra',
            'apellido_p' => 'Pérez',
            'apellido_m' => 'Monter',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Agustín',
            'apellido_p' => 'Rowe',
            'apellido_m' => '',
            'foto' => 'norma_perez_vences.jpg'
        ]);
        \App\Autor::create([
            'nombre' => 'Diego',
            'apellido_p' => 'José',
            'apellido_m' => '',
            'foto' => 'norma_perez_vences.jpg'
        ]);
    }
}
