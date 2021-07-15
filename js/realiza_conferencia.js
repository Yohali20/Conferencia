function validar_vacio(){
    if($('#categoria_a').val() == "" ||/^\s+$/.test($('#categoria_a').val())){
        swal({
          title: "Error!",
          text: "Ingresa la categoria",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else{
        $.ajax({
            type: "POST",
            data: $('#frm_categoria').serialize(),
            url: "php/agregar_categoria.php",
            success(r){
                if(r == 1){
                    swal({
                        title: "Exito!",
                        text: "La categoria a sido agregada correctamente",
                        icon: "success",
                        button: "Ok!",
                      }).then(() =>{
                        window.location.reload();
                        $('#frm_categoria')[0].reset();
                        $('#exampleModal').modal('toggle');
                      });
                }else{
                    console.log(r);
                    swal({
                        title: "Error!",
                        text: "Hubo un problema en agregar tu categoria",
                        icon: "error",
                        button: "Ok!",
                      });
                }
            }

        });
    }
}
function validar_vacio_conferencia(){
    if($('#categoria_conferencia').val() == "" ||/^\s+$/.test($('#categoria_conferencia').val())){
        swal({
          title: "Error!",
          text: "Ingresa la categoria",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else if($('#nombre_video').val() == "" ||/^\s+$/.test($('#nombre_video').val())){
        swal({
          title: "Error!",
          text: "Ingresa el nombre del video",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else if($('#inputArchivo').val() == "" ||/^\s+$/.test($('#inputArchivo').val())){
        swal({
          title: "Error!",
          text: "Sube tu Conferencia",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else if($('#precio').val() == "" ||/^\s+$/.test($('#precio').val())){
        swal({
          title: "Error!",
          text: "Elige el precio de tu conferencia",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else if($('#descripcion').val() == "" ||/^\s+$/.test($('#descripcion').val())){
        swal({
          title: "Error!",
          text: "Agrega una descripcion a tu conferencia",
          icon: "error",
          button: "Ok!",
        });
        
        return false;
    }else{
        validar_mp4();
    }
}

function validar_mp4(){
    extension = $('#inputArchivo').val();
    extPermitida = /(.mp4)$/i;
    if(!extPermitida.exec(extension)){
        swal({
            title: "Error!",
            text: "Asegurate que tu archivo sea de tipo mp4",
            icon: "error",
            button: "Ok!",
          });
          
          return false;
    }else{
        let formData = new FormData(document.getElementById('frm_conferencia'));
        $.ajax({
            type: "POST",
            datatype: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            url: "php/agregar_conferencia.php",
            success(r){
                if(r == 1){
                    swal({
                        title: "Exito!",
                        text: "Tu conferencia a sido agregada correctamente",
                        icon: "success",
                        button: "Ok!",
                      }).then(() =>{
                        
                        $('#frm_conferencia')[0].reset();
                        $('#agr_conferencia').modal('toggle');
                        window.location.reload();
                      });
                }else{
                    console.log(r);
                    swal({
                        title: "Error!",
                        text: "Hubo un problema en agregar tu categoria",
                        icon: "error",
                        button: "Ok!",
                      });
                }
            }

        });
    }
}

function verArchivo(id_usuario,categoria,nombre_archivo,descripcion){
    $.ajax({
        type: "POST",
        data: {
            "id_usuario": id_usuario,
            "categoria": categoria,
            "nombre_archivo": nombre_archivo
        },
        url:"php/ver_archivo.php",
        success: function(r){
            $('#archivo_observar').html(r);
        }
    });

    $.ajax({
        type: "POST",
        data: {
            "descripcion": descripcion
        },
        url:"php/ver_descripcion.php",
        success: function(r){
            $('#descripcion_observar').html(r);
            
        }
    });
}

function eliminarConferencia(id_usuario,categoria,nombre_archivo,nombre_conferencia,id_archivo){
    swal({
        title: `Estas seguro de eliminar ${nombre_conferencia}?`,
        text: "Una vez eliminado no se podra recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                data: {
                    "id_usuario": id_usuario,
                    "categoria": categoria,
                    "nombre_archivo": nombre_archivo,
                    "id_archivo": id_archivo   
                },
                url: "php/eliminar_conferencia.php",
                success : (r) => {
                    window.location.reload();
                    swal("Tu conferencia ha sido eliminada!", {
                        icon: "success",
                      });
                }
            });
          
        } 
      });
}


$(document).ready(function() {
    $('#tabla_conferencia').DataTable();

    $('#categoriasLoad').load("php/selectCategorias.php");

    $('#btn_guardar_c').click(() => {
        validar_vacio();
    });

    $('#btn_guardar_conferencia').click(() => {
        validar_vacio_conferencia();
    });


} );