@extends('template')
@section('home')

    <div class="container" id="todo">
        <div class="row" style="padding-top: 15px;">
            <div class="col-12">
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
        <div id="p1"></div>
        <div id="p2"></div>
        <div id="p3"></div>
        <div id="p4"></div>
        <div id="entradas_recientes">
            <div class="row" style="padding-top: 10px">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="min-height: 540px">
                    <a href="{{ route('blog.entrada.elementum',$ue->id) }}"><img
                                src="{{asset("images/entradas")}}/{{$ue->imagen}}" alt="" class="main-cropped"
                                style="padding-bottom: 10px;"></a>
                    <a href="{{ route('blog.entrada.elementum',$ue->id) }}"><h1 class="serif"
                                                                                style="color:#1d3b4f;">{{$ue->nombre}}</h1>
                    </a>
                    @if($ue->user_id != 999)
                        <p>Escrito por <a href="{{ route('autores.detalle', $ue->user_id) }}"><b>{{$ue->autor}}
                                    ,</b></a> {{$ue->fecha}}</p>
                    @else
                        <p>Escrito por <b>{{$ue->autor_externo}},</b> {{$ue->fecha}}</p>
                    @endif
                    <p style="font-size: .9em">{!! substr($ue->intro,0,200) !!} ...</p>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    @foreach($pe as $item)
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('blog.entrada.elementum',$item->id) }}"><img
                                                    src="{{asset("images/entradas")}}/{{$item->imagen}}"
                                                    class="img-fluid center-cropped pb-2"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('blog.entrada.elementum',$item->id) }}">
                                            <h4 class="serif" style="color:#1d3b4f;">{{$item->nombre}}</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if($item->user_id != 999)
                                            <p style="font-size: .8em">Escrito por <a
                                                        href="{{ route('autores.detalle', $item->user_id) }}"><b>{{$item->autor}}
                                                        ,</b></a> {{$item->fecha}}
                                            </p>
                                        @else
                                            <p style="font-size: .8em">Escrito por <b>{{$item->autor_externo}}
                                                    ,</b> {{$item->fecha}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="font-size: .8em">{{substr($item->intro,0,150)}} . . .</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div align="right"><a href="{{ route('blog.secciones','entradas') }}">Ver más <span
                            class="dropdown-toggle"></span></a></div>
            <hr style="    background: #00394c;">
        </div>


        <div id="banner">
            <div class="row">
                <div class="col-md-12">
                    @if($banner->estado == 1)
                        <a href="{{$banner->enlace}}" target="_blank">
                            <img src="{{asset("images/banners")}}/{{$banner->imagen}}" alt="Banner Publicitario"
                                 class="img-fluid shadow" style="min-width: 100%">
                        </a>
                    @else
                        <img src="{{asset("images/banners/banner.jpg")}}" alt="Banner Publicitario"
                             class="img-fluid shadow" style="min-width: 100%">
                    @endif
                </div>
            </div>
        </div>


        <div id="colaboradores">
            <div class="row" style="padding-top: 50px">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="row" style="margin-bottom: -20px">
                        <div class="col-md-10"><h3>Nuestros Colaboradores</h3></div>
                        <div class="col-md-2"><a href="{{ route('blog.secciones','nuestros-colaboradores') }}">Ver más
                                <span class="dropdown-toggle"></span></a></div>
                    </div>
                    <hr>
                    @foreach($uea as $item)
                        @if($item != null)
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <a href="{{ route('blog.entrada.elementum',$item->id) }}">
                                        <img src="{{asset("images/entradas")}}/{{$item->imagen}}" alt="" class="img-fluid center-cropped pb-2 "></a>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                    <div class="row ">
                                        <div class="col-12">
                                            <a href="{{ route('blog.entrada.elementum',$item->id) }}">
                                                <h3 class="serif" style="color:#1d3b4f;">{{$item->nombre}}</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <p>
                                                Escrito por <a href="{{ route('autores.detalle',$item->user_id) }}"><b>{{$item->autor}},</b></a> {{$item->fecha}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <p>{{substr($item->intro,0,150)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12">
                            <h4>Populares en elementum</h4>
                            <hr>
                            <ol class="ol-blog">
                                @foreach($ep as $item)
                                    <div class="row">
                                        <div class="col-12">
                                            <li class="li-blog">
                                                <div>
                                                    <a href="{{ route('blog.entrada.elementum',$item->id) }}"><h4
                                                                class="serif bold"
                                                                style="color:#1d3b4f;">{{$item->nombre}}</h4>
                                                    </a>
                                                    @if($item->user_id != 999)
                                                        <p style="font-size:.8em;">Escrito por <a
                                                                    href="{{ route('autores.detalle',$item->user_id) }}"><b>{{$item->autor}}
                                                                    ,</b></a> {{$item->fecha}}
                                                        </p>
                                                    @else
                                                        <p style="font-size:.8em;">Escrito por <b>{{$item->autor_externo}}
                                                                ,</b> {{$item->fecha}}</p>
                                                    @endif
                                                </div>
                                            </li>
                                        </div>
                                    </div>

                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-12">
                            <h4>Nube de Etiquetas</h4>
                            <hr>
                            @for($i = 0; $i < count($nube) && $i < 20; $i++)
                                <a href="/blog/entradas/{{$nube[$i]}}" style="color: white; cursor:pointer;">
                                    <span class="etiqueta my-2" style="background-color: #00394C;">{{$nube[$i]}}</span>
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="leido_elementario">
        </div>

        @foreach($sections->where('id','>',1) as $section)
            <div id="section-{{$section->id}}">
                <div class="row" style="padding-top: 50px">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-10"><h3>{{$section->tipo}}</h3></div>
                            {{--<div class="col-md-2"><a href="{{ route('blog.secciones','leido-en-elementario') }}">Ver más--}}
                                    {{--<span class="dropdown-toggle"></span></a></div>--}}
                        </div>
                        <hr>
                        @foreach($entradas->where('clasificacion_id', $section->id)->take(4) as $item)
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <a href="{{ route('blog.entrada.elementum',$item->id) }}"><img
                                                src="{{asset("images/entradas")}}/{{$item->imagen}}" alt=""
                                                class="img-fluid center-cropped pb-2" ></a>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('blog.entrada.elementum',$item->id) }}">
                                                <h3 class="serif" style="color:#1d3b4f;">{{$item->nombre}}</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if($item->user_id != 999)
                                                <p>
                                                    Escrito por <a href="{{ route('autores.detalle',$item->user_id) }}"><b>{{$item->autor}},</b></a> {{$item->fecha}}
                                                </p>
                                            @else
                                                <p>Escrito por <b>{{$item->autor_externo}},</b> {{$item->fecha}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>{{substr($item->intro,0,150)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endsection

@section('script_collection')
    <script>
        $('.navigation').css({'background-color': 'rgba(255, 255, 255, 1)'}, {'color': '#1d3b4f'});
        $(document).ready(function () {
            var entradas_recientes = $('#entradas_recientes');
            var banner = $('#banner');
            var colaboradores = $('#colaboradores');
            var leido_elementario = $('#leido_elementario');
            var orden_portada = {!! json_encode($portada) !!};
            console.log(orden_portada[0]);
            $('#entradas_recientes').remove();
            $('#banner').remove();
            $('#colaboradores').remove();
            $('#leido_elementario').remove();
            $('#p' + orden_portada[0].entradas_recientes).append(entradas_recientes);
            $('#p' + orden_portada[0].colaboradores).append(colaboradores);
            $('#p' + orden_portada[0].banner).append(banner);
            $('#p' + orden_portada[0].leido_elementario).append(leido_elementario);


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

