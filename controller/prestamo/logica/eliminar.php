<?php

    require_once '../../../conexion/conexion.php';

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

        $query1 = "SELECT p.id,p.id_lector, p.id_libro, p.cantidadP, p.fecha_prestamo, p.fecha_devolucion,p.observacion, l.cantidad, l.titulo, lec.codigo, lec.nombre, lec.apellido 
        FROM prestamo as p JOIN lector as lec ON p.id_lector=lec.id JOIN libro l ON p.id_libro=l.id WHERE p.id=? ";
        if($stmt = $connection -> prepare($query1)){
            $stmt -> bind_param('i', $_GET['id']);
            if($stmt ->execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $cantidadActual = $row['cantidad'];
                    $canti = $row['cantidadP'];

                    $idlibro=$row['id_libro'];
                    
                        
                    $total = ($cantidadActual + $canti);
                        
                    $query2 ="UPDATE libro SET cantidad = $total WHERE id=$idlibro";
                    $final = $connection -> prepare($query2);

                    $final -> execute();

                    
                }else{
                    echo 'Error!no existen resultados para esta consulta ';
                    exit();
                }
            }else{
                echo 'No se ejecuto la consulta !';
                exit();
            }        
        }



        
        $query = 'DELETE FROM prestamo WHERE   id=?';

        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i',$_GET['id']);
            if($stmt -> execute()){
                header('location:prestamo.php');
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