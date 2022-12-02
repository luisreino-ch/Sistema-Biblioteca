<?php 
    require_once '../../../conexion/conexion.php';
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