-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 19:56:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `cod` int(11) NOT NULL,
  `fech_consul` date NOT NULL,
  `hora` time NOT NULL,
  `nhc_paciente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`cod`, `fech_consul`, `hora`, `nhc_paciente`) VALUES
(4, '2023-05-04', '11:45:00', 4),
(5, '2023-05-05', '16:00:00', 5),
(6, '2023-05-06', '13:30:00', 6),
(7, '2023-05-07', '10:00:00', 7),
(8, '2023-05-08', '15:45:00', 8),
(9, '2023-05-09', '08:30:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria` int(1) NOT NULL,
  `permisos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria`, `permisos`) VALUES
(1, 'administrador'),
(4, 'administrativo'),
(3, 'enfermeria'),
(2, 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `cod` int(11) NOT NULL,
  `NHC_paciente` int(6) NOT NULL COMMENT 'Numero de Historia',
  `consulta` text NOT NULL COMMENT 'Consulta',
  `fech_consul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`cod`, `NHC_paciente`, `consulta`, `fech_consul`) VALUES
(1, 2, 'Torsion de dedo', '2023-05-09'),
(2, 2, 'Se realiza radiografia y el dedo esta roto', '2023-05-09'),
(3, 2, 'Se coloca vendaje en el dedo', '2023-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `NHC` int(6) NOT NULL COMMENT 'NHC',
  `DNI` varchar(9) NOT NULL COMMENT 'DNI',
  `NOMBRE` text NOT NULL COMMENT 'NOMBRE',
  `APELLIDOS` text NOT NULL COMMENT 'APELLIDOS',
  `FNACI` date NOT NULL COMMENT 'FECHA NACIMIENTO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`NHC`, `DNI`, `NOMBRE`, `APELLIDOS`, `FNACI`) VALUES
(1, '98765432A', 'Francisco', 'Gonzalez Perez', '2017-05-03'),
(2, '12345678N', 'Juan', 'Pérez', '1990-01-01'),
(3, '23456789B', 'María', 'García', '1985-05-15'),
(4, '34567890C', 'Pedro', 'López', '1995-07-30'),
(5, '45678901D', 'Ana', 'Sánchez', '1992-12-10'),
(6, '56789012E', 'Jorge', 'González', '1978-06-20'),
(7, '67890123F', 'Lucía', 'Ruiz', '1989-03-05'),
(8, '78901234G', 'Miguel', 'Torres', '1983-11-15'),
(9, '89012345H', 'Marina', 'Navarro', '1975-09-25'),
(10, '90123456I', 'Sergio', 'Santos', '1986-04-03'),
(11, '01234567J', 'Isabel', 'Fernández', '1991-02-28'),
(12, '12345678K', 'Mario', 'Hernández', '1980-08-12'),
(13, '23456789L', 'Silvia', 'Gómez', '1979-01-22'),
(14, '34567890M', 'Pablo', 'Vázquez', '1993-07-08'),
(15, '45678901N', 'Esther', 'Blanco', '1988-05-18'),
(16, '56789012O', 'Luis', 'Alonso', '1976-10-30'),
(17, '67890123P', 'Cristina', 'Castro', '1990-02-15'),
(18, '78901234Q', 'Javier', 'Ortega', '1984-09-05'),
(19, '89012345R', 'Elena', 'Méndez', '1977-12-27'),
(20, '90123456S', 'David', 'Vidal', '1994-04-20'),
(21, '01234567T', 'Rosa', 'Pérez', '1982-11-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apelldios` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apelldios`, `contrasena`, `cat`) VALUES
('12345678A', 'Ernesto', 'Gonzalez', 'c4ca4238a0b923820dcc509a6f75849b', 2),
('14725836B', 'Ernesto', 'Administrativo', 'c4ca4238a0b923820dcc509a6f75849b', 4),
('51178656E', 'ALBERTO', 'Valenzuela', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('98765432A', 'Gema', 'Perez', 'c4ca4238a0b923820dcc509a6f75849b', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nhc_paciente` (`nhc_paciente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria`),
  ADD KEY `permisos` (`permisos`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `NHC_paciente` (`NHC_paciente`),
  ADD KEY `fech_consul` (`fech_consul`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`NHC`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `cat` (`cat`),
  ADD KEY `cat_2` (`cat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `NHC` int(6) NOT NULL AUTO_INCREMENT COMMENT 'NHC', AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`nhc_paciente`) REFERENCES `pacientes` (`NHC`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`NHC_paciente`) REFERENCES `pacientes` (`NHC`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categoria` (`categoria`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
