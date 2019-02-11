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
            <div class="col-md-4">    
                <div class="section_element col-md-12">
                    <div class="el-cont">
                        <img src="{{asset('images/people.jpg')}}" alt="" class="img-element"/>
                    </div>
                    <div class="btn-cont">
                        <button class="btn_element">Galería</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">    
                <div class="section_element col-md-12">
                    <div class="el-cont">
                        <img src="{{asset('images/people.jpg')}}" alt="" class="img-element"/>
                    </div>
                    <div class="btn-cont">
                        <button class="btn_element">Galería</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">    
                <div class="section_element col-md-12">
                    <div class="el-cont">
                        <img src="{{asset('images/people.jpg')}}" alt="" class="img-element"/>
                    </div>
                    <div class="btn-cont">
                        <button class="btn_element">Galería</button>
                    </div>
                </div>
            </div>
           
        </div>
    </div>


    <div class="container" id="sections-elementario">
        <div class="row">
            <div class="title_section">
                <h2 class="col-md-12">Actividades programadas</h2>
                <hr class="hr-sec" />
                <hr>
            </div>
            <div id="section_uno" class="row">
                <div class="col-md-4">
                    <div class="ind-section">
                        <div class="img-box">
                            <img  src="{{asset('images/people.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div id="texto_" class="text-section">
                            <h2>Titulos talleres</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nemo neque minus quod, cum mollitia aliquid deserunt accusamus in animi! Alias, temporibus impedit rerum. Nostrum alias repudiandae nisi ad animi?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ind-section">
                        <div class="img-box">
                            <img  src="{{asset('images/people.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div id="texto_" class="text-section">
                            <h2>Titulos talleres</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nemo neque minus quod, cum mollitia aliquid deserunt accusamus in animi! Alias, temporibus impedit rerum. Nostrum alias repudiandae nisi ad animi?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ind-section">
                        <div class="img-box">
                            <img  src="{{asset('images/people.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div id="texto_" class="text-section">
                            <h2>Titulos talleres</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nemo neque minus quod, cum mollitia aliquid deserunt accusamus in animi! Alias, temporibus impedit rerum. Nostrum alias repudiandae nisi ad animi?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ind-section">
                        <div class="img-box">
                            <img  src="{{asset('images/people.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div id="texto_" class="text-section">
                            <h2>Titulos talleres</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nemo neque minus quod, cum mollitia aliquid deserunt accusamus in animi! Alias, temporibus impedit rerum. Nostrum alias repudiandae nisi ad animi?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ind-section">
                        <div class="img-box">
                            <img  src="{{asset('images/people.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div id="texto_" class="text-section">
                            <h2>Titulos talleres</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde nemo neque minus quod, cum mollitia aliquid deserunt accusamus in animi! Alias, temporibus impedit rerum. Nostrum alias repudiandae nisi ad animi?
                            </p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="see-more">
            <a href="#">Ver más ></a>
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
