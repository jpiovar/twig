<?php

require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');

$twig = new Twig_Environment($loader);



$md5Filter = new Twig_simpleFilter('md5', function($string){
	return md5($string);
});

$twig->addFilter($md5Filter);


$upperFilter = new Twig_simpleFilter('upF', function($string){
	return strtoupper($string);
});

$twig->addFilter($upperFilter);


/*

$tempVar = array('tt'=>'ttval');


echo $twig->render('hello.html', array(
	'name' => 'John',
	'age' => 32,

	'users' => array(
		array('name' => 'Janko', 'surname' => 'Hrasko'),
		array('name' => 'Jan', 'surname' => 'Hras'),
		array('name' => 'Jopo', 'surname' => 'Hrach')
	)
));
*/








$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twig";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";




$sql ="INSERT INTO `twig`.`users` (`id`, `name`, `surname`, `info`) VALUES (NULL, 'jozko1', 'mrkvicka1', '8881');";
$result = $conn->query($sql);


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if($result){
	echo("<p>controller mysqli db output START</p>");
	
	while($row = $result->fetch_assoc()) {
		
		echo "<h1>" . $row["id"]. "</h1>"; 
		
	}
	
	echo("<p>controller mysqli db output END</p>");
}
	
echo $twig->render('hello.html', ['users' => $result]);











?>