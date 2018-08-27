<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Collection::create([
            'nombre'=> 'creativa'
        ]);
        \App\Collection::create([
            'nombre'=> 'los_elementales'
        ]);
        \App\Collection::create([
            'nombre'=> 'travesia'
        ]);
        \App\Collection::create([
            'nombre'=> 'metrica'
        ]);
    }
}
