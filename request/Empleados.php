<?php
    require("../class/Empleados.php");
    $post = (object)$_POST;
    isset($post->insertar_usuario) && Empleados::Insertar($post);
    isset($post->eliminar) && Empleados::Eliminar($post);
    isset($post->send_excel) && Empleados::Importar_Excel($_FILES['Subir']);
?>