-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2024 at 01:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administracion`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id_area` bigint NOT NULL,
  `des_area` varchar(100) NOT NULL,
  `f_registro_area` date NOT NULL,
  `h_registro_area` time NOT NULL,
  `alter_area` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id_area`, `des_area`, `f_registro_area`, `h_registro_area`, `alter_area`) VALUES
(1, 'SISTEMAS', '2024-01-03', '14:48:37', '2024-01-04 13:53:56'),
(2, 'ADMINISTRACION', '2024-01-04', '12:50:26', '2024-01-04 13:54:05'),
(3, 'INFORMATICA', '2024-01-04', '12:51:17', '2024-01-04 12:51:17'),
(4, 'REDES', '2024-01-04', '12:52:00', '2024-01-04 12:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` bigint NOT NULL,
  `des_cargo` varchar(100) NOT NULL,
  `f_registro_cargo` date NOT NULL,
  `h_registro_cargo` time NOT NULL,
  `alter_cargo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `des_cargo`, `f_registro_cargo`, `h_registro_cargo`, `alter_cargo`) VALUES
(1, 'EMPLEADO', '2024-01-03', '14:48:37', '2024-01-04 13:55:20'),
(2, 'JEFE', '2024-01-04', '13:27:06', '2024-01-04 13:27:06'),
(3, 'JEFE', '2024-01-04', '13:27:34', '2024-01-04 13:27:34'),
(4, 'EMPLEADO', '2024-01-04', '13:28:14', '2024-01-04 13:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int NOT NULL,
  `des_ciudad` varchar(100) NOT NULL,
  `f_registro_ciudad` date NOT NULL,
  `h_registro_ciudad` time NOT NULL,
  `alter_ciudad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `des_ciudad`, `f_registro_ciudad`, `h_registro_ciudad`, `alter_ciudad`) VALUES
