<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Nuevo libro</title>
    <style>
       
        header{
            background:#e68a3f;
        }

        body{
    height: 725px;
    justify-content: center;
    flex-direction: column;
    background-position: center;
    background-image: url('../../../iconos/4.png');
    /*background:linear-gradient(30deg, #601fd1, #a98fd5,#8b6bc7, #cdbbef, #8892d1, #9FA8DA);*/
    background-size: cover;
  }
    </style>


</head>
<body>
    <header class="py-4" >
        <h1 class="text-center text-3xl md:text-4xl font-medium mb-2">Agregar un nuevo libro</h1> 
    </header>

    <div class="grid h-screen place-items-center content-start">

        <h3 class="py-5">Llene este formulario para agregar un nuevo libro a la base de datos</h3>

        <form class="w-full max-w-lg" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            
            <table class="default">
            
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Titulo
                </label>
                <input name="titulo" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Titulo de libro">
                <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Autor
                </label>
                <input name="autor" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Autor del libro">
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Categoria
                  </label>
                  <input name="categoria" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Categoria del libro">
                  <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Editorial
                  </label>
                  <input name="editorial" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Editorial del libro">
                </div>
            </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Cantidad
                  </label>
                  <input name="cantidadi" min="1" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="number" placeholder="0">
                  <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Archivo</label>
                  <input name="portada" required class="form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
                
                </div>
              </div>

              <div class="grid " >
                <input class="btn btn-success " type="submit" value="Agregar">
                <br>
                <a class="btn btn-warning  " href="libro.php">Cancelar</a>
              </div>
            </table>
        </form>
    </div>
</body>
</html>