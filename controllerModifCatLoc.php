<?php 


include "lib/init.php";


$id = $_POST["id"];

$mode = $_POST["mode"];


$loc = empty($_POST["location"]) ? "" : $_POST["location"];

$cat = empty($_POST["categorie"]) ? "" : $_POST["categorie"];





if($mode == "local"){
    $location = new location($id);
    $location->set("location", $loc);
    $location->update();

  

  
}else{
    $categorie= new categorie($id);
    $categorie->set("categorie", $cat);
    $categorie->update();
}

echo "<script>window.location.href='admin.php'</script>";