<?php

session_start();

$title = "Modifier mon profil";

require('../controller/chgProfileController.php');

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');


require('../view/chgProfileView.php');