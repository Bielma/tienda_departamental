<?php
    require 'database.php';
    $id = '';
    $stmt = null;
    
    if(isset($_POST['poducto'])){  
        $rfc =$_POST['rfc'];     
        $stmt = $conn->prepare('select * from productos where id_producto LIKE :id');           
        $stmt -> execute(array('id'=> '%'.$id.'%'));                     
        
    }else{
        $stmt = $conn->prepare('select * from productos');    
        $stmt -> execute(array());        
    }
    
    function imprimirProd($stmt){
        if($stmt!=null){
            while($row = $stmt->fetch()){
                echo '<table class= "table table-striped table-bordered"';
                echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Nombre</th>';            
                    echo '<th>Descipción</th>';            
                    echo '<th>Precio</th>';
                    echo '<th>Existencia</th>';            
                    echo '<th>Departamento</th>';
                echo '</tr>';                            
                    echo '<td>'.$row['id_producto'].'</td>';
                    echo '<td>'.$row['nombre'].'</td>';
                    echo '<td>'.$row['descripcion'].'</td>';
                    echo '<td>'.$row['precio'].'</td>';                            
                    echo '<td>'.$row['existencia'].'</td>';
                    echo '<td>'.$row['departamento'].'</td>';                                       
                echo '</tr>';
                echo '</table>';     
            }
            
        }else{
            echo 'No hay registros de productos';
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
                            <a href = "empleados.php">Empleados</a>
                        </li>
                        <li>
                            <a href = "productos.php">Productos</a>
                        </li>
                    </ul>
                </nav>
                <div class ="clearfix"></div>
                </div>  
        </header>
    <div class = "center">
                <section id = "content">
                    <h2>Todos los Productos</h2>
                    <!--Listado-->
                    <article class = "clientes-list">
                        <?php                                  
                            imprimirProd($stmt);                             
                        ?>
                    </article>

                </section>
                <aside id = "sidebar">
                    <div id = "nav-panel" class = "sidebar-item">
                        <h3> Opciones</h3>
                        <a href="registrarProductos.php" class = "btn btn-succes">Registrar Producto</a>        
                    </div>
                    <div id = "search" class = "sidebar-item">
                        <h3>Buscador </h3>
                        <p>Busca un producto</p>
                        <form action = "productos.php" method = "POST">
                            <input type = "text" name ="id"/>
                            <input type = "submit" name ="producto" value = "Buscar" class= "btn"/>
                        </form>                
                    </div>
                </aside>
                <div class ="clearfix"></div>
                
            </div>       
</body>
</html>