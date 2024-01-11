<?php
    require_once("../class/Usuarios.php");
    Usuarios::Cerrar_sesion();
    header("Location: ../");
?>