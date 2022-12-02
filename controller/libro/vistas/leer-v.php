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
        <h1 class="text-center text-light">Datos del libro</h1> 
    </header>

    <div style="max-width:319px;" class="container mt-5 ">

        <div class="card" style="width: 18rem;">
            <img src="data:image/jpg;base64,<?php echo base64_encode($portada)?>" class="card-img-top" alt="">
            <div class="card-body">
                <label for="titulo"></label>
                <h5><?php echo $titulo?></h5>
            </div>
           
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><label for="autor"></label>
                <p><b>Autor: </b><?php echo $autor?></p></li>
              <li class="list-group-item"><label for="categoria"></label>
                <p> <b>Categoría: </b><?php echo $categoria?></p></li>
              <li class="list-group-item"><label for="editorial"></label>
                <p> <b>Editorial: </b><?php echo $editorial?></p></li>
              <li class="list-group-item"><label for="cantidad"></label>
                <p> <b>Cantidad: </b><?php echo $cantidad?></p></li>
              
            </ul>
            
        </div>
    
        <p><a  class="btn btn-warning mt-4 " href="libro.php">Atrás</a></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 

</body>

</html>