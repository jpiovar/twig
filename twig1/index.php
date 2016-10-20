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
$lexer = new Twig_Lexer($twig, array(
	'tag_block' => array('{', '}'),
	'tag_variable' => array('{{ $', '}}')
));

$twig->setLexer($lexer);
*/

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

?>