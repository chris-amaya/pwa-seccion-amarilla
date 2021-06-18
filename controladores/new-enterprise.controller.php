<?php
    if(isset($_POST['info']['enterpriseName']))
    {
        $name        = $_POST['info']['enterpriseName'];
        $desc        = $_POST['info']['desc'];
        $type        = $_POST['info']['type'];
        $coordinates = $_POST['info']['coordinates'];
        $facebook    = $_POST['info']['facebook'];
        $twitter     = $_POST['info']['twitter'];
        $telephone   = $_POST['info']['telephone'];
        $email       = $_POST['info']['email'];
        $alreadyExists = $enterprise->getEnterprise($name); 
        // COMPROBAR QUE LA EMPRESA AÚN NO EXISTA
        if(!$alreadyExists)
        {
            $result = $enterprise->insertEnterprise($name, $desc, $type, $coordinates, $facebook, $twitter, $telephone, $email);
            if(count($_POST['photos']) > 0 )
            {
                $all_files = count($_POST['photos']);
                for($i = 0; $i < $all_files; $i++)
                {
                    $file_name = $_POST['photos'][$i];
                    $newName = substr($file_name, 22, 32);
                    $DIRECTORY = '/fotos/';
                    $path = $_SERVER['DOCUMENT_ROOT'].$DIRECTORY;
                    $filteredData = explode(',', $file_name);
                    $unencoded = base64_decode($filteredData[1]);
                    $randomName = rand(0, 99999) . '.png';
                    $fullFileName = $path.$randomName; 
                    $fp = fopen($fullFileName, 'a');
                    fwrite($fp, $unencoded);
                    fclose($fp);
                    $enterprise->insertPhoto($randomName, $DIRECTORY.$randomName, $name);
                }      
            }
            
            if($result && $enterprise)
            {
                echo json_encode(array(
                    'resp' => 'Empresa agregada, espere por autorización',
                ));
            } else 
            {
                echo json_encode(array(
                    'error' => 'Algo ha salido mal'
                ));
            }
        } else {
            echo json_encode(array(
                'error' => 'Una empresa con el mismo nombre ya existe',
                $alreadyExists
            ));
        }
    }
?>