<?php

	namespace helpers {

		function printFormError($key, &$array, $fragment = "field_error", $fragmentDir = "forms") {

			if (empty($array)) {
				return;
			}

			if (is_array($array) && array_key_exists($key, $array)) {

				\fragment\load($fragment, $fragmentDir, $array[$key]);

			}

		}
		
		function printPostValue($value){

			return printValue($value,$_POST);
			
		}
		
		function printGetValue($value){
			
			return printValue($value,$_GET);

		}
		
		function printValue(&$value,Array $array=Array()){
			
			if(!sizeof($array)){
				return;
			}
			
			if(!isset($array[$value])){
				return NULL;
			}
			
			echo $array[$value];

		}
		
	}
	