<?php
session_start(); //start session
include("../BackEnd/conexion2.php"); //include config file
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Tienda Online</title>
	<link rel="shortcut icon" href="img/Design/icono.jpg">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Asap:600|Ubuntu&display=swap" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".form-item").submit(function(e) {
				var form_data = $(this).serialize();
				var button_content = $(this).find('button[type=submit]');
				button_content.html('Adding...');

				$.ajax({
					url: "cart_process.php",
					type: "POST",
					dataType: "json",
					data: form_data
				}).done(function(data) {
					$("#cart-info").html(data.items);
					button_content.html('Add to Cart');
					alert("Item added to Cart!");
					if ($(".shopping-cart-box").css("display") == "block") {
						$(".cart-box").trigger("click");
					}
				})
				e.preventDefault();
			});

			//Show Items in Cart
			$(".cart-box").click(function(e) {
				e.preventDefault();
				$(".shopping-cart-box").fadeIn();
				$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">');
				$("#shopping-cart-results").load("cart_process.php", {
					"load_cart": "1"
				});
			});

			//Close Cart
			$(".close-shopping-cart-box").click(function(e) {
				e.preventDefault();
				$(".shopping-cart-box").fadeOut();
			});

			//Remove items from cart
			$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
				e.preventDefault();
				var pcode = $(this).attr("data-code");
				$(this).parent().fadeOut();
				$.getJSON("cart_process.php", {
					"remove_code": pcode
				}, function(data) {
					$("#cart-info").html(data.items);
					$(".cart-box").trigger("click");
				});
			});

		});
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
				<a href="userLogin.php"><u>Iniciar Sesión Usuario</u></a>
				<a href="../BackEnd/userLogout.php"><u>Cerrar Sesión Usuario</u></a>
				<a href="userRegistro.php"><u>Registrarse</u></a> | 
				<a href="adminLogin.php"><u>Administrador</u></a>
			</div>
		</div>
	</header>
	<div class="page">
		<div align="center">
			<h3>Tienda Lendo Online</h3>
		</div>
		<div align="center">
			Carrito
		</div>
		<a href="#" class="cart-box" id="cart-info" title="View Cart">
			<?php
			if (isset($_SESSION["productos"])) {
				echo count($_SESSION["productos"]);
			} else {
				echo 0;
			}
			?>
		</a>

		<div class="shopping-cart-box">
			<a href="#" class="close-shopping-cart-box">Close</a>
			<h3>Tu carrito</h3>
			<div id="shopping-cart-results">
			</div>
		</div>

		<?php
		//List productos from database
		$results = $mysqli_conn->query("SELECT nombrepro, descripcion, stock, Idpro, imagen, precio FROM productos");
		if (!$results) {
			printf("Error: %s\n", $mysqli_conn->error);
			exit;
		}

		//Display fetched records as you please
		$productos_lista =  '<ul class="productos-wrp">';

		while ($row = $results->fetch_assoc()) {
			$productos_lista .= <<<EOT
<li>
<form class="form-item">
<div class="productos">
	<div class="producto">
	<h4>{$row["nombrepro"]}</h4>
		<div><img class="img_producto" src="{$row["imagen"]}"></div>
		<div>Precio :  $ {$row["precio"]} MXN<div>
		<div class="item-box">
			<div>
			Cantidad :
			<select name="product_qty">
			for($i, $i<10, $i++){
				echo '<p>$1</p>';
			}
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			</select>
	</div>
</div>

	</div>
	
	<div>

    <input name="Idpro" type="hidden" value="{$row["Idpro"]}">
    <button type="submit">Add to Cart</button>
</div>
</form>
</li>
EOT;
		}
		$productos_lista .= '</ul></div>';

		echo $productos_lista;
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