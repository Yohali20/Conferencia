<?php

require_once '../config/conexion.php';

$conexion = conexion();

$nombre  = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$fecha_n = $_POST['fecha_n'];
$correo_r = $_POST['correo_r'];
$contraseña_r = sha1($_POST['contraseña_r']);



$query = "INSERT INTO usuario( nombre,
                                apellido_p,
                                apellido_m,
                                fecha_n,
                                correo,
                                contraseña)
                            VALUE(?,?,?,?,?,?)";
$sql = $conexion->prepare($query);
$sql->bind_param('ssssss', $nombre,$apellido_p, $apellido_m, $fecha_n, $correo_r, $contraseña_r);
$sql->execute();




if($sql){
    echo 1;
}else{
    echo 0;
}

$conexion->close();



?>