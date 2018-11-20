@extends('template')
@section('home')
    <img  class="img-responsive" width="100%" height="535px" src="{{ URL::to('/') }}/images/nosotros.jpg" alt="">
    <div class="separador"></div>
    <div class="container">
        <div class="row text-center">
            <div id="mision" class="col-md-6 ">
                <h2>Misión</h2>
                <hr   class="col-md-6" style="">
                <p class="col-md-8"  style="text-align: left;font-size: 20px;margin:0 auto;">
                    Llevar a cabo todos los trabajos involucrados en la cadena del libro, para ello acompaña a sus autores en cada paso de la creación de una publicación y a sus lectores en el descubrimiento de nuevos títulos.
                </p>
            </div>
            <div id="vision" class="col-md-6">
                <h2 >Visión</h2>
                <hr class="col-md-6">
                <p class="col-md-8"  style="text-align: left;font-size: 20px;margin:0 auto;">
                    Ser un actor que fomente la solidez del tejido social, a través de la edición, publicación y distribución de libros; las artes y la educación.
                </p>
            </div>
        </div>
        <div class="separador"></div>
    </div>
    <div class="container" style="background-color: #cfe1db;">
        <center><div class="col-md-6" style="font-size: 50px;border-bottom:1px solid #556a78">Valores</div></center>
        <br>
        <div class="row valores_div" >
            <div class="valores_list col-md-6">Autonomía</div>
            <div class="valores_list col-md-6">Libertad</div>
            <div class="valores_list col-md-6">Apertura</div>
            <div class="valores_list col-md-6">Tolerancia</div>
            <div class="col-md-12"></div>
            <hr>
        </div>
    </div>
    <div class="separador"></div><br>
    <div class="container">
        <center>
        <h1 class="h1" style="font-size: 50px;">Somos Elementum</h1>
            <hr width="50%">
        </center>
        <br>
        <div class="row" style="font-size: 25px;text-align: left; ">
            <div class="personal_el col-md-6" style="margin-right:-200px;">
                <div id="mayte"
                     class="col-md-6 puesto"
                     style="margin:0 auto;text-align:left;"data-content="Dirección general"
                     rel="popover" data-placement="left"
                       data-trigger="hover">

                    <i class="fab fa-accusoft"></i>&nbsp;Mayte Romo</div>
            </div>

            <div class="personal_el col-md-6" >
                <div class="col-md-6 puesto" style="margin:0 auto;text-align:left;"  data-content="Contraloría" rel="popover" data-placement="right"   data-trigger="hover"> <i class="fas fa-object-ungroup "></i>&nbsp;Angélica Alba</div>
            </div>
            <div class="personal_el col-md-6" style="margin-right:-200px;" ><div class="col-md-6 puesto" data-content="Dirección editorial" rel="popover" data-placement="left"   data-trigger="hover"style="margin:0 auto;text-align:left;"> <i class="fas fa-align-left"></i>&nbsp;Jovany Cruz</div></div>
            <div class="personal_el col-md-6" ><div class="col-md-6 puesto" style="margin:0 auto;text-align:left;" data-content="Edición" rel="popover" data-placement="right"   data-trigger="hover"> <i class="fas fa-edit"></i>&nbsp;Alejandra Olguín</div></div>
            <div class="personal_el col-md-6" style="margin-right:-200px;">
                <div class="col-md-6 puesto"  data-content="Dirección administrativa" rel="popover" data-placement="left"   data-trigger="hover" style="margin:0 auto;text-align:left;"> <i class="fas fa-fax"></i>&nbsp;Evelin Ramos</div></div>

            <div class="personal_el col-md-6" ><div class="col-md-6 puesto" style="margin:0 auto;text-align:left;" data-content="Diseño editorial" rel="popover" data-placement="right"   data-trigger="hover"> <i class="fas fa-columns"></i>&nbsp;Victoria Amezcua</div></div>

            <div class="personal_el col-md-6" style="margin-right:-200px;"><div class="col-md-6 puesto"  data-content="Distribución y ventas" rel="popover" data-placement="left"   data-trigger="hover" style="margin:0 auto;text-align:left;"> <i class="fas fa-boxes"></i> Ariadna Sánchez</div></div>

            <div class="personal_el col-md-6" ><div class="col-md-6 puesto" style="margin:0 auto;text-align:left;" data-content="Ilustración y publicidad" rel="popover" data-placement="right"   data-trigger="hover"> <i class="fas fa-pen-nib"></i>&nbsp;Alejandro Jiménez</div></div>

            <div class="personal_el col-md-6" style="margin-right:-200px;"><div class="col-md-6 puesto"  data-content="Encargado de librería y pedidos" rel="popover" data-placement="left"   data-trigger="hover"style="margin:0 auto;text-align:left;"> <i class="fas fa-book-open"></i>&nbsp;Julio Calva</div></div>

            <div class="personal_el col-md-6"><div class="col-md-6 puesto"></div></div>
        </div>
        <div class="separador"></div>
    </div>

@endsection
@section('script_collection')
  <script>
    $(document).ready(function() {
        $('.puesto').popover();
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
  </script>
@endsection
