<?php

	namespace templates\admin{

		/**
		 * Carga el header de la pagina SOLO para un administrador
		 */
		
		function header($header="default"){
			
			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\header($header);

		}
		
		/**
		 * Esta funcion, nos carga (load) un template SOLO para un administrador
		 * @param String $template El nombre del archivo de template.
		 * @return boolean TRUE Si se pudo cargar el template
		 * @return boolean FALSE Si NO se pudo cargar el template
		 */
		
		function load($template,$dir){
			
			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\load($template,$dir);

		}
		
		function page($page=NULL){

			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\page($page);

		}
		
		function menu($menu){
			
			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\menu($menu);
			
		}
		
		/**
		 * Carga el pie de la pagina
		 */
		function footer($footer="default"){
			
			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\footer($footer);
			
		}
		
		function error($error){

			if(!\user\isLoggedIn()){
				return;
			}
			
			return \templates\error($error);

		}

	}

