-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 19:05:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pelis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `id_pelis` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `biografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `nombre`, `nacionalidad`, `fecha_nacimiento`, `biografia`) VALUES
(1, 'David Fincher', 'Estadounidense', '1962-08-28', 'David Andrew Leo Fincher es un director estadounidense, sus películas son en su mayoría thrillers y recibió 40 nominaciones de la academia incluyendo 3 como mejor director'),
(2, 'Martin Scorsese', 'Estadounidense', '1942-11-17', 'Martin Scorsese es un director, productor, escritor y actor estadounidense. Una de las mayores figuras del Hollywood moderno, es considerado uno de los directores más influyentes de la historia.'),
(3, 'Quentin Tarantino', 'Estadounidense', '1963-03-27', 'Quentin Jerome Tarantino es un director, escritor, productor y actor estadounidense comenzo en 1990 como un director independiente con su primer pelicula Perros de la Calle y desde entonces carrera siempre fue exitosa.'),
(4, 'Wes Anderson', 'Estadounidense', '1969-05-01', 'Wes Anderson es un cineasta estadounidense, sus películas son conocidas por su simetría, excentricismo y estilos de narrativa únicos.'),
(5, 'David Lynch', 'Estadounidense', '1946-01-20', 'David Keith Lynch es un director, pintor, artista visual, escritor y músico estadounidense. Ha desarrollado su estilo cinematográfico único el cual es descripto por su no importa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `id_director` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `sinopsis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `id_director`, `genero`, `year`, `sinopsis`) VALUES
(3, 'Fight Club', 1, 'Drama', '1999', 'Edward Norton se vuelve loco'),
(4, 'Pulp Fiction', 3, 'Accion', '1994', 'Falopa'),
(6, 'Reservoir Dogs', 3, 'Accion', '1992', 'Se mueren todos'),
(8, 'The Grand Budapest Hotel', 4, 'Drama', '2014', 'Voldemort maneja un hotel'),
(9, 'Isle of Dogs', 4, 'Drama', '2018', 'Perritos perdidos stopmotion'),
(10, 'Taxi Driver', 2, 'Drama', '1976', 'De Niro deja la mafia y se vuelve loco'),
(11, 'Shutter Island', 2, 'Drama', '2010', 'DiCaprio se vuelve loco '),
(12, 'Eraserhead', 5, 'Horror', '1977', 'Cosas raras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(6, 'ro', '$2y$10$gyCP3D0nNLmv7hkC2KekCOn7i8Wh8X5joWGyVJ8qmydC/wgz6SAhS'),
(7, 'webadmin', '$2y$10$NQ9kevGQWUFDGvqE6ix3kucKrq3ewITihd/79jTLx9dTmt.4/ZNJW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calificacion_usuario` (`id_usuario`),
  ADD KEY `fk_calificacion_pelis` (`id_pelis`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelis_director` (`id_director`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_pelis` FOREIGN KEY (`id_pelis`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `fk_calificacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_pelis_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
