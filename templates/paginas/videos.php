
<div id="principal">
	<h1>Seccion de videos</h1>

	<div id="videos">
		<?php \fragment\iterateSQLResult('item', 'videos', \videos\getList($_GET)); ?>
	</div>

</div>