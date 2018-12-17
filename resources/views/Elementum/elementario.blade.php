@extends('template')
@section('autores')
    <div id="container360"></div>
    <div style="position: absolute; top: 120px;left: 20px; background-color: #367EB6;padding: 15px;color: white; font-size: 3vh;filter: opacity(.9);">
        <div class="">Superficie: 36m<sup>2</sup></div>
        <div>Capacidad: 1100 Libros</div>
    </div>
    <script type="text/javascript" src="https://cdn.rawgit.com/thiagopnts/kaleidoscope/master/dist/kaleidoscope.min.js"></script>
    <script type="text/javascript">
        (function() {
            var viewer = new Kaleidoscope.Image({
                source: '{{asset('library2.png')}}',
                containerId: '#container360',
                height: window.innerHeight,
                width: window.innerWidth,
            });
            viewer.render();
            window.onresize = function() {
                viewer.setSize({height: window.innerHeight, width: window.innerWidth});
            };
        })();
    </script>
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
