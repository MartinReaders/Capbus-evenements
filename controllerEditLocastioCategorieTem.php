<?php 



include_once "lib/init.php";


$id = $_GET["id"];

$type = $_GET["type"];





if($type == "cat"){
    $categorie = new categorie($id);
    $mod = "cate";
}else{
    $location = new location($id);
    $mod = "local";
}


include "templates/fragments/header.php";
include "templates/fragments/admin_modif_catloca.php";



