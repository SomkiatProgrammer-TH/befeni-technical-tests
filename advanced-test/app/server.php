<?php

require_once "config.php";
require_once "models/ShirtOrder.php";
require_once "models/ShirtOrderRepository.php";

use Befeni\Model\ShirtOrder as ShirtOrder;
use Befeni\Model\ShirtOrderRepository as ShirtOrderRepository;

if ( @$_POST["passkey"] != $passkey ) {
	header('HTTP/1.0 404 Not Found');
    echo "<h1>Error 404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}

$result = array(
	"success"		=> false,
	"description"	=> "Something wrong with the data."
);

try {

	$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$order = new ShirtOrder($conn);
	$order->customerId 	= (int)$_POST["customerId"];
	$order->fabricId 	= (int)$_POST["fabricId"];
	$order->collarSize	= (int)$_POST["collarSize"];
	$order->chestSize 	= (int)$_POST["chestSize"];
	$order->waistSize 	= (int)$_POST["waistSize"];
	$order->wristSize 	= (int)$_POST["wristSize"];

	if ( ( $ShirtOrderId = $order->insert() ) !== false ) {

		$orderRep = new ShirtOrderRepository($conn);
		$orderRep->shoporderId 	= $ShirtOrderId;
		$orderRep->source 		= $_POST['source'];

		if ( $orderRep->insert() !== false ) {
			$result["success"] = true;
			$result["description"] = "Success, your order id: " . $ShirtOrderId;
		}

	}

} catch(PDOException $e) {

	$result["description"] = "Connection failed: " . $e->getMessage();

}

echo json_encode($result);