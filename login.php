<?php 

    $data  = json_decode(file_get_contents('php://input'), true);
    $_POST = $data;

    if(isset($_POST['user']))
    {
        include_once('controladores/config.php');
        include_once('controladores/clases/Users.php');

        $users = new Users($con);

        include_once('controladores/login.controller.php');
    } else {    
        include_once('views/header.php');
        include_once('views/login.view.php');
    }

?>