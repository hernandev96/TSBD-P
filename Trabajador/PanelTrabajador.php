
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
            <link href="../css/Trabajador/trabajador.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
            <!-- Scripts -->
            <script src="../js/Trabajador/trabajador.js"></script>    
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
            <div class="container-buttons">
            <form id="typeProduct">
                <div class="container">
                    <div class="row">
                        <div class="prod" id="tarjeta">
                            <h2 class="margen" style="color:black; border:solid 5px white; border-radius: 2em; background-color: #DBFFFA;">
                                <img src="../images/lista.png" alt="" width="40px" height="40px">
                                Almacen productos
                            </h2>
                                
                        </div>
                    </div>
                </div>
            </form>
            </div>
            

            <div class="container caja">
            <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row"><!--A partir de aqui van las tarjetas-->
                        <table id="tabla-productos" class="table table-dark table-sm " style="width:100%">
                            <thead class="thead-dark" >
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Nombre  </th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Descripcion </th>
                                    <th scope="col">Peso Neto </th>
                                    <th scope="col">Tipo </th>
                                    <th scope="col">Cantidad </th>
                                    <th scope="col">Precio Venta  </th>
                                    <th scope="col">Fecha de caducidad </th>
                                    <th scope="col">Accion</th>                       
                                </tr>
                            </thead>
                            <tbody id="tbody-productos">

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifica cantidad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form>    
                            <div class="modal-body">
                                <p>Cantidad nueva: <input type="text" id="Cantidad-modal" /></p>
                                <input hidden id="input-id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary " id="btn-modifica">Guardar cambios</button>
                            </div>
                        </form>
                        </div>
                    </div>
</div>
   
        </body>
</html>






<?php } ?>