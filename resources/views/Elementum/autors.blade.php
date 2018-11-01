@extends('template')
@section('autores')

    <figure>
        <img style="margin-top: -300px;" width="100%" src="{{ URL::to('/') }}/images/fotoportadautores.jpg" alt="">
        <figcaption id="tituloAutores">Autores <br>Elementum</figcaption>
    </figure>
    <div class="container ">
    </div>
    <div class="separador"></div>
    <div class="separador"></div>
    <br><br>
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

    <div class="container" style="margin: 0 auto;width: 100%;">
        <div class="row">
        @foreach($autors as $item)

                <div class="foto_autor col-md-4 text-center" style="margin: auto;padding-bottom: 150px;">
                    <div>
                {{--<button class="btn_acerca_autor">Acerca del autor</button>--}}
                <br><br>
                <figure class="fig_aut">
                    <img class="img-fluid img-autor" width="70%" src="{{ URL::to('/') }}/images/fotos_autores/{{$item->imagen}}" alt="">
                </figure>
              {{--  <hr style="background-color: rgba(52,73,88,0.58);width: 40%;">--}}
                <hr style="background-color: rgba(52,73,88,0.58);width: 40%;">
                <div class="nombre_autor">{{$item->nombre}}&nbsp;{{$item->apellido_p}}</div>
                <br>
                <div class="obra" style="height: 80px; width: 80%;margin: 0 auto;">{{$item->breve_desc}}</div>
                <br>
                <a href="{{route('autores.detalle',$item->id)}}" style="text-decoration: none;"><button class="btn_contacto_autor">Acerca del autor</button></a>
                <div class="autor_icons icons">
                    <a class="icon_social {{$item->facebook}}  " target="_blank" data-icon="{{$item->facebook}}" href="{{$item->facebook}}"><i class="icon_autor_list fab fa-facebook-f social_icons"></i></a>
                    <a class="icon_social {{$item->twitter}}  " target="_blank" data-icon="{{$item->twiter}}" href="{{$item->twiter}}"><i class="icon_autor_list fab fa-twitter social_icons"></i></a>
                    <a class="icon_social {{$item->instagram}}  " target="_blank" data-icon="{{$item->instagram}}" href="{{$item->instagram}}"><i class="icon_autor_list fab fa-instagram social_icons"></i></a>

                </div>
                <br>
            </div>
                </div>
        @endforeach
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
            /*----------------------------*/
        });
    </script>
@endsection
