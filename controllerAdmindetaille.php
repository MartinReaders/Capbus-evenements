<?php

include_once "lib/init.php";


if(!estConnecter()){
    header("Location: connexion.php");
}


$id = $_GET["id"];
$event = new events($id);

$categorie = new categorie();
$location = new location();

$liste_categorie = $categorie->liste();
$liste_location = $location->liste();

include_once "templates/fragments/header.php";
include_once "templates/fragments/admin_modif.php";
?>



