<?php

// If form is posted, send a ticket to the database
if( $_POST && isset($_POST["submit-button"])) {
    echo json_encode($_POST);
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        $req = $bdd->prepare('INSERT INTO TICKETS(idUser, title, category, subCategory, status, positionX, positionY, description) 
                                        VALUES(:idUser, :title, :category, :subCategory, :status, :positionX, :positionY, :description)');
        $req->execute(array(
            'idUser' => 2,
            'title' => $_POST["title"],
            'category' => $_POST["category"],
            'subCategory' => $_POST["subcategory"],
            'status' => 'pending',
            'positionX' => $_POST["positionX"],
            'positionY' => $_POST["positionY"],
            'description' => $_POST["description"]
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
