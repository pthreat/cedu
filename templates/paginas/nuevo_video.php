<?php 
	
	if(sizeof($_POST)){
	
		$resultado = \videos\create($_POST);

	}

?>
<div id="principal">
	
	<?php 
		if(isset($result)&&$result===TRUE){
			
			\fragment\load('save_success','forms');
				
		}
	?>
	<form method="POST" action="">
		<div>
			<label for="title"> Titulo</label>
			<?php	\helpers\printFormError('title',$resultado);?>
			<input type="text" name="title" value="<?php	\helpers\printPostValue('title');?>"/>
			<label for="title">Hash</label>
			
			<?php	\helpers\printFormError('hash',$resultado);?>
			<input type="text" name="hash" value="<?php \helpers\printPostValue('hash');?>"/>
		</div>
		<br />
		<input type="submit" class="submit" value="Agregar video" />
	</form>
</div>