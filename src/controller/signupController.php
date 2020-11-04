<?php

// If the form is submitted, create a user
if( $_POST && isset($_POST["sign-up-button"])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $req = $bdd->prepare('INSERT INTO USERS(firstname, lastname, phoneNumber, birthDate, gender, mailAddress, token) VALUES(:firstname, :lastname, :phoneNumber, :birthDate, :gender, :mailAddress, :token)');
        $req->execute(array(
            'firstname' => $_POST["firstname"],
            'lastname' => $_POST["lastname"],
            'phoneNumber' => $_POST["phoneNumber"],
            'birthDate' => $_POST["birthDate"],
            'gender' => $_POST["gender"],
            'mailAddress' => $_POST["mailAddress"],
            'token' => password_hash($_POST["password"], PASSWORD_DEFAULT),
        ));
        $redirect = true;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


