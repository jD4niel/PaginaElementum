@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div id="programming-schedule" class="row col-sm-12 text-center" style="border: 2px solid #d2d2d2; border-radius: 10px;padding: 15px 15px 40px 15px;">
            <div class="row" style="width: 80%; margin:auto">
                <h3 class="h3">Rango</h3>
                <hr>
                <div class="input-group date" style="margin:auto;">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input id="text_init_date" type="text" class="form-control fontsize20">
                            <span class="input-group-btn">
                            <button id="btn_init" class="btn btn-primary" type="button">
                                <i class="fas fa-calendar-check"></i>&nbsp;
                                Inicio
                            </button>
                            </span>
                        </div>
                        <input type="hidden" id="init_range" style="display: none;">
                    </div>
                    <div class="col-md-2"><h3>-</h3></div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button id="btn_end" class="btn btn-primary" type="button">
                                <i class="fas fa-calendar-check"></i>&nbsp;
                                Final
                            </button>
                            </span>
                            <input id="text_end_date" type="text" class="form-control fontsize20">
                        </div>
                        <input type="hidden" id="end_range" style="display: none;">
                    </div>
                </div>
                <br>
                <button class="btn btn-success" onclick="range()">Generar rango de fechas</button>
            </div>
            <div class="row">
                <div id="months">

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMonth" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idMonth">
                    <div class="form-group text-right">
                        <label class="form-check-label" for="view_">Visualizar:</label>
                        <input id="view_" class="form-check-input" type="checkbox">
                    </div>
                    <textarea class="form-control" id="summary-ckeditor"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="dataMonth()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script_section')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="{{asset('js/dateformat.js')}}"></script>
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
    <script>
        $(document).ready(function() {
            //Inicializar el datepicker
            $('#btn_init').datepicker({
                minViewMode: 1,
                format: 'mm/dd/yyyy',
                autoclose:true,
                language: 'es'
            })
                .on('changeDate', function(ev){
                    $('#btn_init').datepicker('hide');
                    $('#init_range').val(ev.date.format("mm/dd/yyyy"));
                    $('#text_init_date').val(ev.date.format("mmmm, yyyy"));
                });
            $('#btn_end').datepicker({
                minViewMode: 1,
                format: 'mm/dd/yyyy',
                autoclose:true,
                language: 'es'
            })
                .on('changeDate', function(ev){
                    $('#btn_end').datepicker('hide');
                    $('#end_range').val(ev.date.format("mm/dd/yyyy"));
                    $('#text_end_date').val(ev.date.format("mmmm, yyyy"));
                });
        });
        function range() {
            // Se declara la variable meses que contiene una lista con los nombres de cada mes
            var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            // Se obtienen las fechas de los input y se convierten a tipo Date
            var date_in = new Date($("#init_range").val());
            var date_out = new Date($("#end_range").val());
            var rango = [];
            var rango_meses = [];
            var d = date_in;
            var id_mes = 1;
            var anio = '';
            // Se recorre el rango de inicio al final donde se guardan las posiciones de los meses
            while (d <= date_out) {
                rango.push(new Date(d));
                rango_meses.push(new Date(d).getMonth());
                d.setMonth(d.getMonth() + 1)
            }
            // Se guarda en rango_meses el nombre de los meses a partir de rango
            $("#months").html('');
            if(rango.length <= 12){
                rango.forEach(function (date) {
                    if (hasDuplicates(rango_meses)){anio = date.format("yyyy")}
                    $("#months").append('' +
                        '<div class="col-md-6">' +
                        '   <button type="button" style="margin: 10px;" class="btn btn-info btn-lg" data-id="'+date.getMonth()+'" data-title="'+date.format("mmmm")+' '+anio+'" data-toggle="modal" data-target="#modalMonth">'+date.format("mmmm")+' '+anio+'</button>' +
                        '</div>' +
                        '');
                    id_mes++;
                })
            }else{
                swal ( "No puedes elegir un rango de fecha mayor a 1 año" ,  "" ,  "error" );
            }
        }
        //Si hay elementos duplicados
        function hasDuplicates(array) {
            return (new Set(array)).size !== array.length;
        }
        function dataMonth() {
            var title = $('.modal-title').text();
            var id = $('#idMonth').val();
            var text = CKEDITOR.instances["summary-ckeditor"].getData();
            var view_chk = 0;
            if ($('#view_').is(":checked")){view_chk = 1}
            

            alert(view_chk);

            //Enviar meses al controlador
             swal({
                title: "¿Guardar cambios?",
                text: "Los cambios se actualizarán en el inicio de Elementario",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                   var url = window.location + '/mes/';
                   var data = {id_m:id,title:title,text:text,view_chk:view_chk} 
                   console.log(data);
                   // fetch ajax JavaScript
                   fetch(url, {
                      method: 'POST', // or 'PUT'
                      body: JSON.stringify(data), // data can be `string` or {object}!
                      headers:{
                        'Content-Type': 'application/json',
                        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                      }
                      }).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => console.log('Success:', response));

                }
            });
        }
        $('#modalMonth').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget); 
            var modal   = $(this);
            var title = button.data('title');
            var id = button.data('id');
            modal.find('.modal-title').text(title);
            modal.find('#idMonth').val(id);
        });
    </script>
@endsection

