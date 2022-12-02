<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: bienvenida.php");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Raleway:wght@400;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="assets/login/css/estilos.css">
</head>
<body>
    <br><br><br>
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">


                <!--Login-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Correo Electrónico" name = "correo"> <!--  placeholder -> podemos definir el texto que queremos que aparezca dentro del campo del formulario a modo de ayuda para las visitas. -->
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Entrar</button>
                </form>



                <!--Register-->
                <form enctype="multipart/form-data" action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" required pattern="[A-Z a-z]{5,50}"
           title="Ingrese solo letras. Tamaño mínimo: 5. Tamaño máximo: 10">
                    <input type="email" placeholder="Correo Electrónico" name="correo">
                    <input type="text" placeholder="Usuario" name="usuario" required pattern="[A-Z a-z]{5,10}"
           title="Ingrese solo letras. Tamaño mínimo: 5. Tamaño máximo: 10">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <input type="file" name="foto" required>
                    <button>Registrarse</button>
                </form>
            </div>
        </div>

    </main>         

    
    
    <script src="assets/login/js/script.js"></script>
    
</body>
</html>
