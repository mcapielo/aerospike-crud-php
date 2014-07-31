<?php

$citrusleaf_config = array("host"=>"127.0.0.1","port"=>"3000","namespace"=>"test");
require_once("citrusleaf_enums.php");

// Create a new client object
$cl = new CitrusleafClient();
// Establish a connection to the server
$cl->connect("citrusleaf://127.0.0.1:3000");


?>
