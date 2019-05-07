@extends('layouts.app')

@section('content')
<div class="container text-center">
     @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
    <div class="row col-md-12">

         <div style="float:none;margin:0 auto;" class="col-md-9">

             <div class="col-md-4">
                <a href="{{route('control.gral')}}">
                 <div class="icontainer">
                     <i class="fas fa-users green"></i>
                     <div class="icontext">Autores</div>
                 </div>
                </a>
             </div>

             <div class="col-md-4">
                <a href="{{route('control.gral')}}/#ver-libros">
                 <div class="icontainer">
                     <i class="fas fa-book blue"></i>
                     <div class="icontext">Libros</div>
                 </div>
                </a>
             </div>

             <div class="col-md-4">
                <a href="{{route('entradas')}}">
                 <div class="icontainer">
                     <i class="far fa-newspaper yellow"></i>
                     <div class="icontext">Entradas</div>
                 </div>
                </a>
             </div>

         </div>
    </div>
    <div class="row text-center">
     <div class="col-md-12" style="margin:0 auto;margin-bottom: 2vh;">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4" style="border-bottom: solid 1px #908B9EFF">&nbsp;</div>
        <div class="col-md-4">&nbsp;</div>
     </div>   
    </div>
    @endif
    <div class="row text-right">
        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            <a href="{{route('control.gral')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #3d7fcb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Escritores</h2>
                        <h4 class="card-subtitle    mb-2 " style="color:#fff;">control</h4>
                        <i class="fas fa-users-cog card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
        @endif
            <a href="{{route('entradas')}}" class="a-free col-md-3" target="_blank">
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
            <a href="{{route('autor-entradas')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #a736bb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Crear Entrada</h2>
                        <h4 class="card-subtitle mb-2" style="color:#fff;">blog</h4>
                        <i class="fas fa-sticky-note card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a><!-- 
            <a href="{{route('autor-entradas')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #1CB85D;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Crear Actividad</h2>
                        <h4 class="card-subtitle mb-2" style="color:#fff;">&nbsp;</h4>
                        <i class="far fa-calendar-alt card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a> -->
        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)    
            <a href="{{route('crear.autor')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #bb2d5e;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Nuevo autor</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">&nbsp;</h4>
                        <i class="fas fa-user-plus card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
    

            <a href="{{route('editarpagina')}}" class="a-free col-md-3" target="_blank">
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


            <a href="{{route('subirpdf')}}" class="a-free col-md-3" target="_blank">
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

            <a href="{{route('crear.libro')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #86921f;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Agregar libro</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">&nbsp;</h4>
                        <i class="fas fa-book-open card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
        @endif
            <a href="{{route('elementario.index.controller')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #BB4F24;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Control</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">Actividades</h4>
                        <i class="fas fa-edit card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            <a href="{{route('control.gral')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #3f3fbb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Control de</h2>
                        <h4 class="card-subtitle mb-2 " style="color:#fff;">Elementos</h4>
                        <i class="fas fa-edit card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('admin.portada')}}" class="a-free col-md-3" target="_blank">
                <div class="card" style="width: 26rem; margin:10px;background-color: #a3abbb;">
                    <div class="card-body">
                        <h2 class="card-title" style="z-index: 50;">Admin portada</h2>
                        <h4 class="card-subtitle mb-2" style="color:#fff;">blog</h4>
                        <i class="fas fa-th-large card-fa"></i>
                        <div class="variable-card text-right">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </a>
        @endif
    </div>
</div>
@endsection
