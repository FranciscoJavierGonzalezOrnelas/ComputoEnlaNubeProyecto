<?php
    include('../conexion.php');

    $tipo = $_POST['tipo'];
    $name = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen'];


    if($imagen["type"] =="image/jpg" or $imagen["type"] == "image/jpeg" or $imagen["type"] == "image/png"){
        $rutaMover = "../../FrontEnd/img/".md5($imagen["tmp_name"]).".jpg";
        move_uploaded_file($imagen["tmp_name"],$rutaMover);

        $rutaDB = "img/".md5($imagen["tmp_name"]).".jpg";

        $consulta = "INSERT INTO productos(tipo, nombrepro, precio, stock, descripcion, imagen) VALUES ('$tipo','$name','$precio','$stock','$descripcion','$rutaDB')";
        $resultado = mysqli_query($connection, $consulta);

        if(!$resultado){
            die('Consulta Fallida');
        }
        echo 'Producto Agregado Correctamente';
    }
    else{
        echo "Por favor Suba una imagen";
    }
