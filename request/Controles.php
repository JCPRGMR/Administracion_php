<?php
    require("../class/Controles.php");
    $post = (object) $_POST;
    (isset($post->nuevo_control)) && Controles::Insertar($post);
    (isset($post->id_salida)) && Controles::Insertar_Salida($post);

    (isset($post->obs_ingreso)) && Controles::obs_ingreso($post);
    (isset($post->obs_salida)) && Controles::obs_salida($post);
?>