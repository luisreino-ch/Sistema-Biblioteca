<?php
    require_once '../../../conexion/conexion.php';

    //leer los dato y 
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        $query = 'SELECT * FROM lector WHERE id=?';
        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i', $_GET['id']);
            if($stmt ->execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $correo = $row['correo'];
                    
                    
                }else{
                    echo 'Error!no existen resultados para esta consulta ';
                    exit();
                }
            }else{
                echo 'No se ejecuto la consulta !';
                exit();
            }        
        }
        $stmt-> close();
      

    }else{
        header("location:lector.php");
        exit();
    }

    //Tomar los dato editados y actualizarlos en la base de datos

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Verificar que existan datos en las variables enviadas
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo'])){

            //Construir la consulta
            $query ="UPDATE lector SET nombre = ?,apellido= ?,correo= ? WHERE id= ?";

            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('sssi', $_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_GET['id']);

                // Ejecutar statement 
                if($stmt -> execute()){
                    header("location:lector.php");
                    exit();
                }else{
                    echo "Erro! el statement no se ejecutó";
                }

                $stmt ->close();

            }else{
                echo "Error en la preparación del statement";
            }

        }else{
            echo "No se están llenando todos los datos";
        }
        $connection -> close();
    }





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
    
    require_once "../vistas/actualizar-v.php"

?>