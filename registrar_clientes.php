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
                    <input type="text" name="rfc" placeholder="RFC">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="correo" placeholder="Correo">
                    <input type="text" name="telefono" placeholder="Telefono">
                    <input type="text" name="domicilio" placeholder="Domicilio">
                    <div class="sexo">
                        <input type="radio" name="sexo" id="hombre" value="hombre">
                        <label class="label-radio hombre" for="hombre">Hombre</label>
                        <input type="radio" name="sexo" id="mujer" value="mujer">
                        <label class="label-radio mujer" for="mujer">Mujer</label>
                    </div>
                </div>
                <input type="submit" class="btn" name="registrarse" value="Registrar">                   
            </form>

            <form  class = "form2" id= "form2" name = "form2"  method = "POST" action = "mostrar_clientes.php">
                <input type="submit" class="btnConsultar" name="volver" value="Ver Clientes">
            </form>

        </div>

</body>
</html>


<?php
    if(isset($_POST['registrarse'])){
        $sexo = "";
        $nombre =$_POST["nombre"];
        $correo=$_POST["correo"];
        $domicilio=$_POST["domicilio"];
        $telefono=$_POST["telefono"];
        $rfc=$_POST["rfc"];
        $sexo=$_POST["sexo"];

      
      

        if(empty($correo)){
            echo 'El campo correo no debe estar vacio <br>';
        }else{
            $dom = strchr($correo, '@');        
            if((strcmp($dom, "@gmail.com") == 0) || (strcmp($dom, "@hotmail.com") == 0) || (strcmp($dom, "@yahoo.com") ==0)){            
                if(empty($rfc)){
                    echo 'El campo rfc no debe estar vacio <br>';
                }else if(empty($nombre)){
                    echo 'El campo nombre no debe estar vacio <br>';
                }else if(empty($domicilio)){
                    echo 'El campo domicilio no debe estar vacio <br>';
                }else if(strlen($telefono) != 10){
                    echo 'El campo telefono debe ser de 10 digitos <br>';
                }else if(empty($sexo)){
                    echo 'El campo sexo no debe estar vacio <br>';
                }
                else {
                    $insertarDatos = "INSERT INTO datos VALUES('$rfc',
                    '$nombre',
                    '$correo',
                    '$sexo',
                    '$domicilio',
                    '$telefono')";
                    
                    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
                    if(!$ejecutarInsertar){
                        echo"Error En la linea de sql";
                    }
                    else{
                        echo "Registro guardado con exito";
                    }
                }

            }else{
                echo 'Servicio de correo invalido';
            }
            
        }
        
      
    }
?>
