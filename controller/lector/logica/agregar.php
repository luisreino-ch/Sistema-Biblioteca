<?php
    require_once '../../../conexion/conexion.php';

    // verificar si los datos fueron enviados por el método post



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Verificar que existan datos en las variables enviadas
        if( isset($_POST['nombre'])  && isset($_POST['apellido']) && isset($_POST['correo']) ){

            function generate_string() {
                $strength = 5;
                $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $input_length = strlen($input);
                $random_string = 'COD-';
                for($i = 0; $i < $strength; $i++) {
                    $random_character = $input[mt_rand(0, $input_length - 1)];
                    $random_string .= $random_character;
                }
                return $random_string;
            }
            $cod = generate_string();

            //Construir la consulta
            $query ="INSERT INTO lector(codigo,nombre,apellido,correo)VALUES('$cod',?,?,?)";

               
            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('sss', $_POST['nombre'], $_POST['apellido'],$_POST['correo']);

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