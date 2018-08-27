@extends('template')
@section('home')
<div class="container ">
    <div class="row align-content-center text-center">
        <div id="logoloselementales"  data-num="1" class="col-md-4 cont"><div class="contenedor_colecciones"><img src="{{ URL::to('/') }}/images/colecciones/logoloselementales.png" alt=""></div></div>
        <div id="logocreativaindependiente"  data-num="2" class="col-md-4 cont"><div class="contenedor_colecciones"><img src="{{ URL::to('/') }}/images/colecciones/logocreativaindependiente.png" alt=""></div></div>
        <div id="logometrica"  data-num="3" class="col-md-4 cont"><div class="contenedor_colecciones"><img src="{{ URL::to('/') }}/images/colecciones/logometrica.png" alt=""></div></div>
        <div id="logotravesia"  data-num="4" class="col-md-4 cont"><div class="contenedor_colecciones"><img src="{{ URL::to('/') }}/images/colecciones/logotravesia.png" alt=""></div></div>
        <div id="logoteatro"  data-num="5" class="col-md-4 cont"><div class="contenedor_colecciones"><img src="{{ URL::to('/') }}/images/colecciones/logoteatro.png" alt=""></div></div>
        <hr>
    </div>
    <div class="row">
        @foreach($libros as $item)
            <div class="cajas col-md-3 align-content-center text-center" style="padding-top: 30px;padding-bottom: 20px;">
                <img height="200px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}" alt="mmom">
                <hr>
                <button class="btnDetalle">Ver detalle</button>
                <button class="btnComprar">Comprar</button>
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
        $(".cont").on("click",function (event) {
            var num = $(".cont").attr("data-num");
            alert(num);

            var nombre = $('#buscartxt').val();
            var route = "{{ route("ver.libros")}}";
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
        });
    </script>
@endsection