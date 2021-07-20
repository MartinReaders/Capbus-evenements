<?php 


include "lib/init.php";

$cat = $_POST["cat"];
$categorie = new categorie();


$categorie->set("categorie", $cat);

$categorie->insert();