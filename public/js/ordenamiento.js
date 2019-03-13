//Funcion de ordenamiento para autores (Elementum)
var counter = 1;
var container_ids = []

function order_checkbox(id) {
	var order_text = document.getElementById('orderChk'+id); //Mostrar ordenamiento
	var checkbox = document.getElementById('checkbox'+id); //Checkbox
	//Si esta seleccionado y el arreglo no incluye el ID
	if (!container_ids.includes(id) && checkbox.checked == true) {
		container_ids.push(id);
		order_text.innerHTML = container_ids.indexOf(id)+1;
	}else{
		//Quitar el ID del checkbox deseleccionado
		container_ids = arrayRemove(container_ids,id);
		order_text.innerHTML = '';
		//Rescribir el orden en el texto
		for (let row_id of container_ids){
			document.getElementById('orderChk'+row_id).innerHTML = container_ids.indexOf(row_id)+1;
		}
	}
	console.log(container_ids);
}
function check_remaining_checkboxes(){
  var inputs = document.querySelectorAll('.checkbox_class');
  for(var i = 0; i < inputs.length; i++) {
  	if(inputs[i].checked == false){
  		id = inputs[i].getAttribute('data-id');
  		order_checkbox(id);
  		container_ids.push(parseInt(id));
    	inputs[i].checked = true;
  	}
  }
}

function arrayRemove(arr, value) {

   return arr.filter(function(ele){
       return ele != value;
   });

}

function save_new_order(){
	var url_send = window.location + '/order/save';
    swal({
        title: "¿Actualizar orden de autores?",
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
              body: JSON.stringify({ids:container_ids}), 
              mode: 'cors',
              dataType: 'json',
              headers:{
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
              }
              }).then(res => {console.log(res)})
            .then(response => {
                    console.log(response);
                    swal("Ordenamiento de autores", "realizado correctamente ",{
                            icon: "success"
                        }).then((value) => {
                        	console.log(response)
                        //window.location.reload();
                    });
            });
        }
    });
}