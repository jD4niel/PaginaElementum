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
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('entradas')}}" class="a-free">
                    <div class="card" style="width: 100%;  background-color: #cb304f;">
                        <div class="card-body">
                            <h1 class="card-title" style="z-index: 50;" align="right">Entradas</h1>
                            <h2 class="card-subtitle    mb-2 " style="color:#fff;" align="right">al blog</h2>
                            <i class="far fa-file-alt card-fa"></i>
                            <div class="variable-card text-right">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{route('autor-entradas')}}" class="a-free">
                    <div class="card" style="width: 100%; background-color: #a736bb;">
                        <div class="card-body">
                            <h1 class="card-title" style="z-index: 50;" align="right">Crear Entrada</h1>
                            <h2 class="card-subtitle mb-2" style="color:#fff;" align="right">blog</h2>
                            <i class="fas fa-sticky-note card-fa"></i>
                            <div class="variable-card text-right">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="padding-top: 20px">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Administrador de Portada</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" id="form-portada" enctype="multipart/form-data" class="form">
                                    <div class="form-group">
                                        <label for="entradas_recientes">Selecciona la posición de la sección entradas
                                            recientes</label>
                                        <select name="entradas_recientes" id="entradas_recientes" class="form-control">
                                            <option value="1">Posición 1</option>
                                            <option value="2">Posición 2</option>
                                            <option value="3">Posición 3</option>
                                            <option value="4">Posición 4</option>
                                            <option value="0">Oculta</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="banner">Selecciona la posición de la sección banner
                                            publicitario</label>
                                        <select name="banner" id="banner" class="form-control">
                                            <option value="1">Posición 1</option>
                                            <option value="2">Posición 2</option>
                                            <option value="3">Posición 3</option>
                                            <option value="4">Posición 4</option>
                                            <option value="0">Oculta</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="colaboradores">Selecciona la posición de la sección
                                            Colaboradores</label>
                                        <select name="colaboradores" id="colaboradores" class="form-control">
                                            <option value="1">Posición 1</option>
                                            <option value="2">Posición 2</option>
                                            <option value="3">Posición 3</option>
                                            <option value="4">Posición 4</option>
                                            <option value="0">Oculta</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="leido_elementario">Selecciona la posición de la sección Leido en
                                            Elementario</label>
                                        <select name="leido_elementario" id="leido_elementario" class="form-control">
                                            <option value="1">Posición 1</option>
                                            <option value="2">Posición 2</option>
                                            <option value="3">Posición 3</option>
                                            <option value="4">Posición 4</option>
                                            <option value="0">Oculta</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info btn-block" type="submit">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-responsive table-bordered" >
                                    <tr>
                                        <th>Sección</th>
                                        <th>Posición Actual</th>
                                    </tr>
                                    <tr>
                                        <td>Entradas Recientes</td>
                                        <td>{{$portada->entradas_recientes}}</td>
                                    </tr>
                                    <tr>
                                        <td>Banner Publicitario</td>
                                        <td>{{$portada->banner}}</td>
                                    </tr>
                                    <tr>
                                        <td>Colaboradores / Populares en Elementum</td>
                                        <td>{{$portada->colaboradores}}</td>
                                    </tr>
                                    <tr>
                                        <td>Leído en Elementario</td>
                                        <td>{{$portada->leido_elementario}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Administrador banner publicitario</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if($banner->estado == 1)
                                    <div class="row">
                                        <div class="col-md-12" align="right" style="vertical-align: center">
                                            <div>
                                                <h1 style="vertical-align: center">Asunto: {{$banner->asunto}}</h1>
                                                <p style="font-size: 1.6em; vertical-align: center">
                                                    Fecha de Inicio: {{$banner->fecha_inicio}} <br>
                                                    Fecha de Vencimiento: {{$banner->fecha_final}} <br>
                                                    Días Restantes: {{$dias_restantes}} <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h2>No hay Banners Vigentes</h2>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if($banner->estado == 1)
                                    <img src="{{asset("images/banners")}}/{{$banner->imagen}}" alt="Banner Publicitario"
                                         class="img-responsive">
                                @else
                                    <div class="well"></div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-top: 20px">
                            <div class="col-md-12">
                                <h2>Nuevo Banner</h2><br>
                                <form method="post" id="form-banner" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="asunto" name="asunto"
                                               placeholder="Evento del Banner">
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
            </div>
        </div>
    </div>
@endsection
@section('script_section')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

        var fecha_inicio;
        var fecha_final;

        $(document).ready(function () {

        });

        $('#form-portada').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            Swal.fire({
                title: "¿Guardar Configuración de Portada?",
                type: "warning",
                text: 'Recuerde verificar que todas las posiciones sean diferentes en cada sección',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('pos.portada')}}",
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
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
            });
        });

        $("#file").change(function () {
            readURL(this);
        });

        $('#form-banner').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            calcularFechas(parseInt($('#periodo').val()));

            formData.append('fecha_inicio', fecha_inicio)
            formData.append('fecha_final', fecha_final)

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

        function calcularFechas(periodo) {
            inicio = new Date();
            final = new Date();
            dia = inicio.getDate();
            mes = inicio.getMonth() + 1;// +1 porque los meses empiezan en 0
            anio = inicio.getFullYear();

            final.setDate(final.getDate() + periodo);

            fdia = final.getDate();
            fmes = final.getMonth() + 1;// +1 porque los meses empiezan en 0
            fanio = final.getFullYear();

            fecha_inicio = anio + '-' +
                (('' + mes).length < 2 ? '0' : '') + mes + '-' +
                (('' + dia).length < 2 ? '0' : '') + dia;

            fecha_final = fanio + '-' +
                (('' + fmes).length < 2 ? '0' : '') + fmes + '-' +
                (('' + fdia).length < 2 ? '0' : '') + fdia;
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