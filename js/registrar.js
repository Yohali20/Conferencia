function validar_vacios_r(){
  
    if($('#nombre').val() == "" ||/^\s+$/.test($('#nombre').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu nombre",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#apellido_p').val() == "" || /^\s+$/.test($('#apellido_p').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu apellido paterno",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#apellido_m').val() == "" || /^\s+$/.test($('#apellido_m').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu apellido materno",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#fecha_n').val() == "" || /^\s+$/.test($('#fecha_n').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu fecha de nacimiento",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#correo_r').val() == "" || /^\s+$/.test($('#correo').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu correo electronico",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#contraseña_r').val() == "" || /^\s+$/.test($('#contraseña').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu contraseña",
        icon: "error",
        button: "Ok!",
      });
      
      return false;
    }else if($('#c_contraseña').val() == "" || /^\s+$/.test($('#c_contraseña').val())){
      swal({
        title: "Error!",
        text: "Ingresa tu la confirmacion de tu contraseña",
        icon: "error",
        button: "Ok!",
      });
      return false;
    }else{
     valida_estructura_r();
    }
  }

 
function valida_estructura_r(){
  correo = $('#correo_r').val();
  if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo))){
    swal({
      title: "Error en la estructura de tu correo!",
      text: "Debes de ser ejem@tudominio.com",
      icon: "error",
      button: "Ok!",
    });
    
    return false;
  }else if($('#contraseña_r').val() != $('#c_contraseña').val()){
    swal({
      title: "Error!",
      text: "Tu contraseña debe de ser la misma en su confirmacion",
      icon: "error",
      button: "Ok!",
    });
    
    return false;  
  }else{
    $.ajax({
      type: "POST",
      data: $('#frm_registrar_usuario').serialize(),
      url: "php/agregar_usuarios.php",
      success(r){
        if(r == 1){
          
          swal({
            title: "Exito!",
            text: "Ha sido registrado exitosamente",
            icon: "success",
            button: "Ok!",
          }).then(() =>{
            $('#frm_registrar_usuario')[0].reset();
            $('#exampleModal').modal('toggle');
          });
        }else{
          swal({
            title: "Error!",
            text: "Ha avido un problema con su registro",
            icon: "error",
            button: "Ok!",
          });
        }
      }
    });
  }
}



  $(document).ready(function(){
    $('#nombre').on('input', function() {
      this.value = this.value.replace(/[^a-zA-Z]/g, '');
    });
    $('#apellido_p').on('input', function() {
      this.value = this.value.replace(/[^a-zA-Z]/g, '');
    });
    $('#apellido_m').on('input', function() {
      this.value = this.value.replace(/[^a-zA-Z]/g, '');
    });
  
    $('#btn_guardar_info').click(() => {
      validar_vacios_r();
    });

  });
  