function form(){
    var formulario=document.createElement("form");
    formulario.setAttribute("autocomplete","off");
    formulario.setAttribute("id","data_employee");
    formulario.setAttribute("method","POST");
    var div_formulario=create_div("form mx-auto","formulario");
    var title=document.createElement("h1");
    var texto=document.createTextNode("Agregar empleado");
    title.appendChild(texto);
    title.setAttribute("class","text-center");
    var nombre=create_input("form_input","text","Nombre","nombre");
    var Ap_Paterno=create_input("form_input","text","Apellido Paterno","Ap_Paterno");
    var Ap_Materno=create_input("form_input","text","Apellido Materno","Ap_Materno");
    var username=create_input("form_input","text","Nombre de Usuario","username");
    var password=create_input("form_input","password","Contraseña","password");
    var cargo=create_input("form_input","text","Cargo","cargo");
    var telefono=create_input("form_input","text","Telefono","telefono");

    var btn_cancelar=create_button("button","btn btn-primary","cancelar","Cancel","Cancelar");
    var btn_registrar=create_button("submit","btn btn-success","registrar","Register","Registrar");

    var div_1=create_div("form-group flex_div","1");
    var div_2=create_div("form-group flex_div","2");
    var div_3=create_div("form-group flex_div","3");
    var div_4=create_div("form-group flex_div","4");
    var div_5=create_div("title_form mx-auto","5");


    var datalist=document.createElement("datalist");
    var opcion1=document.createElement("option");
    var opcion2=document.createElement("option");
    opcion1.setAttribute("value","Administrador");
    opcion2.setAttribute("value","Trabajador");
    datalist.appendChild(opcion1);
    datalist.appendChild(opcion2);
    datalist.setAttribute("id","opciones");
    cargo.setAttribute("list","opciones");

    div_1.appendChild(nombre);
    div_1.appendChild(Ap_Paterno);
    div_1.appendChild(Ap_Materno);

    div_2.appendChild(username);
    div_2.appendChild(password);

    div_3.appendChild(cargo);
    div_3.appendChild(telefono);

    div_4.appendChild(btn_cancelar);
    div_4.appendChild(btn_registrar);

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

function form_delete(id){
    $("body").css("backdrop-filter","none");
    $(".presentacion").css("filter","none");
    $("header").css("filter","none");
    $("#cabecera_empleados").css("filter","none");
    document.getElementById(id).remove();
}

function create_input(clase,type,placeholder,name){

    var input=document.createElement("input");
    input.setAttribute("class",clase);
    input.setAttribute("type",type);
    input.setAttribute("placeholder",placeholder);
    input.setAttribute("name",name);
    input.setAttribute("required","Se requiere este campo");
    input.setAttribute("id",name);
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

