<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'multiservicioskyg';

$conection = @mysqli_connect($host,$user,$password,$db);

if($conection){
    echo" Error en la conexion";
}else{
    echo"Conexion exitosa";
}


?>