<?php

    include('../conexion.php');

    $id = $_POST['Id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];


    if(empty($contrasena)){
        if (verificarMail($id,$correo, $connection) == 1) {
            echo "El correo ya existe, por favor ingrese otro correo";
        }else{
            $consulta = "UPDATE clientes SET nombre = '$nombre', correo = '$correo', direccion = '$direccion', telefono = '$telefono' WHERE Idcli = '$id'";
            $resultado = mysqli_query($connection, $consulta);

            if (!$resultado) {
                die('Consulta Fallida');
            }
            echo 'Usuario Actualizado Correctamente';
              
        }
            
    }
    else{
        if (verificarMail($id, $correo, $connection) == 1) {
            echo "El correo ya existe, por favor ingrese otro correo";
        }else{
            if (strlen($contrasena) < 6) {
                echo "La contraseña debe ser mayor a 5 caracteres";
            }else{
                $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

                $consulta = "UPDATE clientes SET nombre = '$nombre', correo = '$correo', contrasena = '$contrasena', direccion = '$direccion', telefono = '$telefono' WHERE Idcli = '$id'";

                $resultado = mysqli_query($connection, $consulta);

                if (!$resultado) {
                    die('Consulta Fallida');
                }
                echo 'Clientes Actualizado Correctamente';
            }
            
        }
        
    }

    function verificarMail($id, $mail, $conexion)
    {


        $consultamail = "SELECT * FROM clientes WHERE correo = '$mail' AND Idcli != $id";
        $resultado_mail = mysqli_query($conexion, $consultamail);

        if (mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

