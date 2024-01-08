<?php
    require("../class/Omisiones.php");
    $post = (object) $_POST;
    (isset($post->nueva_omision)) && Omisiones::Insertar($post);
    (isset($post->eliminar)) && Omisiones::Eliminar($post);
    (isset($post->editar)) && header("Location: ../view/Omisiones_modificar.php");
?>