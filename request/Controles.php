<?php
    require("../class/Controles.php");
    $post = (object) $_POST;
    (isset($post->insertar_ingreso)) && Controles::Insertar_Ingreso($post);
    (isset($post->insertar_salida)) && Controles::Insertar_Salida($post);
    
    (isset($post->id_ingreso)) && Controles::Agregar_Ingreso($post);
    (isset($post->id_salida)) && Controles::Agregar_Salida($post);

    // (isset($post->id_obs_ingreso)) && header("Location: ../view/Control_ingreso.php?id=". $post->id_obs_ingreso);
    // (isset($post->id_obs_salida)) && header("Location: ../view/Control_salida.php?id=". $post->id_obs_salida);
    
    (isset($post->id_ingreso_obs)) && Controles::obs_ingreso($post);
    (isset($post->id_salida_obs)) && Controles::obs_salida($post);

    (isset($post->sin_obs_ingreso)) && Controles::obs_ingreso_empty($post);
    (isset($post->sin_obs_salida)) && Controles::obs_salida_empty($post);
?>