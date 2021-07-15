function valida_vacios(){

    if($('#correo').val() == ""){
        swal({
            title: "Error!",
            text: "Ingresa tu correo",
            icon: "error",
            button: "Ok!",
          });
        return false;
    }else if($('#contraseña').val() == ""){
        swal({
            title: "Error!",
            text: "Ingresa tu contraseña",
            icon: "error",
            button: "Ok!",
          });
        return false; 
    }else{
        $.ajax({
            type: 'POST',
            data: $('#frm_login').serialize(),
            url: "php/sesion.php",
            success(r){
                if(r == 1){
          
                    swal({
                        title: "Exito!",
                        text: "Logueado con exito",
                        icon: "success",
                        button: "Ok!",
                    }).then(() =>{
                        window.location = "inicio";
                        
                    });
                  }else{
                    swal({
                      title: "Error!",
                      text: "Sus credenciales de acceso son incorrectas",
                      icon: "error",
                      button: "Ok!",
                    });
                  }
            }

        });
    }
   
}





$(document).ready(function(){

    $('#btn_entrar').click(function(){
        valida_vacios();
    });


}); 