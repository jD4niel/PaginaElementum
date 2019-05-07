@extends('template')
@section('home')
    <div class="container">
        <div class="row" style="padding-top: 15px; margin: 0 10px 0 0">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <form action="{{route('blog.search')}}" method="post" id="form-search">
                    {{csrf_field()}}
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        <input type="text" class="form-control" placeholder="Buscar" name="tipo" hidden value="nombre">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if(sizeof($busqueda) == 0)
            <div style="height: 17em">
                <br><br>
                <h1>La busqueda solicitada no ha arrojado resultados... </h1>
            </div>
        @else
            @foreach($busqueda as $item)
                <div class="row" style="padding-top: 20px">
                    <div class="offset-md-1 col-md-10 ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="new-cropped"
                                     style="background:linear-gradient(transparent 100px, white), url('{{asset("images/entradas/")}}/{{$item->imagen}}');background-repeat: no-repeat; background-position:center center "></div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -150px; padding: 50px">
                            <div class="col-md-12">
                                <a href="{{ route('blog.entrada.elementum',$item->id) }}"><h1
                                            class="display-4 serif">{{$item->nombre }}</h1></a>
                                @if($item->user_id != 999)
                                    <p>Escrito por <a
                                                href="{{ route('autores.detalle', $item->user_id) }}"><b>{{$item->autor}}</b></a>, {{$item->fecha}}
                                        .</p>
                                @else
                                    <p>Escrito por <b>{{$item->autor_externo}}</b>, {{$item->fecha}}.</p>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="txt-overflow">
                                    {!! $item ->texto !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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

