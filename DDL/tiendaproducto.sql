-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2023 a las 07:15:49
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `numero`, `tipo`, `descripcion`) VALUES
(1, 1, 'Limpieza', 'Productos de limpieza para cocina.'),
(8, 3, 'Alimentacion', 'Para guardar productos alimenticios'),
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
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `pais`, `descripcion`) VALUES
(1, 'Hyundai', 'Venezuela', 'Aqui vamos a hablar cloro.'),
(2, 'Toyota', 'Venezuela', 'Empresa de Carros');

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
(1, 10, NULL, '2023-03-08 03:22:48', '2023-03-05 21:34:51', 1),
(8, 7, NULL, '2023-03-08 07:06:11', '2023-03-08 07:06:11', 2),
(10, 5, NULL, '2023-03-08 03:22:53', '2023-03-08 07:06:22', 3),
(1, 11, NULL, '2023-03-08 07:23:36', '2023-03-08 07:23:36', 4),
(1, 14, NULL, '2023-03-08 07:34:00', '2023-03-08 07:34:00', 7),
(8, 16, NULL, '2023-03-08 07:36:59', '2023-03-08 07:36:59', 9);

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
(6, 'john12', '$2y$10$kF6xv1LhPuBgC7PuF1HQ9.VTqR/HGlDyf8W2SNQT0A8LqPuIKIbz6', 'john@shocklogic.com', 'John', 'Martinez', '2023-02-22 05:21:51', '2023-02-22 05:21:51', '25185194', '2000-01-04', '04142398425', 0, 0);

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
  `zona_ubicacion` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_unidad_medida` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `codigo`, `estado`, `precio`, `moneda`, `tipo`, `descripcion`, `zona_ubicacion`, `id_marca`, `id_unidad_medida`, `created_at`, `updated_at`, `imagen`) VALUES
(5, 'Horno Haier', '132', 'Nuevo', '400', 'Dolares', 'Cocina', 'Para calentar alimentos....', NULL, NULL, NULL, '2023-03-08 03:23:00', '2023-03-08 07:23:00', '1677388998horno.png'),
(7, 'Nevera', '326', 'Nuevo', '123', 'Dolares', 'Limpieza', 'saddasddsa', NULL, NULL, NULL, '2023-03-05 19:39:34', '2023-03-05 19:39:34', '1678030774WhatsApp Image 2023-03-01 at 6.28.30 AM.jpeg'),
(10, 'IPhone 11s', '541', 'Nuevo', '500', 'Dolares', 'Electronico', 'sdasasddsadsa', NULL, NULL, NULL, '2023-03-05 21:34:51', '2023-03-05 21:34:51', 'producto.png'),
(11, 'Lavamanos', '251', 'Nuevo', '100', '20', 'Limpieza', 'erwasdasda', NULL, NULL, NULL, '2023-03-08 07:23:36', '2023-03-08 07:23:36', 'producto.png'),
(14, 'asdsd', '123', 'Nuevo', '23442', 'Dolares', 'Limpieza', 'asdsasadasd', NULL, NULL, NULL, '2023-03-08 07:34:00', '2023-03-08 07:34:00', 'producto.png'),
(16, 'asddsa', '212', 'Nuevo', '12321', 'Dolares', 'Limpieza', 'saddsa', NULL, NULL, NULL, '2023-03-08 07:36:59', '2023-03-08 07:36:59', 'producto.png'),
(23, 'Laptop', '1369', 'Nuevo', '500', 'USD', 'Electronica', 'Nuevo producto.', NULL, 1, NULL, '2023-04-05 08:54:03', '2023-04-05 08:54:03', 'producto.png');

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
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `abreviatura_unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `id_almacen` (`id_almacen`),
  ADD KEY `id_producto` (`id_producto`);

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
  ADD KEY `FK_marca` (`id_marca`),
  ADD KEY `FK_unidad_medida` (`id_unidad_medida`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `FK_unidad_medida` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_medida` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;