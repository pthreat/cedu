<?php 

	if(sizeof($_POST)){

		$resultado  = \news\create($_POST);

	}

?>

<div id="principal">
	
	<form method="POST" action="">
		<?php 
			if(isset($resultado)&&$resultado === TRUE){ 
				\fragment\load('save_success','forms');
			}
		?>
		<div class="field">
			<label for="title">Titulo</label>
			<?php \helpers\printFormError("title",$resultado);?>
			
			<input type="text" name="title" value="<?php \helpers\printPostValue('title');?>" />

			<label for="heading">Encabezado</label>
			<input type="text" name="heading" value="<?php \helpers\printPostValue('heading');?>" />
			<?php \helpers\printFormError("heading",$resultado);?>
		</div>
		
		<div class="field">
			
			<?php \helpers\printFormError("body",$resultado);?>
			
			<textarea class="ckeditor" name="body"><?php \helpers\printPostValue('body');?></textarea>
			
		</div>
		
		<input type="submit" class="btn-red" value="Cargar" />

	</form>
	
</div>

