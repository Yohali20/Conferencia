<?php
    if(isset($_SESSION['id_usuario'])){
        require_once 'config/conexion.php';
        $id_usuario = $_SESSION['id_usuario'];
        $conexion = conexion();
        $query = "SELECT id_archivo,categoria,nombre_conferencia,nombre_archivo,precio,descripcion FROM archivo WHERE id_usuario = $id_usuario";
        $result = mysqli_query($conexion, $query);
?>
<div class="container">
    <button type="button" class="btn w-25 mt-2 btn-outline-dark" data-bs-toggle="modal"
        data-bs-target="#exampleModal">Crear Categoria</button>

    <button type="button" class="btn w-25 mt-2 btn-outline-dark" data-bs-toggle="modal"
        data-bs-target="#agr_conferencia">Agregar Conferencia</button>
    <div class="row">
            
        <div class="col mt-2">
        
            <table id="tabla_conferencia" class="table table-striped mt-2 text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($videos = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $videos['categoria'];?></td>
                        <td><?php echo $videos['nombre_conferencia'];?></td>
                        <td><?php echo $videos['precio'];?></td>
                        <th>
                            <span id="btn_editar" class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ver_archivo" onclick="verArchivo(<?php echo $id_usuario;?>,`<?php echo $videos['categoria'];?>`,`<?php echo $videos['nombre_archivo'];?>`,`<?php echo $videos['descripcion']?>`)">
                            <i class="far fa-eye"></i>
                            </span>
                        </th>

                        <th>
                            <span id="btn_eliminar" class="btn btn-outline-danger btn-sm" type="button" 
                            onclick="eliminarConferencia(<?php echo $id_usuario;?>,`<?php echo $videos['categoria'];?>`,`<?php echo $videos['nombre_archivo'];?>`,`<?php echo $videos['nombre_conferencia'];?>`,`<?php echo $videos['id_archivo'];?>`)">
                                <i class="fas fa-trash"></i>
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
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>



<!--Modal Agregar Categoria-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST" id="frm_categoria">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-hashtag"></i></i></span>
                        <input type="text" id="categoria_a" name="categoria_a" class="form-control"
                            placeholder="Categoria a agregar" aria-label="Categoria a agregar"
                            aria-describedby="basic-addon1">
                    </div>
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <span type="button" class="btn btn-info" id="btn_guardar_c">Guardar Categoria</span>
            </div>
        </div>
    </div>
</div>


<!--Modal Agregar Conferencia-->

<div class="modal fade" id="agr_conferencia" tabindex="-1" aria-labelledby="agr_conferenciaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Conferencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST" id="frm_conferencia" enctype="multipart/form-data">
                    
                    <div id="categoriasLoad">
                    </div>
                    <div class="input-group mb-3 mt-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-ad"></i></span>
                        <input type="text" id="nombre_video" name="nombre_video" class="form-control"
                            placeholder="Nombre del video" aria-label="Nombre del video"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="form-label-group">
                            <input type="file" id="inputArchivo" name="inputArchivo" class="form-control-file form-control mt-2" required
                                autofocus> 
                        </div>
                    <div class="input-group mb-3 mt-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" id="precio" name="precio" class="form-control"
                            placeholder="Precio" aria-label="Precio"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 mt-2">
                        <textarea  id="descripcion" name="descripcion" rows="10" cols="70" placeholder="Descripcion de la conferencia:"></textarea>
                    </div>
                    
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <span type="button" class="btn btn-info" id="btn_guardar_conferencia">Guardar Conferencia</span>
            </div>
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



<script src="<?=SERVIDOR?>js/realiza_conferencia.js"></script>





<?php

    }else{
        header("location:login");
    }
?>