//Edicion de pestañas para Elementum 
$(document).ready(function(){
	//alert('it works')
});

// Abre el input para subir imagenes
function triggerInputFile(input_id,val) {
	if(val==true){
		$('#'+input_id).trigger('click');
		$('tab-banner-image').removeAttr('onclick')
	}
}
// lee las imagenes y las prepara para subir al servidor
function readInputFile(input) {
    if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
            // Si la imagen carga haz esto:
           $('#nosotros_img').attr("src", e.target.result);
           $('.tab-banner-image span').hide();
           $('#show_button').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function upload_image(tab_name) {
	var foto = $("#input_file_img");
	var myFormData = new FormData();
	if(foto[0]!=null){
		myFormData.append('file', foto[0]['files'][0]);
	}
	myFormData.append('tab_name', tab_name);
	var url_before = String(window.location).replace(tab_name,"");
	var url = url_before + 'subir/imagen'
	swal({
	  title: "¿Agregar imagen?",
	  text: "Los cambios se verán reflejados automaticamente en la portada",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
      .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: url,
              data: myFormData,
              type: 'post',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
              processData: false, // NEEDED, DON'T OMIT THIS
              success: function (response, file) {
                  console.log(response);
                  window.location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  alert('Error en el servidor! /n Intente con otro formato de imagen')
                  console.log(errorThrown)
                  console.log(textStatus)
              }
          });
      } 
    });
}