<?php

// If form is posted, send a ticket to the database
if( $_POST && isset($_POST["submit-button"])) {
    $idUser = 2;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cityplus;charset=utf8', 'root', '');
        // We create our ticket
        $req = $bdd->prepare('INSERT INTO TICKETS(idUser, category, subCategory, status, positionX, positionY, description) 
                                        VALUES(:idUser, :category, :subCategory, :status, :positionX, :positionY, :description)');
        $req->execute(array(
            'idUser' => $idUser,
            'category' => $_POST["category"],
            'subCategory' => $_POST["subcategory"],
            'status' => 'pending',
            'positionX' => $_POST["positionX"],
            'positionY' => $_POST["positionY"],
            'description' => $_POST["description"],
        ));
        // We retrieve the ticket data
        $value = $bdd->query('SELECT ID FROM TICKETS WHERE TICKETS.IDUSER='.$idUser.' ORDER BY ID DESC LIMIT 1');
        foreach ($value as $row){
            $ticketId = $row[0];
        }

        // We setup our data and create directories if they don't exist
        $firstPath = '../../public/tickets/'.$idUser.'/';
        if ( !is_dir($firstPath)) {
            mkdir($firstPath);
        }
        $path = '../../public/tickets/'.$idUser.'/'.$ticketId.'/';
        if ( !is_dir($path)) {
            mkdir($path);
        }

        // For each file, upload it
        $fileNumber = sizeof($_FILES['file-multiple-input']["tmp_name"]);
        for($i = 0; $i < $fileNumber; $i++){
            move_uploaded_file($_FILES["file-multiple-input"]["tmp_name"][$i], $path.$i.'.jpg');
        }
        // update path
        $req = $bdd->prepare('UPDATE TICKETS SET DATA=:data WHERE ID='.$ticketId);
        $req->execute(array(
            'data' => $path
        ));
        $redirect = true;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
