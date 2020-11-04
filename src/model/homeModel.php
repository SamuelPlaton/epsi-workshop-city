<?php

session_start();

// Home controller, charged to retrieve close tickets and settle the home page
require('../controller/homeController.php');
$title = "Accueil";

require('../view/homeView.php');

