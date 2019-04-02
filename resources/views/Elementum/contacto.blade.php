@extends('template')
@section('autores')
    <div class="separador"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="font-contacto-color">Contacto</h1>
                <hr style="background-color: #1278a7">
                <br>
                <div class="font-contacto-color data-location">
                    Teléfono <br>
                    {{ $elementum->telefono }} <br>
                </div>
                <br>
                <div class="font-contacto-color">
                  {!!  nl2br(e($elementum->direccion)) !!}
                </div>
                <br><br>
                <h3 class="font-contacto-color">Solicita información</h3>

                <hr style="background-color: #39748d">

                <form action="" class="form text-center">
                    <input class="form-control contact-form" type="text" placeholder="Nombre" required>
                    <input class="form-control contact-form" type="email" placeholder="Correo eléctronico" required>
                    <input class="form-control contact-form" type="tel" min="0" placeholder="Número telefónico"
                           required>
                    <textarea class="form-control contact-form" name="mensaje" id="" cols="30" placeholder="Mensaje"
                              rows="10" required></textarea>
                    <input class="btn-enviar" type="submit" value="Enviar">
                </form>
            </div>
            <div class="col-md-6 text-center" style="vertical-align:middle; margin-top: 60px">
                <div class="map-responsive">
                    <iframe style="border-radius: 15px;"
                            src="{{ $elementum->addr }}"
                            width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div style="margin-top: 30px">
                    <a href="{{ $elementum->facebook }}" target="_blank"><i style="font-size: 15px; color: #27375b; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-facebook-f social_icons"></i></a>
                    <a href="{{ $elementum->twitter }}" target="_blank"><i style="font-size: 15px; color: #27375b; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-twitter social_icons"></i></a>
                    <a href="{{ $elementum->insta }}" target="_blank"><i style="font-size: 15px; color: #27375b   ; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-instagram social_icons"></i></a>
                </div>
                <br>
                <a data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">
                    Aviso de privacidad simplificado.
                </a>
            </div>
        </div>
    </div>
    <img id="imgContacto" src="{{ URL::to('/') }}/images/fotocontacto.jpg" alt="">


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AVISO DE PRIVACIDAD SIMPLIFICADO DE SOLICITUD DE
                        INFORMACIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $politicaSimplificada[0]->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_collection')
    <script>
        $(document).ready(function () {
            $('.navigation').css({'background-color': 'rgba(255, 255, 255, 1)'}, {'color': '#1d3b4f'});
            $('.navigation').css({'border-bottom': '1px solid #9FA09D'});
            $('#blogid').css({'border-right': '1px solid #9FA09D'});
            $('#iconos').css('border-bottom', '#00374e');
            $('#barraleft').css('border-left', '1px solid #9FA09D');
            $('nav ul li a').css({'color': '#1d3b4f'});
            $('nav ul li i').css({'color': '#1d3b4f'});
            $('nav ul li a').css({'font-weight': 'bold'});
            $('#logoElementum1').hide();
            $('#logoElementum2').show();
            $('nav ul li a').hover(function () {
                $(this).css({'color': '#fff'})
            }, function () {
                $(this).css({'color': '#1d3b4f'})
            });
        });
    </script>
@endsection
