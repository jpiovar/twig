<?php

session_start();

$data = file_get_contents("php://input");
$postData = json_decode($data,true);



$ses = $postData['sesok'];
$sesoperation = $postData['sesoperation'];

if($sesoperation == "set"){

	$_SESSION['sesok'] = $ses;

} else if($sesoperation == "clear"){
	
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	
}

echo $ses;


?>