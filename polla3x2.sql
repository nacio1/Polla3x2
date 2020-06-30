-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 07:12 PM
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
  `monto` decimal(20,2) NOT NULL,
  `fecha_abono` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonos`
--

INSERT INTO `abonos` (`abono_id`, `usuario`, `banco_receptor`, `banco_emisor`, `num_ref`, `num_cuenta`, `monto`, `fecha_abono`, `status`) VALUES
(7, 'nacio', 'banesco', '2', '123456487', '565467869786', '300000.00', '2020-06-25', 'rechazado'),
(8, 'nacio', 'banesco', '1', '1234567891', '43534345345345345333', '350000.00', '2020-06-26', 'aprobado'),
(9, 'di_maria', 'Banesco', '2', '5654645', '68768765654645879678', '400000.00', '2020-06-27', 'aprobado'),
(10, 'nacio', 'Banesco', '2', '6456', '54654654645645645645', '400000.00', '2020-06-29', 'pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE `bancos` (
  `banco_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bancos`
--

INSERT INTO `bancos` (`banco_id`, `nombre`) VALUES
(1, 'Banesco'),
(2, 'BBVA Banco Provincial'),
(3, 'Banco Mercantil'),
(4, 'BOD'),
(5, 'BanCaribe'),
(6, 'Banco Exterior'),
(7, 'Banco Nacional de Crédito'),
(8, 'BFC'),
(9, 'Banco Caroní'),
(10, 'Banco Sofitasa'),
(11, 'Banco plaza'),
(12, '100% Banco'),
(13, 'Banplus'),
(14, 'Banco de Venezuela');

-- --------------------------------------------------------

--
-- Table structure for table `cuentasbancarias`
--

CREATE TABLE `cuentasbancarias` (
  `cuenta_id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `banco_id` int(2) NOT NULL,
  `numero_cuenta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuentasbancarias`
--

