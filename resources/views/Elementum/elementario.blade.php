@extends('template')
@section('autores')
    
    <div class="container">
        <div class="row">
            <div style="height: 100px;"></div>
            <div id="programming_section">
                <div style="background-color: #fff;margin-left: 25px;display:inline-block;margin-bottom: -10px;vertical-align: bottom;">
                    <h2 style="margin-bottom: -10px;">&nbsp;Proximamento Diciembre - Diciembre&nbsp;</h2>
                </div>
                <div id="programming_container" style="height: 500px;widows: 700px;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>
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
