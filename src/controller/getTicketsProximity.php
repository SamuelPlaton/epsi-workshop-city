<?php
session_start();
function get_distance_m($lat1, $long1, $lat2, $long2) {
	$earth_radius = 6378137;
	$rlo1 = deg2rad($long1);
	$rla1 = deg2rad($lat1);
	$rlo2 = deg2rad($long2);
	$rla2 = deg2rad($lat2);
	$dlo = ($rlo2 - $rlo1) / 2;
	$dla = ($rla2 - $rla1) / 2;
	$a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
	$d = 2 * atan2(sqrt($a), sqrt(1 - $a));
	return ($earth_radius * $d);
}

// Call the database, retrieve all tickets and filter them by position
function getCloseTickets($position){
	$user_id = $_SESSION['token'];
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query("SELECT tickets.*, ticket_categories.sentence as 'cat_sentence', ticket_subcategories.sentence as 'sub_sentence' FROM `tickets`, ticket_subcategories, ticket_categories
WHERE tickets.category = ticket_categories.identifier
AND tickets.subCategory = ticket_subcategories.identifier");
	$req->execute();
	$tickets = $req->fetchAll();
	$tickets = array_filter($tickets, function($v) use ($position) {
		$v['positionX'] = floatval($v['positionX']);
		$v['positionY'] = floatval($v['positionY']);
		return get_distance_m($position['lat'], $position['long'], $v['positionX'], $v['positionY']) <= 50;
	});
	foreach($tickets as $k => $ticket) {
		$fi = new FilesystemIterator($ticket['data'], FilesystemIterator::SKIP_DOTS);
		$filesNumber = iterator_count($fi);
		$tickets[$k]['nbImg'] = $filesNumber;
	}
	echo json_encode($tickets);
}
getCloseTickets(['long' => $_POST['long'], 'lat' => $_POST['lat']]);
