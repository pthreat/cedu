<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>

		<head>

			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		    <!-- Hojas de estilo -->
			<link rel="stylesheet" href="css/fonts.css" />
			<link rel="stylesheet" href="css/main.css" />
			<link rel="stylesheet" href="css/login.css" />
			<link rel="stylesheet" href="css/menu.css" />
			<link rel="stylesheet" href="css/formulario.css" />
			<link rel="stylesheet" href="css/noticias.css" />
			<link rel="stylesheet" href="css/ui-darkness/jquery-ui.min.css" />
			 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
			 
			<?php if(\user\isLoggedIn()){ ?>
			<link rel="stylesheet" href="/css/admin.css" />
			<script type="text/javascript" src="javascript/ckeditor/ckeditor.js"></script>

			<?php } ?>
		
			<script type="text/javascript" src="javascript/jquery.min.js"></script>
			<script type="text/javascript" src="javascript/jquery.corner.js"></script>
			<script type="text/javascript" src="javascript/jquery-ui-1.10.1.custom.min.js"></script>
			<script type="text/javascript" src="javascript/jquery.shadow.js"></script>
			<script type="text/javascript" src="javascript/documentReady.js"></script>

		</head>

		<body>
     
			<div id="contenedor_general">

				<div id="encabezado">

					<div id="logo">

						<img src="img/logo.png" alt="Noticias Phpescas" />
						<h1>noticiasphpescas.com.ar</h1>

					</div>

					<div id="navbar">

					<?php \fragment\load("search","forms");?>

						<div id="login">

							<div id="campos_login">
								<?php 
										if(!\user\isLoggedIn()){ 
											\fragment\load('login','forms');
										}
								?>
							</div><!-- campos login -->

						</div><!-- login-->

					</div><!-- navbar -->

				</div> <!-- encabezado -->
				<?php 	\templates\admin\menu('admin'); ?> 

                                <div id="cuerpo" style="height:auto;">

                                        <div id="izquierda">
							<div class="menu">
								<?php \templates\menu('default');?>
							</div>
                                            
                                        </div>