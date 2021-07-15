<?php

  session_start();

  unset($_SESSION['id_usuario']);
  session_destroy();

 
  echo 1;

?>