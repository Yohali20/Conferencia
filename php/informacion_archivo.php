<?php

    require_once '../config/conexion.php';

    $conexion = conexion();
    $id_archivo = $_POST['id_archivo'];
    $query = "SELECT id_archivo,
                    nombre_conferencia,
                    precio,
                    descripcion
              FROM archivo
              WHERE id_archivo = '$id_archivo'";
    $result = mysqli_query($conexion, $query);
    $conferencia = mysqli_fetch_array($result);


    $datos = array(
      "id_archivo" => $conferencia['id_archivo'],
      "nombre_conferencia" => $conferencia['nombre_conferencia'],
      "precio" => $conferencia['precio'],
      "descripcion" => $conferencia['descripcion']
    );

    echo json_encode($datos);
    
?>