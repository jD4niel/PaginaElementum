@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div id="programming-schedule" class="row col-sm-12 text-center" style="border: 2px solid #d2d2d2; border-radius: 10px;padding: 15px 15px 40px 15px;">
            <button class="btn_save_changes" onclick="saveMonths()">Guardar cambios</button>
            <div class="row" style="width: 80%; margin:auto">
                <div class="form-group text-center col-md-12">
                    <input id="section_title" class="form-control text-center" type="text" placeholder="Titulo de la sección" value="{{ $title[0]->name }}" style="font-size: 25px;margin:auto;width: 80%;">
                </div>
                <div style="height: 50px;"></div>
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
                    @foreach($range as $item)
                        @if($item->year != Null)
                         <div class="col-md-6"> 
                           <button id="{{$item->id}}_btn" type="button" style="margin: 10px;" class="btn btn-danger btn-lg" data-id="{{ $item->month }}" data-title="{{ $item->year }}" data-toggle="modal" data-target="#modalMonth">{{ $item->year }}</button> 
                        </div>
                        <textarea id="{{$item->id}}_month_text" style="display: none">
                            {!! $item-> text !!}
                        </textarea>
                        @endif()
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
    <!-- Modal programming section -->
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
                    <textarea class="form-control" id="summary-ckeditor"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="dataMonth()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>




    <div class="container">
        <h2>Secciones</h2>
        <!-- <button class="btn_save_changes" onclick="saveSections()">Guardar cambios</button> -->
        <div id="sections_" class="row text-center" style="margin: 100px 0;">
            <input id="id-input-sec" type="hidden" value="{{ $section_obj[count($section_obj)-1]->id }}">    
            @foreach($section_obj as $item)
            <div class="col-md-4">
                <a href="{{route('elementario.individual.section',$item->id) }}" target="_blank"><div class="edit_section"><i class="fas fa-edit"></i></div></a>
                <div id="section_element{{$item->id}}" onmouseenter="btn_appear('{{ $item->id }}')" onmouseleave="btn_disapear('{{ $item->id }}')" class="section_element col-md-12">
                    <div class="el-cont">
                        <img id="img-element_{{ $item->id }}" src="{{asset('images/secciones/headers')}}/{{$item->img}}" alt="" class="img-element"/>
                    </div>
                    <div class="btn-cont">
                        <input id="text_section{{ $item->id }}" class="btn_element" type="text" value="{{ $item->name }}">
                        <button id="btn-change-img{{ $item->id }}" class="change-img-sections" onclick="triggerFile('{{ $item->id }}')">Cambiar imagen</button>
                        <input type="file" onchange="readURL(this, '{{$item->id}}')" id="fileUp{{ $item->id }}" style="display: none;">
                    </div>
                </div>
            </div>
            @endforeach()
           
        </div>
        <div class="add-more">
            <button class="add-more-btn" onclick="addMoreSection()">Agregar más</button>
            <button id="save-sections" class="add-more-btn" onclick="saveSections()" style="display: none;">Guardar</button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
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
        var month_obj = []
        var section_obj = []
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
            // Se declara la variable meses que contiene una lista con los nombresaveMonthss de cada mes
            var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            // Se obtienen las fechas de los input y se convierten a tipo Date
            var date_in = new Date($("#init_range").val());
            var date_out = new Date($("#end_range").val());
            var rango = [];
            var rango_meses = [];
            var d = date_in;
            var id_mes = 1;
            var anio = '';

            $('#section_title').val('Programación '+ date_in.format('mmmm') + ' - ' + date_out.format('mmmm'))
            // Se recorre el rango de inicio al final donde se guardan las posiciones de los meses
            while (d <= date_out) {
                rango.push(new Date(d));
                rango_meses.push(new Date(d).getYear());
                d.setMonth(d.getMonth() + 1)
            }
            // Se guarda en rango_meses el nombre de los meses a partir de rango
            $("#months").html('');
            if(rango.length <= 12){
                rango.forEach(function (date) {
                    if (!AllTheSame(rango_meses)){anio = date.format("yyyy");}
                    $("#months").append('' +
                        '<div class="col-md-6">' +
                        '   <button id="'+parseInt(parseInt(date.getMonth())+1)+'_btn" type="button" style="margin: 10px;" class="btn btn-danger btn-lg" data-id="'+date.getMonth()+'" data-title="'+date.format("mmmm")+' '+anio+'" data-toggle="modal" data-target="#modalMonth">'+date.format("mmmm")+' '+anio+'</button>' +
                        '</div>' +
                        '<textarea id="'+parseInt(parseInt(date.getMonth())+1)+'_month_text" style="display: none"></textarea>');
                    id_mes++;
                })
            }else{
                swal ( "No puedes elegir un rango de fecha mayor a 1 año" ,  "" ,  "error" );
            }
        }
        //Si hay elementos duplicados
        function AllTheSame(array) {
            var first = array[0];
            return array.every(function(element) {
                return element === first;
            });
        }
        function dataMonth() {
            var title = $('.modal-title').text();
            var id = $('#idMonth').val();
            
            var text = CKEDITOR.instances["summary-ckeditor"].getData();
            var view_chk = 0;
            
            $('#'+parseInt(parseInt(id)+1)+'_month_text').val(text);

            month_obj.push(parseInt(id))
        }
        function saveMonths(){
            var section_title = $('#section_title').val()
            var json_month = {'meses':{},'nombres':{}}
            var meses = month_obj.sort((a, b) => a - b)
            if (section_title == ''){section_title = 'Programación'}

            meses.forEach(function(item){
                json_month.meses[item] =  $('#'+parseInt(parseInt(item)+1)+'_month_text').val();
                json_month.nombres[item] =  $('#'+parseInt(parseInt(item)+1)+'_btn').data('title');
            });

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
                   //var data = {id_m:id,title:title,text:text,view_chk:view_chk,section_title:section_title} 
                   // fetch ajax JavaScript
                   fetch(url, {
                      method: 'POST', // or 'PUT'
                      body: JSON.stringify([json_month,section_title]), // data can be `string` or {object}!
                      headers:{
                        'Content-Type': 'application/json',
                        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                      }
                      }).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => {
                         swal("Elementos agregados correctamente", " ",{
                                        icon: "success"
                            });
                    });

                }
            });
        }
        $('#modalMonth').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget); 
            var modal   = $(this);
            var title = button.data('title');
            var id = button.data('id');
            var texto = $('#'+parseInt(parseInt(id)+1)+'_month_text').val();
            button.removeClass('btn-danger');
            button.addClass('btn-success');
            modal.find('.modal-title').text(title);
            modal.find('#idMonth').val(id);
            CKEDITOR.instances["summary-ckeditor"].setData(texto);

        });

        //Funciones de la seccion 'Secciones'

        function btn_appear(e){$('#btn-change-img'+e).show();}
        function btn_disapear(e){$('#btn-change-img'+e).hide();}
        // Ejecutar el input file para subir imagenes
        function triggerFile(id) {$('#fileUp'+id).trigger('click');}
        // Lee el input con la imagen
        function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Si la imagen carga haz esto:
                    $("#img-element_"+id).attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        // Agregar mas secciones
        function addMoreSection(){
            var id = $("#id-input-sec").val();
            id = parseInt(id) + 1;
            $("#sections_").append(''+
                '<div class="col-md-4">'+    
                    '<div id="section_element'+id+'" onmouseenter="btn_appear('+id+')" onmouseleave="btn_disapear('+id+')" class="section_element col-md-12">'+
                        '<div class="el-cont">'+
                            '<img id="img-element_'+id+'" src="" alt="" class="img-element"/>'+
                        '</div>'+
                        '<div class="btn-cont">'+
                            '<input id="text_section'+id+'" class="btn_element" type="text"">'+
                            '<button id="btn-change-img'+id+'" class="change-img-sections" onclick="triggerFile('+id+')">Cambiar imagen</button>'+
                            '<input type="file" onchange="readURL(this, '+id+')" id="fileUp'+id+'" style="display: none;">'+
                        '</div>'+
                    '</div>'+
                '</div>'+'');
            $("#id-input-sec").val(id);
            $(this).hide();
            $('#save-sections').show();
            $
        }
        // Guarda las secciones
        function saveSections() {
            var myFormData = new FormData();
            var last_id = $('#id-input-sec').val();
            var nombre = $('#text_section'+last_id).val();
            alert(nombre)
            var foto = $("#fileUp"+last_id);
            myFormData.append('file', foto[0]['files'][0]);
            myFormData.append('nombre', nombre);
            //Enviar meses al controlador
            swal({
                title: "¿Guardar secciones?",
                text: "Los cambios se actualizarán en el inicio de Elementario",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                   var url = window.location + '/seccion/';
                   fetch(url, {
                      method: 'POST', 
                      body: myFormData, 
                      mode: 'cors',
                      headers:{
                        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                      }
                      }).then(res => res.json())
                    .then(response => {
                          console.log(response);
                            swal("El autor fue agregado correctamente", " ",{
                                    icon: "success"
                                }).then((value) => {
                                 //window.location.reload();
                                 console.log(response+"hosjanjkasdn")
                            });
                    });

                }
            });
        }  
    </script>
@endsection

