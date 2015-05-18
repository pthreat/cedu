			<div id="principal">
                            <h1>Nuestros productos</h1>									 
				  <?php \fragment\iterateSQLResult('item','products',\products\getList($_GET));?>
			</div>