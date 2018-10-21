--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`idAlquiler`, `idCliente`, `fechaInicio`, `fechaFin`, `observaciones`, `precioTotal`) VALUES
(22, 16, '2016-11-24 19:00:00', '2016-11-25 19:00:00', 'De nuevo deptos y herramientas', 23520),
(23, 16, '2016-11-27 08:00:00', '2016-11-30 08:00:00', 'Autos y Herramientas', 27360);

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `email`, `dni`, `sexo`, `fechaNacimiento`, `telefono`) VALUES
(16, 'Stefan', 'Ronacher', 'gauchoaleman@yahoo.com', '92844240', 'M', '1978-05-19', '2944430965'),
(17, 'Maria', 'Rodriguez', 'rosa@yahoo.com', '92839298', 'F', '1969-02-12', '4332423'),
(18, 'Julian', 'Gomez', 'juli@yahoo.com', '393939393', 'M', '1959-12-25', '90929320');

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `idtiporecurso`
--

INSERT INTO `idtiporecurso` (`idTipoRecurso`, `descripcion`) VALUES
(1, 'Herramienta'),
(2, 'Inmueble'),
(3, 'Vehiculo');

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`idRecurso`, `idTipoRecurso`, `descripcion`, `costoxHora`) VALUES
(22, 2, 'Depto Mallin', 220),
(19, 1, 'Pinza', 50),
(20, 3, 'Renault', 200),
(17, 1, 'Martillo', 10),
(21, 3, 'Fiat', 120),
(18, 2, 'Depto. centrico', 700);

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `recursoalquiler`
--

INSERT INTO `recursoalquiler` (`IdRecursoAlquiler`, `idAlquiler`, `idRecurso`) VALUES
(41, 22, 22),
(42, 22, 19),
(43, 22, 17),
(44, 22, 18),
(45, 23, 19),
(46, 23, 20),
(47, 23, 17),
(48, 23, 21);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `clave`) VALUES
(1, 'Stefan', 'Nafets'),
(2, 'Lucas', 'Sacul');