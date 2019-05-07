@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center" style="background-color: #39527a">
        <div class="row col-md-8 text-center" style="margin: auto;float: none;">
            <div class="col-md-12">
                <br>
                <form class="taller-form form" action="{{route('new.taller.send')}}" method="post" enctype="multipart/form-data">
                    <h1>CREAR TALLER</h1>
                    <br>
                    <hr>
                    <div class="form-group" id="contenedor-img">

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="col-md-12">
                            <button type="button" onclick="triggerFile()" style="width: 60%" class="btn btn-success ">Agregar una imagen</button>
                            <br>
                            <input type="file" onchange="readURL(this)" id="fileUp" name="file" style="display: none;">
                        </div>
                        <img id="preview-img" width="60%" src="" alt="">

                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Titulo:</label>
                        <input type="hidden" value="" id="imagenNom">
                        <input id="titulo-taller" type="text" name="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Descripción:</label>
                        <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Duración:</label>
                        <input id="duracion" type="text" class="form-control" name="duration" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label" >Imparte:</label>
                        <input id="persona" type="text" class="form-control"  name="imparte" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Sede:</label>
                        <input id="sede" type="text" class="form-control" name="sede" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Informes:</label>
                        <input id="informes" type="text" class="form-control" name="info" value="">
                    </div>
                    <br><br>
                    <button type="button" onclick="triggerSubmit('¿Crear nuevo taller?','taller')" class="edit-btn">Agregar taller</button>
                    <input type="submit" id="submit-taller" style="display: none;">
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script_section')
<script src="{{asset('js/talleres.js')}}"></script>
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
        Dropzone.options.myDropzone = {

            url: "{{ route('pdf.up') }}",
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 20,
            maxFilesize: 50,
            dictDefaultMessage: "",
            dictMaxFilesExceeded: "No puedes subir más archivos",
            dictInvalidFileType: "No se puede subir este tipo de archivo",
            dictFileTooBig: "El archivo es muy pesado",
            acceptedFiles: "application/pdf",
            sending: function(file, xhr, formData) {
                //  formData.append("id", 1);
            },
            init: function () {

                var submitButton = document.querySelector("#submit")
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                });

                // You might want to show the submit button only when
                // files are dropped here:
                var wrapperThis = this;

                this.on("addedfile", function (file) {

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

                this.on("success", function (file, response) {
                    console.log("guardado");
                    window.location.reload();
                });
            }
        };
    </script>
    <script>
        //enviar foto al servidor
        function enviarFoto() {
            var id = $('#id_taller').val();
            var sede = $('#sede').val();
            var titulo = $('#titulo-taller').val();
            var my_editor = "summary-ckeditor";
            var descripcion = CKEDITOR.instances[my_editor].getData();
            var duracion = $('#duracion').val();
            var imparte = $('#persona').val();
            var myFormData = new FormData();
            var imagen_nombre = $('#imagenNom').val();
            var foto = $("#fileUp");
            myFormData.append('file', foto[0]['files'][0]);
            myFormData.append('titulo', titulo);
            myFormData.append('descripcion', descripcion);
            myFormData.append('duracion', duracion);
            myFormData.append('imparte', imparte);
            myFormData.append('imagen_nombre', imagen_nombre);
            myFormData.append('sede', sede);
            var url = '{{route('new.taller.send')}}';
            swal({
                title: "¿Agregar taller?",
                text: "Este taller aparecerá en la página principal de Elementum",
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
                             swal("El taller fue agregado correctamente", " ",{
                                        icon: "success"
                                    }).then((value) => {
                                     //window.location.reload();
                                     console.log(response)
                                });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
            });
        }
        //borrar foto selecionada/se oculta
        /*  function borrarfoto() {
              $('#img').hide(200);
          }*/
        //leer imagenes y mostrarla en pantalla
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#preview-img").attr("src", e.target.result);

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
        Dropzone.options.myDropzone = {

            url: "{{ route('slide.up') }}",
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 20,
            maxFilesize: 100,
            dictDefaultMessage: "",
            dictMaxFilesExceeded: "No puedes subir más archivos",
            dictInvalidFileType: "No se puede subir este tipo de archivo, solo imagenes jpg/jpeg",
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
                    //location.reload();
                });
                this.on('sending', function(file, xhr, formData){
                    // formData.append('id', this['element']['attributes']['data-datos']['value']);
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

