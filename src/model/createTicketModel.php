<?php
require('../controller/createTicketController.php');
$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
$categories = $bdd->query('SELECT * FROM TICKET_CATEGORIES');
$subCategories = $bdd->query('SELECT * FROM TICKET_SUBCATEGORIES');

require('../view/createTicketView.php');