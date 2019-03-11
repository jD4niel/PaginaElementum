@extends('template')
@section('home')
    <img  class="img-responsive" width="100%" height="535px" src="{{ URL::to('/') }}/images/tabs_banners/{{$tab_name->image}}" alt="">
    <div class="separador"></div>
    <div id="preview_btn"></div>
    <div id="text_container" class="container">
        {!!$text!!}
    </div>

    <div class="separador"></div><br>
    <div class="container">
        <center>
        <h1 class="h1" style="font-size: 50px;">Somos Elementum</h1>
            <hr width="50%">
        </center>
        <br>
        <div class="row">  
        @foreach($users as $item)
          <div class="personal-element col-md-6">
            <div>
              <span class="effect-underline" data-toggle="modal" data-id="{{ $item->id }}" data-text="{!! $item->text !!}" data-nombre="{{ $item->name }} {{ $item->last_name }}" data-puesto="{{ $item->puesto }}" data-imagen="{{ asset('images/fotos_usuarios') }}/{{ $item->imagen }}" data-target="#personalModal">
                {{ $item->name }}&nbsp;{{ $item->last_name }}
              </span>
            </div>
          </div>
        @endforeach()

         <!-- Modal Elementum -->
          <div class="modal fade" id="personalModal" role="dialog">
            <div class="modal-dialog  modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Integrantes</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 cont-img">
                      <div>
                        <div class="img-bx">
                          <img src="" alt="personal Elementum" class="users-img-elementum">
                        </div>
                        <div class="puesto-txt"></div>
                      </div>
                    </div>
                      <div class="col-md-8 modal-text-elementum">
                        <h2 class="personal-name"></h2>
                        <p class="modal-text"></p>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
              
            </div>
          </div>
       </div>  
        <div class="separador"></div>
    </div>

@endsection
@section('script_collection')
  <script>
    $('#personalModal').on('show.bs.modal', function (event) {
          var personal_btn_trigger  = $(event.relatedTarget); 
          var modal   = $(this);
          var id = personal_btn_trigger.data('id');
          var nombre = personal_btn_trigger.data('nombre');
          var text = personal_btn_trigger.data('text');
          var imagen = personal_btn_trigger.data('imagen');
          var puesto = personal_btn_trigger.data('puesto');

          modal.find('.puesto-txt').text(puesto);
          modal.find('.modal-text').html(text);
          modal.find('.personal-name').text(nombre);
          modal.find('.users-img-elementum').attr("src",imagen);


      });

    $(document).ready(function() {
          $('.puesto').popover();
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
