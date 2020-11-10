<?php

$url = "http://localhost/server.php"; // config server api url
$passkey = "1234"; // config password
$clientId = 1;
$fabricId = 1;
$collarSize = 10;
$chestSize = 36;
$waistSize = 28;
$wristSize = 40;

$source = "local"; // source name

$data = urlencode( "passkey=$passkey&" . "clientId=$clientId&" . "fabricId=$fabricId&" . "collarSize=$collarSize&" . "chestSize=$chestSize&" . "waistSize=$waistSize&" . "wristSize=$wristSize" );

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

if ( $server_output != '' ) {
	$server_output = json_decode($server_output);
	echo $server_output["description"];
} else {
	echo $server_output;
}

?>