@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #1d3b4f">
    <div class="row col-md-12" style="margin:auto;">
        <form class="form-horizontal col-md-12 form-registry">
            <h1 class="h1 text-center">Nueva entrada</h1>
            <hr>
            <div class="form-group row">
                <div class="form-group col-md-9">
                    <div class="form-group col-md-12">
                        <textarea class="form-control" name="" id="intro" cols="20" rows="7" placeholder="Introducción al blog"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control col-md-12" id="titulo" placeholder="Titulo" required>
                        <input type="hidden" id="imagen_nombre">
                    </div>
                </div>
                <div class="  form-group col-md-3 text-center" id="drop" >
                    <div class="dropzone dropzone-file-area" id="my-dropzone" style="width: 100%; height: 250px; border-width: 4px; border-color: rgb(54, 198, 211);">
                        <div class="fallback text-center">
                            <input name="file" type="file" id="file_" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <textarea class="form-control" id="summary-ckeditor"></textarea>
            </div>
            <br>
            <hr>
            <div class="form-group-row text-center">
                <input id="submit" type="button" value="Registrar entrada" class="btn-add-new">
            </div>
        </form>

    </div>
</div>
@endsection

@section('script_section')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <script>
        // Codigo js para subir imagenes /DropZone/
        Dropzone.options.myDropzone = {

            url: "{{ route('imagenes.up') }}",
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
            acceptedFiles: "image/*",
            sending: function(file, xhr, formData) {
                formData.append("id", 1);
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
                   entradaBlog();

                });
            }
        };

        function aumentar() {
            var a=1;
            console.log(a);
            document.execCommand( 'fontSize',false,a);
            a++;
        }
        function tamanoLetra() {
            var s = $('#fonts option:selected').val();
            console.log(s)
            console.log(document.execCommand( 'fontSize',false,s))
            document.execCommand( 'fontSize',false,s);
        }
        function entradaBlog() {
            var intro = $('#intro').val();
            var imagen = $('#imagen_nombre').val();
            var titulo = $('#titulo').val();
            var texto = $('#summary-ckeditor').html();
            var route = '{{route('crear.entrada')}}'

            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'intro': intro,'titulo':titulo,'texto':texto,'imagen':imagen},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    swal(
                        'Cambios guardados',
                        'Alumno correctamente modificado',
                        'success'
                    )
                    window.location.reload();

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection

