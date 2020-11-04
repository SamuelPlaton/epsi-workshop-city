<?php

session_start();

require('../controller/createTicketController.php');
// If user is created his account, redirect him
if(isset($redirect) && $redirect == true){
    echo '<script>
    window.location.href = "homeModel.php?sent=true";
    </script>
    ';
}

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
$categories = $bdd->query('SELECT * FROM TICKET_CATEGORIES');
$subCategories = $bdd->query('SELECT * FROM TICKET_SUBCATEGORIES');
$title = "Créer un ticket";

require('../view/createTicketView.php');