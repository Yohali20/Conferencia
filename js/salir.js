function salir(){

    $.ajax({
       url: "php/salir.php",
       success(r){
           if(r){
            swal({
                title: "Exito!",
                text: "Vuelva Pronto",
                icon: "success",
                button: "Ok!",
            }).then(() =>{
                window.location = "inicio";
                
            });
           }
       }




    });

}

$(document).ready(function(){

    $('#btn_salir').click(function(){
        salir();
    });

});

