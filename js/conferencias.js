function infoConferencia(id_archivo){
    $.ajax({
        type : "POST",
        data : "id_archivo=" + id_archivo,
        url : "php/informacion_archivo.php",
        success : (r) => {
            respuesta = JSON.parse(r);
            $('#id_conferencia').val(respuesta['id_archivo']);
            $('#nombre_conferencia').val(respuesta['nombre_conferencia']);
            $('#precio_conferencia').val('$'+respuesta['precio']);
            $('#descripcion_conferencia').val(respuesta['descripcion']);
        }
    });
}

function realizar_compra(){
    $.ajax({
        type: "POST",
        data: $('#frm_comprar').serialize(),
        url : "php/compra_conferencia.php",
        success : (r) =>{
            if(r == 1){
                
                swal({
                    title: "Exito!",
                    text: "Se ha realizado la compra con exito",
                    icon: "success",
                    button: "Ok!",
                });
            }else{
                console.log(r);
                swal({
                    title: "Error!",
                    text: "Se a producido un error a la hora de realizar su compra",
                    icon: "error",
                    button: "Ok!",
                });
            }
        }
    });
}




$(document).ready(function() {
    $('#example').DataTable();
    
    $('#btn_realizar_compra').click(() => {
        realizar_compra();
      });
    
} );