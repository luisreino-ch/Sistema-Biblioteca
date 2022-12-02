<?php



    session_start(); // iniciamos una sesión 
    
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($connection,
                                 "SELECT * 
                                  FROM usuario 
                                  WHERE correo ='$correo'
                                  AND contrasena = '$contrasena'
                                ");


    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo; // variable de sesión
       
        header("location:../bienvenida.php"); 
        exit;   
    }else{
        echo '
            <script>
                alert("Este usuario no existe, por favor verifique los datos introducidos");
                window.location = "../index.php"
            </script>    

        ';
        exit;
    }

?>