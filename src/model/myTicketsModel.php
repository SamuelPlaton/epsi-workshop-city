<?php


session_start();

// Home controller, charged to retrieve close tickets and settle the home page
require('../controller/myTicketsController.php');
$title = "Mes tickets";

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');

$userTickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"].' ORDER BY TICKETS.CREATIONDATE DESC');
$userSolvedTickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS!="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"]);

$userCountTickets = $bdd->query('SELECT COUNT(*) FROM TICKETS WHERE TICKETS.STATUS="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"]);
foreach ($userCountTickets as $row){
    $pendingTicketsCount = $row[0];
}
$userCountSolvedTickets = $bdd->query('SELECT COUNT(*) FROM TICKETS WHERE TICKETS.STATUS!="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"]);
foreach ($userCountSolvedTickets as $row){
    $finishedTicketsCount = $row[0];
}

// Listing upvotes
$userForCountTickets = $bdd->query('SELECT ID FROM TICKETS WHERE TICKETS.IDUSER='.$_SESSION["idUser"]);
$upvotesArray = array();
foreach ($userForCountTickets as $row){
    $id = $row[0];
    $counts = $bdd->query('SELECT COUNT(*) FROM TICKET_USER_VOTES WHERE TICKET_USER_VOTES.IDTICKET='.$id);
    foreach ($counts as $count){
        $upvotesArray[$id] = $count[0];
    }
}

$categoriesRequest = $bdd->query('SELECT * FROM TICKET_CATEGORIES');
$categoriesArray = array();
foreach ($categoriesRequest as $row){
    $categoriesArray[$row['identifier']] = $row['sentence'];
}
$subCategoriesRequest = $bdd->query('SELECT * FROM TICKET_SUBCATEGORIES');
$subCategoriesArray = array();
foreach ($subCategoriesRequest as $row){
    $subCategoriesArray[$row['identifier']] = $row['sentence'];
}
$statusArray = array(
    'pending' => 'En attente',
    'cancelled' => 'Annulé',
    'solved' => 'Résolu',
);

require('../view/myTicketsView.php');

