<?php 

    if(isset($_GET['enterpriseName']))
    {
        $enterpriseName = $_GET['enterpriseName'];

        $result = $enterprise->getEnterprise($enterpriseName);
        $photos = $enterprise->getPhotosEnterprise($enterpriseName);

        $enterprise = $result->fetch_assoc();
    }


?>