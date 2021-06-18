<?php 
    include_once('controladores/config.php');
    include_once('controladores/clases/Enterprise.php');
    include_once('controladores/clases/Category.php');
    
    $enterprise = new Enterprise($con);
    include_once('controladores/enterprise.controller.php');
    
    $giro;
    
    
    if(isset($enterprise['typeEnterprise'])) {
        $giro = new Category($con);
        $giro = $giro->getNameCategory($enterprise['typeEnterprise']);
        if($giro) {
            $giro = $giro->fetch_assoc();
        }
        

    }

    

    require_once('views/header.php'); 
    require_once('views/enterprise.view.php');
?>