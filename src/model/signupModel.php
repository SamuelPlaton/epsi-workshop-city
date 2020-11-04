<?php

require('../controller/signupController.php');

$title = "Inscription";

// If user is created his account, redirect him
if(isset($redirect) && $redirect == true){
    echo '<script>
    window.location.href = "signinModel.php?phone='.$_POST["phoneNumber"].'&pwd='.$_POST["password"].'";
    </script>
    ';
}
require('../view/signupView.php');