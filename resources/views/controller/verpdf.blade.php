@extends('template')

@section('home')
<div class="container">
    <div class="separador"></div>
    <div class="row">
        <h3 style="margin:0 auto;">Documentos editorial</h3>
    </div>
    <br>
    <hr>
    <div class="row">
        @if(count($pdf)<1)
            <h4 class="h4 col-md-4">No se han cargado documentos</h4>
            <a  class="col-md-3" href="{{route('subirpdf')}}"><button class="btn btn-success">SUBIR</button></a>
        @else
            @foreach($pdf as $item)
                <a href="{{asset('images/pdf')}}/{{$item->nombre}}" target="_blank"><button class="btn btn-success col-md-3">{{$item->nombre}}</button></a>
            @endforeach
        @endif
    </div>
<div style="margin-bottom: 20em"></div>
</div>
@endsection

@section('script_collection')
    <script>
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

