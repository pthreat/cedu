<?php

	namespace product\categories{
		
		function getList(Array $filters=Array()){
			
			$sql = "SELECT id,name FROM pCategories WHERE 1 ";

			if(array_key_exists('inCategories',$filters) && is_array($filters["inCategories"]) && sizeof($filters["inCategories"])){

				\db\escapeArray($filters["inCategories"]);

				$categories = implode(',',$filters['inCategories']);
				
				$sql .= " AND id IN($categories)";
				
			}
			
			$sql .= " ORDER BY name";

			return \db\query($sql,'Obtener categorias de productos');

		}
		
		/**
		 * Relacionar un producto con una categoria
		 * @param int $productId un id de producto
		 * @param int $pcategory un id de categoria de producto
		 */
		function relateProductWithCategory($productId,$pcategory){
			
			$productId	= \db\escape($productId);
			$pcategory	= \db\escape($pcategory);
			
			if(!$productId||!$pcategory){
				return NULL;
			}
			
			$sql =  "INSERT INTO productCategoriesRelation SET ";
			$sql .= "product='$productId', pcategory='$pcategory'";
			
			return \db\query($sql);
			
		}

	}