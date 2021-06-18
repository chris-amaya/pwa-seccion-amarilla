<?php
    define('__ROOT__', dirname(dirname(__FILE__)));

    require_once(__ROOT__.'/credentials.php');
    ob_start();
    session_start();

    $timezone = date_default_timezone_set("America/Mexico_City");
    // $con = mysqli_connect('localhost', 'user', 'password', 'DB');
    $con = mysqli_connect('localhost', $USER, $PASSWORD, $DB);
    if(mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno(); 
    }

?>