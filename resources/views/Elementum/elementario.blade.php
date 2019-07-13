@extends('template')
@section('autores')
    
    <div class="container-fluid" style="background-color: #E8E8E8FF">
        <div class="row col-md-10" style="margin: 0 auto;">
            <div style="height: 50px;">&nbsp;</div>
            <div id="programming_section" class="col-md-12" style="margin:auto;">
                <div style="background-color: #E8E8E8FF;margin-left: 25px;display:inline-block;margin-bottom: -10px;vertical-align: bottom;">
                    <h1 style="margin-bottom: -10px; color: #002F3AFF">&nbsp;{{ $title[0]->name }}&nbsp;</h1>
                </div>
                <div id="programming_container" style="height: auto;width: 100%">
                    <div class="row">
                        @foreach($month_range as  $indexKey => $item)
                            @if( count($month_range) > 1)
                            <div class="col-md-5" style="margin: 10px 0;">
                                <h5 style="color: #002F3AFF"><i class="fas fa-star"></i>&nbsp;<b>{{ $item->year }}:</b></h5>
                                <div class="col-md-10" style="margin-left: 30px;">
                                    {!! $item-> text !!}
                                </div>
                            </div>
                                @if($indexKey%2==0 && $item->view_month == 1)
                                <div class="col-md-2"><div class="col-md-6"style="border-right:dotted 3px #1B4647F6;height: 100%;">&nbsp;</div></div>
                                @endif()
                            
                        @else
                            <div class="col-md-12" style="margin: 10px 0;">
                                <div class="col-md-10" style="margin-left: 30px;">
                                    {!! $item-> text !!}
                                </div>
                                </div>
                        @endif()
                       @endforeach()
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px;"></div>
    </div>
    

    <div class="container">
        <div class="row text-center" style="margin: 100px 0;">
            @foreach($section_obj as $item)
            <div class="col-md-4">    
                <div class="section_element col-md-12">
                    <div class="el-cont">
                        <img src="{{asset('images/secciones/headers')}}/{{ $item->img }}" alt="" class="img-element"/>
                    </div>
                    <div class="btn-cont">
                        <a href="#seccion-{{ $item->id }}"><button class="btn_element">{{ $item->name }}</button></a>
                    </div>
                </div>
            </div>
            @endforeach()
        </div>
    </div>


    <div class="container" id="sections-elementario">
    @foreach($section_obj as $indexKey => $item)
        <div class="row">
            <div class="title_section">
                <h2 id="seccion-{{ $item->id }}" class="col-md-12">{{ $item->name }}</h2>
                <hr class="hr-sec"/>
                <hr>
            </div>
            <div class="col-md-12 section_uno">

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
        <div class="see-more">
            <a href="{{ route('section.tab',$item->id)}}" target="_blank">Ver más ></a>
        </div>
        <div class="sep" style="height: 100px;"></div>
    @endforeach()
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
