<?php 


include_once "lib/init.php";



$event = new events();

$categorie = new categorie();

$location = new location();



if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$nb = $event->CountAlEvent();


$nbAachats = (int)$nb;


$parPage = 10;

$pages = ceil($nbAachats / $parPage);



$premier = ($currentPage * $parPage) -$parPage;


$liste_event = $event->listePagintaion($premier, $parPage);


$liste_categorie = $categorie->liste();
$liste_location = $location->liste();


$mode = "0";
include "templates/fragments/header.php";


include "templates/page/home.php";


include "templates/fragments/footer.php";
?>


  