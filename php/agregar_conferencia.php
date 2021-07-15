<?php
    session_start();
    require_once '../config/conexion.php';
    $conexion = conexion();
    $id_usuario = $_SESSION['id_usuario'];
    $categoria = $_POST['categoriasArchivos'];
    $query_1 = "SELECT nombre_c
                FROM categoria
                WHERE id_categoria = '$categoria'";
    $result_1 = mysqli_query($conexion, $query_1);
    $m = mysqli_fetch_array($result_1);
    $categoria_n = $m['nombre_c'];
    $nombre_conferencia = $_POST['nombre_video'];
    
    $archivo = $_FILES['inputArchivo']['name'];
    $precio = $_POST['precio'];

    $descripcion = $_POST['descripcion'];
    $carpeta_usuario = "../archivos/". $id_usuario . "/" . $categoria_n;

    if($_FILES['inputArchivo']['size'] > 0){
        if(!file_exists($carpeta_usuario)){
            mkdir($carpeta_usuario, 0777, true);
        }
        $rutainicial = $_FILES['inputArchivo']['tmp_name'];
        $rutafinal = $carpeta_usuario ."/". $archivo;
        move_uploaded_file($rutainicial, $rutafinal);
    }
    $query = "INSERT INTO archivo(  id_usuario,
                                    categoria,
                                    nombre_conferencia,
                                    nombre_archivo, 
                                    precio,
                                    descripcion)
                            VALUE(?,?,?,?,?,?)";
    $sql = $conexion->prepare($query);
    $sql->bind_param('isssss', $id_usuario, $categoria_n,$nombre_conferencia, $archivo, $precio, $descripcion);
    $sql->execute();

    if($sql){
        echo 1;
    }else{
        echo $descripcion;
    }
    
    

    $conexion->close();
?>