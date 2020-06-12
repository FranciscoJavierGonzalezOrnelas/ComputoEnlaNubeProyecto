<?php

session_start();

include_once 'conexion.php';

$correo_login = $_POST['login_correo'];
$contrasena_login = $_POST['login_contrasena'];

//Verificar que existe el usuario
$consulta = "SELECT * From clientes where correo='$correo_login'";
$resultado = mysqli_query($connection, $consulta);
$user = mysqli_fetch_array($resultado);

if (!$user) {
    echo "<script>
            alert('Usuario No Existe'); 
            window.location.href ='../FrontEnd/userLogin.php'
            </script>";
}
if (password_verify($contrasena_login, $user['contrasena'])) {
    $_SESSION['user'] = $correo_login;
    header('Location: ../FrontEnd/index.php');
} else {
    echo "<script>
            alert('Contraseña Incorrecta'); 
            window.location.href ='../FrontEnd/userLogin.php'
            </script>";
}

?>