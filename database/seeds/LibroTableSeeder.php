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
            'descripcion'=> '',
            'datos'=> '978-607-9298-26-5 Encuadernación rústica, 88 páginas, 13.5 x 21 cm',
            'precio'=> 110,
            'autor_id'=>1,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'ansina.png',
            'review'=>'Los textos que conforman Ansina se dice, ansina se escribe son resultado del ejercicio de pensar la lengua; el mismo que dio origen a las academias, a la lingüística, a la filología. Con el legítimo derecho de un hablante nativo del español, y la mirada de historiador, Daniel Escorza da contextos a vocablos que van de lo intimista a lo global. Es una clara postura que reivindica de nuestra lengua, que ansina mismo se escribe y se lee y se dice.'
        ]);
        \App\Libro::create([
            'nombre'=>'Construir personae. Cómo llevar el constructivismo real a las nuevas generaciones',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 200,
            'autor_id'=>4,
            'collection_id'=>1,
            'agno'=>2018,
            'imagen'=>'construir_personae copia.png',
            'review'=>'Las exigencias de los alumnos son cada vez mayores: demandan movimiento, estrategias y técnicas pedagógicas diferentes e innovadoras que incluyan al factor diversión y consideren los distintos estilos de aprendizaje; el docente debe ser un facilitador y no un simple emisor de conocimientos para memorizar.
A través de la exposición de experiencias protagonizadas por niños, docentes y el propio autor, Construir personæ presenta diversas situaciones para las cuales no hay didácticas convencionales. Ante este panorama, esta obra ejemplifica alternativas de educación que brinda el constructivismo, donde los conocimientos son una herramienta clave que coadyuva a solucionar problemas y realizar propuestas. 
'
        ]);
       /* \App\Libro::create([
            'nombre'=>'El libro negro de la comunicación online. Manual para dependencias gubernamentales y afines',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>7,
            'collection_id'=>1,
            'agno'=>2017,
            'imagen'=>'libronegro.png'
        ]);*/
        \App\Libro::create([
            'nombre'=>'Ellas que sonríen. El punto rosa en el círculo rojo',
            'descripcion'=> '',
            'datos'=> 'medidas x x',
            'precio'=> 130,
            'autor_id'=>8,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'ellas.png',
            'review'=>'Este libro es un acercamiento íntimo a los hilos del poder político, a través de las confidencias realizadas a la autora por esposas de gobernadores de Aguascalientes, Baja California, Coahuila, Durango, Hidalgo, Morelos y Tabasco. Ellas que sonríen es un mosaico conformado por experiencias muy diversas de estas mujeres —sin lugar a dudas influyentes— que cotidianamente enfrentaron la disyuntiva de ejercer un poder para el cual no fueron electas, o dejar pasar la oportunidad de abonar su experiencia a la transformación y mejora de su realidad.'
        ]);/*
        \App\Libro::create([
            'nombre'=>'Cruces identitarios. Investigadores, estudiantes y medios definen las nuevas caras de la comunicación',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2018,
            'imagen'=>'ellas.png'
        ]);*/
        \App\Libro::create([
            'nombre'=>'Fragmentatio de la comunicación rupestre',
            'descripcion'=> 'Trump y otros retos',
            'datos'=> '978-607-9298-31-9 Encuadernación rústica, 224 páginas, 13.5 x 21 cm.',
            'precio'=> 250,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2016,
            'imagen'=>'fragmentario.png',
            'review'=>'Trump y otros retos. Fragmentario de la comunicación rupestre nos muestra diferentes facetas de la investigación en comunicación, eso que a principios de la década de los ochenta del siglo pasado Mauricio Antezana denominó “ la errátil circunstancia de las ciencias de la comunicación”, y que hoy se potencia y se refleja en estudios muy diversos, de los ensayos que nos hablan de los riesgos a la libertad de expresión, a los testimonios que nos demuestran lo difícil que es publicar en zonas controladas por el crimen organizado… Líneas variadas de investigación sustentadas en metodologías que buscan probar el campo fértil de los estudios comunicativos.'
        ]);
        \App\Libro::create([
            'nombre'=>' Las que aman el futbol y otras que no tanto',
            'descripcion'=> '',
            'datos'=> '978-607-92-98-47-0 Encuadernación rústica, 238 páginas, 13.5 x 21 com',
            'precio'=> 130,
            'autor_id'=>9,
            'collection_id'=>1,
            'agno'=>2014,
            'imagen'=>'lasqueaman.png',
            'review'=>'Las que aman el futbol y otras que no tanto reúne 27 ensayos elaborados por periodistas, académicas y un académico de distintas disciplinas, que exponen su experiencia con el fútbol. Nos muestra la capacidad aglutinadora del futbol, y exhibe sus posibilidades de construir la identidad, no solo nacional sino la de género. La masculinidad y la feminidad contienden por la cancha de juego. En estos trabajos se reflexiona en términos de la discriminación que sufren las mujeres que atentan contra la exclusividad masculina en el balompié de todo el mundo.'
        ]);/*
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
            'descripcion'=> 'Cuentos urbanos de mundos soñados',
            'datos'=> '978-607-9298-41-8 Encuadernación rústica, 184 páginas, 13.5 x 21 cm.',
            'precio'=> 200,
            'autor_id'=>2,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'callejeros.png',
            'review'=>'El libro que tiene el autor en sus manos es una compilación de textos urbanos sobre ciudades imaginadas, soñadas, negadas, enmascaradas, redimidas...son 17 relatos de autores de distintas edades y temperamentos literarios. Los une una cosa: el amor de la calle, que es el ejercicio contemporáneo del mester de juglaría. Los separa la luminosa variedad de sus planetas, unas más oscuras que otras, todas disforizantes, distópicas, y sin embargo llenas de sorpresas. En algunas historias la ciudad es simplemente impredecible; en otras es perversa o desolada, onírica, fría, violenta, burlona, apocalíptica, seductora.'
        ]);
        \App\Libro::create([
            'nombre'=>'Cuentos de un hombre solo',
            'descripcion'=> '',
            'datos'=> '978-607-9298-29-6 Encuadernación rústica, 88 páginas,13.5 x 21 cm.',
            'precio'=> 200,
            'autor_id'=>6,
            'collection_id'=>2,
            'agno'=>2016,
            'imagen'=>'cuentos.png',
            'review'=>'En una primera lectura, Cuentos de un hombre solo es una ventana hacia la intimidad de un personaje intensamente tocando por el dolor del abandono, avecinado en ciudad chica que, versátil, también se mimetiza en urbes cosmopolitas de cualquier meridiano. Sin embargo, leer con detenimiento las historias que transcurren en estas páginas es habitar el mundo global y personalísimo de un hombre en sus treintas: experto en videojuegos, voraz lector de Borges, melómano casi sin etiqueta, observador de un mundo extenso en el espacio y el tiempo.'
        ]);
        \App\Libro::create([
            'nombre'=>'Flores sin sol',
            'descripcion'=> '',
            'datos'=> '978-607-9298-15-9 Encuadernación rústica, 98 páginas, 13.5 x 21 cm. ',
            'precio'=> 90,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2014,
            'imagen'=>'flores.png',
            'review'=>'Los protagonistas de los diez cuentos que conforman la antología Flores sin sol, de María Elena Ortega, son personas cuyas vidas se marchitan en función de existir para los otros. Algunas deciden abandonarse, y otras toman las riendas de su existencia de tal forma que la buena fama de los afectos más sólidos se tambalea. La pluma de María Elena es de certera agudeza y da ocasión al lector para detectar trampas, inconsistencias y falacias colocadas aquí y allá en el imaginario colectivo.
Gracias a su talento, y sin duda a su tesón, Flores sin sol enriquece nuestro panorama literario.'
        ]);
        \App\Libro::create([
            'nombre'=>'Homo sexual. Con h de hombre y s de soledad',
            'descripcion'=> '',
            'datos'=> 'medidas x x',
            'precio'=> 60,
            'autor_id'=>12,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'homosexual.png',
            'review'=>'Con H de hombre y S de soledad es una declaración de valores de aquellos que no pertenecen, de los que no son nombrados, de aquellos que miran la vida desde el otro lado y desde allí nos enseñan cómo se sobrevive en un mundo que te juzga por ser diferente. Las historias que componen esta obra mezclan el deseo en toda su oscuridad con un poco de luz, misma que nos permite ver que al final todos queremos lo mismo: amar. 
Esta obra contiene la voz políticamente incorrecta, estridente e incómoda de un escritor que nos ofrece la oportunidad de entender un mundo al revés en el que es posible vivir y amar de otras maneras.
'
        ]);/*
        \App\Libro::create([
            'nombre'=>' Microrrelatos a intervalos',
            'descripcion'=> 'Historias de histeria de habla popular',
            'datos'=> 'medidas x x',
            'precio'=> 250,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2017,
            'imagen'=>'microrrelatos.png'
        ]);*/
        \App\Libro::create([
            'nombre'=>'¿Y dónde están los calcetines?',
            'descripcion'=> '',
            'datos'=> 'ISBN:978-607-9298-21-0 Encuadernación rústica, 24 páginas, 18 x 21 cm.',
            'precio'=> 110,
            'autor_id'=>11,
            'collection_id'=>2,
            'agno'=>2015,
            'imagen'=>'calcetines.png',
            'review'=>'Cada calcetín del mundo ha sido creado con una pareja, por desgracia, no todos terminan sus días en compañía de su alma gemela. El Sanchito es un guerrero, un calcetín sobreviviente que guiará a otros calcetines solitarios hacia una nueva vida.'
        ]);
        /***********************/
        \App\Libro::create([
            'nombre'=>'Los sueños de Raquel',
            'descripcion'=> 'Crónicas iniciáticas',
            'datos'=> 'ISBN:978-607-9298-44-9 Encuadernación rústica, 192 páginas, 15.5 x 22 cm.',
            'precio'=> 180,
            'autor_id'=>13,
            'collection_id'=>3,
            'agno'=>2017,
            'imagen'=>'suenos.png',
            'review'=>'En un momento y espacio indeterminados. Raquel adquirió la conciencia de estar rodeada de oscuridad intensa: sin luz, sin sonido, en medio de nada. Aquellos segundos, tal vez minutos, incluso horas, fueron sus primeros pasos en la iniciación a la sabiduría ancestral.
La autora nobel Sandra Pérez Monter presenta en los sueños de Raquel su visión de dos mundos que siempre han estado unidos, a pesar de parecer confrontados. GuIada por presencias tan antiguas como la existencia del ser humano en la tierra, la protagonista de esta novela, una mujer en sus treintas, descubre la grandeza de su propio ser y su capacidad de reflejarla en quienes la rodean.
'
        ]);
        \App\Libro::create([
            'nombre'=>'Un despertar consciente',
            'descripcion'=> '',
            'datos'=> '978-607-92-98-47-0 15.5 x 22 cm',
            'precio'=> 180,
            'autor_id'=>14,
            'collection_id'=>3,
            'agno'=>2017,
            'imagen'=>'despertar.png',
            'review'=>'Un despertar consciente refleja la vulnerabilidad del ser humano. La obra lleva al lector a un viaje introspectivo bajo una lupa que hace relucir aspectos del ser que parecen dormidos, escondidos de la consciencia. Agustín Rowe C. Se vale de dos estrategias para proponerle al lector que reflexione ante cada acto que realiza.'
        ]);
        \App\Libro::create([
            'nombre'=>'La herida de Ulises',
            'descripcion'=> '',
            'datos'=> 'ISBN:978-607-9298-43-2 Encuadernación rústica, 60 páginas, 15.5 x 22 cm.',
            'precio'=> 200,
            'autor_id'=>15,
            'collection_id'=>4,
            'agno'=>2017,
            'imagen'=>'ulises.png',
            'review'=>'En La herida de Ulises hay poemas inéditos que provienen desde el año 2002 hasta la fecha. Su curaduría es producto de una decantación muy rigurosa de distintos momentos poéticos de Diego José. El hilo conductor es la travesía que emprende el poeta para encontrarse con la Musa: volver a su cuerpo como quien regresa a Ítaca, naufragar y resurgir. Hacer un libro de poesía con estas características es como embotellar un vino delicioso que fue vendimiado, estrujado, macerado, fermentado y criado durante un largo proceso para llevarlo a la mesa y el corazón de los auténticos lectores.'
        ]);

    }
}
