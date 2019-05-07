@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center b1">Integrantes</h1>
    </div>

    <hr>
    <a href="{{route('crear.autor')}}#integrante-elementum"><button  class="btn-hover color-3 b1" style="float: right;">Agregar nuevo integrante</button></a>
    <div class="row" id="t1">
        <table id="tabla1" class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr id="id1{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->last_name}}&nbsp;{{$item->second_last_name}}</td>
                    <td>{{$item->puesto}}</td>
                    <td class="text-center buttons-inside">
                        <button onclick="eliminar({{$item->id}},1)" class="del-btn col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <a href="{{ route('modifica.usuario',$item->id) }}" target="_blank"><button onclick="modificar({{$item->id}})" class="ed-btn col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button></a>
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
            $('#tabla1').DataTable();
        } );
        $("#sel").on('change',function () {
            var val = $("#sel").val();
            change_select()
        });
        function eliminar(id) {
            path = window.location +'/borrar/'+id
            swal({
                title: "¿Eliminar integrante?",
                text: "Una vez eliminado, no se podrá recuperar los datos",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: path,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id: id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('#id1'+id).hide();
                                swal("El integrante fue eliminado correctamente", " ",{
                                        icon: "success"
                                    }).then((value) => {
                                     //window.location.reload();
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
    </script>
@endsection

