@extends('template')
@section('home')
    <script>
       $('.social_icons').css("border","2px solid #ffffff");
    </script>

    <div id="Slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#Slider" data-slide-to="0" class="active"></li>
            <li data-target="#Slider" data-slide-to="1"></li>
            <li data-target="#Slider" data-slide-to="2"></li>
            <!-- <li data-target="#Slider" data-slide-to="3"></li> -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 " height="80%" style="margin-top:-250px;"  src="{{ URL::to('/') }}/images/slider/foto1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " height="80%" style="margin-top:-250px;" src="{{ URL::to('/') }}/images/slider/foto2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " height="80%" style="margin-top:-250px;" src="{{ URL::to('/') }}/images/slider/foto3.jpg" alt="Third slide">
            </div>
            <!-- <div class="carousel-item">
                <img class="d-block w-100 h-100" height="700px" src="{{ URL::to('/') }}/images/slider/fotoslider4.png" alt="Four slide">
            </div> -->
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -80px;">
                <div class="input-group mb-3">
                    <input  id="buscartxt" type="text" class="form-control simplebox" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2" style="background-color:#e9f2ef;border-top-left-radius: 15px;border-bottom-left-radius: 15px; height:45px;font-size: 20px; border:none;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="buscar()" type="button" style="background-color:#e9f2ef;font-size:20px;border-top-right-radius: 18px;border-bottom-right-radius: 18px;border:none;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>


    </div> {{--contenedor fin--}}
    <div style="background-color:#DCDDDE;">
       <div class="container">
            <div id="cajaLibros" class="row center align-items-center text-center align-content-center" >
                 @foreach($libros as $item)
                     <div class="cajon col-md-3">
                <div class="cajas align-content-center text-center" style="padding-top: 30px;padding-bottom: 20px;">
                    <img height="200px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}" alt="mmom">
                    <hr>
                    <a href="{{route("detalle.libros",$item->id)}}" style="text-decoration: none; color: white;padding-top:10px; width:50px;" class="btnDetalle">Ver detalle</a>
                    <a class="btnComprar" style="text-decoration: none; color: white;padding-top:10px; width:50px;">Comprar</a>
                </div>
                     </div>
                @endforeach
            </div>
           <br>
           <div style="text-align: center; font-size: 1.5em; margin: auto;">
               <a href="{{route('libros.colecciones')}}">Ver todo</a>
           </div>
           <br>
        </div>
    </div>
    <div class="container">
        <br>
        <br>
        <h1 class="h1 text-center">SERVICIOS</h1>
        <div class="row align-content-center text-center" style="width: 80%; margin: auto;">
                <div class="col-md-4 iconoservicios">
                        <figure>
                            <img src="{{ URL::to('/') }}/images/iconos/iconogestion.png" alt="gestion de contenidos" data-backdrop="false" data-toggle="modal" data-target="#gestionContenidos">
                            <figcaption> Gestión de <br> contenidos</figcaption>
                        </figure>
                </div>
                <div class="col-md-4 iconoservicios">
                    <figure>
                    <img src="{{ URL::to('/') }}/images/iconos/iconodisenoeditorial.png" alt="diseño editorial" data-backdrop="false" data-toggle="modal" data-target="#DiseñoEditorial">
                    <figcaption>Diseño editorial <br> e ilustración</figcaption>
                    </figure>
                </div>
                <div class="col-md-4 iconoservicios">
                    <figure>
                        <img src="{{ URL::to('/') }}/images/iconos/iconoasesoria.png" alt="derechos de autor" data-backdrop="false" data-toggle="modal" data-target="#AsesoriaDerechos">
                        <figcaption>Asesoría en <br> derechos de autor</figcaption>
                    </figure>
                </div>
                <div class="col-md-6 iconoservicios">
                    <figure>
                        <img src="{{ URL::to('/') }}/images/iconos/iconocursos.png" alt="cursos y talleres" data-backdrop="false" data-toggle="modal" data-target="#CursosTalleres">
                        <figcaption>Cursos y talleres</figcaption>
                    </figure>
                </div>
                <div class="col-md-6 iconoservicios">
                    <figure>
                        <img src="{{ URL::to('/') }}/images/iconos/iconoservicios.png" alt="servicio promocion cultural" data-backdrop="false" data-toggle="modal" data-target="#ServicioPromocion">
                        <figcaption>Servicios de promoción <br>cultural editorial</figcaption>
                    </figure>
                </div>

            </div>
    </div>
    <div class="separador"></div>
    <div style="">
        <div class="container-fluid">
            <div class="row">
                <figure  class="col-md-8" style="margin: 0; padding: 0;" >
                    <img style="width: 110%" class="img-fluid" src="{{ URL::to('/') }}/images/img_ref.jpg">
                    <a target="_blank" href="{{ URL::to('/') }}/descarga.pdf"><figcaption class="figImagen">Descarga el catálogo de talleres aquí &nbsp;<img width="20px" src="{{ URL::to('/') }}/images/iconos/iconodescarga.png" alt=""></figcaption></a>
                </figure>
                <div class="col-md-4 text-center">
                    <span style="color:#00949c;font-size: 200px; line-height: 180px;">TA <br>LLE<br>RES</span>
                </div>
            </div>
        </div>
    </div>
    <div class="separador"></div>
    <div style="background-color:#DCDDDE;">
        <div class="container" style="background-color:#DCDDDE;padding:50px 0 50px 0;">
            <div class="row text-center">
                <!-- <div class="col-md-1" style="margin-left: -20px;"></div> -->
                <div class="card" style="width: 22rem;margin:auto;">
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/talleres/taller1.png" alt="Card image cap">
                        <div class="card-body" onclick="reveal(1)" style="cursor:pointer; background:rgba(255, 255, 255, 0.52)">
                              <h5 class="card-title">Re-cuentos: El artifício de escribir historias</h5>
                              <i class="fas fa-sort-down"></i>
                              <p class="card-text text-card-1" style="text-align:justify; display:none;">El taller de Narrativa tiene como objetivo formar
                                  nuevos autores que tengan nociones básicas de los
                                  géneros narrativos y sus ele mentos, a través de actividades
                                  de exploración, análisis, lectura, escritura y crítica de textos.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><strong>Duración:</strong><br>4 sesiones, martes 20 y 27 de noviembre y 4 y 11 de diciembre, de 17 a 20 hrs. </li>
                              <li class="list-group-item"><strong>Inversión:</strong><br>$1,100</li>
                              <li style="display:none;" class="list-group-item text-card-1"><strong>Sede:</strong><br> Elementario / Jardín Colón #8, col. Centro, Pachuca, Hgo.</li>
                        </ul>
                        <div style="display:none;" class="card-body text-card-1">
                              Informes e inscripciones a <a href="tallereselementum@hotmail.com">tallereselementum@hotmail.com</a>
                        </div>
                </div>
                <div class="card" style="width: 22rem;margin:auto;">
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/talleres/taller2.jpg" alt="Card image cap">
                        <div class="card-body" onclick="reveal(2)" style="cursor:pointer; background:rgba(255, 255, 255, 0.52)">
                              <h5 class="card-title">Elementour: Un viaje de la palabra al libro</h5>
                              <i class="fas fa-sort-down"></i>
                              <p class="card-text text-card-2" style="text-align:justify; display:none;">Tiene el objetivo de que sus asistentes identifiquen los oficios implicados en la creación de libros y que reconozcan, a través de ese ejercicio, su propia capacidad de sumarse como creadores. Acompañados de un grupo de profesionales dedicados al mundo editorial.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><strong>Duración:</strong><br>1 sesión de 3 hrs. Grupos a partir de 15 niños (Edad de 8 a 12 años).</li>
                              <!-- <li class="list-group-item"><strong>Inversión:</strong><br>$1,100</li> -->
                              <li style="display:none;" class="list-group-item text-card-2"><strong>Sede:</strong><br> Elementario / Jardín Colón #8, col. Centro, Pachuca, Hgo.</li>
                        </ul>
                        <div style="display:none;" class="card-body text-card-2">
                              Informes e inscripciones a <a href="tallereselementum@hotmail.com">tallereselementum@hotmail.com</a>
                        </div>
                </div>
              <!-- <div id="eventosDiv1" class="col-md-3 eventosDiv  text-center align-content-center">
                  <figure>
                      <img class="" src="{{ URL::to('/') }}/images/img_ref.jpg" alt="">
                      <figcaption class="figbox titulo_caja" style="text-transform: uppercase;">Taller de Narrativa básica</figcaption>
                  </figure>

                  <span class="imparte_caja"><strong>Imparte:&nbsp;</strong>
                      María Elena Ortega </span>
                  <br>
                  <i class="fas fa-sort-down"></i>
                  <div class="descripcion"><br>El taller de Narrativa tiene como objetivo formar
                      nuevos autores que tengan nociones básicas de los
                      géneros narrativos y sus ele mentos, a través de actividades
                      de exploración, análisis, lectura, escritura y crítica de textos.</div>
                  <hr>
                      <div class="duracion_caja "><strong>Duración:</strong>  3 meses, sesiones semanales <br> de 2 horas</div>
                      <div class="inversion_caja "><strong>Inversión: </strong>$1,000</div>

              </div>
              <div id="eventosDiv2" class="col-md-3 eventosDiv  text-center align-content-center">
                  <figure>
                      <img class="" src="{{ URL::to('/') }}/images/img_ref.jpg" alt="">
                      <figcaption class="figbox titulo_caja" style="text-transform: uppercase;">Taller de Poesía básica</figcaption>
                  </figure>

                  <span class="imparte_caja"><strong>Imparte:&nbsp;</strong>
                      Marcela Villalpando  </span>
                  <br>
                  <i class="fas fa-sort-down"></i>
                  <div class="descripcion"><br>El taller de Poesía pretende formar nuevos escritores con bases sólidas
                      en el género de la poesía mediante la adquisición de conceptos básicos, estructura y elementos,
                      realizando actividades de lectura, análisis, comprensión y escritura.</div>
                  <hr>
                      <div class="duracion_caja "><strong>Duración:</strong>  3 meses, sesiones semanales <br> de 2 horas</div>
                      <div class="inversion_caja "><strong>Inversión: </strong>$1,000</div>

              </div> -->
              <!-- <div id="eventosDiv3" class="col-md-3 eventosDiv  text-center align-content-center">
                  <figure>
                      <img class="" src="{{ URL::to('/') }}/images/img_ref.jpg" alt="">
                      <figcaption class="figbox titulo_caja" style="text-transform: uppercase;">Taller de Autobiografías</figcaption>
                  </figure>

                  <span class="imparte_caja"><strong>Imparte:&nbsp;</strong>
                     Flor de María Moreno y Diana Pérez Ortiz </span>
                  <br>
                  <i class="fas fa-sort-down"></i>
                  <div class="descripcion"><br>Autobiografías es un taller que tiene como objetivo guiar a las asistentes
                      hacia el conocimiento propio, que se refleje en su autoestima y el empoderamiento, dándoles las herramientas
                      literarias necesarias para la creación de una autobiografía, que permita plasmar en sus escritos recuerdos,
                      vivencias y dar voz a sus inquietudes, deseos y prioridades.
                  </div>
                  <hr>
                      <div class="duracion_caja "><strong>Duración:</strong>  6 meses, sesiones semanales  <br> de 2 horas</div>
                      <div class="inversion_caja "><strong>Inversión: </strong>$2,400</div>
              </div> -->
            </div>
        </div>
    </div>
    <div class="contaier">
        <div class="row">
            <img class="img-fluid col-md-12" src="{{ URL::to('/') }}/images/elementum_jardin.png" alt="jardin colon">
        </div>
    </div>

    <!--modals -- >



    <!-- Modal -->
    <div class="modal fade" id="gestionContenidos" role="dialog">
        <div class="modal-dialog">
             <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gestión de contenidos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>La transformación de cultura, imaginación, conocimientos y cosmovisión en textos pertinentes y funcionales se
                       logra a través de la gestión de contenidos. Elementum tiene las habilidades y la capacidad instalada para redactar
                       y corregir textos, de acuerdo con las necesidades de documentos de diversa naturaleza.
                    </p>
                </div>
                {{--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>--}}
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="DiseñoEditorial" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Diseño editorial e ilustración</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>   El diseño editorial, que incluye portadas e interiores, parte de un análisis del discurso textual para
                          crear un discurso gráfico que logre armonía entre la palabra escrita y la imagen, en beneficio del mensaje.
                          El trabajo de ilustración, lejos de ser accesorio, es la síntesis plástica del discurso, que también puede
                          dotar de matices icónicos al libro. </p>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AsesoriaDerechos" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Asesoría en derechos de autor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>
                    Cada creación es un bien patrimonial para su creador. La reivindicación de ese derecho,
                     así como del derecho moral de ser reconocido como autor, parte del conocimiento de sus alcances
                     y límites legales, y se concreta en el registro de las obras ante las autoridades competentes.
                     Elementum brinda asesoría básica en esta materia.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="CursosTalleres" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cursos y talleres</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Lectores y autores potenciales interesados en acercarse a los oficios del libro
                      encuentran en los talleres de Elementum una alternativa pedagógica para concretar,
                      parcial o totalmente, sus propias publicaciones. Asimismo, Elementum brinda
                      capacitaciones en redacción dirigidas a públicos con diversos niveles de dominio de la palabra escrita.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ServicioPromocion" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Promoción cultural</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>El colosal reto de despertar interés hacia los productos editoriales en un país que no se caracteriza por sus arraigados hábitos de lectura es afrontado por Elementum a través de diversas actividades de promoción y difusión, como presentaciones editoriales aderezadas con exhibiciones cinematográficas, debates, conversatorios y recitales, entre otras, que buscan romper esquemas tradicionales y crear públicos lectores.</p>
            </div>

        </div>
    </div>
    </div>

