<?php


    function conexion(){
        //Instanciamos la conexion a la bd
        $conexion = new mysqli('localhost', 'root', '', 'conferencia');
        //si hay un error al conectarnos que nos mande un echo con el mensaje del error
        if($conexion->connect_errno){
            echo 'Error en la conexion'.$conexion->connect_error;
        }
        //le indicamos con que formato de codificacion vamos a trabajar
        $conexion->set_charset("utf8"); 
        //retornamos la conexion
        return $conexion;



    }




?>