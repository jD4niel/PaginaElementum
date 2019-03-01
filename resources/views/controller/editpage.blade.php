@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row" style="width: 80%;margin: auto;">
            <h1 class="h1 text-center">Slider</h1>
            <h3 class="h3 text-center">Las imágenes deben de ser en formato .jpg</h3>
            <hr>
            @foreach($pagina as $item)
                <div id="id{{$item->id}}" class="col-md-4" style="margin: 5px 0 5px 0;">
                    <div class="dropzone dropzone-file-area" id="my-dropzone" data-datos="{{$item->id}}" style="  background-repeat: no-repeat;background-size: 100% 100%;background-image: url('{{asset("images/slider")}}/{{$item->nombre}}');border-width: 4px;">
                        <img  src="{{asset('images/slider')}}/{{$item->nombre}}" alt="" class="img-responsive" style="visibility: hidden">
                        <input id="id{{$item->id}}" type="hidden" value="{{$item->id}}">
                        <div class="fallback text-center">
                            <input name="file" type="file" id="file_" hidden style="display: none">
                        </div>
                        <div onclick="eliminar({{$item->id}})" class="anuncio"><i class="far fa-trash-alt"></i></div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12" style="margin-top: 35px;">
                <div class="text-center"><button onclick="triggerFile()" class="btn btn-success">Agregar más</button>
                    <form action="" enctype="multipart/form-data" id="upload_form" role="form" method="POST">
                        <input id="fileUp" name="subirSlider"  multiple="multiple"  onchange="readURL(this);" accept="image/jpg,image/jpeg" type="file" style="display: none">


                        <div class="col-md-12 text-center" style="margin: auto;">
                            <figure id="img"  class="figure">
                                <img class="img-fluid" src="" alt="imagen"/>
                                <figcaption class="figure-caption">
                                    <button id="subir_imagen" type="button" onclick="enviarFoto()" class="btn btn-success"><i class="fas fa-upload"></i></button>
                                    <button id="borrar" type="button" onclick="borrarfoto()" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </figcaption>
                            </figure>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="container" style="margin: 150px auto;">
        <div class="row">
            <h1 class="h1 text-center">Servicios</h1>
            <hr>
        </div>
        <div id="service-card-container" class="row">
            
            @foreach($servicios as $item)
            <div class="col-md-3">
            <button id="btn-change-img{{ $item->id }}" class="change-img-sections for-service" onclick="triggerFileService('{{ $item->id }}')" onmouseenter="btn_appear('{{ $item->id }}')" onmouseleave="btn_disapear('{{ $item->id }}')">Cambiar imagen</button>
            


            <div id="eis_{{$item->id}}" class="edit_individual_section for-service-edit" title="Guardar cambios" onclick="edit_section({{$item->id}},'servicio','¿Editar este servicio?','Los cambios se verán reflejados en la pestaña de Elementario')"><i class="fas fa-check"></i></div>
            <div class="delete_section" style="top:0px !important; right: 0 !important;" title="Eliminar servicio" onclick="delete_section({{$item->id}},'servicio','Eliminar servicio','Una vez eliminado, no se puede revertir el cambio')"><i class="far fa-trash-alt"></i></div>
                

                <div class="service-card" data-toggle="modal" data-target="#serviceModal" data-title="{{ $item->name }}" data-id="{{ $item->id }}" data-text="{!! $item->text !!}" onmouseenter="btn_appear('{{ $item->id }}')" onmouseleave="btn_disapear('{{ $item->id }}')" onclick="onchangeinput({{$item->id}})">
                    <img id="img-element-service{{$item->id}}" src="{{ asset('images/servicios') }}/{{ $item->image }}" class="img-fluid" style="width:100%">
                    <input id="service_name{{$item->id}}" type="text" onchange="onchangeinput({{$item->id}})" class="service-name" value="{{ $item->name}}">
                    <input type="file" onchange="readURLservice(this, '{{$item->id}}')" id="fileUpService{{ $item->id }}" style="display: none;">

                    <textarea class="form-control" id="text{{ $item->id }}" style="display: none"></textarea>
                
                </div>

            </div>
            @endforeach()

        
            <br>
            <br>
            <br>
        </div>
        <div class="row" style="text-align: center">
            <button id="AddServiceBtn" class="btn-hover color-1" onclick="AddService()"><i class="fas fa-plus"></i> Agregar servicio</button>
            <button id="SaveServiceBtn" class="btn-hover color-2 hide" onclick="saveService({{count($servicios)}})"><i class="fas fa-plus"></i> Guardar</button>
        </div>
    </div>
    <div class="container-fluid" style="background-color: white">
        <div class="row" style="width: 80%;margin: auto;">
            <h1 class="h1 text-center">Talleres</h1>
            <hr>
            {{--Carta de talleres--}}
            @foreach($talleres as $item)
            <div id="taller_num{{$item->id}}" class="col-md-4 taller-body" style="margin: 10px;">
                        <div class="col-md-12" style="margin:20px 0 25px 0;">
                                <img class="img-responsive" src="{{asset('images/talleres')}}/{{$item->imagen}}" alt="sin imagen">
                        </div>
                    <h2 class="titulo-taller">{!! $item->titulo !!}</h2>
                        <hr>
                    <div class="desc-taller">{!! $item->descripcion !!}</div>
                        <hr>
                    <div class="duracion-taller">{!! $item->duracion !!}</div>
                        <hr>
                    <div class="sede-taller">{!! $item->sede !!}</div>
                        <hr>
                    <div class="persona-taller">{!! $item->persona !!}</div>
                        <hr>
                <div class="card-body text-card">
                    Informes e inscripciones a <a href="tallereselementum@hotmail.com">tallereselementum@hotmail.com</a>
                </div>

                <div class="overlay">
                    <div class="contenedor-btn-taller">
                        <a href="{{route('edit.taller',$item->id)}}"><button class="btn btn-success centrar-obj">Editar taller</button></a>
                    <button class="btn btn-danger centrar-obj" onclick="eliminarTaller({{$item->id}})">Eliminar</button>
                    </div>
                </div>
            </div>
            {{--------------------}}
            @endforeach
        </div>
        <br><br><br><br>
        <div class="text-center"><button onclick="" class="btn btn-info">Añadir taller</button>
            <br><br><br>
        </div>
    </div>
    <div class="container">
        <h1 class="h1 text-center">Agregar PDF's</h1>
        <hr>
        <div class="row text-center" >
            <div class="col-md-12 text-center">
                <div class="col-md-6" style="left: 25%;">
                    <button id="savePdf" class="btn btn-success btn-block" type="button" onclick="guardarFotoPDF()" style="display: none;">Guardar cambios</button>
                    <img  id="imgRef" class="img-fluid" width="100%" src="{{ URL::to('/') }}/images/img_ref.jpg">
                </div>
                <div class="col-md-12" style="margin: auto;">
                    <button class="btn btn-info" onclick="pdfChange()">Cambiar PDF</button>
                    <button class="btn btn-danger" onclick="imgChange()">Cambiar Imagen</button>
                    <input type="file" id="changeImg" onchange="readURLimg(this)" style="display: none">
                    <input type="file" id="changePdf" onchange="readURLpdf(this)" style="display: none">
                </div>
                <div class="col-md-12" style="margin: auto;padding: 6px;">
                    <a target="_blank" href="{{ URL::to('/') }}/descarga.pdf">
                        <button class="btn btn-success">Ver PDF</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <br><br><br><br><br>


