|@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <h1 class="h1">Editar pestañas de la página</h1>
        <hr>
    </div>
    <div class="row">
        <a href="{{ route('nosotrosTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Nosotros</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $nosotros->image }}" class="img-banner-tabs">
        </div></a>
        <a href="{{ route('autoresTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Autores</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $autores->image }}" class="img-banner-tabs">
        </div></a>

        <!-- <a href="{{ route('contactoTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Contacto</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $contacto->image }}" class="img-banner-tabs">
        </div></a> -->
        
        <a href="{{ route('coleccionesTab') }}" target="_blank"><div class="edit-tabs-banner"><span>Colecciones</span>
            <img src="{{asset('images/tabs_banners')}}/{{ $colecciones->image }}" class="img-banner-tabs">
        </div></a>
    </div>
</div>

@endsection


