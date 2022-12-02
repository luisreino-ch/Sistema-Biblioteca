<?php
    require_once '../../../conexion/conexion.php';

    // verificar si los datos fueron enviados por el método post

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        $query = 'SELECT * FROM libro WHERE id=?';
        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i', $_POST['nombre-libro']);
            if($stmt ->execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $cantidadActual = $row['cantidad'];
                    $canti = $_POST['cantidadi'];
                    $idlibro=$_POST['nombre-libro'];
                    
                    if ($cantidadActual < $canti) {
                        header("location:prestamo.php?no_s");
                        exit();
                    }else{
                        
                        $total = ($cantidadActual - $canti);
                        
                        $query ="UPDATE libro SET cantidad = $total WHERE id=$idlibro";
                        $final = $connection -> prepare($query);

                        $final -> execute();

                    }
                }else{
                    echo 'Error!no existen resultados para esta consulta ';
                    exit();
                }
            }else{
                echo 'No se ejecuto la consulta !';
                exit();
            }        
        }

       

        // Verificar que existan datos en las variables enviadas
        if( isset($_POST['codigo-lector']) && isset($_POST['nombre-libro']) && isset($_POST['cantidadi']) && isset($_POST['fechas-prestamo'] ) && isset($_POST['fecha-devolucion']) && isset($_POST['observacion']) ){


            //Construir la consulta
            $query ="INSERT INTO prestamo(id_lector,id_libro,cantidadP,fecha_prestamo,fecha_devolucion,observacion) VALUES (?,?,?,?,?,?)";

               
            // Preparar la consulta para ejecutarla
            if($stmt = $connection -> prepare($query)){
                $stmt -> bind_param('ssssss', $_POST['codigo-lector'], $_POST['nombre-libro'],$_POST['cantidadi'],$_POST['fechas-prestamo'],$_POST['fecha-devolucion'],$_POST['observacion']);

                
                
                
                // Ejecutar statement
                if($stmt -> execute()){
                    header("location:prestamo.php");
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