// Borra las secciones  
function delete_section(id,path,title,mes){
  var url_send = window.location + '/borrar/'+path+'/'+id;
    swal({
        title: title,
        text: mes,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            var url = url_send;
            fetch(url, {
              method: 'POST', 
              body: JSON.stringify({id:id}), 
              mode: 'cors',
              dataType: 'json',
              headers:{
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
              }
              }).then(res => res)
            .then(response => {
                    console.log(response);
                    swal("Eliminada correctamente", " ",{
                            icon: "success"
                        }).then((value) => {
                        window.location.reload();
                    });
            });
        }
    });
}        
// Edita las secciones  
function edit_section(id,path,title,mes){
    var myFormData = new FormData();
    myFormData.append('id', id);
    var foto = $("#fileUpService"+id);
    var text = $('#text'+id).val();
    myFormData.append('text',text);
    myFormData.append('file', foto[0]['files'][0]);
    if(path == 'servicio'){
      var name = $('#service_name'+id).val();
      myFormData.append('name', name);
    }else{
      var nombre = $('#text_section'+id).val();
      myFormData.append('nombre', nombre);
    }
    swal({
        title: title,
        text: mes,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            var url = window.location +'/'+path+'/'+id;
            fetch(url, {
              method: 'POST', 
              body: myFormData, 
              mode: 'cors',
              headers:{
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
              }
              }).then(res => res)
            .then(response => {
                    console.log(response);
                    swal("Edición realizada", " ",{
                            icon: "success"
                        }).then((value) => {
                        //window.location.reload();
                    });
            });
        }
    });
}
//Al cerrar el modal se obtiene el texto de este
function getTextFromModal() {
    var text = CKEDITOR.instances["summary-ckeditor"].getData();
    var id = $('#saveModalInfo').data('id');
    $('#text'+id).val(text);

}

// Al editar un input se dispara esta funcion
function onchangeinput(id) {
  $('#eis_'+id).show(300,"linear")
  //$('#eis_'+id).animate({width: "55px",height:"55px"},100,"swing");
}

function btn_appear(e){$('#btn-change-img'+e).show();}
function btn_disapear(e){$('#btn-change-img'+e).hide();}


// Ejecutar el input file para subir imagenes
function triggerFileService(id) {$('#fileUpService'+id).trigger('click');}
// Lee el input con la imagen
function readURLservice(input,id) {
    if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
            // Si la imagen carga haz esto:
            $('#noimg'+id).hide();
           $("#img-element-service"+id).attr("src", e.target.result);
            onchangeinput(id);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function saveService(id) {
          var id = id + 1;
          var name = $('#service_name'+id).val();
          var foto = $("#fileUpService"+id);
          var myFormData = new FormData();
          var text = $('#text'+id).val();
          myFormData.append('text',text);
          myFormData.append('file', foto[0]['files'][0]);
          myFormData.append('name', name);
          var object = {};
          myFormData.forEach(function(value, key){
              object[key] = value;
          });
          var file = JSON.stringify(object);
          var url = window.location + '/servicio/nuevo';
          swal({
              title: "¿Añadir nuevo servicio?",
              text: "Los servicios se actualizarán automaticamente en la portada",
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
                          window.location.reload();
                      },
                      error: function (jqXHR, textStatus, errorThrown) {
                          console.log(textStatus + ': ' + errorThrown);
                      }
                  });
              } 
        });
    }

//Editar modal 
$('#serviceModal').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget); 
            var modal   = $(this);
            var title = button.data('title');
            var id = button.data('id');
            var texto =button.data('text');
            modal.find('.modal-title').text(title);
            $('#saveModalInfo').data('id',id)
            CKEDITOR.instances["summary-ckeditor"].setData(texto);


});