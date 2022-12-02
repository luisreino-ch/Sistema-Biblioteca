<?php

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

    
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        require_once '../../../conexion/conexion.php';
        $query = 'DELETE FROM usuario WHERE   id=?';

        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i',$_GET['id']);
            if($stmt -> execute()){
                header('location:usuario.php');
                exit();
            }else{
                echo 'Error! no se ejecuto la consulta a la base de datos';
            }


        }

        $stmt->close();
        $connection->close();
    }else{
        echo 'Error ! por favor inténtelo mas tarde';
    }

    

?>