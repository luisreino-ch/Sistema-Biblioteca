<?php 
    require_once '../../../conexion/conexion.php';
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        $query = 'SELECT * FROM lector WHERE id=?';
        if($stmt = $connection -> prepare($query)){
            $stmt -> bind_param('i', $_GET['id']);
            if($stmt ->execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $codigo = $row['codigo'];
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
        $connection -> close();

    }else{
        echo "Error ! intente mas tarde";
        exit();
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
    
    require_once "../vistas/leer-v.php"

?>