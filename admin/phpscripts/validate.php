<?php

ini_set("display_errors", 1);
	error_reporting(E_ALL);

//echo "From validation file...";

function has_value($value) {

	return isset($value) && $value !== ""; //check its not equal to nothing
}


function form_errors($errors = array()){
		$op = "";
		if(!empty($errors)){

			$op .= "Your attention is required on the following."; //period is concatination
			$op .="<ul>";
			foreach($errors as $key => $error){ //=> assigns it to new variable


			$op .="<li>{$error}</li>";

				}

			$op .="</ul>";
			}
			return $op;
	}

?>
