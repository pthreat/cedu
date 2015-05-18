<?php

	namespace db{

		/*
		 * Se conecta a la base de datos especificada en el archivo de configuracion
		 * (Solo se conecta UNA vez)
		 * 
		 * @return resource De tipo Mysqli (en realidad es un objeto) en caso de conectarse correctamente
		 * @return String En caso de error, este string contiene exactamente el error que ocurrio al tratar de conectarnos
		 */
		
		function connect(){
			
			static $link = NULL;
			
			if(!is_null($link)){
				
				return $link;

			}
			
			$config		=	\config\section("database");

			$link		=	mysqli_connect($config["host"], $config["user"], $config["pass"], $config["name"],$config["port"]);
			$error		=	mysqli_error($link);
			
			if($error){

				return $error;

			}
			
			return $link;

		}
		
		function query($sql,$context=NULL){

			$link = connect();
			
			if(is_string($link)){

				return -1;
				
			}

			$start = microtime();
			$result = mysqli_query(connect(),$sql);
			$end = microtime();
			
			$timeTotal = $end - $start ;
			
			
			if(\config\parameter('debug','database')){
				
				$error = mysqli_error(connect());
				
				if($error){

					\fragment\load('error','sql',"ERROR: $error | $context: $sql | Time: $timeTotal");
					return FALSE;

				}

				\fragment\load('query','sql',"$context: $sql | Time: $timeTotal");
				
			}
			
			return $result;

		}
		
		
		/**
		 * Devuelve un Array para que nos facilite la tarea al obtener solo UN registro
		 * @param String $sql El query
		 * @param String $context una descripcion de que es lo que hace el query
		 * @return Array Con los campos solitados en el query
		 * @see function query para otros tipos de retorno
		 */
		function queryOne($sql,$context=NULL){

			$res = query($sql,$context);
			
			if(!is_object($res)){

				return $res;
				
			}
			
			return mysqli_fetch_assoc($res);

		}
		
		
		/**
		 * Escapa un array completo por referencia para prevenir inyeccion SQL
		 * PRECAUCION: Esto no protege de valores enteros en un query
		 * @param String $string El string a escapar
		 * @return String el string escapado
		 */
		
		function escapeArray(Array &$array,$isNotNumeric=FALSE){
			
			foreach($array as &$value){

				$value = escape($value,$isNotNumeric);

			}
			
		}

		/**
		 * Obtiene la cantidad de filas que trajo un select
		 * @param \MysqliResult  Un resultado de tipo SQL (seria lo devuelto por \db\query)
		 * @return int Un numero entero el cual indica la cantidad de filas que encontro el select
		 */
		function getNumRows($result){
			
			return mysqli_num_rows($result);
			
		}
		
		
		/**
		 * Al haberse ejecutado un insert en una tabla con un campo de tipo AUTO_INCREMENT
		 * esta funcion  nos devuelve el ultimo ID insertado en dicha tabla en cuestion
		 * @return int El id que fue insertado ultimo
		 */
		function lastInsertId(){
			
			return mysqli_insert_id(connect());
			
		}
		
		/**
		 * Escapa un string preveniendo la inyeccion SQL
		 * PRECAUCION: Esto no protege de valores enteros en un query
		 * @param String $string El string a escapar
		 * @return String el string escapado
		 * @return NULL En caso de que el valor ingresado para escapar no sea de tipo SCALAR 
		 * (int, double o bien string), es decir si es un array, un objeto o cualquier otra cosa.
		 */
		
		function escape($string,$isNotNumeric=FALSE){

			//En caso de que el valor ingresado para escapar no sea de tipo
			//SCALAR int, double o bien un string
			//Entonces devolvemos nulo, esto es para que no se muestre ningun 
			//Error por pantalla.
			
			if(!is_scalar($string)){

				return NULL;

			}
			
			if(!$isNotNumeric&&(double)$string>0){

				return (double)$string;

			}
			
			return mysqli_real_escape_string(connect(),$string);

		}
		
	}