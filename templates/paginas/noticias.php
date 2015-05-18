
			<div id="principal">
                            <h1>Seccion de noticias</h1>

                            <?php  \fragment\iterateSQLResult('item','news',  \news\getList($_GET));?>
									 
			</div>