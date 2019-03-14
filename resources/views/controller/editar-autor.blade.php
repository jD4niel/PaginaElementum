@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row text-left" style="border: 10px solid rgba(97,97,97,0.68);padding: 50px 50px 70px 50px;">
            <div class="form-group text-center">
                <h1>EDITAR AUTOR </h1>
            </div>
            <hr>
            <div class="col-md-9">
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="nombre">Nombre:</label>
                    <div class="form-group col-md-10">
                        <input id="id_autor" type="hidden" class="form-control" value="{{ $autor->id }}">
                        <input id="nombre" type="text" class="form-control" value="{{ $autor->nombre }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="apa">Apellidos:</label>
                    <div class="form-group col-md-5">
                        <input id="apa" type="text" class="form-control" placeholder="Apellido paterno" value="{{ $autor->apellido_p }}">
                    </div>

                    <div class="form-group col-md-5">
                        <input id="apm" class="form-control" type="text" placeholder="Apellido materno" value="{{ $autor->apellido_m }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-control-label col-md-2 text-left" for="is_blog_writter">Es escritor del blog:</label>
                    <div class="form-group col-md-5 float-left text-left left">
                        <input id="is_blog_writter" type="checkbox" class="float-left text-left">
                    </div>
                </div>
              <div style="margin-top:45px;">&nbsp;</div>


                <div style="margin-top:45px;">&nbsp;</div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md" for="face_in">Facebook: </label>
                            <input id="face_in" type="text" class="form-control" placeholder="Facebook" value="{{ $autor->facebook }}" style="">
                        </div>
                        <div class="form-group">
                            <label class="col-md" for="twitter_in">Twitter: </label>
                            <input id="twitter_in" type="text" class="form-control" placeholder="Twitter" value="{{ $autor->twitter }}" style="">
                        </div>
                        <div class="form-group">
                            <label class="col-md" for="insta_in">Instragram: </label>
                            <input id="insta_in" type="text" class="form-control" placeholder="Instagram" value="{{ $autor->instagram }}" style="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row col-md-3 text-center">
                <button id="addbtn" onclick="triggerFile()"  class="add-img">CAMBIAR IMAGEN</button>

                <input type="file" onchange="readURL(this)" id="fileUp" style="display: none;">
                <div class="col-md-12">
                <img id="preview-img" src="{{ URL::to('/') }}/images/fotos_autores/{{ $autor->imagen }}" alt="" style="width: 200px">
                </div>
                {{--<div id="temp" class="img-temp col-md-12">
                    <div>500 x 500</div>
                </div>--}}
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <br><br><br>
                    <label class="form-control-label col-md-2" for="semblanza">Breve descripción:</label>
                    <div class="form-group text-center">
                        <div class="form-group col-md-12 text-center">
                            <textarea class="form-control" id="summary-ckeditor2">{!! $autor->breve_desc !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label class="form-control-label col-md-2" for="semblanza">Semblanza:</label>
                <div class="form-group text-center">
                    <div class="form-group col-md-12 text-center">
                        <textarea class="form-control" id="summary-ckeditor">{!! $autor->semblanza !!}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button id="save-book" class="btn-hover color-9" onclick="enviarFoto()">Guardar autor</button>
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
        var ckEditorID2;
        ckEditorID2 = 'summary-ckeditor2';
        CKEDITOR.config.forcePasteAsPlainText = true;
        CKEDITOR.replace( ckEditorID2,
            {
                toolbar :
                    [
                        {
                            items : [ 'Bold','Italic','Underline','Strike' ]
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
        $(document).ready(function() {
            if ($("#face_in").val()=="not_"){
                $("#face_in").val("")
            }
            if ($("#twitter_in").val()=="not_"){
                $("#twitter_in").val("")
            }
            if ($("#insta_in").val()=="not_"){
                $("#insta_in").val("")
            }
            if({{$autor->is_blog_writer}} == 1){
                $('#is_blog_writter').prop('checked', true);
            }
        });
        //enviar foto al servidor
        function enviarFoto(){
            var nombre = $("#nombre").val();
            var apa  = $("#apa").val();
            var apm = $("#apm").val();
            var face_in = $("#face_in").val();
            var insta_in = $("#insta_in").val();
            var twitter_in = $("#twitter_in").val();
            var my_editor = "summary-ckeditor";
            var my_editor2 = "summary-ckeditor2";
            var is_blog_writer = 0;
            if ($('#is_blog_writter').is(':checked')) {
                is_blog_writer = 1;
            }
            var descripcion = CKEDITOR.instances[my_editor].getData();
            var semblanza = CKEDITOR.instances[my_editor2].getData();
            var id = $("#id_autor").val();
            if (face_in==""){
                face_in="not_";
            }
            if (twitter_in==""){
                twitter_in="not_";
            }
            if (insta_in==""){
                insta_in="not_";
            }

            if(nombre=="") {
                $("#nombre").addClass('must_');
                $("#apa").removeClass('must_');
                $("#face_in").removeClass('must_');
                $("#twitter_in").removeClass('must_');
                $("#insta_in").removeClass('must_');
                swal ( "Debes llenar todos los campos" ,  "" ,  "error" );
            }else if(apa=="") {
                $("#apa").addClass('must_');
                $("#nombre").removeClass('must_');
                $("#face_in").removeClass('must_');
                $("#twitter_in").removeClass('must_');
                $("#insta_in").removeClass('must_');
                swal ( "Debes llenar todos los campos" ,  "" ,  "error" );
            }else if(face_in=="") {
                $("#face_in").addClass('must_');
                $("#nombre").removeClass('must_');
                $("#apa").removeClass('must_');
                $("#twitter_in").removeClass('must_');
                $("#insta_in").removeClass('must_');
                swal("Debes llenar todos los campos", "", "error");
            }else if(twitter_in=="") {
                $("#twitter_in").addClass('must_');
                $("#nombre").removeClass('must_');
                $("#apa").removeClass('must_');
                $("#face_in").removeClass('must_');
                $("#insta_in").removeClass('must_');
                swal("Debes llenar todos los campos", "", "error");
            }else if(insta_in=="") {
                $("#insta_in").addClass('must_');
                $("#nombre").removeClass('must_');
                $("#apa").removeClass('must_');
                $("#face_in").removeClass('must_');
                $("#twitter_in").removeClass('must_');
                swal("Debes llenar todos los campos", "", "error");
            } else if(descripcion==""){
                swal ( "El autor debe de tener una semblanza obligatoriamente" ,  "" ,  "error" );//inverso
            }else if(semblanza==""){
                swal ( "El autor debe de tener una corta descripción" ,  "" ,  "error" );
            }
                else {
                    $("#nombre").removeClass('must_');
                    $("#apa").removeClass('must_');
                    $("#face_in").removeClass('must_');
                    $("#twitter_in").removeClass('must_');
                    $("#insta_in").removeClass('must_');

                var myFormData = new FormData();
                var foto = $("#fileUp");
                myFormData.append('file', foto[0]['files'][0]);
                myFormData.append('id', id);
                myFormData.append('nombre', nombre);
                myFormData.append('apa', apa);
                myFormData.append('apm', apm);
                myFormData.append('face_in', face_in);
                myFormData.append('twitter_in', twitter_in);
                myFormData.append('insta_in', insta_in);
                myFormData.append('is_blog_writer', is_blog_writer);

                myFormData.append('des', descripcion);
                myFormData.append('sem', semblanza);


                var url = '{{route('editar.autor')}}';
                swal({
                    title: "¿Editar autor?",
                    text: "Verifique que los datos esten correctamente antes de guardar los datos",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                    if(willDelete) {
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
                                console.log(response);
                                swal("El autor fue editado correctamente", " ",{
                                    icon: "success"
                                }).then((value) => {
                                 window.location.reload();
                            });
                                /*window.location.reload();*/
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus + ': ' + errorThrown);
                            }
                        });
                    }
                });
            }
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#preview-img").attr("src", e.target.result);
                    $('#temp').hide();
                    $("#preview-img").show();
                    $("#preview-img").css({'width':'100%','margin-top':'15px'});
                    $("#addbtn").text("CAMBIAR IMAGEN");

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

