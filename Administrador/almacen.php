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
            <script type="text/javascript" src="../js/Administrador/almacen/card_producto.js"></script>
        </head>
        <script type="text/javascript">
            $.ajaxSetup({contentType:"application/json; charset=utf-8"});
            var data;
            $(document).ready(function(){
                $("#regresar").click(function(){
                    $(location).
                    attr("href","panel.php");
                });
                $("#logout").click(function(){
                    $(location).attr("href","../backend/logout.php");
                });
                
                $.ajax({
                    type:'GET',
                    url:'../backend/admin_table.php',
                    dataType:'json',
                    success:(result)=>{
                        data=result;
                        $(".productos").append(create_card_default());
                        for(i=0;i<result.length;i++){
                            var nombre=result[i].nombre;
                            var tipo=result[i].Tipo;
                            var caducidad=result[i].caducidad;
                            $(".productos").append(create_card(nombre,tipo,caducidad));
                            console.log(result[i]);
                        }
                            
                    }
                });

                $(document).on('click',"#agregar_producto",function(){
                    console.log("Click en el boton agregar");
                    add_product();
                    $("div:target");
                    $("#cerrar").click(function(){
                        close_add_product("add_producto");
                    });
                    $("#registro").click(function(){
                        close_add_product("add_producto");
                        form_producto();
                        $("div:target");
                    });
                });

                $(document).on('click','.tarjeta button',function(){
                    if($(this).attr("id")!='agregar_producto'){
                        create_modal($(this).attr("id"),data);
                        $("div:target");
                        $("#view_product").on('click','#close',function(){
                            borrar_modal("view_product");
                        });
                        $("#view_product").on('click','#delete',function(){
                            var product=$("#view_product h2").attr("id");
                            console.log(product);
                            var id;
                            for(i=0;i<data.length;i++){
                                if(data[i].nombre==product){
                                    id={id:data[i].ID};
                                }
                            }
                            var idJSON=JSON.stringify(id);
                            $.ajax({
                                type:'DELETE',
                                url:'../backend/admin_table.php',
                                data:idJSON,
                                success:function(result){
                                    if(result=='1'){
                                        $(location).attr("href","almacen.php");
                                    }else{
                                        alert("No se pudo eliminar el producto,intentalo mas tarde.");
                                    
                                    }
                                }

                            });
                        
                        });
                    }
                    

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
                
            </section>
                <div class="productos">

                </div>
            </section>
            
        </body>
</html>






<?php } ?>