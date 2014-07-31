<?php
require_once("citrusleaf_enums.php");     // citrusleaf response codes
$citrusleaf_config = array("host"=>"127.0.0.1","port"=>"3000","namespace"=>"test");

// Create a new client object
$cl = new CitrusleafClient( );

// Establish a connection to the server
$cl->connect("citrusleaf://127.0.0.1:3000");

// Create a record
$bin = 'name';
$result = $cl->set_default_bin($bin);
$cl->put(1,'messi');
$cl->put(2,'masche');
$cl->put(3,'mariano');


// Retrieve a record

$i = 1;
while ($i <= 10) {

$response = $cl->get($i);

$code = $response->get_response_code();
	if($code == 0){
		$read_bin_vals = $response->get_bins();		
		$array[] = $read_bin_vals['name'];
		$response->free_bins();

	}		

//print_r($read_bin_vals);

$response->free_bins();
$i++;
}



foreach($array as $nombres){
    echo "Nombres : $nombres \n" ;
}




/* 
//Try to get all the records
$read_bin_vals = $response->get_bins();
$response->free_bins();
var_dump($read_bin_vals);
//$binarray = array($bin);
//var_dump($binarray);
//$response = $cl->get($key,$binarray);
//print_r(

*/

// Delete a record
//$code = $cl->delete($key);



?>

