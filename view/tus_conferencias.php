<?php
    if(isset($_SESSION['id_usuario'])){
        require_once 'config/conexion.php';
        $id_usuario = $_SESSION['id_usuario'];
        $conexion = conexion();
        $query = "SELECT nombre_conferencia,id_archivo FROM conferencias_c WHERE id_usuario = $id_usuario";
        $result = mysqli_query($conexion, $query);
?>
<div class="container">
    <div class="row">
            
        <div class="col mt-2">
        
        <table id="example" class="table table-striped text-center" style="width:100%">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Nombre Conferencia</th>
                <th>Descripcion</th>
                <th>Descargar</th>
                <th>Visualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    while($conferencia = mysqli_fetch_array($result)){
                        $id_archivo = $conferencia['id_archivo'];
                        $q = "SELECT id_usuario,categoria,descripcion,nombre_archivo FROM archivo WHERE id_archivo = $id_archivo";
                        $r = mysqli_query($conexion, $q);
                        $archivo = mysqli_fetch_array($r);
                        $rutaDescarga = "archivos/". $archivo['id_usuario'] . "/" . $archivo['categoria'] . "/" . $archivo['nombre_archivo'];
            ?>
            <tr>
                
                    <td><?php echo $archivo['categoria']?></td>
                    <td><?php echo $conferencia['nombre_conferencia']?></td>
                    <td><?php echo $archivo['descripcion']?></td>
                    <th><a class="btn btn-outline-warning btn-sm" href="<?php echo $rutaDescarga?>" download="<?php echo $archivo['nombre_archivo']?>"><i class="fas fa-download"></i></a></th>

                    <th>
                        <span id="btn_descargar" class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ver_archivo" onclick="verArchivo(<?php echo $archivo['id_usuario'];?>,`<?php echo $archivo['categoria'];?>`,`<?php echo $archivo['nombre_archivo'];?>`,`<?php echo $archivo['descripcion']?>`)">
                            <i class="far fa-eye"></i>
                        </span>
                    </th>
               
            </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Categoria</th>
                <th>Nombre Conferencia</th>
                <th>Descripcion</th>
                <th>Descargar</th>
                <th>Visualizar</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>

<!--Modal ver Conferencia-->
<div class="modal fade" id="ver_archivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        
            <div class="modal-body bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            
                                <div class="row">
                                    <div class="col">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Visualizar Conferencia</h5>
                                        <div id="archivo_observar" class="mt-1"></div>
                                        <div id="descripcion_observar"></div>
                                        <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                                    </div>
                                </div>    
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="<?=SERVIDOR?>js/conferencia_comprada.js"></script>
<?php

    }else{
        header("location:login");
    }
?>