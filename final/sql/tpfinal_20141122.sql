-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2014 a las 21:32:19
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tpfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE IF NOT EXISTS `aeropuerto` (
  `codAeropuerto` varchar(4) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `nombreAeropuerto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aeropuerto`
--

INSERT INTO `aeropuerto` (`codAeropuerto`, `ciudad`, `provincia`, `nombreAeropuerto`) VALUES
('SAAC', 'Concordia', 'Entre R&iacute;os', 'Aeropuerto Comodoro Pierrestegui'),
('SAAJ', 'Jun&iacute;n', 'Buenos Aires', 'Aeropuerto de Jun&iacute;n'),
('SAAK', 'Isla Mart&iacute;n Garc&iacute', 'Buenos Aires', 'Aeropuerto Isla Mart&iacute;n Garc&iacute;a'),
('SAAP', 'Paran&aacute;', 'Entre R&iacute;os', 'Aeropuerto General Justo Jos&eacute; de Urquiza'),
('SAAR', 'Rosario', 'Santa Fe', 'Aeropuerto Internacional Rosario Islas Malvinas'),
('SAAU', 'Villaguay', 'Entre R&iacute;os', 'Aeropuerto de Villaguay'),
('SAAV', 'Sauce Viejo', 'Santa Fe', 'Aeropuerto de Sauce Viejo'),
('SABE', 'Buenos Aires', 'CABA', 'Aeroparque Jorge Newbery'),
('SACC', 'La Cumbre', 'C&oacute;rdoba', 'Aeropuerto La Cumbre'),
('SACO', 'C&oacute;rdoba', 'C&oacute;rdoba', 'Aeropuerto Internacional Ingeniero Ambrosio Taravella'),
('SACP', 'Chepes', 'La Rioja', 'Aeropuerto Chepes'),
('SACT', 'Chamical', 'La Rioja', 'Aeropuerto Gobernador Gordillo'),
('SADD', 'Don Torcuato', 'Buenos Aires', 'Aer&oacute;dromo de Don Torcuato(Cerrado)'),
('SADF', 'San Fernando', 'Buenos Aires', 'Aeropuerto Internacional de San Fernando'),
('SADJ', 'Jos&eacute; C. Paz', 'Buenos Aires', 'Aeropuerto Mariano Moreno'),
('SADL', 'La Plata', 'Buenos Aires', 'Aeropuerto de La Plata'),
('SADM', 'Mor&oacute;n', 'Buenos Aires', 'Aeropuerto de Mor&oacute;n'),
('SADO', 'Campo de Mayo', 'Buenos Aires', 'Aer&oacute;dromo de Campo de Mayo'),
('SADP', 'El Palomar', 'Buenos Aires', 'Aeropuerto El Palomar'),
('SADS', 'San Justo', 'Buenos Aires', 'Aeropuerto de San Justo'),
('SAEM', 'Miramar', 'Buenos Aires', 'Aer&oacute;dromo Juan Domingo Per&oacute;n'),
('SAEZ', 'Ezeiza', 'Buenos Aires', 'Aeropuerto Internacional Ministro Pistarini'),
('SAFS', 'Sunchales', 'Santa Fe', 'Aeropuerto de Sunchales'),
('SAHE', 'Caviahue', 'Neuqu&eacute;n', 'Aeropuerto de Caviahue'),
('SAHR', 'General Roca', 'Rio Negro', 'Aeropuerto de General Roca'),
('SAHZ', 'Zapala', 'Neuqu&eacute;n', 'Aeropuerto de Zapala'),
('SAMA', 'General Alvear', 'Mendoza', 'Aeropuerto de General Alvear'),
('SAME', 'Mendoza', 'Mendoza', 'Aeropuerto Internacional El Plumerillo'),
('SAMM', 'Malarg&uuml;e', 'Mendoza', 'Aeropuerto Internacional Comodoro Ricardo Salom&oacute;n'),
('SAMR', 'San Rafael', 'Mendoza', 'Aeropuerto Internacional Suboficial Ayudante Santiago Germano'),
('SANC', 'San Fernando del Valle de Cata', 'Catamarca', 'Aeropuerto Coronel Felipe Varela'),
('SANE', 'Santiago del Estero', 'Santiago del Estero', 'Aeropuerto Vicecomodoro &aacute;ngel de la Paz Aragon&eacute;s'),
('SANL', 'La Rioja', 'La Rioja', 'Aeropuerto Capit&aacute;n Vicente Almandos Amonacide'),
('SANO', 'Chilecito', 'La Rioja', 'Aeropuerto Chilecito'),
('SANR', 'Termas de R&iacute;o Hondo', 'Santiago del Estero', 'Aeropuerto Internacional Termas de R&iacute;o Hondo'),
('SANT', 'San Miguel de Tucum&aacute;n', 'Tucum&aacute;n', 'Aeropuerto Internacional Teniente General Benjam&iacute;n Matienzo'),
('SANU', 'San Juan', 'San Juan', 'Aeropuerto Domingo Faustino Sarmiento'),
('SANW', 'Ceres', 'Santa Fe', 'Aeropuerto Ceres'),
('SAOC', 'R&iacute;o Cuarto', 'C&oacute;rdoba', 'Aeropuerto de R&iacute;o Cuarto'),
('SAOD', 'Villa Dolores', 'C&oacute;rdoba', 'Aeropuerto de Villa Dolores'),
('SAOL', 'Laboulaye', 'C&oacute;rdoba', 'Aer&oacute;dromo de Laboulaye'),
('SAOR', 'Villa Reynolds', 'San Luis', 'Aeropuerto de Villa Reynolds'),
('SAOS', 'Merlo', 'San Luis', 'Aeropuerto Internacional Valle del Conlara'),
('SAOU', 'San Luis', 'San Luis', 'Aeropuerto Brigadier Mayor Cesar Ra&uacute;l Ojeda'),
('SARC', 'Corrientes', 'Corrientes', 'Aeropuerto Internacional Doctor Fernando Piragine Niveyro'),
('SARE', 'Resistencia', 'Chaco', 'Aeropuerto Internacional de Resistencia'),
('SARF', 'Formosa', 'Formosa', 'Aeropuerto Internacional de Formosa'),
('SARI', 'Puerto Iguaz&uacute;', 'Misiones', 'Aeropuerto Internacional de Puerto Iguaz&uacute;'),
('SARL', 'Paso de los Libres', 'Corrientes', 'Aeropuerto Internacional de Paso de los Libres'),
('SARM', 'Monte Caseros', 'Corrientes', 'Aeropuerto de Monte Caseros'),
('SARP', 'Posadas', 'Misiones', 'Aeropuerto Internacional Libertador General Jos&eacute; de San Mart&iacute;n'),
('SASA', 'Salta', 'Salta', 'Aeropuerto Internacional Mart&iacute;n Miguel de G&uuml;emes'),
('SASJ', 'Perico', 'Jujuy', 'Aeropuerto Internacional Gobernador Horacio Guzm&aacute;n'),
('SASO', 'San Ram&oacute;n de la Nueva O', 'Salta', 'Aero Club Or&aacute;n'),
('SAST', 'Tartagal', 'Salta', 'Aeropuerto de Tartagal'),
('SATC', 'Clorinda', 'Formosa', 'Aeropuerto Clorinda'),
('SATK', 'Las Lomitas', 'Formosa', 'Aer&oacute;dromo Alferez Armando Rodr&iacute;guez'),
('SATR', 'Reconquista', 'Santa Fe', 'Aeropuerto Daniel Jurkic'),
('SATU', 'Curuz&uacute; Cuati&aacute;', 'Corrientes', 'Aeropuerto de Curuz&uacute; Cuati&aacute;'),
('SAVB', 'El Bols&oacute;n', 'Rio Negro', 'Aeropuerto de El Bolson'),
('SAVC', 'Comodoro Rivadavia', 'Chubut', 'Aeropuerto Internacional General Enrique Mosconi'),
('SAVE', 'Esquel', 'Chubut', 'Aeropuerto Brigadier General Antonio Parodi'),
('SAVH', 'Las Heras', 'Santa Cruz', 'Aeropuerto Las Heras'),
('SAVJ', 'Ingeniero Jacobacci', 'R&iacute;o Negro', 'Aeropuerto de Ingeniero Jacobacci'),
('SAVR', 'Alto R&iacute;o Senguer', 'Chubut', 'Aeropuerto Alto R&iacute;o Senguer'),
('SAVT', 'Trelew', 'Chubut', 'Aeropuerto Almirante Marco Andr&eacute;s Zar'),
('SAVV', 'Viedma', 'R&iacute;o Negro', 'Aeropuerto Gobernador Edgardo Castello'),
('SAVY', 'Puerto Madryn', 'Chubut', 'Aeropuerto El Tehuelche'),
('SAWA', 'El Calafate', 'Santa Cruz', 'Aeropuerto de Lago Argentino(Cerrado)'),
('SAWC', 'El Calafate', 'Santa Cruz', 'Aeropuerto Comandante Armando Tola'),
('SAWD', 'Puerto Deseado', 'Santa Cruz', 'Aeropuerto Puerto Deseado'),
('SAWE', 'R&iacute;o Grande', 'Tierra del Fuego', 'Aeropuerto Internacional Gob. Ram&oacute;n Trejo Noel'),
('SAWG', 'R&iacute;o Gallegos', 'Santa Cruz', 'Aeropuerto Internacional Piloto Civil Norberto Fern&aacute;ndez'),
('SAWH', 'Ushuaia', 'Tierra del Fuego', 'Aeropuerto de Ushuaia'),
('SAWJ', 'Puerto San Juli&aacute;n', 'Santa Cruz', 'Aeropuerto Capit&aacute;n Jos&eacute; Daniel V&aacute;zquez'),
('SAWP', 'Perito Moreno', 'Santa Cruz', 'Aeropuerto Perito Moreno'),
('SAWT', 'R&iacute;o Turbio', 'Santa Cruz', 'Aeropuerto R&iacute;o Turbio'),
('SAWU', 'Puerto Santa Cruz', 'Santa Cruz', 'Aeropuerto de Puerto Santa Cruz'),
('SAZA', 'Azul', 'Buenos Aires', 'Aeropuerto de Azul'),
('SAZB', 'Bah&iacute;a Blanca', 'Buenos Aires', 'Aeropuerto Comandante Espora'),
('SAZC', 'Coronel Su&aacute;rez', 'Buenos Aires', 'Aeropuerto Brigadier Hector Eduardo Ruiz'),
('SAZD', 'Dolores', 'Buenos Aires', 'Aer&oacute;dromo de Dolores'),
('SAZF', 'Olavarr&iacute;a', 'Buenos Aires', 'Aeropuerto de Olavarr&iacute;a'),
('SAZG', 'General Pico', 'La Pampa', 'Aeropuerto de General Pico'),
('SAZH', 'Tres Arroyos', 'Buenos Aires', 'Aeropuerto Municipal Primer Teniente H&eacute;ctor Ricardo Volponi'),
('SAZI', 'Bol&iacute;var', 'Buenos Aires', 'Aeropuerto de Bol&iacute;var'),
('SAZL', 'Santa Teresita', 'Buenos Aires', 'Aeropuerto de Santa Teresita'),
('SAZM', 'Mar del Plata', 'Buenos Aires', 'Aeropuerto Internacional Astor Piazolla'),
('SAZN', 'Neuqu&eacute;n', 'Neuqu&eacute;n', 'Aeropuerto Internacional Presidente Per&oacute;n'),
('SAZO', 'Necochea', 'Buenos Aires', 'Aeropuerto Edgardo Hugo Yelpo'),
('SAZP', 'Pehuaj&oacute;', 'Buenos Aires', 'Aeropuerto Comodoro P. Zanni'),
('SAZR', 'Santa Rosa', 'La Pampa', 'Aeropuerto de Santa Rosa'),
('SAZS', 'Bariloche', 'R&iacute;o Negro', 'Aeropuerto Internacional Teniente Luis Candelaria'),
('SAZT', 'Tandil', 'Buenos Aires', 'Aeropuerto de Tandil'),
('SAZV', 'Villa Gesell', 'Buenos Aires', 'Aeropuerto de Villa Gesell'),
('SAZW', 'Cutral-Co', 'Neuqu&eacute;n', 'Aeropuerto de Cutral-Co'),
('SAZY', 'San Mart&iacute;n de los Andes', 'Neuqu&eacute;n', 'Aeropuerto Aviador Carlos Campos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE IF NOT EXISTS `avion` (
  `codAvion` varchar(6) NOT NULL,
  `tipoAvion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`codAvion`, `tipoAvion`) VALUES
('LV-ABC', 1),
('LV-ALU', 1),
('LV-IRY', 1),
('LV-LEO', 1),
('LV-TIO', 1),
('LV-XXX', 1),
('LV-ZRW', 1),
('LV-BZW', 2),
('LV-CDV', 2),
('LV-DEF', 2),
('LV-HCR', 2),
('LV-JUL', 2),
('LV-WIZ', 2),
('LV-ZZA', 2),
('LV-CNN', 3),
('LV-MAM', 3),
('LV-MLT', 3),
('LV-OPW', 3),
('LV-WRZ', 3),
('LV-ERT', 4),
('LV-PEP', 4),
('LV-PJD', 4),
('LV-TVR', 4),
('LV-UFO', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencias`
--

CREATE TABLE IF NOT EXISTS `frecuencias` (
  `codFrecuencia` int(3) NOT NULL,
  `origen` varchar(4) NOT NULL,
  `destino` varchar(4) NOT NULL,
  `tipoAvion` int(1) NOT NULL,
  `primera` float NOT NULL,
  `economy` float NOT NULL,
  `dias` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `frecuencias`
--

INSERT INTO `frecuencias` (`codFrecuencia`, `origen`, `destino`, `tipoAvion`, `primera`, `economy`, `dias`) VALUES
(1, 'SAVR', 'SAZY', 3, 1464.93, 1191, '1110000'),
(2, 'SAZA', 'SAZW', 2, 2258.28, 1836, '0110001'),
(3, 'SAZB', 'SAZV', 1, 3071.31, 2497, '0110111'),
(4, 'SAZS', 'SAZT', 4, 2658.03, 2161, '0000010'),
(5, 'SAZI', 'SAZS', 3, 1510.44, 1228, '0001101'),
(6, 'SADO', 'SAZP', 2, 1190.64, 968, '0000110'),
(7, 'SAHE', 'SAZO', 3, 1575.63, 1281, '0100100'),
(8, 'SANW', 'SAZN', 2, 2564.55, 2085, '1101000'),
(9, 'SACT', 'SAZM', 3, 2036.88, 1656, '0111001'),
(10, 'SACP', 'SAZL', 2, 2437.86, 1982, '0110010'),
(11, 'SANO', 'SAZI', 1, 1136.52, 924, '0110000'),
(12, 'SATC', 'SAZH', 4, 2592.84, 2108, '1000101'),
(13, 'SAVC', 'SAZG', 2, 1125.45, 915, '1110011'),
(14, 'SACO', 'SAZF', 2, 1453.86, 1182, '1111101'),
(15, 'SAAC', 'SAZD', 2, 1952.01, 1587, '1011110'),
(16, 'SAZC', 'SAZC', 2, 1923.72, 1564, '0111101'),
(17, 'SARC', 'SAZB', 3, 3046.71, 2477, '1110011'),
(18, 'SATU', 'SAZA', 4, 3063.93, 2491, '1111100'),
(19, 'SAZW', 'SAWU', 1, 1912.65, 1555, '1001111'),
(20, 'SAZD', 'SAWT', 3, 3014.73, 2451, '0110000'),
(21, 'SADD', 'SAWP', 3, 2167.26, 1762, '1001101'),
(22, 'SAVB', 'SAWJ', 2, 2846.22, 2314, '0110001'),
(23, 'SAWC', 'SAWH', 4, 2043.03, 1661, '1001011'),
(24, 'SAWA', 'SAWG', 3, 1619.91, 1317, '1000111'),
(25, 'SADP', 'SAWE', 1, 2776.11, 2257, '0011110'),
(26, 'SAVE', 'SAWD', 3, 2485.83, 2021, '1001100'),
(27, 'SAEZ', 'SAWC', 1, 2377.59, 1933, '0111011'),
(28, 'SARF', 'SAWA', 3, 1168.5, 950, '0010110'),
(29, 'SAMA', 'SAVY', 1, 1495.68, 1216, '0100010'),
(30, 'SAZG', 'SAVV', 2, 2393.58, 1946, '1011011'),
(31, 'SAHR', 'SAVT', 2, 2323.47, 1889, '1101001'),
(32, 'SAVJ', 'SAVR', 2, 1091.01, 887, '0010111'),
(33, 'SAAK', 'SAVJ', 4, 1391.13, 1131, '1110010'),
(34, 'SADJ', 'SAVH', 1, 1122.99, 913, '1000001'),
(35, 'SAAJ', 'SAVE', 4, 2860.98, 2326, '0001011'),
(36, 'SAOL', 'SAVC', 4, 1606.38, 1306, '0111010'),
(37, 'SACC', 'SAVB', 2, 2116.83, 1721, '0001100'),
(38, 'SADL', 'SATU', 3, 2682.63, 2181, '1000011'),
(39, 'SANL', 'SATR', 2, 2239.83, 1821, '1101101'),
(40, 'SAVH', 'SATK', 2, 2405.88, 1956, '1011011'),
(41, 'SATK', 'SATC', 4, 2717.07, 2209, '1110110'),
(42, 'SAMM', 'SAST', 1, 2702.31, 2197, '1011111'),
(43, 'SAZM', 'SASO', 1, 1670.34, 1358, '0100000'),
(44, 'SAME', 'SASJ', 4, 1100.85, 895, '0001110'),
(45, 'SAOS', 'SASA', 4, 1041.81, 847, '0010001'),
(46, 'SAEM', 'SASA', 2, 2515.35, 2045, '1010101'),
(47, 'SARM', 'SARP', 3, 1364.07, 1109, '0100110'),
(48, 'SADM', 'SARM', 2, 2168.49, 1763, '1101111'),
(49, 'SAZO', 'SARL', 1, 2047.95, 1665, '0101101'),
(50, 'SAZN', 'SARI', 2, 2225.07, 1809, '0000010'),
(51, 'SAZF', 'SARF', 2, 2264.43, 1841, '0000100'),
(52, 'SAAP', 'SARE', 3, 1327.17, 1079, '0001101'),
(53, 'SARL', 'SARC', 4, 1362.84, 1108, '1111101'),
(54, 'SAZP', 'SAOU', 2, 2597.76, 2112, '1100001'),
(55, 'SASJ', 'SAOS', 2, 2966.76, 2412, '0100100'),
(56, 'SAWP', 'SAOR', 1, 2435.4, 1980, '0010001'),
(57, 'SARP', 'SAOL', 4, 1060.26, 862, '1111111'),
(58, 'SAWD', 'SAOD', 1, 1875.75, 1525, '1000001'),
(59, 'SARI', 'SAOC', 3, 2741.67, 2229, '1001111'),
(60, 'SAVY', 'SANW', 4, 1070.1, 870, '0000100'),
(61, 'SAWJ', 'SANU', 2, 2664.18, 2166, '0001000'),
(62, 'SAWU', 'SANT', 3, 1442.79, 1173, '1000010'),
(63, 'SASA', 'SANR', 2, 2461.23, 2001, '1011111'),
(64, 'SATR', 'SANO', 1, 2726.91, 2217, '0101111'),
(65, 'SARE', 'SANL', 1, 2870.82, 2334, '1000100'),
(66, 'SAOC', 'SANE', 1, 2477.22, 2014, '0110010'),
(67, 'SAWG', 'SANC', 1, 1798.26, 1462, '0101101'),
(68, 'SAWE', 'SAMR', 1, 2790.87, 2269, '0000111'),
(69, 'SAWT', 'SAMM', 2, 2712.15, 2205, '1011010'),
(70, 'SAAR', 'SAME', 1, 1349.31, 1097, '0010001'),
(71, 'SASA', 'SAMA', 1, 1216.47, 989, '0010011'),
(72, 'SADF', 'SAHZ', 3, 2899.11, 2357, '0000001'),
(73, 'SANC', 'SAHR', 4, 2110.68, 1716, '1001010'),
(74, 'SANU', 'SAHE', 4, 1706.01, 1387, '0111101'),
(75, 'SAOU', 'SAFS', 2, 1269.36, 1032, '0011101'),
(76, 'SAMR', 'SAEZ', 3, 1939.71, 1577, '1111110'),
(77, 'SASO', 'SAEM', 2, 1790.88, 1456, '1000101'),
(78, 'SADS', 'SADS', 1, 1650.66, 1342, '1010100'),
(79, 'SANT', 'SADP', 3, 2007.36, 1632, '1110100'),
(80, 'SAZR', 'SADO', 3, 2969.22, 2414, '0001100'),
(81, 'SAZL', 'SADM', 2, 2890.5, 2350, '1101101'),
(82, 'SANE', 'SADL', 3, 2263.2, 1840, '0101001'),
(83, 'SAZY', 'SADJ', 3, 2576.85, 2095, '0110001'),
(84, 'SAAV', 'SADF', 1, 2168.49, 1763, '0010100'),
(85, 'SAFS', 'SADD', 2, 2809.32, 2284, '0100110'),
(86, 'SAZT', 'SACT', 3, 2794.56, 2272, '1000100'),
(87, 'SAST', 'SACP', 4, 2274.27, 1849, '1000001'),
(88, 'SANR', 'SACO', 2, 1908.96, 1552, '0011110'),
(89, 'SAVT', 'SACC', 2, 3040.56, 2472, '0101110'),
(90, 'SAZH', 'SABE', 2, 2939.7, 2390, '1111101'),
(91, 'SAWH', 'SAAV', 3, 1842.54, 1498, '0010110'),
(92, 'SAVV', 'SAAU', 4, 1455.09, 1183, '1011010'),
(93, 'SAOD', 'SAAR', 2, 1626.06, 1322, '1000111'),
(94, 'SAZV', 'SAAP', 2, 1509.21, 1227, '0101010'),
(95, 'SAOR', 'SAAK', 3, 1901.58, 1546, '0101000'),
(96, 'SAAU', 'SAAJ', 2, 1020.9, 830, '0110111'),
(97, 'SAHZ', 'SAAC', 2, 2426.79, 1973, '1111010'),
(98, 'SABE', 'SADO', 2, 3046.71, 2477, '1001111'),
(99, 'SABE', 'SAHE', 1, 2862.21, 2327, '0101011'),
(100, 'SABE', 'SANW', 1, 1317.33, 1071, '0000111'),
(101, 'SABE', 'SACT', 4, 2843.76, 2312, '0111001'),
(102, 'SABE', 'SACP', 3, 1205.4, 980, '0101010'),
(103, 'SABE', 'SANO', 4, 2629.74, 2138, '0111100'),
(104, 'SABE', 'SATC', 1, 2394.81, 1947, '1011001'),
(105, 'SABE', 'SAVC', 1, 1178.34, 958, '0110111'),
(106, 'SABE', 'SACO', 1, 2562.09, 2083, '1011111'),
(107, 'SABE', 'SAAC', 3, 2574.39, 2093, '1111001'),
(108, 'SABE', 'SAZC', 3, 1306.26, 1062, '1000010'),
(109, 'SABE', 'SARC', 3, 1692.48, 1376, '1100011'),
(110, 'SABE', 'SATU', 1, 1757.67, 1429, '1000011'),
(111, 'SABE', 'SAZW', 4, 1425.57, 1159, '0101001'),
(112, 'SABE', 'SAZD', 1, 2141.43, 1741, '0011011'),
(113, 'SABE', 'SADD', 3, 2945.85, 2395, '0110001'),
(114, 'SABE', 'SAVB', 3, 1425.57, 1159, '1000100'),
(115, 'SABE', 'SAWC', 1, 1640.82, 1334, '1010100'),
(116, 'SABE', 'SAWA', 3, 2204.16, 1792, '0111101'),
(117, 'SABE', 'SADP', 3, 1517.82, 1234, '1010010'),
(118, 'SABE', 'SAVE', 3, 2403.42, 1954, '1111001'),
(119, 'SABE', 'SAEZ', 1, 1521.51, 1237, '1111101'),
(120, 'SABE', 'SARF', 2, 1430.49, 1163, '1001111'),
(121, 'SABE', 'SAMA', 3, 2033.19, 1653, '1010001'),
(122, 'SABE', 'SAZG', 2, 2161.11, 1757, '0001101'),
(123, 'SABE', 'SAHR', 2, 2854.83, 2321, '0101100'),
(124, 'SABE', 'SAVJ', 1, 1521.51, 1237, '1000111'),
(125, 'SABE', 'SAAK', 3, 2270.58, 1846, '0110100'),
(126, 'SABE', 'SADJ', 4, 2691.24, 2188, '1010110'),
(127, 'SABE', 'SAAJ', 2, 1988.91, 1617, '1101011'),
(128, 'SABE', 'SAOL', 4, 1359.15, 1105, '1111100'),
(129, 'SABE', 'SACC', 3, 1980.3, 1610, '0110000'),
(130, 'SABE', 'SADL', 4, 2301.33, 1871, '1111011'),
(131, 'SABE', 'SANL', 1, 1683.87, 1369, '1001100'),
(132, 'SABE', 'SAVH', 2, 2453.85, 1995, '0100011'),
(133, 'SABE', 'SATK', 1, 2630.97, 2139, '0101111'),
(134, 'SABE', 'SAMM', 3, 2750.28, 2236, '0000110'),
(135, 'SABE', 'SAZM', 4, 1568.25, 1275, '0101100'),
(136, 'SABE', 'SAME', 3, 1863.45, 1515, '0110010'),
(137, 'SABE', 'SAOS', 4, 3059.01, 2487, '0100010'),
(138, 'SABE', 'SAEM', 4, 2660.49, 2163, '1011111'),
(139, 'SABE', 'SARM', 1, 2969.22, 2414, '1011011'),
(140, 'SABE', 'SADM', 4, 2950.77, 2399, '1100011'),
(141, 'SABE', 'SAZO', 2, 2343.15, 1905, '0111011'),
(142, 'SABE', 'SAZN', 1, 3022.11, 2457, '1110100'),
(143, 'SABE', 'SAZF', 2, 1680.18, 1366, '1000101'),
(144, 'SABE', 'SAAP', 3, 3043.02, 2474, '0010001'),
(145, 'SABE', 'SARL', 2, 1477.23, 1201, '0010101'),
(146, 'SABE', 'SAZP', 3, 2702.31, 2197, '0011111'),
(147, 'SABE', 'SASJ', 1, 1510.44, 1228, '0101100'),
(148, 'SABE', 'SAWP', 3, 2209.08, 1796, '1110000'),
(149, 'SABE', 'SARP', 1, 3036.87, 2469, '1011000'),
(150, 'SABE', 'SAWD', 1, 2003.67, 1629, '1110111'),
(151, 'SABE', 'SARI', 2, 2282.88, 1856, '0001000'),
(152, 'SABE', 'SAVY', 1, 1170.96, 952, '1001000'),
(153, 'SABE', 'SAWJ', 4, 1025.82, 834, '0110000'),
(154, 'SABE', 'SAWU', 3, 2917.56, 2372, '0100001'),
(155, 'SABE', 'SASA', 1, 1536.27, 1249, '1011000'),
(156, 'SABE', 'SATR', 2, 2399.73, 1951, '1111000'),
(157, 'SABE', 'SARE', 3, 2173.41, 1767, '1000111'),
(158, 'SABE', 'SAOC', 2, 1129.14, 918, '1110111'),
(159, 'SABE', 'SAWG', 4, 2477.22, 2014, '0110111'),
(160, 'SABE', 'SAWE', 3, 1767.51, 1437, '1011010'),
(161, 'SABE', 'SAWT', 4, 1783.5, 1450, '1100011'),
(162, 'SABE', 'SAAR', 2, 1147.59, 933, '0010110'),
(163, 'SABE', 'SASA', 1, 1402.2, 1140, '1111000'),
(164, 'SABE', 'SADF', 4, 2784.72, 2264, '1010101'),
(165, 'SABE', 'SANC', 1, 2956.92, 2404, '0111001'),
(166, 'SABE', 'SANU', 1, 1434.18, 1166, '0011001'),
(167, 'SABE', 'SAOU', 2, 1868.37, 1519, '1101110'),
(168, 'SABE', 'SAMR', 3, 2194.32, 1784, '1100010'),
(169, 'SABE', 'SASO', 1, 3007.35, 2445, '0101011'),
(170, 'SABE', 'SADS', 4, 2132.82, 1734, '1011000'),
(171, 'SABE', 'SANT', 3, 2404.65, 1955, '1110110'),
(172, 'SABE', 'SAZR', 2, 2654.34, 2158, '1010010'),
(173, 'SABE', 'SAZL', 2, 2750.28, 2236, '0100000'),
(174, 'SABE', 'SANE', 3, 2418.18, 1966, '1110110'),
(175, 'SABE', 'SAZY', 3, 2608.83, 2121, '1100100'),
(176, 'SABE', 'SAAV', 3, 1975.38, 1606, '0101011'),
(177, 'SABE', 'SAFS', 3, 2103.3, 1710, '0100001'),
(178, 'SABE', 'SAZT', 2, 1580.55, 1285, '1100100'),
(179, 'SABE', 'SAST', 2, 1565.79, 1273, '1001110'),
(180, 'SABE', 'SANR', 2, 2838.84, 2308, '0101010'),
(181, 'SABE', 'SAVT', 1, 2378.82, 1934, '0110001'),
(182, 'SABE', 'SAZH', 2, 1934.79, 1573, '0000110'),
(183, 'SABE', 'SAWH', 4, 1017.21, 827, '1011111'),
(184, 'SABE', 'SAVV', 3, 1293.96, 1052, '1011011'),
(185, 'SABE', 'SAOD', 3, 1266.9, 1030, '0011110'),
(186, 'SABE', 'SAZV', 2, 1694.94, 1378, '0011100'),
(187, 'SABE', 'SAOR', 4, 1581.78, 1286, '1000101'),
(188, 'SABE', 'SAAU', 2, 2778.57, 2259, '0111101'),
(189, 'SABE', 'SAHZ', 1, 1761.36, 1432, '0100011'),
(190, 'SACO', 'SAEZ', 2, 1956.93, 1591, '1100100'),
(191, 'SACO', 'SARF', 3, 1087.32, 884, '0111000'),
(192, 'SACO', 'SAMA', 1, 2474.76, 2012, '1010110'),
(193, 'SACO', 'SAZG', 2, 2991.36, 2432, '0110011'),
(194, 'SACO', 'SAHR', 2, 1004.91, 817, '0100111'),
(195, 'SACO', 'SAVJ', 4, 2656.8, 2160, '0011100'),
(196, 'SACO', 'SAAK', 4, 1211.55, 985, '0111001'),
(197, 'SACO', 'SADJ', 3, 1448.94, 1178, '0111100'),
(198, 'SACO', 'SAAJ', 1, 2555.94, 2078, '1111011'),
(199, 'SACO', 'SAOL', 2, 1418.19, 1153, '0101110'),
(200, 'SACO', 'SACC', 3, 1949.55, 1585, '0000000'),
(201, 'SACO', 'SADL', 2, 2617.44, 2128, '1000111'),
(202, 'SACO', 'SANL', 4, 2126.67, 1729, '1101101'),
(203, 'SACO', 'SAVH', 2, 1478.46, 1202, '0011101'),
(204, 'SACO', 'SATK', 4, 2950.77, 2399, '1011010'),
(205, 'SACO', 'SAMM', 1, 2800.71, 2277, '0001101'),
(206, 'SACO', 'SAZM', 3, 1646.97, 1339, '0101111'),
(207, 'SACO', 'SAME', 2, 2907.72, 2364, '1011011'),
(208, 'SACO', 'SAOS', 1, 1605.15, 1305, '0101101'),
(209, 'SACO', 'SAEM', 2, 2883.12, 2344, '1011111'),
(210, 'SACO', 'SARM', 3, 1004.91, 817, '1001110'),
(211, 'SACO', 'SADM', 1, 2125.44, 1728, '0101101'),
(212, 'SACO', 'SAZO', 4, 2238.6, 1820, '0101100'),
(213, 'SACO', 'SAZN', 1, 2674.02, 2174, '1000101'),
(214, 'SACO', 'SAZF', 4, 1031.97, 839, '0000011'),
(215, 'SACO', 'SAAP', 3, 1140.21, 927, '0000101'),
(216, 'SACO', 'SARL', 2, 1049.19, 853, '1100110'),
(217, 'SACO', 'SAZP', 1, 2692.47, 2189, '0010011'),
(218, 'SACO', 'SASJ', 4, 1389.9, 1130, '1110110'),
(219, 'SACO', 'SAWP', 1, 1277.97, 1039, '0101001'),
(220, 'SACO', 'SARP', 3, 2506.74, 2038, '0111001'),
(221, 'SACO', 'SAWD', 1, 2655.57, 2159, '1100110'),
(222, 'SACO', 'SARI', 4, 2771.19, 2253, '0100110'),
(223, 'SACO', 'SAVY', 4, 2920.02, 2374, '1111101'),
(224, 'SACO', 'SAWJ', 3, 3046.71, 2477, '1011011'),
(225, 'SACO', 'SAWU', 2, 1254.6, 1020, '1111011'),
(226, 'SACO', 'SASA', 1, 1285.35, 1045, '0101000'),
(227, 'SACO', 'SATR', 3, 1825.32, 1484, '1100000'),
(228, 'SACO', 'SARE', 3, 2270.58, 1846, '1001000'),
(229, 'SACO', 'SAOC', 2, 2526.42, 2054, '0101011'),
(230, 'SACO', 'SAWG', 3, 2942.16, 2392, '1110011'),
(231, 'SACO', 'SAWE', 4, 2075.01, 1687, '0100110'),
(232, 'SACO', 'SAWT', 2, 1179.57, 959, '1100111'),
(233, 'SACO', 'SAAR', 4, 1410.81, 1147, '0110010'),
(234, 'SACO', 'SASA', 3, 2831.46, 2302, '0111001'),
(235, 'SACO', 'SADF', 3, 2950.77, 2399, '0101011'),
(236, 'SACO', 'SANC', 2, 1933.56, 1572, '1001001'),
(237, 'SACO', 'SANU', 1, 1674.03, 1361, '0110011'),
(238, 'SACO', 'SAOU', 2, 2437.86, 1982, '1010010'),
(239, 'SACO', 'SAMR', 3, 2945.85, 2395, '1111101'),
(240, 'SACO', 'SASO', 3, 2931.09, 2383, '0111101'),
(241, 'SACO', 'SADS', 2, 1599, 1300, '1100101'),
(242, 'SACO', 'SANT', 2, 2990.13, 2431, '1010101'),
(243, 'SACO', 'SAZR', 4, 2033.19, 1653, '1001101'),
(244, 'SACO', 'SAZL', 1, 2392.35, 1945, '1110110'),
(245, 'SACO', 'SANE', 1, 2034.42, 1654, '1110011'),
(246, 'SACO', 'SAZY', 2, 2186.94, 1778, '0110010'),
(247, 'SACO', 'SAAV', 1, 2762.58, 2246, '1101100'),
(248, 'SACO', 'SAFS', 1, 2441.55, 1985, '1000000'),
(249, 'SACO', 'SAZT', 4, 3029.49, 2463, '0010100'),
(250, 'SACO', 'SAST', 2, 1849.92, 1504, '1111110'),
(251, 'SACO', 'SANR', 4, 1719.54, 1398, '1100000'),
(252, 'SACO', 'SAVT', 4, 999.99, 813, '1100010'),
(253, 'SACO', 'SAZH', 4, 2814.24, 2288, '0010101'),
(254, 'SACO', 'SAWH', 2, 2356.68, 1916, '0101101'),
(255, 'SACO', 'SAVV', 1, 1624.83, 1321, '0010010'),
(256, 'SACO', 'SAOD', 2, 1157.43, 941, '1100110'),
(257, 'SACO', 'SAZV', 2, 2520.27, 2049, '1110100'),
(258, 'SACO', 'SAOR', 3, 2844.99, 2313, '0110001'),
(259, 'SACO', 'SAAU', 2, 2952, 2400, '0111011'),
(260, 'SACO', 'SAHZ', 2, 1656.81, 1347, '0001110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`dni`, `nombre`, `email`, `fecha`) VALUES
(0, 'juliana rabunal', '', '0000-00-00'),
(11111111, 'pasaje 1', 'email1@gmail.com', '1990-11-24'),
(11122233, 'juan gomez', 'juangomez@email.com', '1989-11-30'),
(21542124, 'adrian', 'eladri@yahoo.com.ar', '1999-03-10'),
(32165421, 'pedro aguilar', 'pedroaguilar@gmail.com', '1995-07-19'),
(33213222, 'juliana rabunal', 'prueba@gmail.com', '1990-06-27'),
(37895761, 'matias sanchez', 'matias@gmail.com', '2014-11-08'),
(54123123, 'juan', 'juanalvaro@yahoo.com.ar', '1995-07-20'),
(65321321, 'juan esteban', 'juancito@esteban.com', '1988-10-17'),
(87987987, 'noPago', 'pepenopago@g.com', '1994-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `codigoReserva` varchar(6) NOT NULL DEFAULT '0',
  `dniPasajero` int(8) NOT NULL,
  `codVuelo` varchar(6) NOT NULL,
  `listaEspera` int(1) DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `monto` float NOT NULL,
  `categoria` varchar(7) NOT NULL,
  `numTarjeta` int(16) DEFAULT NULL,
  `asiento` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`codigoReserva`, `dniPasajero`, `codVuelo`, `listaEspera`, `fechaPago`, `monto`, `categoria`, `numTarjeta`, `asiento`) VALUES
('MK76CT', 32165421, 'AP11FS', NULL, NULL, 1952.01, 'primera', NULL, NULL),
('RK28IO', 87987987, 'OL49XI', NULL, NULL, 1952.01, 'Primera', NULL, NULL),
('TJ16ZX', 37895761, 'MA29DU', NULL, NULL, 1952.01, 'primera', NULL, NULL),
('VX50DD', 11111111, 'KA42OW', NULL, NULL, 2860.98, 'Primera', NULL, NULL),
('YH40BZ', 65321321, 'HX76HP', NULL, NULL, 1097, 'Economy', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `tipoAvion` int(1) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `totalPax` int(3) NOT NULL,
  `economy` int(3) NOT NULL,
  `economyFilas` int(3) NOT NULL,
  `economyCols` int(3) NOT NULL,
  `primera` int(3) NOT NULL,
  `primeraFilas` int(3) NOT NULL,
  `primeraCols` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`tipoAvion`, `marca`, `modelo`, `totalPax`, `economy`, `economyFilas`, `economyCols`, `primera`, `primeraFilas`, `primeraCols`) VALUES
(1, 'Embraer', 'EMB-120', 30, 30, 10, 3, 0, 0, 0),
(2, 'Embraer', 'ER-145', 80, 70, 14, 5, 10, 5, 2),
(3, 'Embraer', 'ER-145', 125, 105, 21, 5, 20, 10, 2),
(4, 'Embraer', 'ER-170', 150, 120, 30, 4, 30, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE IF NOT EXISTS `vuelos` (
  `codVuelo` varchar(6) NOT NULL,
  `fechaVuelo` date NOT NULL,
  `codFrecuencia` int(3) NOT NULL,
  `codAvion` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`codVuelo`, `fechaVuelo`, `codFrecuencia`, `codAvion`) VALUES
('AP11FS', '2014-11-14', 15, 'LV-CDV'),
('HX76HP', '2014-11-19', 70, 'LV-IRY'),
('KA42OW', '2014-11-30', 35, 'LV-UFO'),
('KG26YW', '2014-11-22', 15, 'LV-CDV'),
('MA29DU', '2014-11-29', 15, 'LV-IRY'),
('OL49XI', '2014-11-13', 15, 'LV-CDV'),
('PC71EY', '2014-11-20', 15, 'LV-CDV');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
 ADD PRIMARY KEY (`codAeropuerto`);

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
 ADD PRIMARY KEY (`codAvion`), ADD KEY `tipoAvion` (`tipoAvion`);

--
-- Indices de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
 ADD PRIMARY KEY (`codFrecuencia`), ADD KEY `tipoAvion` (`tipoAvion`), ADD KEY `origen` (`origen`), ADD KEY `destino` (`destino`), ADD KEY `codAvion` (`tipoAvion`), ADD KEY `destino_2` (`destino`), ADD KEY `codAvion_2` (`tipoAvion`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
 ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`codigoReserva`), ADD UNIQUE KEY `codigo` (`codigoReserva`,`dniPasajero`), ADD UNIQUE KEY `dniPasajero_3` (`dniPasajero`), ADD KEY `codigoAvion` (`dniPasajero`), ADD KEY `codigoDestino` (`codVuelo`), ADD KEY `dniPasajero` (`dniPasajero`), ADD KEY `codVuelo` (`codVuelo`), ADD KEY `dniPasajero_2` (`dniPasajero`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
 ADD PRIMARY KEY (`tipoAvion`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
 ADD PRIMARY KEY (`codVuelo`), ADD KEY `codFrecuencia` (`codFrecuencia`), ADD KEY `codAvion` (`codAvion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`tipoAvion`) REFERENCES `tipo` (`tipoAvion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
ADD CONSTRAINT `frecuencias_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `aeropuerto` (`codAeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `frecuencias_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `aeropuerto` (`codAeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `frecuencias_ibfk_3` FOREIGN KEY (`tipoAvion`) REFERENCES `tipo` (`tipoAvion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`dniPasajero`) REFERENCES `pasajero` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`codVuelo`) REFERENCES `vuelos` (`codVuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
ADD CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`codFrecuencia`) REFERENCES `frecuencias` (`codFrecuencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `vuelos_ibfk_2` FOREIGN KEY (`codAvion`) REFERENCES `avion` (`codAvion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
