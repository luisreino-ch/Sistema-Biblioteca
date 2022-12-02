<?php
    require_once '../../../conexion/conexion.php';

    // verificar si los datos fueron enviados por el método post

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       

        // Verificar que existan datos en las variables enviadas
        if(isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['categoria']) && isset($_POST['editorial']) && isset($_POST['cantidadi'])){

            $imagen = addslashes(file_get_contents($_FILES['portada']['tmp_name'])); // carga el archivo

            //Construir la consulta
            $query ="INSERT INTO libro(titulo,autor,categoria,editorial,cantidad,estado,portada) VALUES (?,?,?,?,?,1,'$imagen')";

               
            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('sssss', $_POST['titulo'], $_POST['autor'],$_POST['categoria'],$_POST['editorial'],$_POST['cantidadi']);

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
    }else{
        // echo "No llegaron los datos por el método POST";
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
    
    require_once "../vistas/agregar-v.php"

?>