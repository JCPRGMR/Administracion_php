-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 03:39 PM
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
-- Database: `id21778612_admpersonal`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `salida` time DEFAULT NULL,
  `registro_salida` datetime DEFAULT NULL,
  `id_fk_empleado` bigint NOT NULL,
  `id_fk_ciudad` int NOT NULL,
  `f_registro_control` date NOT NULL,
  `h_registro_control` time NOT NULL,
  `alter_control` datetime NOT NULL,
  `obs_ingreso` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `obs_salida` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controles`
--

INSERT INTO `controles` (`id_control`, `ingreso`, `registro_ingreso`, `salida`, `registro_salida`, `id_fk_empleado`, `id_fk_ciudad`, `f_registro_control`, `h_registro_control`, `alter_control`, `obs_ingreso`, `obs_salida`) VALUES
(8, '10:44:18', '2024-01-11 10:44:18', NULL, NULL, 1, 1, '2024-01-11', '10:44:18', '2024-01-11 10:44:18', 'Esta es una descripcion larga para probar los parametros de entrada estos datos no pueden ser alterados XDD', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombres`, `apellidos`, `ci`, `expedido`, `celular`, `id_fk_area`, `id_fk_cargo`, `f_registro_empleado`, `h_registro_empleado`, `alter_empleado`) VALUES
(1, 'Juan Carlos', 'Tarqui Paredes', 12421869, 'La Paz', 67044188, 1, 1, '2024-01-03', '14:48:37', '2024-01-03 18:48:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`, `id_fk_rol`, `id_fk_empleado`, `f_registro_usuario`, `h_registro_usuario`, `alter_usuario`) VALUES
(1, 'admin', 'admin', 1, 1, '2024-01-03', '14:48:37', '2024-01-03 18:49:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_controles`
-- (See below for the actual view)
--
CREATE TABLE `vista_controles` (
`id_control` int
,`ingreso` time
,`registro_ingreso` datetime
,`salida` time
,`registro_salida` datetime
,`id_fk_empleado` bigint
,`id_fk_ciudad` int
,`f_registro_control` date
,`h_registro_control` time
,`alter_control` datetime
,`obs_ingreso` text
,`obs_salida` text
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
,`des_area` varchar(100)
,`des_cargo` varchar(100)
,`id_ciudad` int
,`des_ciudad` varchar(100)
,`f_registro_ciudad` date
,`h_registro_ciudad` time
,`alter_ciudad` datetime
);

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
-- Stand-in structure for view `vista_omisiones`
-- (See below for the actual view)
--
CREATE TABLE `vista_omisiones` (
`id_omision` int
,`justificacion` text
,`tiempo_omision` int
,`medida` varchar(250)
,`ingreso` int
,`salida` int
,`marcacion` int
,`id_fk_empleado` bigint
,`id_fk_ciudad` int
,`f_registro_omision` date
,`h_registro_omision` time
,`alter_omision` datetime
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
,`des_area` varchar(100)
,`des_cargo` varchar(100)
,`id_ciudad` int
,`des_ciudad` varchar(100)
,`f_registro_ciudad` date
,`h_registro_ciudad` time
,`alter_ciudad` datetime
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
,`id_rol` int
,`des_rol` varchar(100)
,`f_registro_rol` date
,`h_registro_rol` time
,`alter_rol` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vista_controles`
--
DROP TABLE IF EXISTS `vista_controles`;

CREATE VIEW `vista_controles`  AS SELECT `controles`.`id_control` AS `id_control`, `controles`.`ingreso` AS `ingreso`, `controles`.`registro_ingreso` AS `registro_ingreso`, `controles`.`salida` AS `salida`, `controles`.`registro_salida` AS `registro_salida`, `controles`.`id_fk_empleado` AS `id_fk_empleado`, `controles`.`id_fk_ciudad` AS `id_fk_ciudad`, `controles`.`f_registro_control` AS `f_registro_control`, `controles`.`h_registro_control` AS `h_registro_control`, `controles`.`alter_control` AS `alter_control`, `controles`.`obs_ingreso` AS `obs_ingreso`, `controles`.`obs_salida` AS `obs_salida`, `vista_empleados`.`id_empleado` AS `id_empleado`, `vista_empleados`.`nombres` AS `nombres`, `vista_empleados`.`apellidos` AS `apellidos`, `vista_empleados`.`ci` AS `ci`, `vista_empleados`.`expedido` AS `expedido`, `vista_empleados`.`celular` AS `celular`, `vista_empleados`.`id_fk_area` AS `id_fk_area`, `vista_empleados`.`id_fk_cargo` AS `id_fk_cargo`, `vista_empleados`.`f_registro_empleado` AS `f_registro_empleado`, `vista_empleados`.`h_registro_empleado` AS `h_registro_empleado`, `vista_empleados`.`alter_empleado` AS `alter_empleado`, `vista_empleados`.`des_area` AS `des_area`, `vista_empleados`.`des_cargo` AS `des_cargo`, `ciudades`.`id_ciudad` AS `id_ciudad`, `ciudades`.`des_ciudad` AS `des_ciudad`, `ciudades`.`f_registro_ciudad` AS `f_registro_ciudad`, `ciudades`.`h_registro_ciudad` AS `h_registro_ciudad`, `ciudades`.`alter_ciudad` AS `alter_ciudad` FROM ((`controles` join `vista_empleados` on((`vista_empleados`.`id_empleado` = `controles`.`id_fk_empleado`))) join `ciudades` on((`ciudades`.`id_ciudad` = `controles`.`id_fk_ciudad`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vista_empleados`
--
DROP TABLE IF EXISTS `vista_empleados`;

CREATE VIEW `vista_empleados`  AS SELECT `empleados`.`id_empleado` AS `id_empleado`, `empleados`.`nombres` AS `nombres`, `empleados`.`apellidos` AS `apellidos`, `empleados`.`ci` AS `ci`, `empleados`.`expedido` AS `expedido`, `empleados`.`celular` AS `celular`, `empleados`.`id_fk_area` AS `id_fk_area`, `empleados`.`id_fk_cargo` AS `id_fk_cargo`, `empleados`.`f_registro_empleado` AS `f_registro_empleado`, `empleados`.`h_registro_empleado` AS `h_registro_empleado`, `empleados`.`alter_empleado` AS `alter_empleado`, `areas`.`des_area` AS `des_area`, `cargos`.`des_cargo` AS `des_cargo` FROM ((`empleados` left join `areas` on((`areas`.`id_area` = `empleados`.`id_fk_area`))) left join `cargos` on((`cargos`.`id_cargo` = `empleados`.`id_fk_cargo`))) ORDER BY `empleados`.`f_registro_empleado` DESC, `empleados`.`h_registro_empleado` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vista_omisiones`
--
DROP TABLE IF EXISTS `vista_omisiones`;

CREATE VIEW `vista_omisiones`  AS SELECT `omisiones`.`id_omision` AS `id_omision`, `omisiones`.`justificacion` AS `justificacion`, `omisiones`.`tiempo_omision` AS `tiempo_omision`, `omisiones`.`medida` AS `medida`, `omisiones`.`ingreso` AS `ingreso`, `omisiones`.`salida` AS `salida`, `omisiones`.`marcacion` AS `marcacion`, `omisiones`.`id_fk_empleado` AS `id_fk_empleado`, `omisiones`.`id_fk_ciudad` AS `id_fk_ciudad`, `omisiones`.`f_registro_omision` AS `f_registro_omision`, `omisiones`.`h_registro_omision` AS `h_registro_omision`, `omisiones`.`alter_omision` AS `alter_omision`, `vista_empleados`.`id_empleado` AS `id_empleado`, `vista_empleados`.`nombres` AS `nombres`, `vista_empleados`.`apellidos` AS `apellidos`, `vista_empleados`.`ci` AS `ci`, `vista_empleados`.`expedido` AS `expedido`, `vista_empleados`.`celular` AS `celular`, `vista_empleados`.`id_fk_area` AS `id_fk_area`, `vista_empleados`.`id_fk_cargo` AS `id_fk_cargo`, `vista_empleados`.`f_registro_empleado` AS `f_registro_empleado`, `vista_empleados`.`h_registro_empleado` AS `h_registro_empleado`, `vista_empleados`.`alter_empleado` AS `alter_empleado`, `vista_empleados`.`des_area` AS `des_area`, `vista_empleados`.`des_cargo` AS `des_cargo`, `ciudades`.`id_ciudad` AS `id_ciudad`, `ciudades`.`des_ciudad` AS `des_ciudad`, `ciudades`.`f_registro_ciudad` AS `f_registro_ciudad`, `ciudades`.`h_registro_ciudad` AS `h_registro_ciudad`, `ciudades`.`alter_ciudad` AS `alter_ciudad` FROM ((`omisiones` join `vista_empleados` on((`vista_empleados`.`id_empleado` = `omisiones`.`id_fk_empleado`))) join `ciudades` on((`ciudades`.`id_ciudad` = `omisiones`.`id_fk_ciudad`)));

-- --------------------------------------------------------

--
-- Structure for view `vista_usuarios`
--
DROP TABLE IF EXISTS `vista_usuarios`;

CREATE VIEW `vista_usuarios`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`usuario` AS `usuario`, `usuarios`.`contrasena` AS `contrasena`, `usuarios`.`id_fk_rol` AS `id_fk_rol`, `usuarios`.`id_fk_empleado` AS `id_fk_empleado`, `usuarios`.`f_registro_usuario` AS `f_registro_usuario`, `usuarios`.`h_registro_usuario` AS `h_registro_usuario`, `usuarios`.`alter_usuario` AS `alter_usuario`, `empleados`.`id_empleado` AS `id_empleado`, `empleados`.`nombres` AS `nombres`, `empleados`.`apellidos` AS `apellidos`, `empleados`.`ci` AS `ci`, `empleados`.`expedido` AS `expedido`, `empleados`.`celular` AS `celular`, `empleados`.`id_fk_area` AS `id_fk_area`, `empleados`.`id_fk_cargo` AS `id_fk_cargo`, `empleados`.`f_registro_empleado` AS `f_registro_empleado`, `empleados`.`h_registro_empleado` AS `h_registro_empleado`, `empleados`.`alter_empleado` AS `alter_empleado`, `roles`.`id_rol` AS `id_rol`, `roles`.`des_rol` AS `des_rol`, `roles`.`f_registro_rol` AS `f_registro_rol`, `roles`.`h_registro_rol` AS `h_registro_rol`, `roles`.`alter_rol` AS `alter_rol` FROM ((`usuarios` join `empleados` on((`empleados`.`id_empleado` = `usuarios`.`id_fk_empleado`))) join `roles` on((`roles`.`id_rol` = `usuarios`.`id_fk_rol`))) ORDER BY `usuarios`.`f_registro_usuario` DESC ;

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
  MODIFY `id_control` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `omisiones`
--
ALTER TABLE `omisiones`
  MODIFY `id_omision` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
