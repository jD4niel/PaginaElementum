@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Mis entradas</h1>
    </div>
    <div class="row">
        <table id="entradas_id" class="table-responsive">
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
                    <td>{{$item->role->type}}</td>
                    <td>{{$item->last_name}}{{$item->second_last_name}}</td>
                    <td>{{$item->blog->entradas->id}}</td>
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
    </script>
@endsection

