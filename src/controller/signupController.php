<?php

// If the form is submitted, create a user
if( $_POST && isset($_POST["sign-up-button"])) {
    echo json_encode($_POST);
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $req = $bdd->prepare('INSERT INTO USERS(firstname, lastname, phoneNumber, age, gender, mailAddress, token) VALUES(:firstname, :lastname, :phoneNumber, :age, :gender, :mailAddress, :token)');
        $req->execute(array(
            'firstname' => $_POST["firstname"],
            'lastname' => $_POST["lastname"],
            'phoneNumber' => $_POST["phoneNumber"],
            'age' => $_POST["age"],
            'gender' => $_POST["gender"],
            'mailAddress' => $_POST["mailAddress"],
            'token' => password_hash($_POST["password"], PASSWORD_DEFAULT),
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


