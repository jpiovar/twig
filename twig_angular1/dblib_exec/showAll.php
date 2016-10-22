<?php


$data = file_get_contents("php://input");
$postData = json_decode($data,true);

$dbInputName = $postData['name'];

//echo json_encode($postData);



include("../dblib/db.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twig";


$dbTwig = new Db;

$dbconnect = $dbTwig->connect($servername,$username,$password,$dbname);

$dboutput = $dbTwig->showAll($dbconnect,$dbInputName);

$dbTwig->close($dbconnect);

echo json_encode($dboutput);

//var_dump($dboutput);


?>
