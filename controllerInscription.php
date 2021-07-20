<?php 


include_once "lib/init.php";



// $nom = $_POST["nom"];
$password = $_POST["password"];
// $email = $_POST["email"];


$user = new user();


$hashe_p = password_hash($password, 1);



$user->setFromTab($_POST);
$user->set("password", $hashe_p);

$user->insert();


