<?php
session_start();

//Verificamos si hay sesion de usuario
if (!isset($_SESSION['admin'])) {
    header('Location: adminLogin.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminUsuariosStyle.css">
    <link rel="shortcut icon" href="img/Design/icono.jpg">
    <link href="https://fonts.googleapis.com/css?family=Asap:600|Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>

    <title>Portal Administrativo</title>
</head>

<body>
    <header class="Encabezado">
        <div class="Menu">
            <div class="logo">
                <a href="PortalAdministrativo.php"><img class="Imagenlogo" src="img/Design/logo.png"></a>
            </div>
            <div class="nav">
                <a href="adminProductos.php"><u>Productos</u></a>
                <a href="adminUsuarios.php"><u>Clientes</u></a>
                <a href="adminPedidos.php"><u>Pedidos</u></a>
            </div>
            <div class="salir">
                <a href="../BackEnd/cerrarSesion.php"><u>Cerrar Sesión</u></a>
            </div>
        </div>
    </header>
    <div class="container-all">
        <div class="top">
            <h1>Portal Administrativo</h1> <br>
            <h2>Bienvenido al Portal Administrativo de Lendo</h2><br>
        </div>
        <div class="container-imagen">
            <img class="imagen" src="img/Design/icono.jpg">
        </div>

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