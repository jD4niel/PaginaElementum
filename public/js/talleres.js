//Talleres Edición
$(document).ready(function (){
	//alert('functiona');
});
function triggerSubmit(text,type){
	 swal({
            title: text,
            text: "Los datos serán aplicados en la página principal",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if(willDelete) {
                swal("El "+type+" fue agregado correctamente", " ",{
                        icon: "success"
                    }).then((value) => {
                    $('#submit-taller').click();
                });
            }
        });
}