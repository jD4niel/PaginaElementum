@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Administrador de Portada</h1>
                    </div>
                    <div class="panel-body">
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
                                <label for="banner">Selecciona la posición de la sección banner publicitario</label>
                                <select name="banner" id="banner" class="form-control">
                                    <option value="1">Posición 1</option>
                                    <option value="2">Posición 2</option>
                                    <option value="3">Posición 3</option>
                                    <option value="4">Posición 4</option>
                                    <option value="0">Oculta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="colaboradores">Selecciona la posición de la sección Colaboradores</label>
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
                                <button class="btn btn-info" type="submit">Confirmar</button>
                            </div>
                        </form>
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


    </script>
@endsection