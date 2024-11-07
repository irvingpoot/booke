-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 16:10:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `booke`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookIsbn` varchar(45) DEFAULT NULL,
  `bookTitle` varchar(45) DEFAULT NULL,
  `bookAuthor` varchar(45) DEFAULT NULL,
  `bookEdition` varchar(45) DEFAULT NULL,
  `bookCategory` varchar(45) DEFAULT NULL,
  `bookStock` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `bookPrice` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `bookIsbn`, `bookTitle`, `bookAuthor`, `bookEdition`, `bookCategory`, `bookStock`, `imagen`, `bookPrice`) VALUES
(20, '9786073836609', 'Elon Musk', ' Walter Isaacson', '3ra Edición', 'Negocios y Finanzas', 30, '1.jpeg', 549.00),
(17, '9786073836159', 'Una historia en cada hijo te dio', ' Gerardo Australia', '1ra Edición', 'Historia', 30, '4.jpeg', 399.00),
(18, '9786075578354', 'Los Divagantes', ' Guadalupe Nettel', '2da Edición', 'Literatura y Novela', 30, '3.jpeg', 320.00),
(19, '9786073906036', 'La mesa herida', 'Laura Martínez-Belli', '3ra Edición', 'Literatura y Novela', 30, '2.jpeg', 348.00),
(15, '9786073830423', 'Hijos del Neoliberalismo', 'Ana Lilia Pérez', '1ra Edición', 'Historia', 30, '6.jpeg', 299.00),
(16, '9788419654205', 'Gran guía visual del cosmos', ' Toshifumi Fumatase', '2da Edición', 'Ciencia y Naturaleza', 30, '5.jpeg', 469.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userFirstName` varchar(45) DEFAULT NULL,
  `userLastName` varchar(45) DEFAULT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  `userPassword` varchar(45) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userId`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `isAdmin`) VALUES
(1, 'Irving', 'Poot', 'admin@correo.com', 'helado123', 1),
(2, 'Marco', 'Saldivar', 'correo@correo.com', 'helado123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
