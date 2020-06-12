<?php

include_once('../conexion.php');

$consulta = "SELECT * from pedidos";
$resultado = mysqli_query($connection, $consulta);

if (!$resultado) {
    die('Fallo Consulta' . mysqli_error($connection));
}

$json = array();
while ($fila = mysqli_fetch_array($resultado)) {
    $json[] = array(
        'Id' => $fila['id'],
        'nombre' => $fila['Nombrecliente'],
        'correo' => $fila['Correocliente'],
        'direccion' => $fila['Direccion'],
        'idproducto' => $fila['Idproducto'],
        'nombreproducto' => $fila['Nombreproducto'],
        'cantidad' => $fila['cantidad'],
        'total' => $fila['total'],
        'fecha' => $fila['fecha']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;
