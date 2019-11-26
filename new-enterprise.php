<?php 

$data = json_decode(file_get_contents('php://input'), true);
$_POST = $data;

include_once('controladores/config.php');
include_once('controladores/clases/Category.php');
$categories = new Category($con);
$categories = $categories->getCategories();
if($_POST['info']['enterpriseName'])
{
    include_once('controladores/clases/Enterprise.php');

    $enterprise = new Enterprise($con);
    // var_dump($categories);
    // print

    include_once('controladores/new-enterprise.controller.php');
} else 
{
    require_once('views/header.php'); 
    require_once('views/new-enterprise.view.php');
}

?>