(1, 'La Paz', '2024-01-08', '09:01:12', '2024-01-08 09:01:12'),
(2, 'El alto', '2024-01-08', '09:05:40', '2024-01-08 09:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `controles`
--

CREATE TABLE `controles` (
  `id_control` int NOT NULL,
  `ingreso` time NOT NULL,
  `registro_ingreso` datetime NOT NULL,
  `salida` time NOT NULL,
  `registro_salida` datetime NOT NULL,
  `id_fk_empleado` bigint NOT NULL,
  `id_fk_ciudad` int NOT NULL,
  `f_registro_control` date NOT NULL,
  `h_registro_control` time NOT NULL,
  `alter_control` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` bigint NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `ci` bigint NOT NULL,
  `expedido` varchar(100) NOT NULL,
  `celular` bigint NOT NULL,
  `id_fk_area` bigint NOT NULL,
  `id_fk_cargo` bigint NOT NULL,
  `f_registro_empleado` date NOT NULL,
  `h_registro_empleado` time NOT NULL,
  `alter_empleado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombres`, `apellidos`, `ci`, `expedido`, `celular`, `id_fk_area`, `id_fk_cargo`, `f_registro_empleado`, `h_registro_empleado`, `alter_empleado`) VALUES
(1, 'Juan Carlos', 'Tarqui Paredes', 12421869, 'La Paz', 67044188, 1, 1, '2024-01-03', '14:48:37', '2024-01-03 18:48:37'),
(2, 'Juan Carlosasdfasdfasd', 'Tarqui fasdfasdfasdfas', 1242186912312313, 'LA PAZ', 67044188123123123, 2, 1, '2024-01-04', '14:02:30', '2024-01-04 14:02:30'),
(3, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:15:35', '2024-01-04 14:15:35'),
(4, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:30', '2024-01-04 14:21:30'),
(5, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:30', '2024-01-04 14:21:30'),
(6, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:30', '2024-01-04 14:21:30'),
(7, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:30', '2024-01-04 14:21:30'),
(8, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:31', '2024-01-04 14:21:31'),
(9, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:31', '2024-01-04 14:21:31'),
(10, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:31', '2024-01-04 14:21:31'),
(11, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:31', '2024-01-04 14:21:31'),
(12, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:32', '2024-01-04 14:21:32'),
(13, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:21:40', '2024-01-04 14:21:40'),
(14, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:08', '2024-01-04 14:24:08'),
(15, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:09', '2024-01-04 14:24:09'),
(16, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:09', '2024-01-04 14:24:09'),
(17, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:09', '2024-01-04 14:24:09'),
(18, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:09', '2024-01-04 14:24:09'),
(19, 'Beimar', 'Brito', 123, 'LA PAZ', 6704896, 1, 3, '2024-01-04', '14:24:09', '2024-01-04 14:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `omisiones`
--

CREATE TABLE `omisiones` (
  `id_omision` int NOT NULL,
  `justificacion` text NOT NULL,
  `tiempo_omision` int NOT NULL,
  `medida` varchar(250) NOT NULL,
  `ingreso` int DEFAULT NULL,
  `salida` int DEFAULT NULL,
  `marcacion` int DEFAULT NULL,
  `id_fk_empleado` bigint NOT NULL,
  `id_fk_ciudad` int NOT NULL,
  `f_registro_omision` date NOT NULL,
  `h_registro_omision` time NOT NULL,
  `alter_omision` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int NOT NULL,
  `des_rol` varchar(100) NOT NULL,
  `f_registro_rol` date NOT NULL,
  `h_registro_rol` time NOT NULL,
  `alter_rol` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `des_rol`, `f_registro_rol`, `h_registro_rol`, `alter_rol`) VALUES
(1, 'Administrador', '2024-01-03', '13:48:32', '2024-01-03 17:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` text NOT NULL,
  `id_fk_rol` int NOT NULL,
  `id_fk_empleado` bigint NOT NULL,
  `f_registro_usuario` date NOT NULL,
  `h_registro_usuario` time NOT NULL,
  `alter_usuario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`, `id_fk_rol`, `id_fk_empleado`, `f_registro_usuario`, `h_registro_usuario`, `alter_usuario`) VALUES
(1, 'admin', 'admin', 1, 1, '2024-01-03', '14:48:37', '2024-01-03 18:49:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_empleados`
-- (See below for the actual view)
--
CREATE TABLE `vista_empleados` (
`id_empleado` bigint
,`nombres` varchar(100)
,`apellidos` varchar(100)
,`ci` bigint
,`expedido` varchar(100)
,`celular` bigint
,`id_fk_area` bigint
,`id_fk_cargo` bigint
,`f_registro_empleado` date
,`h_registro_empleado` time
,`alter_empleado` datetime
,`des_area` varchar(100)
,`des_cargo` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_usuarios`
-- (See below for the actual view)
--
CREATE TABLE `vista_usuarios` (
`id_usuario` bigint
,`usuario` varchar(100)
,`contrasena` text
,`id_fk_rol` int
,`id_fk_empleado` bigint
,`f_registro_usuario` date
,`h_registro_usuario` time
,`alter_usuario` datetime
,`id_empleado` bigint
,`nombres` varchar(100)
,`apellidos` varchar(100)
,`ci` bigint
,`expedido` varchar(100)
,`celular` bigint
,`id_fk_area` bigint
,`id_fk_cargo` bigint
,`f_registro_empleado` date
,`h_registro_empleado` time
,`alter_empleado` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vista_empleados`
--
DROP TABLE IF EXISTS `vista_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_empleados`  AS SELECT `empleados`.`id_empleado` AS `id_empleado`, `empleados`.`nombres` AS `nombres`, `empleados`.`apellidos` AS `apellidos`, `empleados`.`ci` AS `ci`, `empleados`.`expedido` AS `expedido`, `empleados`.`celular` AS `celular`, `empleados`.`id_fk_area` AS `id_fk_area`, `empleados`.`id_fk_cargo` AS `id_fk_cargo`, `empleados`.`f_registro_empleado` AS `f_registro_empleado`, `empleados`.`h_registro_empleado` AS `h_registro_empleado`, `empleados`.`alter_empleado` AS `alter_empleado`, `areas`.`des_area` AS `des_area`, `cargos`.`des_cargo` AS `des_cargo` FROM ((`empleados` left join `areas` on((`areas`.`id_area` = `empleados`.`id_fk_area`))) left join `cargos` on((`cargos`.`id_cargo` = `empleados`.`id_fk_cargo`))) ORDER BY `empleados`.`f_registro_empleado` DESC, `empleados`.`h_registro_empleado` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vista_usuarios`
--
DROP TABLE IF EXISTS `vista_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuarios`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`usuario` AS `usuario`, `usuarios`.`contrasena` AS `contrasena`, `usuarios`.`id_fk_rol` AS `id_fk_rol`, `usuarios`.`id_fk_empleado` AS `id_fk_empleado`, `usuarios`.`f_registro_usuario` AS `f_registro_usuario`, `usuarios`.`h_registro_usuario` AS `h_registro_usuario`, `usuarios`.`alter_usuario` AS `alter_usuario`, `empleados`.`id_empleado` AS `id_empleado`, `empleados`.`nombres` AS `nombres`, `empleados`.`apellidos` AS `apellidos`, `empleados`.`ci` AS `ci`, `empleados`.`expedido` AS `expedido`, `empleados`.`celular` AS `celular`, `empleados`.`id_fk_area` AS `id_fk_area`, `empleados`.`id_fk_cargo` AS `id_fk_cargo`, `empleados`.`f_registro_empleado` AS `f_registro_empleado`, `empleados`.`h_registro_empleado` AS `h_registro_empleado`, `empleados`.`alter_empleado` AS `alter_empleado` FROM (`usuarios` join `empleados` on((`empleados`.`id_empleado` = `usuarios`.`id_fk_empleado`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indexes for table `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`id_control`),
  ADD KEY `id_fk_empleado` (`id_fk_empleado`),
  ADD KEY `id_fk_ciudad` (`id_fk_ciudad`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_fk_area` (`id_fk_area`),
  ADD KEY `id_fk_cargo` (`id_fk_cargo`);

--
-- Indexes for table `omisiones`
--
ALTER TABLE `omisiones`
  ADD PRIMARY KEY (`id_omision`),
  ADD KEY `id_fk_empleado` (`id_fk_empleado`),
  ADD KEY `id_fk_ciudad` (`id_fk_ciudad`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_fk_rol` (`id_fk_rol`),
  ADD KEY `id_fk_empleado` (`id_fk_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `controles`
--
ALTER TABLE `controles`
  MODIFY `id_control` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `omisiones`
--
ALTER TABLE `omisiones`
  MODIFY `id_omision` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `controles`
--
ALTER TABLE `controles`
  ADD CONSTRAINT `controles_ibfk_1` FOREIGN KEY (`id_fk_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `controles_ibfk_2` FOREIGN KEY (`id_fk_ciudad`) REFERENCES `ciudades` (`id_ciudad`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_fk_area`) REFERENCES `areas` (`id_area`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_fk_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Constraints for table `omisiones`
--
ALTER TABLE `omisiones`
  ADD CONSTRAINT `omisiones_ibfk_1` FOREIGN KEY (`id_fk_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `omisiones_ibfk_2` FOREIGN KEY (`id_fk_ciudad`) REFERENCES `ciudades` (`id_ciudad`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_fk_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_fk_empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
