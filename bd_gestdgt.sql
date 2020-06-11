-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 12:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestdgt+`
--
CREATE DATABASE IF NOT EXISTS `gestdgt+` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `gestdgt+`;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_tipo_carne`
--

DROP TABLE IF EXISTS `detalle_tipo_carne`;
CREATE TABLE `detalle_tipo_carne` (
  `dni_conductor` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_carne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `detalle_tipo_carne`
--

INSERT INTO `detalle_tipo_carne` (`dni_conductor`, `id_tipo_carne`) VALUES
('27332266D', 2),
('79121370J', 1),
('79121370J', 2),
('79121370J', 3);

-- --------------------------------------------------------

--
-- Table structure for table `multa`
--

DROP TABLE IF EXISTS `multa`;
CREATE TABLE `multa` (
  `fecha_y_hora` datetime NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` enum('en tramite','tramitada','pagada','finalizada') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'en tramite',
  `observaciones` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'no_imagen.jpg',
  `dni_conductor` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula_vehiculo` varchar(7) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_carne`
--

DROP TABLE IF EXISTS `tipo_carne`;
CREATE TABLE `tipo_carne` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `tipo_carne`
--

INSERT INTO `tipo_carne` (`id`, `descripcion`) VALUES
(1, 'B'),
(2, 'D'),
(3, 'D+E');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `dni` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `anio_exp_carne` int(4) NOT NULL,
  `n_carne` int(11) NOT NULL,
  `puntos` int(2) NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `n_placa` int(11) DEFAULT NULL,
  `tipo` enum('conductor','agente') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'conductor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`dni`, `clave`, `nombre`, `apellidos`, `anio_exp_carne`, `n_carne`, `puntos`, `direccion`, `telefono`, `n_placa`, `tipo`) VALUES
('12345678H', 'c4ca4238a0b923820dcc509a6f75849b', 'Jose', 'de los Santos', 2023, 1232, 8, 'Calle Pera', 666777666, 423423, 'agente'),
('27332266D', 'c4ca4238a0b923820dcc509a6f75849b', 'Rafael', 'Carrillo Bellido', 2027, 3, 15, 'Calle Maria Rosa nº47A 1º', 600299863, NULL, 'conductor'),
('79121370J', 'c4ca4238a0b923820dcc509a6f75849b', 'Rafael', 'Carrillo Bonilla', 2027, 1235, 10, 'Calle Maria Rosa nº47A 1º', 691246323, 0, 'conductor');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `matricula` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `bastidor` varchar(17) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `anio` int(4) NOT NULL,
  `tipo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `dni_conductor` varchar(9) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalle_tipo_carne`
--
ALTER TABLE `detalle_tipo_carne`
  ADD PRIMARY KEY (`dni_conductor`,`id_tipo_carne`),
  ADD KEY `dni_conductor` (`dni_conductor`),
  ADD KEY `id_tipo_carne` (`id_tipo_carne`);

--
-- Indexes for table `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`fecha_y_hora`,`dni_conductor`,`matricula_vehiculo`),
  ADD KEY `dni_conductor` (`dni_conductor`),
  ADD KEY `matricula_vehiculo` (`matricula_vehiculo`);

--
-- Indexes for table `tipo_carne`
--
ALTER TABLE `tipo_carne`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `dni_conductor` (`dni_conductor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo_carne`
--
ALTER TABLE `tipo_carne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_tipo_carne`
--
ALTER TABLE `detalle_tipo_carne`
  ADD CONSTRAINT `detalle_tipo_carne_ibfk_1` FOREIGN KEY (`dni_conductor`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `detalle_tipo_carne_ibfk_2` FOREIGN KEY (`id_tipo_carne`) REFERENCES `tipo_carne` (`id`);

--
-- Constraints for table `multa`
--
ALTER TABLE `multa`
  ADD CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`dni_conductor`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `multa_ibfk_2` FOREIGN KEY (`matricula_vehiculo`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`dni_conductor`) REFERENCES `usuario` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
