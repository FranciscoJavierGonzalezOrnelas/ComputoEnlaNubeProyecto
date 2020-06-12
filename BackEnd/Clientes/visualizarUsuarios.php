<?php

    include_once('../conexion.php');

    $consulta = "SELECT * from clientes";
    $resultado = mysqli_query($connection, $consulta);

    if(!$resultado){
        die('Fallo Consulta' . mysqli_error($connection));
    }

    $json = array();
    while($fila = mysqli_fetch_array($resultado)){
        $json[] = array(
            'Id' => $fila['Idcli'],
            'nombre' => $fila['nombre'],
            'correo' => $fila['correo'],
            'direccion' => $fila['direccion'],
            'telefono' => $fila['telefono']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
