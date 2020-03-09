-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2020 a las 01:07:13
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisfass_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `anadetalle` (IN `id` INT, `ana` INT)  BEGIN


INSERT INTO `solcitud_ana_detalle` ( `numerosolicitud`, `codigoanalisis`) VALUES (id,  ana);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `codigoAnalisis` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valorNormal` varchar(20) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listado de Analisis';

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`codigoAnalisis`, `nombre`, `valorNormal`, `precio`) VALUES
(500, 'Glicemia', '82 a 110md/dl', 200),
(501, 'Hemograma', '4.5-5.9 MM3', 500),
(502, 'Acido urico', '3.4-7 mg/dL', 450),
(503, 'Vitamina D', '20-40 ng/mL', 600),
(504, 'Hierro', '60-170 mcg/dL', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `codigoConsulta` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`codigoConsulta`, `descripcion`, `precio`) VALUES
(10, 'Pediatria', '500'),
(11, 'Medicina General', '300'),
(12, 'Ginecologia', '400'),
(13, 'Odontologia', '500'),
(14, 'Cardiologia', '500');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultasdetalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultasdetalle` (
`pacienteNombre` varchar(50)
,`pacienteApellido` varchar(50)
,`doctor` varchar(50)
,`consulta` varchar(50)
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultaspaciente`
--

CREATE TABLE `consultaspaciente` (
  `id` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `codigoMedico` int(10) NOT NULL,
  `codigoConsulta` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Consulta Medica';

--
-- Volcado de datos para la tabla `consultaspaciente`
--

INSERT INTO `consultaspaciente` (`id`, `cedula`, `codigoMedico`, `codigoConsulta`, `fecha`) VALUES
(1, 234, 203, 14, '2020-02-21'),
(2, 16000118, 205, 11, '2020-02-21'),
(3, 234, 205, 11, '2020-02-21'),
(4, 16971229, 202, 12, '2020-02-21'),
(5, 16971229, 202, 12, '2020-02-21'),
(6, 16971229, 202, 12, '2020-02-21'),
(7, 16971229, 202, 12, '2020-02-21'),
(8, 234, 201, 13, '2020-02-21'),
(9, 1213, 203, 14, '2020-02-21'),
(10, 1213, 203, 14, '2020-02-21'),
(11, 234, 205, 11, '2020-02-24'),
(14, 234, 205, 11, '2020-02-29'),
(17, 234, 200, 12, '2020-03-02'),
(18, 234, 205, 11, '2020-03-04'),
(19, 2524, 201, 13, '2020-03-04'),
(20, 1213, 203, 11, '2020-03-04'),
(21, 234, 205, 11, '2020-03-04');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalle_ana`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `detalle_ana` (
`Paciente` varchar(101)
,`Analisis` varchar(50)
,`precio` double
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `codigoMedico` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Medicos registrados';

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`codigoMedico`, `nombre`, `cedula`, `especialidad`) VALUES
(200, 'Juana Caceres', '1234', 'pediatra'),
(201, 'Miguel Marte', '2134', 'Odontologo'),
(202, 'Cayetana Henriquez', '001231', 'GinecoObstetra'),
(203, 'Carlo Magno', '8432', 'Cardiologo'),
(205, 'Miriam Caceres', '90224', 'Medico General'),
(206, 'Olivia Wilde', '9283', 'Sonografista');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `montoana`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `montoana` (
`Analisis` varchar(50)
,`Precio` double
,`Cantidad` bigint(21)
,`Monto` double
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` int(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registro de Pacientes';

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`nombre`, `apellido`, `cedula`, `telefono`, `direccion`) VALUES
('Marta', 'Vargas', 98, '943', 'zvknde'),
('Juan', 'Camacho', 234, '242425', 'P.O. Box 358, 6798 Eleifend St.'),
('ksd', 'ad', 325, '734', 'rsy'),
('Arturo', 'Pun pun', 1213, '809', 'calle e'),
('Laura', 'Diaz', 1232, '123', 'sertwert'),
('Jose', 'Caceres', 2524, '4632', 'didoi'),
('Thomas', 'Bird', 16000118, '1-110-720-9802', '2950 Dui St.'),
('Sara', 'Hahn', 16210725, '1-678-488-0584', '273-4895 Amet, Av.'),
('Nell', 'Mullen', 16420712, '1-239-911-4071', 'P.O. Box 915, 5188 Fusce Rd.'),
('Damon', 'Rocha', 16430328, '1-233-748-6519', 'P.O. Box 384, 8003 Mollis Ave'),
('Dane', 'Bryant', 16971229, '1-369-702-4966', 'P.O. Box 533, 9146 Nisi Av.'),
('Rae', 'Downs', 16991002, '1-966-982-8894', '239-5915 Lorem, Avenue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadoanalisis`
--

CREATE TABLE `resultadoanalisis` (
  `id` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `codigoAnalisis` int(10) NOT NULL,
  `valorMuestra` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Resultado de Analisis';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solcitud_ana_detalle`
--

CREATE TABLE `solcitud_ana_detalle` (
  `numerodetalle` int(11) NOT NULL,
  `numerosolicitud` int(11) NOT NULL,
  `codigoanalisis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solcitud_ana_detalle`
--

INSERT INTO `solcitud_ana_detalle` (`numerodetalle`, `numerosolicitud`, `codigoanalisis`) VALUES
(1, 1, 500),
(2, 2, 500),
(3, 2, 501),
(4, 2, 502),
(5, 2, 503),
(6, 2, 504),
(7, 3, 501),
(8, 3, 503),
(9, 4, 502),
(10, 4, 501),
(11, 4, 500),
(12, 4, 503),
(13, 4, 504),
(14, 5, 501),
(15, 5, 503),
(16, 5, 502),
(17, 6, 502),
(18, 6, 503),
(19, 6, 501),
(20, 6, 500),
(21, 7, 501),
(22, 7, 503),
(23, 7, 504),
(24, 8, 501),
(25, 8, 503),
(26, 8, 502),
(27, 9, 502),
(28, 9, 501),
(29, 10, 502),
(30, 10, 501),
(31, 11, 500),
(32, 12, 501),
(33, 12, 504),
(34, 13, 501),
(35, 13, 504),
(36, 14, 501),
(37, 14, 504),
(38, 15, 503),
(39, 15, 504),
(40, 16, 503),
(41, 16, 504),
(42, 17, 503),
(43, 17, 504),
(44, 18, 501),
(45, 18, 502),
(46, 18, 503),
(47, 19, 501),
(48, 19, 502),
(49, 19, 503),
(50, 20, 501),
(51, 20, 502),
(52, 20, 503),
(53, 21, 501),
(54, 21, 502),
(55, 21, 503),
(56, 22, 501),
(57, 22, 502),
(58, 22, 503),
(59, 23, 502),
(60, 23, 501),
(61, 23, 504),
(65, 24, 501),
(66, 24, 502),
(67, 24, 503),
(68, 25, 501),
(69, 25, 502),
(70, 25, 503),
(71, 26, 504),
(72, 26, 503),
(73, 26, 502),
(74, 27, 501),
(75, 27, 503),
(76, 27, 504),
(77, 28, 501),
(78, 28, 503),
(79, 28, 502),
(80, 29, 501),
(81, 29, 503),
(82, 29, 502),
(83, 30, 500),
(84, 30, 503),
(85, 30, 504),
(87, 32, 500),
(88, 33, 501),
(89, 33, 502),
(90, 33, 503),
(93, 34, 501),
(94, 34, 500),
(95, 34, 504),
(96, 35, 501),
(97, 35, 500),
(98, 35, 504),
(99, 36, 501),
(100, 36, 502),
(101, 36, 503),
(102, 36, 504),
(103, 37, 504),
(104, 37, 503),
(105, 37, 502),
(106, 37, 501),
(107, 37, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudana`
--

CREATE TABLE `solicitudana` (
  `numeroSolicitud` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudana`
--

INSERT INTO `solicitudana` (`numeroSolicitud`, `cedula`, `fecha`) VALUES
(1, 1213, '2020-02-29'),
(2, 1213, '2020-03-01'),
(3, 234, '2020-03-01'),
(4, 234, '2020-03-01'),
(5, 1213, '2020-03-01'),
(6, 234, '2020-03-01'),
(7, 234, '2020-03-01'),
(8, 234, '2020-03-01'),
(9, 234, '2020-03-01'),
(10, 234, '2020-03-01'),
(11, 1213, '2020-03-01'),
(12, 234, '2020-03-01'),
(13, 234, '2020-03-01'),
(14, 234, '2020-03-01'),
(15, 234, '2020-03-01'),
(16, 234, '2020-03-01'),
(17, 234, '2020-03-01'),
(18, 1213, '2020-03-01'),
(19, 1213, '2020-03-01'),
(20, 1213, '2020-03-01'),
(21, 1213, '2020-03-01'),
(22, 1213, '2020-03-01'),
(23, 234, '2020-03-02'),
(24, 1213, '2020-03-02'),
(25, 1213, '2020-03-02'),
(26, 234, '2020-03-02'),
(27, 234, '2020-03-02'),
(28, 234, '2020-03-02'),
(29, 234, '2020-03-02'),
(30, 234, '2020-03-02'),
(31, 234, '2020-03-03'),
(32, 234, '2020-03-03'),
(33, 234, '2020-03-03'),
(34, 2524, '2020-03-04'),
(35, 2524, '2020-03-04'),
(36, 234, '2020-03-04'),
(37, 1213, '2020-03-04');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `totalmedicos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `totalmedicos` (
`medico` varchar(50)
,`total` decimal(32,0)
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigoEmpleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Usuarios del Sistema';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigoEmpleado`, `nombre`, `cedula`, `tipo`, `pass`) VALUES
(0, 'RJHHF', 'DE231E', 'basico', '$2y$12$SWQ0RP5VSzY2Hpb0OGQZzePIzBX5nLPdHlar8.tAZNkUXq9Eiq1Xq'),
(1000, 'Andy', '402', 'admin', '$2y$12$hWq4FXn24iZMbUWyv5ero.gkjWSbCNV5O7RLpotUg2h9HyB8jvR8m'),
(1001, 'Invitado', '100', 'basico', '$2y$12$qWMUHKzsLTmWo5cjpc1A4utRfAtQQfJbuqPB.L0DRGLfx7caE/kH6'),
(1002, 'pepe', '234', 'basico', '$2y$12$.Q180B0LtPqAOjweVQrT5OH0XHcXR8M7D65b2eughfePD3VRqkBlC'),
(1003, 'julia', '2013', 'basico', '$2y$12$YmLnV8uYL/rcCEIckI92zOvqBwB2Xs8XKvD.c/PUCPlblHzPtOrTq');

-- --------------------------------------------------------

--
-- Estructura para la vista `consultasdetalle`
--
DROP TABLE IF EXISTS `consultasdetalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultasdetalle`  AS  select `p`.`nombre` AS `pacienteNombre`,`p`.`apellido` AS `pacienteApellido`,`m`.`nombre` AS `doctor`,`c`.`descripcion` AS `consulta`,`cp`.`fecha` AS `fecha` from (((`consultaspaciente` `cp` left join `pacientes` `p` on((`cp`.`cedula` = `p`.`cedula`))) left join `medicos` `m` on((`cp`.`codigoMedico` = `m`.`codigoMedico`))) left join `consultas` `c` on((`cp`.`codigoConsulta` = `c`.`codigoConsulta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle_ana`
--
DROP TABLE IF EXISTS `detalle_ana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalle_ana`  AS  select concat(`p`.`nombre`,' ',`p`.`apellido`) AS `Paciente`,`a`.`nombre` AS `Analisis`,`a`.`precio` AS `precio`,`sa`.`fecha` AS `fecha` from (((`solicitudana` `sa` left join `pacientes` `p` on((`sa`.`cedula` = `p`.`cedula`))) left join `solcitud_ana_detalle` `ad` on((`ad`.`numerosolicitud` = `sa`.`numeroSolicitud`))) left join `analisis` `a` on((`ad`.`codigoanalisis` = `a`.`codigoAnalisis`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `montoana`
--
DROP TABLE IF EXISTS `montoana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `montoana`  AS  select `a`.`nombre` AS `Analisis`,`a`.`precio` AS `Precio`,count(`a`.`nombre`) AS `Cantidad`,(count(`a`.`nombre`) * `a`.`precio`) AS `Monto`,`sa`.`fecha` AS `fecha` from ((`solicitudana` `sa` left join `solcitud_ana_detalle` `ad` on((`ad`.`numerosolicitud` = `sa`.`numeroSolicitud`))) left join `analisis` `a` on((`ad`.`codigoanalisis` = `a`.`codigoAnalisis`))) group by `a`.`nombre`,`sa`.`fecha` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `totalmedicos`
--
DROP TABLE IF EXISTS `totalmedicos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalmedicos`  AS  select `m`.`nombre` AS `medico`,sum(`c`.`precio`) AS `total`,`cp`.`fecha` AS `fecha` from ((`consultaspaciente` `cp` left join `medicos` `m` on((`cp`.`codigoMedico` = `m`.`codigoMedico`))) left join `consultas` `c` on((`cp`.`codigoConsulta` = `c`.`codigoConsulta`))) where (`cp`.`codigoMedico` = `m`.`codigoMedico`) group by `m`.`nombre`,`cp`.`fecha` order by `cp`.`fecha` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`codigoAnalisis`),
  ADD UNIQUE KEY `codigoAnalisis` (`codigoAnalisis`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`codigoConsulta`);

--
-- Indices de la tabla `consultaspaciente`
--
ALTER TABLE `consultaspaciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultaPaciente` (`cedula`),
  ADD KEY `consultaMedico` (`codigoMedico`),
  ADD KEY `consultaTipo` (`codigoConsulta`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`codigoMedico`),
  ADD UNIQUE KEY `codigoMedico` (`codigoMedico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `cedulaPaciente` (`cedula`);

--
-- Indices de la tabla `resultadoanalisis`
--
ALTER TABLE `resultadoanalisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultadoPaciente` (`cedula`),
  ADD KEY `resultadoAnalisis` (`codigoAnalisis`);

--
-- Indices de la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  ADD PRIMARY KEY (`numerodetalle`),
  ADD KEY `analisis_detalle` (`codigoanalisis`),
  ADD KEY `solicitud_detalle` (`numerosolicitud`);

--
-- Indices de la tabla `solicitudana`
--
ALTER TABLE `solicitudana`
  ADD PRIMARY KEY (`numeroSolicitud`),
  ADD KEY `paciente_solicitud` (`cedula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigoEmpleado`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultaspaciente`
--
ALTER TABLE `consultaspaciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `resultadoanalisis`
--
ALTER TABLE `resultadoanalisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  MODIFY `numerodetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultaspaciente`
--
ALTER TABLE `consultaspaciente`
  ADD CONSTRAINT `consultaMedico` FOREIGN KEY (`codigoMedico`) REFERENCES `medicos` (`codigoMedico`),
  ADD CONSTRAINT `consultaPaciente` FOREIGN KEY (`cedula`) REFERENCES `pacientes` (`cedula`),
  ADD CONSTRAINT `consultaTipo` FOREIGN KEY (`codigoConsulta`) REFERENCES `consultas` (`codigoConsulta`);

--
-- Filtros para la tabla `resultadoanalisis`
--
ALTER TABLE `resultadoanalisis`
  ADD CONSTRAINT `resultadoAnalisis` FOREIGN KEY (`codigoAnalisis`) REFERENCES `analisis` (`codigoAnalisis`),
  ADD CONSTRAINT `resultadoPaciente` FOREIGN KEY (`cedula`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  ADD CONSTRAINT `analisis_detalle` FOREIGN KEY (`codigoanalisis`) REFERENCES `analisis` (`codigoAnalisis`),
  ADD CONSTRAINT `solicitud_detalle` FOREIGN KEY (`numerosolicitud`) REFERENCES `solicitudana` (`numeroSolicitud`);

--
-- Filtros para la tabla `solicitudana`
--
ALTER TABLE `solicitudana`
  ADD CONSTRAINT `paciente_solicitud` FOREIGN KEY (`cedula`) REFERENCES `pacientes` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
