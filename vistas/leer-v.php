<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Perfil</title>

   

    <style>
        label{
            font-weight: bold;
        }
        header{
            background:#3f74e6;
        }
    </style>
  
</head>

<body>
    <header class="py-1" >
        <h1 class="text-center text-light">Datos Del Lector</h1> 
    </header>

    <div style="max-width:319px;" class="container mt-5 ">

        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><label for="codigo"></label>
                <p><b>Código: </b><?php echo $codigo?></p></li>
              <li class="list-group-item"><label for="nombre"></label>
                <p> <b>Nombre: </b><?php echo $nombre?></p></li>
              <li class="list-group-item"><label for="apellido"></label>
                <p> <b>Apellido: </b><?php echo $apellido?></p></li>
              <li class="list-group-item"> <label for="correo"></label>
                <p><b>Correo: </b><?php echo $correo?></p></li>
              
            </ul>
            
        </div>
    
        <p><a  class="btn btn-warning mt-4 " href="lector.php">Atrás</a></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 

</body>

</html>