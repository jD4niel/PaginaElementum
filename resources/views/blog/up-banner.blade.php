@extends('layouts.app')
@section('style')
    <style>
        .crop {
            height: 200px;
            border: 1px solid #ccc;
            background-color: #ccc;
            border-radius: 2%;
        }

        /* Ocultamos parte de la imagen */
        .crop img {
            position: absolute;
            top: 0px;

        }

        .file-input-wrapper {
            overflow: hidden;
            position: relative;
            cursor: pointer;
        }

        .file-input-wrapper > input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row hidden">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Banners Vigentes</h1>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive" id="tabla_banners">
                        <thead>
                            <tr>
                                <th>Asunto</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $item)
                            <tr>
                                <td>{{$item->asunto}}</td>
                                <td>{{$item->fecha_inicio}}</td>
                                <td>{{$item->fecha_final}}</td>
                                <td>
                                    <button type="button"></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Administrador banner publicitario</h1>
                </div>
                <div class="panel-body">
                    <form method="post" id="form-entrada" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Evento del Banner">
                        </div>
                        <div class="form-group">
                            <div class="file-input-wrapper">
                                <button type="button" class="btn btn-default btn-block">Click para seleccionar
                                    miniatura
                                </button>
                                <input class="form-control" id="file" name="file" type="file"
                                       placeholder="Portada/Miniatura" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <img id="blah" class="img-responsive" src="" style="width: 100%;">
                        </div>
                        <div class="form-group">
                            <select name="periodo" id="periodo" class="form-control">
                                <option value="5">5 Días</option>
                                <option value="15">15 Días</option>
                                <option value="30">30 Días</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block" type="submit">Subir Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script_section')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        var fecha_inicio;
        var fecha_final;

        jQuery( document ).ready(function( $ ) {
            $('#tabla_banners').DataTable();
        });

        $("#file").change(function () {
            readURL(this);
        });

        $('#form-entrada').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            calcularFechas(parseInt($('#periodo').val()));

            formData.append('fecha_inicio',fecha_inicio)
            formData.append('fecha_final',fecha_final)

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            Swal.fire({
                title: "¿Subir Banner?",
                type: "warning",
                text: 'Si hay un banner vigente, este será sustituido por el que subirá',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('up.banner')}}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            var url = "/entradas";
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
            });
        });

        function calcularFechas(periodo){
            inicio = new Date();
            final = new Date();
            dia = inicio.getDate();
            mes = inicio.getMonth()+1;// +1 porque los meses empiezan en 0
            anio = inicio.getFullYear();

            final.setDate(final.getDate() + periodo);

            fdia = final.getDate();
            fmes = final.getMonth()+1;// +1 porque los meses empiezan en 0
            fanio = final.getFullYear();

            fecha_inicio = anio + '-' +
                ((''+mes).length<2 ? '0' : '') + mes + '-' +
                ((''+dia).length<2 ? '0' : '') + dia;

            fecha_final = fanio + '-' +
                ((''+fmes).length<2 ? '0' : '') + fmes + '-' +
                ((''+fdia).length<2 ? '0' : '') + fdia;
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection