<?php
session_start();
session_destroy();

?>
<!doctype html>
<html>
    <head>
        <title>
            Logiin
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/index.css" rel="stylesheet">
        <link rel="icon" href="images/logo.png">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <script>
       $(document).ready(function(){
           $("form").focusin(function(){
                $("body").css("backdrop-filter","blur(15px)");
           });
           $("form").focusout(function(){
                $("body").css("backdrop-filter","none");
           });
           
       });

    </script>
    <body>
        
        <div class="tarjeta card mx-auto" id="card">
            <figure class="mx-auto ">
                <img src="images/empleados.png" alt="Usuario" width="108px" height="108px">
            </figure>
            <div class="card-body ">s
                <form id="login-form">
                    <div class=" text-center">
                        <input class="input-style mx-auto" placeholder="Usuario" type="text" require>
                    </div>
                    <div class=" text-center">
                        <input class="input-style mx-auto" placeholder="Contraseña" type="password" require>
                    </div>
                    <div class=" text-center">
                        <select class="select-style mx-auto">
                            <option value="" disabled selected>--selecciona tu tipo de cuenta</option>
                            <option value="administrador">Administrador</option>
                            <option value="trabajador">Trabajador</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn " value="Iniciar Sesiòn" id="btn-login">
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>
