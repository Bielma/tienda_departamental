<?php

    require 'database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario De Registro de Clientes</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/sem_isw/estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <form  class="formulario" id="formulario" name="formulario" method="POST">
                <div class="datos-entrada">
                    <input type="text" name="rfc_prov" placeholder="RFC Proveedor">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="telefono" placeholder="Telefono">
                    <input type="text" name="domicilio" placeholder="Direccion">
                    <input type="text" name="correo" placeholder="Correo">
                
                </div>
                <input type="submit" class="btn" name="registrarse" value="Registrar">
            </form>
            <form  class = "form2" id= "form2" name = "form2"  method = "POST" action = "consultar.php">
                <input type="submit" class="btnConsultar" name="consultarProveedores" value="Ver Proveedores">
            </form>
        </div>

</body>
</html>


<?php
    if(isset($_POST['registrarse'])){
        $nombre =$_POST["nombre"];    
        $domicilio=$_POST["domicilio"];
        $telefono=$_POST["telefono"];
        $rfc_prov=$_POST["rfc_prov"];
        $correo=$_POST["correo"];
        

        if(empty($nombre)){
            echo 'El campo nombre no debe estar vacio <br>';
        }else if(empty($domicilio)){
            echo 'El campo domicilio no debe estar vacio <br>';
        }else if(strlen($telefono) != 10){
            echo 'El campo telefono debe ser de 10 digitos <br>';
        }else if(empty($rfc_prov)){
            echo 'El campo rfc no debe estar vacio <br>';
        }else if(empty($correo)){
            echo 'El campo correo no debe estar vacio <br>';
        }else{

            $insertarDatos = "INSERT INTO proveedores VALUES('$rfc_prov',
            '$nombre', 
            '$telefono', 
            '$correo',      
            '$domicilio')";
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
