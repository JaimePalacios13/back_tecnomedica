-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2024 at 12:43 AM
-- Server version: 10.11.7-MariaDB-2ubuntu2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecnomedica_administracion`
--

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `nombre`, `url`) VALUES
(1, 'Conozcanos', '../conozcanos');

-- --------------------------------------------------------

--
-- Table structure for table `pagina_seccion`
--

CREATE TABLE `pagina_seccion` (
  `id_seccion` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pagina_seccion`
--

INSERT INTO `pagina_seccion` (`id_seccion`, `id_pagina`, `nombre`) VALUES
(1, 1, 'Frase'),
(2, 1, 'Sobre nosotros e historia'),
(3, 1, 'Mision y vision');

-- --------------------------------------------------------

--
-- Table structure for table `seccion_detalle`
--

CREATE TABLE `seccion_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `valor` varchar(350) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT '1 == activo, 0 == inactivo',
  `tipo` varchar(50) DEFAULT NULL,
  `extras` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `seccion_detalle`
--

INSERT INTO `seccion_detalle` (`id_detalle`, `id_seccion`, `nombre`, `valor`, `estado`, `tipo`, `extras`) VALUES
(6, 1, 'Frase', '“No pretendamos que las cosas cambien, si siempre hacemos lo mismo”. Albert Einstein.', 1, 'textarea', ''),
(7, 2, 'Sobre nosotros', 'Somos una empresa que busca sostenerse e innovar en el tiempo; dedicada a la comercialización de insumos médicos hospitalarios con personal competente y profesional en el área, que permite satisfacer de manera oportuna las necesidades de nuestros clientes, comprometidos con la efectividad, la calidad y la prestación del servicio. ', 1, 'textarea', ''),
(8, 2, 'Historia', 'Somos una empresa, liderada por dos profesionales en la salud, Especialistas en Ingeniería Biomédica, con 14 años de experiencia en tecnología y dispositivos médicos; en el rubro de aplicación y desarrollo clinico en terapias endovasculares tales como: Cardio intervención Neuro intervención Vascular Periférico Control y Manejo del ritmo cardiaco', 1, 'textarea', ''),
(9, 3, 'Misión', 'Nuestra misión es, evolucionar junto a la tecnología médica, y ser especialistas en distribuirla y aplicarla, ser pioneros en nuestro país, ofreciendo equipos y dispositivos con la más alta calidad y al acceso de todos nuestros pacientes.', 1, 'textarea', ''),
(10, 3, 'Visión', 'Crecer en el mercado Salvadoreño y ser la primera opción, para nuestros clientes, médicos y pacientes en tecnología médica, así mismo ser una opción de primera calidad en el mercado de dispositivos médicos, manteniendo los valores que nos caracterizan, Honradez, lealtad y ética profesional', 1, 'textarea', ''),
(11, 2, 'Imagen', 'assets/upload/historia/historia1707761680.jpg', 1, 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 150 KB\",\r\n      \"4\":\"Dimensiones máximas: 455x243\"\r\n   }\r\n}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indexes for table `pagina_seccion`
--
ALTER TABLE `pagina_seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indexes for table `seccion_detalle`
--
ALTER TABLE `seccion_detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagina_seccion`
--
ALTER TABLE `pagina_seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seccion_detalle`
--
ALTER TABLE `seccion_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
