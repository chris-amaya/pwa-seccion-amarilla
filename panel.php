<?php

    include_once('controladores/config.php');
    include_once('controladores/clases/Enterprise.php');

    if(isset($_SESSION['user']) && $_SESSION['estado'] == 'autenticado') {
        $enterprise = new Enterprise($con);
        $enterprises = $enterprise->getEnterprisesToAccept();
        require_once('views/header.php');
        require_once('views/panel.view.php');
    } else {
        header('Location: index.php');
    };


?>