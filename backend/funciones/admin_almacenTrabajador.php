<?php

require "conexion.php";






/**Esta funcion nos devolvera los productos que vera el empleado POR ALMACEN */
function get_Productos(){
    $conexion=connect();
    $arreglo_prod=array();
    $flag=true;
    $consulta="SELECT * FROM vista_productos ;";
    $result=mysqli_query($conexion,$consulta);    
    while($flag){
        $i=0;
        $data =mysqli_fetch_array($result);
        if($data){
            array_push($arreglo_prod,$producto=array("ID"=>"$data[0]","nombre"=>"$data[1]","marca"=>"$data[2]","descripcion"=>"$data[3]","Peso_Neto"=>"$data[4]","Tipo"=>"$data[5]","Cantidad"=>"$data[6]","Precio_Venta"=>"$data[7]","Fecha_Caducidad"=>"$data[8]"));
        }else{
            $flag=false;
        }           
    }
        mysqli_close($conexion);
        return $arreglo_prod;
}
/**Funcion que elimina un producto respecto a su ID */
function delete_producto($ID){
    $conexion=connect();    
    $consulta="DELETE FROM productos WHERE ID='$ID'";
    $result=mysqli_query($conexion,$consulta);
    if($result){
        mysqli_close($conexion);
        return 1;
    }else{
        mysqli_close($conexion);
        return 0;
    }
}
/**Funcion que agrega un nuevo producto a un almacen */
function add_producto($nombre,$marca,$descripcion,$peso_neto,$tipo,$cantidad,$precio_compra,$precio_venta,$fecha_caducidad){
        $query="INSERT INTO productos VALUES('$nombre','$marca','$Descripcion','$peso_neto','$tipo','$cantidad','$precio_compra','$precio_venta','$fecha_caducidad');";
        $result=mysqli_query($conexion,$query);
        if($result){
            mysqli_close($conexion);
            return 1;
        }else{
            mysqli_close($conexion);
            return 0;
        }
}
/**Funcion que actualiza un producto respecto a su ID */
function update_producto($ID,$Cantidad){
    $conexion=connect();
    $query="UPDATE productos SET Cantidad='$Cantidad' WHERE ID='$ID'; ";
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