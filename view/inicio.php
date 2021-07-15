<?php
    if(isset($_SESSION['id_usuario'])){

    

?>


<link rel="stylesheet" href="<?=SERVIDOR?>css/main.css">

    <header class="bg_animate">
        <div class="header_nav">
            <div class="contenedor">
                <h1>CDMX CAMP</h1>
            </div>
        </div>

        <section class="banner contenedor">
            <secrion class="banner_title">
                <h2>Tu mejor eleccion en <br> Conferencias</h2>
                <a href="conferencias" class="conferencias">Nuevas conferencias</a>
            </secrion>
            <div class="banner_img">
                <img src="laptop-support.png" alt="">
            </div>
        </section>

        <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
        </div>
    </header>






<?php

    }else{
        header("location:login");
    }

?>