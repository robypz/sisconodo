-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 04:47:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisconodo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_data`
--

CREATE TABLE `academic_data` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `courses` varchar(250) DEFAULT NULL,
  `merits` varchar(250) DEFAULT NULL,
  `experiences` varchar(250) DEFAULT NULL,
  `title_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `hiring_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract_requests`
--

CREATE TABLE `contract_requests` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `school` varchar(250) NOT NULL,
  `school_dean_review` varchar(250) NOT NULL,
  `academic_vice_rectorate_review` varchar(250) NOT NULL,
  `hr_department_review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `family_data`
--

CREATE TABLE `family_data` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `kinship` varchar(250) NOT NULL,
  `f_dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_data`
--

CREATE TABLE `medical_data` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `psychopedagogical_evaluation_url` varchar(250) NOT NULL,
  `medical_certificate_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile_phone` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'root', '$2y$10$SjpHv5bRB24tsxjl9TjvZOQWwMnZw8a6VznlzvW86ryJWljXUO7ma', 'ROOT'),
(17, 'ais', '$2y$10$IX6PdxAamcaQBpSuLOeBuuwSCZjl9AjpkdinBs6mavyynEJgaohhq', 'Ingeniería de Sistemas'),
(18, 'rrhh', '$2y$10$MtOxho/hrPwIgwh6l5YcN.prSSui8dPI5jkAOSiCCluUcbnyeNLB.', 'RRHH'),
(19, 'vrac', '$2y$10$aZ7U/mBdKLIlU4leq2iyIuFnioe.PVstwuTCLiErB10k0IzZlul02', 'VRAC'),
(20, 'admin', '$2y$10$i5gh9bxTCuYwqvtQoOzw3.elt2qGqUR1Qoly7EcX9IK5yQOpOlDtK', 'ADMINISTRATIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_data`
--
ALTER TABLE `academic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `contract_requests`
--
ALTER TABLE `contract_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `family_data`
--
ALTER TABLE `family_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academic_data`
--
ALTER TABLE `academic_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contract_requests`
--
ALTER TABLE `contract_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `family_data`
--
ALTER TABLE `family_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_data`
--
ALTER TABLE `academic_data`
  ADD CONSTRAINT `academic_data_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personal_data` (`dni`);

--
-- Filtros para la tabla `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `contract_requests` (`dni`);

--
-- Filtros para la tabla `contract_requests`
--
ALTER TABLE `contract_requests`
  ADD CONSTRAINT `contract_requests_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personal_data` (`dni`);

--
-- Filtros para la tabla `family_data`
--
ALTER TABLE `family_data`
  ADD CONSTRAINT `family_data_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personal_data` (`dni`);

--
-- Filtros para la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD CONSTRAINT `medical_data_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personal_data` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
