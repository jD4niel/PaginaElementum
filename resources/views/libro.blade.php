@extends('template')
@section('libro')
    <div class="separador"></div>
<div class="container ">
    <div class="row">
        <div class="col-md-5">
                <img style="filter: drop-shadow(-5px 7px 2px #4e4e4eb5);" class="img-responsive" src="{{ URL::to('/') }}/images/libros/{{$libros->imagen}}" alt="" height="400px">


        </div>
        <div class="col-md-7">
            {{--<h1> | {{libros}} |</h1>--}}
            <h1>{{$libros->nombre}}</h1>
            <h5>{{$libros->descripcion}}</h5>
            <p>{{$libros->review}} </p>
            <div>
                <span>Autor: </span><span>{{$libros->autor->nombre}}&nbsp;{{$libros->autor->apellido_p}}&nbsp;{{$libros->autor->apellido_m}}</span>
            </div>
            <br>
            <div>
                <h2>${{$libros->precio}}</h2>
            </div>


        </div>
    </div>
    <div class="separador"></div>
    <div class="row">
        <div style="padding-left: 50px;" class="table-responsive col-md-6 center-block">
            <table id="formato_compra" class="">
                <thead class="bg-warning"><tr><th colspan="2" scope="col">México</th></tr></thead>
                <tbody>
                <tr>
                    <td>Libro</td>
                    <td><input type="radio" name="tipo"></td>
                </tr>
                <tr>
                    <td>E-book</td>
                    <td><input type="radio" name="tipo"></td>
                </tr>
                <tr><td><select style="width: 100%; height: 100%; border: none;padding-top: 5px;padding-bottom: 5px;" name="" id="">
                            <option value="" disabled selected>Seleccionar tienda</option>
                            <option value="">Amazon</option>
                            <option value="">Ebay</option>
                        </select></td></tr>
                </tbody>
                <tfoot class="bg-warning"><tr>
                    <td id="btnComprar" colspan="2">Comprar</td>
                </tr></tfoot>
            </table>
        </div>
        <div class="col-md-6" >
            <button id="btnFrag" style="float: right;">Leer fragmento</button>
            <br>
            <br>
            <div style="text-align: right;">
                {{$libros->datos}}
            </div>
            <br>
            <div style="float: right;">Compartir &nbsp;<i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-facebook-f social_icons"></i>
                <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-twitter social_icons"></i>
                <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-instagram social_icons"></i>
            </div>
        </div>
    </div>
    <br>
    <div class="separador"></div>
    <div class="row">
        <h1>OBRAS RELACIONADAS </h1>
        <div class="owl-carousel">
            @foreach($recomendados as $item)

                <div id="imgboxId{{$item->id}}" class="imgbox col-md-10 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                    <a href="{{route('detalle.libros',$item->id)}}">
                        <figure>
                            <img width="150px" src="{{ URL::to('/') }}/images/libros2/{{$item->imagen}}">
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