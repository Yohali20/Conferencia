<?php

    session_start();

    require_once "../config/conexion.php";

    $conexion = conexion();

    $email = $_POST['correo'];

    $pass = sha1($_POST['contraseña']);

    $sql = "SELECT id_usuario FROM usuario WHERE correo = ? AND contraseña = ?";

    $result = $conexion->prepare($sql);
    
    $result -> bind_param('ss', $email, $pass);

    $result -> execute();

    $result = $result -> get_result();

    $result = $result -> fetch_assoc();

    if($result){
            
            $_SESSION['id_usuario'] = $result['id_usuario'];
            echo 1;
        

    }

    $conexion -> close();









?>