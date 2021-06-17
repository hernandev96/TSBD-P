var data;
$(document).ready(function () {
    //$("#options").on('change',function () {
    //  var option=$("#options").val();
    //console.log("La opcion es" +" " +option);
    //console.log("Antes del ajax");

    $.ajax({
        type: "GET",
        url: "../backend/get_almacenTrabajador.php",
        dataType: 'json',
        success: function (result) {
            console.log("result" + "" + result);

            for (var i = 0; i < result.length; i++) {
                $("#tbody-productos").append($(
                    '<tr>' +
                    '<td >' + result[i].ID + '</td>' +
                    '<td>' + result[i].nombre + '</td>' +
                    '<td>' + result[i].marca + '</td>' +
                    '<td>' + result[i].descripcion + '</td>' +
                    '<td>' + result[i].Peso_Neto + '</td>' +
                    '<td>' + result[i].Tipo + '</td>' +
                    '<td>' + result[i].Cantidad + '</td>' +
                    '<td>' + result[i].Precio_Venta + '</td>' +
                    '<td>' + result[i].Fecha_Caducidad + '</td>' +
                    '<td>' +
                    '<div class="text-sm-center">' +
                    '<div class="btn-group">' +
                    '<button type="button" style="margin:20px;" class="btn btn-primary btnEditar"  data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>' +
                    '<button type="button" style="margin:20px;" class="btn btn-danger btnBorrar" >Eliminar</button>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '</tr>'
                ));
            }//fin del for
            return true;
        },
        error: function () {
            console.log("Nel prro");
        }

    });

    $(document).on("click", "#btn-modifica", function () {
        console.log("ENTRE A MODIFICAR");
        var cantidad = $("#Cantidad-modal").val();
       
        cant = { ID: $("#input-id").val(), Cantidad:cantidad };
        var cantJSON = JSON.stringify(cant);
        console.log("Soy el JSON"+" "+cantJSON)
        $.ajax({
            type: "UPDATE",
            url: "../backend/get_almacenTrabajador.php",
            data: cantJSON,
            async:false,
            success: function (result) {
                console.log("result UPDATE:"+result);
                if (result == 1) {
                    console.log("modifique");
                }
            }
        });
    });
    

});

//});

$(document).on("click", ".btnEditar", function () {
    var fila = (this).closest("tr");
    console.log(fila);
    id = $(fila).find("td").eq(0).text();
    $("#input-id").val(id);
    cantidad = $(fila).find("td").eq(6).text();
    console.log("El id del producto es:" + "" + id + "Y la cantidad es" + cantidad);

    /* $(document).on("click",".btnBorrar", function(){
         console.log("Borrare el procducto con:"+id );
     });*/





});







$(document).on("click", ".btnBorrar", function () {
    var fila = (this).closest("tr");
    console.log(fila);
    id = $(fila).find("td").eq(0).text();
    cantidad = $(fila).find("td").eq(6).text();
    console.log("El id del producto es:" + "" + id + "Y la cantidad es" + cantidad);

    console.log("Eliminare el producto con id=" + id);
    idp = { ID: id };
    idJSON = JSON.stringify(idp);
    console.log(idJSON);
    $.ajax({
        url: "../backend/get_almacenTrabajador.php",
        type: 'DELETE',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        data: idJSON,
        success:function(result){
            if(result=="1"){
               //window.location.reload();
                
            }else{
                alert("No se pudo borrar el producto ");
            }
           
        }

    });


});





$(document).on("click", "#add_product", () => {

    $("#data_add_product").submit(function (e) {
        e.preventDefault();

        var nombre
        var marca = $("#marca").val();
        var descripcion = $("#descripcion").val();
        var Peso_Neto = $("#Peso_Neto").val();
        var Tipo = $("#Tipo").val();
        var Cantidad = $("#Cantidad").val();
        var Precio_Compra = $("#Precio_Compra").val();
        var Precio_Venta = $("#Precio_venta").val();
        var Fecha_Caducidad = $("#Fecha_Caducidad").val();
        var product = { nombre: $("#nombre").val(), marca: marca, descripcion: descripcion, Peso_neto: Peso_Neto, Tipo: Tipo, Cantidad: Cantidad, Precio_Compra: Precio_Compra, Precio_Venta: Precio_Venta, Fecha_Caducidad: Fecha_Caducidad };
        var productJSON = JSON.stringify(product);
        $.ajax({
            type: "POST",
            url: "../backend/get_almacenTrabajador.php",
            data: productJSON,
            success: function (result) {
                if (result == "1") {
                    $(location).attr("href", "PanelTrabajador.php");
                } else {
                    console.log(result);
                    alert("No se pudo agregar el producto, intentelo mas tarde");

                }
            }
        });

    });

});















