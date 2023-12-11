<?php

    if(!isset($_SESSION['user'])){
        $_SESSION['not-login']="<div class='error text-center'>Please login to access</div>";
        ?>
            <meta http-equiv="refresh" 
            content="0; url = http://localhost/Food_order/login-page/login.php" />
        <?php
    }

    
?>