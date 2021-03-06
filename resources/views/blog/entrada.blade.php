@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 >Mis entradas</h1>
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
                                    <a class="see_btn" href="/blog/entrada/{{$item->id}}">Ver</a>
                                    <a href="{{ route('edit.post', $item->id) }}" class="edit_btn">Modificar</a>
                                    @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                    <button id="borrar-entrada" type="button" class="del_btn" onclick="borrar('{{ route('delete.post', $item->id) }}')">Borrar</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer text-center">
                <a href="{{ route('autor-entradas') }}"><button class="btn-hover color-3">Nueva Entrada</button></a>
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

