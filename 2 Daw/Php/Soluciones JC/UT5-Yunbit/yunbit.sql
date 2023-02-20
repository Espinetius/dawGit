-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 14:59:52
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
-- Base de datos: `yunbit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizados`
--

CREATE TABLE `autorizados` (
  `usuario` varchar(25) NOT NULL,
  `contrasenia` varchar(32) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autorizados`
--

INSERT INTO `autorizados` (`usuario`, `contrasenia`, `correo`, `nombre`, `apellidos`) VALUES
('admin', 'admin', 'admin@admin.com', 'Boss', 'Super Boss'),
('ana', 'ana', 'ana@gmail.com', 'Ana', 'García González'),
('jose', 'jose', 'jose@empresa.com', 'Ana', 'Jose Cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_clients`
--

CREATE TABLE `test_clients` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tlf` varchar(255) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `test_clients`
--

INSERT INTO `test_clients` (`id`, `name`, `address`, `description`, `tlf`, `type`) VALUES
(1, 'Ana García', 'Arroba 23', 'Habitual', '911234567', 'N'),
(2, 'Ana García', 'Arroba 23', 'Habitual', '911234567', 'N'),
(4, 'José González', 'Yumbo 55', 'Habitual', '9176543231', 'P'),
(9, 'Mar  Fdez', 'Avd. Albufera 321', 'Privado', '91000000', 'N'),
(10, 'Isabel Martínez', 'Alcalá 256', 'Privado', '913030303', 'F'),
(11, 'Pedro Rivera', 'Goya 34', 'irueiruieueir', '9143493030', 'P'),
(12, 'Cristina', 'Congosto 21', 'wewewewew', '', ''),
(13, 'Luis', 'Congosto 21', 'wewewewew', '', ''),
(14, 'Luis', 'Congosto 78', 'wwwww', '6193999999', 'P');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizados`
--
ALTER TABLE `autorizados`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `test_clients`
--
ALTER TABLE `test_clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `test_clients`
--
ALTER TABLE `test_clients`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
