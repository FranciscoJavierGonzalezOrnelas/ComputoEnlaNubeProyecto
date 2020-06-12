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
    <link rel="stylesheet" href="css/adminProductosStyle.css">
    <link rel="shortcut icon" href="img/Design/icono.jpg">
    <link href="https://fonts.googleapis.com/css?family=Asap:600|Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2f93de33a8.js" crossorigin="anonymous"></script>
    <title>Productos</title>
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
            <h2>Administración de Productos</h2><br>
        </div>
        <div class="container-form">
            <form class="formulario" id="form-productos" name="form-productos" enctype="multipart/form-data">
                <input type="hidden" name="Id" id="Id">
                <p>
                    <label>Tipo:</label><br>
                    <select name="tipo" id="tipo" required>
                        <option>Electrónicos</option>
                        <option>Ropa</option>
                        <option>Muebles</option>
                        <option>Juguetes</option>
                    </select>
                </p>
                <p>
                    <label>Nombre:</label><br>
                    <input type="text" class="txt" name="nombre" id="nombre" required>
                </p>
                <p>
                    <label>Precio:</label><br>
                    <input type="number" class="no" min="0" step="0.01" name="precio" id="precio" required>
                </p>
                <p>
                    <label>Stock:</label><br>
                    <input type="number" min="0" class="no" name="stock" id="stock" required>
                </p>
                <p>
                    <label>Descripción:</label><br>
                    <textarea name="descripcion" class="txt" id="descripcion" cols="40" rows="4" required></textarea>
                </p>
                <p>
                    <label id="label-imagen">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen" required>
                </p>
                <p class="nota">Nota: Al editar un producto si no desea cambiar la imagen, no cargue ninguna imagen.</p>
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
                        <td class="titulo col-tipo">Tipo</td>
                        <td class="titulo col-name">Nombre</td>
                        <td class="titulo col-precio">Precio</td>
                        <td class="titulo col-stock">Stock</td>
                        <td class="titulo col-descripcion">Descripción</td>
                        <td class="titulo col-imagen">Imagen</td>
                        <td class="botones col-edit"></td>
                        <td class="botones col-delete"></td>
                    </tr>
                </thead>
                <tbody id="productos"></tbody>
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
    <script src="js/appProductos.js"></script>
</body>

</html>