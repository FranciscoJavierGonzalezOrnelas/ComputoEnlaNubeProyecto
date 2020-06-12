<?php
session_start(); //start session
include("../BackEnd/conexion2.php");
if (!isset($_SESSION['user'])) {
	header('Location: userLogin.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Revisa tu carrito</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script>
		function comprar(id, nombre, precio, cantidad, usuario) {
			alert(id);
			alert(nombre);
			alert(precio, cantidad);
			alert(cantidad);
			alert(usuario);
		}
	</script>
</head>

<body>
	<header class="Encabezado">
		<div class="Menu">
			<div class="logo">
				<a href="index.php"><img class="Imagenlogo" src="img/Design/logo.png"></a>
			</div>
			<div class="nav">
				<a href="index.php"><u>Productos</u></a>
				<a href="nosotros.html"><u>Nosotros</u></a>
			</div>
			<div class="salir">
				<a href="../BackEnd/userLogout.php"><u>Cerrar Sesión Usuario</u></a>
			</div>
		</div>
	</header>
	<div class="page">
		<h3 style="text-align:center">Revisa tu carrito</h3>
		<?php
		if (isset($_SESSION["productos"]) && count($_SESSION["productos"]) > 0) {
			$total 			= 0;
			$cart_box 		= '<ul class="view-cart">';

			foreach ($_SESSION["productos"] as $product) { //Print each item, quantity and price.
				$nombrepro = $product["nombrepro"];
				$product_qty = $product["product_qty"];
				$precio = $product["precio"];
				$Idpro = $product["Idpro"];
				$user = $_SESSION['user'];


				$item_price 	= sprintf("%01.2f", ($precio * $product_qty));  // price x qty = total item price

				$cart_box 		.=  "<li> $Idpro &ndash;  $nombrepro (Cantidad : $product_qty ) <span>  $item_price </span></li>";

				$subtotal 		= ($precio * $product_qty); //Multiply item quantity * price
				$total 			= ($total + $subtotal); //Add up to total price
			}

			$grand_total = $total; //grand total


			//Print Shipping, VAT and Total
			$cart_box .= "<li class=\"view-cart-total\">  <hr>Cuenta Total : " . sprintf($grand_total) . "</li>";
			$cart_box .= "</ul>";
			$button_buy = "<form action=\"../BackEnd/comprar.php\" method=\"POST\">
							<input type=\"text\" name=\"id\" value=\"$Idpro\" hidden>
							<input type=\"text\" name=\"nombre\" value=\"$nombrepro\" hidden>
							<input type=\"text\" name=\"precio\" value=\"$precio\" hidden>
							<input type=\"text\" name=\"cantidad\" value=\"$product_qty\" hidden>
							<input type=\"text\" name=\"usuario\" value=\"$user\" hidden>";
			$button_buy .= "<button class=\"boton\" type=\"submit\" >Comprar</button>";

			echo $cart_box;
			echo $button_buy;
		} else {
			echo "Your Cart is empty";
		}
		?>

	</div>

	<div class="Footer">
		<div class="info">
			<div class="copy">
				<p>Copyright © 2020 Lendo Inc. All rights reserved.</p>
			</div>
		</div>
	</div>
</body>

</html>