<?php
    require("../class/Usuarios.php");
    $post = (object) $_POST;


    if(isset($post->login)){
        Usuarios::Verificar($post);
    }
?>