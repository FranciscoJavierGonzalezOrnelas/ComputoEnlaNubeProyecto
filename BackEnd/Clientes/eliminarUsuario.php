<?php

    include('../conexion.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }



    $consulta = "DELETE FROM clientes WHERE Idcli = $id";
    $resultado = mysqli_query($connection, $consulta);
    echo "Usuario Eliminado Exitosamente";

    if (!$resultado) {
        die('Consulta Fallida2');
    }

?>
