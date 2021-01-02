-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2021 a las 03:53:38
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `posystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `clave` int(11) NOT NULL,
  `caja` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('abierta','cerrada','','') NOT NULL DEFAULT 'abierta',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pagado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`clave`, `caja`, `fecha`, `estado`, `total`, `pagado`) VALUES
(1, 'Ivan', '2020-08-27 22:30:35', 'cerrada', '22.00', '100.00'),
(11, 'Silvia', '2020-08-27 23:22:58', 'cerrada', '30.00', '100.00'),
(12, 'Silvia', '2020-08-30 01:28:06', 'cerrada', '256.00', '260.00'),
(13, 'Silvia', '2020-08-30 16:22:06', 'cerrada', '9.00', '100.00'),
(14, 'Silvia', '2020-08-30 16:24:12', 'cerrada', '909.00', '1000.00'),
(15, 'Silvia', '2020-08-30 16:25:19', 'cerrada', '10.00', '100.00'),
(16, 'Silvia', '2020-08-30 16:26:54', 'cerrada', '10.00', '10.00'),
(17, 'Silvia', '2020-08-30 17:33:36', 'cerrada', '28.50', '50.00'),
(18, 'Silvia', '2020-12-31 18:50:31', 'cerrada', '2.00', '5.00'),
(19, 'Silvia', '2020-12-31 18:51:10', 'cerrada', '2.00', '5.00'),
(20, 'Silvia', '2020-12-31 19:54:49', 'cerrada', '91.00', '100.00'),
(21, 'Silvia', '2020-12-31 19:59:11', 'cerrada', '1.00', '1.00'),
(22, 'Silvia', '2020-12-31 20:00:46', 'cerrada', '1.00', '11.00'),
(23, 'Silvia', '2020-12-31 20:01:58', 'cerrada', '1.00', '1.00'),
(24, 'Silvia', '2020-12-31 20:14:26', 'cerrada', '1.00', '1.00'),
(25, 'Silvia', '2020-12-31 20:18:26', 'cerrada', '1.00', '10.00'),
(26, 'Silvia', '2020-12-31 20:20:04', 'cerrada', '1.00', '1.00'),
(27, 'Ivan', '2020-12-31 20:29:09', 'cerrada', '2.00', '150.00'),
(28, 'Ivan', '2021-01-02 01:52:42', 'cerrada', '50.00', '50.00'),
(29, 'Ivan', '2021-01-02 02:10:52', 'cerrada', '0.00', '0.00'),
(30, 'Ivan', '2021-01-02 02:13:22', 'cerrada', '0.00', '0.00'),
(31, 'Ivan', '2021-01-02 02:22:16', 'cerrada', '91.00', '100.00'),
(32, 'Ivan', '2021-01-02 02:25:08', 'cerrada', '91.00', '100.00'),
(33, 'Ivan', '2021-01-02 02:27:22', 'cerrada', '91.00', '100.00'),
(34, 'Ivan', '2021-01-02 02:28:01', 'cerrada', '91.00', '100.00'),
(35, 'Ivan', '2021-01-02 02:28:58', 'cerrada', '91.00', '100.00'),
(36, 'Ivan', '2021-01-02 02:29:45', 'cerrada', '91.00', '100.00'),
(37, 'Ivan', '2021-01-02 02:30:20', 'cerrada', '91.00', '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_inventario`
--

