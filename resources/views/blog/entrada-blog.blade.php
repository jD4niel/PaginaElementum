@extends('template')

@section('home')
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1">
                <div class="row">
                    <div class="col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                        <div class="" style="background: linear-gradient(0deg,rgba(32,34,33,0.89),rgba(68,76,87,0.73)),url('{{asset("images/entradas/")}}/{{$entrada->imagen}}');background-repeat: no-repeat;color:white;padding: 100px;text-align:center;background-color: #1d3b4f;height: 300px; background-size: cover;">
                            <h4>{{$entrada->intro}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 d-block d-sm-block d-md-block d-lg-none d-xl-none">
                        <img src="{{asset("images/entradas/")}}/{{$entrada->imagen}}" alt="" class="img-fluid" style="max-height: 300px; object-fit: cover; min-width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="cuerpo_blog" class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1 shadow-lg" style="margin-top: -50px; background-color: white;">
                <div class="row">
                    <div class="col-12" style="color: rgba(29,59,79,0.23)">
                        <p class="text-right pt-2">
                            Compartir:
                            <a class="compartir_"
                               href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"><i
                                        class="fab social_icons fa-facebook-f link"
                                        style=" border: 2px solid rgba(29,59,79,0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i></a>
                            <a class="compartir_"
                               href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}"><i
                                        class="fab social_icons fa-twitter link"
                                        style=" border: 2px solid rgba(29,59,79,0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="serif display-4 d-none d-md-block d-lg-block d-xl-block" style="color:#1d3b4f;margin-bottom: 20px;">{{$entrada->nombre}}</h1>
                                <h3 class="serif d-block d-sm-block d-md-none" style="color:#1d3b4f;margin-bottom: 20px;">{{$entrada->nombre}}</h3>
                            @if($entrada->user_id != 999)
                                    <div>Escrito por <b style="color:#1d3b4f;"><a href="{{ route('autores.detalle', $entrada->user_id) }}">{{$entrada->autor}}</a></b>,
                                        {{$entrada->fecha}} &middot; No. de Visita: {{$entrada->visitas}}</div>
                                @else
                                    <div>Escrito por <b style="color:#1d3b4f;">{{$entrada->autor_externo}}</b>,
                                        {{$entrada->fecha}} &middot;
                                        No. de Visita: {{$entrada->visitas}}</div>
                                @endif
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="margin-bottom: 50px;text-align: justify;">
                                {!! $entrada->texto !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" align="center">
                        <span class="fa-stack fa-2x">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fas fa-thumbs-up fa-stack-1x fa-inverse"></i>
                        </span>
                        <br>
                        <div class="fb-like" data-href="http://localhost:8000/blog/entrada/{{$entrada->id}}"
                             data-layout="box_count" data-action="like" data-size="small" data-show-faces="true"
                             data-share="false"></div>
                        {{--<span style="font-size: 1.5em">Likes <input type="text" id="likes" size="2" value="200"--}}
                        {{--style="background: transparent; border: none;"></span>--}}
                    </div>
                </div>


                <hr class="shine">
                <div class="row py-5">
                @if($autor->id != 999)
                    <div class="col-10 offset-1">
                        <div class="row">
                            <div class="col-8 col-sm-8 col-md-3  offset-2 offset-sm-2 offset-md-0 py-4 py-sm-4 py-md-0" >
                                <img class="img-fluid rounded-circle shadow"
                                     src="{{ URL::to('/') }}/images/fotos_autores/{{$autor->imagen}}" alt="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <a href="{{ route('autores.detalle', $autor->id) }}">
                                    <h3 class="text-center text-sm-center text-md-left">{{$autor->nombre}}{{$autor->apellido_p}}&nbsp;{{$autor->apellido_m}}</h3></a>
                                <p style="font-size: 1em; text-align: justify;text-justify: inter-word;">{!! $autor->breve_desc!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" align="right">
                        @if($autor->facebook != "not_")
                            <i onclick="openInNewTab('{{$autor->facebook}}')"
                               class="fab social_icons fa-facebook-f link"
                               style="color: rgb(29, 59, 79); border: 2px solid rgba(29,59,79, 0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                        @endif
                        @if($autor->twitter != "not_")
                            <i onclick="openInNewTab('https://twitter.com/{{$autor->twitter}}')"
                               class="fab social_icons fa-twitter link"
                               style="color: rgb(29, 59, 79); border: 2px solid rgba(29,59,79,0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                        @endif
                        @if($autor->instagram != "not_")
                            <i onclick="openInNewTab('https://instagram.com/{{$autor->instagram}}')"
                               class="fab social_icons fa-instagram link"
                               style="color: rgba(29, 59, 79); border: 2px solid rgba(29,59,79,0.23); color: rgb(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                        @endif
                    </div>
                @else
                    <div class="col-10 offset-1">
                        Autor: <h3>{{$entrada->autor_externo}}</h3>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-10" align="right" style="padding-top: 1em; margin: 0 auto 0;">
                <h3>Etiquetas</h3>
                <hr class="hr-tags">
                <div id="etiquetas" style="padding-top: 15px"></div>
            </div>
        </div>
        <div id="fb-root"></div>
        <div class="row" align="center">
            <div class="col-md-12" style="padding-top: 20px; min-width: 100%">
                <div class="fb-comments" data-href="http://localhost:8000/blog/entrada/{{$entrada->id}}"
                     data-width="950" data-numposts="5" data-colorscheme="light"></div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12" align="left" style="padding-top: 30px;">
                <h3>Populares Elementum</h3>
                <hr class="hr-tags" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.17) 75%, #00394c 14%);">
            </div>
        </div>
        <div class="row" style="padding-top: 25px">
            <div class="col-12">
                <div class="d-none">{{$contador = 1}}</div>
                <div class="row">
                    @foreach($ep as $item)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <a href="{{ route('blog.entrada.elementum',$item->id) }}"><img
                                        src="{{asset("images/entradas/")}}/{{$item->imagen}}"
                                        class="img-fluid center-cropped" style="width: 100%; height: 160px"></a>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-2">
                                    <span style="content: '0' counter(my-awesome-counter); font-weight: bold; font-size: 2.3em; line-height: 1; color: rgba(38, 69, 99, 0.25);"> 0{{$contador++}}</span>
                                </div>
                                <div class="col-10">
                                    <a href="{{ route('blog.entrada.elementum',$item->id) }}"><h5 class="serif bold"
                                                                                                  style="color:#1d3b4f"
                                                                                                  align="">{{$item->nombre}}</h5>
                                    </a>
                                    @if($item->user_id != 999)
                                        <p style="font-size:.8em;">Escrito por <a
                                                    href="{{ route('autores.detalle',$item->user_id) }}"><b>{{$item->autor}}
                                                </b></a> <br>{{$item->fecha}}
                                        </p>
                                    @else
                                        <p style="font-size:.8em;">Escrito por <b>{{$item->autor_externo}}
                                            </b> <br>{{$item->fecha}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="separador"></div>
    </div>


@endsection

@section('script_collection')
    <script>
        var tags = [];
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

            var etiquetas = '{{$entrada->etiquetas}}';
            etiquetas = etiquetas.split(',');
            $.each(etiquetas, function (index, value) {
                $('#etiquetas').append('<span style="color: #fff;">ee</span><a href="/blog/entradas/' + value + '" style="color: white; cursor:pointer;"><span class="etiqueta" style="background-color: #00394C">' + value + '</span></a>');
                tags = value;
                console.log(tags);
            });

        });
        var popupMeta = {
            width: 400,
            height: 400
        }
        $(document).on('click', '.compartir_', function (event) {
            event.preventDefault();

            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2);
            var hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

            var url = $(this).attr('href');
            var popup = window.open(url, 'Social Share',
                'width=' + popupMeta.width + ',height=' + popupMeta.height +
                ',left=' + vPosition + ',top=' + hPosition +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                return false;
            }
        });
        // $(document).on('click', '#tag-value', function (event) {
        //    console.log($('#tag-value').data('tag'));
        // });
    </script>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=796604297367336&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection

