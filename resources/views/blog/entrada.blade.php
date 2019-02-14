@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Mis entradas</h1>
            </div>
            <div class="panel-body">
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
                                    <a class="btn btn-success" href="/blog/entrada/{{$item->id}}">Ver</a>
                                    <a href="{{ route('edit.post', $item->id) }}" class="btn btn-warning">Modificar</a>
                                    <button id="borrar-entrada" type="button" class="btn btn-danger" onclick="borrar('{{ route('delete.post', $item->id) }}')">Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('autor-entradas') }}" class="btn btn-info btn-block">Nueva Entrada</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_section')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        // $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $('#entradas_id').DataTable();
        });



        function borrar(link) {
            Swal.fire({
                title: "¿Estas Seguro de borrar esta entrada?",
                text: "Esta acción es irreversible.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    $(location).attr('href',link);
                }
            });
        }
    </script>
    @if (session('status'))
        <script>
            Swal.fire({
                type: 'success',
                title: '¡Entrada eliminada con éxito!',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection

