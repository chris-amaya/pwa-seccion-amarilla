<?php

    ob_start();
    session_start();

    $timezone = date_default_timezone_set("America/Mexico_City");
    $con = mysqli_connect('localhost', 'user', 'password', 'DB');
    if(mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno(); 
    }

?>