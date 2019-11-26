<?php

    $user     = $_POST['user'];
    $password = $_POST['password'];

    $result = $users->login($user, $password);

    if($result->num_rows == 1)
    {
        $_SESSION['user'] = $user;
        $_SESSION['estado'] = 'autenticado';
        echo json_encode(array(
            'resp' => 'ok'
        ));
    } else {
        echo json_encode(array(
            'error' => 'usuario o contraseña incorrectos'
        ));
    }



?> 