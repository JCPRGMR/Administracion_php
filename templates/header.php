<?php session_start();?>
<?php (!isset($_SESSION['usuario'])) && header('Location: ../'); ?>
<?php date_default_timezone_set('America/Caracas'); ?>
<style>
    .menu{
        display: flex;
        width: 40px;
    }
    main{
        overflow: auto;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/rtp_icono.png" type="image/x-icon">
    <title>Administracion</title>
</head>
<body>
    <header>
        <div class="izq">
            <label for="switch-nav" class="menu">
                <img src="../img/rtp_icono.png" alt="">
            </label>
            <h1>
                Administraci&Oacute;n
            </h1>
        </div>
        <div class="der">
        <div class="user-box">
            <label class="user-data b-shadow-5-1-gray" for="user">
                <div class="user-name p10">
                    <?= $_SESSION['usuario']->nombres ?>
                </div>
                <div class="user-pic pic-z30 p5">
                </div>
            </label>
            <input type="checkbox" name="" id="user" class="on-menu-user ghost">
                <div class="user-options">
                    <div class="btn-w-i">
                        <div class="btn-icon p10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div class="btn-text">Perfil</div>
                    </div>
                    <div class="btn-w-i">
                        <div class="btn-icon p10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                            </svg>
                        </div>
                        <div class="btn-text">Configuracion</div>
                    </div>
                    <div class="btn-w-i">
                        <div class="btn-icon p10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                                <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                            </svg>
                        </div>
                        <div class="btn-text">Cerrar sesion</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <input type="checkbox" name="" id="switch-nav">
        <nav>
            <div class="img" style="display: flex; box-sizing: border-box; padding: 10px;">
                <img src="../img/rtp_logo_blanco.png" alt="">
            </div>
            <ul class="container-list">
                <a href="../view/Omisiones.php">
                    <li class="item-list">Omisiones, Permisos y Marcaciones</li>
                </a>
                <a href="../view/Control.php">
                    <li class="item-list">Ingreso y Salida de personal</li>
                </a>
                <a href="../view/Empleados.php">
                    <li class="item-list">Registro de personal</li>
                </a>
                <?php if($_SESSION['usuario']->des_rol == 'Administrador'): ?>
                    <a href="../view/Usuarios.php" >
                        <li class="item-list">
                            Registro de usuarios
                        </li>
                    </a>
                <?php endif; ?>
                <a href="../request/cerrar_sesion.php">
                    <li class="item-list" style="font-weight: bold; color: red;">Cerrar sesion</li>
                </a>
            </ul>
        </nav>
        <main>
