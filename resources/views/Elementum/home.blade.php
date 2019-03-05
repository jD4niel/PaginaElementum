@extends('template')
@section('home')
    <div id="Slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i = 0; $i < count($slider); $i++)
            <li data-target="#Slider" data-slide-to="{{$i}}" class="@if($i==$first) active @endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach($slider as $item)
            <div class="carousel-item @if($item->id == $first) active @endif">
                <img class="d-block w-100 " height="80%" style="margin-top:-250px;"  src="{{ URL::to('/') }}/images/slider/{{$item->nombre}}" alt="">
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -80px;">
                <div class="input-group mb-3">
                    <input  id="buscartxt" type="text" class="form-control simplebox fade-up" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2" style="background-color:#e9f2ef;border-top-left-radius: 15px;border-bottom-left-radius: 15px; height:45px;font-size: 20px; border:none;">
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
                     <div class="cajon col-md-3 wow fadeInUp">
                <div class="cajas align-content-center text-center" style="padding-top: 30px;padding-bottom: 20px;">
                    <img height="200px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}" alt="">
                    <hr>
                    <a href="{{route('detalle.libros',$item->id)}}" class="btnDetalle">Ver detalle</a>
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
        <div class="row align-content-center text-center" style="width: 80%; margin: auto;text-align: center;">
                @foreach($servicios as $item)
                <div class="col-md-4 iconoservicios">
                        <figure>
                            <img src="{{asset('images/servicios')}}/{{ $item->image }}" alt="{{ $item->name }}" data-backdrop="false" data-toggle="modal" data-target="#servicios_modal" data-title="{{ $item->name }}" data-id="{{ $item->id }}" data-text="{!! $item->text !!}" >
                            <figcaption>{{ $item->name }}</figcaption>
                        </figure>
                </div>
                @endforeach()

        </div>
    </div>
    <div class="separador"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin: auto;">
                <figure>
                    <img style="width: 110%" class="img-fluid" src="{{ URL::to('/') }}/images/img_ref.jpg">
                    <a target="_blank" href="{{ URL::to('/') }}/descarga.pdf">
                        <div class="col-md-12">
                            <figcaption class="figImagen">
                                Descarga el PDF aquí &nbsp;
                                <img width="20px" src="{{ URL::to('/') }}/images/iconos/iconodescarga.png" alt="">
                            </figcaption>
                        </div>
                    </a>
                </figure>
            </div>
        </div>
    </div>
    <div class="separador"></div>
    <div style="background-color:#DCDDDE;">
        <div class="container" style="background-color:#DCDDDE;padding:50px 0 50px 0;">
        <div class="text-center"><h1 class="h1" style="color:#00949c; font-size: 15vh;">TALLERES</h1></div>
            <div class="row text-center">
                @foreach($talleres as $taller)
                <div class="card" style="width: 22rem;margin:auto;">
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/talleres/{{$taller->imagen}}" alt="Card image cap">
                        <div class="card-body" onclick="reveal({{$taller->id}})" style="cursor:pointer; background:rgba(255, 255, 255, 0.52)">
                              <h5 class="card-title">{{$taller->titulo}}</h5>
                              <i class="fas fa-sort-down"></i>
                              <div class="card-text text-card-{{$taller->id}}" style="text-align:justify; display:none;">{!! $taller->descripcion !!}</div>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><strong>Duración:</strong><br>{{$taller->duracion}}</li>
                              <!-- <li class="list-group-item"><strong>Inversión:</strong><br>$1,100</li> -->
                              <li style="display:none;" class="list-group-item text-card-{{$taller->id}}"><strong>Sede:</strong><br> {{$taller->sede}}</li>
                        </ul>
                        <div style="display:none;" class="card-body text-card-{{$taller->id}}">
                              Informes e inscripciones a <a href="tallereselementum@hotmail.com">tallereselementum@hotmail.com</a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="contaier">
        <div class="row">
            <img class="img-fluid col-md-12" src="{{ URL::to('/') }}/images/elementum_jardin.png" alt="jardin colon">
        </div>
    </div>

  <!-- Modal -->
<div id="servicios_modal" class="modal fade" role="dialog" style="backdrop: true !important">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p class="modal-p"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('script_home')
    <script>
    $(document).ready(function() {
         $('.social_icons').css("border","2px solid #ffffff");
        $('.navigation').css({'position':'relative'},{'background-color':'red'});
    });
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.navigation').css('position','sticky');
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
                $('nav ul li a').hover(function(){
                    $(this).css({'color':'#fff'})
                },function() {
                    $(this).css({'color':'#1d3b4f'})
                });

                $('.fa-twitter').hover(function(){
                    $(this).css({'color':'#1a9abb'})
                },function() {
                    $(this).css({'color':'#1d3b4f'})
                });
                $('.fa-facebook-f').hover(function(){
                    $(this).css({'color':'#1b46bb'})
                },function() {
                    $(this).css({'color':'#1d3b4f'})
                });
                $('.fa-instagram').hover(function(){
                    $(this).css({'color':'#d1073e'})
                },function() {
                    $(this).css({'color':'#1d3b4f'})
                });
                // $(nav-container ul li a').css('color','#1b2d49');
            } else {

                $('.navigation').css('position','sticky');
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
                $('nav ul li a').hover(function(){
                    $(this).css({'color':'#fff'})
                },function() {
                    $(this).css({'color':'#fff5fd'})
                });

                $('.fa-twitter').hover(function(){
                    $(this).css({'color':'#1a9abb'})
                },function() {
                    $(this).css({'color':'#fff'})
                });
                $('.fa-facebook-f').hover(function(){
                    $(this).css({'color':'#1b46bb'})
                },function() {
                    $(this).css({'color':'#fff'})
                });
                $('.fa-instagram').hover(function(){
                    $(this).css({'color':'#d1073e'})
                },function() {
                    $(this).css({'color':'#fff'})
                });
            }
        });
       function reveal(a){
         $('.text-card-'+a).slideToggle();
        }
        //Editar modal 
        $('#servicios_modal').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget); 
            var modal   = $(this);
            var title = button.data('title');
            var texto =button.data('text');
            modal.find('.modal-title').text(title);
            modal.find('.modal-p').html(texto);
        });
    </script>
@endsection
