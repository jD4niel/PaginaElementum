@extends('template')
@section('libro')
    <div class="separador"></div>
<div class="container ">
    <div class="row" style="margin: 0 auto;">
        <div class="col-md-3" style="margin:0 auto;">
                <img style="filter: drop-shadow(-5px 7px 2px #4e4e4eb5);border-radius: 50%;height:auto;width: 100%;margin-top: 70px;text-align: center;" class="img-responsive" src="{{ URL::to('/') }}/images/fotos_autores/{{$autor->imagen}}" alt="" height="400px">
        </div>
        <div class="col-md-7" style="margin: 0 auto;">
            {{--<h1> | {{libros}} |</h1>--}}
            <h1>{{$autor->nombre}}{{$autor->apellido_p}}&nbsp;{{$autor->apellido_m}}</h1>
            <hr>
            {{--<h5>{{$libros->descripcion}}</h5>--}}
            <p style="text-align: justify;text-justify: inter-word;">{{$autor->semblanza}} </p>
            <br>
            <div class="col-md-12">
                <div class="btn-group right text-right col-md-5" style="float: right; border-top:1px solid #869ea4;padding-top: 10px;text-align: right;">
                    <a href="{{$autor->facebook}}"><button type="button" class="btn btn-face"> <i class="redes fab fa-facebook"></i></button></a>
                    <a href="https://twitter.com/{{$autor->twitter}}"><button type="button" class="btn btn-tw"> <i class="redes fab fa-twitter"></i></button></a>
                    <a href="instagram.com/{{$autor->instagram}}"><button type="button" class="btn btn-insta"> <i class="redes fab fa-instagram"></i></button></a>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div style="padding-left: 50px;" class="table-responsive col-md-6 center-block">--}}
            {{--<table id="formato_compra" class="">--}}
                {{--<thead class="bg-warning"><tr><th colspan="2" scope="col">México</th></tr></thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td>Libro</td>--}}
                    {{--<td><input type="radio" name="tipo"></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>E-book</td>--}}
                    {{--<td><input type="radio" name="tipo"></td>--}}
                {{--</tr>--}}
                {{--<tr><td><select style="width: 100%; height: 100%; border: none;padding-top: 5px;padding-bottom: 5px;" name="" id="">--}}
                            {{--<option value="" disabled selected>Seleccionar tienda</option>--}}
                            {{--<option value="">Amazon</option>--}}
                            {{--<option value="">Ebay</option>--}}
                        {{--</select></td></tr>--}}
                {{--</tbody>--}}
                {{--<tfoot class="bg-warning"><tr>--}}
                    {{--<td id="btnComprar" colspan="2">Comprar</td>--}}
                {{--</tr></tfoot>--}}
            {{--</table>--}}
        {{--</div>--}}
        {{--<div class="col-md-6" >--}}
            {{--<button id="btnFrag" style="float: right;">Leer fragmento</button>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<div style="text-align: right;">--}}
                {{--{{$libros->datos}}--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<div style="float: right;">Compartir &nbsp;<i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-facebook-f social_icons"></i>--}}
                {{--<i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-twitter social_icons"></i>--}}
                {{--<i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-instagram social_icons"></i>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <br>
    <div class="separador"></div>
    <div class="row">
        <h1>OBRAS PUBLICADAS </h1>
        <hr>
        <div class="owl-carousel">
           @foreach($libros as $item)

                <div id="imgboxId{{$item->id}}" class="imgbox col-md-10 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                    <a href="{{route('detalle.libros',$item->id)}}">
                        <figure>
                            <img width="150px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}">
                            <figcaption>ver</figcaption>
                        </figure>
                    </a>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel();
        });
        /***************************************/
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:4,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[1000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })
    </script>
@endsection