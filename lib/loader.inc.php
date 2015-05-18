<?php

	namespace loader{
		
		/**
		 * Carga un archivo de un directorio mediante require
		 * @param String $dir El nombre del directorio
		 * @param String $file El nombre del archivo a cargar
		 */
		
		function load($dir,$loadFile,&$data=NULL){
			
			$files	   =	scandir($dir);
			
			$found     = FALSE; //Indica si encontro la pagina o no
			
			foreach($files as $file){
				
				if(is_dir("$dir/$file")){
					
					continue; //Seguir con el proximo item de la lista
					
				}

				if($file == $loadFile){

					$found = TRUE;
					require "$dir/$loadFile";
					break; // Sale del foreach

				}

			}
			
			return $found; //Le devuelvo a quien me llama si encontre o no la pagina :)
			
		}
		
		/**
		 *  Carga un archivo $times cantidad de veces
		 * @param Int $times Cantidad de veces que se debe cargar el archivo
		 * @param String $dir Directorio donde encontrar el archivo
		 * @param String $file El archivo a cargar
		 * @return boolean TRUE Se pudo cargar el archivo $times cantidad de veces
		 * @return boolean FALSE No se pudo cargar el archivo $times cantidad de veces
		 */
		
		function iterate($times,$dir,$file){
			
			for($i=0;$i<$times;$i++){

				if(!load($dir,$file)){

					return FALSE;

				}

			}
			
			return TRUE;
			
		}
		
	}