<?php 


include "lib/init.php";


$id = $_GET["id"];

$type = $_GET["type"];






if($type == "loc"){
    $location = new location($id);
    $location->delete();
   

  

  
}else{
    $categorie= new categorie($id);
    $categorie->delete();
}

echo "<script>window.location.href='admin.php'</script>";