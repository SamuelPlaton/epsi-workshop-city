<?php


session_start();

// Home controller, charged to retrieve close tickets and settle the home page
require('../controller/myTicketsController.php');
$title = "Mes tickets";

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');

$userTickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"]);
$userSolvedTickets = $bdd->query('SELECT * FROM TICKETS WHERE TICKETS.STATUS!="pending" AND TICKETS.IDUSER='.$_SESSION["idUser"]);
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
