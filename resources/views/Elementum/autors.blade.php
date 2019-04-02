
@extends('template')
@section('autores')
    
    <img class="img-fluid" src="{{ URL::to('/') }}/images/autores.png" alt="">
    
    <div class="container ">
    </div>
    <div class="separador"></div>
    <div class="separador"></div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -80px;">
                <div class="input-group mb-3">
                    <input  id="buscartxt" type="text" class="form-control simplebox" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2" style="background-color:#e9f2ef;border-top-left-radius: 15px;border-bottom-left-radius: 15px; height:45px;font-size: 20px; border:none;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="buscarAutor()" type="button" style="background-color:#e9f2ef;font-size:20px;border-top-right-radius: 18px;border-bottom-right-radius: 18px;border:none;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>


    </div> {{--contenedor fin--}}

    <div class="container" style="margin: 0 auto;width: 100%;">
        <div class="row" id="cajaAutores">
        @foreach($autors as $item)

                <div class="foto_autor col-md-4 text-center" style="margin: auto;padding-bottom: 150px;">
                    <div>
                        <br><br>
                        <figure class="fig_aut">
                            <img class="img-fluid img-autor" onclick="trigger_a({{$item->id}})" width="70%" src="{{ URL::to('/') }}/images/fotos_autores/{{$item->imagen}}" alt="">
                        </figure>
                        
                        <hr style="background-color: rgba(52,73,88,0.58);width: 40%;">
                        <div class="nombre_autor">{{$item->nombre}}&nbsp;{{$item->apellido_p}}</div>
                        <br>
                        <div class="obra" style="height: 80px; width: 80%;margin: 0 auto;">{!! $item->breve_desc !!}</div>
                        <br>
                        <a id="btn-id-{{$item->id}}" href="{{route('autores.detalle',$item->id)}}" style="text-decoration: none;"><button class="btn_contacto_autor">Acerca del autor</button></a>

                        <div class="autor_icons icons">
                            <a id="fb-{{$item->id}}" class="icon_social {{$item->facebook}}  " target="_blank" data-icon="{{$item->facebook}}" href="{{$item->facebook}}"><i class="icon_autor_list fab fa-facebook-f social_icons {{$item->facebook}}"></i></a>
                            <a id="tw-{{$item->id}}"class="icon_social {{$item->twitter}}  " target="_blank" data-icon="{{$item->twitter}}" href="https://twitter.com/{{$item->twitter}}"><i class="icon_autor_list fab fa-twitter social_icons {{$item->twitter}}"></i></a>
                            <a id="in-{{$item->id}}"class="icon_social {{$item->instagram}}  " target="_blank" data-icon="{{$item->instagram}}" href="https://www.instagram.com/{{$item->instagram}}"><i class="icon_autor_list fab fa-instagram social_icons {{$item->instagram}}"></i></a>
                        </div>

                        <br>
                    </div>
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
            // /*----------------------------*/
            if($('a').hasClass('not_')){
              //$('.not_>i').css('color','red');
              $('.not_').removeAttr("href");
              $('.not_').removeAttr("target");
              $('.not_').prop("title","No disponible");
            }
            //Home
            @yield('estilos') //aquiwe
        });

        function trigger_a(id){
          var a = document.URL;
          window.location.href=a+"/"+id;
        }
        function buscarAutor(){
        var nombre = $('#buscartxt').val();
        var route = "{{ route("buscar.autores")}}";
        var currentLocation = window.location+'/colecciones/';
        $.ajax({
            url: route,
            data: {'nombre': nombre},
            type: 'get',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#cajaAutores').html('');
                if(data.length<1){
                    $('#cajaAutores').html('<h4 style="margin: 50px auto 0 auto;">No se encontraron autores</h4>');
                }else{
                for(i in data){
                    $('#cajaAutores').append('' +
                            '<div class="foto_autor col-md-4 text-center" style="margin: auto;padding-bottom: 150px;">\n' +
                                '<div>\n' +
                                    '<br><br>\n' +
                                    '<figure class="fig_aut">\n' +
                                        '<img class="img-fluid img-autor" onclick="trigger_a('+data[i]["id"]+')" width="70%" src="{{ URL::to('/') }}/images/fotos_autores/'+data[i]["imagen"]+'" alt="">\n' +
                                    '</figure>\n' +
                                    '<hr style="background-color: rgba(52,73,88,0.58);width: 40%;">\n' +
                                    '<div class="nombre_autor">'+data[i]["nombre"]+'&nbsp;'+data[i]["apellido_p"]+'</div>\n' +
                                    '<br>\n' +
                                    '<div class="obra" style="height: 80px; width: 80%;margin: 0 auto;">'+data[i]["breve_desc"]+'</div>\n' +
                                    '<br>\n' +
                                    '<a id="btn-id-'+data[i]["id"]+'" href="autores/'+data[i]["id"]+'" style="text-decoration: none;"><button class="btn_contacto_autor">Acerca del autor</button></a>\n' +
                                    '<br>\n' +
                                '</div>\n' +    
                            '</div>\n' +
                        '')
                }
            }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
            }
        });

   }
    </script>
@endsection
