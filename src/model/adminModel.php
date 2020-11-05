<?php

session_start();

// Home controller, charged to retrieve close tickets and settle the home page
require('../controller/adminController.php');
require('../controller/getTicketsProximity.php');


$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');

// Retrieve town hall name
$request = $bdd->query('SELECT IDTOWNHALLS FROM ADMIN_CITY_PLUS WHERE ADMIN_CITY_PLUS.ID='.$_SESSION['idAdmin'].' LIMIT 1');
foreach ($request as $row){
    $idTownHalls = $row[0];
}
$request = $bdd->query('SELECT CITYNAME FROM TOWN_HALLS WHERE TOWN_HALLS.ID='.$idTownHalls.' LIMIT 1');
foreach ($request as $row){
    $townHallsName = $row[0];
}
$title = "Admin : ".$townHallsName;

$tickets = array();
$solvedTickets = array();
foreach ($ticketsCloseToCity as $row){
    if($row['status'] == 'pending'){
        array_push($tickets, $row);
    }else{
        array_push($solvedTickets, $row);
    }
}

// Listing upvotes
$userForCountTickets = $bdd->query('SELECT ID FROM TICKETS');
$upvotesArray = array();
foreach ($userForCountTickets as $row){
    $id = $row[0];
    $counts = $bdd->query('SELECT COUNT(*) FROM TICKET_USER_VOTES WHERE TICKET_USER_VOTES.IDTICKET='.$id);
    foreach ($counts as $count){
        $upvotesArray[$id] = $count[0];
    }
}

// Listing reports
$userForReportTickets = $bdd->query('SELECT ID FROM TICKETS');
$reportsArray = array();
foreach ($userForReportTickets as $row){
    $id = $row[0];
    $reports = $bdd->query('SELECT REPORT FROM TICKET_USER_REPORTS WHERE TICKET_USER_REPORTS.IDTICKET='.$id);
    $reportsArray[$id]['missing'] = 0;
    $reportsArray[$id]['abusive'] = 0;
    $reportsArray[$id]['incorrect'] = 0;
    foreach ($reports as $report){
        $reportsArray[$id][$report[0]] += 1;
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

require('../view/adminView.php');

