<?php

session_start();





$ses = $_POST['sesok'];
$sesoperation = $_POST['sesoperation'];


if($sesoperation == "set"){

	$_SESSION['sesok'] = $ses;

} else if($sesoperation == "clear"){
	
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	
}


if(!empty($_SESSION['sesok'])){
	echo $_SESSION['sesok'];
} else {
	echo "";
}



?>