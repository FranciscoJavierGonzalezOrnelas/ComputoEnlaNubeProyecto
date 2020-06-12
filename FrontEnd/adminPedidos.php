<?php
session_start();

//Verificamos si hay sesion de usuario
if (!isset($_SESSION['admin'])) {
    header('Location: adminLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminPedidosStyle.css">
    <link rel="shortcut icon" href="img/Design/icono.jpg">
    <link href="https://fonts.googleapis.com/css?family=Asap:600|Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>
    <title>Pedidos</title>
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
            <h2>Administración de Pedidos</h2><br>
        </div>
        <br>
        <div class="container-tabla">
            <table class="tabla">
                <thead>
                    <tr>
                        <td class="titulo col-id">Id Pedido</td>
                        <td class="titulo col-name">Nombre Cliente</td>
                        <td class="titulo col-mail">Correo Cliente</td>
                        <td class="titulo col-address">Dirección Cliente</td>
                        <td class="titulo col-idPro">Id Producto</td>
                        <td class="titulo col-nomPro">Nombre Producto</td>
                        <td class="titulo col-cant">Cantidad</td>
                        <td class="titulo col-total">Total</td>
                        <td class="titulo col-fecha">Fecha</td>

                    </tr>
                </thead>
                <tbody id="pedidos"></tbody>
            </table>
        </div>
    </div>
    <div class="Footer">
        <div class="info">
            <div class="copy">
                <p>Copyright © 2020 Lendo Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/appPedidos.js"></script>
</body>

</html>