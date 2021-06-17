-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 19:17:14
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `Peso_Neto` float NOT NULL,
  `Tipo` enum('Grano','Semilla','embutido','lacteos','Productos enlatados','cafe','te','comida chatarra','aceites','aderezos') NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Compra` float NOT NULL,
  `Precio_Venta` float NOT NULL,
  `Fecha_Caducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `marca`, `descripcion`, `Peso_Neto`, `Tipo`, `Cantidad`, `Precio_Compra`, `Precio_Venta`, `Fecha_Caducidad`) VALUES
(2, 'catsup', 'clemente jacks', 'aderezo a base de tomate y azucar XD', 120, 'aderezos', 4567, 14.5, 25, '2022-11-17'),
(3, 'Frijoles negros enteros', 'La costeña', 'Frijoles negros enteros sasonados con cebolla ', 350, 'Productos enlatados', 345, 12, 15, '2022-07-21'),
(4, 'Chiles jalapeños en vinagre', 'La costeña', 'Chiles jalapeños hechos en vinagre con zanahoria y cebolla ', 120, 'Productos enlatados', 9889, 12, 17, '2022-06-03'),
(5, 'Cheetos', 'Sabritas', 'papas saladas', 72, 'comida chatarra', 46777, 10, 15, '2022-08-18'),
(6, 'Jamon FUD', 'FUD', 'jamon de pavo', 500000, 'embutido', 5768579, 80, 120, '2022-03-17'),
(7, 'mostaza', 'mccormick', 'aderezo a base de semillas de mostaza', 300, 'aderezos', 3455, 12, 20, '2022-11-25'),
(8, 'Nescafe', 'Nestle', 'cafe molido y tostado', 370, 'cafe', 21345, 80, 120, '2022-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `Ap_Paterno` varchar(40) NOT NULL,
  `Ap_Materno` varchar(40) NOT NULL,
  `Cargo` enum('Trabajador','Administrador') NOT NULL,
  `Telefono` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `nombre`, `Ap_Paterno`, `Ap_Materno`, `Cargo`, `Telefono`) VALUES
('Hernan96', 'sangremaldita', 'Hector Hernan', 'Dominguez', 'Gonzalez', 'Administrador', '595 957 1482'),
('Hernanbolita', 'sangrelol', 'Hernan', 'Dominguez', 'Hernandez', 'Trabajador', '5959571482'),
('ingridg98', 'ingrid123123', 'ingrid', 'Garcia', 'Montiel', 'Administrador', '56456546'),
('Kari', '1234', 'Ana Karina ', 'Vergara ', 'Guzman', 'Administrador', '134212341243'),
('lalopou', 'lalo', 'Eduardo', 'Oseguera', 'Sanchez', 'Trabajador', '142131235656');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`,`password`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
