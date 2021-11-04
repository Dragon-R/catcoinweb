-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2021 a las 16:59:34
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catcoin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gana`
--

CREATE TABLE `gana` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `vict_derr` char(1) DEFAULT NULL,
  `monto_gan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gana`
--

INSERT INTO `gana` (`id_usuario`, `id_juego`, `vict_derr`, `monto_gan`) VALUES
(27, 1, 'V', 40),
(28, 2, 'D', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(11) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `descripcion`, `fecha_inicio`, `fecha_fin`, `monto`, `id_usuario`) VALUES
(1, 'Apuesta de 20bs cada uno, 2 jugadores', '2021-09-27 23:05:03', '2021-09-28 23:55:03', 20, 27),
(2, 'Apuesta de 50bs cada uno, 2 jugadores', '2021-09-27 23:05:03', '2021-09-27 23:55:03', 50, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_pago` int(11) NOT NULL,
  `nro_tarjeta` varchar(30) DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `tigo_money` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_pago`, `nro_tarjeta`, `fecha_venc`, `tigo_money`, `id_usuario`) VALUES
(1, '512348956265', '2021-09-30', '58964712', 27),
(2, '259867412358965', '2021-09-29', '74859632', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `alias` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `genero` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `alias`, `nombre`, `genero`, `email`, `fecha_nac`, `contrasena`, `pais`, `ciudad`, `direccion`) VALUES
(27, 'Alguien 1', 'Alguien Apellidos 1', 'Masculino', 'correo1@mail.com', '2021-09-11', '123456789', '', '', ''),
(28, 'Alguien 2', 'Alguien Apellidos 2', 'Masculino', 'correo2@mail.com', '2021-09-28', '12345678950', NULL, NULL, NULL),
(29, 'Alguien 3', 'Alguien Apellidos 3', 'Masculino', 'correo3@mail.com', '2021-09-02', '123456789123', NULL, NULL, NULL),
(31, 'Alguien 4', 'Alguien Apellidos 4', 'Masculino', 'correo4@mail.com', '2021-09-24', '9658741235', NULL, NULL, NULL),
(32, 'Alguien 5', 'Alguien Apellidos 5', 'Masculino', 'correo5@mail.com', '2021-09-13', '859647123658', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gana`
--
ALTER TABLE `gana`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gana`
--
ALTER TABLE `gana`
  ADD CONSTRAINT `gana_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `gana_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`);

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD CONSTRAINT `metodo_pago_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
