<?php

// If the form is submitted, create a user

if ($_POST && isset($_POST["sign-in-button"])) {
    $connected = false;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $user = $bdd->query('SELECT ID, TOKEN FROM USERS WHERE PHONENUMBER='.$_POST["phoneNumber"].' LIMIT 1');
        foreach ($user as $row){
            $token = $row["TOKEN"];
            $id = $row["ID"];
        }
        $rightUser = password_verify($_POST["password"], $token);
        // If user is connected, else no
        if($rightUser){
            $_SESSION['token'] = $token;
            $_SESSION['idUser'] = $id;
            $connected = true;
        }

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


