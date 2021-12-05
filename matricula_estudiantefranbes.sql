-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2021 a las 22:57:36
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matricula_estudiantefranbes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `documento` varchar(8) NOT NULL,
  `formacion` varchar(16) NOT NULL,
  `direccion` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `apellido`, `documento`, `formacion`, `direccion`, `telefono`, `photo`, `datetime`) VALUES
(48, 'Emiliano', 'Zapata', '234109', 'Nivel Avanzado', 'Carrera 54 N 12', '3162453578', '2341092020-08-14-08-34.png', '2020-08-14 20:23:34'),
(49, 'Rafael ', 'Castro', '234110', 'Nivel Avanzado', 'Calle 78 N 19 1', '3145648712', '2341102020-08-14-08-13.png', '2020-08-14 20:38:13'),
(51, 'Natalia', ' Cardona', '234112', 'Nivel Basico', 'Carrera 54 N 12', '3015824671', '2341122020-08-14-08-22.png', '2020-08-15 00:54:22'),
(52, 'Sofia', 'Tamayo', '234113', 'Nivel Intermedio', 'Carrera 55 N 97', '3147894512', '2341132020-08-14-08-22.png', '2020-08-15 02:51:22'),
(53, 'carlos', 'manuel', '531555', 'Nivel Basico', 'av tulipanes', '1942232265', '5315552021-12-02-12-53.jpg', '2021-12-03 03:05:33'),
(54, 'yoel', 'mamani', '123456', 'Nivel Basico', 'av tulipanes', '1942232265', '1234562021-12-03-12-44.jpg', '2021-12-04 01:38:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `estado_usuario` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `nombre_usuario`, `password`, `photo`, `estado_usuario`, `datetime`) VALUES
(24, 'admin', 'admin@gmail.com', 'admin', '036d0ef7567a20b5a4ad24a354ea4a945ddab676', 'admin123.png', 'activo', '2021-12-03 03:54:40'),
(25, 'usuario', 'usuario@gmail.com', 'usuario123', '8af0f8a57f467e4337bb7987cf863e5f47b1b45e', 'usuario123.png', 'inactivo', '2021-12-03 05:29:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
