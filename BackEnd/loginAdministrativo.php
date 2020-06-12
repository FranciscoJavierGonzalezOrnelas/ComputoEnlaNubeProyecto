<?php

session_start();

include_once 'conexion.php';

$usuario_login = $_POST['login_usuario'];
$contrasena_login = $_POST['login_contrasena'];


//Verificar que existe el usuario
$consulta = "SELECT * From adminuser where usernick='$usuario_login'";
$resultado = mysqli_query($connection, $consulta);
$user = mysqli_fetch_array($resultado);

if (!$user){
    echo "<script>
            alert('Usuario No Existe'); 
            window.location.href ='../FrontEnd/adminLogin.php'
            </script>";
}
if ($contrasena_login==$user['usercontrasena']){
    $_SESSION['admin'] = $usuario_login;
    header('Location: ../FrontEnd/PortalAdministrativo.php');
}else {
    echo "<script>
            alert('Contraseña Incorrecta'); 
            window.location.href ='../FrontEnd/adminLogin.php'
            </script>";
 }
?>
