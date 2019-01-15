@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row">
        <h1 class="text-center b1">Autores</h1>
        <h1 class="text-center b2" style="display: none;">Libros</h1>
    </div>
    <div class="row">
        <label for="sel">
            <span>
                Mostrar por:
            </span>
            <select name="" id="sel">
                <option value="1">Autores</option>
                <option value="2">Libros</option>
            </select>
        </label>
        <a href="{{route('crear.autor')}}"><button  class="btn-add-new b1" style="float: right;">Agregar nuevo autor</button></a>
        <a href="{{route('crear.libro')}}"><button class="btn-add-new b2" style="float: right;display: none;">Agregar nuevo libro</button></a>
    </div>
    <hr>
    <div class="row" id="t1">
        <table id="tabla1" class="table">
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
                <tr id="id1{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido_p}}&nbsp;{{$item->apellido_m}}</td>
                    <td class="text-center">
                        <button onclick="eliminar({{$item->id}},1)" class="btn btn-danger col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <button onclick="modificar({{$item->id}})" class="btn btn-success col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row" id="t2" style="display: none;">
        <table id="tabla2" class="table" >
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>fecha</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($libro as $item)
                <tr id="id2{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}&nbsp;{{$item->subtitulo}}</td>
                    <td>{{$item->fecha}}</td>
                    <td class="text-center">
                        <button onclick="eliminar({{$item->id}},2)" class="btn btn-danger col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <button onclick="modificarLibro({{$item->id}})" class="btn btn-success col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button>
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
            $('#tabla1').DataTable();
            $('#tabla2').DataTable();
        } );
        $("#sel").on('change',function () {
            var val = $("#sel").val();
            $("#t1").toggle();
            $(".b1").toggle();
            $("#t2").toggle();
            $(".b2").toggle();

        });
        function eliminar(id, el) {
            path = "";
            if(el == 1)
                path = '/control/autor/borrar/'+id;
            else
                path = '/control/autor/borrar/'+id;
            swal({
                title: "¿Eliminar slider?",
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
                            $('#id'+el+id).hide();
                            swal("El registro fue eliminado correctamente", "",{
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
        function modificar(id) {
            var currentLocation = window.location;
            window.location.href = currentLocation + '/autor/'+id;
        }
        function modificarLibro(id) {
            var currentLocation = window.location;
            window.location.href = currentLocation + '/libro/'+id;
        }
    </script>
@endsection

