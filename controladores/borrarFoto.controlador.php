<?php 

    if(isset($_GET['nombreFoto'])) {
        $namePic = $_GET['nombreFoto'];
        include_once('config.php');

        // TODO: tomar ID foto y hacer una busqueda para borrarla, después, retornar la respuesta al cliente
        include_once(__ROOT__.'/controladores/clases/Photo.php');
        $photo = new Photo($con);
        $photo = $photo->deletePicByName($namePic);
        
        if($photo === 1) {
            echo json_encode(array(
                'resp' => 'Imagen eliminada con éxito',
            ));
        } else {
            echo json_encode(array(
                'resp' => 'Hubo un error al intentar eliminar la imágen, intente mas tarde',
            ));
        }
    }
?>