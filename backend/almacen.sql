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





