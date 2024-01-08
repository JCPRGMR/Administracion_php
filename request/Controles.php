<?php
    require("../class/Controles.php");
    $post = (object) $_POST;
    (isset($post->nuevo_control)) && Controles::Insertar($post);
?>