<?php
    require_once("../class/Ciudades.php");
    $post = (object) $_POST;

    (isset($post->insertar_ciudad)) && Ciudades::Insertar($post);
    // (isset($post->id_area)) && Ciudades::Modificar($post);
?>