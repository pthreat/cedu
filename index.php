<?php

	/**
	 * Inicia una sesion
	 */

	session_start();

	require "lib/vector.inc.php";
	require "lib/loader.inc.php";
	require "lib/templates.inc.php";
	require "lib/templatesAdmin.inc.php";
	require "lib/fragment.inc.php";
	require "lib/fragmentAdmin.inc.php";
	require "lib/helpers.inc.php";
	require "lib/news.inc.php";
	require "lib/videos.inc.php";
	require "lib/products.inc.php";
	require "lib/productCategories.inc.php";
	require "lib/productCart.inc.php";
	require "lib/config.inc.php";
	require "lib/users.inc.php";
	require "lib/db.inc.php";

	if(!is_array(\config\load("config/config.ini"))){
		
		die("No se encuentra el archivo de configuración :(");
		
	}
	
	if(isset($_POST['email'])&&isset($_POST['clave'])){

		\user\login($_POST["email"], $_POST["clave"]);

	}

	\templates\header();
	
	if(isset($_GET["pagina"])){

		if(isset($_GET['admin'])){
			
			$found = \templates\admin\page($_GET['pagina']);
			
		}else{
			
			$found = \templates\page($_GET["pagina"]);
			
		}

		if ( ! $found ){
			
			\templates\error("404");
			
		}

	}else{
		
		\templates\page('inicio'); //De lo contrario, cargamos la pagina por defecto
		
	}
	
	\templates\footer();