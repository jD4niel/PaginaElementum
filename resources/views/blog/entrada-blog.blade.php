@extends('template')

@section('home')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background: linear-gradient(0deg,rgba(32,34,33,0.89),rgba(68,76,87,0.73)),url('{{asset("images/entradas/")}}/{{$entrada->imagen}}');background-repeat: no-repeat;color:white;padding: 100px;vertical-align:center;text-align:center;background-color: #1d3b4f;height: 300px; margin-top:40px;"> <h4>{{$entrada->intro}}</h4> </div>
    </div>
    <div class="row">
        <div id="cuerpo_blog" class="col-md-10" style="padding: 20px; margin: -50px auto 0; align-content:center;background-color: white; box-shadow: 0px 4px 5px 0px rgba(161,161,161,1);">
            <div class="col-md">
                <h1 class="serif" style="color:#1d3b4f;margin-bottom: 20px;">{{$entrada->nombre}}</h1>
                <div>Escrito por <b style="color:#1d3b4f;">{{$autor->name}}&nbsp;{{$autor->last_name}}</b>, {{$fecha}}</div>
                <br><br>
                <div class="col-md-12" style="margin-bottom: 50px;text-align: justify;">
                    {!! $entrada->texto !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
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
            });
    </script>
@endsection

