<?php

	namespace fragment{
		
		/**
		 * Esta funcion, nos carga (load) un template
		 * @param String $template El nombre del archivo de template.
		 * @return boolean TRUE Si se pudo cargar el template
		 * @return boolean FALSE Si NO se pudo cargar el template
		 * @see \loader\load Funcion base 
		 */
		
		function load($fragment,$dir,$data=Array()){
			
			$fragment =	"$fragment.php";	
			$baseDir  = \config\parameter('fragments','templates');
			$baseDir  = "$baseDir/$dir";

			return \loader\load($baseDir,$fragment,$data);
			
		}
		
		
		/**
		 *  Carga un fragmento $times cantidad de veces
		 * @param Int $times Cantidad de veces que se debe cargar el fragmento
		 * @param String $dir Directorio donde encontrar el fragmento
		 * @param String $fragment El fragmento a cargar
		 * @return boolean TRUE Se pudo cargar el fragmento $times cantidad de veces
		 * @return boolean FALSE No se pudo cargar el fragmento $times cantidad de veces
		 * @see \loader\iterate Funcion base
		 */		
		
		function iterate($times,$fragment,$dir){
			
			$fragment =	"$fragment.php";	
			$baseDir  = \config\parameter('fragments','templates');
			$baseDir  = "$baseDir/$dir";

			return \loader\iterate($times,$baseDir,$fragment);
			
		}
		
		/**
		 * Itera sobre un resultado SQL y por cada fila de dicho resultado
		 * carga un fragmento y le pasa los datos de cada fila.
		 * @param String $fragment Nombre del fragmento
		 * @param String $dir Directorio en el cual se encuentra dicho fragmento
		 * @param MySQLiResult $sqlResult Resultado MySQLi
		 */
		
		function iterateSQLResult($fragment,$dir,$sqlResult){
							
			while($row = mysqli_fetch_assoc($sqlResult)){
								
				load($fragment,$dir,$row);
								
			}

		}

	}

