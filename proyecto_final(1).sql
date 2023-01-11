-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 02:44:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--
CREATE DATABASE `proyecto_final`;


CREATE TABLE `appointment` (
  `codcit` int(11) NOT NULL,
  `asunto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `codpaci` int(11) NOT NULL,
  `coddoc` int(11) NOT NULL,
  `idhora` int(11) NOT NULL,
  `codespe` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`codcit`, `asunto`, `color`, `codpaci`, `coddoc`, `idhora`, `codespe`, `start`, `end`, `estado`, `fecha_create`) VALUES
(1, 'evento', '#40E0D0', 1, 1, 1, 1, '2021-11-29 19:30:00', '2021-11-29 19:30:00', '1', '2021-11-26 23:14:18'),
(2, 'esto es un ejemplo de asunto', '#40E0D0', 1, 1, 1, 1, '2021-12-20 19:30:00', '2021-12-20 19:30:00', '1', '2021-11-27 00:40:54'),
(3, 'asunto de emergencias', '#40E0D0', 3, 3, 3, 5, '2021-12-01 19:30:00', '2021-12-01 19:30:00', '1', '2021-11-27 00:54:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `codpaci` int(11) NOT NULL,
  `dnipa` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `nombrep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidop` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seguro` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `tele` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`codpaci`, `dnipa`, `nombrep`, `apellidop`, `seguro`, `tele`, `sexo`, `email`, `usuario`, `clave`, `cargo`, `estado`, `fecha_create`) VALUES
(1, '76886868', 'Jose Maria ', 'Torres Ayala', 'No', '978777565', 'Masculino', 'josemaria@gmail.com', 'josemari21', 'b0baee9d279d34fa1dfd71aadb908c3f', '2', '1', '2021-11-25 16:19:03'),
(2, '77777777', 'Maria Jose', 'Flores Torres', 'Si', '989808008', 'Femenino', 'flores@gmail.com', 'flore123', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '2021-11-26 23:57:09'),
(3, '79900060', 'Jose ', 'Peres Perales', 'Si', '987777777', 'Masculino', 'joseperales@gmail.com', 'joseperes21', 'b0baee9d279d34fa1dfd71aadb908c3f', '2', '1', '2021-11-27 00:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `coddoc` int(11) NOT NULL,
  `dnidoc` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `nomdoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apedoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codespe` int(11) NOT NULL,
  `sexo` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefo` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `fechanaci` date NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naciona` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`coddoc`, `dnidoc`, `nomdoc`, `apedoc`, `codespe`, `sexo`, `telefo`, `fechanaci`, `correo`, `naciona`, `estado`, `fecha_create`) VALUES
(1, '77888686', 'Luis', 'Trelles ', 1, 'Masculino', '988686868', '1982-11-16', 'luistrelles@gmail.com', 'Venezolana', '1', '2021-11-25 14:38:25'),
(2, '77656565', 'Flavia', 'Pineda Flores', 3, 'Femenino', '978787878', '1989-11-14', 'flavviapineda@gmail.com', 'Venezonlana', '1', '2021-11-13 21:41:31'),
(3, '75343434', 'Ivan ', 'Solis', 5, 'Masculino', '900669696', '1997-11-11', 'ivansolis@gmail.com', 'Peruana', '1', '2021-11-27 00:46:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhora` int(11) NOT NULL,
  `nomhora` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `coddoc` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhora`, `nomhora`, `coddoc`, `estado`, `fere`) VALUES
(1, 'Solo lunes', 1, '1', '2021-11-13 21:31:00'),
(2, 'Solos martes', 2, '1', '2021-11-25 14:55:00'),
(3, 'Solo miercoles y viernes', 3, '1', '2021-11-27 00:53:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `idprof` int(11) NOT NULL,
  `nombr` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ruc` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `telef` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `corr` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `direcc` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`idprof`, `nombr`, `ruc`, `telef`, `corr`, `direcc`, `descrip`, `logo`) VALUES
(1, 'Un programador mas', '10275334542234', '999876754', 'unprogramadormas@gmail.com', 'Piura-Peru', 'Esto es un sistema', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialty`
--

CREATE TABLE `specialty` (
  `codespe` int(11) NOT NULL,
  `nombrees` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `specialty`
--

INSERT INTO `specialty` (`codespe`, `nombrees`, `estado`, `fecha_create`) VALUES
(1, 'Cirujia', '1', '2021-11-25 14:10:05'),
(2, 'Cardiologia', '1', '2021-11-25 14:10:07'),
(3, 'Otorrino', '1', '2021-11-25 13:27:25'),
(4, 'Pediatría', '1', '2021-11-25 13:54:55'),
(5, 'Gastroenterología', '1', '2021-11-25 14:10:09'),
(7, ' Infectología', '1', '2021-11-25 14:10:12'),
(8, 'Enfermería', '1', '2021-11-25 13:27:31'),
(9, 'ITS', '1', '2021-11-25 14:10:15'),
(10, 'Obstetricia', '1', '2021-11-25 13:27:36'),
(11, 'Odontologia', '1', '2021-11-25 13:55:01'),
(12, 'Oftalmología', '1', '2021-11-25 14:10:18'),
(18, 'ejemplo', '1', '2021-11-25 13:42:17'),
(21, 'ssss', '1', '2021-11-25 14:12:32'),
(22, 'ffff', '1', '2021-11-25 14:10:20'),
(23, 'ejemplo de especialidad', '1', '2021-11-27 00:50:41'),
(24, 'ejempliro', '1', '2021-11-27 00:50:45'),
(25, 'fdfddf', '1', '2021-11-27 00:50:46'),
(26, 'especialdiad ejemplo', '1', '2021-11-27 00:52:11'),
(27, 'espeeeeeeee', '0', '2021-11-27 00:52:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `clave`, `cargo`) VALUES
(1, 'rubi yadira', 'rubycasi31', 'rubi_casillaas31@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`codcit`),
  ADD KEY `codpaci` (`codpaci`,`coddoc`,`codespe`),
  ADD KEY `coddoc` (`coddoc`),
  ADD KEY `codespe` (`codespe`),
  ADD KEY `idhora` (`idhora`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`codpaci`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`coddoc`),
  ADD KEY `codespe` (`codespe`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhora`),
  ADD KEY `coddoc` (`coddoc`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idprof`);

--
-- Indices de la tabla `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`codespe`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `codcit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `codpaci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `coddoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `idprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `specialty`
--
ALTER TABLE `specialty`
  MODIFY `codespe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`codpaci`) REFERENCES `customers` (`codpaci`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`coddoc`) REFERENCES `doctor` (`coddoc`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`codespe`) REFERENCES `specialty` (`codespe`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`idhora`) REFERENCES `horario` (`idhora`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`codespe`) REFERENCES `specialty` (`codespe`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`coddoc`) REFERENCES `doctor` (`coddoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
