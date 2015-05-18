<?php

	namespace config{

		
		/**
		 * Interpreta un archivo de configuracion .ini
		 * y devuelve un array ASOCIATIVO (Bidimensional)
		 * (es decir con indices de tipo string, asociada la seccion con sus parametros)
		 * con los contenidos de dicho archivo de configuracion
		 * 
		 * Ejemplo:
		 * 
		 * <code>
		 *  $todaLaConfiguracion  = \config\load('config/config.ini');
		 * </code>
		 * 
		 * @param String Un string el cual indica la ubicacion del archivo de configuracion a cargar..
		 * @return int 0 Si la configuracion no habia sido cargada con anterioridad
		 * @return int -1 Si la configuracion ingresada como parametro es un directorio
		 * @return int -2 Si la configuracion ingresada es un archivo inexistente
		 * @return int -3 Si el archivo de configuracion ingresado, es invalido
		 * @return int -4 Si el archivo de configuracion esta vacio
		 * @return Array Un array con los contenidos de toda la configuracion
		 */
		
		function load($config=NULL){
			
			static $load = NULL;
			
			if(is_null($config)&&is_null($load)){

				return 0;

			}
			
			//Si la configuracion ya se habia cargado, entonces
			//No interpretes de nuevo toda la configuracion sino que 
			//devolve lo que habias cargado para no procesar todo de nuevo.
			
			if(!is_null($load)){
				
				return $load;
				
			}
			
			if(is_dir($config)){
				
				return -1;
				
			}
			
			if(!file_exists($config)){

				return -2 ;

			}
			
			//Evitar que salgan los errores de PHP por pantalla
			//ya que en este caso en particular
			//Estamos controlando de que haya algun tipo de error
			//En el archivo de configuracion.

			$parse = @parse_ini_file($config,TRUE);

			if($parse === FALSE){
				
				return -3;
				
			}
			
			if(empty($parse)){

				return -4;
				
			}

			$load = $parse;

			return $parse;
				
		}
		
		/**
		 * Devuelve una seccion completa de un archivo de configuracion 
		 * como un array de una dimension  asociativo. Por ejemplo
		 * si quiero obtener la seccion "templates" de un archivo de configuracion
		 * hago lo siguiente:
		 * 
		 * <code>
		 *   $seccionDeLaConfiguracion  = \config\seccion('templates');
		 * </code>
		 *
		 * @param String $section El nombre de la seccion, por ejemplo "templates"
		 * @return Int Un numero  entre  entre 0 y -4 si es que fallo la carga de la configuracion
		 * @see load Ver esta funcion para mas detalles sobre los codigos de error entre -1 y -4
		 * @return Int -5 Si la seccion de configuracion requerida NO FUE encontrada
		 * @return Array Si esta todo bien, nos devuelve un array de una dimension con todos los parametros
		 * de una seccion en particular.
		 */
		
		function section($section){

			$config = load();

			if(!is_array($config)){

				return $config;
				
			}
			
			foreach($config as $_section=>$values){
				
				if($section == $_section){
					
					return $values;
					
				}
				
			}
			
			return -5;

		}
		
		/**
		 * Devuelve el valor de un parametro de una seccion de un archivo de configuracion
		 * Por ejemplo si quiero obtener el parametro directorio de la seccion templates del archivo config/config.ini
		 * hago lo siguiente:
		 * 
		 * <code>
		 *   $parametroDeLaConfig  = \config\parameter('dir',templates');
		 * </code>
		 * 
		 * @param String $param El nombre del parametro
		 * @param type $section El nombre de la seccion
		 * @return Int Entre 0 y -4, error en la carga de la configuracion
		 * @return Int -5 Error en la busqueda de la seccion
		 * @return Int -6 No se encontro el parametro de configuracion.
		 * @return String Un string si esta todo OK, es decir si encontro el parametro especificado 
		 * en la seccion indicada.
		 * @see section Ver la documentacion de esta funcion si se devuelve -5
		 * @see load Ver la documentacion de esta funcion si se devuelve entre -1 y -4
		 */
		
		function parameter($param,$section){
			
			$_section =  section($section);
			
			if(!is_array($_section)){
				
				return $_section;
				
			}
			
			foreach($_section as $_param=>$value){
				
				if($_param == $param){
					
					return $value;
					
				}
				
			}
			
			//Parametro no encontrado
			return -6;
			
		}
		
	}