INSERT INTO `cuentasbancarias` (`cuenta_id`, `usuario`, `banco_id`, `numero_cuenta`) VALUES
(1, 'nacio', 3, '11111111111111111235'),
(2, 'nacio', 2, '11111111111111111112'),
(3, 'james', 1, '01204544120415466678'),
(4, 'di_maria', 2, '54654645654444444444'),
(5, 'suso', 1, '54646546544445644444');

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
(3, '2020-06-26', '2020-06-28 14:35:00', 11, 12, 14, 13, 11, 14, '0.60', '0.20', '200000', 0),
(4, '2020-07-06', '2020-07-06 16:00:00', 12, 10, 13, 11, 14, 14, '0.60', '0.20', '200000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jugadas`
--

CREATE TABLE `jugadas` (
  `jugada_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `jugado_por` varchar(30) NOT NULL DEFAULT 'jugador',
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

INSERT INTO `jugadas` (`jugada_id`, `jornada_id`, `usuario`, `jugado_por`, `fecha_jugada`, `esGratis`, `1va_ejemplar`, `1va_pts`, `2va_ejemplar`, `2va_pts`, `3va_ejemplar`, `3va_pts`, `4va_ejemplar`, `4va_pts`, `5va_ejemplar`, `5va_pts`, `6va_ejemplar`, `6va_pts`, `total_pts`) VALUES
(6, 1, 'nacio', 'jugador', '2020-06-16 15:50:49', 0, 1, 3, 2, 0, 3, 1, 4, 0, 5, 1, 6, 3, 8),
(7, 1, 'nacio', 'jugador', '2020-06-16 15:51:32', 0, 2, 3, 1, 0, 2, 0, 1, 3, 2, 5, 1, 0, 11),
(8, 1, 'nacio', 'jugador', '2020-06-16 15:53:05', 0, 3, 3, 3, 0, 3, 1, 3, 0, 3, 0, 3, 0, 4),
(9, 1, 'nacio', 'jugador', '2020-06-18 15:55:15', 0, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(10, 1, 'nacio', 'jugador', '2020-06-18 15:58:07', 0, 10, 0, 10, 0, 10, 0, 10, 5, 8, 3, 11, 1, 9),
(11, 1, 'nacio', 'jugador', '2020-06-18 15:59:00', 1, 3, 3, 3, 0, 3, 1, 3, 0, 3, 0, 3, 0, 4),
(12, 1, 'nacio', 'jugador', '2020-06-17 16:00:00', 0, 4, 1, 4, 0, 4, 3, 4, 0, 4, 0, 4, 5, 9),
(13, 1, 'nacio', 'jugador', '2020-06-17 16:00:18', 0, 1, 3, 1, 0, 1, 0, 1, 3, 1, 3, 1, 0, 9),
(14, 1, 'nacio', 'jugador', '2020-06-17 16:29:09', 0, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(15, 1, 'nacio', 'jugador', '2020-06-17 16:32:25', 1, 5, 1, 5, 3, 5, 0, 5, 1, 5, 1, 5, 0, 6),
(16, 1, 'nacio', 'jugador', '2020-06-17 16:32:47', 0, 1, 3, 2, 0, 2, 0, 1, 3, 2, 5, 1, 0, 11),
(17, 1, 'nacio', 'jugador', '2020-06-18 16:33:21', 0, 1, 3, 1, 0, 1, 0, 1, 3, 1, 3, 1, 0, 9),
(18, 1, 'nacio', 'jugador', '2020-06-18 16:33:57', 1, 2, 3, 2, 0, 2, 0, 2, 0, 2, 5, 2, 0, 8),
(19, 1, 'nacio', 'jugador', '2020-06-18 16:34:20', 0, 1, 3, 3, 0, 1, 0, 1, 3, 8, 3, 10, 0, 9),
(20, 3, 'nacio', 'jugador', '2020-06-26 15:46:46', 0, 5, 1, 3, 0, 5, 0, 5, 0, 3, 5, 4, 0, 6),
(21, 3, 'nacio', 'jugador', '2020-06-26 15:48:28', 1, 1, 0, 8, 0, 6, 0, 5, 0, 7, 1, 14, 0, 1),
(22, 3, 'nacio', 'jugador', '2020-06-26 15:53:11', 0, 7, 0, 4, 0, 4, 0, 4, 5, 3, 5, 4, 0, 10),
(23, 3, 'nacio', 'jugador', '2020-06-26 15:54:20', 0, 11, 0, 10, 0, 9, 3, 8, 3, 6, 0, 5, 0, 6),
(24, 3, 'nacio', 'jugador', '2020-06-26 15:54:58', 1, 10, 0, 8, 0, 3, 0, 9, 0, 5, 0, 6, 0, 0),
(25, 3, 'suso', 'jugador', '2020-06-26 22:30:10', 0, 1, 0, 7, 1, 8, 0, 6, 0, 5, 0, 4, 0, 1),
(26, 3, 'suso', 'jugador', '2020-06-26 22:32:01', 0, 11, 0, 8, 0, 9, 3, 7, 0, 9, 0, 12, 0, 3),
(27, 3, 'suso', 'jugador', '2020-06-26 22:32:10', 1, 5, 1, 6, 3, 6, 0, 4, 5, 4, 0, 5, 0, 9),
(28, 3, 'di_maria', 'jugador', '2020-06-27 21:17:22', 0, 4, 0, 4, 0, 4, 0, 5, 0, 6, 0, 6, 0, 0),
(29, 3, 'suso', 'jugador', '2020-06-28 11:09:58', 0, 4, 0, 4, 0, 8, 0, 6, 0, 5, 0, 5, 0, 0),
(30, 3, 'nacio', 'jugador', '2020-06-28 12:05:20', 0, 3, 3, 4, 0, 3, 0, 5, 0, 5, 0, 4, 0, 3),
(31, 3, 'nacio', 'jugador', '2020-06-28 12:05:30', 0, 5, 1, 5, 0, 4, 0, 5, 0, 5, 0, 5, 0, 1),
(32, 3, 'nacio', 'jugador', '2020-06-28 12:05:38', 1, 7, 0, 7, 1, 5, 0, 5, 0, 4, 0, 4, 0, 1),
(33, 4, 'nacio', 'jugador', '2020-06-29 10:52:44', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0),
(34, 4, 'nacio', 'jugador', '2020-06-29 10:53:09', 0, 2, 0, 2, 0, 2, 0, 2, 0, 2, 0, 2, 0, 0),
(35, 4, 'nacio', 'jugador', '2020-06-29 10:53:31', 1, 3, 0, 3, 0, 3, 0, 3, 0, 3, 0, 3, 0, 0),
(36, 4, 'nacio', 'jugador', '2020-06-29 15:36:25', 0, 2, 0, 4, 0, 3, 0, 4, 0, 13, 0, 4, 0, 0),
(37, 4, 'nacio', 'jugador', '2020-06-29 15:53:21', 0, 10, 0, 5, 0, 7, 0, 8, 0, 8, 0, 9, 0, 0),
(38, 4, 'nacio', 'jugador', '2020-06-29 15:53:54', 1, 12, 0, 8, 0, 6, 0, 5, 0, 4, 0, 3, 0, 0),
(42, 4, 'miguel', 'nacio', '2020-06-29 16:52:53', 0, 7, 0, 5, 0, 5, 0, 4, 0, 5, 0, 6, 0, 0),
(43, 4, 'nacio', 'jugador', '2020-06-29 16:53:23', 0, 4, 0, 3, 0, 4, 0, 3, 0, 4, 0, 5, 0, 0),
(44, 4, 'nacio', 'jugador', '2020-06-29 16:53:32', 0, 12, 0, 8, 0, 7, 0, 6, 0, 5, 0, 5, 0, 0),
(45, 4, 'nacio', 'jugador', '2020-06-29 16:53:41', 1, 3, 0, 4, 0, 5, 0, 6, 0, 7, 0, 6, 0, 0),
(46, 4, 'suso', 'jugador', '2020-06-29 18:19:17', 0, 5, 0, 4, 0, 4, 0, 5, 0, 5, 0, 4, 0, 0),
(47, 4, 'suso', 'jugador', '2020-06-29 18:19:30', 1, 12, 0, 10, 0, 13, 0, 11, 0, 14, 0, 14, 0, 0),
(48, 4, 'suso', 'jugador', '2020-06-29 18:19:38', 0, 7, 0, 7, 0, 7, 0, 7, 0, 7, 0, 7, 0, 0),
(49, 4, 'nacio', 'jugador', '2020-06-29 20:37:46', 0, 8, 0, 8, 0, 6, 0, 6, 0, 4, 0, 4, 0, 0),
(50, 4, 'nacio', 'jugador', '2020-06-29 20:37:57', 0, 10, 0, 10, 0, 11, 0, 11, 0, 12, 0, 12, 0, 0),
(51, 4, 'nacio', 'jugador', '2020-06-29 20:38:05', 1, 7, 0, 7, 0, 7, 0, 7, 0, 7, 0, 7, 0, 0),
(52, 4, 'pedro', 'nacio', '2020-06-29 20:38:45', 0, 1, 0, 3, 0, 1, 0, 3, 0, 1, 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `misbancos`
--

CREATE TABLE `misbancos` (
  `banco_id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `numero_cuenta` varchar(30) NOT NULL,
  `tipo_cuenta` varchar(20) NOT NULL,
  `titular` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `img_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `misbancos`
--

INSERT INTO `misbancos` (`banco_id`, `nombre`, `numero_cuenta`, `tipo_cuenta`, `titular`, `cedula`, `img_url`) VALUES
(1, 'Banesco', '0134  0021 17 0212172030', 'ahorro', 'Teodoro Chirino', '9924872', 'banesco-logo.png'),
(2, 'Mercantil', '0105 0104 12 1104129779', 'corriente', 'Yulaima Carpio', '12694890', 'mercantil-logo.png'),
(3, 'BNC', '0191 0102 29 22100040300', 'corriente', 'Jose Chirino', '27253113', 'bnc-logo.png');

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
(2, 2, 0, '0', '0', '0'),
(3, 3, 13, '1440000', '1080000', '360000'),
(4, 4, 20, '2400000', '1800000', '600000');

-- --------------------------------------------------------

--
-- Table structure for table `resultados`
--

CREATE TABLE `resultados` (
  `resultados_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL,
  `fecha_jornada` date NOT NULL,
  `1va_resultados` varchar(30) DEFAULT NULL,
  `2va_resultados` varchar(30) DEFAULT NULL,
  `3va_resultados` varchar(30) DEFAULT NULL,
  `4va_resultados` varchar(30) DEFAULT NULL,
  `5va_resultados` varchar(30) DEFAULT NULL,
  `6va_resultados` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resultados`
--

INSERT INTO `resultados` (`resultados_id`, `jornada_id`, `fecha_jornada`, `1va_resultados`, `2va_resultados`, `3va_resultados`, `4va_resultados`, `5va_resultados`, `6va_resultados`) VALUES
(1, 4, '2020-07-06', '3 - 7 - 6', NULL, NULL, NULL, NULL, NULL);

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
(1, 1, '2020-06-17', '1,2,4,10', '2,5', '7', '5', '8', '8,9'),
(2, 2, '2020-06-21', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, '2020-06-26', '9,10,11', '1,10', '', '', '6', ''),
(4, 4, '2020-07-06', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retiros`
--

CREATE TABLE `retiros` (
  `retiro_id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `cuenta_id` int(10) NOT NULL,
  `monto` decimal(20,2) NOT NULL,
  `fecha_retiro` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retiros`
--

INSERT INTO `retiros` (`retiro_id`, `usuario`, `cuenta_id`, `monto`, `fecha_retiro`, `status`) VALUES
(1, 'nacio', 1, '300000.00', '2020-06-24 10:01:25', 'rechazado'),
(2, 'nacio', 1, '400000.00', '2020-06-24 10:06:18', 'rechazado'),
(3, 'nacio', 2, '200000.00', '2020-06-24 10:08:05', 'aprobado'),
(4, 'di_maria', 4, '200000.00', '2020-06-27 21:19:24', 'pendiente'),
(5, 'nacio', 1, '1600000.00', '2020-06-29 20:03:11', 'pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cedula` int(10) DEFAULT NULL,
  `usuario_email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usuario_saldo` decimal(20,2) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'jugador',
  `contador` int(1) NOT NULL DEFAULT '0',
  `fecha_creado` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `apellido`, `cedula`, `usuario_email`, `usuario`, `password`, `usuario_saldo`, `role`, `contador`, `fecha_creado`, `last_login`) VALUES
(7, 'Jose', 'Chirino', 27253113, 'nacio0911@gmail.com', 'nacio', '$2y$10$BF6ui79vvDnQ56MzgYhU7uLDEMuwShX4BtRfC.KrniIFTF2UxKfky', '400000.00', 'admin', 0, '2020-05-03 08:13:45', '2020-06-29 20:35:54'),
(8, 'Jesus', 'Joaquin', 22034504, 'suso@gmail.com', 'suso', '$2y$10$9IoE2YotCVcV1rAR.RTyUuxQK72av7rKAGfiE6vrUHrmQN18VrZ2W', '0.00', 'admin', 1, '2020-06-01 09:15:45', '2020-06-29 20:17:26'),
(11, 'James', 'Rodriguez', 22508123, 'james@gmail.com', 'james', '$2y$10$1BtwmVP416TG7o1hVmZV9e57ivW/bIppwQFTF0DSaxoNiyrd5v3a.', '3400000.00', 'jugador', 0, '2020-06-15 11:15:50', '2020-06-29 20:27:36'),
(12, 'Angel', 'Maria', 18252147, 'er_fideo@gmail.com', 'di_maria', '$2y$10$xZvkKglbJPjRa7Ffza0IW.HFJv4fcsQ4wPcCHqP219netnHOrx11q', '0.00', 'jugador', 1, '2020-06-26 10:13:45', '2020-06-28 12:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`abono_id`);

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`banco_id`);

--
-- Indexes for table `cuentasbancarias`
--
ALTER TABLE `cuentasbancarias`
  ADD PRIMARY KEY (`cuenta_id`);

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
-- Indexes for table `misbancos`
--
ALTER TABLE `misbancos`
  ADD PRIMARY KEY (`banco_id`);

--
-- Indexes for table `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`premio_id`);

--
-- Indexes for table `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`resultados_id`);

--
-- Indexes for table `retirados`
--
ALTER TABLE `retirados`
  ADD PRIMARY KEY (`retirados_id`);

--
-- Indexes for table `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`retiro_id`);

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
  MODIFY `abono_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `banco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cuentasbancarias`
--
ALTER TABLE `cuentasbancarias`
  MODIFY `cuenta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `jornada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jugadas`
--
ALTER TABLE `jugadas`
  MODIFY `jugada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `misbancos`
--
ALTER TABLE `misbancos`
  MODIFY `banco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `premios`
--
ALTER TABLE `premios`
  MODIFY `premio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resultados`
--
ALTER TABLE `resultados`
  MODIFY `resultados_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retirados`
--
ALTER TABLE `retirados`
  MODIFY `retirados_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retiros`
--
ALTER TABLE `retiros`
  MODIFY `retiro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
