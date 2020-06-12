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
    <link rel="stylesheet" href="css/adminUsuariosStyle.css">
    <link rel="shortcut icon" href="img/Design/icono.jpg">
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
            $hide = document.getElementById("contrasena");
            $show.type = "password";
            $btnEye = document.getElementById("eye");
            $btnEye.style.display = "inline";
            $btnSleye = document.getElementById("eyeSlash");
            $btnSleye.style.display = "none";
        }
    </script>
    <title>Usuarios</title>
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
            <h2>Administración de Usuarios/Clientes</h2><br>
        </div>
        <div class="container-form">
            <form class="formulario" id="form-usuarios" name="form-usuarios" enctype="multipart/form-data">
                <input type="hidden" name="Id" id="Id">
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
                <p class="nota">Nota: Al editar un usuario si no desea cambiar la contraseña, deje el espacio en blanco.</p>
                <br>
                <button type="submit" class="btn btn-guardar"><i class="fas fa-save"></i> Guardar</button>
                <input type="button" class="btn btn-cancelar" value="Cancelar">

            </form>


        </div>
        <br>
        <div class="container-tabla">
            <table class="tabla">
                <thead>
                    <tr>
                        <td class="titulo col-id">Id</td>
                        <td class="titulo col-name">Nombre</td>
                        <td class="titulo col-mail">Correo</td>
                        <td class="titulo col-address">Dirección</td>
                        <td class="titulo col-tel">Teléfono</td>
                        <td class="botones col-edit"></td>
                        <td class="botones col-delete"></td>
                    </tr>
                </thead>
                <tbody id="usuarios"></tbody>
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
    <script src="js/appUsuarios.js"></script>
</body>

</html>