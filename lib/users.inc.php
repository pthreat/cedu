<?php

	namespace user{
		
		/**
		 * Loguea a un usuario en el sistema
		 * @param String $email El nombre de usuario (email)
		 * @param String $pass La clave del usuario (sin cifrar)
		 */

		function login($email,$pass){

			$pass  = sha1($pass);
			$email = trim(\db\escape($email));
			
			$sql     = "SELECT id,email,password FROM users WHERE email='$email' AND password='$pass' ";
			$result = \db\queryOne($sql,'Loguear un usuario');
			
			//Quiere decir que la identificacion del usuario fue exitosa
			if($result){

				$user = $result;
				unset($user['password']);
				
				//Por ende guardamos el usuario en la sesion
				$_SESSION['user']	=	$user;

			}
			
			return $result;

		}
		
		/**
		 * Verifica si un usuario esta logueado
		 * @return boolean TRUE si esta logueado
		 * @return boolean FALSE si no esta logueado
		 */
		
		function isLoggedIn(){

			return isset($_SESSION["user"]);

		}
		
	}