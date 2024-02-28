<?php

global $enlace;
function conexion(){
        $enlace = mysqli_connect('localhost', 'root', '','ropatipica');
        if(!$enlace)
        {
            echo "Error: No se puede conectar MYSQL". PHP_EOL;
            echo "Error de depuracion" . mysqli_connect_errno() . PHP_EOL;
            echo "Error de depuracion" . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        return $enlace;
}
/*

global $enlace;

function conexion() {
    $host = 'sql312.epizy.com';
    $username = 'epiz_34166469';
    $password = 'zN6acr7lMW';
    $database = 'epiz_34166469_ropatipica';

    $enlace = mysqli_connect($host, $username, $password, $database);

    if (!$enlace) {
        echo "Error: No se puede conectar a MySQL" . PHP_EOL;
        echo "Error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "Error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $enlace;
}
*/
?>