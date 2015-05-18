<?php

	namespace products\cart{
		
		
		/**
		 * Agrega un producto al carrito de compras
		 * @param int $productId el id del producto
		 * @param int $amount Cantidad del producto a comprar
		 * @return int 0 si se quiso agregar un producto INVALIDO
		 * @return boolean FALSE En caso de que el id del producto sea invalido
		 * @return NULL Si la cantidad ingresada es incorrecta (<=0)
		 * @return Array Un array con el producto agregado al carrito
		 */
		function add($productId,$amount=1){

			$productId = (int) $productId;

			$product = \products\findById($productId);

			if(!$product){

				return 0;

			}
			
			if($productId <= 0){

				return FALSE;

			}
			
			if($amount <= 0 ){

				return NULL;

			}

			if(isset($_SESSION["products"][$productId])){

				$_SESSION["products"][$productId]+=1;
				return $product;

			}

			$_SESSION["products"][$productId] = $amount;
			
			return $product;

		}
		
		/**
		 * Vacia todo el carrito
		 * @return boolean FALSE en el caso de que se quiera resetear el carrito pero no haya productos comprados
		 * @return NULL Porque no se puede determinar el estado de unset
		 */

		function reset(){

			if(!isset($_SESSION["products"])){

				return FALSE;

			}
			
			unset($_SESSION["products"]);

		}
		
		/**
		 * Elimina un producto del carrito
		 * @param int $productId El id del producto
		 */
		
		function removeItem($productId){
			
			/**
			 * Buscar el producto en los elementos actuales que se encuentran en el carrito
			 * Si el producto no existe ... volamos (return derecho con FALSE)
			 * Si existe usamos unset($_SESSION["products"][$productId]); y devolvemos TRUE
			 */
			
		}
		
		/**
		 * Devuelve todo el listado de lo agregado en el carrito de compras
		 * @return Array Un array de dos dimensiones con el producto y la cantidad
		 * como cada uno de sus "hijos"
		 */
		
		function get(){

			return $_SESSION["products"];

		}
		
		/**
		 * Calcula el total de lo comprado hasta el momento en el carrito
		 * @return boolean FALSE en el caso de que el carrito este vacio
		 * @return Array con la factura FINAL del cliente
		 */

		function getInvoice(){

			//Obtener los productos del carrito
			$products = get();
			
			if(!sizeof($products)){
				return FALSE;
			}
			
			//Array de factura
			$invoice = Array();
			
			foreach($products as $productId => $amount){

				//Buscar el producto en la base de datos 
				//Con el id que teniamos guardado en el carrito :)

				$dbProduct = \products\findById($productId);
				
				$price = $dbProduct["price"];
				$total  = $price * $amount;
				
				$dbProduct["amount"] = $amount;
				$dbProduct["total"]      = $total;
				
				$invoice[] = $dbProduct;

			}
			
			return $invoice;

		}
		
	}