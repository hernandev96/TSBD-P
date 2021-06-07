<?php

    require "funciones/admin_emp.php";


    $peticion=$_SERVER['REQUEST_METHOD'];
    $arr=array("peticion"=>"$peticion");

    if($peticion=="GET"){
        $arreglo_emp=get_Empleados();
        echo json_encode($arreglo_emp);
    }
    if($peticion=="DELETE"){
        //obtenemos los datos json enviados y los decodificamos
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);
        $nombre=$data->username;
        $password=$data->password;
        
        echo delete_empleados($nombre,$password);
    }
    if($peticion=="POST"){
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);
        $nombre=$data->name;
        $pass=$data->pass;
        $user=$data->user;
        $Ap_Paterno=$data->ap_paterno;
        $Ap_Materno=$data->ap_materno;
        $cargo=$data->rol;
        $telefono=$data->phone;
        echo add_empleado($nombre,$Ap_Paterno,$Ap_Materno,$user,$pass,$cargo,$telefono);

    }
    if($peticion=="UPDATE"){
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);
        $pass=$data->pass;
        $user=$data->user;
        $cargo=$data->rol;
        $telefono=$data->phone;
        
        echo update_empleado($user,$pass,$cargo,$telefono);
    }
    

?>