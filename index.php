<?php
    require 'database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tienda Departamental</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/sem_isw/estilos.css">
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
                <div className ="clearfix"></div>
                </div>  
            </header>
   
            <footer id = "footer">
                <div class= "center">
                <p>
                    &copy; Proyecto, Seminario de Ingeniería de Software, 20A.
                </p>
                </div>
            </footer>
     
    </body>
</html>

