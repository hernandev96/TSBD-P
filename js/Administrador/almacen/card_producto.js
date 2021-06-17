
function create_div_a(){
    var div=document.createElement("div");
    return div;

}
function create_button_a(id,name){
    var button=document.createElement("button");
    var text=document.createTextNode("Ver más");
    button.appendChild(text);
    button.setAttribute("class","btn btn-success btn-center");
    button.setAttribute("id",id);
    button.setAttribute("name",name);
    return button;

}

function create_img_a(){
    var img=document.createElement("img");
    return img;
}

function create_text(text,tipo){

    var element=document.createElement(tipo);
    var texto=document.createTextNode(text);
    element.appendChild(texto);
    element.setAttribute("class","text-center");
    return element;
}

function create_card(nombre,tipo,caducidad){

    var name=create_text(nombre,"h2");
    var type=create_text(tipo,"p");
    var expiration=create_text(caducidad,"p");
    var view_more=create_button_a(nombre,"ver mas");

    var div_card=create_div_a();
    var div_p=create_div_a();

    div_card.appendChild(name);
    div_card.appendChild(type);
    div_card.appendChild(expiration);
    div_card.appendChild(view_more);
    div_card.setAttribute("class","mx-auto");
    div_p.setAttribute("class","tarjeta");
    div_p.appendChild(div_card);

    return div_p;

}

function create_card_default(){
    var img_user;
    var add_div;
    var figure;
    var btn;

    figure=document.createElement("figure");
    img_user=document.createElement("img");
    add_div=document.createElement("div");
    btn=document.createElement("button");
    // cargamos la imagen de usuario y definimos algunos atributos
    img_user.setAttribute("src","../images/add_product.png");
    img_user.setAttribute("id","add_product");
    img_user.setAttribute("width","100px");
    img_user.setAttribute("height","100px");
    figure.appendChild(img_user);
    btn.appendChild(figure);
    btn.setAttribute("class","btn_add");
    btn.setAttribute("id","agregar_producto");
    add_div.setAttribute("class","tarjeta");
    add_div.appendChild(btn);
    return add_div;
    
}


function create_modal(id,datos){
    var product;
    for(i=0;i<datos.length;i++){
        if(datos[i].nombre==id){
            product=datos[i];
        }
    }
    var nombre=create_text_product(product.nombre,"h2","Nombre: ");
    nombre.setAttribute("id",product.nombre);
    var descripcion=create_text_product(product.descripcion,"p","Descripcion: ");
    var caducidad=create_text_product(product.caducidad,"p","Caducidad: ");
    var tipo=create_text_product(product.Tipo,"p","Tipo: ");
    var Precio_Venta=create_text_product(product.Precio_Venta,"p","Precio_Venta: ");
    var Precio_Compra=create_text_product(product.Precio_Compra,"p","Precio_Compra: ");
    var Peso_Neto=create_text_product(product.Peso_Neto+"gr","p","peso_Neto: ");
    var Marca=create_text_product(product.Marca,"p","Marca: ");
    Marca.setAttribute("id",product.Marca);
    var Cantidad=create_text_product(product.Cantidad,"p","Cantidad: ");

    var boton_borrar=document.createElement("button");
    var aux1=document.createTextNode("Eliminar");
    var aux2=document.createTextNode("Actualizar");
    var aux3=document.createTextNode("Cerrar");
    var boton_actualizar=document.createElement("button");
    var boton_cerrar=document.createElement("button");

    boton_borrar.appendChild(aux1);
    boton_actualizar.appendChild(aux2);
    boton_cerrar.appendChild(aux3);

    boton_borrar.setAttribute("class","btn btn-danger");
    boton_borrar.setAttribute("id","delete");
    boton_actualizar.setAttribute("class","btn btn-warning");
    boton_actualizar.setAttribute("id","update");
    boton_cerrar.setAttribute("class","btn btn-success");
    boton_cerrar.setAttribute("id","close");

    var div_principal=create_div_a();
    var div_imagen=create_div_a();
    var div_datos=create_div_a();
    var div_buttons=create_div_a();

    div_buttons.appendChild(boton_borrar);
    div_buttons.appendChild(boton_actualizar);
    div_buttons.appendChild(boton_cerrar);
    div_buttons.setAttribute("class","view_product_buttons");

    var figure=document.createElement("figure");
    var img=document.createElement("img");
    img.setAttribute("src","../images/stock.png");
    img.setAttribute("width","200px");
    img.setAttribute("height","329px");
    figure.appendChild(img);


    div_datos.appendChild(nombre);
    div_datos.appendChild(descripcion);
    div_datos.appendChild(caducidad);
    div_datos.appendChild(tipo);
    div_datos.appendChild(Precio_Venta);
    div_datos.appendChild(Precio_Compra);
    div_datos.appendChild(Peso_Neto);
    div_datos.appendChild(Marca);
    div_datos.appendChild(Cantidad);
    div_datos.appendChild(div_buttons);

    div_imagen.appendChild(figure);
    div_principal.appendChild(div_imagen);
    div_principal.appendChild(div_datos);
    div_principal.setAttribute("id","view_product");
    div_principal.setAttribute("class","view_product mx-auto");

    document.body.appendChild(div_principal);
    $("body").css("backdrop-filter","blur(15px)");
    $(".productos").css("filter","blur(15px)");
    $("header").css("filter","blur(15px)");
    


}
function borrar_modal(id){

    $("body").css("backdrop-filter","none");
    $(".productos").css("filter","none");
    $("header").css("filter","none");
    document.getElementById(id).remove();
}

function create_text_product(text,tipo,message){

    var element=document.createElement(tipo);
    var texto=document.createTextNode(message+text);
    element.appendChild(texto);
    element.setAttribute("class","text-center");
    return element;
}

function add_product(){
    var div_principal=create_div_a();
    
    var figure_registro=document.createElement("figure");
    var figure_documento=document.createElement("figure");
    var img_registro=document.createElement("img");
    var img_documento=document.createElement("img");
    var img_cerrar=document.createElement("img");

    var button_registro=document.createElement("button")
    var button_documento=document.createElement("button");
    var button_cerrar=document.createElement("button");

    var titulo1=document.createTextNode("Agregar registro");
    var titulo2=document.createTextNode("Agregar desde archivo");
    var title1=document.createElement("h2");
    var title2=document.createElement("h2");
    title1.appendChild(titulo1);
    title2.appendChild(titulo2);

    img_registro.setAttribute("src","../images/add_product.png");
    img_registro.setAttribute("width","128px");
    img_registro.setAttribute("height","128px");

    img_documento.setAttribute("src","../images/add_document.png");
    img_documento.setAttribute("width","128px");
    img_documento.setAttribute("height","128px"); 
    
    img_cerrar.setAttribute("src","../images/cancel.png");
    img_cerrar.setAttribute("width","64px");
    img_cerrar.setAttribute("height","64px"); 

    figure_registro.appendChild(img_registro);
    figure_registro.appendChild(title1);
    figure_documento.appendChild(img_documento);
    figure_documento.appendChild(title2);

    button_registro.appendChild(figure_registro);
    button_documento.appendChild(figure_documento);
    button_registro.setAttribute("class","btn btn-img");
    button_registro.setAttribute("id","registro");
    button_documento.setAttribute("class","btn btn-img");
    button_documento.setAttribute("id","documento");
    button_cerrar.appendChild(img_cerrar);
    button_cerrar.setAttribute("class","btn btn-cerrar");
    button_cerrar.setAttribute("id","cerrar");

    div_principal.appendChild(button_registro);
    div_principal.appendChild(button_documento);
    div_principal.appendChild(button_cerrar);
    div_principal.setAttribute("class","mx-auto add_product");
    div_principal.setAttribute("id","add_producto");


    document.body.appendChild(div_principal);
    $("body").css("backdrop-filter","blur(15px)");
    $(".productos").css("filter","blur(15px)");
    $("header").css("filter","blur(15px)");



}
function close_add_product(id){

    $("body").css("backdrop-filter","none");
    $(".productos").css("filter","none");
    $("header").css("filter","none");
    document.getElementById(id).remove();
}

function form_producto(){
    var div_form=document.createElement("div");
    var form=document.createElement("form");

    var nombre_input=document.createElement("input");
    nombre_input.setAttribute("name","nombre");
    nombre_input.setAttribute("class","input_form");
    nombre_input.setAttribute("placeholder","Nombre del producto");
    nombre_input.setAttribute("type","text");
    var descripcion_input=document.createElement("input");
    descripcion_input.setAttribute("name","descripcion");
    descripcion_input.setAttribute("class","input_form");
    descripcion_input.setAttribute("placeholder","Descripcion");
    descripcion_input.setAttribute("type","text");
    var caducidad_input=document.createElement("input");
    caducidad_input.setAttribute("name","caducidad");
    caducidad_input.setAttribute("class","input_form");
    caducidad_input.setAttribute("placeholder","Fecha de Caducidad");
    caducidad_input.setAttribute("type","date");
    var tipo_input=document.createElement("input");
    tipo_input.setAttribute("name","cantidad");
    tipo_input.setAttribute("class","input_form");
    tipo_input.setAttribute("placeholder","Cantidad");
    tipo_input.setAttribute("type","text");
    var Precio_Venta_input=document.createElement("input");
    Precio_Venta_input.setAttribute("name","Precio_Venta");
    Precio_Venta_input.setAttribute("class","input_form");
    Precio_Venta_input.setAttribute("placeholder","Precio de Venta");
    Precio_Venta_input.setAttribute("type","text");
    var Precio_Compra_input=document.createElement("input");
    Precio_Compra_input.setAttribute("name","Precio_Compra");
    Precio_Compra_input.setAttribute("class","input_form");
    Precio_Compra_input.setAttribute("placeholder","Precio de Compra");
    Precio_Compra_input.setAttribute("type","text");
    var Peso_Neto_input=document.createElement("input");
    Peso_Neto_input.setAttribute("name","Peso_Neto");
    Peso_Neto_input.setAttribute("class","input_form");
    Peso_Neto_input.setAttribute("placeholder","Peso Neto");
    Peso_Neto_input.setAttribute("type","text");
    var Marca_input=document.createElement("input");
    Marca_input.setAttribute("name","Marca");
    Marca_input.setAttribute("class","input_form");
    Marca_input.setAttribute("placeholder","Marca");
    Marca_input.setAttribute("type","text");
    var Cantidad_input=document.createElement("input");
    Cantidad_input.setAttribute("name","Cantidad");
    Cantidad_input.setAttribute("class","input_form");
    Cantidad_input.setAttribute("placeholder","Cantidad");
    Cantidad_input.setAttribute("type","text");

    var button_cancelar=document.createElement("button");
    var text_cancel=document.createTextNode("Cancelar");
    var text_registrar=document.createTextNode("Registrar");
    var button_registrar=document.createElement("button");

    button_cancelar.append(text_cancel);
    button_cancelar.setAttribute("class","btn btn-danger");

    button_registrar.appendChild(text_registrar);
    button_registrar.setAttribute("class","btn btn-success");

    var div_buttons=document.createElement("div");
    var div_1=document.createElement("div");
    var div_2=document.createElement("div");
    var div_3=document.createElement("div");
}