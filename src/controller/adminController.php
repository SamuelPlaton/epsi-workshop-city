<?php


// Cancel a ticket
if ($_POST && isset($_POST["cancel-button"])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $ticketId = $_POST["cancel-button"];
        $req = $bdd->prepare('UPDATE TICKETS SET STATUS=:status, ENDDATE=:endDate WHERE ID=' . $ticketId);
        $req->execute(array(
            'status' => 'cancelled',
            'endDate' => strval(date("Y-m-d H:i:s", strtotime("+1 hour"))),
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Validate a ticket
if ($_POST && isset($_POST["validate-button"])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $ticketId = $_POST["validate-button"];
        $req = $bdd->prepare('UPDATE TICKETS SET STATUS=:status, ENDDATE=:endDate WHERE ID=' . $ticketId);
        $req->execute(array(
            'status' => 'solved',
            'endDate' => strval(date("Y-m-d H:i:s", strtotime("+1 hour"))),
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}