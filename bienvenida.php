<?php
    session_start();

    
    if(!isset($_SESSION['usuario'])){ // si no existe una sesión 
        echo'
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "index.php";
            </script>
        ';
        
        session_destroy(); // destruimos la sesión
        die(); // parea que se detenga la ejecución 

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/login/css/forms.css">
    <title>Bienvenidos</title>
</head>
<body>


<h1 align="center">Bienvenido a la biblioteca "ESPE"</h1>


    <div id="medi">
        <div id="ce">
            <div id="otr">
                <h2 class="tuclase">PRÉSTAMOS</h2>
            </div>
            <a href="controller/prestamo/logica/prestamo.php">
                <img src="iconos/pres.png" alt="perfil" height="150px" width="150px">
            </a>
        </div>
 
        <div id="ce">
            <div id="otr">
                <h2 class="tuclase">LIBROS</h2>
            </div>
            <a href="controller/libro/logica/libro.php">
                <img src="iconos/libros.png" alt="perfil" height="150px" width="150px">
            </a>
        </div>

        <div id="ce">
            <div id="otr">
                <h2 class="tuclase">LECTORES</h2>
            </div>
            <a href="controller/lector/logica/lector.php">
                <img src="iconos/lectores.png" alt="perfil" height="150px" width="150px">
            </a>
        </div>

        <div id="ce">
            <div id="otr">
                <h2 class="tuclase">USUARIOS</h2>
            </div>
            <a href="controller/usuario/logica/usuario.php">
                <img src="iconos/user.png" alt="perfil" height="150px" width="150px">
            </a>
        </div>


    </div>


    <br><br><br><br><br><br><br>
    <center>
    <div id="ce">
            <a href="php/cerrar_sesion.php">
                <img src="iconos/cerrar.png" alt="perfil" height="150px" width="150px">
            </a>
    </div>
    </center>
    

   
    
    
</body>
</html>