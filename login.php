<?php

include_once 'lib/init.php';

$email = empty($_POST["email"]) ? "" : $_POST["email"];
$password = empty($_POST["password"]) ? "" : $_POST["password"];


$user = new user();


if($user->verif($email, $password)){
    connect($user);
    header("Location: admin.php");
}else{
    include 'connexion.php';
}
