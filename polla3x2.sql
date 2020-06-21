-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 04:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polla3x2`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonos`
--

CREATE TABLE `abonos` (
  `abono_id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `banco_receptor` varchar(50) NOT NULL,
  `banco_emisor` varchar(50) NOT NULL,
  `num_ref` varchar(30) NOT NULL,
  `num_cuenta` varchar(30) NOT NULL,
  `monto` int(30) NOT NULL,
  `fecha_abono` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonos`
--

INSERT INTO `abonos` (`abono_id`, `usuario`, `banco_receptor`, `banco_emisor`, `num_ref`, `num_cuenta`, `monto`, `fecha_abono`, `status`) VALUES
(4, 'james', 'banesco', 'banesco', '435435', '4353454353', 400000, '2020-06-10', 'pendiente'),
(5, 'james', 'banesco', 'banesco', '2645645', '5464564', 600000, '2020-06-15', 'aprobado'),
(6, 'nacio', 'banesco', 'banesco', '123456789', '9999999999999', 700000, '2020-06-17', 'rechazado');

-- --------------------------------------------------------

--
-- Table structure for table `jornadas`
--

CREATE TABLE `jornadas` (
  `jornada_id` int(11) NOT NULL,
  `fecha_jornada` date NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `1va_ejemplares` int(2) NOT NULL,
  `2va_ejemplares` int(2) NOT NULL,
  `3va_ejemplares` int(2) NOT NULL,
  `4va_ejemplares` int(2) NOT NULL,
  `5va_ejemplares` int(2) NOT NULL,
  `6va_ejemplares` int(2) NOT NULL,
  `1er_lugar` decimal(3,2) NOT NULL,
  `2do_lugar` decimal(3,2) NOT NULL,
  `coste_jugada` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jornadas`
--

INSERT INTO `jornadas` (`jornada_id`, `fecha_jornada`, `fecha_cierre`, `1va_ejemplares`, `2va_ejemplares`, `3va_ejemplares`, `4va_ejemplares`, `5va_ejemplares`, `6va_ejemplares`, `1er_lugar`, `2do_lugar`, `coste_jugada`, `status`) VALUES
(1, '2020-06-17', '2020-06-19 19:00:00', 15, 10, 10, 10, 8, 12, '0.60', '0.20', '200000', 0),
(2, '2020-06-21', '2020-06-21 13:55:00', 14, 14, 14, 14, 9, 14, '0.60', '0.20', '200000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jugadas`
--

CREATE TABLE `jugadas` (
  `jugada_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha_jugada` datetime NOT NULL,
  `esGratis` tinyint(1) NOT NULL DEFAULT '0',
  `1va_ejemplar` int(2) NOT NULL,
  `1va_pts` int(1) NOT NULL,
  `2va_ejemplar` int(2) NOT NULL,
  `2va_pts` int(1) NOT NULL,
  `3va_ejemplar` int(2) NOT NULL,
  `3va_pts` int(1) NOT NULL,
  `4va_ejemplar` int(2) NOT NULL,
  `4va_pts` int(1) NOT NULL,
  `5va_ejemplar` int(2) NOT NULL,
  `5va_pts` int(1) NOT NULL,
  `6va_ejemplar` int(2) NOT NULL,
  `6va_pts` int(1) NOT NULL,
  `total_pts` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jugadas`
--

INSERT INTO `jugadas` (`jugada_id`, `jornada_id`, `usuario`, `fecha_jugada`, `esGratis`, `1va_ejemplar`, `1va_pts`, `2va_ejemplar`, `2va_pts`, `3va_ejemplar`, `3va_pts`, `4va_ejemplar`, `4va_pts`, `5va_ejemplar`, `5va_pts`, `6va_ejemplar`, `6va_pts`, `total_pts`) VALUES
(6, 1, 'nacio', '2020-06-16 15:50:49', 0, 1, 3, 2, 0, 3, 1, 4, 0, 5, 1, 6, 3, 8),
(7, 1, 'nacio', '2020-06-16 15:51:32', 0, 2, 3, 1, 0, 2, 0, 1, 3, 2, 5, 1, 0, 11),
(8, 1, 'nacio', '2020-06-16 15:53:05', 0, 3, 3, 3, 0, 3, 1, 3, 0, 3, 0, 3, 0, 4),
(9, 1, 'nacio', '2020-06-18 15:55:15', 0, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(10, 1, 'nacio', '2020-06-18 15:58:07', 0, 10, 0, 10, 0, 10, 0, 10, 5, 8, 3, 11, 1, 9),
(11, 1, 'nacio', '2020-06-18 15:59:00', 1, 3, 3, 3, 0, 3, 1, 3, 0, 3, 0, 3, 0, 4),
(12, 1, 'nacio', '2020-06-17 16:00:00', 0, 4, 1, 4, 0, 4, 3, 4, 0, 4, 0, 4, 5, 9),
(13, 1, 'nacio', '2020-06-17 16:00:18', 0, 1, 3, 1, 0, 1, 0, 1, 3, 1, 3, 1, 0, 9),
(14, 1, 'nacio', '2020-06-17 16:29:09', 0, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(15, 1, 'nacio', '2020-06-17 16:32:25', 1, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(16, 1, 'nacio', '2020-06-17 16:32:47', 0, 1, 3, 2, 0, 2, 0, 1, 3, 2, 5, 1, 0, 11),
(17, 1, 'nacio', '2020-06-18 16:33:21', 0, 1, 3, 1, 0, 1, 0, 1, 3, 1, 3, 1, 0, 9),
(18, 1, 'nacio', '2020-06-18 16:33:57', 1, 2, 3, 2, 0, 2, 0, 2, 0, 2, 5, 2, 0, 8),
(19, 1, 'nacio', '2020-06-18 16:34:20', 0, 1, 3, 3, 0, 1, 0, 1, 3, 8, 3, 10, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `premios`
--

CREATE TABLE `premios` (
  `premio_id` int(11) NOT NULL,
  `jornada_id` int(20) NOT NULL,
  `total_jugadas` int(20) NOT NULL DEFAULT '0',
  `total_premio` varchar(50) NOT NULL DEFAULT '0',
  `1er_lugar_premio` varchar(50) NOT NULL DEFAULT '0',
  `2do_lugar_premio` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `premios`
--

INSERT INTO `premios` (`premio_id`, `jornada_id`, `total_jugadas`, `total_premio`, `1er_lugar_premio`, `2do_lugar_premio`) VALUES
(1, 1, 17, '1440000', '1080000', '360000'),
(2, 2, 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `retirados`
--

CREATE TABLE `retirados` (
  `retirados_id` int(255) NOT NULL,
  `jornada_id` int(255) NOT NULL,
  `fecha_jornada` date NOT NULL,
  `1va_retirados` varchar(50) DEFAULT NULL,
  `2va_retirados` varchar(50) DEFAULT NULL,
  `3va_retirados` varchar(50) DEFAULT NULL,
  `4va_retirados` varchar(50) DEFAULT NULL,
  `5va_retirados` varchar(50) DEFAULT NULL,
  `6va_retirados` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retirados`
--

INSERT INTO `retirados` (`retirados_id`, `jornada_id`, `fecha_jornada`, `1va_retirados`, `2va_retirados`, `3va_retirados`, `4va_retirados`, `5va_retirados`, `6va_retirados`) VALUES
(1, 1, '2020-06-17', '1,2,4,10', '2,5', '7', NULL, '8', '8,9,12'),
(2, 2, '2020-06-21', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario_email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usuario_saldo` decimal(20,2) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'jugador',
  `contador` int(1) NOT NULL DEFAULT '0',
  `usuario_created_at` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `apellido`, `usuario_email`, `usuario`, `password`, `usuario_saldo`, `role`, `contador`, `usuario_created_at`, `last_login`) VALUES
(7, '', '', 'nacio0911@gmail.com', 'nacio', '$2y$10$YgGDRAE/vygNjF6ZfUFYNOLRQb2T84FOm.EBqEYy6H/o1lCACBPc.', '100000.00', 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', '', 'suso@gmail.com', 'suso', '$2y$10$.LkBnbC89/QikOqBU8Xxc.FcNLriMUCPjECeG28ZIzmG.Atlqh0WC', '500000.00', 'jugador', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', '', 'james@gmail.com', 'james', '$2y$10$1BtwmVP416TG7o1hVmZV9e57ivW/bIppwQFTF0DSaxoNiyrd5v3a.', '3000000.00', 'jugador', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`abono_id`);

--
-- Indexes for table `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`jornada_id`);

--
-- Indexes for table `jugadas`
--
ALTER TABLE `jugadas`
  ADD PRIMARY KEY (`jugada_id`);

--
-- Indexes for table `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`premio_id`);

--
-- Indexes for table `retirados`
--
ALTER TABLE `retirados`
  ADD PRIMARY KEY (`retirados_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonos`
--
ALTER TABLE `abonos`
  MODIFY `abono_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `jornada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jugadas`
--
ALTER TABLE `jugadas`
  MODIFY `jugada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `premios`
--
ALTER TABLE `premios`
  MODIFY `premio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retirados`
--
ALTER TABLE `retirados`
  MODIFY `retirados_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
