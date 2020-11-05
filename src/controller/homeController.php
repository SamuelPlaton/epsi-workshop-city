<?php

if(isset($_POST)) {
	if (isset($_POST['vote'])) {
		$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
		$checkIfExist = $bdd->prepare('SELECT * FROM ticket_user_votes WHERE idUser = :idUser AND idTicket = :idTicket');
		$checkIfExist->execute([
		    'idTicket' => $_POST['ticketId'],
		    'idUser' => $_SESSION['idUser']
		]);
		$checks = $checkIfExist->fetch();
		if (!$checks) {
			$categories = $bdd->prepare('INSERT INTO ticket_user_votes(idTicket, idUser) VALUES (:idticket, :iduser)');
			$categories->execute([
			    'idticket' => $_POST['ticketId'],
			    'iduser' => $_SESSION['idUser']
			]);
		}
	}
	if (isset($_POST['report'])) {
		var_dump('report');
	}
}
