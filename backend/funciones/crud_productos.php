<?php

    require 'conexion.php';

    function get_productos(){
        $conexion=connect();
        $arreglo_table=array();
        $flag=true;
        $query="SELECT * FROM productos;";
        $result=mysqli_query($conexion,$query);
        while($flag){
            $data =mysqli_fetch_array($result);
            if($data){
                array_push($arreglo_table,$product=array("ID"=>$data[0],"nombre"=>"$data[1]","Marca"=>"$data[2]","descripcion"=>"$data[3]",
                "Peso_Neto"=>"$data[4]","Tipo"=>"$data[5]","Cantidad"=>"$data[6]","Precio_Compra"=>"$data[7]","Precio_Venta"=>"$data[8]","caducidad"=>"$data[9]"));
            }else{
                $flag=false;
            }
           
        }
        mysqli_close($conexion);
        return $arreglo_table;
    
    }

    function insert_productos_ad(){
        $conexion=connect();
        $query="";
    }

    function insert_producto_ad(){
        $conexion=connect();
        $query="";
    }

    function update_producto_ad(){
        $conexion=connect();
        $query="";
    }

    function delete_producto_ad($id){
        $conexion=connect();
        $query="DELETE FROM productos WHERE ID=$id;";
        $result=mysqli_query($conexion,$query);
        if($result){
            mysqli_close($conexion);
            echo $result;
        }else{
            mysqli_close($conexion);
            echo $result;
        }
    }






?>