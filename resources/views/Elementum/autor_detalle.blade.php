@extends('template')
@section('libro')
    <div class="separador"></div>
<div class="container ">
    <div class="row" style="margin: 0 auto;">
        <div class="col-md-3" style="margin:0 auto;">
                <img style="filter: drop-shadow(-5px 7px 2px #4e4e4eb5);border-radius: 50%;height:auto;width: 100%;margin-top: 70px;text-align: center;" class="img-responsive" src="{{ URL::to('/') }}/images/fotos_autores/{{$autor->imagen}}" alt="" height="400px">
        </div>
        <div class="col-md-7" style="margin: 0 auto;">
          <h1>{{$autor->nombre}}{{$autor->apellido_p}}&nbsp;{{$autor->apellido_m}}</h1>
            {{--<h1> | {{libros}} |</h1>--}}
            <hr>
            {{--<hr>  cambiarNorma pperez vences--}}
            {{--<h5>{{$libros->descripcion}}</h5>--}}
            <p style="text-align: justify;text-justify: inter-word;">{!! $autor->semblanza!!} </p>
            <br>
            <div class="col-md-12 text-right">
              <span id="contacto-autor" class="col-md-12" style="font-size:1.8em;">Contacto con autor</span>
              <br>
                <div class="btn-group right text-right col-md-5" s target="_blank" tyle="float: right; border-top:1px solid #869ea4;padding-top: 10px;text-align: right;margin:auto;">
                    <a target="_blank" href="{{$autor->facebook}}"><button id="btn-facebook" type="button" class="btn btn-face {{$autor->facebook}}"> <i class="redes fab fa-facebook "></i></button></a>
                    <a target="_blank" href="https://twitter.com/{{$autor->twitter}}"><button id="btn-twitter" type="button" class="btn btn-tw {{$autor->twitter}}"> <i class="redes fab fa-twitter"></i></button></a>
                    <a target="_blank" href="instagram.com/{{$autor->instagram}}"><button id="btn-insta" type="button" class="btn btn-insta {{$autor->instagram}}"> <i class="redes fab fa-instagram"></i></button></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="separador"></div>
    <div class="container">
        @if(count($libros)<1)
            <div class="separador"></div>
        @else
            <h1>OBRAS PUBLICADAS </h1>
            <hr>
            <div class="row">
                @if(count($libros)==1)
                    @foreach($libros as $item)
                        <div id="imgboxId{{$item->id}}" class="imgbox col-md-10 align-content-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                            <a href="{{route('detalle.libros',$item->id)}}">
                                <figure>
                                    <img width="250px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}">
                                    <figcaption>ver</figcaption>
                                </figure>
                            </a>
                        </div>

                    @endforeach
                @elseif(count($libros)>4)
                    <div class="owl-carousel">
                        @foreach($libros as $item)

                            <div id="imgboxId{{$item->id}}" class="imgbox col-md-10 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                                <a href="{{route('detalle.libros',$item->id)}}">
                                    <figure>
                                        <img width="150px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}">
                                        <figcaption>ver</figcaption>
                                    </figure>
                                </a>
                            </div>

                        @endforeach
                    </div>
                @else
                    @foreach($libros as $item)

                        <div id="imgboxId{{$item->id}}" class="imgbox col-md-3 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                            <a href="{{route('detalle.libros',$item->id)}}">
                                <figure>
                                    <img class="img-responsive" width="200px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}">
                                    <figcaption>ver</figcaption>
                                </figure>
                            </a>
                        </div>

                    @endforeach
                @endif
            </div>
        @endif
       {{-- <h1>OBRAS PUBLICADAS </h1>
        <hr>
        <div class="owl-carousel">
           @foreach($libros as $item)

                <div id="imgboxId{{$item->id}}" class="imgbox col-md-10 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                    <a href="{{route('detalle.libros',$item->id)}}">
                        <figure>
                            <img width="150px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}">
                            <figcaption>ver</figcaption>
                        </figure>
                    </a>
                </div>

            @endforeach
        </div>--}}
    </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
          $('.navigation').css({'background-color':'rgba(255, 255, 255, 1)'},{'color':'#1d3b4f'});
          $('.navigation').css({'border-bottom':'1px solid #9FA09D'});
          $('#blogid').css({'border-right':'1px solid #9FA09D'});
          $('#iconos').css('border-bottom','#00374e');
          $('#barraleft').css('border-left','1px solid #9FA09D');
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
            $(".owl-carousel").owlCarousel();

          if ($('#btn-facebook').hasClass('not_')) {
              $('#btn-facebook').css('display','none');
          }
          if ($('#btn-twitter').hasClass('not_')) {
              $('#btn-twitter').css('display','none');
          }
          if ($('#btn-insta').hasClass('not_')) {
              $('#btn-insta').css('display','none');
          }
          if ($('#btn-facebook').hasClass('not_')&&$('#btn-twitter').hasClass('not_')&&$('#btn-insta').hasClass('not_')) {
              $('#contacto-autor').hide();
              $('#btn-facebook').css('display','none');
              $('#btn-twitter').css('display','none');
              $('#btn-insta').css('display','none');
          }
        });
        /***************************************/
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:4,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[1000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })
    </script>
@endsection
