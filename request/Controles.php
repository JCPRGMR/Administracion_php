<?php
    require("../class/Controles.php");
    $post = (object) $_POST;
    (isset($post->nuevo_control)) && Controles::Insertar($post);
    (isset($post->id_salida)) && Controles::Insertar_Salida($post);
?>