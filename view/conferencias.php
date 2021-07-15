<?php
    if(isset($_SESSION['id_usuario'])){
        require_once 'config/conexion.php';
        $conexion = conexion();
        $id_usuario = $_SESSION['id_usuario'];
        $query = "SELECT * FROM archivo WHERE id_usuario != $id_usuario";
        $result = mysqli_query($conexion, $query);
?>
<div class="container">
    <div class="row">
        <div class="col mt-3">
            <table id="example" class="table table-hover text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre de la conferencia</th>
                        <th>Precio</th>
                        <th>Conferencista</th>
                        <th>Comprar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                while($conferencia = mysqli_fetch_array($result)){
                    $id_usuario = $conferencia['id_usuario'];
                    $q = "SELECT nombre,apellido_p,apellido_m FROM usuario WHERE id_usuario = $id_usuario";
                    $r = mysqli_query($conexion, $q);
                    $nombre = mysqli_fetch_array($r)
            ?>
                    <tr>
                        <td><?php echo $conferencia['nombre_conferencia']?></td>
                        <td>$<?php echo $conferencia['precio']?></td>
                        <td><?php echo $nombre['nombre'] . " " . $nombre['apellido_p'] . " " . $nombre['apellido_m']?>
                        </td>
                        <td><span id="btn_editar" class="btn btn-outline-success btn-sm" type="button"
                                data-bs-toggle="modal" data-bs-target="#modalCompra"  onclick="infoConferencia(<?php echo $conferencia['id_archivo'];?>)">
                                <i class="fas fa-shopping-cart"></i>
                            </span></td>

                    </tr>
                    <?php
                }
            ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre de la conferencia</th>
                        <th>Precio</th>
                        <th>Conferencista</th>
                        <th>Comprar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!--Modal Compra-->
<div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Realizar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST" id="frm_comprar">
                <div class="input-group mb-3 mt-2">
                    <input type="text" id="id_conferencia" name="id_conferencia" class="form-control"
                        aria-describedby="basic-addon1" hidden="true">
                </div>
                <div class="input-group mb-3 mt-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-ad"></i></span>
                    <input type="text" id="nombre_conferencia" name="nombre_conferencia" class="form-control"
                        placeholder="Nombre de la conferencia" aria-label="Nombre de la conferencia" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3 mt-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-credit-card"></i></span>
                    <input type="text" id="precio_conferencia" name="precio_conferencia" class="form-control"
                        placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3 mt-2">
                        <label>Descripcion:</label>
                        <textarea  readonly id="descripcion_conferencia" name="descripcion_conferencia" style="border: none;" rows="3" cols="65" placeholder="Descripcion de la conferencia:"></textarea>
                </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <span type="button" class="btn btn-primary" id="btn_realizar_compra">Comprar</span>
            </div>
        </div>
    </div>
</div>






<script src="<?=SERVIDOR?>js/conferencias.js"></script>

<?php
}else{
    header("location:login");
}
?>