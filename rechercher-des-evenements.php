<?php 


include "lib/init.php";


header('Cache-Control: no cache');


$location = empty($_POST["location"]) ? "" : $_POST["location"];

$categorie = empty($_POST["categorie"]) ? "" : $_POST["categorie"];

$date = empty($_POST["date"]) ? "" : $_POST["date"] ;




$event = new events();

$cat = new categorie();

$loc= new location();

$liste_categorie = $cat->liste();
$liste_location = $loc->liste();




if(!$date and !$categorie and !$location){
    
    header("Location: home.php");
}else {







if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$nb = $event->CountFilter($location,$categorie, $date);



$nbAachats = (int)$nb;


$parPage = 12;

$pages = ceil($nbAachats / $parPage);



$premier = ($currentPage * $parPage) -$parPage;


$mode ="1";  //Pour afficher le button suprimer les filters



$liste_event= $event->serachFilter($location,$categorie,$date,$premier, $parPage);
}

include "templates/fragments/header.php";
include "templates/page/home.php"; 
include "templates/fragments/footer.php";




