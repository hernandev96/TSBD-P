<?php


function connect(){


    $server="localhost";
    $user="root";
    $password="";
    $BD="almacen";

    $conexion=mysqli_connect($server,$user,$password,$BD);

    if($conexion->connect_errno){
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;

    }else{
        
        return $conexion;
    }
}

?>