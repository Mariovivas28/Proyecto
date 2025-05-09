-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2025 a las 04:07:19
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `edad` int(2) NOT NULL,
  `codigo_grupo` varchar(11) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `nombre_tutor` text NOT NULL,
  `tel_tutor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellido`, `edad`, `codigo_grupo`, `correo`, `nombre_tutor`, `tel_tutor`) VALUES
(1, 'carlos', 'ramos', 17, '403', 'carlosra@gmail.com', 'maria carmen garcia ramos', '981-255-1501'),
(2, 'ana ', 'lugo', 18, '603', 'analu@gmail.com', 'jose alberto ortega lugo', '981-351-1354'),
(3, 'juan', 'perez', 19, '503', 'juanperez@gmail.com', 'maria perez', '981-123-4567'),
(4, 'sofia', 'gomez', 18, '403', 'sofiagomez@gmail.com', 'carlos gomez', '981-987-6543'),
(5, 'mario', 'lopez', 20, '503', 'mariolopez@gmail.com', 'jose lopez', '981-456-7890'),
(6, 'lucia', 'fernandez', 19, '603', 'luciafernandez@gmail.com', 'ana fernandez', '981-654-3210');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `matricula` int(12) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(4) NOT NULL,
  `estado` enum('Asistió','Faltó','Justificada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `matricula`, `fecha`, `hora`, `estado`) VALUES
(1, 1, '2025-03-20', '00:00:00.0000', 'Asistió'),
(3, 1, '2025-03-21', '00:00:00.0000', 'Asistió'),
(5, 1, '2025-04-10', '00:00:00.0000', 'Asistió'),
(6, 2, '2025-04-11', '08:00:00.0000', 'Faltó'),
(7, 3, '2025-04-12', '08:15:00.0000', 'Asistió'),
(8, 4, '2025-04-14', '08:10:00.0000', 'Asistió'),
(9, 5, '2025-04-15', '08:05:00.0000', 'Faltó');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `matricula` int(11) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `codigo_grupo` varchar(11) NOT NULL,
  `especialidad` text NOT NULL,
  `fecha` date NOT NULL,
  `justificada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`matricula`, `nombre_alumno`, `apellido`, `codigo_grupo`, `especialidad`, `fecha`, `justificada`) VALUES
(1, 'carlos', 'ramos', '40325', 'Informatica', '2025-04-03', 0),
(1, 'carlos', 'ramos', '40325', 'Informatica', '2025-04-03', 0),
(2, 'ana', 'lugo', '603', 'Administración', '2025-04-10', 1),
(3, 'juan', 'perez', '503', 'Informatica', '2025-04-11', 0),
(4, 'sofia', 'gomez', '403', 'Informatica', '2025-04-13', 1),
(5, 'mario', 'lopez', '503', 'Informatica', '2025-04-15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `numero` int(11) NOT NULL,
  `codigo_grupo` int(11) NOT NULL,
  `especialidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`numero`, `codigo_grupo`, `especialidad`) VALUES
(1, 403, 'Informatica'),
(2, 603, 'Administración'),
(3, 503, 'Informatica'),
(4, 703, 'Contabilidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retardo`
--

CREATE TABLE `retardo` (
  `matricula` int(12) NOT NULL,
  `hora` time(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `retardo`
--

INSERT INTO `retardo` (`matricula`, `hora`, `fecha`) VALUES
(3, '08:20:00.0000', '2025-04-12'),
(4, '08:25:00.0000', '2025-04-13'),
(5, '08:30:00.0000', '2025-04-15'),
(6, '08:35:00.0000', '2025-04-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`) VALUES
(1, 'claudia', 'cheinbaun', 'claudia@gmail.com', 'password'),
(2, 'ignacio', 'comonford', 'ignacio_comford@gmail.com', 'ignacio123'),
(3, 'maria', 'mercedez', 'mariamer@gmail.com', 'maria987'),
(4, 'luis', 'hernandez', 'luishernandez@gmail.com', 'luis1234'),
(5, 'carla', 'rodriguez', 'carlarod@gmail.com', 'carla5678'),
(6, 'fernando', 'martinez', 'fernando@gmail.com', 'fernando123'),
(7, 'paula', 'diaz', 'paula@gmail.com', 'paula456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_usuario` (`matricula`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`codigo_grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumno` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;