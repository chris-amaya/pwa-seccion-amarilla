<?php 
    include_once('controladores/config.php');
    include_once('controladores/clases/Enterprise.php');
    
    $data  = json_decode(file_get_contents('php://input'), true);
    $_POST = $data;

    $enterprise = new Enterprise($con);
    $result = $enterprise->getEnterprises();
    
    include_once('controladores/enterprise.controller.php');






    include_once('views/header.php');
    include_once('views/index.view.php');
?>