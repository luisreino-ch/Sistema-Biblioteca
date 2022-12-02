<?php 
    require_once '../../../conexion/conexion.php';



    //Construyo la consulta 
    
    $query = "SELECT p.id,p.id_lector, p.id_libro, p.cantidadP, p.fecha_prestamo, p.fecha_devolucion,p.observacion, l.titulo, lec.codigo, lec.nombre, lec.apellido 
    FROM prestamo as p JOIN lector as lec ON p.id_lector=lec.id JOIN libro l ON p.id_libro=l.id";

    $result = $connection -> query($query);
 
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

    require_once "../vistas/prestamo-v.php"

?>