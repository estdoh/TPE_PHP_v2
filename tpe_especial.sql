-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-10-2021 a las 16:06:55
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
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(2, 'PROMOCION', 'merchandasing y prouctos de promosion'),
(3, 'PACKAGING', 'desarollo de productos y packaging para envases'),
(4, 'EDITORIAL', 'Libros, revistas y diseño editorial'),
(8, 'BRANDING', 'diseño e imagen de marca, identidad coorporativa'),
(12, 'IDENTIDAD', 'brnadingienda sdasdsgans dcasd'),
(17, 'PAPELERIA', 'Elementos de papeleria y diseño aplicados en un soporte');

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
) ENGINE=InnoDB AUTO_INCREMENT=1162 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `price_a`, `price_b`) VALUES
(1026, 3, 'POSTEO', 'Frente (imagen) y dorso (datos)', 507, 60843),
(1058, 2, 'PAD, FUNDA CELULARES, TAZA', 'Aplicación de logo simple o identidad previamente diseñada', 1079, 1295),
(1098, 4, 'ENVASE', 'desarrollo morfologica de estuche troquelado, envase pet, brick, etc. no incluye grafica (ver item anterior)', 45110, 54132),
(1099, 4, 'MODELADO 3D DE ENVASE', 'Costo por envase. Forma simple (caja, frasco, etc).', 7410, 8892),
(1100, 3, 'RENDERIZADO DE MODELO 3D', 'imagen de producto. Precio unitario de cada imágen/vista.', 1, 1),
(1158, 4, 'GRAFICA PUBLICITARIA PLOTTER', 'asfdhgsad', 500, 600),
(1159, 2, 'GRAFICA PUBLICITARIA VIDRIERA', 'la grafica es', 1500, 1800),
(1161, 8, 'ETIQUETA SIMPLE', 'etiqueta simple de poducto', 1233, 1233);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `rol`) VALUES
(15, 'prueba@prueba.com', '$2a$12$hUnqKh3dKBUi25a1FqeyC.2KhHrndsCMpM7hIrIyX37cEzybYczS.', 1),
(16, 'prueba@qwert.com', '$2a$12$hUnqKh3dKBUi25a1FqeyC.2KhHrndsCMpM7hIrIyX37cEzybYczS.', 1),
(17, 'hola@hola.com', '$2y$10$ssKtKZfrYHZkeOmrroWvmuKYHjdfOBgbBczvRWKKpvrP1DGAzHUzS', 1),
(18, 'hola@asdasdas.com', '$2y$10$VKyFY.TBthLbKbXQpJ3xnOorVUPn93Fzq1XypaOUnUh6wzKdFjOcC', 1);

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
