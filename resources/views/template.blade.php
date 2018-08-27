<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elementum</title>

        <!-- Fonts -->
       {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            /*@charset "UTF-8";*/
            .navigation {
                background: rgba(0,0,0,0);
                position: sticky;
                left:0px;
                top: 0px;
                z-index: 1000;
                padding: 20px;
                height: 100px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.85);
                transition: all 300ms ease-in-out;
            }

            .brand {
                position: absolute;
                padding-left: 0px;
                float: left;
                line-height: 70px;
                text-transform: uppercase;
                font-size: 1.4em;
                padding-bottom:9px;


            }
            .brand a,
            .brand a:visited {
                color: #ffffff;
                text-decoration: none;

            }

            .nav-container {
                max-width: 1100px;
                margin: 0 auto;

            }
            a{
                height: 80px;
               /* border-bottom: 1px solid rgba(255, 255, 255, 0.85);;*/
            }
            nav {
                float: right;
            }
            nav ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            nav ul li {
                float: left;
                position: relative;
            }
            nav ul li a,
            nav ul li a:visited {
                display: block;
                padding: 0 20px;
                line-height: 70px;
                background: rgba(0,0,0,0);
                color: #ffffff;
                text-decoration: none;
            }
            nav ul li a:hover,
            nav ul li a:visited:hover {
                background: #589688;
                color: #ffffff;
            }
            nav ul li a:not(:only-child):after,
            nav ul li a:visited:not(:only-child):after {
                padding-left: 4px;
                content: ' ▾';
            }
            nav ul li ul li {
                min-width: 190px;
            }
            nav ul li ul li a {
                padding: 15px;
                line-height: 20px;
            }

            .nav-dropdown {
                position: absolute;
                display: none;
                z-index: 1;
                box-shadow: 0 3px 12px rgba(0, 0, 0, 0.44);
                background-color: rgba(134, 143, 148, 0.58);
            }

            /* Mobile navigation */
            .nav-mobile {
                display: none;
                position: absolute;
                top: 0;
                right: 0;
                background: rgba(0,0,0,0);
                height: 70px;
                width: 70px;
            }

            @media only screen and (max-width: 798px) {
                .nav-mobile {
                    display: block;
                }

                nav {
                    width: 100%;
                    padding: 70px 0 15px;
                }
                nav ul {
                    display: none;
                }
                nav ul li {
                    float: none;
                }
                nav ul li a {
                    padding: 15px;
                    line-height: 20px;
                }
                nav ul li ul li a {
                    padding-left: 30px;
                }

                .nav-dropdown {
                    position: static;
                }
            }
            @media screen and (min-width: 799px) {
                .nav-list {
                    display: block !important;
                }
            }
            #nav-toggle {
                position: absolute;
                left: 18px;
                top: 22px;
                cursor: pointer;
                padding: 10px 35px 16px 0px;
            }
            #nav-toggle span,
            #nav-toggle span:before,
            #nav-toggle span:after {
                cursor: pointer;
                border-radius: 1px;
                height: 5px;
                width: 35px;
                background: rgba(255, 255, 255, 0);
                position: absolute;
                display: block;
                content: '';
                transition: all 300ms ease-in-out;
            }
            #nav-toggle span:before {
                top: -10px;
            }
            #nav-toggle span:after {
                bottom: -10px;
            }
            #nav-toggle.active span {
                background-color: transparent;
            }
            #nav-toggle.active span:before, #nav-toggle.active span:after {
                top: 0;
            }
            #nav-toggle.active span:before {
                transform: rotate(45deg);
            }
            #nav-toggle.active span:after {
                transform: rotate(-45deg);
            }

            article {
                max-width: 1000px;
                margin: 0 auto;
                padding: 10px;
            }
            .carousel-inner .carousel-item {
                transition: -webkit-transform 2s ease;
                transition: transform 2s ease;
                transition: transform 2s ease, -webkit-transform 2s ease;
            }
            .carousel-indicators > li {
                border-radius: 100%;
                width: 15px;
                height: 15px;
            }

            #logoElementum{
                width: 70%;
                margin-top:-12px;

            }
            #Slider{
                position: relative;
                left: 0px;
                top: -100px;
            }
            .listado{

            }
            .simplebox {
                outline: none;
                -webkit-box-shadow: none !important;
                -moz-box-shadow: none !important;
                box-shadow: none !important;
            }


            .cajas{
                background-color: #F3F3F3;
                border-radius: 8px;
                box-shadow: 0px 0px 3px 2px rgba(0,0,0,0.2);
                border:none;
                margin:15px;
                transition-duration: 0.15s;
            }
            .cajas:hover{
                margin:12px;
                box-shadow: 0px 0px 3px 2px #B2CDFF;
            }
            .btnComprar{
                color: white;
                background-color: #FED61D;
                border:none;
                padding: 5px 10px 5px 10px;
            }
            .btnComprar:hover{
                cursor:pointer;
            }
            .btnDetalle{
                color: white;
                background-color: #2B669D;
                border:none;
                padding: 5px 10px 5px 10px;
            }
             .btnDetalle:hover{
                cursor:pointer;
            }

             .social_icons{
                 color: #ffffff;
                 border:2px solid #ffffff;
                 border-radius: 80px;
                 height: 40px;
                 width: 40px;
                 text-align: center;
                 padding-top: 10px;
                 transition-duration: 0.15s;
             }
             .social_icons:hover{
                 cursor: pointer;
                 border:2px solid #ffffff;
                 color: #ffe543;
             }
            /* footer */
            footer{
                background-color: #1d3b4f;
                color: white;
                padding-top: 50px;
                padding-bottom: 50px;

            }
            .iconoservicios{
                margin-top: 50px;
            }
            .iconoservicios img{
                margin-bottom: 15px;
            }
            .iconoservicios img:hover{
                filter: brightness(110%) hue-rotate(20deg);
                -webkit-filter: brightness(110%) hue-rotate(20deg);
                cursor:pointer;
            }
            .separador{
                margin-top: 75px;
                margin-bottom: 75px;
            }
            .figImagen{
                position: absolute;left: 0px;bottom: 0px;background-color: rgba(17,120,116,0.81);color: white;padding: 16px;font-size: 17px;line-height: 18px;text-align: right; width: 100%;
                transition-duration: 0.1s;
            }
            .figImagen:hover{
                cursor: pointer;
                background-color: rgba(19, 148, 144, 0.81);
                font-size: 18px;
            }
            .eventosDiv{
                background-color: white;
                border-radius: 15px;
                margin-left:25px;
                margin-right:25px;
                margin-bottom:25px;
                margin-top:25px;
                padding-bottom: 25px;
                transition-duration: 0.3s;
            }
            .eventosDiv:hover{
                margin-top: 15px;
                box-shadow: 0px 0px 3px 2px #6edbff;

            }
            .eventosDiv img{
                border-top-left-radius: 12px;
                border-top-right-radius: 15px;
                margin-left: -30px;
                margin-right: -30px;
                width: 369px;
            }
            .modal .modal-content{
                background-color: rgba(19, 148, 144, 0.81);
                color: white;
            }
            .modal-content button{
                color: white;
            }
            .modal-content button:hover{
                color: #ffce0d;
            }
            .hide{
                display: none;
            }
            /*cajas estilos*/
            .titulo_caja{
                font-size: 22px;
                color: #194166;
            }
            .imparte_caja{
                font-size: 20px;
                color: #194166;
            }
            .duracion_caja{
                font-size: 18px;
                color: rgba(19, 148, 144, 0.95);
            }
            .inversion_caja{
                font-size: 18px;
                color: rgba(19, 148, 144, 0.95);
            }
            .figbox{
                position: absolute;
                left: -2px;
                padding-top: 5px;
                padding-bottom: 5px;
                margin-top: -40px;
                width: 370px;
                /*background-color: rgba(17,120,116,0.81);*/
                background-color: rgba(79, 96, 94, 0.63);
                color: #fff;
            }
            .container-full {
                margin: 0 auto;
                width: 100%;
            }
            /*fin cajas estilos*/
            .cont{
                padding:20px;
                margin:auto;
            }
            .contenedor_colecciones{
                width: 350px;
                height: 150px;
                margin: auto;
                border-radius: 15px;
                background-color: #e3e3e3;
                padding:20px;
                transition-duration: 0.3s;

            }
            .contenedor_colecciones img{
                max-height: 100%;
                max-width: 100%;
                width: auto;
                height: auto;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
            .contenedor_colecciones:hover{
                cursor: pointer;
                background-color: #f8f8f8;
            }

        </style>
    </head>
    <body>
    <section class="navigation">
        <div class="nav-container">
            <div class="brand" style="">
                <img id="logoElementum" src="{{ URL::to('/') }}/images/logoblanco.png" alt="Editorial Elementum logo">
            </div>
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li style="border-left: 1px solid white;">
                        <a href="#!">Nosotros</a>
                    </li>
                    <li>
                        <a href="#!">Colecciones</a>
                    </li>
                    <li>
                        <a href="#!">Servicios</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">list item</a>
                            </li>
                            <li>
                                <a href="#!">list item</a>
                            </li>
                            <li>
                                <a href="#!">list item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Elementario</a>
                    </li>
                    <li>
                        <a href="#!">Contacto</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">list item</a>
                            </li>
                            <li>
                                <a href="#!">list item</a>
                            </li>
                            <li>
                                <a href="#!">list item</a>
                            </li>
                        </ul>
                    </li>
                    <li style="border-right: 1px solid white;">
                        <a href="#!">Blog</a>
                    </li>
                    <li style="padding-top: 15px; padding-left: 15px; padding-bottom: 24px; border-bottom: 1px solid white;">
                        <i class="fab fa-facebook-f social_icons"></i>
                        <i class="fab fa-twitter social_icons"></i>
                        <i class="fab fa-instagram social_icons"></i>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    @yield('home')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Editorial Elementum S.A. de C.V. <br>
                    Jardín Colón No. 8, Col. Centro <br>
                    Pachuca, Hgo. <br>
                    <hr style="background-color: white; width: 250px; float:left;">
                </div>
                <div class="col-md-6 align-content-right" style="align-content: right; text-align: right;">
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-facebook-f social_icons"></i>
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-twitter social_icons"></i>
                    <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-instagram social_icons"></i>
                    <br>
                    Teléfono <br>
                    (771) 71 5 05 67 <br>
                    <hr style="background-color: white; width: 200px; float: right;">
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script>
    (function($) { // Begin jQuery
        $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
                //alert("hola");
                $('nav ul').toggle();

            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        }); // end DOM ready
    })(jQuery); // end jQuery

    //scroll
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.navigation').css('background-color','rgba(0, 0, 0, 0.7)');
        } else {
            $('.navigation').css('background-color','rgba(0, 0, 0, 0)');
        }
    });
    $(document).ready(function(){
        $(".descripcion").hide();

    });
    $('#logocreativaindependiente').on("click", function(event) {
        $("#logocreativaindependiente div").css({'background-color':'#559688'},2000);
        $("#logocreativaindependiente div img").css({'filter':'brightness(0) invert(1)'});

        $("#logoloselementales div").css({'background-color':'#e3e3e3'},600);
        $("#logoloselementales div img").css({'filter':'brightness(1) invert(0)'});
        $("#logometrica div").css({'background-color':'#e3e3e3'},2000);
        $("#logometrica div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoteatro div").css({'background-color':'#e3e3e3'},2000);
        $("#logoteatro div img").css({'filter':'brightness(1) invert(0)'});
        $("#logotravesia div").css({'background-color':'#e3e3e3'},2000);
        $("#logotravesia div img").css({'filter':'brightness(1) invert(0)'});
    });

    $('#logoloselementales').on("click", function(event) {
        $("#logoloselementales div").css({'background-color':'#b85458'},2000);
        $("#logoloselementales div img").css({'filter':'brightness(0) invert(1)'});


        $("#logocreativaindependiente div").css({'background-color':'#e3e3e3'},600);
        $("#logocreativaindependiente div img").css({'filter':'brightness(1) invert(0)'});
        $("#logometrica div").css({'background-color':'#e3e3e3'},2000);
        $("#logometrica div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoteatro div").css({'background-color':'#e3e3e3'},2000);
        $("#logoteatro div img").css({'filter':'brightness(1) invert(0)'});
        $("#logotravesia div").css({'background-color':'#e3e3e3'},2000);
        $("#logotravesia div img").css({'filter':'brightness(1) invert(0)'});
    });

    $('#logometrica').on("click", function(event) {
        $("#logometrica div").css({'background-color':'#d4752d'},2000);
        $("#logometrica div img").css({'filter':'brightness(0) invert(1)'});

        $("#logocreativaindependiente div").css({'background-color':'#e3e3e3'},600);
        $("#logocreativaindependiente div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoloselementales div").css({'background-color':'#e3e3e3'},2000);
        $("#logoloselementales div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoteatro div").css({'background-color':'#e3e3e3'},2000);
        $("#logoteatro div img").css({'filter':'brightness(1) invert(0)'});
        $("#logotravesia div").css({'background-color':'#e3e3e3'},2000);
        $("#logotravesia div img").css({'filter':'brightness(1) invert(0)'});
    });
    $('#logoteatro').on("click", function(event) {
        $("#logoteatro div").css({'background-color':'#c294b1'},2000);
        $("#logoteatro div img").css({'filter':'brightness(0) invert(1)'});

        $("#logocreativaindependiente div").css({'background-color':'#e3e3e3'},600);
        $("#logocreativaindependiente div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoloselementales div").css({'background-color':'#e3e3e3'},2000);
        $("#logoloselementales div img").css({'filter':'brightness(1) invert(0)'});
        $("#logometrica div").css({'background-color':'#e3e3e3'},2000);
        $("#logometrica div img").css({'filter':'brightness(1) invert(0)'});
        $("#logotravesia div").css({'background-color':'#e3e3e3'},2000);
        $("#logotravesia div img").css({'filter':'brightness(1) invert(0)'});
    });
    $('#logotravesia').on("click", function(event) {
        $("#logotravesia div").css({'background-color':'#b1c280'},2000);
        $("#logotravesia div img").css({'filter':'brightness(0) invert(1)'});

        $("#logocreativaindependiente div").css({'background-color':'#e3e3e3'},600);
        $("#logocreativaindependiente div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoloselementales div").css({'background-color':'#e3e3e3'},2000);
        $("#logoloselementales div img").css({'filter':'brightness(1) invert(0)'});
        $("#logometrica div").css({'background-color':'#e3e3e3'},2000);
        $("#logometrica div img").css({'filter':'brightness(1) invert(0)'});
        $("#logoteatro div").css({'background-color':'#e3e3e3'},2000);
        $("#logoteatro div img").css({'filter':'brightness(1) invert(0)'});
    });

    $("#eventosDiv1").bind("mouseenter", function(event) {
        event.preventDefault();
        $("#eventosDiv1 .descripcion").slideDown(500);
        $("#eventosDiv1 figure img").css({'filter':'brightness(110%)'},2000);
    });
    $("#eventosDiv1").bind("mouseleave", function(event) {
        event.preventDefault();
        $("#eventosDiv1 .descripcion").hide(550);
        $("#eventosDiv1 figure img").css({'filter':'brightness(95%)'},"slow");
    });
    $("#eventosDiv2").bind("mouseenter", function(event) {
        event.preventDefault();
        $("#eventosDiv2 .descripcion").slideDown(500);
        $("#eventosDiv2 figure img").css({'filter':'brightness(110%)'},"slow");
    });
    $("#eventosDiv2").bind("mouseleave", function(event) {
        event.preventDefault();
        $("#eventosDiv2 .descripcion").hide(550);
        $("#eventosDiv2 figure img").css({'filter':'brightness(95%)'},"slow");
    });
    $("#eventosDiv3").bind("mouseenter", function(event) {
        event.preventDefault();
        $("#eventosDiv3 .descripcion").slideDown(500);
        $("#eventosDiv3 figure img").css({'filter':'brightness(110%)'},"slow")
    });
    $("#eventosDiv3").bind("mouseleave", function(event) {
        event.preventDefault();
        $("#eventosDiv3 .descripcion").hide(550);
        $("#eventosDiv3 figure img").css({'filter':'brightness(95%)'},"slow")
    });
    function buscar(){
        var nombre = $('#buscartxt').val();
        var route = "{{ route("buscar.libros")}}";
        alert(nombre);
        $.ajax({
            url: route,
            data: {'nombre': nombre},
            type: 'get',
            success: function (data) {
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
            }
        });

   }
</script>
     @yield('script_collection')
</body>
</html>
