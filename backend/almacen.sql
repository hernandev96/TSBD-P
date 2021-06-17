/***Creacion de la base de datos**/

CREATE database if NOT exists almacen;
use almacen;
/**Creacion de la tabla usuario y definicion de su llave primaria*/
Create table usuario(
username Varchar(50),
password varchar(70),
nombre varchar(25) NOT NULL,
Ap_Paterno varchar(40) NOT NULL,
Ap_Materno varchar(40) NOT NULL,
Cargo ENUM('Trabajador','Administrador') NOT NULL,
Telefono varchar(25) NOT NULL
);
alter table usuario
add primary key(username,password);

create table productos(
ID INT PRiMARY KEY auto_increment,
nombre varchar(100),
marca varchar(100),
descripcion varchar(300),
Peso_Neto	float NOT NULL,
Tipo ENUM('Grano','Semilla','embutido','lacteos','Productos enlatados','cafe','te','comida chatarra','aceites','aderezos') NOT NULL,
Cantidad	int NOT NULL,
Precio_Compra	float Not null,
Precio_Venta	float Not null,
Fecha_Caducidad	DATE NOT NULL
);
INSERT INTO usuario(username,password,nombre,Ap_Paterno,Ap_Materno,Cargo,Telefono) 
Values();






