<?php 

$newName     = $_POST['info']['enterpriseName'];
$oldName     = $_POST['info']['oldName'];
$desc        = $_POST['info']['desc'];
$type        = $_POST['info']['type'];
$coordinates = $_POST['info']['coordinates'];
$IsActive    = $_POST['info']['IsActive'];
$facebook    = $_POST['info']['facebook'];
$twitter     = $_POST['info']['twitter'];
$telephone   = $_POST['info']['telephone'];
$email       = $_POST['info']['email'];

$result = $enterprise->updateEnterprise($oldName, $newName, $desc, $type, $coordinates, $IsActive, $facebook, $twitter, $telephone, $email);
if($result == true)
{
    echo json_encode(array(
        'resp' => 'ok'
    ));
} else {
    echo json_encode(array(
        'error' => 'Ups! Algo ha salido mal'
    ));
}

?>