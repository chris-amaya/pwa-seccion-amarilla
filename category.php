<?php

    include_once('controladores/config.php');
    include_once('controladores/clases/Enterprise.php');

    $enterprise = new Enterprise($con);

    $category = $_GET['category'];

    $result = $enterprise->returnEnterprisesByCategory($_GET['category']);
    $rowsCount = mysqli_num_rows($result);

    include_once('views/header.php');
    include_once('views/category.view.php');
?>