// Borra las secciones  
function delete_section(id,path,title,mes){
    swal({
        title: title,
        text: mes,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            var url = window.location + '/borrar/'+path+'/'+id;
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
    if(path == 'servicio'){
      var id = id + 1;
      var name = $('#service_name'+id).val();
      var foto = $("#fileUpService"+id);
      myFormData.append('file', foto[0]['files'][0]);
      myFormData.append('name', name);
    }else{
      
      var nombre = $('#text_section'+id).val();
      var foto = $("#fileUp"+id);
      myFormData.append('file', foto[0]['files'][0]);
      myFormData.append('nombre', nombre);
      myFormData.append('id', id);
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
            var url = window.location + '/editar/'+path+'/'+id;
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
                    swal("Editada correctamente", " ",{
                            icon: "success"
                        }).then((value) => {
                         window.location.reload();
                    });
            });
        }
    });
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
  myFormData.append('file', foto[0]['files'][0]);
  myFormData.append('name', name);
  var object = {};
  myFormData.forEach(function(value, key){
      object[key] = value;
  });
  var file = JSON.stringify(object);
  var url = '{{route('new.service')}}';
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
}
