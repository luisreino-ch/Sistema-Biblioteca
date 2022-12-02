<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ¿Que es bootstrap -> Bootstrap es una biblioteca multiplataforma o conjunto de herramientas de código abierto para diseño de sitios y aplicaciones web. --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- ¿Que es Jquery? -> Jquery es una librería de JavaScript, es algo que facilita enormemente la tarea de desarrollo y diseño de páginas web.-->
        
    <!-- ¿Que DataTables? -> DataTables es un complemento de Jquery agrega cualquier tipo de características avanzadas para trabajar con cualquier tabla en formato html-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>

    <!-- iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <!-- CSS -->

    <link rel="stylesheet" href="../../../assets/sistema/usuario/usuario.css">
    

    <title>Usuarios</title>

    <style>
    body{
    height: 725px;
    justify-content: center;
    flex-direction: column;
    background-position: center;
    background-image: url('../../../iconos/5.png');
    /*background:linear-gradient(30deg, #601fd1, #a98fd5,#8b6bc7, #cdbbef, #8892d1, #9FA8DA);*/
    background-size: cover;
  }
        </style>
    <script>

        function borrar(){
            var respuesta = confirm("¿Desea realmente borrar el registro?");
            if (respuesta) {
                return true;
            }else{
                return false;
            }
        }
     
    </script>
    
</head>
<body>
    <!-- CABECERA -->
    <header class="py-3">
        <h1 class="text-center text-light"><span class="badge text-bg-danger">LECTORES</span></h1>
        <a style="margin-left: 1380px" class="btn btn-warning btn-lg" href="../../../bienvenida.php">Volver</a>
    </header>

    <!-- BOTÓN PARA CREAR UN NUEVO REGISTRO -->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">            

                <a href="agregar.php" class="btn btn-info" >
                    <i class="material-icons" >library_add</i>
                </a>

            </div>    
        </div>    
    </div>    

    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive"> 
                    <table bgcolor="white" id="tablaUsuario" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>código</th>
                                <th>nombre</th>
                                <th>apellido</th>
                                <th>correo</th>
                                <th>Opciones</th>  
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php 
                                // control sobre la consulta
                                if ($result -> num_rows > 0) {
                                    while($row = $result ->fetch_assoc()){
                                        echo '<tr>';
                                        echo '<td>'.$row['codigo'].'</td>';
                                        echo '<td>'.$row['nombre'].'</td>';
                                        echo '<td>'.$row['apellido'].'</td>';
                                        echo '<td>'.$row['correo'].'</td>';
                                        echo '<td>';
                                        echo '<a class="btn btn-secondary me-md-2" href = "lee.php?id='.$row['id'].'">leer </a>'; 
                                        echo '<a class="btn btn-success me-md-2" href = "actualizar.php?id='.$row['id'].'">actualizar</a>';
                                        echo '<a class=" btn btn-danger me-md-2" href = "eliminar.php?id='.$row['id'].'" onclick=" return borrar()">eliminar</a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    $result -> free();
                                }
                            
                            ?>
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>




    



    <!-- bootstrap Popper and our JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> 
    
    <!-- data tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    
    <!-- js -->
    <script type="text/javascript" src="../main.js"></script>

</body>
</html>