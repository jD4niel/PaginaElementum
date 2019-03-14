@extends('layouts.app')

@section('content')

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
                <option id="ver-libros" value="2">Libros</option>
            </select>
        </label>
        <a href="{{route('crear.autor')}}"><button  class="btn-hover color-3 b1" style="float: right;">Agregar nuevo autor</button></a>
        <a href="{{route('crear.libro')}}"><button class="btn-hover color-3 b2" style="float: right;display: none;">Agregar nuevo libro</button></a>
    </div>
    <hr>
    <button class="btn btn-success" onclick="check_remaining_checkboxes()" style="position: sticky;top:0;z-index: 10;left: 80%;margin-bottom: 25px;">Seleccionar restantes</button>
    <button class="btn btn-danger" onclick="save_new_order()" style="position: sticky;top:0;z-index: 10;left: 95%;margin-bottom: 25px;">Guardar</button>
    <br>
    <div class="row" id="t1">
        <table id="tabla1" class="table">
            <thead>
            <tr>
                <th>Orden</th>
                <th>Ordenar</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($autor as $item)
                <tr id="id1{{$item->id}}">
                    <td>{{$item->order_num}}</td>
                    <td><input id="checkbox{{$item->id}}" class="checkbox_class" data-id="{{$item->id}}" onclick="order_checkbox({{$item->id}})" type="checkbox">&nbsp;<span id="orderChk{{$item->id}}"></span></td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido_p}}&nbsp;{{$item->apellido_m}}</td>
                    <td class="text-center buttons-inside">
                        <button onclick="eliminar({{$item->id}},1)" class="del-btn col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <a href="{{ route('modifica.autor',$item->id) }}" target="_blank"><button onclick="modificar({{$item->id}})" class="ed-btn col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="margin: 5em 0;"></div>
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
                    <td class="text-center buttons-inside">
                        <button onclick="eliminar({{$item->id}},2)" class="del-btn col-md-4"><i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>
                        <a href="{{ route('modifica.libro',$item->id) }}" target="_blank"><button class="ed-btn col-md-4"  data-toggle="modal" data-target="#ModificarEntrada"><i class="fas fa-plus"></i>&nbsp;Modificar</button></a>
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
            $('#tabla2').DataTable();
            if(String(window.location).includes('ver-libros')){
                $('#sel').val(2);
                change_select()
            }
        } );
        $("#sel").on('change',function () {
            var val = $("#sel").val();
            change_select()
        });
        function change_select(){
            $("#t1").toggle();
            $(".b1").toggle();
            $("#t2").toggle();
            $(".b2").toggle();
        }
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
    </script>
    <script src="{{asset('js/ordenamiento.js')}}"></script>
@endsection

