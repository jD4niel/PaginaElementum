@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row" style="width: 80%;margin: auto;">
            <h1 class="h1 text-center">Slider</h1>
            <h3>Las imagenes deben de ser en formato .jpg</h3>
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
           {{-- <form action="" enctype="multipart/form-data" id="upload_form" role="form" method="POST">
                <input id="tallerUp" name="subirSlider"  multiple="multiple"  onchange="readURL(this);" accept="image/jpg,image/jpeg" type="file" style="display: none">
                <div class="col-md-12 text-center" style="margin: auto;">
                    <figure id="img-taller"  class="figure">
                        <img class="img-fluid" src="" alt="imagen"/>
                        <figcaption class="figure-caption">
                            <button id="subir_imagen" type="button" onclick="enviarFoto()" class="btn btn-success"><i class="fas fa-upload"></i></button>
                            <button id="borrar" type="button" onclick="borrarfoto()" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </figcaption>
                    </figure>

                </div>
            </form>--}}
        </div>
    </div>
    <br><br><br><br><br>




{{--Modales para edición de talleres--}}
    <!-- Modal -->
    <div id="editarTaller" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Talleres</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
        //enviar foto al servidor
        function enviarFoto() {
            var myFormData = new FormData();
           var foto = $("#fileUp");
            /*console.log(foto);
            console.log(foto[0]);
            console.log(foto[0]['files']);
            console.log(foto[0]['files'][0]);
            console.log(foto['files']);*/

            myFormData.append('file', foto[0]['files'][0]);
            myFormData.append('nombre', 'daniel');
            //  console.log(myFormData.get('file'));

            var object = {};
            myFormData.forEach(function(value, key){
                object[key] = value;
            });
            var file = JSON.stringify(object);

            var url = '{{route('new.slide.up')}}';
            swal({
                title: "¿Añadir nuevo slider?",
                text: "Las imagenes se actualizaran automaticamente en la siguiente posición",
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
            /* $.ajax({
                 url: url,
                 data: data,
                 headers:{
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: 'post',
                 datatype:'json',
                 success: function (data) {
                    console.log(data)
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus + ': ' + errorThrown);
                 }
             })*/
        }
    </script>
@endsection

