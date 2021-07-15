<link rel="stylesheet" href="<?=SERVIDOR?>css/login.css">
<div class="sidenav">
    <div class="login-main-text">
        <h2>CDMX CAMP</h2>
        <p>Logueate para poder acceder</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form action="POST" id="frm_login"> 
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input id="correo" name="correo" type="text" class="form-control" placeholder="Ejem: example@domain.com">
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="Contraseña">
                </div>
                <span type="submit" class="btn btn-black mt-3" id="btn_entrar">Entrar</span>
                <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Registrar</button>
            </form>
        </div>
    </div>
</div>



<!--Modal de Registro-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST" id="frm_registrar_usuario">
                    <div class="input-group mb-3">
                        <label for="nombre" class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></label>
                        <input id="nombre" name="nombre"type="text" class="form-control" placeholder="Nombre" aria-label="Nombre"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        <input type="text" id="apellido_p" name="apellido_p" class="form-control" placeholder="Apellido Paterno" aria-label="Apellido Paterno"
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        <input type="text" id="apellido_m" name="apellido_m" class="form-control" placeholder="Apellido Materno" aria-label="Apellido Materno"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                        <input type="date" id="fecha_n" name="fecha_n" class="form-control" placeholder="Fecha de Nacimiento" aria-label="Fecha de Nacimiento"
                            aria-describedby="basic-addon1"  max=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                        <input type="text" id="correo_r" name="correo_r" class="form-control" placeholder="Correo Electronico" aria-label="Correo Electronico"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        <input type="password" id="contraseña_r" name="contraseña_r" class="form-control" placeholder="Contraseña" aria-label="Contraseña"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        <input type="password" id="c_contraseña" name="c_contraseña" class="form-control" placeholder="Confirma tu contraseña" aria-label="Confirma tu contraseña"
                            aria-describedby="basic-addon1">
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_guardar_info">Registrarse</button>
            </div>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>js/login.js"></script>
<script src="<?=SERVIDOR?>js/registrar.js"></script>
