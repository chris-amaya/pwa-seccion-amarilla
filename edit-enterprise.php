<?php 

$data = json_decode(file_get_contents('php://input'), true);
$_POST = $data;

include_once('controladores/config.php');
include_once('controladores/clases/Enterprise.php');

$enterprise = new Enterprise($con);

if($_POST['info']['update'] == 1)
{
    include_once('controladores/edit-enterprise.controller.php');
} else 
{
    $result = $enterprise->getEnterprise($_GET['nameEnterprise']);
    $photos = $enterprise->getPhotosEnterprise($_GET['nameEnterprise']);

    $result = $result->fetch_assoc();
    include_once('controladores/clases/Category.php');
    $categories = new Category($con);
    $categories = $categories->getCategories();
    

    require_once('views/header.php');
    require_once('views/edit-enterprise.view.php');

}

?>