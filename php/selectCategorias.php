<?php
    session_start();
    require_once "../config/conexion.php";
    $conexion = conexion();
    $idUsuario = $_SESSION['id_usuario'];

    $sql ="SELECT id_categoria,nombre_c FROM categoria WHERE id_usuario = '$idUsuario'";
    $result = mysqli_query($conexion, $sql);
    


?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <option value="">Selecciona la categoria</option>
    <?php
        while($mostrar = mysqli_fetch_array($result)){
            $id_categoria = $mostrar['id_categoria'];

    ?>  
        
        <option value="<?php echo $id_categoria?>"><?php echo $mostrar['nombre_c'];?></option>

    <?php
        }
    ?>




</select>