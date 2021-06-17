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
/**Creacion de la tabla productos enlatados */
Create table enlatados(
ID int auto_increment primary key,
Marca varchar(100) NOT NULL,
Nombre varchar(50) NOT NULL,
Descripcion varchar(500) NOT NULL,
Peso_Neto float NOT NULL,
cantidad int NOT NULL,
Precio_Compra float NOT NULL,
Precio_Venta float NOT NULL,
Fecha_Caducidad date 
);
/**Tabla lacteos**/
create table lacteos(
ID int auto_increment primary key,
Marca varchar(100) NOT NULL,
Nombre varchar(50) NOT NULL,
Descripcion varchar(500) NOT NULL,
Peso_Neto float NOT NULL,
cantidad int NOT NULL,
Derivado varchar(70) NOT NULL,
Presentacion varchar(30) NOT NULL,
Precio_Compra float NOT NULL,
Precio_Venta float NOT NULL,
Fecha_Caducidad date 
);
/**Tabla embutidos**/
create table embutidos(
ID	int auto_increment	Primary Key,
Nombre 	varchar(50)	NOT NULL,
Descripcion	varchar(200) NOT NULL,
Peso_Neto	float NOT NULL,
Cantidad	int NOT NULL,
Derivado	varchar(70)	Not null,
Precio_Compra	float	 	Not null,
Precio_Venta	float	 	Not null,
Fecha_Caducidad	DATE NOT NULL
);
alter table embutidos 
add Marca varchar(100) NOT NULL;
/**Tabla aceites y aderezos*/
create table aceites_aderezos(
ID	int auto_increment	Primary Key,
Nombre 	varchar(50)	NOT NULL,
Descripcion	varchar(200) NOT NULL,
Peso_Neto	float NOT NULL,
Cantidad	int NOT NULL,
Precio_Compra	float	 	Not null,
Precio_Venta	float	 	Not null,
Fecha_Caducidad	DATE NOT NULL
);
alter table aceites_aderezos 
add Marca varchar(100) NOT NULL;
/**Tabla cafe y té**/
create table cafe_te(
ID	int auto_increment	Primary Key,
Nombre 	varchar(50)	NOT NULL,
Descripcion	varchar(200) NOT NULL,
Peso_Neto	float NOT NULL,
Presentacion varchar(100) NOT NULL,
Cantidad	int NOT NULL,
Precio_Compra	float	 	Not null,
Precio_Venta	float	 	Not null,
Fecha_Caducidad	DATE NOT NULL
);
alter table cafe_te 
add Marca varchar(100) NOT NULL;
/**Tabla comida chatarra**/
create table comida_chatarra(
ID	int auto_increment	Primary Key,
Marca varchar(100) NOT NULL,
Nombre 	varchar(50)	NOT NULL,
Descripcion	varchar(200) NOT NULL,
Peso_Neto	float NOT NULL,
Tipo varchar(70) NOT NULL,
Cantidad	int NOT NULL,
Precio_Compra	float	 	Not null,
Precio_Venta	float	 	Not null,
Fecha_Caducidad	DATE NOT NULL
);
/**Tabla Granos y semillas**/
create table granos_semillas(
ID	int auto_increment	Primary Key,
Marca varchar(100) NOT NULL,
Nombre 	varchar(50)	NOT NULL,
Descripcion	varchar(200) NOT NULL,
Peso_Neto	float NOT NULL, 
Tipo ENUM('Grano','Semilla') NOT NULL,
Cantidad	int NOT NULL,
Precio_Compra	float	 	Not null,
Precio_Venta	float	 	Not null,
Fecha_Caducidad	DATE NOT NULL
);
commit;

