-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 14:46:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gesventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(10) NOT NULL,
  `nom_cli` varchar(45) DEFAULT NULL,
  `ap_cli` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nom_cli`, `ap_cli`, `direccion`, `poblacion`) VALUES
('05754861P', 'Sara', 'Aparicio', 'C/ Granja, 8, 2C', 'Madrid'),
('07331465P', 'Sandra', 'Dalmau', 'C/ Hierro, 3, 3A', 'San Sebastián de los Reyes'),
('08455766T', 'Marcos', 'Cubero', 'C/ Peral, 6, 4A', 'Trescantos'),
('11313629K', 'Juan', 'Gallego', 'C/ Palestina, 15, 1D', 'Trescantos'),
('28127765F', 'Mario', 'Velilla', 'Av. Soria, 86, 7B', 'Madrid'),
('56675805X', 'Manuel', 'García', 'C/ Cruz, 1, 2B', 'Leganés'),
('62840035X', 'Eva', 'Fernández', 'C/ Amistad, 7, 3C', 'Alcobendas'),
('75502678A', 'Jose', 'Martínez', 'C/ Campoamor, 45, 2B', 'San Sebastián de los Reyes'),
('82192764X', 'Marta', 'Enríquez', 'C/ Serrano, 90, 4B', 'Madrid'),
('84458881Y', 'Pedro', 'Alcántara', 'C/ Real, 10, Bajo A', 'Alcobendas'),
('88271071S', 'Carlos', 'Dolado', 'C/ Paz, 2, 1A', 'Alcorcón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliprod`
--

CREATE TABLE `cliprod` (
  `cod` int(2) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `cantidad` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliprod`
--

INSERT INTO `cliprod` (`cod`, `dni`, `cantidad`) VALUES
(1, '28127765F', 1),
(1, '62840035X', 1),
(2, '82192764X', 2),
(3, '07331465P', 1),
(3, '75502678A', 1),
(3, '84458881Y', 1),
(4, '05754861P', 1),
(4, '88271071S', 1),
(11, '75502678A', 1),
(11, '88271071S', 1),
(13, '82192764X', 2),
(22, '07331465P', 1),
(22, '56675805X', 1),
(22, '82192764X', 2),
(22, '84458881Y', 1),
(23, '75502678A', 1),
(24, '08455766T', 1),
(24, '28127765F', 1),
(31, '88271071S', 1),
(32, '05754861P', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod` int(3) NOT NULL,
  `nom_prod` varchar(40) DEFAULT NULL,
  `pvp` decimal(7,2) DEFAULT NULL,
  `prov` varchar(15) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod`, `nom_prod`, `pvp`, `prov`, `imagen`) VALUES
(1, 'Z323', '52.90', 'D7767763A', 'auriculares-mp3.jpg'),
(2, 'Z623', '209.00', 'J04131348', 'batmanbot.jpeg'),
(3, 'Z906', '399.00', 'J04131348', 'cargador.jpg'),
(4, 'Z506', '125.00', 'J04131348', 'auriculares-mp3.jpg'),
(11, 'Argon2', '58.00', 'P3941094I', 'regulador-botella-argon.jpg'),
(13, 'Ocelote', '59.90', 'D7767763A', 'raton-ocelote-gaming.jpg'),
(22, 'Death Stalker', '299.99', 'P3941094I', 'razer-deathstalker-chroma-keyboard.jpg'),
(23, 'Orb Weaver', '129.99', 'P3941094I', 'orbweaverchroma.png'),
(24, 'Black Widow', '149.00', 'P3941094I', 'envy-phoenix-810-401lns.jpg'),
(31, 'Envy Phoenix 810-401ns', '2599.00', 'A36109494', 'envy-phoenix-810-401lns.jpg'),
(32, 'Envy Recline 23-k301ns', '1399.00', 'A36109494', 'pavillon-500-354ns.jpg'),
(33, 'Pavilion 500-354ns', '499.00', 'A36109494', 'pavillon-500-354ns.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cif` varchar(15) NOT NULL,
  `nom_emp` varchar(30) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cif`, `nom_emp`, `direccion`, `poblacion`) VALUES
('A36109494', 'HP', 'Av. de Burgos, 7', 'Madrid'),
('B0041567J', 'Toshiba España', 'Carretera Fuencarral, 46', 'Alcobendas'),
('D7767763A', 'Ozone', 'C/ Miralrio, 61', 'Trescantos'),
('J04131348', 'Logitech', 'C/ Faisán, 13', 'Leganés'),
('P3941094I', 'Razer', 'C/ Vieja, 12', 'Madrid'),
('R93200509', 'BenQ', 'C/ Velázquez, 80', 'Madrid'),
('S9939407D', 'Acer', 'C/ Campillo', 'Alcobendas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usr` varchar(12) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usr`, `pass`) VALUES
('ana', 'beec983e1d29e81bde7148cec004bbbc9e1034f5'),
('javi', '9e179d6b17c660dea1ef2200340757532921389d'),
('jcarlos', 'ce8a1c43066be8c2a40067e1ba1b64e197b26bd4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `cliprod`
--
ALTER TABLE `cliprod`
  ADD PRIMARY KEY (`cod`,`dni`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_Productos_Proveedores` (`prov`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cif`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usr`,`pass`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliprod`
--
ALTER TABLE `cliprod`
  ADD CONSTRAINT `cliprod_ibfk_1` FOREIGN KEY (`cod`) REFERENCES `productos` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliprod_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `clientes` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Proveedores` FOREIGN KEY (`prov`) REFERENCES `proveedores` (`cif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
