<?php 
    require_once '../../../conexion/conexion.php';
    //Construyo la consulta 
    $query = "SELECT id, titulo,autor,categoria,editorial,cantidad,estado,portada FROM libro";
    
    $result = $connection -> query($query);

   
    session_start();

    if(!isset($_SESSION['usuario'])){ // si no existe una sesión 
        echo'
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "../../../index.php";
            </script>
        ';
        
        session_destroy(); // destruimos la sesión
        die(); // parea que se detenga la ejecución 

    }

    require_once "../vistas/libro-v.php"

?>