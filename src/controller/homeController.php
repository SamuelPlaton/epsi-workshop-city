<?php
require('src/model/model.php');

// Home controller, charged to retrieve close tickets and settle the home page
function displayHome(){
    // todo: change position
    $req = getCloseTickets('555');
    require('src/view/homeView.php');
}

?>