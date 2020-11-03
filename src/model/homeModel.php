<?php

// Home controller, charged to retrieve close tickets and settle the home page
$req = getCloseTickets('555');

require('../view/homeView.php');

