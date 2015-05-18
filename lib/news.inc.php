<?php

	namespace news{
		
		function getList(Array $filters=Array()){

			//Filtrar los filtros (valga la redundancia) para evitar inyeccion SQL
			\db\escapeArray($filters);
			
			$sql	=	"SELECT id,title,heading,body,publishDate FROM news";

			$where  =    ' WHERE 1 ';

			//Si es que se especifico el filtro por titulo, entonces usar un LIKE
			//para el titulo.
			
			$title	=	isset($filters["title"]) ? trim($filters["title"])  : NULL;
			
			if(!empty($title)){
				
				$where .= " AND title LIKE '%$title%' ";

			}
			
			$date = isset($filters["date"]) ? trim($filters["date"]) : NULL;
			
			if(!empty($date)){
				
				$where .= " AND DATE(publishDate) = '$date' ";
				
			}
			
			$sql = "$sql $where";
			
			$result  	 =	\db\query($sql, __FILE__.' | ' .__FUNCTION__. ' | Line:  '.__LINE__);
			return $result;
			
		}
		
		
		/**
		 *  Valida el titulo de una noticia
		 * 
		 * @param String $value El valor del titulo
		 * @return string Con un mensaje de error en el caso de que haya fallado
		 * @return boolean TRUE en el caso de que el titulo sea correcto
		 * 
		 */
		function validateTitle($value) {

			$value = trim($value);

			if (empty($value)) {

				return 'El titulo no puede estar vacio';
			}
			
			if (strlen($value) < \config\parameter('titleMinLength', 'news')) {
				
				return 'El titulo es demasiado corto';

			}
			
			return TRUE;

		}
		
		/**
		 *  Valida el encabezado de una noticia
		 * 
		 * @param String $value El valor del encabezado
		 * @return string Con un mensaje de error en el caso de que haya fallado
		 * @return boolean TRUE en el caso de que el heading sea correcto
		 * 
		 */

		function validateHeading($value) {

			$value = trim($value);

			if (empty($value)) {

				return 'El encabezado no puede estar vacio';

			}

			if (strlen($value) < \config\parameter('headingMinLength', 'news')) {

				return 'El encabezado es demasiado corto';

			}
			
			return TRUE;

		}

		/**
		 *  Valida el cuerpo de una noticia
		 * 
		 * @param String $value El valor del cuerpo
		 * @return string Con un mensaje de error en el caso de que haya fallado
		 * @return boolean TRUE en el caso de que el cuerpo sea correcto
		 * 
		 */

		function validateBody($value) {

			$value = trim($value);

			if (empty($value)) {

				return 'El cuerpo no puede estar vacio';

			}

			if (strlen($value) < \config\parameter('bodyMinLength', 'news')) {

				return 'El cuerpo es demasiado corto';

			}
			
			return TRUE;

		}
		
		
		/**
		 *  Funcion generica para validar el alta o bien la modificacion de una noticia
		 * @param array $data los datos ingresados por el usuario, generalmente esto es $_POST ....
		 * @return Array Con datos si hay errores
		 * @return Arrau vacio SI NO HAY errores.
		 */

		function validateNews(Array $data){
					
			//Validar LA  ESTRUCTURA y LOS DATOS que nos mandaron en $data es correcta
			$requiredKeys = [
								'title' => function($value){
				
											//Quien valida verdaderamente que el titulo sea correcto o no
											//es la funcion validateTitle
				
											return \news\validateTitle($value);

								},
								'heading'=>function($value){
									
											//Quien valida verdaderamente que el heading sea correcto o no
											//es la funcion validateHeading

											return \news\validateHeading($value);

								},
								'body'=>function($value){
									
											//Quien valida verdaderamente que el heading sea correcto o no
											//es la funcion validateHeading

											return \news\validateBody($value);

								}
			];			
			
			return \vector\validate($requiredKeys,$data);

		}
		

		/**
		 * Da de alta una noticia
		 * @param Array $data un array con los datos de la noticia, title heading y body
		 */

		function create(Array $data){
			
			\db\escapeArray($data);

			//Comprobamos si hay algun error
			//Si hay algun error el array $validateKeys NO estara vacio.
			
			$validateKeys	= validateNews($data);
			
			if(sizeof($validateKeys)){
			
				//Devolver los errores que se hayan encontrado para poder mostrarlos
				return $validateKeys;
				
			}

			//En este punto con todas las validaciones que hicimos anteriormente
			//podemos decir que el INSERT ahora SI esta listo para poder ser ejecutado.
			
			$sql	=	"INSERT INTO news SET ";
			$sql     .=     "title='$data[title]',";
			$sql     .=     "heading='$data[heading]',";
			$sql     .=     "body='$data[body]',";
			$sql     .=	"publishDate = NOW()";
			
			return \db\query($sql);

		}
		
		function getByDate($date){

			return getList(Array('pubDate'=>$date));

		}
			
	}