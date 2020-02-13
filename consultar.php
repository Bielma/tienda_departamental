<?php


require 'database.php';
$sql = '';
$stmt = null;
$flag = 0;
$consultando = 'adsas';
if(isset($_POST['consultarClientes'])){
    $consultando = 'Clientes';
    $stmt = $conn->prepare('select * from datos');

    $stmt -> execute(array());
    $flag = 1;

}else if(isset($_POST['consultarEmpleados'])){
    $consultando = 'Empleados';
    $stmt = $conn ->prepare('select * from empleados');
    $stmt -> execute(array());
    $flag = 2;
}
else if(isset($_POST['consultarProductos'])){
    $consultando = 'Productos';
    $stmt = $conn ->prepare('select * from productos');
    $stmt -> execute(array());
    $flag = 3;
}else if(isset($_POST['consultarProveedores'])){
    $consultando = 'Proveedores';
    $stmt = $conn ->prepare('select * from proveedores');
    $stmt -> execute(array());
    $flag = 4;
}

function imprimir($flag, $stmt){
    switch($flag){
        case 1:
            imprimirClientes($stmt);
        break;
        case 2:
            imprimirEmpleados($stmt);
        break;
        case 3:
            imprimirProd($stmt);
        break;
        case 4:
            imprimirProv($stmt);
        break;
    }
}

function imprimirClientes($stmt){
    if($stmt!=null){
        while($row = $stmt->fetch()){
            echo '<table class= "table table-striped table-bordered"';
            echo '<tr>';
                echo '<th>RFC</th>';
                echo '<th>Nombre</th>';
                echo '<th>Correo</th>';
                echo '<th>Sexo</th>';
                echo '<th>Telefono</th>';
                echo '<th>Dirección</th>';                
            echo '</tr>';                            
                echo '<td>'.$row['rfc'].'</td>';
                echo '<td>'.$row['nombre'].'</td>';
                echo '<td>'.$row['correo'].'</td>';
                echo '<td>'.$row['sexo'].'</td>';
                echo '<td>'.$row['domicilio'].'</td>';
                echo '<td>'.$row['telefono'].'</td>';
            echo '</tr>';
            echo '</table>';     
        }
        
    }else{
        echo 'No hay registros de clientes';
    }

}

function imprimirProv($stmt){
    if($stmt!=null){
        while($row = $stmt->fetch()){
            echo '<table class= "table table-striped table-bordered"';
            echo '<tr>';
                echo '<th>RFC</th>';
                echo '<th>Nombre</th>';            
                echo '<th>Telefono</th>';
                echo '<th>Dirección</th>';             
                echo '<th>Correo</th>';                                                                   
            echo '</tr>';                            
                echo '<td>'.$row['rfc_prov'].'</td>';
                echo '<td>'.$row['nombre'].'</td>';                
                echo '<td>'.$row['telefono'].'</td>';
                echo '<td>'.$row['domicilio'].'</td>';
                echo '<td>'.$row['correo'].'</td>';                          
            echo '</tr>';
            echo '</table>';     
        }
        
    }else{
        echo 'No hay registros de empleados';
    }

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    <nav class = "navbar-light bg-ligth"
    <a href = "" class = "navbar-brand"
    <br>
    </a>
    </nav>
    <div class "container">
        <div id "App" class "row pt-5">
            <div class  = "col-md-8">
                <div class  = "card">
                    <div class = "card-header"
                        <h4><?= $consultando; ?></h4>  
                    </div>            
                <div class = "col-md-8">
                    <div class = "card">
                        <div class="card-header">            
                            <?php                                  
                                imprimir($flag, $stmt);                             
                            ?>                    
                    </div>                                              
                </div>                                
                       
</body>
</html>