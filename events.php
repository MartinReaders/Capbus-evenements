<?php 

include_once "lib/init.php";



$idevent;
$event = new events();

$verife = $event->loadByID($idevent);



if($verife==0){
    
    include_once "404.php";
   
}else{
    $event = new events($idevent);
    include_once "templates/fragments/header.php";
    include_once "templates/page/detail.php";
    include_once "templates/fragments/footer.php";
}




?>







    
</body>
</html>