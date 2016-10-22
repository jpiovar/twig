<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
	<script src="angular_controller/main.js"></script>
<body>

<div ng-app="mainModule" ng-controller="MainCtrl" ng-init="page='p1'">

<br/>
php session   

<script>
if (typeof(w) == "undefined") {
    w = new Worker("webworker/sessionChecker.js");
}
w.onmessage = function(event){
    document.getElementById("result").innerHTML = event.data;
};
</script>

<p id="result"></p>

<?php
// Set session variables
//$_SESSION["sesok"] = "green";
if(empty($_SESSION['sesok'])){
	echo " empty session";
} else {
	echo " full session ".$_SESSION['sesok'];
}


//echo $_SESSION["sesok"];
?>

<br/><br/>
<span ng-click="sesProcess('11','set')"> set session php  sesok = "11"</span>
<br/><br/>
<span ng-click="sesProcess('','clear')"> clear session php  sesok = "" </span>
<br/><br/>
session after angular operation   {[{dataPost}]}

<br/>
<hr>
<br/>
	{[{message}]}
	
 	<p>Name : <input type="text" ng-model="name"></p>
 	<h1>Hello {[{name}]}</h1>
	
	<!--
	<span ng-click="code='11'">code 11</span><span ng-click="page='p1'">page 1</span> <span ng-click="page='p2'">page 2</span>
	
	<div ng-show="page=='p1'" ng-include="'twig_controller/index1.php'"></div>
	<div ng-show="page=='p2'" ng-include="'twig_controller/index2.php'"></div>
	-->
	
	
	<p><a href = "#template1">Template1</a></p>
    <p><a href = "#template2">Template2</a></p>
    <div ng-view></div>
	
	
	
	
	<hr>
	<br/>
	<br/>	
	Name: <input ng-model="name" value="" name="name" />
	<br/>
	Surname: <input ng-model="surname" value="" name="name" /> 	
	<br/>
	Info: <input ng-model="info" value="" name="info" />
	<br/>
	<button type="button" class="btn btn-success" ng-click="processInput()">Process input</button>
	
	
	<br/> OUTPUT Table showall<br/>
	<ul>
		<li ng-repeat="item in dataPost" ng-show="item.id">{[{item.id}]} - {[{item.name}]} - {[{item.surname}]} - {[{item.info}]}</h1>
	</ul>
	{[{dataPost[0].countItems}]}
	
	
	
</div>

</body>
</html>