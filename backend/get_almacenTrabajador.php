<?php

require "funciones/admin_almacenTrabajador.php";


$peticion=$_SERVER['REQUEST_METHOD'];
$arr=array("peticion"=>"$peticion");

if($peticion=="GET"){
    $arreglo_prod=get_Productos();
    echo json_encode($arreglo_prod);
}
    if($peticion=="DELETE"){
        //obtenemos los datos json enviados y los decodificamos
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);
        $ID=$data->ID;
        echo  delete_producto($ID);
    }
    if($peticion=="POST"){
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);
        $nombre=$data->nombre;
        $descripcion=$data->descripcion;
        $Peso_Neto=$data->Peso_Neto;
        $tipo=$data->Tipo;
        $Cantidad=$data->Cantidad;
        $precio_compra=$data->Precio_Compra;
        $precio_venta=$data->Precio_Venta;
        $fecha_caducidad=$data->Fecha_Caducidad;
        echo add_producto($nombre,$descripcion,$marca,$Peso_Neto,$Tipo,$cantidad,$Precio_Compra,$Precio_Venta,$Fecha_Caducidad);

    }
    if($peticion=="UPDATE" ){
        $datos=file_get_contents("php://input");
        $data=json_decode($datos);

        $ID=$data->ID;
        $Cantidad=$data->Cantidad;
        
        echo update_producto($ID,$Cantidad);
    }
    

?>