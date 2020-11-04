<?php


// Cancel a ticket
if ($_POST && isset($_POST["cancel-button"])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $ticketId = $_POST["cancel-button"];
        $req = $bdd->prepare('UPDATE TICKETS SET STATUS=:status WHERE ID=' . $ticketId);
        $req->execute(array(
            'status' => 'cancelled'
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
        $req = $bdd->prepare('UPDATE TICKETS SET STATUS=:status WHERE ID=' . $ticketId);
        $req->execute(array(
            'status' => 'solved'
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}