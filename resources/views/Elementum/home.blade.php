@extends('template')
@section('home')

    <div id="Slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#Slider" data-slide-to="0" class="active"></li>
            <li data-target="#Slider" data-slide-to="1"></li>
            <li data-target="#Slider" data-slide-to="2"></li>
            <li data-target="#Slider" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-100" height="700px"  src="{{ URL::to('/') }}/images/slider/fotoslider1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" height="700px" src="{{ URL::to('/') }}/images/slider/fotoslider2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" height="700px" src="{{ URL::to('/') }}/images/slider/fotoslider3.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" height="700px" src="{{ URL::to('/') }}/images/slider/fotoslider4.png" alt="Four slide">
            </div>
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
                        <figcaption>Servicios de promocion <br>cultural editorial</figcaption>
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
        <div class="container-full">
            <div class="row col-md-12 align-content-center text-center center-block">
                <div class="col-md-1" style="margin-left: -20px;"></div>
              <div id="eventosDiv1" class="col-md-3 eventosDiv  text-center align-content-center">
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



              </div>
              <div id="eventosDiv3" class="col-md-3 eventosDiv  text-center align-content-center">
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
              </div>
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
                    <p>Elementum hace y vende libros dentro de una dinámica cultural que involucra la participación de editores, autores y lectores.
                        Se trata de una propuesta sustentada en un equipo profesional que incluye una retribución social pertinente a la comunidad.
                        Cuenta entre sus valores la calidad, la satisfacción al cliente, el respeto al lector, la inclusión, la democracia y la fraternidad.
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
                    <p>La transformación de cultura, imaginación, conocimientos y cosmovisión en textos pertinentes y funcionales se logra a
                        través de la gestión de contenidos. Elementum tiene las habilidades y la capacidad instalada para redactar y
                        corregir textos, de acuerdo con las necesidades de documentos de diversa naturaleza. </p>
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
                    <p>El diseño editorial, que incluye portadas e interiores, parte de un análisis del discurso textual para
                        crear un discurso gráfico que logre armonía entre la palabra escrita y la imagen, en beneficio del mensaje.
                        El trabajo de ilustración, lejos de ser accesorio, es la síntesis plástica del discurso, que también puede
                        dotar de matices icónicos al libro.</p>
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
                    <p>Elementario ha tomado la iniciativa de formar a escritores en el estado a través de su espacio educativo, El aula. En este lugar los asistentes encontrarán talleres en torno al fomento de la escritura y la lectura. Asimismo, El aula ofrece capacitaciones para especialistas que deseen de conocer más acerca del mundo editorial. En su primer ciclo escolar se ofrecerán talleres de narrativa y poesía básica.</p>
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
                    <p>En Elementario hemos aceptado el reto de promover de forma constante las actividades artísticas que se desarrollan en Hidalgo,
                        en un espacio que ofrece todo lo necesario para que los creativos expresen sus ideas y su visión del mundo que nos rodea.
                        Asumimos el reto de despertar el interés por la cultura por medio de exhibiciones, debates, conversatorios presentaciones
                        musicales y, sobre todo, propuestas escénicas de fomento a la lectura.</p>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script_home')
    <script>
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
    </script>
@endsection