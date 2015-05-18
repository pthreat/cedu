<?php

	namespace videos{
		
		function getList(Array $filters=Array()){

			//Filtrar los filtros (valga la redundancia) para evitar inyeccion SQL
			\db\escapeArray($filters);

			$sql	=	"SELECT id,title,hash FROM videos";

			$where  =    ' WHERE 1 ';

			//Si es que se especifico el filtro por titulo, entonces usar un LIKE
			//para el titulo.
			
			$title	=	isset($filters["title"]) ? trim($filters["title"])  : NULL;
			
			if(!empty($title)){
				
				$where .= " AND title LIKE '%$title%' ";

			}
			
			$sql = "$sql $where";
			
			$result  	 =	\db\query($sql, __FILE__.' | ' .__FUNCTION__. ' | Line:  '.__LINE__);

			return $result;
			
		}
		
		
		function validateVideo(Array $data){

			//Validar LA  ESTRUCTURA y LOS DATOS que nos mandaron en $data es correcta
			$requiredKeys = [
								'title' => function($value){
				
											//Quien valida verdaderamente que el titulo sea correcto o no
											//es la funcion validateTitle
				
											return \videos\validateTitle($value);

								},
								'hash'=>function($value){
									
											//Quien valida verdaderamente que el heading sea correcto o no
											//es la funcion validateHeading

											return \videos\validateHash($value);

								}

			];
			
			return \vector\validate($requiredKeys,$data);

		}
		
		function validateTitle($title){
			
			$title = trim($title);

			if(empty($title)){

				return 'El titulo no puede estar vacio';

			}
			
			if(strlen($title)< \config\parameter('titleMinLength','videos')){
				
				return 'El titulo es demasiado corto';
				
			}
			
			return TRUE;

		}
		
		function validateHash($hash){

			if(empty($hash)){

				return 'El hash del video no puede estar vacio';
				
			}
			
			if(!\config\parameter('validateHash','videos')){

				return TRUE;
			
			}
			
			$validateURL  = \config\parameter('validateHashURL','videos');
			$validateURL .=$hash;
			
			//Suprimir cualquier error, esto lo hacemos debido a una cuestion de tiempo
			//Deberia hacerse correctamente mediante el uso de cURL. www.php.net/curl

			$validateHash = @file_get_contents($validateURL);

			$regex             = "Sorry about that";

			if(!$validateHash || preg_match("#$regex#",$validateHash)){
				
				return 'El hash del video no existe en youtube :(';
				
			}

			return TRUE;
			
		}
		
		/**
		 *  Agrega un video a la base de datos
		 * @param array $data
		 */
		function create(Array $data){
			
			//Asegurarnos de prevenir inyeccion SQL

			\db\escapeArray($data,$isNotNumeric=TRUE);

			//Comprobamos si hay algun error
			//Si hay algun error el array $validateKeys NO estara vacio.
			
			$validateKeys	= validateVideo($data);
			
			if(sizeof($validateKeys)){
			
				//Devolver los errores que se hayan encontrado para poder mostrarlos
				return $validateKeys;
				
			}
			
			$sql = "INSERT INTO videos SET title='$data[title]', hash='$data[hash]'";
			
			return \db\query($sql,'Agregar un video :)');
			
			
		}
			
	}