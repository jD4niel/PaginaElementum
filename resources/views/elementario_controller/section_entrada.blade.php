@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($section_obj->name))
    <div class="row text-center">
        <h1> {{$section_obj->name}} </h1>
    </div>
   @endif
    <div class="row btn-entry-container">
        <a href="{{ route('section.entry', $seccion_id) }}" target="_blank"><button class="btn-hover color-9" style="position:absolute;right: 0;">CREAR ENTRADA</button></a>
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
                <tr id="id{{$item->entradas_id}}">
                    <td>{{$item->entradas_id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <a target="_blank" class="btn btn-success" href="/blog/entrada/{{$item->entradas_id}}">Ver</a>
                        <a target="_blank"  href="{{ route('edit.post', $item->entradas_id) }}" class="btn btn-success">Modificar</a>
                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <button onclick="borrar({{$item->entradas_id}})" class="btn btn-danger">Borrar</button>
                        @endif
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
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
	    console.log(link);
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
                    //$(location).attr('href',link);
		   window.location.href = window.location.origin + '/borrar/entrada/' + link
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

