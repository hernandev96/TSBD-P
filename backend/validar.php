<?php

require 'funciones/login.php';

    $user = addslashes($_POST["USER"]);
    $pass = addslashes($_POST["pass"]);
    $typeus = addslashes($_POST["tipo_cuenta"]);
if($user!="" && $pass!="" & $typeus!=""){

    // evita las inyecciones sql
    $user = addslashes($_POST["USER"]);
    $pass = addslashes($_POST["pass"]);
    $typeus = addslashes($_POST["tipo_cuenta"]);
    $data= validar($user,$pass,$typeus);
    echo $data;
}
else{
    
    echo 0;
}




?>