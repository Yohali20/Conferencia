<?php
  session_start();
  require_once '../config/conexion.php';
  $conexion = conexion();
  $descripcion = $_POST['descripcion'];

  echo '<p class="text-light">Descripcion: <br>'.$descripcion.'</p>';
     
?>