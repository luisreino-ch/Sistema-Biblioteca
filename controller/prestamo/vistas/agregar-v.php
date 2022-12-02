<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    <title>Nuevo usuario</title>
    <style>
       
        header{
            background:#e68a3f;
        }
        body{
    height: 725px;
    justify-content: center;
    flex-direction: column;
    background-position: center;
    background-image: url('../../../iconos/3.png');
    /*background:linear-gradient(30deg, #601fd1, #a98fd5,#8b6bc7, #cdbbef, #8892d1, #9FA8DA);*/
    background-size: cover;
  }
    </style>
</head>
<body>
    <header class="py-4" >
        <h1 class="text-center text-3xl md:text-4xl font-medium mb-2">Realiza un préstamo</h1> 
    </header>

    <div class="grid h-screen place-items-center content-start">

        <h3 class="py-5">Llene este formulario para agregar un nuevo préstamo</h3>

    
        <form  class="w-full max-w-lg" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            
        <table bgcolor="white" class="default">
            
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="">Código y nombre del lector</label>
                <select class="form-select" name="codigo-lector" required>
                <?php
                
                    $consulta = "SELECT * FROM lector";
                    $resul = mysqli_query($connection,$consulta);
                    while($fila = mysqli_fetch_assoc($resul)){
                        $id = $fila['id'];
                        $codigo = $fila['codigo'];            
                        echo "<option value='$id'>$codigo</option>";
                    }
                ?>

                </select> 
               
            </div>

            <div class="w-full md:w-1/2 px-3">

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="">Libro</label>
                <select class="form-select" name="nombre-libro" required>
                <?php
                
                    $consulta = "SELECT * FROM libro";
                    $resul = mysqli_query($connection,$consulta);
                    while($fila = mysqli_fetch_assoc($resul)){
                        $id = $fila['id'];
                        $libro = $fila['titulo'];
                        echo "<option value='$id'>$libro</option>";
                    }
                ?>

                </select>
               
            </div>
            </div>
                    
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="">Cantidad</label>
                <input id="cantidad" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" name="cantidadi" min="1" required>
            </div>
        
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="">Fecha préstamo</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="date" name="fechas-prestamo" value="<?php echo date("Y-m-d"); ?>" required>
            </div>
            </div>
    
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="">Fecha Devolución</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="date" name="fecha-devolucion" value="<?php echo date("Y-m-d"); ?>" required>
            </div>
    
            <div class="w-full md:w-1/2 px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"   for="">Observación</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="observacion" required>
            </div>
            </div>
    
            <div class="grid">
                <input class="btn btn-success " type="submit" value="Agregar">
                <br>
                <a class="btn btn-warning  " href="prestamo.php">Cancelar</a>
            </div>
    
                </table>
        </form>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>