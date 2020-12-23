-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-12-2020 a las 16:49:42
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sisgeact`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idactividad` int(11) NOT NULL,
  `activ_descrip` varchar(250) DEFAULT NULL,
  `actv_evidencia` varchar(100) DEFAULT NULL,
  `activ_fecha_programada` datetime DEFAULT NULL,
  `activ_fecha_entrega` datetime DEFAULT NULL,
  `activ_comentarios` varchar(250) DEFAULT NULL,
  `activ_estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idactividad`, `activ_descrip`, `actv_evidencia`, `activ_fecha_programada`, `activ_fecha_entrega`, `activ_comentarios`, `activ_estado`) VALUES
(1, 'Analisis de la BD de sistema de tramite documentadio', 'SITRADOC', '2020-11-23 00:00:00', NULL, NULL, 1),
(2, 'Evaluar el diagrama de procesos para la integración de Sitrado', 'SITRADOC', '2020-11-23 00:00:00', NULL, NULL, 1),
(3, 'una actividad 01', 'SITRADOC', '2020-12-25 00:00:00', NULL, NULL, 1),
(4, 'Segunda actividad 02', 'SITRADOC', '2020-11-04 00:00:00', NULL, NULL, 1),
(5, 'Tercera actividad', 'SITRADOC', '2020-11-04 00:00:00', NULL, NULL, 1),
(6, 'Evaluar el diagrama de procesos para la integración de Sitradoc', 'DIAGRAMA DE FLUJO DE LOS SISTEMAS', '2020-12-04 00:00:00', NULL, NULL, 1),
(7, 'Analizar documentación enviada al correo', 'Correo de envío de documentación', '2020-11-04 00:00:00', NULL, NULL, 1),
(8, 'Primera actividad del día de hoy', 'SITRADOC', '2020-12-15 00:00:00', NULL, NULL, 1),
(9, 'Diseño de base de datos NUXEO', 'DIAGRAMA ER', '2020-12-14 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_activ`
--

CREATE TABLE `control_activ` (
  `idcontrol_activ` int(11) NOT NULL,
  `oficina_gral` varchar(50) DEFAULT NULL,
  `direccion_general` varchar(100) DEFAULT NULL,
  `oficina` varchar(50) DEFAULT NULL,
  `direccion_oficina` varchar(100) DEFAULT NULL,
  `fecha_ini_ctrl` date DEFAULT NULL,
  `fecha_fin_ctrl` date DEFAULT NULL,
  `idpersona` int(11) NOT NULL,
  `estado_ctrlact` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `control_activ`
--

INSERT INTO `control_activ` (`idcontrol_activ`, `oficina_gral`, `direccion_general`, `oficina`, `direccion_oficina`, `fecha_ini_ctrl`, `fecha_fin_ctrl`, `idpersona`, `estado_ctrlact`) VALUES
(1, 'UTI - INNÓVATEPERÚ', 'Calle Uno Oeste N° 050 Urb. Corpac San Isidro', 'UTI', 'Oficina de TI', '2020-11-23', '2020-11-27', 2, 1),
(2, 'UTI - INNÓVATEPERÚ', 'Calle Uno Oeste N° 050 Urb. Corpac San Isidro', 'UTI', 'Oficina de TI', '2020-12-07', '2020-12-11', 2, 1),
(3, 'UTI - INNÓVATEPERÚ', 'Calle Uno Oeste N° 050 Urb. Corpac San Isidro', 'UTI', 'Oficina de TI', '2020-12-14', '2020-12-19', 2, 1),
(4, 'UTI-GENERAL', 'Calle Uno Oeste N° 050 Urb. Corpac San Isidro', 'UTI', 'Oficina de TI', '2020-12-14', '2020-12-18', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_actividades`
--

CREATE TABLE `detalle_actividades` (
  `idcontrol_activ` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_actividades`
--

INSERT INTO `detalle_actividades` (`idcontrol_activ`, `idactividad`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idnivel` int(11) NOT NULL,
  `descripNivel` varchar(50) NOT NULL,
  `estado_nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idnivel`, `descripNivel`, `estado_nivel`) VALUES
(1, 'admin', 1),
(2, 'usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apaterno` varchar(20) NOT NULL,
  `amaterno` varchar(20) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `num_documento` varchar(8) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `nombres`, `apaterno`, `amaterno`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Victor', 'Diaz', 'Canchay', '1', '12689635', 'Ca. Precursores 113', '511 6489984', 'vdiaz@innovateperu.gob.pe'),
(2, 'Jhon', 'Pérez', 'Rojas', '1', '45617896', 'Ca. Libertadores 345', '511 6459774', 'jper@innovateperu.gob.pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `idpersona` int(11) NOT NULL,
  `acceso` varchar(15) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `idnivel` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`idpersona`, `acceso`, `login`, `password`, `idnivel`, `estado`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'act', 'jperez', 'e10adc3949ba59abbe56e057f20f883e', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `control_activ`
--
ALTER TABLE `control_activ`
  ADD PRIMARY KEY (`idcontrol_activ`,`idpersona`),
  ADD KEY `fk_persona_ctrl_activ_idx` (`idpersona`);

--
-- Indices de la tabla `detalle_actividades`
--
ALTER TABLE `detalle_actividades`
  ADD PRIMARY KEY (`idcontrol_activ`,`idactividad`),
  ADD KEY `fk_control_activ_actividades_idx` (`idactividad`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idnivel`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `control_activ`
--
ALTER TABLE `control_activ`
  MODIFY `idcontrol_activ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_activ`
--
ALTER TABLE `control_activ`
  ADD CONSTRAINT `fk_persona_ctrl_activ` FOREIGN KEY (`idpersona`) REFERENCES `trabajadores` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_actividades`
--
ALTER TABLE `detalle_actividades`
  ADD CONSTRAINT `fk_control_activ_actividades` FOREIGN KEY (`idactividad`) REFERENCES `actividades` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_control_activ_detalle_actividades` FOREIGN KEY (`idcontrol_activ`) REFERENCES `control_activ` (`idcontrol_activ`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `fk_personas_trabajadores` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
