@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form id="elementum-info" method="post" action="/elementum/info/save">
            <div class="row text-center">
                <h1>Información Elementum</h1>
                <hr>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control col-md-12" id="telefono" name="telefono" value="{{ $elementum->telefono }}" placeholder="Num. de telefono" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="d" class="col-sm-2 col-form-label">Correo electronico:</label>
                <div class="col-md-10">
                    <input type="mail" class="form-control col-md-12" id="correo" name="correo" value="{{ $elementum->correo }}" placeholder="nombre@email.com" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="face" class="col-sm-2 col-form-label">Facebook:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control col-md-12" id="face" name="face" value="{{ $elementum->facebook }}" placeholder="Facebook">
                </div>
            </div>
            <div class="form-group row">
                <label for="twitter" class="col-sm-2 col-form-label">Twitter:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control col-md-12" id="twitter" name="twitter" value="{{ $elementum->twitter }}" placeholder="Twitter">
                </div>
            </div>
            <div class="form-group row">
                <label for="insta" class="col-sm-2 col-form-label">Instagram:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control col-md-12" id="insta" name="insta" value="{{ $elementum->insta }}" placeholder="Instagram">
                </div>
            </div>
            <div class="form-group row">
                <label for="insta" class="col-sm-2 col-form-label">Dirección:</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="direccion" id="direccion" cols="30" rows="10" required>{{ $elementum->direccion }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="insta" class="col-sm-2 col-form-label">Mapa:</label>
                <div class="map-responsive col-md-10">
                    <textarea id="embed" onchange="set_text()" type="text" class="form-control" placeholder="Pega aqui el iframe de tu dirección desde google maps o el botón *Obtener dirección*"></textarea>
                    <a href="https://www.mapsdirections.info/crear-un-mapa-de-google/" target="_blank" class="btn btn-success btn-block">Obtener direccion</a><hr>
                    <input  id="dir" name="dir"   onchange="set_text_from_input()"  type="text" class="form-control" value="{{ $elementum->addr }}">
                    <div id="map-container" class="col-md-12">
                        <iframe id="ele-frame" src="{{ $elementum->addr }}"  width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen></iframe>
                        <div>**Nota: mapa solo para visualización</div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" target="_blank" class="btn-hover color-4">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script_section')
    <script>
        function set_text(){
            var text = $('#embed').val();
            src_text = text.split('src="')[1]
            src_full = src_text.split('" ')[0]
            var dir = $('#dir').val(src_full)
            if (dir) {
                $('#ele-frame').attr('src',src_full);
                $('#map-container').show();
            }
        }
        function set_text_from_input(){
            var dir = $('#dir').val()
            if (dir) {
                $('#ele-frame').attr('src',dir);
                $('#map-container').show();
            }
        }

          var ckEditorID;
        ckEditorID = 'summary-ckeditor';
        CKEDITOR.config.forcePasteAsPlainText = true;
        CKEDITOR.replace( ckEditorID,
            {
                toolbar :
                    [
                        {
                            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
                        },
                        {
                            items : [ 'Link','Unlink' ]
                        }
                    ]
            })
    </script>
    <script>
 
    </script>
@endsection

