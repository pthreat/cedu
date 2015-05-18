<?php

	namespace products{
		
		function getList(Array $filters=Array()){
			
			//Filtrar los filtros (valga la redundancia) para evitar inyeccion SQL
			\db\escapeArray($filters);
			
			$sql	=	"SELECT id,name,description,price,stock FROM products";

			$where  =    ' WHERE 1 ';

			//Si es que se especifico el filtro por titulo, entonces usar un LIKE
			//para el titulo.
			
			$name	=	isset($filters["title"]) ? trim($filters["title"])  : NULL;
			
			if(!empty($name)){

				$where .= " AND name LIKE '%$name%' ";

			}

			if(!empty($filters["id"])){

				$where .= " AND id='$filters[id]'";
				$sql.= $where;

				return \db\queryOne($sql);
				
			}

			$sql = "$sql $where";
			
			$result  	 =	\db\query($sql, __FILE__.' | ' .__FUNCTION__. ' | Line:  '.__LINE__);
			return $result;
			
		}

		/**
		 * Buscar un producto por su id
		 * @param Int $id El id del producto
		 * @return FALSE en caso de que no se encuentre
		 * @return Array en caso de que se encuentre el producto
		 */
		function findById($id){

			
			$filter = Array("id"=>$id);

			return getList($filter);

		}
		
		function validateName($name){
			
			$name = trim($name);
			
			if(empty($name)){

				return 'El nombre del producto no puede estar vacio';
				
			}
			
			if(strlen($name) < \config\parameter('nameMinLength','products')){

				return 'El nombre del producto es demasiado corto';

			}
			
			return TRUE;
			
		}
		
		function validateDescription($description){
			
			$description = trim($description);
			
			if(empty($description)){

				return 'La descripcion del producto no puede estar vacia';
				
			}
			
			if(strlen($description) < \config\parameter('descriptionMinLength','products')){

				return 'La descripcion del producto es demasiado corta';

			}
			
			return TRUE;
			
		}
				
		function validateImage($image){
			
			if(!\config\parameter('mustHaveImage','products')){

				return TRUE;

			}
			
			if(!file_exists($image)){
				return 'El archivo de imagen ingresado no existe';
			}
			
			$isImage = getimagesize($image);
			
			if(!$isImage){
				
				return 'El archivo ingresado no es una imagen';
				
			}
			
			return TRUE;
			
		}
		
		
		/**
		 * Toma una imagen y la guarda en una ubicacion
		 * mediante la funcion move_uploaded_file
		 * @param Int El id del producto
		 * @param String la ubicacion de la imagen
		 * @return String Si hubo algun error, con la descripcion del error
		 * @return boolean TRUE Si todo salio OK.
		 */

		function saveImage($productId,$image){
			
			$validateImage = validateImage($image);
			
			if(is_string($validateImage)){
				
				return $validateImage;

			}
			
			$saveDir = \config\parameter('imageSavePath','products');
			$saveDir .= "/$productId";

			//Si el directorio donde tenemos que guardar la imagen no existe
			if(!is_dir($saveDir)){
				
				//Crear el directorio donde se guardan las imagenes de los productos
				if(!mkdir($saveDir,0777, TRUE)){

					return 'Chequee los permisos en el directorio actual para salvar la imagen';
				
				}
				
			}

			//Obtener firma digital unica para sha1 del archivo que se
			//esta subiendo, esto nos da una ventaja si una persona
			//se equivoca y sube dos imagenes iguales, el archivo
			//simplemente se sobreescribe con el mismo nombre
			
			$uniqueFileId = sha1_file($image);
			$saveFile       = "$saveDir/$uniqueFileId.png";

			if(!copy($image,$saveFile)){

				return 'No se pudo guardar la imagen';

			}
			
			return TRUE;

		}
		
		function validateCategories(Array $categories=Array()){
			
			\db\escapeArray($categories,$isNotNumeric=TRUE);

			$minimumCategories	= \config\parameter('minimumCategories','products');
			$amountOfCategories	= sizeof($categories);
			
			if($amountOfCategories<$minimumCategories){
				
				return "Debe seleccionar al menos $minimumCategories categoria(s) para el producto";

			}
			
			$dbCategories = \product\categories\getList(
														Array(
																"inCategories" => $categories
														)
			);
			
			
			//Decime la cantidad de categorias que trajo el SELECT, una dos tres ... etc
			$foundCategories = \db\getNumRows($dbCategories);

			if($amountOfCategories== $foundCategories){
			
				return TRUE;
				
			}
			  
			return 'Alguna de las categorias ingresadas es invalida'; 
			
		}
		
		function validateStock($stock){
			
			$stock	=	(int)$stock;
			
			$allowNegativeStock	=	\config\parameter('allowNegativeStock','products');
			
			if($stock<=0 && !$allowNegativeStock){

				return 'Debe ingresar un stock positivo';

			}
			
			return TRUE;

		}
		
		function validateProduct(Array $data=Array()){
			
			//Validar LA  ESTRUCTURA y LOS DATOS que nos mandaron en $data es correcta
			$requiredKeys = [
								'name' => function($value){
				
											return \products\validateName($value);

								},
								'stock'=>function($value){
				
											return \products\validateStock($value);

								},
								'categories'=>function($value){

											return \products\validateCategories($value);
									
								},
								'description'=>function($value){
									
											return \products\validateDescription($value);
									
								},
								'image' => function($value){

									return \products\validateImage($value);

								}

			];
			
			return \vector\validate($requiredKeys,$data);

		}
		
		function create(Array $data=Array()){

			$categories = isset($data["categories"])&&is_array($data["categories"]) ? $data["categories"] : Array();

			\db\escapeArray($data,$isNotNumeric=TRUE);
			
			$data["categories"] = $categories;
			
			$validateData = validateProduct($data);
			
			if(sizeof($validateData)){

				return $validateData;

			}

			$data['name']	    = strip_tags($data["name"]);
			$data['description'] = strip_tags($data["description"]);
			
			$sql = "INSERT INTO products SET ";
			$sql .= "name = '$data[name]', ";
			$sql .= "stock = '$data[stock]', ";
			$sql .= "description = '$data[description]'";

			\db\query($sql);

			//Obtenemos el id del producto que recien insertamos
			$productId = \db\lastInsertId();
			
			$saveImage = saveImage($productId,$data["image"]);
			
			if(is_string($saveImage)){

				delete($productId);

				return Array('image'=>$saveImage);
				
			}

			foreach($data["categories"] as $pcategory){

				\product\categories\relateProductWithCategory($productId, $pcategory);

			}

			return $productId;

		}
		
		function getImages($productId){

			//Obtenemos cual seria el directorio donde tenemos todas las imagenes
			$imageDir = \config\parameter('imageSavePath','products');
			
			//Obtenemos donde esta alojado elproyecto
			$documentRoot = $_SERVER["DOCUMENT_ROOT"];
			
			//Concatenamos el $documentRoot con el path de las imagenes
			//mas el id del  producto
			//para tener la ruta COMPLETA (absoluta y no relativa)

			$systemDir = "$documentRoot/$imageDir/$productId";
			
			//Es decir que el resultado final es algo como esto...
			//C:\xampp\htdocs\noticias_phpescas\products\1

			
			//Si el producto no tenia imagen por algun motivo, entonces devolvemos
			//Una imagen por defecto, o sea la de un producto sin imagen.

			if(!is_dir($systemDir)){

				return Array(
							"$documentRoot/img/default_product.gif"
				);
				
			}
			
			//A este array lo utilizamos para almacenar las imagenes "posta"
			$productImages = array();
			$images             = scandir($systemDir);
			
			foreach($images as $image){

				$sysImage = "$systemDir/$image";

				//'/productos/1/nombredelaimagen'
				$image      = "$imageDir/$productId/$image";

				if(is_dir($sysImage)||!getimagesize($sysImage)){
					continue;
				}

				$productImages[] = $image;

			}
			
			if(!sizeof($productImages)){

				return Array(
							"$documentRoot/img/default_product.gif"
				);

			}

			return $productImages;
			
		}
		
		function delete($productId){
			
			$productId = \db\escape($productId);
			$sql = "DELETE FROM products WHERE id='$productId'";

			return \db\query($sql);

		}
		
		
			
	}