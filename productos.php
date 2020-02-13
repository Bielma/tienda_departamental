<?php

    require 'database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario De Registro de Productos</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/sem_isw/estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <form  class="formulario" id="formulario" name="formulario" method="POST">
                <div class="datos-entrada">
                    <input type="text" name="nombre" placeholder="Nombre*">
                    <input type="text" name="precio" placeholder="Precio*">
                    <input type="text" name="descripcion" placeholder="Descripcion*">
                    <input type="text" name="existencia" placeholder="Existencia*">
                    <input type="text" name="dep" placeholder="Departamento*">    
                </div>
                <div>  <a>* Campos obligatorios</a>  </div>
                <input type="submit" class="btn" name="registrarse" value="Registrar">
            </form>
            <form  class = "form2" id= "form2" name = "form2"  method = "POST" action = "consultar.php">
                <input type="submit" class="btnConsultar" name="consultarProductos" value="Ver Productos">
            </form>

        </div>

</body>
</html>


<?php

    if(isset($_POST['registrarse'])){


        
        $nombre =$_POST["nombre"];
        $precio=$_POST["precio"];
        $descripcion=$_POST["descripcion"];
        $dep=$_POST["dep"];
        $existencia=$_POST["existencia"];
    
      
        if(empty($nombre)){
            echo 'El campo nombre no debe estar vacio <br>';
        }else if(empty($precio)){
            echo 'El campo precio no debe estar vacio <br>';
        }else if(empty($descripcion)){
            echo 'El campo descripción no debe estar vacio <br>';
        }else if(empty($dep)){
            echo 'El campo departamento no debe estar vacio <br>';
        }else if(empty($existencia)){
            echo 'El campo eixtencia no debe estar vacio <br>';
        }else{
            $insertarDatos = "INSERT INTO productos VALUES('$nombre',
            '$precio',
            '$descripcion',
            '$existencia'.
            '$dep')";
    
            $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
            if(!$ejecutarInsertar){
                echo"Error En la linea de sql";
            }
            else{
                echo "Registro guardado con exito";
            }
        }
        
      
    }
?>
