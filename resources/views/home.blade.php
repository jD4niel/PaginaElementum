@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-right">
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
            <a href="{{route('users')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #3d7fcb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Escritores</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">control</h4>
                        <i class="far fa-edit card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('users')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #cb304f;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Entradas</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">al blog</h4>
                        <i class="far fa-file-alt card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('editarpagina')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #17bb3a;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Control</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">de la página</h4>
                        <i class="fas fa-outdent card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('entrada')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #a736bb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Crear Entrada</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">blog</h4>
                        <i class="fas fa-align-left card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('subirpdf')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #13a597;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Subir PDF</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">&nbsp;</h4>
                        <i class="fas fa-align-left card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('crear.libro')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #86921f;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Agregar libro</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">&nbsp;</h4>
                        <i class="fas fa-align-left card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('subirpdf')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #bb2d5e;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Nuevo autor</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">&nbsp;</h4>
                        <i class="fas fa-align-left card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('control.gral')}}" class="a-free col-md-3">
                <div class="card" style="width: 26rem; margin:10px;background-color: #3f3fbb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Control de</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">Elementos</h4>
                        <i class="fas fa-align-left card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>

    </div>
</div>
@endsection
