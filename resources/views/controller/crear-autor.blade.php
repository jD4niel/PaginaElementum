@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <form autocomplete="off" action="{{route('save.autor')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="row text-left" style="border: 10px solid rgba(97,97,97,0.68);padding: 50px 50px 70px 50px;">
                <div class="form-group text-center">
                    <h1 id="title_form">AGREGAR NUEVO AUTOR </h1>
                    <div class="select-type">
                        <label for="select_">Tipo: </label>
                        <select name="select_type" onchange="typeUser()" id="select_">
                            <option value="1" selected>Autor</option>
                            <option value="2">Elementum</option>
                        </select>
                    </div>
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
                            <input id="nombre" type="text" name="name" class="form-control" placeholder="Nombre" oninput="fieldChange('nombre','save_user')"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-md-2" for="apa">Apellidos:</label>
                        <div class="form-group col-md-5">
                            <input id="apa" type="text" class="form-control" name="last_name" placeholder="Apellido paterno" oninput="fieldChange('apa','save_user')" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input id="apm" class="form-control" type="text" name="second_last_name" placeholder="Apellido materno">
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="puesto_container" style="display: none;">
                            <label for="" class="form-control-label col-md-2">Puesto: </label>
                            <div class="form-group col-md-5">
                                <input id="puesto" type="text" name="puesto" class="form-control" placeholder="Ej. Diseñador gráfico" oninput="fieldChange('puesto','save_user')" required>
                            </div>
                        </div>
                        <div id="rol_container" style="display: none;">
                            <label for="rol_type" class="form-control-label col-md-1" name="rol">Rol: </label>
                            <div class="form-group col-md-4">
                                <select name="role_id" id="role_type" class="form-control">
                                    <option value="4">Escritor</option>
                                    <option value="3">Editor</option>
                                    <option value="2">Administrador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="user_data_login" class="form-group" style="display: none;">
                        <label class="form-control-label col-md-2" for="mail">Cuenta:</label>
                        <div class="form-group col-md-10">
                            <input id="mail" type="text" class="form-control" name="email" placeholder="Nombre de usuario o email" oninput="fieldChange('mail','save_user')" required>
                        </div>

                    </div>
                    <div id="pass-group" class="form-group" style="display: none;">
                        <label for="password" class="form-control-label col-md-2">Contraseña:</label>
                        <div class="form-group col-md-5">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Contraseña" oninput="checkPassword()" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input id="password_confirm" class="form-control" type="password" placeholder="Confirmar contraseña" oninput="checkPassword()" required>
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
                            <input id="is_blog_writer" type="checkbox" name="is_blog_writer" class="form-control checkbox-style">
                        </div>
                        <label id="label_show_us"  class="form-control-label col-md-3 checkbox-label" for="show_in_us_tab">Mostrar en la página</label>
                        <div class="form-group col-md-3">
                            <input id="show_in_us_tab" type="checkbox" name="show_in_us_tab" class="form-control checkbox-style">
                        </div>
                    </div>
                    <div id="social_media_links" class="form-group">
                        <div class="col-md-12">
                        <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" value="" name="face" id="face">
                            <label class="form-check-label" for="face" style="margin: -5px 10px 0 5px;">
                                Facebook
                            </label>
                            <input class="form-check-input" type="checkbox" value="" name="twitter" id="twitter">
                            <label class="form-check-label" for="twitter" style="margin: -5px 10px 0 5px;">
                                Twitter
                            </label>
                            <input class="form-check-input" type="checkbox" value="" name="insta" id="insta">
                            <label class="form-check-label" for="insta" style="margin: -5px 10px 0 5px;">
                                Instagram
                            </label>
                        </div>
                        </div>
                    </div>

                    <div style="margin-top:45px;">&nbsp;</div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="face_in" type="text" class="form-control" placeholder="Facebook (URL completa)" name="face_txt" value="not_" style="display: none;">
                            </div>
                            <div class="form-group">
                                <input id="twitter_in" type="text" class="form-control" placeholder="Twitter (nombre de usuario @elementum)" name="twitter_txt" value="not_" style="display: none;">
                            </div>
                            <div class="form-group">
                                <input id="insta_in" type="text" class="form-control" placeholder="Instagram Twitter (nombre de usuario @elementum)" name="insta_txt" value="not_" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-3 text-center">
                    <button id="addbtn" onclick="triggerFile()" type="button"  class="add-img">AGREGAR IMAGEN</button>

                    <input type="file" onchange="readURL(this)" id="fileUp" name="file" style="display: none;">
                    <div class="col-md-12">
                    <img id="preview-img" src="" alt="" style="display: none;">
                    </div>
                    <div id="temp" class="img-temp col-md-12">
                        <div>500 x 500</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="form-control-label col-md-2" for="semblanza">Breve descripción:</label>
                        <div class="form-group text-center">
                            <div class="form-group col-md-12 text-center">
                                <textarea class="form-control" name="description" id="summary-ckeditor2" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="semblanza_id" class="col-md-12">
                    <hr>
                    <label class="form-control-label col-md-2" for="semblanza">Semblanza:</label>
                    <div class="form-group text-center">
                        <div class="form-group col-md-12 text-center">
                            <textarea class="form-control" name="long_description" id="summary-ckeditor"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button id="save_book" type="button" class="btn-hover color-10" onclick="triggerSubmit('autor')">Guardar autor</button>
                    <button id="save_user" type="button" class="btn-hover color-1" style="display: none;" onclick="triggerSubmit('usuario')">Guardar usuario</button>
                    <input id="submit_btn" type="submit" style="display: none;">
                </div>

            </div>
        </form>
    </div>

