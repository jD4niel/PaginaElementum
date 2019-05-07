@extends('template')
@section('autores')

<div style="height: 100px;"></div>
<div class="container">
     @foreach($section_obj as $indexKey => $item)
        <div class="row">
            <div class="title_section">
                <h2 id="seccion-{{ $item->id }}" class="col-md-12">{{ $item->name }}</h2>
                <hr class="hr-sec"/>
                <hr>
            </div>
            <div class="row section_uno">

                @foreach($entrada_sections as $row)
                    @if($row->section_obj_id == $item->id)
                    <div class="col-md-4" onclick="openInNewTab('{{route("blog.entrada.elementum",$row->entradas_id)}}')">
                        <div class="ind-section">
                            <div class="img-box">
                                <img  src="{{asset('images/entradas')}}/{{$row->imagen}}" class="img-fluid" alt="">
                            </div>
                            <div class="text-section texto_">
                                <h2>{{ $row->nombre }}</h2>
                                <p>
                                    {{ strip_tags(substr($row->texto,0,350)) }}...
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif()
                @endforeach()
            </div>
        </div>
        <div class="sep" style="height: 100px;"></div>
    @endforeach()
    <div class="row text-center">
        <div style="margin: 0 auto;">
            {{ $entrada_sections->render("pagination::bootstrap-4") }}
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

         function openInNewTab(url) {
          var win = window.open(url, '_blank');
          win.focus();
        }
      </script>
@endsection
