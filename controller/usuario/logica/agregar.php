<?php
    require_once '../../../conexion/conexion.php';

    // verificar si los datos fueron enviados por el método post

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       

        // Verificar que existan datos en las variables enviadas
        if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['usuario'] ) && isset($_POST['contrasena'])){
            



            $contrasena = $_POST['contrasena'];
            // la contraseña va ser encriptada mediante el algoritmo sha512
            $contrasena = hash('sha512', $contrasena);

            $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name'])); // carga el archivo


            //Construir la consulta
            $query ="INSERT INTO usuario(nombre_completo,correo,usuario,contrasena,foto) VALUES (?,?,?,?,'$imagen')";

               
            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('ssss', $_POST['nombre'], $_POST['correo'],$_POST['usuario'],$contrasena);

                // Ejecutar statement
                if($stmt -> execute()){
                    header("location:usuario.php");
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