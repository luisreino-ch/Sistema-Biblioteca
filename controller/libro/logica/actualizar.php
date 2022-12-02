<?php
    require_once '../../../conexion/conexion.php';

    //leer los dato y 
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        $query = 'SELECT * FROM libro WHERE id=?';
        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i', $_GET['id']);
            if($stmt ->execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $titulo = $row['titulo'];
                    $autor = $row['autor'];
                    $categoria = $row['categoria'];
                    $editorial = $row['editorial'];
                    $cantidad = $row['cantidad'];
                    $estado = $row['estado'];
                    $portada = $row['portada'];
                    
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
        header("location:libro.php");
        exit();
    }

    //Tomar los dato editados y actualizarlos en la base de datos

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Verificar que existan datos en las variables enviadas
        if(isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['categoria']) && isset($_POST['editorial']) && isset($_POST['cantidadi'])){

            $imagen = addslashes(file_get_contents($_FILES['portada']['tmp_name'])); // carga el archivo
            //Construir la consulta
            $query ="UPDATE libro SET titulo = ?,autor= ?,categoria= ?, editorial = ?,cantidad=?,portada='$imagen' WHERE id= ?";

            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('sssssi', $_POST['titulo'],$_POST['autor'],$_POST['categoria'],$_POST['editorial'],$_POST['cantidadi'],$_GET['id']);

                // Ejecutar statement
                if($stmt -> execute()){
                    header("location:libro.php");
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