CREATE TABLE `historial_inventario` (
  `clave` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `codigo` varchar(16) NOT NULL,
  `cantidad` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_inventario`
--

INSERT INTO `historial_inventario` (`clave`, `fecha`, `codigo`, `cantidad`) VALUES
(1, '2020-08-29 23:47:11', '10000000', '1.000'),
(2, '2020-08-30 15:45:09', '20000000', '100.000'),
(3, '2020-08-30 16:14:23', '20000000', '1000.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(16) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `especificacion` enum('pieza','granel','','') NOT NULL,
  `stock` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `descripcion`, `precio`, `especificacion`, `stock`) VALUES
('1', 'CHICLE TRIDENT', '1.00', 'pieza', '101.200'),
('10000000', 'COCA COLA 600ML NR', '10.00', 'pieza', '101.000'),
('10000001', 'JAI', '1.00', 'pieza', '1.000'),
('19293939', '2DN', '100.00', 'pieza', '10.000'),
('2', 'QUESO DE MESA JALISCO', '90.00', 'granel', '119.200'),
('20000000', 'COCA COLA 1LT', '16.00', 'pieza', '1200.000'),
('633148100013', 'Tajin 142gr', '9.50', 'pieza', '100.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `clave` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contacto` varchar(10) DEFAULT ''''''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`clave`, `nombre`, `contacto`) VALUES
(1, 'Coca Cola', '3315362021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provision`
--

CREATE TABLE `provision` (
  `producto` varchar(16) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provision`
--

INSERT INTO `provision` (`producto`, `proveedor`, `precio`) VALUES
('1', 1, '1.20'),
('10000000', 1, '9.50'),
('2', 1, '2.20'),
('20000000', 1, '10.40'),
('633148100013', 1, '9.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `clave` int(11) NOT NULL,
  `producto` varchar(16) DEFAULT NULL,
  `cuenta` int(11) DEFAULT NULL,
  `cantidad` decimal(10,3) NOT NULL DEFAULT 1.000
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`clave`, `producto`, `cuenta`, `cantidad`) VALUES
(40, '10000000', 12, '1.000'),
(41, '20000000', 12, '1.000'),
(42, '20000000', 12, '3.000'),
(43, '20000000', 12, '2.000'),
(44, '20000000', 12, '2.000'),
(45, '20000000', 12, '1.000'),
(46, '10000000', 12, '1.400'),
(47, '2', 12, '0.400'),
(48, '2', 12, '0.400'),
(49, '20000000', 12, '1.000'),
(50, '2', 13, '0.100'),
(51, '2', 14, '10.100'),
(52, '10000000', 15, '1.000'),
(53, '10000000', 16, '1.000'),
(91, '633148100013', 17, '1.000'),
(92, '633148100013', 17, '1.000'),
(93, '633148100013', 17, '1.000'),
(95, '1', 18, '1.000'),
(96, '1', 18, '1.000'),
(97, '1', 19, '1.000'),
(98, '1', 19, '1.000'),
(99, '1', 20, '1.000'),
(100, '2', 20, '1.000'),
(101, '1', 21, '1.000'),
(103, '1', 22, '1.000'),
(104, '1', 23, '1.000'),
(105, '1', 24, '1.000'),
(106, '1', 25, '1.000'),
(107, '1', 26, '1.000'),
(108, '1', 1, '1.000'),
(109, '1', 27, '1.000'),
(110, '1', 27, '1.000'),
(113, '1', 28, '50.000'),
(114, '1', 29, '1.000'),
(115, '1', 30, '1.000'),
(116, '2', 30, '1.000'),
(120, '2', 31, '1.000'),
(123, '1', 31, '1.000'),
(124, '1', 32, '1.000'),
(125, '2', 32, '1.000'),
(126, '1', 33, '1.000'),
(127, '2', 33, '1.000'),
(128, '1', 34, '1.000'),
(129, '1', 35, '1.000'),
(130, '1', 36, '1.000'),
(131, '2', 36, '1.000'),
(132, '1', 37, '1.000'),
(133, '2', 37, '1.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `clave` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cajero` varchar(30) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `iva` int(11) NOT NULL DEFAULT 13,
  `ieps` int(11) NOT NULL DEFAULT 0,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado` enum('abierta','cerrada','','') NOT NULL DEFAULT 'abierta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`clave`, `proveedor`, `fecha`, `cajero`, `subtotal`, `iva`, `ieps`, `total`, `estado`) VALUES
(1, 1, '2020-09-09 17:57:39', 'Silvia', '1040.00', 16, 0, '1206.40', 'cerrada'),
(2, 1, '2020-09-10 19:07:05', 'Silvia', '108.16', 16, 0, '125.47', 'cerrada'),
(3, 1, '2021-01-02 01:52:10', 'Ivan', '1.44', 16, 10, '1.81', 'cerrada'),
(4, 1, '2021-01-02 02:34:08', 'Ivan', '6.28', 0, 0, '6.28', 'cerrada'),
(5, 1, '2021-01-02 02:41:01', 'Ivan', '228.40', 0, 0, '228.40', 'cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_articulos`
--

CREATE TABLE `visita_articulos` (
  `clave` int(11) NOT NULL,
  `producto` varchar(16) NOT NULL,
  `visita` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` decimal(10,3) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visita_articulos`
--

INSERT INTO `visita_articulos` (`clave`, `producto`, `visita`, `precio`, `cantidad`, `total`) VALUES
(2, '20000000', 1, '10.40', '100.000', '1040.00'),
(3, '20000000', 2, '10.40', '10.400', '108.16'),
(4, '1', 3, '1.20', '1.200', '1.44'),
(5, '1', 4, '1.20', '1.200', '1.44'),
(6, '2', 4, '2.20', '2.200', '4.84'),
(7, '1', 5, '1.20', '7.000', '8.40'),
(8, '2', 5, '2.20', '100.000', '220.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`clave`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `provision`
--
ALTER TABLE `provision`
  ADD PRIMARY KEY (`producto`,`proveedor`),
  ADD KEY `producto` (`producto`,`proveedor`),
  ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `producto` (`producto`),
  ADD KEY `cuenta` (`cuenta`),
  ADD KEY `cuenta_2` (`cuenta`),
  ADD KEY `producto_2` (`producto`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `visita_articulos`
--
ALTER TABLE `visita_articulos`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `producto` (`producto`),
  ADD KEY `visita` (`visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `visita_articulos`
--
ALTER TABLE `visita_articulos`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  ADD CONSTRAINT `historial_inventario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provision`
--
ALTER TABLE `provision`
  ADD CONSTRAINT `provision_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provision_ibfk_2` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `producto` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`cuenta`) REFERENCES `cuenta` (`clave`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita_articulos`
--
ALTER TABLE `visita_articulos`
  ADD CONSTRAINT `visita_articulos_ibfk_1` FOREIGN KEY (`visita`) REFERENCES `visita` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visita_articulos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
