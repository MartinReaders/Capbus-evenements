<?php 


include "lib/init.php";

$loc = $_POST["loc"];
$location = new location();


$location->set("location", $loc);

$location->insert();