<!-- Modal -->
<div id="serviceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>.
      <div class="modal-body">
         <textarea class="form-control" id="summary-ckeditor"></textarea>
      </div>
      <div class="modal-footer">
        <button id="saveModalInfo" type="button" class="btn btn-info" btn-id="" onclick="getTextFromModal()" data-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


@endsection

@section('script_section')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var ckEditorID;
        ckEditorID = 'summary-ckeditor';
        CKEDITOR.config.forcePasteAsPlainText = true;
        CKEDITOR.replace( ckEditorID,
            {
                toolbar :
                    [
                        {
                            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
                        },
                        {
                            items : [ 'Link','Unlink' ]
                        }
                    ]
            })
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        function imgChange() {
            $('#changeImg').trigger('click');
        }
        function pdfChange() {
            $('#changePdf').trigger('click');
        }
        function readURLimg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imgRef").attr("src", e.target.result);
                    $("#savePdf").show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLpdf(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#savePdf").show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function guardarFotoPDF() {
            var myFormData = new FormData();
            var foto = $("#changeImg");
            var pdf = $("#changePdf");
            console.log(foto.val().length);
            console.log(pdf.val().length);
            if(pdf.val().length != 0){ myFormData.append('pdf', pdf[0]['files'][0]); }else{ myFormData.append('pdf', 1); }
            if(foto.val().length != 0){ myFormData.append('file', foto[0]['files'][0]); }else{ myFormData.append('file', 1); }
            var url = '{{route('new.pdf.up')}}';
            swal({
                title: "¿Modificar imagen/PDF?",
                text: "Las imagenes se actualizarán en la página principal",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        data: myFormData,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        success: function (response, file) {
                            if (response == 0){
                                swal("No se modificaron cambios", "No agrego PDF ni imagen",{
                                    icon: "warning"
                                });
                            }else {
                                window.location.reload();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
            });

        }
        //enviar foto al servidor
        function enviarFoto() {
            var myFormData = new FormData();
           var foto = $("#fileUp");
            myFormData.append('file', foto[0]['files'][0]);
            myFormData.append('nombre', 'daniel');
            var object = {};
            myFormData.forEach(function(value, key){
                object[key] = value;
            });
            var file = JSON.stringify(object);
            var url = '{{route('new.slide.up')}}';
            swal({
                title: "¿Añadir nuevo slider?",
                text: "Las imagenes se actualizarán automaticamente en la siguiente posición",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        data: myFormData,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        success: function (response, file) {
                            window.location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
        });
        }
        //borrar foto selecionada/se oculta
        function borrarfoto() {
            $('#img').hide(200);
        }
        //leer imagenes y mostrarla en pantalla
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#img img").attr("src", e.target.result);
                    $('#img').show();
                    $('#img img').show();
                    $('#img figcaption').show();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function triggerFile() {
            $('#fileUp').trigger('click');
        }
        function triggerFilePdf() {
            $('#addImgPDF').trigger('click');
        }
        function eliminar(id) {
            swal({
                title: "¿Eliminar slider?",
                text: "Una vez eliminado, no se podrán recuperar la imagen",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/editar/slider/borrar/'+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id: id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('#id'+id).hide();
                            swal("El registro fue eliminado correctamente", {
                                icon: "success",
                            });
                        },
                        error: function (data) {
                            console.log("error")
                            console.log(data);
                        }
                    });

                }
            });
        }
        function eliminarTaller(id) {
            swal({
                title: "¿Eliminar taller?",
                text: "Una vez eliminado, no se podrán recuperar la información del taller",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/editar/taller/borrar/'+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id: id},
                        type: 'delete',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('#taller_num'+id).hide();
                            swal("El registro fue eliminado correctamente", {
                                icon: "success",
                            });
                        },
                        error: function (data) {
                            console.log("error")
                            console.log(data);
                        }
                    });

                }
            });
        }
        Dropzone.options.myDropzone = {

            url: "{{ route('slide.up') }}",
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            autoProcessQueue: true,
            uploadMultiple: false,
            parallelUploads: 20,
            maxFilesize: 50,
            dictDefaultMessage: "",
            dictMaxFilesExceeded: "No puedes subir más archivos",
            dictInvalidFileType: "No se puede subir este tipo de archivo",
            dictFileTooBig: "El archivo es muy pesado",
            acceptedFiles: "image/jpg,image/jpeg",
            /* sending: function(file, xhr, formData) {
                 //  formData.append("id", 1);
             },*/
            init: function () {

                /* var submitButton = document.querySelector("#submit")
                 myDropzone = this; // closure

                 submitButton.addEventListener("click", function() {
                     myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                 });*/

                // You might want to show the submit button only when
                // files are dropped here:
                var wrapperThis = this;

                this.on("addedfile", function (file) {
                    console.log();

                    //console.log(file['name']);
                    $('#imagen_nombre').val(file['name']);
                    var removeButton = Dropzone.createElement("<button class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button>");

                    removeButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        wrapperThis.removeFile(file);
                    });

                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {

                });

                this.on("error", function (file, response) {
                    alert("error" + response);
                    console.log(response);

                    if (response == "No puedes subir más archivos") {
                        swal("¡Error!", "Solo se permite un archivo por orden", "error");
                    }
                    else if (response == "No se puede subir este tipo de archivo") {
                        swal("¡Error!", "No se puede subir este tipo de archivo", "error");
                    }
                    else if (response == "El archivo es muy pesado") {
                        swal("¡Error!", "El archivo es muy grande", "error");
                    }
                    else {
                        swal("¡Error!", "Hubo un error con su archivo", "error");
                    }
                    $('.textoAyuda').text('Error')
                    this.removeFile(file);
                    location.reload();
                });
                this.on('sending', function(file, xhr, formData){
                    formData.append('id', this['element']['attributes']['data-datos']['value']);
                });
                this.on("success", function (file, response) {
                    console.log("guardado");
                    console.log(file);
                    console.log(response);
                    // window.location.reload();
                });
            }
        };

    </script>
    <script>
        function cambiar(a) {
            var url = window.location + "/slider";
            var data = {id: a};
            axios.post(url,data)
                .then(function (response) {
                    console.log(response['data']);
                }).catch(function (error) {console.log(error);});
        }
        // JS servicios
        function AddService() {
            $('#AddServiceBtn').hide()
            $('#SaveServiceBtn').removeClass('hide')   
            var id = parseInt({{count($servicios)}})+1
            $('#service-card-container').append(''+
                '<div class="col-md-3">'+
                '<button id="btn-change-img'+id+'" class="change-img-sections for-service" onclick="triggerFileService('+id+')" onmouseenter="btn_appear('+id+')" onmouseleave="btn_disapear('+id+')">Cambiar imagen</button>'+
                '<div class="delete_section" style="top:0px !important; right: 0 !important;" title="Eliminar servicio" onclick="delete_section()"><i class="far fa-trash-alt"></i></div>'+
                    '<div class="service-card" data-toggle="modal" data-target="#serviceModal" data-title="" data-id="'+id+'" data-text="" onmouseenter="btn_appear('+id+')" data-toggle="modal" data-target="#serviceModal" data-title="" data-id="'+id+'" data-text="" onmouseenter="btn_appear('+id+')" onmouseleave="btn_disapear('+id+')">'+
                       ' <div id="noimg'+id+'" class="img-from-fa"><i class="far fa-image"></i></div><img id="img-element-service'+id+'" class="img-fluid" style="width:100%">'+
                        '<input id="service_name'+id+'" type="text" class="service-name" value="">'+
                        '<button id="btn-change-img" class="change-img-sections" onclick="triggerFileService('+id+')">Cambiar imagen</button>'+
                        '<input type="file" onchange="readURLservice(this,'+id+')" id="fileUpService'+id+'" style="display: none;">'+
                    '</div></div>');
        }
        
    </script>

    <script src="{{asset('js/edit_elements.js')}}"></script>
@endsection

