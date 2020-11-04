<?php

// Disconnect Model, start then destroy session and redirect to signin session
session_start();
session_destroy();
echo '
<script>
    window.location.href = "signinModel.php";
</script>';
