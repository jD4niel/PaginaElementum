@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <form action="" id="book_form" class="row text-left" style="border: 10px solid rgba(97,97,97,0.68);padding: 50px 50px 70px 50px;">
            <div class="form-group text-center">
                <h1>AGREGAR NUEVO LIBRO</h1>
            </div>
            <hr>
            <div class="col-md-9">
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="nombre">Nombre:</label>
                    <div class="form-group col-md-10">
                        <input id="nombre" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="subtitulo">Subtitulo:</label>
                    <div class="form-group col-md-10">
                        <input id="subtitulo" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="tamano">Tamaño:</label>
                    <div class="form-group col-md-10">
                        <input id="tamano" type="text" class="form-control" placeholder="Ej. Encuadernación rústica, 24 páginas, 18 x 21 cm.">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="fecha">Fecha:</label>
                    <div class="form-group col-md-10">
                        <div class="input-group date">
                            <input type="text" class="form-control" id="date_book">
                            <div class="input-group-addon">
                                <span class="fas fa-calendar-week"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="isbn">ISBN:</label>
                    <div class="form-group col-md-4">
                        <input id="isbn" type="text" class="form-control" placeholder="Ej. 978-607-9298-16-6">
                    </div>

                    <label class="form-control-label col-md-2" for="collection">Colección:</label>
                    <div class="form-group col-md-4">
                        <select name="" id="collection" class="form-control">
                            <option value="0" disabled selected>- Seleccione una colección -</option>
                            @foreach($coleccion as $a)
                                <option value="{{$a->id}}">{{$a->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="precio">Precio:</label>
                            <div class="form-group col-md-4">
                                <input id="precio" type="number" class="form-control" placeholder="$xx.xx">
                            </div>
                            <label class="form-control-label col-md-2" for="url">URL:</label>
                            <div class="form-group col-md-4">
                                <input id="url" type="text" class="form-control" placeholder="URL para la compra del libro">
                            </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-md-2" for="autor">Autor:</label>
                    <div class="form-group col-md-4">
                        <select name="" id="autor" class="form-control">
                            <option class="" value="" disabled selected>- Seleccione un autor -</option>
                            @foreach($autor as $a)
                                <option value="{{$a->id}}">{{$a->nombre}}{{$a->apellido_p}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-control-label col-md-2" for="rol">Rol:</label>
                    <div class="form-group col-md-4">
                        <input id="rol" type="text" class="form-control" placeholder="Ej. Autor">
                    </div>
                </div>
            </div>
            <div class="row col-md-3 text-center">
                <button id="addbtn" type="button" onclick="triggerFile()"  class="add-img">AGREGAR IMAGEN</button>

                <input type="file" onchange="readURL(this)" id="fileUp" style="display: none;">
                <div class="col-md-12">
                <img id="preview-img" src="" alt="" style="display: none;">
                </div>
                <div id="temp" class="img-temp col-md-12">
                    <div>585 x 830</div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <label class="form-control-label col-md-2" for="semblanza">Semblanza:</label>
                <div class="form-group text-center">
                    <div class="form-group col-md-12 text-center">
                        <textarea class="form-control" id="summary-ckeditor"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12 text-center">
                <button id="save-book" class="btn-hover color-2" type="button" onclick="enviarFoto()"><i class="far fa-bookmark"></i>&nbsp;Guardar libro</button>
            </div>
        </form>
    </div>

@endsection

@section('script_section')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="{{asset('js/dateformat.js')}}"></script>
    <script>
        $("#book").on("submit",function(event){event.preventDefault()})
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
        //Llama al formato de fecha
        $(document).ready(function() {
            $('#date_book').datepicker({
                minViewMode: 1,
                format: 'yyyy-mm-dd',
                autoclose:true,
                language: 'es'
            })            
        });

        //enviar foto al servidor
        function enviarFoto() {
            var nombre = $("#nombre").val();
            var subtitulo = $("#subtitulo").val();
            var tamano = $("#tamano").val();
            var fecha = $("#date_book").val();
            var isbn = $("#isbn").val();
            var collection = $("#collection option:selected").val();
            var precio = $("#precio").val();
            var url = $("#url").val();
            var autor = $("#autor option:selected").val();
            var rol = $("#rol").val();
            var my_editor = "summary-ckeditor";
            var descripcion = CKEDITOR.instances[my_editor].getData();

            var myFormData = new FormData();
            var foto = $("#fileUp");

            if(nombre == ""){
                swal("Debes llenar el campo nombre", "", "error");
            }else if(fecha == ""){
                swal("Debes llenar el campo fecha", "", "error");
            }else if(precio == ""){
                swal("Debes llenar el campo precio", "", "error");
            }else if(collection == 0 || autor == 0){
                swal("Debes de seleccionar un autor/colección", "", "error");
            }else if(descripcion == ""){
                swal("El libro debe de tener una semblanza", "", "error");
            }else if($("#fileUp").get(0).files.length === 0){
                swal("Debes de seleccionar una imagen", "", "error");
            }else{


                myFormData.append('file', foto[0]['files'][0]);

                myFormData.append('nombre',nombre);
                myFormData.append('subtitulo',subtitulo);
                myFormData.append('tamano',tamano);
                myFormData.append('fecha',fecha);
                myFormData.append('isbn',isbn);
                myFormData.append('collection',collection);
                myFormData.append('precio',precio);
                myFormData.append('url',url);
                myFormData.append('autor',autor);
                myFormData.append('rol',rol);
                myFormData.append('des',descripcion);


                var url = '{{route('guardar.libro')}}';
                swal({
                    title: "¿Agregar libro?",
                    text: "Verifique que los datos esten correctamente antes de guardar los datos",
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
                                console.log(response);
                                swal("El libro fue agregado correctamente", " ",{
                                    icon: "success"
                                }).then((value) => {
                                    $("#book_form").submit();
                            });

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
            init: function () {

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
    </script>
@endsection

