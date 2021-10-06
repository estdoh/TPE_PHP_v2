-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-10-2021 a las 15:23:24
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_especial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(9) NOT NULL,
  `description` varchar(55) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(1, 'PAPELERIA', 'Elementos de papeleria y diseño aplicados en un soporte'),
(2, 'PROMOSION', 'merchandasing y prouctos de promosion'),
(3, 'PACKAGING', 'desarollo de productos y packaging para envases'),
(4, 'EDITORIAL', 'Libros, revistas y diseño editorial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(150) NOT NULL,
  `name` varchar(400) NOT NULL,
  `description` varchar(450) NOT NULL,
  `price_a` int(11) NOT NULL,
  `price_b` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=1160 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `price_a`, `price_b`) VALUES
(1025, 1, 'CERTIFICADOS, INVITACIONES EMPRESARIALES O TARJETAS DE FIN DE AÑO', 'Asistencia a un evento, reconocimiento, adjudicación de un premio, etc	', 6240, 7488),
(1026, 1, 'POSTAL', 'Frente (imagen) y dorso (datos).', 5070, 6084),
(1058, 2, 'PAD, FUNDA CELULARES, TAZA', 'Aplicación de logo simple o identidad previamente diseñada', 1079, 1295),
(1065, 3, 'REVISTA', 'Hasta 30 páginas. No incluye armado de publicidades.', 26520, 31824),
(1098, 4, 'ENVASE', 'desarrollo morfologica de estuche troquelado, envase pet, brick, etc. no incluye grafica (ver item anterior)', 45110, 54132),
(1099, 4, 'MODELADO 3D DE ENVASE', 'Costo por envase. Forma simple (caja, frasco, etc).', 7410, 8892),
(1100, 4, 'RENDERIZADO DE MODELO 3D', 'imagen de producto. Precio unitario de cada imágen/vista.', 1690, 2028),
(1158, 4, 'GRAFICA PUBLICITARIA PLOTTER', '', 500, 600),
(1159, 4, 'GRAFICA PUBLICITARIA VIDRIERA', '', 1500, 1800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `rol`) VALUES
(15, 'prueba@prueba.com', '$2a$12$hUnqKh3dKBUi25a1FqeyC.2KhHrndsCMpM7hIrIyX37cEzybYczS.', 1),
(16, 'prueba@qwert.com', '$2a$12$hUnqKh3dKBUi25a1FqeyC.2KhHrndsCMpM7hIrIyX37cEzybYczS.', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
