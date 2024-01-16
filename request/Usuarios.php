<?php
    require("../class/Usuarios.php");
    $post = (object) $_POST;

    isset($post->nuevo_usuario) && Usuarios::Insertar($post);
    if(isset($post->login)){
        Usuarios::Verificar($post);
    }
?>