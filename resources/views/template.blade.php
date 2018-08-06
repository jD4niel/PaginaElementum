<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elementum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <style>
            /*@charset "UTF-8";*/
            .navigation {
                height: 80px;
                background: rgba(0,0,0,0);
                position: sticky;
                left:0px;
                top: 0px;
                z-index: 1000;
                padding: 20px;


            }

            .brand {
                position: absolute;
                padding-left: 0px;
                float: left;
                line-height: 70px;
                text-transform: uppercase;
                font-size: 1.4em;
                padding-bottom:9px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.85);

            }
            .brand a,
            .brand a:visited {
                color: #ffffff;
                text-decoration: none;

            }

            .nav-container {
                max-width: 1000px;
                margin: 0 auto;

            }
            a{
                height: 80px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.85);;
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
                background: #2581DC;
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
                    <li>
                       <a>social icons</a>
                    </li>
                </ul>
            </nav>
          {{--  <div class="brandos" style="">
                <img id="logoElem" src="{{ URL::to('/') }}/images/logoblanco.png" alt="Editorial Elementum logo">
            </div>--}}
        </div>
    </section>
    @yield('home')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
</script>

</body>
</html>
