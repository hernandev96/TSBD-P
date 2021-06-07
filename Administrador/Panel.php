<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../index.php");
    }else {
        # code...
?>
<!doctype html>
<html>
    <head>
        <title>Panel del Administrador</title>
        <meta charset="utf-8">
        <link rel="icon" href="../images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="../css/administrador/index.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <script type="text/javascript" async >
        $(document).ready(function(){
            
            $(".btn-img").hover(function(){
                var id=$(this).attr("id");
                $("#"+id+"i").attr("src","../images/"+id+"i.png");
                
            },function(){
                var id=$(this).attr("id");
                $("#"+id+"i").attr("src","../images/"+id+".png");
            });

            $("#logout").click(function(){
                $(location).attr("href","../backend/logout.php");
            });
            $("#admin").click(function(){
                $(location).attr("href","almacen.php");
            });
            $("#empleados").click(function(){
                $(location).attr("href","empleados.php");
            });
            

        });
    </script>
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
        <section>
            <div class="flexing">
                <div class="card " id="productos_admin">
                   <div class="card-body">
                        <div class="ubication">
                            <h2 class="text-center">
                                Administrar productos
                            </h2>
                            <button class="btn-img" id="admin">
                                <img src="../images/admin.png" alt="" width="124px" height="124px" id="admini">
                            </button>
                        </div>
                   </div>
                </div>
                <div class="card " id="empleado_admin">
                   <div class="card-body">
                        <div class="ubication">
                            <h2 class="text-center">
                                Administrar Empleados
                            </h2>
                            <button class="btn-img" id="empleados">
                                <img src="../images/empleados.png" alt="" width="124px" height="124px" id="empleadosi">
                            </button>
                        </div>
                   </div>
                </div>
            </div>
        </section>
    </body>
</html>





<?php } ?>
