<?php

	namespace templates{

		/**
		 * Carga el header de la pagina
		 */
		
		function header($header="default"){

			$dir = \config\parameter('headers','templates');
			return load($header,$dir);

		}
		
		/**
		 * Esta funcion, nos carga (load) un template
		 * @param String $template El nombre del archivo de template.
		 * @return boolean TRUE Si se pudo cargar el template
		 * @return boolean FALSE Si NO se pudo cargar el template
		 */
		
		function load($template,$dir){
			
			$template =	"$template.php";	
			$baseDir  = \config\parameter('dir','templates');
			$baseDir  = "$baseDir/$dir";
			
			return \loader\load($baseDir,$template);

		}
		
		function page($page=NULL){

			$dir = \config\parameter('pages','templates');
			return load($page,$dir);

		}
		
		function menu($menu){
			
			$dir = \config\parameter('menus','templates');
			return load($menu,$dir);
			
		}
		
		/**
		 * Carga el pie de la pagina
		 */
		function footer($footer="default"){
			
			$dir = \config\parameter('footers','templates');
			return load($footer,$dir);
			
		}
		
		function error($error){

			$dir = \config\parameter('errors','templates');
			return load($error,$dir);

		}

	}

