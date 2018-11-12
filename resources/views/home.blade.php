@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                 <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> -->
            <a href="{{route('users')}}"><button class="btn btn-success btn-lg">Escritores</button></a>
            <a href=""><button class="btn btn-warning btn-lg">Entradas</button></a>
            <a href=""><button class="btn btn-danger btn-lg">Pagina Elementum</button></a>
    </div>
</div>
@endsection
