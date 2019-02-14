@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Secciones</h1>
    </div>
    <div class="row btn-entry-container">
        <a href="{{ route('section.entry', $seccion_id) }}" target="_blank"><button class="btn-entry">CREAR ENTRADA</button></a>
    </div>
    <br><br><hr>
    <div class="row entry-style">
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
                        <a class="btn btn-success" href="/blog/entrada/{{$item->id}}">Ver</a>
                        <a  href="{{ route('edit.post', $item->id) }}" class="btn btn-success">Modificar</a>
                        <button onclick="borrar({{$item->id}})" class="btn btn-danger" disabled>Borrar</button>
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
            console.log({{ $entradas }})
        } );
    </script>
@endsection