@endsection

@section('script_section')
    <script src="{{ asset('js/form_validations.js') }}"></script>
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
            if(validateAll(text)){
                swal({
                        title: "¿Agregar nuevo "+text+"?",
                        text: "Los datos serán aplicados en toda la página",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if(willDelete) {
                            swal("Enviando datos al servidor...", " ",{
                                    icon: "info",
                                    button:false
                                })
                                $('#submit_btn').click();
                        }
                    });
            }else{
                fieldChange('nombre','save-button');
                fieldChange('apa','save-button');
                if(text == 'usuario'){

                    swal('Campos vacios', 'Debes de llenar todos los campos requeridos \n (nombre, apellido paterno, email y/o puesto)','error')
                    fieldChange('puesto','save-button');
                    fieldChange('mail','save-button');
                    fieldChange('password','save-button');
                }else{
                        swal('Campos vacios', 'Debe de llenar todos los campos requeridos\n(nombre, apellido paterno y breve semblanza)','error')
                }

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
            $('#face').change(function() {
                if(this.checked) {
                    $("#face_in").val("");
                   $("#face_in").show();
                }else{
                   $("#face_in").hide();
                   $("#face_in").val("not_");
                }
            });
            $('#twitter').change(function() {
                if(this.checked) {
                    $("#twitter_in").val("");
                   $("#twitter_in").show();
                }else{
                   $("#twitter_in").hide();
                   $("#twitter_in").val("not_");
                }
            });
            $('#insta').change(function() {
                if(this.checked) {
                    $("#insta_in").val("");
                   $("#insta_in").show();
                }else{
                   $("#insta_in").hide();
                   $("#insta_in").val("not_");
                }
            });
            // trigger new user
            if(String(window.location).includes('integrante-elementum')){
                $('#select_').val(2);
                typeUser()
                    $('#puesto').prop('required',true);
                    $('#mail').prop('required',true);
                    $('#password').prop('required',true);
                    $('#password_confirm').prop('required',true);
                }else{
                    $('#puesto').removeAttr('required');
                    $('#mail').removeAttr('required');
                    $('#password').removeAttr('required');
                    $('#password_confirm').removeAttr('required');
                }
        });
        //enviar foto al servidor NO SE UTULIZA
        function enviarFoto(num) {
            var nombre = $("#nombre").val();
            var apa  = $("#apa").val();
            var apm = $("#apm").val();
            var face_in = $("#face_in").val();
            var twitter_in = $("#twitter_in").val();
            var insta_in = $("#insta_in").val();
            var my_editor = "summary-ckeditor";
            var my_editor2 = "summary-ckeditor2";
            var descripcion = CKEDITOR.instances[my_editor].getData();
            var semblanza = CKEDITOR.instances[my_editor2].getData();
            var email = $('#mail').val();
            var pass = $('#password').val();
            var puesto = $('#puesto').val();
            var rol = $('#role_type').val();
            var is_blog_writter = 0;
            if ($('#is_blog_writer').is(":checked")){
                is_blog_writer = 1;
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
                myFormData.append('nombre', nombre);
                myFormData.append('apa', apa);
                myFormData.append('apm', apm);
                myFormData.append('face_in', face_in);
                myFormData.append('twitter_in', twitter_in);
                myFormData.append('insta_in', insta_in);
                myFormData.append('des', descripcion);
                myFormData.append('sem', semblanza);
                myFormData.append('blog_writer', is_blog_writer);


                //var url = '';
                var swal_text = 'autor';
                if(num == 2){ 
                    //url = ''; 
                    swal_text = 'usuario'
                    myFormData.append('puesto', puesto);
                    myFormData.append('email', email);
                    myFormData.append('password', pass);
                    myFormData.append('role_id', rol);

                }
                swal({
                    title: "¿Agregar "+swal_text+"?",
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
                                swal("El "+swal_text+" fue agregado correctamente", " ",{
                                        icon: "success"
                                    }).then((value) => {
                                     window.location.reload();
                                });
                                /*window.location.reload();*/
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus + ': ' + errorThrown);
                                swal("Error al subir autor", "Verifique los campos",{
                                        icon: "warning"
                                    }).then((value) => {
                                     //window.location.reload();
                                 });
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
        }
        function typeUser(){
            console.log("hola")
        }
        function typeUser() {
            var sel_val = $('#select_').val();
            if(sel_val == 2){
                $('#title_form').html('NUEVO INTEGRANTE EN ELEMENTUM')
                $('#semblanza_id').hide();
                $('#social_media_links').hide();
                $('#puesto_container').show();
                $('#puesto').prop('required',true);
                $('#mail').prop('required',true);
                $('#password').prop('required',true);
                $('#password_confirm').prop('required',true);
                $('#rol_container').show();
                $('#save_user').show();
                $('#save_book').hide();
                $('#user_data_login').show();
                $('#pass-group').show();
            }else{
                $('#title_form').html('AGREGAR NUEVO AUTOR')
                $('#semblanza_id').show();
                $('#social_media_links').show();
                $('#puesto_container').hide();
                $('#puesto').removeAttr('required');
                $('#mail').removeAttr('required');
                $('#password').removeAttr('required');
                $('#password_confirm').removeAttr('required');
                $('#save_user').hide();
                $('#save_book').show();
                $('#user_data_login').hide();
                $('#rol_container').hide();
                $('#pass-group').hide();
            }
        }
    </script>
@endsection

