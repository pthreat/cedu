<?php

	$idProducto = empty($_GET["idProducto"]) ? -1 : $_GET["idProducto"];

	$producto    = \products\cart\add($idProducto);
	
	if(!$producto){

		die(\templates\error(404));

	}

?>

<div id="principal">
	
	<h1>Compraste <?php echo $producto["name"];?></h1>
	
	<h2>Quiere pagar o seguir comprando?</h2>
	
	<a href="/index.php?pagina=checkout">Pagar!</a>
	<a href="/index.php?pagina=productos">Seguir comprando</a>

</div>	