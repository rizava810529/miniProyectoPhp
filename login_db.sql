-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2023 a las 13:14:49
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
-- Base de datos: `login_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bio` varchar(400) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `photo` longblob DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Name`, `password`, `bio`, `phone`, `photo`, `email`) VALUES
(1, 'usuario1', 'admin', 'I am technology electronics automation', 2147483647, NULL, 'admin@admin'),
(2, 'usuario2', 'test', 'I am mecanic', 2147483647, NULL, 'test@test'),
(3, NULL, '$2y$10$qwlaY6m8uwWM1YO63qK/XeeIjMOmq/LxKRJjGJikG2o6LcoF.1Ic.', NULL, NULL, NULL, 'akirenobi@hotmail.com'),
(4, 'ricardo', '$2y$10$M7MjmbC6EC3/kUVDoNdshOTIVx4EVOmYA5kwBaYTG4O8SGE4VMpl.', 'developer', 2147483647, NULL, 'rizava810529@gmail.com'),
(5, NULL, '$2y$10$mrvsHR5GSdGa4u4QMFrvlOL0evBGatrsqiZa14MgUF6ioC.YMmINy', NULL, NULL, NULL, 'zarateromeroadam29@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
