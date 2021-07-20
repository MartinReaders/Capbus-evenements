<?php 


include_once "lib/init.php";




$content = $_POST["content"];

$title = $_POST["title"];

$date = $_POST["date"];

$time = $_POST["time"];

$location = $_POST["location"];

$categorie = $_POST["categorie"];

$online= empty($_POST["online"]) ? "" :  $_POST["online"];


$link  = $_POST["title"];



if($online ==="on"){
    $online= "1";
}else{
    $online = "0";
}


$st =  strip_tags($link);
clean($st);
$count = str_word_count(clean($st));


if($count == "1"){
  $truncated = "events-". strip_tags($link);
}else {
    $truncated = "events-". substr(strip_tags($link),0,strpos(strip_tags($link),' ',1));
}





$event = new events();













$img = $_POST["img"];

$event->set("description", $content);
$event->set("title", $title);
$event->set("img",$img);
$event->set("date", $date);
$event->set("time", $time);
$event->set("location",$location);
$event->set("online", $online);
$event->set("categorie", $categorie);
$event->set("link", clean($truncated));

$event->insert();

$id_ev = $event->get("id");


echo "<script>window.location.href='controllerAdmindetaille.php?id=$id_ev'</script>";



