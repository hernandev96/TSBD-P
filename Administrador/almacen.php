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
            <title>
                Almacen 
            </title>
            <meta charset="utf-8">
            <link rel="icon" href="../images/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
            <link href="../css/administrador/almacen.css" rel="stylesheet">
        </head>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#regresar").click(function(){
                    $(location).
                    attr("href","panel.php");
                });
                $("#logout").click(function(){
                    $(location).attr("href","../backend/logout.php");
                });
                $("#consultar").click(()=>{

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
                <div class="container">
                    <div class="row">
                        <div class=" seleccion card" id="tarjeta">
                            <h2 class="margen">
                                <img src="../images/lista.png" alt="" width="40px" height="40px">
                                Tablas de productos
                            </h2>
                            <select name="options" id="options" class="select-style margen">
                                <option value="" disabled selected>--Selecciona una tabla</option>
                                <option value="aceites_aderezos">Aceites y Aderezos</option>
                                <option value="cafe_te">Café y Té</option>
                                <option value="comida_chatarra">Comida Chatarra</option>
                                <option value="embutidos">Embutidos</option>
                                <option value="enlatados">Productos enlatados</option>
                                <option value="granos_semillas">Granos y Semillas</option>
                                <option value="lacteos">Lácteos</option>
                            </select>
                            <button class="btn btn-primary margen" id="consultar">
                                Consultar
                            </button>
                            <button class="btn btn-dark margen" id="regresar">
                                Regresar
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container">

            </section>
        </body>
</html>






<?php } ?>