
<?php
    require_once 'config/conexion.php';
    $conexion = conexion();
    $id_usuario = $_SESSION['id_usuario'];
    $query = "SELECT nombre FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysqli_query($conexion, $query);
    $nombre = mysqli_fetch_array($result);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio">CDMX CAMP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="conferencias">Conferencias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tus_conferencias">Tus Conferencias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="realiza_conferencia">Realiza una conferencia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" >Bienvenid@ <?php echo $nombre['nombre'];?></a>
        </li>
      </ul>
      <form class="d-flex">
      <span class="btn btn-outline-danger" type="submit" id="btn_salir"><i class="fas fa-sign-out-alt"></i> Salir</span>
      </form>
    </div>
  </div>
</nav>

      



<script src="<?=SERVIDOR?>js/salir.js"></script>