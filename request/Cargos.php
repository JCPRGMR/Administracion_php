<?php
    require_once("../class/Cargos.php");
    $post = (object) $_POST;

    (isset($post->insertar_cargo)) && Cargos::Insertar($post);
    (isset($post->id_cargo)) && Cargos::Modificar($post);
?>