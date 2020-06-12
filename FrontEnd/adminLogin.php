<?php
session_start();
if (isset($_SESSION["admin"])) {
    header('location: PortalAdministrativo.php');
}
if (isset($_SESSION["user"])) {
    header('location: index.php');
}
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Administrativo</title>
        <link rel="stylesheet" href="css/loginStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Asap:600|Ubuntu&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>
        <script>
            function mostrar() {
                $show = document.getElementById("contrasena");
                $show.type = "text";
                $btnEye = document.getElementById("eye");
                $btnEye.style.display = "none";
                $btnSleye = document.getElementById("eyeSlash");
                $btnSleye.style.display = "inline";
            }

            function ocultar() {
                $show = document.getElementById("contrasena");
                $show.type = "password";
                $btnEye = document.getElementById("eye");
                $btnEye.style.display = "inline";
                $btnSleye = document.getElementById("eyeSlash");
                $btnSleye.style.display = "none";
            }
        </script>
    </head>

    <body>
        <header class="Encabezado">
            <div class="Menu">
                <div class="logo">
                    <a href="index.php"><img class="Imagenlogo" src="img/Design/logo.png"></a>
                </div>
                <div class="salir">
                    <a href="index.php"><u>Inicio</u></a>
                </div>
            </div>
        </header>
        <div class='container-form'>
            <h1>Login Administrativo</h1>
            <form class="formulario" action="../BackEnd/loginAdministrativo.php" method="POST">
                <p>
                    <input type="text" name="login_usuario" placeholder="Usuario" required>
                </p>
                <p class="password">
                    <input type="password" id="contrasena" name="login_contrasena" placeholder="Contraseña" required> <button id="eye" class="eye" onclick="mostrar()" type="button"><i class="fas fa-eye"></i><button id="eyeSlash"
                        class="eyeSlash" onclick="ocultar()" type="button" style="display: none;"><i
                            class="fas fa-eye-slash"></i></button>
                </p>
                <p>
                    <button class="login" type="submit">Login</button>
                </p>
            </form>
        </div>
        <div class="Footer">
            <div class="info">
                <div class="copy">
                    <p>Copyright © 2020 Lendo Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>

    </html>