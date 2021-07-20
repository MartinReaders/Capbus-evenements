<?php
include "lib/init.php";





$categorie = empty($_GET["categorie"]) ? "" : $_GET["categorie"];






$event = new events();

$cat = new categorie();

$loc= new location();

$liste_categorie = $cat->liste();
$liste_location = $loc->liste();









if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$nb = $event->CountAlCat($categorie);



$nbAachats = (int)$nb;


$parPage = 12;

$pages = ceil($nbAachats / $parPage);



$premier = ($currentPage * $parPage) -$parPage;


$mode ="1";  //Pour afficher le button suprimer les filters



$liste_event= $event->listeCat($categorie);


include "templates/fragments/header.php";
include "templates/page/home.php"; 
include "templates/fragments/footer.php";
