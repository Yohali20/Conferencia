<?php 

  require_once 'config/config.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferencia</title>
    <?php require_once 'config/dependencias.php';  ?>
</head>
<body>

<?php
    session_start();
    if(isset($_SESSION['id_usuario'])){
      require_once 'view/navbar.php';
    }
    
    if(isset($_GET['vista_solicitada'])){

      switch($_GET['vista_solicitada']){
        case 'login':{
            require_once 'view/login.php';
            break;
        }
        case 'inicio':{
            require_once 'view/inicio.php';
            break;
        }
        case 'conferencias':{
          require_once 'view/conferencias.php';
          break;
        }
        case 'realiza_conferencia':{
          require_once 'view/realiza_conferencia.php';
          break;
        }
        case 'tus_conferencias':{
          require_once 'view/tus_conferencias.php';
          break;
        }
        
      
      }

    }else{

      require_once 'view/login.php';

    }
  
  ?>
    
</body>
</html>