@endsection

@section('script_home')
    <script>
    $(document).ready(function() {
         $('.social_icons').css("border","2px solid #ffffff");
    });
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.navigation').css({'background-color':'rgba(255, 255, 255, 1)'},{'color':'#1d3b4f'});
                $('.navigation').css({'border-bottom':'1px solid #9FA09D'});
                $('#blogid').css({'border-right':'1px solid #9FA09D'});
                $('#iconos').css('border-bottom','#00374e');
                $('#barraleft').css('border-left','1px solid #9FA09D');
                $('.social_icons').css({'border':'2px solid #00364F'});
                $('nav ul li a').css({'color':'#1d3b4f'});
                $('nav ul li i').css({'color':'#1d3b4f'});
                $('nav ul li a').css({'font-weight':'bold'});
                $('#logoElementum1').hide();
                $('#logoElementum2').show();
                // $(nav-container ul li a').css('color','#1b2d49');
            } else {
                $('.navigation').css({'background-color':'rgba(0, 0, 0, 0)'},{'border-bottom':'1px solid rgba(255, 255, 255, 0.85)'});
                $('.navigation').css({'border-bottom':'1px solid #fff'});
                $('#blogid').css({'border-right':'1px solid white'});
                $('#iconos').css('border-bottom ','#1d3b4f');
                $('#barraleft').css('border-left','1px solid white');
                $('.social_icons').css({'border':'2px solid #ffffff'});
                $('nav ul li a').css('color','white');
                $('nav ul li i').css({'color':'white'});
                $('nav ul li a').css({'font-weight':'normal'});
                $('#logoElementum2').hide();
                $('#logoElementum1').show();
            }
        });
       function reveal(a){
         $('.text-card-'+a).slideToggle();
        }
    </script>
@endsection
