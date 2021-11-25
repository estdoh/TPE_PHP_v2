-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 03:43:45
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

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

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(2, 'PROMOCIÓN', 'merchandasing y productos de promocion'),
(3, 'PACKAGING', 'desarollo de productos y packaging para envases'),
(4, 'EDITORIAL', 'Libros, revistas y diseño editorial'),
(8, 'BRANDING', 'diseño e imagen de marca, identidad coorporativa'),
(15, 'NUEVA', 'Nueva categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(20) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `comment`, `rating`, `product_id`, `id_user`, `date`) VALUES
(8, 'muy bueno', 1, 1098, 29, '2021-11-22 20:04:16'),
(9, 'muy bueno', 1, 1098, 29, '2021-11-22 20:04:16'),
(10, 'muy bueno', 1, 1098, 29, '2021-11-22 20:04:16'),
(11, 'muy bueno', 1, 1098, 29, '2021-11-22 20:04:16'),
(14, 'muy malo', 1, 1099, 21, '2021-11-22 20:04:16'),
(15, 'normal', 3, 1098, 21, '2021-11-22 20:04:16'),
(16, 'me gustó', 5, 1098, 21, '2021-11-22 20:04:16'),
(17, 'pasable', 3, 1098, 21, '2021-11-22 20:04:16'),
(20, 'dasdsadsa', 1, 1098, 29, '2021-11-22 20:04:16'),
(21, 'malo', 2, 1098, 29, '2021-11-22 20:04:16'),
(22, 'maloo', 3, 1098, 29, '2021-11-22 20:04:16'),
(27, 'maloo', 2, 1161, 29, '2021-11-22 20:04:16'),
(28, 'maloo', 2, 1161, 29, '2021-11-22 20:04:16'),
(29, 't7sudhgsnfh', 2, 1161, 21, '2021-11-22 20:04:16'),
(35, 'bueno', 4, 1098, 29, '2021-11-24 23:03:36'),
(36, 'malo', 1, 1162, 29, '2021-11-24 23:03:51'),
(37, 'malo', 1, 1162, 29, '2021-11-24 23:03:52'),
(38, 'malo', 1, 1162, 29, '2021-11-24 23:03:52'),
(39, 'malo', 1, 1162, 29, '2021-11-24 23:03:52'),
(40, 'malo', 1, 1162, 29, '2021-11-24 23:03:53'),
(41, 'malo', 1, 1162, 29, '2021-11-24 23:03:53'),
(42, 'excelente', 5, 1100, 29, '2021-11-24 23:04:10'),
(43, 'excelente', 5, 1100, 29, '2021-11-24 23:04:10'),
(44, 'excelente', 5, 1100, 29, '2021-11-24 23:04:11'),
(45, 'excelente', 4, 1100, 29, '2021-11-24 23:04:15'),
(46, 'excelente', 4, 1100, 29, '2021-11-24 23:04:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(150) NOT NULL,
  `name` varchar(400) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(450) CHARACTER SET utf8mb4 NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `price_a` int(11) NOT NULL,
  `price_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `img`, `price_a`, `price_b`) VALUES
(1098, 3, 'ENVASE', 'desarrollo morfologica de estuche troquelado, envase pet, brick, etc. no incluye grafica (ver item anterior)', 'images/619e42ce53414.png', 45110, 54132),
(1099, 4, 'MODELADO 3D DE ENVASE', 'Costo por envase. Forma simple (caja, frasco, etc).', 'images/tv-led.png', 7410, 8892),
(1100, 3, 'RENDERIZADO DE MODELO 3D', 'imagen de producto. Precio unitario de cada imágen/vista.', '', 1, 1),
(1161, 8, 'ETIQUETA SIMPLE', 'etiqueta simple de poducto', '', 1233, 1233),
(1162, 2, 'PRUEBA', 'PRUEBA', 'images/619e41e1bd424.png', 123, 123),
(1164, 2, 'Prueba', 'Prueba', 'images/619e422228241.png', 123, 123),
(1166, 2, 'test123', '123', 'images/619e4ff288b72.png', 123, 123),
(1179, 2, 'Compuesto', 'Prueba', 'images/619ef4a31679e.png', 3456, 7788),
(1180, 8, 'NUEVA', 'Nueva', 'images/619ef7022d961.png', 23324, 2444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `rol`) VALUES
(21, 'slherrera91@gmail.com', '$2y$10$VWc8P8xorsOl.dAQ9ImFC.nYX7vERAPd2sRSFq4WXmxgjlJ8rX7jW', 'SUPER-ADMIN'),
(28, 'admin@prueba', '$2y$10$OKRMwNHhN4nJsj/.N6p9guEcsF91AWt0bsUwfQRU6.cNx1FIfDw9O', 'ADMIN'),
(29, 'user@prueba', '$2y$10$Hg88pAqC3u3eyCTRd4NmXOGH1RRsUXCcChvSPkYebKzIxPrCbrD6O', 'USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1181;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
