<?php session_start() ?>
<?php date_default_timezone_set('America/Caracas'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body>
    <header>
        <div class="izq">
            <label for="switch-nav" class="menu">
                <svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 297 297" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <path d="M66.102,0H15.804C7.089,0,0,7.089,0,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804V15.804C81.907,7.089,74.817,0,66.102,0z"/>
                            <path d="M173.649,0h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804V15.804C189.453,7.089,182.364,0,173.649,0z"/>
                            <path d="M66.102,107.547H15.804C7.089,107.547,0,114.636,0,123.351v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C81.907,114.636,74.817,107.547,66.102,107.547z"/>
                            <path d="M173.649,107.547h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C189.453,114.636,182.364,107.547,173.649,107.547z"/>
                            <path d="M281.196,0h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804V15.804C297,7.089,289.911,0,281.196,0z"/>
                            <path d="M281.196,107.547h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C297,114.636,289.911,107.547,281.196,107.547z"/>
                            <path d="M66.102,215.093H15.804C7.089,215.093,0,222.183,0,230.898v50.298C0,289.911,7.089,297,15.804,297h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C81.907,222.183,74.817,215.093,66.102,215.093z"/>
                            <path d="M173.649,215.093h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C189.453,222.183,182.364,215.093,173.649,215.093z"/>
                            <path d="M281.196,215.093h-50.298c-8.715,0-15.804,7.089-15.804,15.804v50.298c0,8.715,7.089,15.804,15.804,15.804h50.298
                                c8.715,0,15.804-7.089,15.804-15.804v-50.298C297,222.183,289.911,215.093,281.196,215.093z"/>
                        </g>
                    </g>
                </g>
                </svg>
            </label>
            <h1>
                Administraci&Oacute;n
            </h1>
        </div>
        <div class="der">
            <?= $_SESSION['usuario']->usuario ?>
        </div>
    </header>
    <div class="container">
        <input type="checkbox" name="" id="switch-nav">
        <nav>
            <ul class="container-list">
                <a href="../view/Omisiones.php">
                    <li class="item-list">Omisiones</li>
                </a>
                <a href="../view/Control.php">
                    <li class="item-list">Control de personal</li>
                </a>
                <a href="../view/Empleados.php">
                    <li class="item-list">Empleados registrados</li>
                </a>
                <a href="">
                    <li class="item-list">Cerrar sesion</li>
                </a>
            </ul>
        </nav>
        <main>
