<?php

// If the form is submitted, create a user

if ($_POST && isset($_POST["sign-in-button"])) {
    $connected = false;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $user = $bdd->query('SELECT ID, TOKEN, IDADMIN FROM USERS WHERE PHONENUMBER='.$_POST["phoneNumber"].' LIMIT 1');
        $token = '';

        if(!$user){
            return false;
        }
        
        foreach ($user as $row){
            if($row["TOKEN"]){
                $token = $row["TOKEN"];
                $id = $row["ID"];
                $idAdmin = $row["IDADMIN"];
            }
        }
        $rightUser = password_verify($_POST["password"], $token);
        // If user is connected, else no
        if($rightUser && $token){
            $_SESSION['token'] = $token;
            $_SESSION['idUser'] = $id;
            if($idAdmin) $_SESSION['idAdmin'] = $idAdmin;
            $connected = true;
        }

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


