<?php
    require_once("../class/Areas.php");
    $post = (object) $_POST;

    (isset($post->insertar_area)) && Areas::Insertar($post);
    (isset($post->id_area)) && Areas::Modificar($post);
?>