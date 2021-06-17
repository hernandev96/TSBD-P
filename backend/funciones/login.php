<?php

require "conexion.php";

function validar($user,$pass,$typeus){

    session_start();
    
    $conexion= connect();
    $consulta="SELECT username,password FROM usuario WHERE username='$user' AND password='$pass'";
    $result=mysqli_query($conexion,$consulta);
    $row =$result->num_rows;
	$data = mysqli_fetch_array($result);
    if($row>0){
        $_SESSION["user"] = $data['username'];
		if($typeus=="administrador"){
            mysqli_close($conexion);
            return 1;
        }if($typeus=="trabajador"){
            mysqli_close($conexion);
            return 2;
        }
    }else{
        mysqli_close($conexion);
        echo 0;
    }
    

}


?>