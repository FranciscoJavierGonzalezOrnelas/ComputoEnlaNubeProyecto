<?php
    include('../conexion.php');
    $id = $_POST['id'];
    $consulta = "SELECT * from clientes WHERE Idcli = $id";
    $resultado = mysqli_query($connection, $consulta);

    if (!$resultado) {
        die('Fallo Consulta' . mysqli_error($connection));
    }

    $json = array();
    while ($fila = mysqli_fetch_array($resultado)) {
        $json[] = array(
            'id' => $fila['Idcli'],
            'nombre' => $fila['nombre'],
            'correo' => $fila['correo'],
            'contrasena' => $fila['contrasena'],
            'direccion' => $fila['direccion'],
            'telefono' => $fila['telefono']
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
