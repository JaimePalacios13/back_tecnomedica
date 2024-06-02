-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2024 at 12:40 AM
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
-- Database: `tecnomedica_tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandeja`
--

CREATE TABLE `bandeja` (
  `id_bandeja` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `lema1` varchar(100) NOT NULL,
  `sublema1` varchar(200) NOT NULL,
  `lema2` varchar(100) NOT NULL,
  `sublema2` varchar(200) DEFAULT NULL,
  `lema3` varchar(100) NOT NULL,
  `sublema3` varchar(200) DEFAULT NULL,
  `carousel1` varchar(100) NOT NULL,
  `carousel2` varchar(100) NOT NULL,
  `carousel3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `lema1`, `sublema1`, `lema2`, `sublema2`, `lema3`, `sublema3`, `carousel1`, `carousel2`, `carousel3`) VALUES
(1, '', '', '', '', '', '', 'https://tecnomedica-sv.com/administracion/assets/upload/carousel/carousel11661571119.jpg', 'https://tecnomedica-sv.com/administracion/assets/upload/carousel/carousel21661568074.jpg', 'https://tecnomedica-sv.com/administracion/assets/upload/carousel/carousel31661568971.jpg'),
(2, ':lema1', ':sublema1', ':lema2', ':sublema2', ':lema3', ':sublema3', ':carousel1', ':carousel2', ':carousel3');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `fotografia` varchar(100) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT '1 == activo, 0 == inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `fotografia`, `estado`) VALUES
(5, 'Insumos Médicos', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(6, 'Equipo Médico', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(7, 'Mobiliario Medico', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(8, 'Farmacos', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(9, 'Vascular Coronario ', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(10, 'Neuro Intervención ', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(11, 'Columna y CMF ', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(12, 'Cardio Vascular ', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(13, 'Neumologia ', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 0),
(14, 'Anestesiología', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(15, 'Vascular Periférico', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(16, 'Cuidados en casa', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(34, 'Drenaje', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1),
(35, 'Cardio Intervencion', 'Descripción de la categoría', 'assets/upload/categorias/categoria-default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentarios` int(11) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` int(11) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `web` text DEFAULT NULL COMMENT 'es facebook'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `correo`, `direccion`, `celular`, `telefono`, `about_us`, `web`) VALUES
(1, 'ventas@tecnomedica-sv.com', ' 25 calle poniente y 15 avenida Norte, #904-A, Colonia Layco, San Salvador.', '7798-0999', '(+503)2130-1965', 'Somos una empresa que busca sostenerse e innovar en el tiempo; dedicada a la comercialización de insumos médicos hospitalarios con personal competente y profesional en el área, que permite satisfacer de manera oportuna las necesidades de nuestros clientes, comprometidos con la efectividad, la calidad y la prestación del servicio.', '');

-- --------------------------------------------------------

--
-- Table structure for table `inicio`
--

CREATE TABLE `inicio` (
  `id_index` int(11) NOT NULL,
  `frase` varchar(500) NOT NULL,
  `historia` mediumtext NOT NULL,
  `img_historia` varchar(100) NOT NULL,
  `politica` text NOT NULL,
  `compromiso` text NOT NULL,
  `id_carousel` int(11) DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `inicio`
--

INSERT INTO `inicio` (`id_index`, `frase`, `historia`, `img_historia`, `politica`, `compromiso`, `id_carousel`, `mision`, `vision`) VALUES
(1, '“No pretendamos que las cosas cambien, si siempre hacemos lo mismo”.\n\nAlbert Einstein.', 'Somos una empresa, liderada por dos profesionales en la salud, Especialistas en Ingeniería Biomédica, con 14 años de experiencia en tecnología y dispositivos médicos; en el rubro de aplicación y desarrollo clinico en terapias endovasculares tales como: \nCardio intervención\nNeuro intervención\nVascular Periférico \nControl y Manejo del ritmo cardiaco', 'https://tecnomedica-sv.com/administracion/assets/upload/historia/historia1707761680.jpg', ' mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ip\r\n', ' mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ip', 1, 'Nuestra misión es, evolucionar junto a la tecnología médica, y ser especialistas en distribuirla y aplicarla, ser pioneros en nuestro país, ofreciendo equipos y dispositivos con la más alta calidad y al acceso de todos nuestros pacientes. ', 'Crecer en el mercado Salvadoreño y ser la primera opción, para nuestros clientes, médicos y pacientes en tecnología médica, así mismo ser una opción de primera calidad en el mercado de dispositivos médicos,  manteniendo los valores que nos caracterizan, Honradez, lealtad y ética profesional \n\n ');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `marca` text DEFAULT NULL,
  `fotomarca` text DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT '1 == activo, 0 inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`idmarca`, `marca`, `fotomarca`, `estado`) VALUES
(31, 'HOSMED ', 'https://tecnomedica-sv.com/administracion//assets/upload/1657217869.png', 0),
(33, 'SHUNMEII', 'https://tecnomedica-sv.com/administracion//assets/upload/1662692895.png', 0),
(34, 'TECNOMEDICA', 'https://tecnomedica-sv.com/administracion//assets/upload/1662765412.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fotografia` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `destacado` int(11) NOT NULL DEFAULT 0 COMMENT '0 no destacado, 1 destacado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `fotografia`, `id_categoria`, `id_marca`, `descripcion`, `destacado`) VALUES
(66, 'PTCA Guide WireWorkhorse', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662765749.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl cable guía PTCA se suministra estéril, no pirogénico y está diseñado para un solo uso. El dispositivo es un cable guía orientable disponible en varias longitudes y diámetros. La punta distal se puede moldear o, como opción, hay disponible una punta angulada para algunas familias de alambres. Consulte la etiqueta del producto para conocer las especificaciones del producto (p. ej., longitud del alambre, diámetro, punta distal y longitud de radiopacidad de la punta).', 1),
(67, 'PTCA Guide WireCTO', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662766312.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl cable guía PTCA se suministra estéril, no pirogénico y está diseñado para un solo uso. El dispositivo es un cable guía orientable disponible en varias longitudes y diámetros. La punta distal se puede moldear o, como opción, hay disponible una punta angulada para algunas familias de alambres. Consulte la etiqueta del producto para conocer las especificaciones del producto (p. ej., longitud del alambre, diámetro, punta distal y longitud de radiopacidad de la punta).', 1),
(68, 'Hydrophilic Coated Guide Wire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662766424.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl alambre guía con recubrimiento hidrofílico se suministra estéril, no pirogénico y está diseñado para un solo uso. los\nEl dispositivo está construido a partir de un cable de núcleo metálico orientable de alta calidad con un revestimiento de polímero que utiliza un\nsofisticado proceso de construcción. Se aplica un revestimiento hidrofílico sobre la cubierta de polímero radiopaco.', 1),
(69, 'Coronary Microcatheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662766606.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl microcatéter consiste en el conector del catéter, el alivio de tensión, el cuerpo principal, el revestimiento hidrofílico y el marcador radiopaco. La sección proximal semirrígida pasa a una punta distal flexible y blanda para facilitar el acceso superselectivo del microcatéter al vaso distal y el cruce de lesiones complejas. La construcción trenzada de capa intermedia de acero inoxidable proporciona soporte para el cable guía para mejorar la capacidad de empuje. El marcador radiopaco en el extremo distal facilita significativamente la visualización fluoroscópica. La superficie exterior del microcatéter está recubierta con un polímero hidrofílico para aumentar la lubricidad. Se utiliza una conexión luer en el conector del microcatéter para conectar los accesorios. También se incluye un mandril moldeador, mientras que una jeringa y una válvula hemostática Y son opcionales.', 1),
(70, 'Angiographic Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662766876.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl Catéter Angiográfico es un dispositivo estéril, de un solo uso, apirógeno y desechable que está diseñado\npara proporcionar una vía para administrar medios de contraste a sitios seleccionados en el sistema vascular. Este dispositivo\nconsiste en el centro del catéter, el alivio de tensión, el cuerpo principal, la punta intermedia y la punta blanda', 1),
(71, 'Guiding Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662766972.png', 9, 34, 'DESCRIPCIÓN DEL APARATO\nEl catéter guía es un dispositivo estéril, de un solo uso, apirógeno y desechable que está diseñado para\nproporcionar una vía a través de la cual se introducen dispositivos terapéuticos y de diagnóstico. El dispositivo consiste\ndel conector del catéter, alivio de tensión, segmento proximal, segmento medio, segmento distal y punta blanda', 0),
(72, 'PTCA Balloon Dilatation Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662767233.png', 9, 34, 'El catéter con globo PTCA es un globo semi-dócil con punta biselada y perfil de entrada bajo. El diseño de la punta, junto con el revestimiento hidrofílico y un eje innovador que se puede torcer, permite una orientación precisa de la punta para cruzar lesiones complejas y puntales de stent.', 0),
(73, 'NC Coronary Dilatation Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662767630.png', 9, 34, 'El catéter de dilatación coronaria NC está diseñado para permitir un fácil intercambio del\ncatéter utilizando una guía de 0,014 pulgadas de longitud estándar. Los diámetros de los globos van desde\n1,5 mm a 5,0 mm. El material del globo está hecho de un material mínimamente compatible y\nLos globos tienen una presión de explosión nominal de 22 atmósferas cuando el diámetro se ubica entre\n1,50 mm y 4,00 mm y una presión de explosión nominal de 20 atm cuando el diámetro está entre 4,50 mm y 5,00 mm. El material mínimamente dócil permite alta presión\ndilatación manteniendo un control preciso del diámetro y la longitud del balón.', 0),
(74, 'Coronary Drug Coating Balloon Dilatation Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662767696.png', 9, 34, 'Coronary Drug Coating Balloon Dilatation Catheter', 0),
(75, 'PTFE Coated Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662767813.png', 9, 34, 'La guía recubierta de PTFE es aplicable como dispositivo médico invasivo. está destinado\npara guiar y asistir la inserción del catéter percutáneo.', 0),
(76, 'Introducer Sets', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662767875.png', 9, 34, 'El conjunto introductor es un dispositivo de un solo uso que permite la introducción,\nmanipulación y extracción de los cables de estimulación después\nla entrada percutánea se obtiene con una aguja.', 0),
(77, 'Balloon Inflation Devices', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768041.png', 9, 34, 'Los productos se utilizan principalmente en la operación de PTCA, el catéter de dilatación con balón se presuriza con el fin de lograr la expansión de los vasos sanguíneos o permanecer en el Propósito del stent intravascular.', 0),
(78, 'Hemostasis Valve SetPushclick type', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768270.png', 9, 34, 'El tipo de válvula de hemostasia incluye conector tipo Y de clic sin línea o con línea (25 cm o 50 cm), y el par y la inserción pueden estar contenidos o no.', 0),
(79, 'Hemostasis Valve SetPushpull type', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768462.png', 9, 34, 'Efecto intervencionista sobre la eliminación intravascular y comprobar el cable guía o como el instrumento de diagnostico', 0),
(80, 'TRClosure Band', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768611.png', 9, 34, 'TR-closure Band es un equipo auxiliar utilizado para la hemostasia de opresión de la arteria radial después de la cirugía intervencionista de punción de la arteria radial.', 0),
(81, 'Manifold Kit', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768771.png', 9, 34, '1 pc 500PSI three-way right off manifold+\n1 pc 12ml control syringe+\n1 pc connecting tube+\n1 pc infusion set+1 pc spice line', 0),
(82, 'Manifolds', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662768972.png', 9, 34, 'Aplicable al auxiliar del sistema cardiovascular.\nse transporta en el catéter percutáneo.', 0),
(83, 'Dose Control Syringe', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769049.png', 9, 34, 'La jeringa de control de dosis es inyección de angiocardiografía de contraste, catéter de termodilución de inyección líquida o entrada de otro líquido/medio o fármaco.', 0),
(84, 'Disposable Pressure Transducers', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769183.png', 9, 34, 'El transductor de presión desechable está destinado a convertir la onda hemodinámica del catéter del paciente, a través\nsensor de presión integrado, en señales eléctricas que\npuede visualizarse usando un equipo de monitoreo separado.', 0),
(85, 'Angiographic Syringe', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769258.png', 9, 34, 'Jeringa angiográfica se utiliza para cada parte de todo el cuerpo de angiografía y tomografía computarizada mejorada y tomografía computarizada vascular.', 0),
(86, 'Shun Syncess  Neural Micro Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769366.png', 10, 34, 'Micro Guidewire es un dispositivo estéril, de un solo uso, apirógeno y desechable. El dispositivo consta de micro guía, herramienta de inserción, torque y componentes protectores que contienen tubo de bobina, tres palancas clips, clip suave y cierre Luer. De acuerdo con diferentes estructuras, el Micro Guidewire se divide en serie MGW, MGWN, MGWNA, MGWNB, MGWNC, MGWND. Todas las series están equipadas opcionalmente con torquer y herramienta de inserción', 0),
(87, 'Shun Tranpass  Neural Micro Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769632.png', 10, 34, 'Micro Guidewire es un dispositivo estéril, de un solo uso, apirógeno y desechable. El dispositivo consta de micro guía, herramienta de inserción, torque y componentes protectores que contienen tubo de bobina, tres palancas\nclips, clip suave y cierre Luer. De acuerdo con diferentes estructuras, el Micro Guidewire se divide en serie MGW, MGWN, MGWNA, MGWNB, MGWNC, MGWND. Todas las series están equipadas opcionalmente con torquer y herramienta de inserción', 0),
(88, 'Shun Traverse Neural Micro Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662769997.png', 10, 34, 'Micro Guidewire es un dispositivo estéril, de un solo uso, apirógeno y desechable. El dispositivo consta de micro guía, herramienta de inserción, torque y componentes protectores que contienen tubo de bobina, tres palancas clips, clip suave y cierre Luer. De acuerdo con diferentes estructuras, el Micro Guidewire se divide en serie MGW, MGWN, MGWNA, MGWNB, MGWNC, MGWND. Todas las series están equipadas opcionalmente\ncon torquer y herramienta de inserción', 0),
(89, 'Neural Microcatheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662770116.png', 10, 34, 'El microcatéter es un catéter de una sola luz diseñado para introducirse sobre una guía orientable para acceder a vasos pequeños y tortuosos. El proximal semirrígido\nla sección pasa a una punta distal flexible para facilitar el avance a través de los vasos. Los marcadores radiopacos duales en el extremo distal facilitan la visualización fluoroscópica. La superficie exterior del Microcatéter está recubierta con un polímero hidrofílico para aumentar la lubricidad. Se utiliza una conexión luer en el conector del microcatéter para conectar accesorios. También se incluye un mandril moldeador, mientras que una jeringa y una válvula Yhemostasis son opcionales.', 0),
(90, 'Neuro Balloon Dilatation Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662770223.png', 10, 34, 'Excelente capacidad de cruce: el diseño de la pared delgada del globo y la punta suave proporcionan una excelente capacidad de cruce después del plegado del globo y un diámetro exterior de entrada mínimo de 0,016', 0),
(91, 'Balloon Guide Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662770327.png', 10, 34, 'BGC: control del flujo sanguíneo proximal, aspiración proximal y aspiración distal\n\nAlta eficiencia: mejora la recanalización vascular-alta eficiencia\n\nSeguridad: Reduce el riesgo de escape de trombos bajo\n\nRápido: Reduzca el número de veces de trombectomía - ahorre tiempo', 0),
(92, 'Aspiration catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662770459.png', 10, 34, 'Estructura segmentada de varios niveles, fuerte soporte proximal, sección de transición suave, transmisión de torsión suave, diseñada con una sección suave en el extremo distal, excelente capacidad de cruce y se puede colocar en la ubicación de la lesión más lejana;\n\nDiseño de lumen interior grande, compatible con más dispositivos y proporciona una mayor fuerza de aspiración;\n\nResorte en espiral de níquel-titanio y diseño de trenzado de acero inoxidable, resistencia a la torsión y resistencia a la ovalización del lumen interno', 0),
(93, 'Central Venous Catheter Kit', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662774532.png', 14, 34, 'El kit de catéter venoso central es un dispositivo estéril, de un solo uso, apirógeno y desechable que está fabricado\npara el uso de infusión intravenosa (de drogas o soluciones), muestreo de sangre, monitoreo venoso central. Este\nEl dispositivo consta de 9 partes si se incluye el material de embalaje interno: el catéter venoso central, bisturí,\naguja introductora, alambre guía, dilatador, jeringa, abrazadera de catéter, capuchón de inyección, embalaje interior material (bandeja de plástico). El catéter venoso central con luz diferente es shFoigwunrein2', 0),
(94, 'Hemodialysis Catheter Kit', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662774701.png', 14, 34, 'Los kits de catéteres para hemodiálisis contienen un catéter para hemodiálisis, una aguja introductora, un cable guía, una tijera, un bisturí y una tapa de inyección.', 0),
(95, 'Disposable Pressure Transducer', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662774906.png', 14, 34, 'El transductor de presión desechable está destinado a convertir la onda hemodinámica del catéter del paciente, a través sensor de presión integrado, en señales eléctricas que puede visualizarse usando un equipo de monitoreo separado.', 0),
(96, 'Angiographic Syringe', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662775095.png', 14, 34, 'Jeringa angiográfica se utiliza para cada parte de todo el cuerpo de angiografía y tomografía computarizada mejorada y tomografía computarizada vascular.', 0),
(97, 'Zebra Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662775266.png', 14, 34, 'El cable guía Zebra está diseñado para uso conjunto con stent ureteral y percutáneo. \nJuegos de nefrostomía bajo el endoscopio. y desempeñar un papel de apoyo y guía.', 0),
(98, 'Nitinol Guide Wire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662775365.png', 14, 34, 'El alambre guía (alambre guía de acero inoxidable y alambre guía de Nitinol) es aplicable como un médico invasivo dispositivos. Está diseñado para guiar y asistir la inserción del catéter percutáneo.', 0),
(99, 'Peripheral Guidewire', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662811572.png', 15, 34, 'Peripheral Guidewire es un dispositivo estéril, de un solo uso, apirógeno y desechable. elperiférico Guidewire está diseñado para facilitar la colocación y el intercambio de dispositivos de diagnóstico y terapéuticos durante los procedimientos intravasculares, y el dispositivo está diseñado para uso vascular periférico únicamente', 0),
(100, 'Peripheral Microcatheter Shun Thros', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662811685.png', 15, 34, 'El microcatéter consiste en el conector del catéter, el alivio de tensión, el cuerpo principal, el revestimiento hidrofílico y los marcadores radiopacos. El tubo del catéter se ablanda gradualmente desde el extremo proximal hasta el extremo distal. Cuando el extremo proximal está suficientemente soportado, la punta ahusada puede abrir el vaso sanguíneo bloqueado, ayudando así a que el cable guía pase a través del vaso sanguíneo complicado o calcificado. Los marcadores radiopacos en el extremo distal facilitan significativamente la visualización fluoroscópica. La superficie exterior del microcatéter está recubierta con un polímero hidrofílico para aumentar la lubricidad. El accesorio Aluer en el conector del microcatéter se utiliza para la conexión de accesorios. También se incluye un mandril moldeador, mientras que una jeringa y una válvula hemostática Y son opcionales.', 0),
(101, 'Peripheral Microcatheter Shun Ropeway', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662811782.png', 15, 34, 'El microcatéter consiste en el conector del catéter, el alivio de tensión, el cuerpo principal, el revestimiento hidrofílico y los marcadores radiopacos. La sección proximal semirrígida pasa a una punta distal flexible y blanda para facilitar el acceso superselectivo del microcatéter al vaso distal. El gran lumen interno permite una administración fácil y suave de agentes embólicos y viscosos de alto flujo. Los marcadores radiopacos en el extremo distal facilitan significativamente la visualización fluoroscópica. La superficie exterior del Microcatéter está recubierta con un polímero hidrofílico para aumentar la lubricidad. El accesorio Aluer en el conector del microcatéter se utiliza para la conexión de accesorios. También se incluye un mandril moldeador, mientras que una jeringa y una válvula hemostática en Y son opcionales.', 0),
(102, 'PTA Balloon Dilatation Catheter', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1662811975.png', 15, 34, 'Excelente capacidad de cruce: el diseño de la pared delgada del globo y la punta cónica suave brindan una excelente capacidad de cruce después del plegado del globo, al tiempo que minimizan el daño a la pared del vaso sanguíneo;\n\nBuen rendimiento de plegado: el diseño de plegado de 3 o 5 secciones proporciona una excelente trazabilidad de los productos de globos después del plegado;\n\nDiseño especial del cuerpo del globo: el cuerpo del globo está diseñado mediante procedimientos especiales, que pueden tener en cuenta la alta presión de explosión y la capacidad de entrega suave, y el fuerte cuerpo del globo puede garantizar el paso a través de lesiones calcificadas complejas. Al mismo tiempo, puede garantizar varios presurización repetida sin ruptura, para garantizar la seguridad;', 0),
(103, 'Aspirador De Secreciones Automática', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1663448977.png', 16, 34, 'Es un dispositivo que, mediante succión por presión negativa a través de una sonda, aspira y limpia de secreciones, sangre u otros materiales las vías respiratorias altas. \n\nIdeal para pacientes a quienes se les dificulta mantener la vía aérea limpia, de secreciones u otras sustancias que comprometan la ventilación.', 0),
(104, 'Aspirador De Secreciones Manual', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1663449256.png', 16, 34, 'Un aspirador de secreciones manual, es de fácil uso, portátil, estable y compacto, que genera un vacío suficiente para succionar secreciones de un paciente a quien se le dificulta mantener la vía aérea limpia y libre de obstrucción.', 0),
(105, 'Concentrador De Oxigeno ', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1663449516.png', 16, 34, 'Es un equipo que contienen tres funciones en uno solo, es decir cumple con las siguientes funciones: \n<br>\n<b>Un concentrador de oxígeno</b> es un dispositivo médico que extrae aire del medio ambiente y lo hace pasar por tamices moleculares para concentrar el oxígeno hasta alcanzar concentraciones terapéuticas para administrarlo al paciente.<br>\n<b>Un nebulizador</b> convierte el medicamento líquido en un vapor muy fino que una persona puede inhalar a través de una mascarilla facial o boquilla. Tomar el medicamento de esta manera permite que llegue directamente a los pulmones y al sistema respiratorio en donde se requiere.<br>\n<b>El saturómetro</b> es un pequeño dispositivo digital, que nos ayuda a medir la cantidad de oxígeno que posee nuestra sangre\n', 0),
(106, 'Bomba de infusión', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1663521495.png', 16, 34, 'La bomba de infusión es un sistema para administrar fármacos directamente a la sangre del paciente, administran fluidos, medicación o nutrientes en el sistema circulatorio del paciente, incluso puede administrar líquidos que de otra manera podrían ser bastante difíciles o impracticables si se realizaran manualmente por personal de enfermería. Por ejemplo, pueden administrar dosis tan pequeñas como inyecciones de 0.1 mL por hora (demasiado pequeñas para un gotero), cuyos volúmenes varían con el tiempo a lo largo del día.', 0),
(107, 'Bomba de nutrición enteral', 'https://tecnomedica-sv.com/administracion//assets/upload/productos/1663521626.png', 16, 34, 'La bomba de nutrición enteral es un instrumento electrónico que permite regular de forma exacta y automática la velocidad de infusión (número de gotas por minutos).\n<br>\nCuenta con un sistema de alarmas que avisa cuando se producen problemas (obstrucción, vaciado del envase, etc.). Se conecta un tubo de plástico (sistema de administración) al envase de la fórmula nutricional, primero con la bomba y después con la sonda.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `usuario` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `id_rol`, `usuario`) VALUES
(1, 'Jaime Palacios', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'jpalacios'),
(16, 'Jhonny Pineda', '2e02abf562a67b9ec10abd77316aad88', 1, 'jpineda'),
(20, 'Moisés Moreno', '685c9018a1dec70f2448c11786fec701', NULL, 'mmoreno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandeja`
--
ALTER TABLE `bandeja`
  ADD PRIMARY KEY (`id_bandeja`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`),
  ADD KEY `id_carousel` (`id_carousel`),
  ADD KEY `lema1` (`lema1`),
  ADD KEY `sublema1` (`sublema1`),
  ADD KEY `lema2` (`lema2`),
  ADD KEY `sublema2` (`sublema2`),
  ADD KEY `lema3` (`lema3`),
  ADD KEY `sublema3` (`sublema3`),
  ADD KEY `carousel1` (`carousel1`),
  ADD KEY `carousel2` (`carousel2`),
  ADD KEY `carousel3` (`carousel3`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `descripcion` (`descripcion`),
  ADD KEY `fotografia` (`fotografia`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentarios`),
  ADD KEY `comentarios_ibfk_1` (`id_producto`);

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contactos`),
  ADD KEY `id_contactos` (`id_contactos`),
  ADD KEY `correo` (`correo`),
  ADD KEY `direccion` (`direccion`),
  ADD KEY `telefono` (`telefono`),
  ADD KEY `celular` (`celular`);

--
-- Indexes for table `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id_index`),
  ADD KEY `id_carousel_idx` (`id_carousel`),
  ADD KEY `frase` (`frase`),
  ADD KEY `img` (`img_historia`),
  ADD KEY `id_carousel` (`id_carousel`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`),
  ADD KEY `idmarca` (`idmarca`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `fotografia` (`fotografia`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `nombre` (`nombre`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `password` (`password`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandeja`
--
ALTER TABLE `bandeja`
  MODIFY `id_bandeja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Constraints for table `inicio`
--
ALTER TABLE `inicio`
  ADD CONSTRAINT `id_carousel` FOREIGN KEY (`id_carousel`) REFERENCES `carousel` (`id_carousel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`idmarca`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
