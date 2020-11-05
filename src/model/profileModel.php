<?php

session_start();

$title = "Mon profil";

require('../controller/profileController.php');

$bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');


require('../view/profileView.php');