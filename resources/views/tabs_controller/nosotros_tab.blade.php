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
    <br>
</div>
<div class="container">
	<div class="row">
        <div class="text-center">
            <h3>Misión/visión</h3>
            <button class="btn-hover color-10"onclick="saveUsTab('nosotros')">Guardar</button>
            <button class="btn-hover color-3"onclick="previewPage('nosotros')">Vista previa</button>
        </div>
        <textarea id="summary-ckeditor">{!! $nosotros->text_content !!}</textarea>
	</div>
</div>

@endsection

@section('script_section')
    <script src="{{asset('js/edit_tabs.js')}}"></script>
    <script>
    var ckEditorID;
    ckEditorID = 'summary-ckeditor';
    CKEDITOR.config.forcePasteAsPlainText = true;
    CKEDITOR.replace(ckEditorID)
    </script>
@endsection

