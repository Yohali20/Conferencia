<?php
  session_start();
  require_once '../config/conexion.php';
  $conexion = conexion();
  $id_usuario = $_POST['id_usuario'];
  $categoria = $_POST['categoria'];
  $nombre_archivo = $_POST['nombre_archivo'];
  $ruta = "archivos/" . $id_usuario ."/".$categoria ."/".$nombre_archivo;
  
  $extencion = explode(".", $nombre_archivo);
  switch($extencion[1]){
    case 'mp4':
      echo '<video id="duracion" src="'.$ruta.'" controls  controlsList="nodownload" width="100%" height="490px" ></video>';
      break;
    default:
      echo "Lo siento solo tengo visible: MP4";
      break;
  }
?>