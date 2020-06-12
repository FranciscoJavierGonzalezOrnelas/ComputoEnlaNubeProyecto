<?php
session_start();
if (isset($_SESSION["user"])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
    <link rel="stylesheet" href="css/registroStyle.css">
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
            <div class="nav">
                <a href="index.php"><u>Productos</u></a>
                <a href="nosotros.html"><u>Nosotros</u></a>
            </div>
            <div class="salir">
                <a href="index.php"><u>Inicio</u></a>
            </div>
        </div>
    </header>
    <div class='container-form'>
        <h1>Registro Usuario</h1>
        <form class="formulario" action="../BackEnd/Altausuario.php" method="POST">
            <p>
                <label>Nombre:</label><br>
                <input type="text" class="txt" name="nombre" id="nombre" required>
            </p>
            <p>
                <label>Correo:</label><br>
                <input type="email" class="txt" name="correo" id="correo" required>
            </p>
            <p>
                <label>Contraseña:</label><br>
                <input type="password" class="txt" name="contrasena" id="contrasena" required> <button id="eye" onclick="mostrar()" type="button"><i class="far fa-eye"></i></button><button id="eyeSlash" onclick="ocultar()" type="button" style="display: none;"><i class="far fa-eye-slash"></i></button>
            </p>
            <p>
                <label>Dirección:</label><br>
                <input type="text" class="txt" name="direccion" id="direccion" required>
            </p>
            <p>
                <label>Telefono:</label><br>
                <input type="number" class="no" name="telefono" id="telefono" required>
            </p><br>
            <button type="submit" class="btn">Registrarse</button>
            <button type="reset" class="btn btn-cancel">Reset</button>
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