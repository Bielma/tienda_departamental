<?php
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="sem_isw";

    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    try {

        $conn = new PDO("mysql:host=$servidor;dbname=$baseDeDatos;", $usuario, $clave, $dsn_Options);
    
        } catch (PDOException $e) {
    
        die('Connection Failed: ' . $e->getMessage());
    
        }
    

    if(!$enlace){
        echo"Error en la conexion con el servidor..";
    }

    function validaCorreo($dom){
        if (!strcmp($dom , 'gmail.com')  || !strcmp($dom , 'hotmail.com') || !strcmp($dom , 'yahoo.com')){
            return false;
        }
        else{
            return true;
        }
        
    }
?>