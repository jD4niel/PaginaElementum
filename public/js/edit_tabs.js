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
  var url = $('#call_to_action').val();
	var myFormData = new FormData();
	if(foto[0]!=null){
		myFormData.append('file', foto[0]['files'][0]);
    myFormData.append('url', url);
	}
	myFormData.append('tab_name', tab_name);
	var url_before = String(window.location).replace(tab_name,"");
	var url = url_before + 'subir/imagen'
	swal({
	  title: "¿Guardar cambios?",
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
                  // mostrar errores si
                  console.log(response);
                  console.log("-----")
                  console.log('file:',file)
                  if(response == 1){
                    window.location.reload();
                  }else {
                     swal('Error',response,'warning');
                  }
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  
                  swal('Error [ajax server]',errorThrown,'warning');
                  console.log(errorThrown)
                  console.log(textStatus)
              }
          });
      } 
    });
}



//Pestaña nosotros
function saveUsTab(tab_name){
  var text = CKEDITOR.instances["summary-ckeditor"].getData();
  var url_send = window.location + '/save';
  var data = JSON.stringify({'text':text,'tab_name':tab_name})
    swal({
        title: "¿Actualizar pestaña nosostros?",
        text: "Los cambios se actualizarán de manera inmediata",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            var url = url_send;
            fetch(url, {
              method: 'POST', 
              body: data, 
              mode: 'cors',
              headers:{
                'Content-Type': 'application/json',
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
              }
              }).then(res => res.json())
              .catch(error => console.log('Error:', error))
              .then(res => {
                      console.log(res);
                      swal("cambios actualizados", " ",{
                              icon: "success"
                          }).then((value) => {
                          window.location.reload();
                      })
              }); 
        }
    });
}
var page = $('body').html();
function previewPage(tab_name) {
  var text = CKEDITOR.instances["summary-ckeditor"].getData();
  var url_send = window.location + '/preview';
  var data = JSON.stringify({'text':text,'tab_name':tab_name})
  var url = url_send;
  console.log(text)
  $.ajax({
      url: url,
      data: data,
      type: 'post',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (response) {
          console.log(response);
          $('body').html(response);
          $('#text_container').html(text);
          $('#preview_btn').html('<div style="width:100%; margin: 0 auto; text-align:center;"><button onclick="restoreView()" class="btn-hover color-4" >Quitar vista previa</button></div>');
      },
      error: function (jqXHR, textStatus, errorThrown) {
          alert('Error en el servidor!')
          console.log(errorThrown)
          console.log(textStatus)
      }
    });
}
function restoreView(){
  var text = $('#text_container').html()
  $('body').html(page);
  $('.loader').hide();
  $('#elementum-loading-div').hide();
  $('#app').show();
  var ckEditorID;
  ckEditorID = 'summary-ckeditor';
  CKEDITOR.replace(ckEditorID);
  CKEDITOR.config.forcePasteAsPlainText = true;
  CKEDITOR.instances['summary-ckeditor'].setData(text);
}