<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../index.php");
    }else {
            echo "<script>";
            echo "var user='".$_SESSION['user']."';";
            echo "</script>";

        # code...
?>
<!doctype html>
<html>
        <head>
            <title>
                Empleados 
            </title>
            <meta charset="utf-8">
            <link rel="icon" href="../images/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
            <link href="../css/administrador/empleados.css" rel="stylesheet">
            <script src="../js/Administrador/card.js" type="text/javascript"></script>
            <script src="../js/Administrador/formulario.js" type="text/javascript"></script>
        </head>
        <body class="stylebody">
            <header>
                <div class="row flexing">
                    <div class="col-sm">
                        <a  href="panel.php" >
                            <img src="../images/administracion.png" alt="icono de administracion" width="56px" height="56px">   
                            Sistema de Administración.
                        </a>
                    </div>               
                    <div class="col-sm-2">
                        <button class="btn btn-dark" id="logout">
                            Cerrar Sesión
                        </button>
                    </div>
                </div>
            </header>
            <section class="container" id="cabecera_empleados">
               <h2 class="text-center">
                   <img src="../images/empleadolista.png" alt="" width="58px" height="58px">
                   Empleados
                   <button class="btn btn-dark" id="back" style="margin-left:10px;">Regresar</button>
               </h2>
            </section>
            <section>
                <div class="Presentacion">

                </div>
            </section>
        </body>
        <script async type="text/javascript">
            
            var data;
            $.ajaxSetup({contentType:"application/json; charset=utf-8"});
            $(document).ready(function(){
                $("#logout").click(function(){
                    $(location).attr("href","../backend/logout.php");
                });
                $("#back").click(function(){
                    $(location).attr("href","panel.php");
                });
                
                $.ajax({
                    
                    type:"GET",
                    url:"../backend/get_empleados.php",
                    dataType:'json',
                    success:function(result){
                        data=result;
                        var username;
                        var pass;
                        var nombre;
                        var cargo;
                        var telefono;
                        $(".Presentacion").append(card_empty());
                        for(i=0;i<result.length;i++){
                            var emp=JSON.stringify(result[i]);
                            var empJSON=JSON.parse(emp);
                            
                            if(empJSON.username!=user){
                                username=empJSON.username;
                                pass=empJSON.password;
                                nombre=empJSON.nombre+" "+empJSON.Ap_Paterno+" "+empJSON.Ap_Materno;
                                cargo=empJSON.cargo;
                                telefono=empJSON.telefono;
                                $(".Presentacion").append(card(username,pass,nombre,cargo,telefono));

                            }
                        }
                    }
                    
                });                
            });
            
            $(document).on("click","#add_employee",()=>{
                   form();
                   $("div:target");
                   $("form").on("click","#Cancel",function(){
                       form_delete("formulario");
                    });
                    $("#data_employee").submit(function(e){
                        e.preventDefault();
                        
                        var nombre=$("#nombre").val();
                        var Ap_Paterno=$("#Ap_Paterno").val();
                        var Ap_Materno=$("#Ap_Materno").val();
                        var username=$("#username").val();
                        var password=$("#password").val();
                        var cargo=$("#cargo").val();
                        var telefono=$("#telefono").val();
                        var user={name:nombre,ap_paterno:Ap_Paterno,ap_materno:Ap_Materno,user:username,pass:password,rol:cargo,phone:telefono};
                        var userJSON=JSON.stringify(user);
                        $.ajax({
                            type:"POST",
                            url:"../backend/get_empleados.php",
                            data:userJSON,
                            success:function(result){
                                if(result=="1"){
                                    $(location).attr("href","empleados.php");
                                }else{
                                    console.log(result);
                                    alert("No se pudo agregar el empleado, intentelo mas tarde");
                                    form_delete("formulario");
                                }
                            }
                        });

                    });

            });
            
           
        </script>
</html>






<?php } ?>