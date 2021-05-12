function alerta(){
// contenedores del popup
var Popup=document.createElement("div");
var popupBody=document.createElement("div");
var popupContent=document.createElement("div");
// elementos del popup
var texto=document.createTextNode("       Error al iniciar Sesion");
var titulo=document.createElement("h2");
var info=document.createTextNode("Usuario/contraseña incorrectos");
var img=document.createElement("img");
var parrafo=document.createElement("p");
var aux=document.createTextNode("Ok");
// llenado de los elementos del popup

img.setAttribute("src","images/error2.png");
img.setAttribute("width","56px");
img.setAttribute("height","56px");


titulo.appendChild(img);
titulo.appendChild(texto);

parrafo.appendChild(info);

var cerrar=document.createElement("button");
cerrar.appendChild(aux);
cerrar.setAttribute("class","btn btn-success mx-auto");
cerrar.setAttribute("id","cerrar");
cerrar.setAttribute("href","#");

popupContent.appendChild(parrafo);
popupContent.setAttribute("class","popupContent");
popupContent.appendChild(cerrar);

popupBody.appendChild(titulo);
popupBody.appendChild(popupContent);

popupBody.setAttribute("id","popupBody");

Popup.appendChild(popupBody);
Popup.setAttribute("class","overlay mx-auto");
Popup.setAttribute("id","popup");

document.body.appendChild(Popup);

}
function cerrar(id){
    document.getElementById(id).remove();
    
}

