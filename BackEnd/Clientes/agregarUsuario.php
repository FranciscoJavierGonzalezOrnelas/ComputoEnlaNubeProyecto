<?php

include('../conexion.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


if(verificarCorreo($correo,$connection)==1){
    echo "El correo ya existe, por favor ingrese otro correo";
}else{
    if (strlen($contrasena) < 6) {
        echo "La contraseña debe ser mayor a 5 caracteres";
    } else {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO clientes(nombre,correo,contrasena,direccion,telefono) VALUES ('$nombre','$correo','$contrasena','$direccion','$telefono')";
        $resultado = mysqli_query($connection, $consulta);
        if (!$resultado) {
            die('Consulta Fallida');
        } else {
            echo 'Cliente Agregado Correctamente';
        }
    }
}

function verificarCorreo($mail,$conexion)
{
    $consultaCorreo = "SELECT * FROM clientes WHERE correo = '$mail' ";
    $resultadoCorreo = mysqli_query($conexion, $consultaCorreo);

    if (mysqli_num_rows($resultadoCorreo) > 0) {
        return 1;
    } else {
        return 0;
    }
}
?>
