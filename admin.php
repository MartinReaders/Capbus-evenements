<?php 


include_once "lib/init.php";


if(!estConnecter()){
    header("Location: connexion.php");
}




$event = new events();
$categorie  = new categorie();
$location = new location();

$liste_event = $event->liste();

$liste_categorie = $categorie->liste(); 

$liste_location = $location->liste();

$user = new user(idUserConnecter());

include_once "templates/fragments/admin_liste.php";
?>







