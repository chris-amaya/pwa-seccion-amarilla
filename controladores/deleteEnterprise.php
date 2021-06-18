<?php

if(isset($_GET['enterpriseID'])) {
    $idEnterprise = $_GET['enterpriseID'];
    include_once('config.php');
    include_once('clases/Enterprise.php');
    include_once(__ROOT__.'/controladores/clases/Enterprise.php');
    
    $enterprise = new Enterprise($con);
    $deleteEnterprise = $enterprise->deleteEnterprise($idEnterprise);
    print_r($deleteEnterprise);
    if($deleteEnterprise == 1) {
        echo json_encode(array(
            'msg' => 'Empresa borrada con éxito',
            'status' => 'ok'
        ));
    } else {
        echo json_encode(array(
            'msg' => 'Ha ocurrido un error al intentar borrar la empresa',
            'status' => false
        ));
    }
}