<?php

    define('SERVER_NAME','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASE_NAME','biblioteca');

    $connection = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE_NAME);

    //controla la conexión
    if ($connection) {
        //echo "CONEXIÓN EXITOSA"."<br/>".$connection->host_info."<br/>";
    }
    else{
        echo "CONEXIÓN FALLIDA".$connection->connect_error;
    } 


    


?> 