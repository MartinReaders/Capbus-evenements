<?php 










if(isset($_GET["url"])){
    $url = $_GET["url"];
}


if($url ==''){
    require "home.php";
}elseif(preg_match('#events-([A-Za-z]+)-([0-9]+)#', $url, $params)) {
    
    $idevent = $params[2];
    require "events.php";

}elseif(preg_match('#events-([A-Za-z]+)-([A-Za-z]+)-([0-9]+)#', $url, $params)) {
    $idevent = $params[3];
    require "events.php";
}elseif(preg_match('#events-([A-Za-z]+)-([A-Za-z]+)-([A-Za-z]+)-([0-9]+)#', $url, $params)) {
        $idevent = $params[4];
        require "events.php";

}elseif(preg_match('#events-([0-9]+)([A-Za-z]+)-([0-9]+)#', $url, $params)) {
    $idevent = $params[3];

    require "events.php";
}else{
    require "404.php";
}



