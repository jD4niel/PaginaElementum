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
            <div class="carousel-item @if($item->id == $first) active @endif h-100">
                <img class="d-block w-100" src="{{ URL::to('/') }}/images/slider/{{$item->nombre}}" alt="">
                   @if($item->show_btn == 1)
                    <div style="text-align: center; position: absolute;bottom: 11vh;left: 50%;">
                        <div style="position: relative;left: -50%;" class="relative_box_btn">
                            <a href="{{ $item->btn_url }}"  target="_blank">
                                <button 
                                     @if($item->btn_color != '#000000')
                                        style="background-color:{{$item->btn_color}};
                                        @if(isset($item->btn_text_size))
                                            font-size: {{$item->btn_text_size}}px;
                                        @endif
                                        @if(isset($item->btn_text_color))
                                            color: {{$item->btn_text_color}};
                                        @endif
                                        " 
                                        class="btn btn_in_slider_home" 
                                      @else 
                                        class="btn-hover color-9"
                                      @endif
                                >{{ $item->btn_text }}</button>
                            </a>
                        </div>
                    </div>
                @endif
	    </div>
            @endforeach
        </div>
    </div>

    <div class="container d-md-block" style="margin-top: -70px">
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input  id="buscartxt" type="text" class="form-control simplebox fade-up" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2" style="background-color:#e9f2ef;border-top-left-radius: 15px;border-bottom-left-radius: 15px; height:45px;font-size: 20px; border:none;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="buscar()" type="button" style="background-color:#e9f2ef;font-size:20px;border-top-right-radius: 18px;border-bottom-right-radius: 18px;border:none;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div> {{--contenedor fin--}}

    <div style="background-color:#DCDDDE;" class="responsive-margin">
       <div class="container pt-5">
            <div id="cajaLibros" class="row text-center" >
                 @foreach($libros as $item)
                     <div class="cajon col-md-3 wow fadeInUp">
                        <div class="cajas align-content-center text-center" style="padding-top: 30px;padding-bottom: 20px;">
                            <img src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}" alt="" style="height: 200px; object-fit: cover; max-width: 200px">
                            <hr>
                            <a href="{{route('detalle.libros',$item->id)}}" target="_blank"  class="btnDetalle">Ver detalle</a>
                        </div>
                     </div>
                @endforeach
            </div>
           <br>
           <div style="font-size: 1.5em;" class="text-center">
               <a href="{{route('libros.colecciones')}}">Ver todo</a>
           </div>
           <br>
        </div>
    </div>

    <div class="container-fluid py-5">
        <h1 class="h1 text-center">SERVICIOS</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="row text-center">
                    @foreach($servicios as $item)
                        <div class="col-12 col-sm-6 col-md-3 iconoservicios">
                            <figure>
                                <img src="{{asset('images/servicios')}}/{{ $item->image }}" alt="{{ $item->name }}" data-backdrop="false" data-toggle="modal" data-target="#servicios_modal" data-title="{{ $item->name }}" data-id="{{ $item->id }}" data-text="{!! $item->text !!}"  style="width: 100px; height: 100px; object-fit: cover">
                                <figcaption>{{ $item->name }}</figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="contaier">


    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <figure>
                    <img style="width: 110%" class="img-fluid" src="{{ URL::to('/') }}/images/img_ref.jpg">
                        <div class="col-md-12">
                            <a target="_blank" href="{{ URL::to('/') }}/elementum.pdf">
                                <figcaption class="figImagen">
                                    Descarga el PDF aquí &nbsp;
                                    <img width="20px" src="{{ URL::to('/') }}/images/iconos/iconodescarga.png" alt="">
                                </figcaption>
                            </a>
                        </div>
                </figure>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <h1 class="h1" style="color:#00949c; font-size: 15vw;margin:auto;float:none;">TALLERES</h1>
        </div> <br>
        <div class="row text-center">
            @foreach($talleres as $taller)
                <div class="card" style="width: 22rem;margin:3em auto;">
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/talleres/{{$taller->imagen}}" alt="Card image cap">
                        <div class="card-body" onclick="reveal({{$taller->id}})" style="cursor:pointer; background:rgba(255, 255, 255, 0.52)">
                              <h5 class="card-title">{{$taller->titulo}}</h5>
                              <i class="fas fa-sort-down"></i>
                              <div class="card-text text-card-{{$taller->id}}" style="text-align:justify; display:none;">{!! $taller->descripcion !!}</div>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><strong>Duración:</strong><br>{{$taller->duracion}}</li>
                              <li style="display:none;" class="list-group-item text-card-{{$taller->id}}"><strong>Sede:</strong><br> {{$taller->sede}}</li>
                        </ul>
                        <div style="display:none;" class="card-body text-card-{{$taller->id}}">
                              Informes e inscripciones: {{ $taller-> informes }}
                        </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="separador"></div>
    
    <div class="container-fluid" style="padding: 0;width:100%;">
            <img class="img-fluid" width="100%" src="{{ URL::to('/') }}/images/elementum_jardin.png" alt="jardin colon">
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

    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight|| e.clientHeight|| g.clientHeight;

    $(document).ready(function() {
         $('.social_icons').css("border","2px solid #ffffff");
        $('.navigation').css({'position':'relative'},{'background-color':'red'});

        if(x < 768){
            $('.navigation').css({'background-color':'rgba(255, 255, 255, 1)'},{'color':'#1d3b4f'});
            $('#logoElementum1').hide();
            $('#logoElementum2').show();
            $('nav ul li a').css({'color':'#1d3b4f'});
            $('nav ul li a').css({'font-weight':'bold'});
            $('#iconos').css('border-bottom','#00374e');
            $('#barraleft').css('border-left','1px solid #9FA09D');
            $('.social_icons').css({'border':'2px solid #00364F'});
            $('.social_icons').css({'color':'#1d3b4f'});
            $('.footer').css({'color':'#ffffff'});
            $('.footer').css({'border':'2px solid #ffffff'});

        }
    });
        $(window).scroll(function() {

            if(x < 768){

                $('.navigation').css('position','sticky');
                

            } else {

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
