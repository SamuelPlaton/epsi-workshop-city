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
			$vote = $bdd->prepare('INSERT INTO ticket_user_votes(idTicket, idUser) VALUES (:idticket, :iduser)');
            $vote->execute([
			    'idticket' => $_POST['ticketId'],
			    'iduser' => $_SESSION['idUser']
			]);
		}
	}
	if (isset($_POST['report'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $checkIfExist = $bdd->prepare('SELECT * FROM ticket_user_reports WHERE idUser = :idUser AND idTicket = :idTicket');
        $checkIfExist->execute([
            'idTicket' => $_POST['idTicket'],
            'idUser' => $_SESSION['idUser']
        ]);
        $checks = $checkIfExist->fetch();
        if($checks){
            $errorReport = true;
        }else{
            $report = $bdd->prepare('INSERT INTO ticket_user_reports(idTicket, idUser, report) VALUES (:idticket, :iduser, :report)');
            $report->execute([
                'idticket' => $_POST['idTicket'],
                'iduser' => $_SESSION['idUser'],
                'report' => $_POST['report']
            ]);
            $errorReport = false;
        }
	}
}
