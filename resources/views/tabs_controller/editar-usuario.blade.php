@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <form action="{{route('edit.user',$usuario->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="row text-left" style="border: 10px solid rgba(97,97,97,0.68);padding: 50px 50px 70px 50px;">
                <div class="form-group text-center">
                    <h1>EDITAR INTEGRANTE </h1>
                </div>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h4><b>Error al intentar guardar los datos</b></h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="form-control-label col-md-2" for="nombre">Nombre:</label>
                        <div class="form-group col-md-10">
                            <input id="id_usuario" type="hidden" class="form-control" value="{{ $usuario->id }}">
                            <input id="nombre" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-md-2" for="apa">Apellidos:</label>
                        <div class="form-group col-md-5">
                            <input id="apa" type="text" class="form-control" placeholder="Apellido paterno" name="last_name" value="{{ $usuario->last_name }}" required>
                        </div>

                        <div class="form-group col-md-5">
                            <input id="apm" class="form-control" type="text" placeholder="Apellido materno" name="second_last_name" value="{{ $usuario->second_last_name }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-control-label col-md-2" for="nombre">Puesto:</label>
                        <div class="form-group col-md-5">
                            <input id="puesto" type="text" class="form-control" name="puesto" value="{{ $usuario->puesto }}" required>
                        </div>
                        <label for="rol_type" class="form-control-label col-md-1" name="rol">Rol: </label>
                        <div class="form-group col-md-4">
                            <select name="role_id" id="role_type" class="form-control">
                                <option value="1">Escritor</option>
                                <option value="2">Editor</option>
                                <option value="3">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-md-2" for="apa">Email / usuario:</label>
                        <div class="form-group col-md-10">
                            <input id="email" type="text" class="form-control" placeholder="email" name="email" value="{{ $usuario->email }}" required>
                        </div>
                    </div>

                    <div id="pass-group" class="form-group" >
                        <label for="password" class="form-control-label col-md-2">Contraseña:</label>
                        <div class="form-group col-md-5">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Contraseña" oninput="checkPassword()" pattern=".{5,10}" title="La contraseña debe de ser de 5 a 10 caracteres">
                        </div>
                        <div class="form-group col-md-5">
                            <input id="password_confirm" class="form-control" type="password" placeholder="Confirmar contraseña" oninput="checkPassword()">
                        </div>
                        <div class="col-md-12 text-right">
                            **Si no escribe ninguna contraseña se conservará la anterior <br>
                        </div>
                    </div>
                    <div class="col-md-2">&nbsp;</div>
                     <div id="pass_validate" class="col-md-10 text-center" style="color: #CA2C2FFF; display: none;">Las contraseñas no coinciden

                        <div id="pass_validate_char" style="color: #CA2C2FFF; display: none;width: 100%;">La contraseña debe de tener más de 5 caracteres</div>
                    </div>
                      <div class="form-group">
                            <hr>
                            &nbsp;
                            <hr class="hr">
                            <label class="form-control-label col-md-3 checkbox-label" for="is_blog_writer">Es escritor de blog:</label>
                            <div class="form-group col-md-3">
                                <input id="is_blog_writer" type="checkbox" name="is_blog_writer" class="form-control checkbox-style"
                                @if($usuario->is_blog_writer == 1)
                                    checked
                                @endif
                                >
                            </div>
                            <label id="label_show_us"  class="form-control-label col-md-3 checkbox-label" for="show_in_us_tab">Mostrar en pestaña <i>nosotros:</i></label>
                            <div class="form-group col-md-3">
                                <input id="show_in_us_tab" type="checkbox" name="show_in_us_tab" class="form-control checkbox-style"
                                @if($usuario->show_in_us_tab == 1)
                                    checked
                                @endif
                                >
                            </div>
                        </div>
                  <div style="margin-top:45px;">&nbsp;</div>


                </div>
                <div class="row col-md-3 text-center">
                    <button id="addbtn" onclick="triggerFile()" type="button"  class="add-img">CAMBIAR IMAGEN</button>

                    <input type="file" onchange="readURL(this)" id="fileUp" name="file" style="display: none;">
                    <div class="col-md-12">
                    <img id="preview-img" src="{{ URL::to('/') }}/images/fotos_usuarios/{{ $usuario->imagen }}" alt="" style="width: 200px;
                    @if(!isset($usuario->imagen))
                        display: none;
                    @endif
                    ">

                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <label class="form-control-label col-md-2" for="semblanza">Semblanza:</label>
                    <div class="form-group text-center">
                        <div class="form-group col-md-12 text-center">
                            <textarea class="form-control" name="description" id="summary-ckeditor">{!! $usuario->text !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button id="save-book" type="button" class="btn-hover color-4" onclick="triggerSubmit('usuario')">Guardar usuario</button>
                    <input id="submit_btn" type="submit" style="display: none;">
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script_section')
    <script>

        function checkPassword(){
            var pass = $('#password').val();
            var pass_confirm = $('#password_confirm').val();
            if(pass.length < 5){
                $('#save_user').attr("disabled", true);
                $('#pass_validate_char').show();
                $('#password').addClass('error');
                $('#password_confirm').addClass('error');
            }else{
                $('#save_user').attr("disabled", false);
                $('#pass_validate_char').hide();
                $('#password').removeClass('error');
                $('#password_confirm').removeClass('error');
            }
            if (pass != pass_confirm) {
                $('#save_user').attr("disabled", true);
                $('#pass_validate').show();
                $('#password').addClass('error');
                $('#password_confirm').addClass('error');
            }else if(pass == pass_confirm){
                $('#save_user').attr("disabled", false);
                $('#pass_validate').hide();
                $('#password').removeClass('error');
                $('#password_confirm').removeClass('error');
            }
        }
        function triggerSubmit(text){
            var name = $('#nombre').val()
            var apa = $('#apa').val();
            var puesto = $('#puesto').val();
            var email = $('#email').val();
            console.log(name.length)
            if(name.length>0 && apa.length>0 && puesto.length>0 && email.length>0){
                swal({
                        title: "¿Editar "+text+"?",
                        text: "Los datos serán aplicados en toda la página",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if(willDelete) {
                            swal("El "+text+" fue editado correctamente", " ",{
                                    icon: "success"
                                }).then((value) => {
                                $('#submit_btn').click();
                            });
                        }
                    });
                    }else{
                        swal({
                        title: "Debes de llenar todos los campos requeridos",
                        text: "(Nombre, apellido paterno, email y/o puesto)",
                        icon: "warning",
                        dangerMode: true,
                        })
                    }
        }
    </script>
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
            var descripcion = CKEDITOR.instances[my_editor].getData();
            var semblanza = CKEDITOR.instances[my_editor2].getData();
            var id = $("#id_usuario").val();
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
                swal ( "El usuario debe de tener una semblanza obligatoriamente" ,  "" ,  "error" );//inverso
            }else if(semblanza==""){
                swal ( "El usuario debe de tener una corta descripción" ,  "" ,  "error" );
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

                myFormData.append('des', descripcion);
                myFormData.append('sem', semblanza);


                var url = window.location
                swal({
                    title: "¿Editar usuario?",
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
                                swal("El usuario fue editado correctamente", " ",{
                                    icon: "success"
                                }).then((value) => {
                                // window.location.reload();
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

