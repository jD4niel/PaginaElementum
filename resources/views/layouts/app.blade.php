<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elementum</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"/>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
        {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('/') }}/fonts/InriaSerif/Web/fonts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('css/loginStyle') }}/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/bootstrap/css/bootstrap.min.css">--}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle') }}/css/main.css">
    <!--===============================================================================================-->
    <link href="{{ asset('css/TemplateStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ URL::to('Datatables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front-end.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ckeditor_custom_styles.css') }}">


    @yield('style')


</head>
<body>
<div id="app" style="display: none;">
    <nav class="navbar navbar-default navbar-static-top"  id="navheader">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img  class="img-responsive" id="el_logo"  src="{{ URL::to('/') }}/images/logocolor.png" alt="Editorial Elementum logo">

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" style="font-size: 20px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->last_name}} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user())
            <div id="template-nav">
                <div>
                    
                    <div id="user-img" title="Cambia la imagen del usuario actual">
                            @if(Auth::user()->imagen)
                                <img class="img-change generic_image" onclick="trigger_user_image()" src="{{ asset('images/fotos_usuarios') }}/{{ Auth::user()->imagen}}" alt="">
                            @else
                                <img onclick="trigger_user_image()" class="img-change generic_image" src="{{ asset('images/user.png') }}" alt="">
                                <span onclick="trigger_user_image()" class="img-change-container">
                                    <i class="fas fa-edit"></i>
                                </span>
                            @endif
                    </div>
                    <div id="show_usr_container">
                        <button id="show_button_usr" onclick="uploadUserImage()">Guardar</button>
                    </div>
                    <input name="change_usr_img" type="file" id="change_usr_img" onchange="readUserFile(this)" hidden style="display: none">        

                    <div class="name-usr">{{ Auth::user()->name }}</div>
                </div>
                <div>
                    <ul class="ul-principal">
                        <li class="li-item"><div><i class="fas fa-file-alt"></i>&nbsp;Blog</div></a>
                            <ul class="ul-submenu">
                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                <a href="{{route('admin.portada')}}" class="no-style"><li class="li-item">Administrador</li></a>
                                @endif
                                <a href="{{route('autor-entradas')}}" class="no-style"><li class="li-item">Crear entrada</li></a>
                                <a href="{{route('entradas')}}" class="no-style"><li class="li-item">Entradas</li></a>
                            </ul>
                        </li>
                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <li class="li-item"><div><i class="fas fa-users"></i>&nbsp;Autores</div>
                            <ul class="ul-submenu">
                                <a href="{{route('control.gral')}}" class="no-style"><li class="li-item">Autores</li></a>
                                <a href="{{route('crear.autor')}}" class="no-style"><li class="li-item">Agregar nuevo autor</li></a>
                            </ul>
                        </li>
                        <li class="li-item"><div><i class="fas fa-book"></i>&nbsp;Libros</div>
                            <ul class="ul-submenu">
                                <a href="{{route('crear.libro')}}" class="no-style"><li class="li-item">Agregar libro</li></a>
                                <a href="{{route('control.gral')}}/#ver-libros" class="no-style"><li class="li-item">Ver libros</li></a>
                            </ul>
                        </li>
                        <li class="li-item"><div><i class="fas fa-cog"></i>&nbsp;Control de la página</div>
                            <ul class="ul-submenu">
                                <a href="{{route('editarpagina')}}" class="no-style"><li class="li-item">Portada de Elementum</li></a>
                                <a href="{{route('editarPestañasPagina')}}" class="no-style"><li class="li-item">Control de pestañas</li></a>
                            </ul>


                        @endif
                        <a href="{{route('elementario.index.controller')}}" class="no-style"><li class="li-item"><div><i class="fas fa-edit"></i>&nbsp;Actividades</div></li></a>

                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <a href="{{route('control.gral')}}" class="no-style"><li class="li-item"><div><i class="fab fa-elementor"></i>&nbsp;Control de elementos</div></li></a>
                        </li>
                        @endif
                        @if(Auth::user()->role_id == 2)
                        <li class="li-item"><div><i class="fas fa-book-reader"></i>&nbsp;Elementum</div>
                            <ul class="ul-submenu">
                                <a href="{{route('elementum.info')}}" class="no-style"><li class="li-item">Información</li></a>
                                <a href="{{route('editarPestañasPagina')}}" class="no-style"><li class="li-item">Pestañas</li></a>
                                <a href="{{route('integrantesTab')}}" class="no-style"><li class="li-item">Integrantes</li></a>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div id="template-content" class="col-md-10">
                @yield('content')
            </div>
           
            @else
                @yield('content')
            @endif
        </div>
    </div>
</div>
 <div class="loader">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  <div class="bar4"></div>
  <div class="bar5"></div>
  <div class="bar6"></div>
</div>
<div id="elementum-loading-div">&nbsp;Elementum&nbsp;</div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ URL::to('js/ckeditor/ckeditor.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap-tagsinput.js') }}"></script>

    {{--<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>--}}
    <script src="{{ URL::to('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{ URL::to('Datatables/datatables.min.js') }}"></script>
    @yield('script_section')
    <script>
        $(document).ready(function(){
            $('.loader').hide();
            $('#elementum-loading-div').hide();
            $('#app').show();
        });
        $('.li-item div').on('click', function(){
            console.log(this)
            console.log(this.nextElementSibling)
            $(this.nextElementSibling).slideToggle(150)
        });
        function openInNewTab(url) {
          var win = window.open(url, '_blank');
          win.focus();
        }
        function trigger_user_image(input_id,val) {
            $('#change_usr_img').trigger('click');
        }
        function readUserFile(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Si la imagen carga haz esto:
                   $('.generic_image').attr("src", e.target.result);
                   $('.tab-banner-image span').hide();
                   $('#show_button_usr').show();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function uploadUserImage(){
            var foto = $('#change_usr_img');
            var myFormData = new FormData();
            if(foto[0]!=null){
                myFormData.append('file', foto[0]['files'][0]);
            }
            var url = window.location + '/userimg'
            swal({
              title: "¿Agregar imagen?",
              text: "Los cambios se verán reflejados automaticamente en la portada",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
              .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                      url: url,
                      data: myFormData,
                      type: 'post',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                      processData: false, // NEEDED, DON'T OMIT THIS
                      success: function (response, file) {
                          console.log(response);
                          window.location.reload();
                      },
                      error: function (jqXHR, textStatus, errorThrown) {
                          alert('Error en el servidor! /n Intente con otro formato de imagen')
                          console.log(errorThrown)
                          console.log(textStatus)
                      }
                  });
              } 
            });
        }
    </script>
</body>
</html>
