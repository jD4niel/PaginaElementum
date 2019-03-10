|@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <button id="show_button" class="btn-hover color-1" onclick="upload_image('nosotros')">Guardar imagen</button>
        <div class="tab-banner-image" onclick="triggerInputFile('input_file_img',true)">
            <img id="nosotros_img" src="{{ asset('images/tabs_banners') }}/{{ $nosotros->image }}" alt="imagen-nosotros">
            <div><span>CAMBIAR IMAGEN</span></div>
        </div>
        <input name="file" type="file" id="input_file_img" onchange="readInputFile(this)" hidden style="display: none">
    </div>
</div>

@endsection

@section('script_section')
    <script src="{{asset('js/edit_tabs.js')}}"></script>
@endsection

