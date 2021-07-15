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



$(document).ready(function() {
    $('#example').DataTable();
} );