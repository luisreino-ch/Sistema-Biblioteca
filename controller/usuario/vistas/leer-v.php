<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" href="../../../assets/sistema/usuario/perfil.css">
  
</head>




    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($foto)?>" alt="img-avatar">
                    
                </div>
                <a href="usuario.php""  class="boton-cerrar">Atrás</a>
                
            </div>
 
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $usuario?></h3>
            
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono "></i><b>Nombre:</b> <?php echo $nombre ?></li>
                    <li><i class="icono "></i><b>Correo: </b><?php echo $correo ?></li>
                </ul>
            </div>
            
        </div>
    </section>
  
</body>

</html>