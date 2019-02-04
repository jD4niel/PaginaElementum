@extends('template')

@section('home')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background: linear-gradient(0deg,rgba(32,34,33,0.89),rgba(68,76,87,0.73)),url('{{asset("images/entradas/")}}/{{$entrada->imagen}}');background-repeat: no-repeat;color:white;padding: 100px;vertical-align:center;text-align:center;background-color: #1d3b4f;height: 300px; margin-top:40px;"> <h4>{{$entrada->intro}}</h4> </div>
    </div>
    <div class="row">
        <div id="cuerpo_blog" class="col-md-10" style="padding: 20px; margin: -50px auto 0; align-content:center;background-color: white; box-shadow: 0px 4px 5px 0px rgba(161,161,161,1);">
            <div class="col-md-12" align="right" style="color: rgba(29,59,79,0.23)"> Compartir:
                <i onclick="openInNewTab('')" class="fab social_icons fa-facebook-f link" style=" border: 2px solid rgb(29,59,79,0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                <i onclick="openInNewTab('')" class="fab social_icons fa-twitter link" style=" border: 2px solid rgb(29,59,79,0.23); color: rgb(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                <i onclick="openInNewTab('')" class="fab social_icons fa-instagram link" style=" border: 2px solid rgb(29,59,79,0.23); color: rgb(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
            </div>
            <div class="col-md-12">
                <h1 class="serif display-2" style="color:#1d3b4f;margin-bottom: 20px;">{{$entrada->nombre}}</h1>
                <div>Escrito por <b style="color:#1d3b4f;">{{$autor->nombre}}&nbsp;{{$autor->apellido_p}}</b>, {{$fecha}}</div>
                <br><br>
                <div class="col-md-12" style="margin-bottom: 50px;text-align: justify;">
                    {!! $entrada->texto !!}
                </div>
            </div>
            <div class="col-md-12" align="center">
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fas fa-thumbs-up fa-stack-1x fa-inverse"></i>
                </span><br>
                <span style="font-size: 1.5em">Likes <input type="text" id="likes" size="2" value="200" style="background: transparent; border: none;"></span>
            </div>
            <hr class="shine">
            <div class="col-md-12 align-self-center" style="margin-top: 80px" >
                <div class="row">
                    <div class="col-md-3">
                        <img style="filter: drop-shadow(-1px 3px 2px #4e4e4eb5);border-radius: 10%;" class="img-fluid rounded-circle" src="{{ URL::to('/') }}/images/fotos_autores/{{$autor->imagen}}" alt="">
                    </div>
                    <div class="col-md-9">
                        <h3>{{$autor->nombre}}{{$autor->apellido_p}}&nbsp;{{$autor->apellido_m}}</h3>
                        <p style="font-size: 1em; text-align: justify;text-justify: inter-word;">{!! $autor->breve_desc!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" align="right">
                <i onclick="openInNewTab('{{$autor->facebook}}')" class="fab social_icons fa-facebook-f link" style="color: rgb(29, 59, 79); border: 2px solid rgba(29,59,79, 0.23); color: rgba(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                <i onclick="openInNewTab('https://twitter.com/{{$autor->twitter}}')" class="fab social_icons fa-twitter link" style="color: rgba(29, 59, 79); border: 2px solid rgba(29,59,79,0.23); color: rgb(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
                <i onclick="openInNewTab('instagram.com/{{$autor->instagram}}')" class="fab social_icons fa-instagram link" style="color: rgba(29, 59, 79); border: 2px solid rgba(29,59,79,0.23); color: rgb(29,59,79,0.23); font-size: 15px; padding-top:6px;height: 30px; width: 30px;"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10"  align="right"  style="padding-top: 1em; margin: 0 auto 0;">
            <h3>Etiquetas</h3>
            <hr class="hr-tags">
            <div id="etiquetas" style="padding-top: 15px">
        </div>
    </div>
    <div class="separador"></div>
</div>

@endsection

@section('script_collection')
    <script>
            $('.navigation').css({'background-color':'rgba(255, 255, 255, 1)'},{'color':'#1d3b4f'});
            $(document).ready(function() {
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

                var etiquetas = '{{$entrada->etiquetas}}';
                etiquetas = etiquetas.split(',');
                $.each(etiquetas, function( index, value ) {
                    $('#etiquetas').append('<span style="color: #fff;">ee</span><span class="etiqueta" style="background-color: #00394C; color: white">' + value + '</span>');
                    console.log( value );
                });

            });
    </script>
@endsection

