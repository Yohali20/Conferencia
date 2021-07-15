<?php

    require_once "../config/conexion.php";
    $conexion = conexion();
    $id_usuario = $_POST['id_usuario'];
    $categoria = $_POST['categoria'];
    $nombre_archivo = $_POST['nombre_archivo'];
    $id_archivo = $_POST['id_archivo'];
    $ruta = "../archivos/". $id_usuario . "/" . $categoria . "/" . $nombre_archivo;

    if(unlink($ruta)){
        $query = "DELETE FROM archivo WHERE id_archivo = ?";
        $sql = $conexion->prepare($query);
        $sql->bind_param('i',$id_archivo);
        $sql->execute();
        echo $sql;
        $conexion->close();
    }









?>