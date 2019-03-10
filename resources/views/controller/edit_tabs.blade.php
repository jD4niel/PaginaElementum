|@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="h1">Editar pestañas de la página</h1>
        <hr>
    </div>
    <div class="row">
        <a href="{{ route('nosotrosTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Nosotros</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $nosotros->image }}" class="img-banner-tabs">
        </div></a>
        <a href="{{ route('autoresTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Autores</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $autores->image }}" class="img-banner-tabs">
        </div></a>
        <a href="{{ route('contactoTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Contacto</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $contacto->image }}" class="img-banner-tabs">
        </div></a>
        <a href="{{ route('coleccionesTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Colecciones</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $colecciones->image }}" class="img-banner-tabs">
        </div></a>
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
                    $("#namePDF").html(input.files[0].name);
                    $("#namePDF").show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function guardarFotoPDF() {
            var myFormData = new FormData();
            var foto = $("#changeImg");
            var pdf = $("#changePdf");
            alert(foto.val().length)
            if(pdf.val().length != 0){ myFormData.append('pdf', pdf[0]['files'][0]); }else{ myFormData.append('pdf', 'nothing'); }
            if(foto.val().length != 0){ myFormData.append('file', foto[0]['files'][0]); }else{ myFormData.append('file', 'nothing'); }
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
                                console.log(response)
                                swal("PDF/Imagen agregados correctamente", " ",{
                                        icon: "success"
                                    }).then((value) => {
                                     window.location.reload();
                                });
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

    <script src="{{asset('js/edit_elements.js')}}"></script>
@endsection

