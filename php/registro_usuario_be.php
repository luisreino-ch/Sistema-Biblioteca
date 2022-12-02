<?php
   
    include 'conexion_be.php'; // importamos la conexión a la base de datos



    // VARIABLES DE LOS DATOS
   $nombre_completo = $_POST['nombre_completo'];
   $correo = $_POST['correo'];
   $usuario = $_POST['usuario'];
   $contrasena = $_POST['contrasena'];
   // la contraseña va ser encriptada mediante el algoritmo sha512
   $contrasena = hash('sha512', $contrasena); 
   $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name'])); // carga el archivo


    if (empty($nombre_completo)) {
        echo '
            <script>
                alert("Agrega tu nombre !");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();

    }else if(strlen($nombre_completo) > 50){
        echo '
            <script>
                alert("El nombre es muy largo, solo se permite 50 caracteres!");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    
    }else if(empty( $correo)) {
        echo '
            <script>
                alert("Agrega un correo electrónico !");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    }else if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        echo '
            <script>
                alert("El correo es incorrecto !");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    
    }else if(empty( $usuario)) {
        echo '
            <script>
                alert("Agrega un nombre de usuario !");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();

    }else if(strlen($usuario) > 50){
        echo '
            <script>
                alert("El usuario es muy largo, solo se permite 50 caracteres!");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    
    }else if(empty($contrasena)) {
        echo '
            <script>
                alert("Agrega una contraseña!");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    }else if(strlen($contrasena) > 150){
        echo '
            <script>
                alert("La contraseña es muy largo, solo se permite 150 caracteres!");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    
    } 
    

    // INSTRUCCIÓN SQL
   $query = "INSERT INTO usuario(nombre_completo,correo,usuario,contrasena,foto) 
             VALUES('$nombre_completo','$correo','$usuario','$contrasena','$imagen')"; 
   




    // VERIFICAR QUE EL CORREO NO SE REPITA EN LA BASE DE DATOS
    $verificar_correo = mysqli_query($connection, 
                                     "SELECT * 
                                     FROM usuario 
                                     WHERE correo='$correo'
                                    "); // mediante esta instrucción busca los correos iguales

    if(mysqli_num_rows($verificar_correo) > 0){ // mysqli_num_rows() con esta instrucción verificamos si existe  una fila con el mismo correo que yo he puesto en el campo  
        echo '
            <script>
                alert("Este correo ya esta registrado intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    };

       


    // VERIFICAR QUE EL NOMBRE DE USUARIO NO SE REPITA EN LA BASE DE DATOS
    $verificar_usuario = mysqli_query($connection,
                                     "SELECT * 
                                     FROM usuario
                                     WHERE usuario='$usuario'
                                     "); // mediante esta instrucción busca los usuarios iguales

    if(mysqli_num_rows($verificar_usuario) > 0){ // mysqli_num_rows() con esta instrucción verificamos si existe  una fila con el mismo usuario que yo he puesto en el campo  
        echo '
            <script>
                alert("Este usuario ya esta registrado intenta con otro diferente");
                window.location = "../index.php";
            </script>

            
        ';

        // usaremos la instrucción exit para imprimir una mensaje y terminar el script actual
        exit();
    };




    // EJECUCIÓN DE LA INSTRUCCIÓN SQL
   $ejecutar = mysqli_query($connection,$query); 


   if ($ejecutar) {
    echo '
        <script>
            alert("usuario almacenado exitosamente");
            window.location = "../index.php";
        </script>
    ';
    
   }else{
    echo '
        <script>
            alert("inténtelo de nuevo usuario no almacenado");
            window.location = "../index.php";
        </script>
    ';
   }

   mysqli_close($connection);

?>