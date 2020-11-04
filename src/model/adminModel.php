<?php

session_start();

// Home controller, charged to retrieve close tickets and settle the home page
require('../controller/adminController.php');
$title = "Mes tickets";

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');

$tickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS="pending" ORDER BY TICKETS.CREATIONDATE ASC');
$solvedTickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS!="pending"');


$countTickets = $bdd->query('SELECT COUNT(*) FROM TICKETS WHERE TICKETS.STATUS="pending"');
foreach ($countTickets as $row){
    $pendingTicketsCount = $row[0];
}
$countSolvedTickets = $bdd->query('SELECT COUNT(*) FROM TICKETS WHERE TICKETS.STATUS!="pending"');
foreach ($countSolvedTickets as $row){
    $finishedTicketsCount = $row[0];
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

require('../view/adminView.php');
