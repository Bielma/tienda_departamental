<?php
    require 'database.php';
    $rfc = '';
    $stmt = null;
    
    if(isset($_POST['empleado'])){  
        $rfc =$_POST['rfc'];     
        $stmt = $conn->prepare('select * from empleados where rfc LIKE :rfc');           
        $stmt -> execute(array('rfc'=> '%'.$rfc.'%'));                     
        
    }else{
        $stmt = $conn->prepare('select * from empleados');    
        $stmt -> execute(array());        
    }
    
    
    function imprimirEmpleados($stmt){
        if($stmt!=null){
            while($row = $stmt->fetch()){
                echo '<table class= "table table-striped table-bordered"';
                echo '<tr>';
                    echo '<th>RFC</th>';
                    echo '<th>Nombre</th>';
                    echo '<th>Apellido</th>';    
                    echo '<th>Correo</th>';            
                    echo '<th>Telefono</th>';
                    echo '<th>Dirección</th>';            
                    echo '<th>Puesto</th>';
                echo '</tr>';                            
                    echo '<td>'.$row['rfc'].'</td>';
                    echo '<td>'.$row['nombre'].'</td>';
                    echo '<td>'.$row['apellido'].'</td>';
                    echo '<td>'.$row['correo'].'</td>';                            
                    echo '<td>'.$row['telefono'].'</td>';
                    echo '<td>'.$row['direccion'].'</td>';           
                    echo '<td>'.$row['puesto'].'</td>';
                    
                echo '</tr>';
                echo '</table>';     
            }
            
        }else{
            echo 'No hay registros de clientes';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/sem_isw/estilos.css">
    <title>Clientes</title>
</head>
<body>
    <header id = "header">
                <div class = "center">
                    <div class = "logo">                      
                        <span id = "brand">
                            <strong >Tienda </strong> Departamental
                            </span> 
                        </div>                  
                <nav id  = "menu">
                    <ul>
                        <li>
                            <a href = "index.php">Inicio</a>
                        </li>
                        <li>
                            <a href = "mostrar_clientes.php">Clientes</a>
                        </li>
                        <li>
                            <a href = "index.html">Empleados</a>
                        </li>
                        <li>
                            <a href = "index.html">Productos</a>
                        </li>
                    </ul>
                </nav>
                <div class ="clearfix"></div>
                </div>  
        </header>
    <div class = "center">
                <section id = "content">
                    <h2>Todos los Empleados</h2>
                    <!--Listado-->
                    <article class = "clientes-list">
                        <?php                                  
                            imprimirEmpleados($stmt);                             
                        ?>
                    </article>

                </section>
                <aside id = "sidebar">
                    <div id = "nav-panel" class = "sidebar-item">
                        <h3> Opciones</h3>
                        <a href="registrarEmpleado.php" class = "btn btn-succes">Registrar Empleado</a>        
                    </div>
                    <div id = "search" class = "sidebar-item">
                        <h3>Buscador </h3>
                        <p>Busca un empleado</p>
                        <form action = "empleados.php" method = "POST">
                            <input type = "text" name ="rfc"/>
                            <input type = "submit" name ="empleado" value = "Buscar" class= "btn"/>
                        </form>                
                    </div>
                </aside>
                <div class ="clearfix"></div>
                
            </div>       
</body>
</html>