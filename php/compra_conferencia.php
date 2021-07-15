<?php
session_start();
require_once '../config/conexion.php';

$conexion = conexion();
$id_usuario = $_SESSION['id_usuario'];
$id_archivo = $_POST['id_conferencia'];
$nombre_conferencia = $_POST['nombre_conferencia'];
$precio_conferencia = $_POST['precio_conferencia'];
$descripcion_conferencia = $_POST['descripcion_conferencia'];
$query = "SELECT categoria
              FROM archivo
              WHERE id_archivo = '$id_archivo'";
$result = mysqli_query($conexion, $query);
$categoria = mysqli_fetch_array($result);

$categoria_nombre = $categoria['categoria'];

$q = "SELECT id_categoria
              FROM categoria
              WHERE nombre_c = '$categoria_nombre'";
$r = mysqli_query($conexion, $q);
$categoria_i = mysqli_fetch_array($r);
$id_categoria = $categoria_i['id_categoria'];



$query = "INSERT INTO conferencias_c( id_usuario,
                                    id_categoria,
                                    id_archivo,
                                    nombre_conferencia)
                            VALUE(?,?,?,?)";
$sql = $conexion->prepare($query);
$sql->bind_param('iiis', $id_usuario,$id_categoria, $id_archivo, $nombre_conferencia);
$sql->execute();




if($sql){
    echo 1;
}else{
    echo 0;
}

$conexion->close();



?>