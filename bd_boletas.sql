-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2020 a las 00:12:22
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_boletas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `idBol` int(11) NOT NULL,
  `nro` int(10) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `nomCliente` varchar(100) NOT NULL,
  `patCliente` varchar(100) NOT NULL,
  `matCliente` varchar(100) NOT NULL,
  `nroCuenta` varchar(20) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `monto` float(11,2) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(150) DEFAULT NULL,
  `agencia` varchar(100) DEFAULT NULL,
  `operativo` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `fechReg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUs` int(3) NOT NULL,
  `idImg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`idBol`, `nro`, `concepto`, `nomCliente`, `patCliente`, `matCliente`, `nroCuenta`, `ci`, `nacimiento`, `monto`, `banco`, `fecha`, `destino`, `agencia`, `operativo`, `user`, `fechReg`, `idUs`, `idImg`) VALUES
(1, 47287803, 'DEPOSITO A CUENTA', 'CESAR MARCELO', 'FLORES', 'QUISBERT', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-02-01', 'SEGIP - OPERACIONES VARIAS', 'SOPORTE', 'VIACHA', 'EMVASQUEZ', '2020-05-20 21:59:56', 1, 1),
(2, 56787402, 'DEPOSITO A CUENTA', 'AURORA ELENA', 'RIOS', 'COLQUE', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-04-30', 'SEGIP - OPERACIONES VARIAS', 'SOPORTE', 'SAN PEDRO', 'MPERALTA', '2020-06-10 21:59:51', 1, 2),
(3, 3293253, 'PAGO POR CEDULA DE INDENTIDAD NACIONAL', 'KATHLEEN JHOSETTE', 'PANIQUE', 'FERNANDEZ', '0', '4371095', '0000-00-00', 17.00, 'BANCON UNION LA PAZ', '2017-05-02', 'SEGIP', '16', '', '', '2020-07-19 01:59:33', 1, 3),
(4, 3617165, 'PAGO POR CEDULA DE INDENTIDAD NACIONAL', 'ABIGALI', 'MENDOZA', 'QUISPE', '0', '', '2008-09-05', 17.00, 'BANCON UNION LA PAZ', '2017-05-02', 'SEGIP', '21', '', '', '2020-07-19 02:04:22', 1, 4),
(5, 58746184, 'DEPOSITO A CUENTA', 'DIEGO', 'FLORES', 'CHANA', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-05-17', 'SEGIP - OPERACIONES VARIAS', 'SO', 'VIACHA', 'ALEJMORALE', '2020-07-18 22:00:01', 1, 5),
(6, 10431346, 'CEDULA DE IDENTIDAD', 'JENNY JHOANA', 'AVENDANO', 'FLORES', '', '6105404', '0000-00-00', 17.00, 'BANCO FIE SA', '2017-01-06', 'SEGIP', '29', '', '', '2020-07-19 04:06:53', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta_consolidado`
--

CREATE TABLE `boleta_consolidado` (
  `idBol` int(11) NOT NULL,
  `nro` int(10) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `nomCliente` varchar(100) NOT NULL,
  `patCliente` varchar(100) NOT NULL,
  `matCliente` varchar(100) NOT NULL,
  `nroCuenta` varchar(20) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `monto` float(11,2) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `destino` varchar(150) DEFAULT NULL,
  `agencia` varchar(100) DEFAULT NULL,
  `operativo` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `fechReg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUs` int(3) NOT NULL,
  `idImg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta_consolidado`
--

INSERT INTO `boleta_consolidado` (`idBol`, `nro`, `concepto`, `nomCliente`, `patCliente`, `matCliente`, `nroCuenta`, `ci`, `nacimiento`, `monto`, `banco`, `fecha`, `destino`, `agencia`, `operativo`, `user`, `fechReg`, `idUs`, `idImg`) VALUES
(1, 47287803, 'DEPOSITO A CUENTA', 'CESAR MARCELO', 'FLORES', 'QUISBERT', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-02-01', 'SEGIP - OPERACIONES VARIAS', 'SOPORTE', 'VIACHA', 'EMVASQUEZ', '2020-07-18 21:59:34', 1, 1),
(2, 56787402, 'DEPOSITO A CUENTA', 'AURORA ELENA', 'RIOS', 'COLQUE', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-04-30', 'SEGIP - OPERACIONES VARIAS', 'SOPORTE', 'SAN PEDRO', 'MPERALTA', '2020-07-18 21:59:30', 6, 2),
(3, 58746184, 'DEPOSITO A CUENTA', 'DIEGO', 'FLORES', 'CHANA', '100000013942417', '', '0000-00-00', 3.00, 'BANCO UNION S.A', '2018-05-17', 'SEGIP - OPERACIONES VARIAS', 'SO', 'VIACHA', 'ALEJMORALE', '2020-07-18 21:59:27', 6, 5),
(4, 3293253, 'PAGO POR CEDULA DE INDENTIDAD NACIONAL', 'KATHLEEN JHOSETTE', 'PANIQUE', 'FERNANDEZ', '', '4371095', '0000-00-00', 17.00, 'BANCON UNION LA PAZ', '2017-05-02', 'SEGIP', '16', '', '', '2020-07-18 21:59:07', 6, 3),
(5, 3617165, 'PAGO POR CEDULA DE INDENTIDAD NACIONAL', 'ABIGALI', 'MENDOZA', 'QUISPE', '', '', '2008-09-05', 17.00, 'BANCON UNION LA PAZ', '2017-05-02', 'SEGIP', '21', '', '', '2020-07-18 21:59:23', 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImg` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `nroImg` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idImg`, `img`, `estado`, `nroImg`) VALUES
(1, 'C_0001.jpg', 2, 47287803),
(2, 'C_0002.jpg', 2, 56787402),
(3, 'C_0003.jpg', 2, 3293253),
(4, 'C_0004.jpg', 2, 3617165),
(5, 'C_0005.jpg', 2, 58746184),
(6, 'C_0006.jpg', 1, 10431346),
(7, 'C_0008.jpg', 0, 5874190),
(8, 'C_00010.jpg', 0, 674037),
(9, 'C_00011.jpg', 0, 3686944),
(10, 'C_00012.jpg', 0, 47319475),
(11, 'C_00013.jpg', 0, 45731245);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(2) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Transcriptor'),
(3, 'Validador'),
(4, 'Digitalizador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUs` int(3) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `ult_con` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `idRol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUs`, `nombre`, `paterno`, `materno`, `email`, `password`, `ult_con`, `estado`, `idRol`) VALUES
(1, 'Willy Marcos', 'Chana', 'Tito', 'wil@gmail.com', 'e39622164d485c2dc8970f518b0189cd', '2020-07-19 04:00:16', 1, 1),
(3, 'Juan', 'Perez', 'Rocha', 'juan@gmail.com', 'a94652aa97c7211ba8954dd15a3cf838', '2020-07-19 03:27:12', 1, 2),
(4, 'Jose', 'Colque', 'Zarate', 'jose@gmail.com', '662eaa47199461d01a623884080934ab', NULL, 0, 1),
(5, 'Andres', 'Huanca', 'Mamani', 'andres@gmail.com', '231badb19b93e44f47da1bd64a8147f2', NULL, 1, 2),
(6, 'maria', 'Lopez', 'Mamani', 'maria@gmail.com', '263bce650e68ab4e23f28263760b9fa5', '2020-07-19 03:37:37', 1, 3),
(7, 'admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`idBol`),
  ADD KEY `idUs` (`idUs`),
  ADD KEY `idImg` (`idImg`);

--
-- Indices de la tabla `boleta_consolidado`
--
ALTER TABLE `boleta_consolidado`
  ADD PRIMARY KEY (`idBol`),
  ADD KEY `idUs` (`idUs`),
  ADD KEY `idImg` (`idImg`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImg`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUs`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `idBol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `boleta_consolidado`
--
ALTER TABLE `boleta_consolidado`
  MODIFY `idBol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `boleta_ibfk_1` FOREIGN KEY (`idUs`) REFERENCES `usuario` (`idUs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleta_ibfk_2` FOREIGN KEY (`idImg`) REFERENCES `imagenes` (`idImg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `boleta_consolidado`
--
ALTER TABLE `boleta_consolidado`
  ADD CONSTRAINT `boleta_consol_ibfk_1` FOREIGN KEY (`idUs`) REFERENCES `usuario` (`idUs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleta_consol_ibfk_2` FOREIGN KEY (`idImg`) REFERENCES `imagenes` (`idImg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
