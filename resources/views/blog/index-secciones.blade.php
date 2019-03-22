@extends('template')
@section('home')
    <div class="container">
        @if(intval($tipo) > 0)
            <h1 style="padding-top: 20px" class="display-5">{{$seccion}}</h1>
        @else
            @switch($tipo)
                @case('entradas')
                <h1 style="padding-top: 20px" class="display-5">Entradas Recientes</h1>
                @break
                @case('nuestros-colaboradores')
                <h1 style="padding-top: 20px" class="display-5">Nuestros Colaboradores</h1>
                @break
                @case('leido-en-elementario')
                <h1 style="padding-top: 20px" class="display-5">Leído en Elementario</h1>
                @break
            @endswitch
        @endif
        @foreach($entradas as $item)
            <div>
                <div class="row" style="padding-top: 20px">
                    <div class="col-12 col-sm-12 col-md-10 offset-0 offset-sm-0  offset-md-1">
                        <div class="row">
                            <div class="col-12" >
                                <div class="new-cropped" style="background:linear-gradient(transparent 100px, white), url('{{asset("images/entradas/")}}/{{$item->imagen}}');background-repeat: no-repeat; background-position:center center "></div>
                                {{--<a href="{{ route('blog.entrada.elementum',$item->id) }}"><img src="{{asset("images/entradas")}}/hola.jpeg" class="new-cropped shadow-md" style="background:linear-gradient(transparent 150px, white);"></a>--}}
                            </div>
                        </div>
                        <div class="row px-3 px-sm-3 px-md-5 px-lg-5 px-xl-5" style="margin-top: -150px;">
                            <div class="col-12 px-0 px-sm-0 px-md-5 px-lg-5 px-xl-5">
                                <a href="{{ route('blog.entrada.elementum',$item->id) }}"><h1 class="display-5 serif">{{$item->nombre }}</h1></a>
                                @if($item->user_id != 999)
                                    <p>Escrito por <a href="{{ route('autores.detalle', $item->user_id) }}"><b>{{$item->autor}}</b></a>, {{$item->fecha}}.</p>
                                @else
                                    <p>Escrito por <b>{{$item->autor_externo}}</b>, {{$item->fecha}}.</p>
                                @endif
                            </div>
                            <div class="col-12 px-0 px-sm-0 px-md-5 px-lg-5 px-xl-5">
                                <div class="txt-overflow">
                                    {!! $item ->texto !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center" style=""><a href="{{ route('blog.entrada.elementum',$item->id) }}" style="z-index: 99999 !important;">Continuar Leyendo</a></div>
        @endforeach
    </div>
@endsection

@section('script_collection')
    <script>
        $('.navigation').css({'background-color': 'rgba(255, 255, 255, 1)'}, {'color': '#1d3b4f'});
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

