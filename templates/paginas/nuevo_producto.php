<?php 

	if(sizeof($_POST)){

		$post	=	$_POST;
		
		if(isset($_FILES["image"])&&array_key_exists("tmp_name",$_FILES["image"])){

			$post["image"]	=	$_FILES["image"]["tmp_name"];

		}else{

			$post["image"]	=	'';
			
		}

		$resultado  = \products\create($post);

	}

?>

<div id="principal">
	
	<form method="POST" action="" enctype="multipart/form-data">
		
		<div class="field">
			<label for="title">Nombre</label>
			<?php \helpers\printFormError("name",$resultado);?>
			
			<input type="text" name="name" value="<?php \helpers\printPostValue('name');?>" />

			<label for="heading">Stock</label>
			<input type="text" name="stock" value="<?php \helpers\printPostValue('stock');?>" />
			<?php \helpers\printFormError("stock",$resultado);?>
		</div>
		<br />
		<div class="field">
			<?php \helpers\printFormError("image",$resultado);?>
			<label for="image">Imagen del producto</label>
			<input type="file" name="image" />
		</div>
		<br />
		
		<h3>Seleccione las categorias del producto</h3>
		<?php \helpers\printFormError("categories",$resultado);?>
		<div class="categories checkbox-list">
			<?php	\fragment\iterateSQLResult('category_checkbox','products',\product\categories\getList());?>
		</div>
		
		<h3>Escriba una descripcion</h3>
		<div class="field">
			
			<?php \helpers\printFormError("description",$resultado);?>
			<textarea class="ckeditor" name="description"><?php \helpers\printPostValue('description');?></textarea>
			
		</div>
		
		<input type="submit" class="submit" value="Cargar producto" />

	</form>
	
</div>