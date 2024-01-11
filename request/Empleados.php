<?php
    require("../class/Empleados.php");
    $post = (object)$_POST;
    isset($post->insertar_usuario) && Empleados::Insertar($post);
    isset($post->eliminar) && Empleados::Eliminar($post);
?>