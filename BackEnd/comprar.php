<?php

include_once('conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$user = $_POST['usuario'];
$fecha =date('Y-m-d');

$sql = "SELECT * from productos WHERE Idpro = $id";
$resultado = mysqli_query($connection, $sql);

if(!$resultado){
    echo 'error';
}else{
    $stock = mysqli_fetch_array($resultado);
    if ($stock['stock'] < $cantidad) {
        echo "<script>
                alert('No hay suficiente stock');
                alert('El stock actual es de: " . $stock['stock'] . "'); 
                window.location.href ='../FrontEnd/index.php'
                </script>";
    } else {
        $nuevoStock = $stock['stock'] - $cantidad;
        $total = $cantidad * $precio;
        $sql_comprador = "SELECT * from clientes WHERE  correo= '$user'";
        $resultado_comprador = mysqli_query($connection, $sql_comprador);
        $datos = mysqli_fetch_array($resultado_comprador);
        $nombre_comprador = $datos['nombre'];
        $direccion_comprador = $datos['direccion'];

        $sql_compra = "INSERT INTO pedidos(Nombrecliente,Correocliente,Direccion,idproducto,Nombreproducto,cantidad,total,fecha ) VALUES ('$nombre_comprador','$user','$direccion_comprador','$id','$nombre','$cantidad','$total','$fecha')";
        $resultado_compra = mysqli_query($connection, $sql_compra);

        $sql_nuevostock = "UPDATE productos SET stock = '$nuevoStock' WHERE Idpro = '$id'";
        $resultado_stock = mysqli_query($connection, $sql_nuevostock);

        if (!$resultado_stock){
          echo  "<script>
                alert('No se pudo realizar la compra'); 
                window.location.href ='../FrontEnd/index.php'
                </script>";
        }
        elseif(!$resultado_compra){
          echo  "<script>
                alert('No se pudo realizar la compra'); 
                window.location.href ='../FrontEnd/index.php'
                </script>";
        }
        else{
          echo  "<script>
                alert('Felicidades su pedido se ha realizado.'); 
                window.location.href ='../FrontEnd/index.php'
                </script>";
        }
        
    }

}


?>