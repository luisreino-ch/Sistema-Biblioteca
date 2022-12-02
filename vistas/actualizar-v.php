<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Actualizar</title>

    <style>
       
        header{
            background:#2b8d5f;
        }
    </style>
</head>
<body>

    <header class="py-4" >
        <h1 class="text-center text-3xl md:text-4xl font-medium mb-2">Actualizar un lector</h1> 
    </header>
   
    <div class="grid h-screen place-items-center content-start">

        <h3 class="py-5">Editar los datos del lector para actualizarlos en la base de datos</h3>
    
        <form class="w-full max-w-lg" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
        <table class="default">
        <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
               
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="">nombre</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="nombre"  value="<?php echo $nombre?>" required>
               </div>
    
               <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="" >apellido</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="apellido" value="<?php echo $apellido?>" required>
            </div>
            </div>
            

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="">correo</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="correo" value="<?php echo $correo ?>" required>
            </div>
    
            </div>
            </div>
            <div class="grid">
                <input class="btn btn-success" type="submit" value="Actualizar">
                <br>
                <a  class="btn btn-warning" href="lector.php">Cancelar</a>
            </div>
            </table>
        </form>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>