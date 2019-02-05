@extends('template')

@section('home')
<div class="container">
    <div id="mas_recientes" class="row">
    <h1>Más recientes elementum...</h1>
    </div>
    <div class="row">
        banner
    </div>
    <div id="nuestros_colaboradores" class="row">


        <h1>Nuestros colaboradores</h1>
        <hr>

    </div>
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

