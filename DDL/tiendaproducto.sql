-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2023 a las 02:27:59
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

CREATE DATABASE `tiendaproducto`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaproducto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `numero`, `tipo`, `descripcion`) VALUES
(1, 1, 'Limpieza', 'Productos de limpieza para cocina.'),
(8, 3, 'Alimentación', 'Para guardar productos alimenticios. Elias'),
(10, 4, 'Medicina', 'Aqui se guardaran los productos de salud.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `pais`, `descripcion`) VALUES
(1, 'Hyundai', 'Venezuela', 'Aqui vamos a hablar cloro.'),
(2, 'Toyota', 'Venezuela', 'Empresa de Carros...'),
(4, 'Hayer', 'Venezuela', 'ss'),
(5, 'Ferrari', 'Italia', '...'),
(6, 'Givenchy', 'Italia', 'Sin descripcion...'),
(7, 'Microsoft', 'Estados Unidos', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id_almacen` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id_almacen`, `id_producto`, `descripcion`, `created_at`, `updated_at`, `id`) VALUES
(1, 45, NULL, '2023-04-12 09:24:16', '2023-04-12 09:24:16', 41),
(1, 46, NULL, '2023-04-12 09:25:19', '2023-04-12 09:25:19', 42),
(8, 44, NULL, '2023-04-15 07:44:04', '2023-04-15 07:44:04', 44),
(10, 48, NULL, '2023-04-16 01:15:27', '2023-04-16 01:15:27', 49),
(1, 52, NULL, '2023-04-16 02:39:40', '2023-04-16 02:39:40', 50),
(1, 53, NULL, '2023-04-16 02:47:04', '2023-04-16 02:47:04', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `doc_persona` varchar(50) NOT NULL,
  `fec_nac` date NOT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_lugar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `username`, `password`, `correo`, `nombre`, `apellido`, `updated_at`, `created_at`, `doc_persona`, `fec_nac`, `telefono`, `id_rol`, `id_lugar`) VALUES
(1, 'sid38', '$2y$10$uODb30GHAJtDAt6TxIeIH.d6L7KiLQHlZ8/VmctNYXdC6Gz3zThBu', 'barrientosjoseelias@hotmail.com', 'Jose', 'Barrientos', '2023-02-10 06:11:16', '2023-02-10 09:42:32', '', '0000-00-00', NULL, 0, 0),
(2, 'mari18', '$2y$10$OQEk/wgnlaR0NKoRS1GvvuZZIw3.zAh3cL.52gRccER0C0z7ZXJ0i', 'maria@gmai.com', 'Maria', 'Gonzales', '2023-02-10 10:10:34', '2023-02-10 10:10:34', '', '0000-00-00', NULL, 0, 0),
(3, 'miguel12', '$2y$10$0wv14aJlgzq0R1Vrz7vt4utluo6TUeJyy2UwXaotBl8wg5O/A.q4a', 'miguel@gmail.com', 'Miguel', 'Ordoñez', '2023-02-10 10:18:41', '2023-02-10 10:18:41', '', '0000-00-00', NULL, 0, 0),
(4, 'jesus12', '$2y$10$foAMWLndkYzJDJ..MFuA5eHsZrcwwQTj6aLJiFcqXy1zkI8lIr4eW', 'jesus@gmail.com', 'Jesus', 'Martinez', '2023-02-22 05:17:06', '2023-02-22 05:17:06', '26089396', '1998-02-03', NULL, 0, 0),
(6, 'john12', '$2y$10$kF6xv1LhPuBgC7PuF1HQ9.VTqR/HGlDyf8W2SNQT0A8LqPuIKIbz6', 'john@shocklogic.com', 'John', 'Martinez', '2023-02-22 05:21:51', '2023-02-22 05:21:51', '25185194', '2000-01-04', '04142398425', 0, 0),
(7, 'elias32465', '$2y$10$9/DArcUkloadiSs9E2F1dObtCvrKT7PQ55hBE6R3p6Z0xCMLMrUGS', 'elias@gmail.com', 'Elio', 'Barrientos', '2023-04-16 04:02:59', '2023-04-16 04:02:59', '6415165', '2023-04-20', '5165186464', NULL, NULL),
(8, 'jesus123', '$2y$10$aJS/jTmFZr.4dCdsGyI9uupvtJR/2lVfuFI280Sb7sh5oye3WAP5e', 'jesus@gmail.es', 'Jesus', 'Alvarado', '2023-04-16 04:04:09', '2023-04-16 04:04:09', '1651561', '2023-04-16', '561651561', NULL, NULL),
(9, 'vero12', '$2y$10$4W3FssjwqOvFMx0mnfwsiuhbtBQOBJHAFyq.oGqqlSERec28huq5.', 'veronica@gmail.com', 'Veronica', 'Martinez', '2023-04-16 04:06:16', '2023-04-16 04:06:16', '16515648', '2000-06-08', '04144322168', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id_producto` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `moneda` varchar(150) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(500) DEFAULT NULL,
  `cantidad` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `codigo`, `estado`, `precio`, `moneda`, `tipo`, `descripcion`, `id_zona`, `id_marca`, `created_at`, `updated_at`, `imagen`, `cantidad`) VALUES
(44, 'IPhone 11S', '1', 'Nuevo', '480', 'USD', 'Dispositivo', NULL, NULL, 1, '2023-04-12 09:15:07', '2023-04-12 09:15:07', 'producto.png', 12),
(45, 'Nevera', '2', 'Nuevo', '200', 'USD', 'Electrodomestico', NULL, NULL, 4, '2023-04-12 09:24:16', '2023-04-12 09:24:16', 'producto.png', 20),
(46, 'Horno', '3', 'Nuevo', '100', 'USD', 'Electrodomestico', NULL, NULL, 4, '2023-04-12 09:25:19', '2023-04-12 09:25:19', 'producto.png', 120),
(48, 'Irresistible', '1256168', 'Nuevo', '10', 'USD', 'Perfumes', 'Perfume para la ropa.', NULL, 6, '2023-04-16 00:36:22', '2023-04-16 00:36:22', '1681590982Perfumes-Mujer-Irresistible-Givenchy.webp', 50),
(52, 'Florero', '56486468', 'Nuevo', '5', 'EUR', 'Objeto Domestico', NULL, 1, 6, '2023-04-15 22:48:17', '2023-04-16 02:48:17', 'producto.png', 20),
(53, 'Xbox 360', '1561560', 'Nuevo', '80', 'USD', 'Consola', NULL, 2, 7, '2023-04-16 02:47:04', '2023-04-16 02:47:04', 'producto.png', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `abreviatura` varchar(20) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`id`, `tipo`, `nombre`, `abreviatura`, `valor`, `id_producto`) VALUES
(5, 'Longitud', 'IPhone 11s', 'm2', '40', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `numero`, `descripcion`, `id_almacen`) VALUES
(1, 1, 'Aqui se ubicaran todos los telefonos. Zona.', 1),
(2, 2, 'Aqui estaran los coches.', 1),
(3, 1, NULL, 8),
(4, 2, NULL, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Mov_Alm_Prod` (`id_producto`),
  ADD KEY `FK_Mov_Prod_Alm` (`id_almacen`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_marca` (`id_marca`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_producto` (`id_producto`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `FK_Mov_Alm_Prod` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_Mov_Prod_Alm` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
