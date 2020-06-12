<?php
session_start();
include_once("../BackEnd/conexion2.php");
setlocale(LC_MONETARY,"en_US"); 

if(isset($_POST["Idpro"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}
	
	//we need to get product name and price from database.
	$statement = $mysqli_conn->prepare("SELECT nombrepro, precio FROM productos WHERE Idpro=? LIMIT 1");
	$statement->bind_param('s', $new_product['Idpro']);
	$statement->execute();
	$statement->bind_result($nombrepro, $precio);
	

	while($statement->fetch()){ 
		$new_product["nombrepro"] = $nombrepro; //fetch product name from database
		$new_product["precio"] = $precio;  //fetch product price from database
		
		if(isset($_SESSION["productos"])){  //if session var already exist
			if(isset($_SESSION["productos"][$new_product['Idpro']])) //check item exist in productos array
			{
				unset($_SESSION["productos"][$new_product['Idpro']]); //unset old item
			}			
		}
		
		$_SESSION["productos"][$new_product['Idpro']] = $new_product;	//update productos with new item array	
	}
	
 	$total_items = count($_SESSION["productos"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json 

}

################## list productos in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["productos"]) && count($_SESSION["productos"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-productos-loaded">';
		$total = 0;
		foreach($_SESSION["productos"] as $product){ //loop though items and prepare html content
			
			//set variables to use them in HTML content below
			$nombrepro = $product["nombrepro"]; 
			$precio = $product["precio"];
			$Idpro = $product["Idpro"];
			$product_qty = $product["product_qty"];
			
			
			$cart_box .=  "<li> $nombrepro (Qty : $product_qty | ) &mdash; ".sprintf("%01.2f", ($precio * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$Idpro\">&times;</a></li>";
			$subtotal = ($precio * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-productos-total">Total : '.sprintf("%01.2f",$total).' <u><a href="view_cart.php" title="Review Cart and Check-Out">Check-out</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["productos"]))
{
	$Idpro   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["productos"][$Idpro]))
	{
		unset($_SESSION["productos"][$Idpro]);
	}
	
 	$total_items = count($_SESSION["productos"]);
	die(json_encode(array('items'=>$total_items)));
}