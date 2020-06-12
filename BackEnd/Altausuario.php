<?php

include('conexion.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


if(verificarCorreo($correo,$connection)==1){
    echo "<script>
            alert('El correo ya existe, por favor ingrese otro correo'); 
            window.location.href ='../FrontEnd/index.php'
            </script>";
}else{
    if (strlen($contrasena) < 6) {
        echo "<script>
            alert('La contraseña debe ser mayor a 5 caracteres'); 
            window.location.href ='../FrontEnd/index.php'
            </script>";
    } else {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO clientes(nombre,correo,contrasena,direccion,telefono) VALUES ('$nombre','$correo','$contrasena','$direccion','$telefono')";
        $resultado = mysqli_query($connection, $consulta);
        if (!$resultado) {
            die('Consulta Fallida');
            echo "<script>
            alert('Consulta Fallida'); 
            window.location.href ='../FrontEnd/index.php'
            </script>";
        } else {
            echo "<script>
            alert('Se ha registrado correctamente'); 
            window.location.href ='../FrontEnd/index.php'
            </script>";
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
