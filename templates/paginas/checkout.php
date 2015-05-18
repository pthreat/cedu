<?php 

	$factura = \products\cart\getInvoice();
	
	if(!$factura){

		die(\template\error(404));

	}

?>
<div id="principal">

		<table>
			
			<thead>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Total</th>
			</thead>
			<tbody>
			<?php foreach($factura as $compra){ ?>
				<tr>
					<td><?php echo $compra["name"];?></td>
					<td><?php echo $compra["amount"];?></td>
					<td><?php echo $compra["total"];?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	
		<div class="button buy">Pagar con Mercado pago</div>
		<div class="button buy">Pagar con Paypal</div>
		<div class="button buy">Pagar con Dinero Mail</div>

</div>