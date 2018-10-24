@extends('template')
@section('autores')

    <figure>
        <img width="100%" src="{{ URL::to('/') }}/images/fotoportadautores.jpg" alt="">
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

    <div class="container">
        <div class="row">

            <div class="foto_autor col-md-3 text-center" style="margin: auto;">
                <button class="btn_acerca_autor">Acerca del autor</button>
                <br><br>
                    <img class="img-fluid" src="{{ URL::to('/') }}/images/fotos_autores/agustincadena.png" alt="">
              {{--  <hr style="background-color: rgba(52,73,88,0.58);width: 40%;">--}}
                <hr style="background-color: rgba(52,73,88,0.58);width: 40%;">
                <div class="nombre_autor">Agustín Cadena</div>
                <br>
                <div class="obra">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi dignissimos dolorem expedita fugiat harum, itaque </div>
                <br>
                <button class="btn_contacto_autor">Contacto</button>
                <br>
                <div class="autor_icons icons">
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color:black;" class="fab fa-facebook-f social_icons"></i>
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color:black;" class="fab fa-twitter social_icons"></i>
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color:black;" class="fab fa-instagram social_icons"></i>

                </div>
                <br>
            </div>

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
            $('.social_icons').css({'border':'2px solid #00364F'});
            $('nav ul li a').css({'color':'#1d3b4f'});
            $('nav ul li i').css({'color':'#1d3b4f'});
            $('nav ul li a').css({'font-weight':'bold'});
            $('#logoElementum1').hide();
            $('#logoElementum2').show();
        });

    </script>
@endsection
