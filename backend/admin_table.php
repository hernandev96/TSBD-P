<?php

    
    require 'funciones/crud_productos.php';
    

    $peticion=$_SERVER['REQUEST_METHOD'];
   
    if($peticion=='GET'){
        
        $arr_productos=get_productos();
        echo json_encode($arr_productos);

    }
    if($peticion=='POST'){

    }
    if($peticion=='UPDATE'){

    }
    if($peticion=='DELETE'){
        $data=file_get_contents('php://input');
        $datos=json_decode($data);
        $id=$datos->id;
        echo delete_producto_ad($id);
    }





?>