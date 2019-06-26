@extends('template')
@section('home')
<div class="image-container-crop">
      <img

      @if($colecciones->url != '' && isset($colecciones->url))
       onclick="openInNewTab('{{$colecciones->url}}')"
       style="cursor:pointer;"
      @endif
       
       class="image-tab-crop" src="{{ URL::to('/') }}/images/tabs_banners/{{$colecciones->image}}?{{rand(5,25)}}" alt="1280 x 700">
</div>
    <div class="separador"></div>


<div class="container">
  <div class="row">&nbsp;</div>
    <div class="row align-content-center text-center">
      @foreach($collection as $item)
        <div class="cont col-md-2" onclick="cambio({{$item->id}})">
          <div id="collectionID{{$item->id}}" class="contenedor_colecciones">
            <img id="img-col-id-{{$item->id}}" class="collection_img_card" src="{{asset('images/colecciones')}}/{{ $item->imagen }}" alt="{{ $item->imagen }}">
          </div>
        </div>
      @endforeach()
    </div>
  </div>
<div class="container ">
    <hr>
    <div id="contenedor_libros" class="row">
            @foreach($libros as $item)

                <div id="imgboxId{{$item->id}}" class="imgbox col-md-3 align-content-center text-center" onmouseleave="salir({{$item->id}})" onmouseover="ver({{$item->id}})" style="padding-top: 30px;padding-bottom: 20px;">
                    <a href="{{route("detalle.libros",$item->id)}}">
                    <figure>
                         <img width="250px" src="{{ URL::to('/') }}/images/libros/{{$item->imagen}}?{{rand(5,25)}}">
                          <figcaption>ver</figcaption>
                    </figure>
                    </a>
                </div>

            @endforeach
    </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
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
        function ver(a) {
            $('#imgboxId'+a+' figcaption').show();
        }
        function salir(a) {
            $('#imgboxId'+a+' figcaption').hide();
        }
        function generate() {

            const colors = [
                '#60A0FFFF', 
                '#FF8AF4FF', 
                '#F06B4F', 
                '#F2AE52', 
                '#B0CD6D', 
                '#A33120'
            ];

             return colors[Math.floor(Math.random() * colors.length)];
        }
        function cambio(a){
           var current_url=window.location.href;
	    console.log('collection_id',a);
            //$('#contenedor_libros').slideUp(500);
            $('.contenedor_colecciones').css({'background-color':'#e3e3e3'})
            $('#collectionID'+a).css({'background-color':generate()})
            $('.collection_img_card').css({'filter':'brightness(1) invert(0)'})
            $('#img-col-id-'+a).css({'filter':'brightness(0) invert(1)'})
            var nombre = $('#buscartxt').val();
            var route = "{{ route("ver.libros")}}";
            $.ajax({
                url: route,
                data: {'nombre': nombre,'coleccion':a},
                type: 'get',
                datatype:'json',
                success: function (data) {
                    //console.log("funciona ajax"+data[1]["imagen"]);
                    $('#contenedor_libros').html('')
                    console.log(data.length);
                    for(var i=0; i<data.length;i++){
                        $('#contenedor_libros').append('  <div id="imgboxId'+data[i]["id"]+'" class="imgbox col-md-3 align-content-center text-center" onmouseleave="salir('+data[i]["id"]+')" onmouseover="ver('+data[i]["id"]+')" style="padding-top: 30px;padding-bottom: 20px;">\n' +
                            '                    <a id="imgboxId'+data[i]["id"]+'" href="'+current_url+'/'+data[i]["id"]+'"><figure>\n' +
                            '                         <img width="250px" src="{{ URL::to('/') }}/images/libros/'+data[i]["imagen"]+'">\n' +
                            '                          <figcaption>ver</figcaption>\n' +
                            '                    </figure></a>\n' +
                            '                </div>');
                    }
                  //  $('#contenedor_libros').slideDown(700);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                }
            });
        }
        function ir(a){
           /* var route = " URL::route("detalle.libros.index")}}";
            $.get("ver",{name: a,_token : $('meta[name="csrf-token"]').attr('content')});*/

        }
    </script>
@endsection
