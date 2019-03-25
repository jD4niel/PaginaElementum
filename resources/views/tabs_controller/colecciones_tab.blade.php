|@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <button id="show_button" class="btn-hover color-1" onclick="upload_image('colecciones')">Guardar imagen</button>
        <div class="tab-banner-image" onclick="triggerInputFile('input_file_img',true)">
            <img id="nosotros_img" src="{{ asset('images/tabs_banners') }}/{{ $colecciones->image }}" alt="imagen-colecciones">
            <div><span>CAMBIAR IMAGEN</span></div>
        </div>
        <input name="file" type="file" id="input_file_img" onchange="readInputFile(this)" hidden style="display: none">
    </div>
    <div class="separador"></div>
    <hr>
    <div class="row text-center">
    	<h1>Colecciones</h1>
    	<div id="collection-container" class="row col-md-12" style="margin-top:3em;">
	    	@foreach($collections as $item)
	    	<div class="col-md-3">
    			 <div id="eis_{{$item->id}}" class="edit_individual_section for-service-edit" title="Guardar cambios" onclick="edit_section({{$item->id}},'coleccion','¿Editar esta colección?','Los cambios se verán reflejados en la pestaña Colecciones')"><i class="fas fa-check"></i></div>
            	<div class="delete_section" style="top:0px !important; right: 0 !important;" title="Eliminar colección" onclick="delete_section({{$item->id}},'coleccion','Eliminar colección','Una vez eliminado, no se puede revertir el cambio')"><i class="far fa-trash-alt"></i></div>
	    		<div class="collection" onclick="triggerFileService('{{ $item->id }}')" >
	      			<img id="img-element-service{{$item->id}}" src="{{ asset('images/colecciones')}}/{{$item->imagen}}" alt="{{$item->imagen}}">
	    		</div>
            	<input type="file" onchange="readURLservice(this, '{{$item->id}}')" id="fileUpService{{ $item->id }}" style="display: none;">
	    	</div>
	    	@endforeach()
    	</div>
		<div class="row col-md-12">
    		<button id="add-collection-btn" class="add-collection btn-hover color-1" onclick="AddCollection({{count($collections)}})"><i class="fas fa-plus"></i> Agregar colección</button>
    		<button id="save-colection" class="add-collection btn-hover color-2" onclick="saveCollectionImg({{count($collections)}})" style="display: none;"><i class="fas fa-save"></i> Guardar</button>
		</div>
    </div>
</div>

@endsection

@section('script_section')
	<script>
		function AddCollection(ids) {
			var id = ids + 1;
			$('#save-colection').show();
			$('#add-collection-btn').hide();
			$('#collection-container').append('<div class="col-md-3">  ' +
            	' <div class="delete_section" style="top:0px !important; right: 0 !important;" title="Eliminar colección" onclick="delete_section('+id+',"coleccion","Eliminar coleccion","Una vez eliminado, no se puede revertir el cambio")"><i class="far fa-trash-alt"></i></div> '+
	    		' <div class="collection" onclick="triggerFileService('+id+')" > '+
	      		'	<img id="img-element-service'+id+'"> '+
	    		' </div> '+
            	' <input type="file" onchange="readURLservice(this, '+id+')" id="fileUpService'+id+'" style="display: none;"></div>');
		}
	</script>
    <script src="{{asset('js/edit_tabs.js')}}"></script>
    <script src="{{asset('js/edit_elements.js')}}"></script>
@endsection

