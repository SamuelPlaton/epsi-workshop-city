<?php

// Call the database, retrieve all tickets and filter them by position
function getCloseTickets($position){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->query('SELECT * FROM tickets');
    // todo: Handle filter by distance
    return $req;
}

