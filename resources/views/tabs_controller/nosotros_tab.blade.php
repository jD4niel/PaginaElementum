@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="tab-banner-image" onclick="triggerInputFile('input_file_img',true)">
            <img id="nosotros_img" src="{{ asset('images/tabs_banners') }}/{{ $nosotros->image }}" alt="imagen-nosotros">
            <div><span>CAMBIAR IMAGEN</span></div>
        </div>
        <input name="file" type="file" id="input_file_img" onchange="readInputFile(this)" hidden style="display: none">
        <div class="form-group row text-center" style="margin-top: 15px;">
            <label for="call_to_action" class="col-sm-1 form-label">Enlace:</label>
            <div class="col-sm-9">
                <input id="call_to_action" value="{{ $nosotros->url }}" oninput="$('#show_button').show();" type="text" class="form-control" placeholder="URL a mostrar al dar click">
            </div>
            <button id="show_button"  onclick="upload_image('nosotros')" class="btn btn-success col-sm-2">GUARDAR</button>
        </div>
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

