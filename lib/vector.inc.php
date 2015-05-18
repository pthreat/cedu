<?php

	namespace vector{
		
		/**
		 * Comprueba que existan todos los parametros $requiredKeys dentro del array $data
		 * @param array $requiredKeys las claves que si o si tienen que estar presentes en $data.
		 * @param array $data El array a validar.
		 */
		
		function hasKeys(Array $requiredKeys,Array $data){

			$missing	=	Array();
			
			foreach($requiredKeys as $required){
				
				if(!array_key_exists($required,$data)){

					$missing[]	=	$required;
					
				}
				
			}
				
			return $missing;
			
		}
		
		/**
		 * Valida un array de diversas formas
		 *
		 * 1) Chequea que todos los $requiredKeys esten presentes dentro del Array $data
		 * Es decir, si tengo una estructura que tiene que tener la forma:
		 * Array ('titulo', 'copete', 'cuerpo') valida que el array que me pasan en $data
		 * Tenga la estructura que necesito.
		 * 
		 * 2) Cada valor dentro del array $requiredKeys debe ser un Callback, es decir que tiene que ser una funcion
		 * la cual valida el dato que se encuentra dentro de $data.
		 * Por ejemplo: si tuviesemos $data = Array('titulo'=>'')  en ese caso valida con el callback si es correcto
		 * que tengamos un titulo vacio o no.
		 *
		 * @param array $requiredKeys Este parametro define que claves tienen que estar presentes
		 * dentro del array $data y el valor de cada una de estas claves es una funcion la cual validara
		 * el dato que hay dentro de $data para esa clave en cuestion.
		 * 
		 * @param array $data El array a validar con los valores en cuestion.
		 * @return array poblado con los campos que no hayan pasado la validacion
		 * @return array VACIO en el caso de que hayan pasado todas las validaciones.
		 */
		
		function validate(Array $requiredKeys,Array $data){
			
			//Aca se guardara el resultado de toda la validacion.
			$result = Array();
			                                         //title => function() { \news\validateTitle() } ....
			foreach($requiredKeys as $key=>$function){

				$result[$key] = array_key_exists($key,$data) ? $function($data[$key]) : $function(NULL);
			
				//Se asume que si la funcion de validacion devuelve TRUE y solamente TRUE
				//Todo esta bien, por ende no tiene que ser contado como un error
				//y por lo tanto lo quitamos del array de resultado.
				
				if($result[$key] === TRUE){

					unset($result[$key]);
					
				}
				
			}

			return $result;
			
		}

	}