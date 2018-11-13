@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Usuarios</h1>
    </div>
    <div class="row">
        <a href="{{route('user.crear')}}"><button class="btn-add-new" style="float: right">Agregar nuevo usuario</button></a>
    </div>
    <div class="row">
        <table id="entradas_id" class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Entradas</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $item)
                <tr id="id{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->last_name}}&nbsp;{{$item->second_last_name}}</td>
                    <td>{{$item->role->type}}</td>
                    <td>entradas</td>
                    <td>
                        <button onclick="borrar({{$item->id}})" class="btn btn-danger">Borrar</button>
                        <button onclick="modificar('{{$item->id}}" class="btn btn-success"  data-toggle="modal" data-target="#ModificarEntrada">Modificar</button>
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script_section')
    <script>
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $('#entradas_id').DataTable();
        } );

        function borrar(id){
            swal({
                title: "¿Eliminar registro?",
                text: "Una vez eliminado, no se podrán recuperar los datos",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '/usuario/borrar/'+id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {id: id},
                            type: 'DELETE',
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                $('#id'+id).hide();
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                        swal("El registro fue eliminado correctamente", {
                            icon: "success",
                        });
                    }
                });

        }
        function modificar(id,nombre,apellido_p,apellido_m,grado,grupo) {
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

