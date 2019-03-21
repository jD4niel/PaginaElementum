<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Elementum</title>

        <!-- Fonts -->
       {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::to('/') }}/fonts/InriaSerif/Web/fonts.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/template.css')}}">
        <link rel="stylesheet" href="{{asset('css/blog_style.css')}}">

        <script src="{{asset('js/wow.js')}}"></script>
        <script src="{{ URL::to('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            new WOW().init();
        </script>
        <style>
            @yield('style')
        </style>

    </head>

    <body>
    <section class="navigation">
        <div class="nav-container">
            <div class="brand" style="">
                <img id="logoElementum1" src="{{ URL::to('/') }}/images/logoblanco.png" alt="Editorial Elementum logo">
                <img id="logoElementum2" class="hide" src="{{ URL::to('/') }}/images/logocolor.png" alt="Editorial Elementum logo">
            </div>
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span><i style="font-size:50px; color:#00aa93;" class="fas fa-align-justify"></i></span></a></div>
                <ul class="nav-list">
                    <li id="barraleft" style="border-left: 1px solid white;">
                        <a href="{{route('nosotros.elementum')}}">Nosotros</a>
                    </li>
                    <li>
                        <a href="{{route('libros.colecciones')}}">Colecciones</a>
                    </li>
                    <li>
                        <a href="{{route('autores.libros')}}">Autores</a>
                    </li>
                    <li>
                        <a href="{{route('elementario.elementum')}}">Elementario</a>
                    </li>
                    <li>
                        <a href="{{route('contacto.elementum')}}">Contacto</a>
                    </li>
                    <li id="blogid" style="border-right: 1px solid white;">
                        <a href="{{ route('blog.elementum') }}">Blog</a>
                    </li>
                    <li id="iconos" class="" style="padding-top: 15px; padding-left: 15px; padding-bottom: 24px; border-bottom: 1px solid white;">
                        <i onclick="openInNewTab('{{ $elementum->facebook }}')"class="fab social_icons fa-facebook-f link"></i>
                        <i onclick="openInNewTab('{{ $elementum->twitter }}')" class="fab social_icons fa-twitter link"></i>
                        <i onclick="openInNewTab('{{ $elementum->insta }}')" class="fab fa-instagram social_icons link"></i>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    @yield('home')
    @yield('libro')
    @yield('autores')
    <footer id="foter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {!!  nl2br(e($elementum->direccion)) !!}
                    <br>
                    <hr style="background-color: white; width: 250px; float:left;">
                </div>
                <div class="col-md-6 align-content-right" style="align-content: right; text-align: right;">
                    <a id="fb_link" target="_blank" href="{{ $elementum->facebook }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-facebook-f social_icons link"></i></a>
                    <a id="tw_link" target="_blank" href="{{ $elementum->twitter }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-twitter social_icons link"></i></a>
                    <a id="insta_link" target="_blank" href="{{ $elementum->insta }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-instagram social_icons link"></i></a>
                    <br>
                    Teléfono <br>
                    {{ $elementum->telefono }} <br>
                    <hr style="background-color: white; width: 200px; float: right;">
                </div>
            </div>
            <div class="row">
                <div style="margin:0 auto -35px auto;">© Todos los derechos reservados para Editorial Elementum 2012</div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @yield('script_home')
     <script>


         // $('.navigation').css({'background-color':'rgba(255, 255, 255, 1)'},{'color':'#1d3b4f'});
         // $('.navigation').css({'border-bottom':'1px solid #9FA09D'});
         // $('#blogid').css({'border-right':'1px solid #9FA09D'});
         // $('#iconos').css('border-bottom','#00374e');
         // $('#barraleft').css('border-left','1px solid #9FA09D');
         // $('nav ul li a').css({'color':'#1d3b4f'});
         // $('nav ul li i').css({'color':'#1d3b4f'});
         // $('nav ul li a').css({'font-weight':'bold'});
         // $('#logoElementum1').hide();
         // $('#logoElementum2').show();
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
                $('nav ul').toggle();
            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        }); // end DOM ready
    })(jQuery); // end jQuery

    //scroll

    function openInNewTab(url) {
      var win = window.open(url, '_blank');
      win.focus();
    }
    $(document).ready(function(){
        $(".descripcion").hide();
        $('i.fa-facebook-f link').on("click",function () {
            window.open("https://www.facebook.com/edielementum/","_blank");
        });
        $('i.fa-twitter link').on("click",function () {
            window.open("https://twitter.com/edi_elementum","_blank");
        });
        $('i.fa-instagram link').on("click",function () {
            window.open("https://www.instagram.com/edi_elementum/?hl=es-la","_blank");
        });
        $('#logoElementum1').on("click",function () {
            window.location.href = "{{route('index')}}";
        });
        $('#logoElementum2').on("click",function () {
            window.location.href = "{{route('index')}}";
        });
    });
    $('.nav-mobile').on("click",function(){
        $('nav ul li a').css('background-color','white');
        $('nav ul li a').css('color','black');
        $('#logoElementum1').hide();
        $('#logoElementum2').show();
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
        var currentLocation = window.location+'/colecciones/';
        $.ajax({
            url: route,
            data: {'nombre': nombre},
            type: 'get',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#cajaLibros').html('');
                if(data.length<1){
                    $('#cajaLibros').html('<h4 style="margin: 50px auto 0 auto;">No se encontraron libros</h4>');
                }else{
                    for(i in data){
                        $('#cajaLibros').append('' +
                            '  <div class="cajon col-md-3 wow fadeInUp">\n' +
                            '                <div class="cajas align-content-center text-center" style="padding-top: 30px;padding-bottom: 20px;">\n' +
                            '                    <img height="200px" src="{{ URL::to('/') }}/images/libros/'+data[i]["imagen"]+'" alt="">\n' +
                            '                    <hr>\n' +
                            '                    <a href=""'+currentLocation+data[i]["id"]+'"  class="btnDetalle">Ver detalle</a>\n' +
                            '                </div>\n' +
                            '                     </div>' +
                            '')
                    }
                }
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
