REATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `id_departamentos` int(15) NOT NULL,
  `id_incidencias` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `teléfono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamentos` int(15) NOT NULL,
  `id_tickets` int(15) NOT NULL,
  `id_personal` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incide`
--

CREATE TABLE `incide` (
  `id` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `dni` int(8) NOT NULL,
  `departamentos` varchar(20) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incide`
--

INSERT INTO `incide` (`id`, `nombre`, `dni`, `departamentos`, `tipo`, `descripcion`, `fecha`) VALUES
(2, 'ggdf', 12345678, 'dfhhffd', 'fdfhdfdfd', 'fdhfhffdffd', '2023-05-02'),
(3, 'denis', 12345678, 'dsfsdfdssd', 'plñlñl', 'se me malogro mi compu', '2023-05-02'),
(4, 'diego', 87456321, 'kjoiiusauan', 'sdmoijsodi', 'sadfsaiuhfuisf', '2023-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencias` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `incidencia` varchar(15) NOT NULL,
  `departamentos` varchar(15) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencias`, `nombre`, `incidencia`, `departamentos`, `descripcion`, `estado`) VALUES
(1235, 'kevin', 'ggfg', 'dfdf', 'd', 'f'),
(1236, 'kevin', 'ggfg', 'dfdf', 'd', 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(15) NOT NULL,
  `id_departamentos` int(15) NOT NULL,
  `id_incidencias` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `teléfono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_tickets` int(15) NOT NULL,
  `id_usuarios` int(15) NOT NULL,
  `id_personal` int(15) NOT NULL,
  `id_departamentos` int(15) NOT NULL,
  `tipo_ticket` datetime(6) NOT NULL,
  `fecha_creación` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_tickets`, `id_usuarios`, `id_personal`, `id_departamentos`, `tipo_ticket`, `fecha_creación`) VALUES
(123, 111, 123, 123, '0000-00-00 00:00:00.000000', '121022'),
(134, 111, 123, 140, '0000-00-00 00:00:00.000000', '121022'),
(135, 13, 123, 140, '0000-00-00 00:00:00.000000', '121022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `telefono`, `email`, `contraseña`, `departamento`) VALUES
(111, 'kevin', 'cajachagua', '123', 'a', '111', 'kjjdb');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamentos`);

--
-- Indices de la tabla `incide`
--
ALTER TABLE `incide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencias`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_tickets`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamentos` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incide`
--
ALTER TABLE `incide`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencias` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_tickets` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;