<?php
session_start();

require_once '../config/conexion.php';

$conexion = conexion();

$categoria  = $_POST['categoria_a'];
$id_usuario = $_SESSION['id_usuario'];


$query = "INSERT INTO categoria(id_usuario,nombre_c)
                           VALUE(?,?)";
$sql = $conexion->prepare($query);
$sql->bind_param('is', $id_usuario, $categoria);
$sql->execute();




if($sql){
    echo 1;
}else{
    echo 0;
}

$conexion->close();

?>