<?php



//fihcer pour initiliser le projet


//les errores 

ini_set("display_errors", 1);
error_reporting(E_ALL);




//includ les session

session_start();

include "lib/sessions.php";

include "lib/bdd.php";


include "lib/functions.php";

include 'class/principal.php';
include 'class/events.php';
include 'class/categorie.php';
include 'class/location.php';
include 'class/user.php';
include 'class/admin.php';



