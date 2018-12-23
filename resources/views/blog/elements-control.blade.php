@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row">
        <h1>Autores</h1>
    </div>
    <div class="row">
        <a href="{{route('user.crear')}}"><button class="btn-add-new" style="float: right">Agregar nuevo autor</button></a>
    </div>
    <div class="row">
        <table id="tabla" class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach($autor as $item)
                <tr id="id{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido_p}}&nbsp;{{$item->apellido_m}}</td>
                    <td class="text-center">
                        <button onclick="borrar({{$item->id}})" class="btn btn-danger col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <button onclick="modificar('{{$item->id}}'" class="btn btn-success col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button>
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script_section')
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>

        $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $('#tabla').DataTable();
        } );

        function borrar(id){
            fetch('/control/xd', {
                method: 'post',
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
                .then(function(data) {
                    console.log(data);
                });
            ;
        }
        function modificar(id,nombre,apellido_p,apellido_m) {
            $('#nombre_tutor').val(id);
            $('#input_name').val(nombre);
            $('#input_ap').val(apellido_p);
            $('#input_am').val(apellido_m);
            $('#Grado').val(grado);
            $('#Grupo').val(grupo);
            $('#identificador_alumno').val(id);
        }
        function update() {
            var id = $('#identificador_alumno').val();
            var nombre = $('#input_name').val();
            var apellido_p = $('#input_ap').val();
            var apellido_m = $('#input_am').val();
            var grado = $('#Grado').val();
            var grupo = $('#Grupo').val();
            /*  var Grado  = $('#input_am').val();
              var Grupo*/
            $.ajax({
                url: '/alumno/modificar/'+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'id': id,'nombre':nombre,'apellido_p':apellido_p,'apellido_m':apellido_m,'grado':grado,'grupo':grupo},
                type: 'PUT',
                dataType: 'json',
                success: function (data) {
                    $('#ModificarAlumnoModal').modal('hide');
                    console.log(data);
                    swal(
                        'Cambios guardados',
                        'Alumno correctamente modificado',
                        'success'
                    )
                    $('#id'+id).html('<td>'+id+'</td>\n' +
                        '                            <td>'+nombre+'</td>\n' +
                        '                            <td>'+apellido_p+'&nbsp;'+apellido_m+'</td>\n' +
                        '                            <td>'+grado+'</td>\n' +
                        '                            <td>'+grupo+'</td>\n' +
                        '                            <td>\n' +
                        '                                <button onclick="borrar('+id+'" class="btn btn-danger">Borrar</button>\n' +
                        '                                <button onclick="modificar("'+id+'","'+nombre+'","'+apellido_p+'","'+apellido_m+'","'+grado+'","'+grupo+'")" class="btn btn-success"  data-toggle="modal" data-target="#ModificarAlumnoModal">Modificar</button>\n' +
                        '                            </td>')
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection

