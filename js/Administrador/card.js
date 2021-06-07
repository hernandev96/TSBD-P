
// Esta funcion creara un tarjeta para que se pueda agregar un empleado
function card_empty(){
    
    var img_user;
    var add_div;
    var figure;
    var btn;

    figure=document.createElement("figure");
    img_user=document.createElement("img");
    add_div=document.createElement("div");
    btn=document.createElement("button");
    // cargamos la imagen de usuario y definimos algunos atributos
    img_user.setAttribute("src","../images/add_employee.png");
    img_user.setAttribute("id","add_employee");
    img_user.setAttribute("width","118px");
    img_user.setAttribute("height","118px");
    figure.appendChild(img_user);
    btn.appendChild(figure);
    btn.setAttribute("class","btn_add");
    btn.setAttribute("data-bs-toggle","modal");
    btn.setAttribute("data-bs-target","#modal_prueba");

    add_div.setAttribute("class","tarjeta");
    add_div.appendChild(btn);
    return add_div;
}


// Esta funcion crea tarjetas que ayudan a presentar la informacion de los empleados
function card(username,pass,nombre,cargo,telefono){
    // creamos las variables que integraran las tarjetas 
    var delete_button;
    var update_button;
    var content_info;
    var div_buttons;
    // las variables que contienen la informacion a presentar

    var phone=document.createTextNode("Telefono: "+telefono);
    var Username=document.createTextNode("Usuario: "+username);
    var password=document.createTextNode("Contraseña: "+pass);
    var name=document.createTextNode(nombre);
    var rol=document.createTextNode("Cargo: "+cargo);

    // comenzamos con definir el contenido que tendra nuestra tarjeta al final  

    div_buttons=document.createElement("div");
    delete_button=document.createElement("button");
    update_button=document.createElement("button");
    content_info=document.createElement("div");
    img_user=document.createElement("img");
    p_delete=document.createTextNode("Eliminar");
    p_actualizar=document.createTextNode("Actualizar");

   
    // cargamos los botones con algunos atributos
    update_button.appendChild(p_actualizar);
    delete_button.appendChild(p_delete);
    delete_button.setAttribute("class","btn btn-danger");
    delete_button.setAttribute("onclick","eliminar(this,data);");
    delete_button.setAttribute("id","eliminar");
    delete_button.setAttribute("value",username);

    update_button.setAttribute("onclick","actualizar(this,data);");
    update_button.setAttribute("class","btn btn-warning");
    update_button.setAttribute("value",username);
    update_button.setAttribute("id","actualizar");

    // Creamos los elementos que contendran la informacion a mostrar en las tarjetas
    var h3_nombre=document.createElement("h3");
    h3_nombre.appendChild(name);
    h3_nombre.setAttribute("class","text-center");
    var p_username=document.createElement("p");
    p_username.appendChild(Username);
    p_username.setAttribute("class","text-center");
    var p_pass=document.createElement("p");
    p_pass.appendChild(password);
    p_pass.setAttribute("class","text-center");
    var p_cargo=document.createElement("p");
    p_cargo.appendChild(rol);
    p_cargo.setAttribute("class","text-center");
    var p_telefono=document.createElement("p");
    p_telefono.appendChild(phone);
    p_telefono.setAttribute("class","text-center");


    // Comenzamos a construir nuestras tarjetas

    div_buttons.appendChild(delete_button);
    div_buttons.appendChild(update_button);
    div_buttons.setAttribute("class","text-center");

    content_info.setAttribute("class","tarjeta");
    content_info.appendChild(h3_nombre);
    content_info.appendChild(p_username);
    content_info.appendChild(p_pass);
    content_info.appendChild(p_telefono);
    content_info.appendChild(p_cargo);
    content_info.appendChild(div_buttons);
    return content_info;


}

function eliminar(element,data){

    $.ajaxSetup({contentType:"application/json; charset=utf-8"});
    var val=element.value;
    for(i=0;i<data.length;i++){
        var emp=JSON.stringify(data[i]);
        var empJSON=JSON.parse(emp);
        if(empJSON.username==val){
            var userDelete={username:empJSON.username,password:empJSON.password,cargo:empJSON.username};
            var userJSON=JSON.stringify(userDelete);
            $.ajax({
                type:"DELETE",
                url:"../backend/get_empleados.php",
                data:userJSON,
                success:function(result){
                    if(result=="1"){
                        $(location).attr("href","empleados.php");
                        
                    }else{
                        alert("No se pudo borrar al empleado");
                    }
                   
                }
            });
        }
    }
    
}
function actualizar(element,data){

    var val=element.value;
    for(i=0;i<data.length;i++){
        var emp=JSON.stringify(data[i]);
        var empJSON=JSON.parse(emp);
        if(empJSON.username===val){
            formulario(empJSON.nombre,empJSON.Ap_Paterno,empJSON.Ap_Materno,empJSON.username,empJSON.password,empJSON.cargo,empJSON.telefono);
            $("form").on("click","#Cancel",function(){
                formulario_delete("formulario");
             });
            $("#data_update_employee").submit(function(e){
                e.preventDefault();
                var username=$("#username").val();
                var password=$("#password").val();
                var cargo=$("#cargo").val();
                var telefono=$("#telefono").val();
                var user={user:username,pass:password,rol:cargo,phone:telefono};
                var userJSON=JSON.stringify(user);
                $.ajax({
                    type:"UPDATE",
                    url:"../backend/get_empleados.php",
                    data:userJSON,
                    success:function(result){
                        if(result=="1"){
                            $(location).attr("href","empleados.php");
                        }else{
                            console.log(result);
                            alert("No se pudo actualizar el empleado, intentelo mas tarde");
                            formulario_delete("formulario");
                        }
                    }
                });
            });
        }
    }
}
function formulario(name,ap_Paterno,ap_Materno,user,pass,rol,phone){
    var formulario=document.createElement("form");
    formulario.setAttribute("autocomplete","off");
    formulario.setAttribute("id","data_update_employee");
    formulario.setAttribute("method","POST");
    var div_formulario=create_div("form mx-auto","formulario");
    var title=document.createElement("h1");
    var texto=document.createTextNode("Actualizar empleado");
    title.appendChild(texto);
    title.setAttribute("class","text-center");
    var nombre=Create_input("form_input","text","Nombre","nombre",name);
    nombre.setAttribute("readonly","desactivado");
    var Ap_Paterno=Create_input("form_input","text","Apellido Paterno","Ap_Paterno",ap_Paterno);
    Ap_Paterno.setAttribute("readonly","desactivado");
    var Ap_Materno=Create_input("form_input","text","Apellido Materno","Ap_Materno",ap_Materno);
    Ap_Materno.setAttribute("readonly","desactivado");
    var username=Create_input("form_input","text","Nombre de Usuario","username",user);
    username.setAttribute("readonly","desactivado");
    var password=Create_input("form_input","text","Contraseña","password",pass);
    password.setAttribute("readonly","desactivado");
    var cargo=Create_input("form_input","text","Cargo","cargo",rol);
    var telefono=Create_input("form_input","text","Telefono","telefono",phone);


    var datalist=document.createElement("datalist");
    var opcion1=document.createElement("option");
    var opcion2=document.createElement("option");
    opcion1.setAttribute("value","Administrador");
    opcion2.setAttribute("value","Trabajador");
    datalist.appendChild(opcion1);
    datalist.appendChild(opcion2);
    datalist.setAttribute("id","opciones");
    cargo.setAttribute("list","opciones");


    var btn_cancelar=create_button("button","btn btn-primary","cancelar","Cancel","Cancelar");
    var btn_actualizar=create_button("submit","btn btn-warning","actualizar","Update","Actualizar");

    var div_1=create_div("form-group flex_div","1");
    var div_2=create_div("form-group flex_div","2");
    var div_3=create_div("form-group flex_div","3");
    var div_4=create_div("form-group flex_div","4");
    var div_5=create_div("title_form mx-auto","5");

    div_1.appendChild(nombre);
    div_1.appendChild(Ap_Paterno);
    div_1.appendChild(Ap_Materno);

    div_2.appendChild(username);
    div_2.appendChild(password);

    div_3.appendChild(cargo);
    div_3.appendChild(telefono);

    div_4.appendChild(btn_cancelar);
    div_4.appendChild(btn_actualizar);

    div_5.appendChild(title);
    

    formulario.appendChild(div_5);
    formulario.appendChild(div_1);
    formulario.appendChild(div_2);
    formulario.appendChild(div_3);
    formulario.appendChild(div_4);

    div_formulario.appendChild(formulario);
    div_formulario.appendChild(datalist);

    document.body.appendChild(div_formulario);
    $("body").css("backdrop-filter","blur(15px)");
    $(".presentacion").css("filter","blur(15px)");
    $("header").css("filter","blur(15px)");
    $("#cabecera_empleados").css("filter","blur(15px)");

}

function formulario_delete(id){
    $("body").css("backdrop-filter","none");
    $(".presentacion").css("filter","none");
    $("header").css("filter","none");
    $("#cabecera_empleados").css("filter","none");
    document.getElementById(id).remove();
}

function Create_input(clase,type,placeholder,name,valor){

    var input=document.createElement("input");
    input.setAttribute("class",clase);
    input.setAttribute("type",type);
    input.setAttribute("placeholder",placeholder);
    input.setAttribute("name",name);
    input.setAttribute("required","Se requiere este campo");
    input.setAttribute("id",name);
    input.setAttribute("value",valor);
    return input;
}
function create_button(type,clase,valor,id,texto){

    var button=document.createElement("button");
    var text=document.createTextNode(texto);
    button.setAttribute("class",clase);
    button.setAttribute("type",type);
    button.setAttribute("value",valor);
    button.setAttribute("id",id);
    button.appendChild(text);
    return button;

}

function create_div(clase,id){

    var div=document.createElement("div");
    div.setAttribute("class",clase);
    div.setAttribute("id",id);
    return div;
}