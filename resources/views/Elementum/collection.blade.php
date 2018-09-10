@extends('template')
@section('home')
<div class="container ">
    <div class="row align-content-center text-center">
        <div id="logoloselementales" onclick="cambio(2)"  data-num="1" class="col-md-4 cont uno"><div class="contenedor_colecciones">
                <a href="#contenedor_libro"><img src="{{ URL::to('/') }}/images/colecciones/logoloselementales.png" alt=""></a></div></div>
        <div id="logocreativaindependiente" onclick="cambio(1)"  data-num="2" class="col-md-4 cont dos"><div class="contenedor_colecciones">
                <a href="#contenedor_libro"><img src="{{ URL::to('/') }}/images/colecciones/logocreativaindependiente.png" alt=""></a></div></div>
        <div id="logometrica"  data-num="3" onclick="cambio(4)" class="col-md-4 cont tres"><div class="contenedor_colecciones">
                <a href="#contenedor_libro"><img src="{{ URL::to('/') }}/images/colecciones/logometrica.png" alt=""></a></div></div>
        <div id="logotravesia"  data-num="4" onclick="cambio(3)" class="col-md-4 cont cuatro"><div class="contenedor_colecciones">
                <a href="#contenedor_libro"><img src="{{ URL::to('/') }}/images/colecciones/logotravesia.png" alt=""></a></div></div>
        <div id="logoteatro"  data-num="5" onclick="cambio(5)" class="col-md-4 cont cinco"><div class="contenedor_colecciones">
                <a href="#contenedor_libro"><img src="{{ URL::to('/') }}/images/colecciones/logoteatro.png" alt=""></a></div></div>
    </div>
    <hr>
    <div id="contenedor_libros" class="row">
            @foreach($libros as $item)
                <div id="imgboxId{{$item->id}}" onclick="ir({{$item->id}})" class="imgbox col-md-3 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                    <figure>
                         <img width="250px" src="{{ URL::to('/') }}/images/libros2/{{$item->imagen}}">
                          <figcaption>ver</figcaption>
                    </figure>
                </div>
            @endforeach
    </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
            //alert("holamundofeo");

        });
        function ver(a) {
            $('#imgboxId'+a+' figcaption').show();
        }
        function salir(a) {
            $('#imgboxId'+a+' figcaption').hide();
        }
        function cambio(a){
            $('#contenedor_libros').slideUp(500);
            var nombre = $('#buscartxt').val();
            var route = "{{ route("ver.libros")}}";
            $.ajax({
                url: route,
                data: {'nombre': nombre,'coleccion':a},
                type: 'get',
                datatype:'json',
                success: function (data) {
                    //console.log("funciona ajax"+data[1]["imagen"]);
                    $('#contenedor_libros').html('')
                    console.log(data.length);
                    for(var i=0; i<data.length;i++){
                        $('#contenedor_libros').append('  <div id="imgboxId'+data[i]["id"]+'" class="imgbox col-md-3 align-content-center text-center" onmouseleave="salir('+data[i]["id"]+')" onmouseover="ver('+data[i]["id"]+')" style="padding-top: 30px;padding-bottom: 20px;">\n' +
                            '                    <figure>\n' +
                            '                         <img width="250px" src="{{ URL::to('/') }}/images/libros2/'+data[i]["imagen"]+'">\n' +
                            '                          <figcaption>ver</figcaption>\n' +
                            '                    </figure>\n' +
                            '                </div>');
                    }
                    $('#contenedor_libros').slideDown(700);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                }
            });
        }
        function ir(a){
            var route = "{{ route("detalle.libros")}}";
            console.log("inside "+a);
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'id':a},
                datatype:'json',
                type: 'POST',
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection