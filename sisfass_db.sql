-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2020 a las 22:21:17
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4
-- Base de datos: `sisfass_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `codigoAnalisis` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listado de Analisis';

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
-- Estructura Stand-in para la vista `consultasdetalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultasdetalle` (
`pacienteNombre` varchar(50)
,`pacienteApellido` varchar(50)
,`doctor` varchar(50)
,`consulta` varchar(50)
,`fecha` date
,`usuario` int(11)
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
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Consulta Medica';


-- Estructura Stand-in para la vista `detalle_ana`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `detalle_ana` (
`Paciente` varchar(101)
,`Analisis` varchar(50)
,`precio` double
,`fecha` date
,`usuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria`
--

CREATE TABLE `enfermeria` (
  `codigoEnfermeria` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `pacienteId` int(15) NOT NULL,
  `usuarioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura Stand-in para la vista `montoana`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `montoana` (
`Analisis` varchar(50)
,`Precio` double
,`Cantidad` bigint(21)
,`Monto` double
,`fecha` date
,`usuario` int(11)
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
-- Estructura de tabla para la tabla `solcitud_ana_detalle`
--

CREATE TABLE `solcitud_ana_detalle` (
  `numerodetalle` int(11) NOT NULL,
  `numerosolicitud` int(11) NOT NULL,
  `codigoanalisis` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudana`
--

CREATE TABLE `solicitudana` (
  `numeroSolicitud` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `totalmedicos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `totalmedicos` (
`medico` varchar(50)
,`total` decimal(32,0)
,`fecha` date
,`usuario_id` int(11)
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


-- Estructura Stand-in para la vista `usuario_analisis`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuario_analisis` (
`Monto` double
,`Usuario` varchar(30)
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_consulta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuario_consulta` (
`Monto` decimal(30,0)
,`Usuario` varchar(30)
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura para la vista `consultasdetalle`
--
DROP TABLE IF EXISTS `consultasdetalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultasdetalle`  AS  select `p`.`nombre` AS `pacienteNombre`,`p`.`apellido` AS `pacienteApellido`,`m`.`nombre` AS `doctor`,`c`.`descripcion` AS `consulta`,`cp`.`fecha` AS `fecha`,`cp`.`usuario_id` AS `usuario` from (((`consultaspaciente` `cp` left join `pacientes` `p` on((`cp`.`cedula` = `p`.`cedula`))) left join `medicos` `m` on((`cp`.`codigoMedico` = `m`.`codigoMedico`))) left join `consultas` `c` on((`cp`.`codigoConsulta` = `c`.`codigoConsulta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle_ana`
--
DROP TABLE IF EXISTS `detalle_ana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalle_ana`  AS  select concat(`p`.`nombre`,' ',`p`.`apellido`) AS `Paciente`,`a`.`nombre` AS `Analisis`,`a`.`precio` AS `precio`,`sa`.`fecha` AS `fecha`,`ad`.`usuario_id` AS `usuario` from (((`solicitudana` `sa` left join `pacientes` `p` on((`sa`.`cedula` = `p`.`cedula`))) left join `solcitud_ana_detalle` `ad` on((`ad`.`numerosolicitud` = `sa`.`numeroSolicitud`))) left join `analisis` `a` on((`ad`.`codigoanalisis` = `a`.`codigoAnalisis`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `montoana`
--
DROP TABLE IF EXISTS `montoana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `montoana`  AS  select `a`.`nombre` AS `Analisis`,`a`.`precio` AS `Precio`,count(`a`.`nombre`) AS `Cantidad`,(count(`a`.`nombre`) * `a`.`precio`) AS `Monto`,`sa`.`fecha` AS `fecha`,`ad`.`usuario_id` AS `usuario` from ((`solicitudana` `sa` left join `solcitud_ana_detalle` `ad` on((`ad`.`numerosolicitud` = `sa`.`numeroSolicitud`))) left join `analisis` `a` on((`ad`.`codigoanalisis` = `a`.`codigoAnalisis`))) group by `a`.`nombre`,`sa`.`fecha` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `totalmedicos`
--
DROP TABLE IF EXISTS `totalmedicos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalmedicos`  AS  select `m`.`nombre` AS `medico`,sum(`c`.`precio`) AS `total`,`cp`.`fecha` AS `fecha`,`cp`.`usuario_id` AS `usuario_id` from ((`consultaspaciente` `cp` left join `medicos` `m` on((`cp`.`codigoMedico` = `m`.`codigoMedico`))) left join `consultas` `c` on((`cp`.`codigoConsulta` = `c`.`codigoConsulta`))) where (`cp`.`codigoMedico` = `m`.`codigoMedico`) group by `m`.`nombre`,`cp`.`fecha` order by `cp`.`fecha` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_analisis`
--
DROP TABLE IF EXISTS `usuario_analisis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_analisis`  AS  select (count(`a`.`nombre`) * `a`.`precio`) AS `Monto`,`u`.`nombre` AS `Usuario`,`sa`.`fecha` AS `fecha` from (((`solicitudana` `sa` left join `solcitud_ana_detalle` `ad` on((`ad`.`numerosolicitud` = `sa`.`numeroSolicitud`))) left join `analisis` `a` on((`ad`.`codigoanalisis` = `a`.`codigoAnalisis`))) left join `usuario` `u` on((`ad`.`usuario_id` = `u`.`codigoEmpleado`))) group by `u`.`nombre`,`sa`.`fecha` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_consulta`
--
DROP TABLE IF EXISTS `usuario_consulta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_consulta`  AS  select (count(`c`.`descripcion`) * `c`.`precio`) AS `Monto`,`u`.`nombre` AS `Usuario`,`cp`.`fecha` AS `fecha` from ((`consultaspaciente` `cp` left join `consultas` `c` on((`cp`.`codigoConsulta` = `c`.`codigoConsulta`))) left join `usuario` `u` on((`cp`.`usuario_id` = `u`.`codigoEmpleado`))) group by `u`.`nombre`,`cp`.`fecha` ;

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
-- Indices de la tabla `enfermeria`
--
ALTER TABLE `enfermeria`
  ADD PRIMARY KEY (`codigoEnfermeria`),
  ADD KEY `enfermeriaPaciente` (`pacienteId`),
  ADD KEY `enfermeriaUsuario` (`usuarioid`);

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
-- Indices de la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  ADD PRIMARY KEY (`numerodetalle`),
  ADD KEY `analisis_detalle` (`codigoanalisis`),
  ADD KEY `solicitud_detalle` (`numerosolicitud`),
  ADD KEY `usuario_analisis` (`usuario_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `enfermeria`
--
ALTER TABLE `enfermeria`
  MODIFY `codigoEnfermeria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  MODIFY `numerodetalle` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `enfermeria`
--
ALTER TABLE `enfermeria`
  ADD CONSTRAINT `enfermeriaPaciente` FOREIGN KEY (`pacienteId`) REFERENCES `pacientes` (`cedula`),
  ADD CONSTRAINT `enfermeriaUsuario` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`codigoEmpleado`);

--
-- Filtros para la tabla `solcitud_ana_detalle`
--
ALTER TABLE `solcitud_ana_detalle`
  ADD CONSTRAINT `analisis_detalle` FOREIGN KEY (`codigoanalisis`) REFERENCES `analisis` (`codigoAnalisis`),
  ADD CONSTRAINT `solicitud_detalle` FOREIGN KEY (`numerosolicitud`) REFERENCES `solicitudana` (`numeroSolicitud`),
  ADD CONSTRAINT `usuario_analisis` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`codigoEmpleado`);

--
-- Filtros para la tabla `solicitudana`
--
ALTER TABLE `solicitudana`
  ADD CONSTRAINT `paciente_solicitud` FOREIGN KEY (`cedula`) REFERENCES `pacientes` (`cedula`);
COMMIT;
