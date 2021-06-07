<?php

require "conexion.php";

/**Esta funcion nos devuelve todos los empleados*/
function get_Empleados(){

    $conexion=connect();
    $arreglo_emp=array();
    $flag=true;
    $consulta="SELECT * FROM usuario;";
    $result=mysqli_query($conexion,$consulta);    
    while($flag){
        $data =mysqli_fetch_array($result);
        if($data){
            array_push($arreglo_emp,$emp=array("username"=>"$data[0]","password"=>"$data[1]","nombre"=>"$data[2]",
            "Ap_Paterno"=>"$data[3]","Ap_Materno"=>"$data[4]","cargo"=>"$data[5]","telefono"=>"$data[6]"));
        }else{
            $flag=false;
        }
       
    }
    mysqli_close($conexion);
    return $arreglo_emp;

}

/**Esta funcion elimina un empleado **/
function delete_empleados($username,$pass){

    $conexion=connect();
    $query="DELETE FROM usuario WHERE username='$username' AND password='$pass'";
    $result=mysqli_query($conexion,$query);
    if($result){
        mysqli_close($conexion);
        return 1;

    }else{
        mysqli_close($conexion);
        return 0;
    }

} 
// Funcion para agregar un empleado
function add_empleado($nombre,$Ap_Paterno,$Ap_Materno,$user,$pass,$cargo,$telefono){
    $conexion=connect();
    $query="INSERT INTO usuario VALUES('$user','$pass','$nombre','$Ap_Paterno','$Ap_Materno','$cargo','$telefono');";
    $result=mysqli_query($conexion,$query);
    if($result){
        mysqli_close($conexion);
        return 1;
    }else{
        mysqli_close($conexion);
        return 0;
    }


}

// Funcion para actualizar un empleado
function update_empleado($user,$pass,$cargo,$telefono){
    $conexion=connect();
    $query="UPDATE usuario SET cargo='$cargo', telefono='$telefono' WHERE usuario.username='$user' AND usuario.password='$pass'; ";
    $result=mysqli_query($conexion,$query);
    if($result){
        mysqli_close($conexion);
        return 1;
    }else{
        mysqli_close($conexion);
        return 0;
    }
}

?>