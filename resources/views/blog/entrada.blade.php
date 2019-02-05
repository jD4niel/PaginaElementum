@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Mis entradas</h1>
    </div>
    <div class="row">
        <table id="entradas_id" class="table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entradas as $item)
                <tr id="id{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <button onclick="borrar({{$item->id}})" class="btn btn-danger">Borrar</button>
                        <button class="btn btn-success">Modificar</button>
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
        // $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $('#entradas_id').DataTable();
        } );
    </script>
@endsection

