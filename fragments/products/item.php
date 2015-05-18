<div class="product">
	
	<h3><?php echo $data["name"];?></h3>

	<?php $images = \products\getImages($data["id"]);?>

	<?php foreach($images as $image){ ?>
		<img src="<?php echo $image;?>" title="<?php echo $data["name"];?>" />
	<?php } ?>
	<div class="details">
		<span>$<?php echo $data["price"];?> Stock: <?php echo $data["stock"];?></span>
	</div>
	
	<br />

	<?php \fragment\load('buyButton','products',$data);?>
	<?php \fragment\load('viewButton','products',$data);?>
</div>