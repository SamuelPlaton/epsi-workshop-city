<?php
session_abort();
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
function getCloseTickets($position, $distance){
	$user_id = $_SESSION['idUser'];
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$user_votes = $bdd->prepare("SELECT * FROM ticket_user_votes WHERE idUser = :userId");
	$user_votes->execute([ 'userId' => $user_id ]);
	$user_votes = $user_votes->fetchAll();

	// On fait une liste des id de tickets votés
	$tickets_id_voted = array_map(function ($v) {
		return intval($v['idTicket']);
	}, $user_votes);

	$req = $bdd->query("SELECT tickets.*,  ticket_categories.sentence as 'cat_sentence', ticket_subcategories.sentence as 'sub_sentence' FROM `tickets`, ticket_subcategories, ticket_categories
WHERE tickets.category = ticket_categories.identifier
AND tickets.subCategory = ticket_subcategories.identifier ORDER BY tickets.creationdate DESC");
	$req->execute();
	$tickets = $req->fetchAll();
	$tickets = array_filter($tickets, function($v) use ($position, $distance) {
		$v['positionX'] = floatval($v['positionX']);
		$v['positionY'] = floatval($v['positionY']);
		return get_distance_m($position['lat'], $position['long'], $v['positionX'], $v['positionY']) <= $distance;
	});
	foreach($tickets as $k => $ticket) {
		$fi = new FilesystemIterator($ticket['data'], FilesystemIterator::SKIP_DOTS);
		$filesNumber = iterator_count($fi);
		$tickets[$k]['nbImg'] = $filesNumber;
		if (in_array($ticket['id'], $tickets_id_voted)) {
			$tickets[$k]['voted'] = true;
		} else {
			$tickets[$k]['voted'] = false;
		}
        $id = $ticket['id'];
        $counts = $bdd->query('SELECT COUNT(*) FROM TICKET_USER_VOTES WHERE TICKET_USER_VOTES.IDTICKET='.$id);
        foreach ($counts as $count){
            $tickets[$k]['upvotes'] = $count[0];
        }

	}

    return $tickets;
}

if(isset($_POST['long']) && isset($_POST['lat'])){
    $t = getCloseTickets(['long' => $_POST['long'], 'lat' => $_POST['lat']], 5000);
    $t = array_filter($t, function($v) {
    	return $v['status'] == 'pending';
    });
    echo json_encode($t);
}

if(isset($_SESSION['idAdmin'])){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $request = $bdd->query('SELECT * FROM TOWN_HALLS WHERE TOWN_HALLS.ID='.$_SESSION['idAdmin'].' LIMIT 1');
        foreach ($request as $row){
            $longitude = $row['positionY'];
            $latitude = $row['positionX'];
            $ticketsCloseToCity = getCloseTickets(['long' => $longitude, 'lat' => $latitude], 30000);
        }

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

}

