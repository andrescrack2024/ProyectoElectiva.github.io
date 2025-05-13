-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2025 a las 04:03:47
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
-- Base de datos: `progreuib`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_ids`
--

CREATE TABLE `control_ids` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fecha_Registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Empresa_id` int(11) NOT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `Tipo_Contrato` varchar(50) DEFAULT NULL,
  `Salario` varchar(50) DEFAULT NULL,
  `Fecha_Publicacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Fecha_Registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `Area` enum('Programador','Docente','Analista de Datos','Diseñador Gráfico','Ingeniero de Software','Soporte Técnico','Administrador de Redes','Community Manager','Marketing Digital','Contador','Asistente Administrativo','Gestor de Proyectos','Psicólogo Organizacional','Redactor de Contenidos','Especialista en Recursos Humanos') NOT NULL,
  `Rol` enum('Trabajador','Empresa','Administrador','Vendedor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Contraseña`, `Fecha_Registro`, `Area`, `Rol`) VALUES
(19, 'Juan', 'paisapixelstudio@gmail.com', '$2y$10$Gi8fZDQUN4e7eill2VShouS6IlBbvTPZJPX59WOrQ8kKxRYzhhmm6', '2025-04-17 19:52:01', 'Programador', 'Vendedor'),
(20, 'Juan21', 'juan@gmail.com', '$2y$10$mg6w5Klivh9jCL7UlhG1v.x3a/aGFvcAH.vTFjUohHdCrCFCDmkkK', '2025-04-18 17:04:01', 'Programador', 'Empresa'),
(21, 'Pablo', 'pablo@gmail.com', '$2y$10$Fmx1QcZhtAMrY4OWzERZR.XMpz5f1/5jFZF33CtjmHQhVU6QMxGta', '2025-05-02 01:26:27', 'Programador', 'Administrador');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `reestablecer_id` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN
    DECLARE nuevo_id INT;

    -- Buscar el ID más bajo disponible en la tabla de control
    SELECT MIN(id) INTO nuevo_id FROM control_ids WHERE id NOT IN (SELECT id FROM usuarios);
    
    -- Si encontramos un ID disponible, lo insertamos en la tabla de control
    IF nuevo_id IS NOT NULL THEN
        INSERT INTO control_ids (id) VALUES (nuevo_id);
    END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_ids`
--
ALTER TABLE `control_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Empresa_id` (`Empresa_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`Empresa_id`) REFERENCES `usuarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
