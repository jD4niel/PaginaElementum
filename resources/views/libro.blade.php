@extends('template')
@section('libro')
    <div class="separador"></div>
<div class="container ">
    <div class="row">
        <div class="col-md-5">
                <img style="filter: drop-shadow(-5px 7px 2px #4e4e4eb5);" class="img-responsive" src="{{ URL::to('/') }}/images/libros/{{$libros->imagen}}" alt="" height="400px">


        </div>
        <div class="col-md-7">
            {{--<h1> | {{libros}} |</h1>--}}
            <h1>{{$libros->nombre}}</h1>
            <h5>{{$libros->subtitulo}}</h5>
            <p style="text-align: justify;">{!!$libros->semblanza!!} </p>
            <div>
                <strong>Autor: </strong><span>{{$libros->autor->nombre}}&nbsp;{{$libros->autor->apellido_p}}&nbsp;{{$libros->autor->apellido_m}}</span>
            </div>
            <br>
            <div>
                @if($libros->precio>0)
                <h2>${{$libros->precio}}</h2>
                @else
                <h2 style="color:rgb(0, 163, 255)">Encuentralo en Elementario</h2>
                @endif
            </div>
            <br>
            <div style="float: right;">Compartir &nbsp;
                <i onclick="fbshareCurrentPage()"style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-facebook-f social_icons"></i>
                <i onclick="twshare()"style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-twitter social_icons"></i>
                <!-- <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-instagram social_icons"></i> -->
            </div>
            <br>
            <hr>
        </div>
    </div>
    <div class="separador"></div>
    <div class="row">
        @if($libros->precio>0)
            @if($libros->url=='')
            <div style="padding-left: 10px;" class="table-responsive col-md-6 center-block">
                <button data-toggle="modal" data-target="#comprarModal" class="btn btn-warning btn-block col-md-6">Comprar</button>
            </div>
            @else
            <div style="padding-left: 10px;" class="table-responsive col-md-6 center-block">
                <a href="{{$libros->url}}" target="_blank"><button class="btn btn-warning btn-block col-md-6">Comprar</button></a>
            </div>
            @endif
        @else
        <div class="">

        </div>
        @endif
        <div class="col-md-6" >
            {{--<button id="btnFrag" style="float: right;">Leer fragmento</button>--}}
            <div style="text-align: right;">
                {{$libros->tamaño}}<br>
                ISBN:&nbsp;{{$libros->isbn}}
            </div>
        </div>
    </div>
    <br>
    <div class="separador"></div>

    <h1>OBRAS RELACIONADAS </h1>
    <div class="row">
        @if(count($recomendados)>4)
        <div class="owl-carousel">
            @foreach($recomendados as $item)

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
            @foreach($recomendados as $item)

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
</div>
<div id="comprarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content normal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="margin:0 auto;">Comprar en Elementario</h3>
      </div>
      <div class="modal-body">
        <p>Jardín Colón No. 8, col. Centro
          Pachuca,Hgo. | (771) 715 05 67</p>
        <div class="map-responsive">
            <iframe style="border-radius: 15px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1469.6436497436994!2d-98.73256771458443!3d20.121537649016968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d109fbef270a93%3A0x8ebdf798457ff71f!2sEditorial+Elementum!5e0!3m2!1ses!2smx!4v1538584320015" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-content" data-dismiss="modal">Entendido</button>
      </div>
    </div>

  </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel();
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

        function fbshareCurrentPage(){
         window.open("https://www.facebook.com/sharer/sharer.php?u="+escape(window.location.href)+"&t="+document.title, '',
          'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
          return false;
        }
        function twshare(){
          window.open("http://twitter.com/share?text=En @edi_elementum encontre este libro: &url="+escape(window.location.href)+"&t="+document.title, '',
           'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
           return false;
        }

    </script>
@endsection
