//Validar cambio en campo: puesto
function fieldChange(id_name,button_name){
	var puesto_dom = $(`#${id_name}`);
	var puesto = $(`#${id_name}`).val();
	if(ComeFromElementum() == false){
		button_name = "save-autor";
	}
	if(puesto == '' || puesto.length == 0){
		$(`#${button_name}`).attr("disabled", true);
		puesto_dom.addClass('error');
	}else{
		$(`#${button_name}`).attr("disabled", false);
		puesto_dom.removeClass('error');
	}
}

//Validar todos los campos de integrantes
function validateAll(texto){
	var nombre = $('#nombre');
	var apa = $('#apa');
	var puesto = $('#puesto');
    var my_editor = "summary-ckeditor2";
    var descripcion = CKEDITOR.instances[my_editor].getData();
	if(texto == 'usuario'){
		if(nombre.val() != '' && apa.val() != '' && puesto.val() != ''){
			return true;
		}else{
			return false;
		}
	}else{
		if(nombre.val() != '' && apa.val() != '' && descripcion != ''){
			return true;
		}else{
			return false;
		}
	}
}

function ComeFromElementum(){
	//Evalua si la url pertenece al agregar nuevo integrante de elementum
	if(String(window.location).includes('integrante-elementum') || $("#select_").val() == 2){
		return true;
	}
	else{
		return false;
	}
}