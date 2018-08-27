<?php

use Illuminate\Database\Seeder;

class LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Libro::create([
            'nombre'=>'Ansina se dice, ansina se escribe',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>1,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'ansina.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Construir personae. Cómo llevar el constructivismo real a las nuevas generaciones',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>4,
            'collection_id'=>1,
            'agno'=>2018,
            'imagen'=>'ansina.png'
        ]);
        \App\Libro::create([
            'nombre'=>'El libro negro de la comunicación online. Manual para dependencias gubernamentales y afines',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>7,
            'collection_id'=>1,
            'agno'=>2017,
            'imagen'=>'libronegro.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Ellas que sonríen. El punto rosa en el círculo rojo',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>8,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'ellas.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Cruces identitarios. Investigadores, estudiantes y medios definen las nuevas caras de la comunicación',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2018,
            'imagen'=>'ellas.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Trump y otros retos. Fragmentatio de la comunicación rupestre',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'fragmentario.png'
        ]);
        \App\Libro::create([
            'nombre'=>' Las que aman el futbol y otras que no tanto',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2014,
            'imagen'=>'lasqueaman.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Relatos sonoros. Diez años del programa Quinto poder',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'relatos.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Periodismo contra la transfobia',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>10,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'periodismo.png'
        ]);
        /***********/
        \App\Libro::create([
            'nombre'=>'Callejeros. Cuentos soñados de mundos soñados',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>2,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'callejeros.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Cuentos de un hombre solo',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>6,
            'collection_id'=>2,
            'agno'=>2016,
            'imagen'=>'cuentos.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Flores sin sol',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2014,
            'imagen'=>'flores.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Homo sexual. Con h de hombre y s de soledad',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>12,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'flores.png'
        ]);
        \App\Libro::create([
            'nombre'=>' Microrrelatos a intervalos',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'microrrelatos.png'
        ]);
        \App\Libro::create([
            'nombre'=>'¿Y dónde están los calcetines?',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2015,
            'imagen'=>'calcetines.png'
        ]);
        /***********************/
        \App\Libro::create([
            'nombre'=>'Los sueños de Raquel',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>13,
            'collection_id'=>3,
            'agno'=>2017,
            'imagen'=>'suenos.png'
        ]);
        \App\Libro::create([
            'nombre'=>'Un despertar consciente',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>14,
            'collection_id'=>3,
            'agno'=>2017,
            'imagen'=>'despertar.png'
        ]);
        \App\Libro::create([
            'nombre'=>'La herida de Ulises',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>15,
            'collection_id'=>4,
            'agno'=>2017,
            'imagen'=>'ulises.png'
        ]);

    }
}
