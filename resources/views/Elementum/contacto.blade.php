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
                    (771) 715 05 67
                </div>
                <br>
                <div class="font-contacto-color data-location">Editorial Elementum S.A. de C.V.</div>
                <div class="font-contacto-color data-location">Jardín Colón No. 8, col. Centro</div>
                <div class="font-contacto-color data-location">Pachuca,Hgo.</div>
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1469.6436497436994!2d-98.73256771458443!3d20.121537649016968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d109fbef270a93%3A0x8ebdf798457ff71f!2sEditorial+Elementum!5e0!3m2!1ses!2smx!4v1538584320015"
                            width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div style="margin-top: 30px">
                    <i style="font-size: 15px; color: #27375b; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-facebook-f social_icons"></i>
                    <i style="font-size: 15px; color: #27375b; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-twitter social_icons"></i>
                    <i style="font-size: 15px; color: #27375b   ; padding-top:6px;height: 30px; width: 30px;"
                       class="fab fa-instagram social_icons"></i>
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
                    Editorial Elementum Sociedad Anónima de Capital Variable, es el responsable del tratamiento de los
                    datos personales que nos proporcione. <br><br>

                    Los datos personales que recabemos de usted, los utilizamos para las siguientes finalidades: a)
                    Registrar su solicitud de información sobre servicios editoriales y b) Dar contestación lo más
                    pronto posible y por diversos medios de comunicación a la solicitud planteada. <br><br>

                    De Manera adicional, utilizaremos su información personal para las siguientes finalidades que nos
                    permiten y facilitan brindarle una mejor atención: a) Servir como un puente de comunicación estable
                    entre la editorial Elementum y el solicitante o posible cliente. <br><br>

                    En caso de que no desee que sus datos personales sean tratados para las finalidades adicionales
                    usted puede manifestarlo a través de un correo electrónico a la siguiente dirección:
                    editorialelementum@gmail.com
                    <br><br>

                    Se informa que no se realizarán ningún tipo de transferencias que requieran su consentimiento, salvo
                    aquellas que sean necesarias para atender requerimientos de información de una autoridad competente,
                    debidamente fundados y motivados. <br><br>


                    Para mayor información acerca del tratamiento y de los derechos que pueda hacer valer, usted puede
                    acceder al aviso de privacidad integral haciendo click <a href="/aviso-de-privacidad">aquí</a>.
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
