<?php 


    $data = json_decode(file_get_contents('php://input'), true);
    $_POST = $data;
    
    require_once(__ROOT__.'/controladores/config.php');
    $conexion = conexion('seccion_amarilla', 'root', '');
    $errors;
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(count($_POST['photos']) > 0 )
        {
            $all_files = count($_POST['photos']);
            for($i = 0; $i < $all_files; $i++)
            {
                $file_name = $_POST['photos'][$i];
                $nuevoNombre = substr($file_name, 22, 32);
                    try {
                        $carpeta_destino = 'fotos/';
                        $filteredData = explode(',', $file_name);
                        $unencoded = base64_decode($filteredData[1]);
                        $randomName = rand(0, 99999);
                        $fp = fopen($carpeta_destino.$randomName.'.png', 'a');
                        fwrite($fp, $unencoded);
                        fclose($fp);
                        $statement = $conexion->prepare('INSERT INTO fotos (nombre, ruta, empresa) VALUES (:nombre, :ruta, :empresa)');
                        $statement->execute(array(
                            ':nombre' => $randomName.'.png',
                            ':ruta' => $carpeta_destino.$randomName.'.png',
                            ':empresa' => $_POST['enterprise']
                        ));
                         
                        /* echo json_encode(array(
                            'respuesta' => 'imagenes subidas correctamente'
                        )); */
                        
                    } catch(PDOException $ex)
                    {
                        echo json_encode(array(
                            "error" => $ex
                        ));
                    }     
            }       

        }

        try {
            $statement = $conexion->prepare('UPDATE empresas SET nombreEmpresa = :nombreEmpresa, descripcionEmpresa = :descipcionEmpresa, coordenadas = :coordenadas, categoria = :categoria WHERE nombreEmpresa = :nombreEmpresaPasado');
            $statement->execute(array(
                ':nombreEmpresa' => $_POST['info']['titulo'],
                ':descipcionEmpresa' => $_POST['info']['descripcion'], 
                ':coordenadas' => $_POST['info']['coordenadas'],
                ':categoria' => $_POST['info']['categoria'],
                ':nombreEmpresaPasado' => $_POST['enterprise']
            ));
            echo json_encode(array(
                'respuesta' => 'cambios realizados correctamento'
            ));
        } catch(PDOException $ex)
        {
            echo json_encode(array(
                "error" => $ex
            ));
        }  
        


        
    } 


?>
