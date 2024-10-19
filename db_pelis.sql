-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelis`
--

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `id_pelis` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `biografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `nombre`, `nacionalidad`, `fecha_nacimiento`, `biografia`) VALUES
(1, 'David Fincher', 'Estadounidense', '1962-08-28', 'David Andrew Leo Fincher es un director estadounidense, sus películas son en su mayoría thrillers y recibió 40 nominaciones de la academia incluyendo 3 como mejor director'),
(2, 'Martin Scorsese', 'Estadounidense', '1942-11-17', 'Martin Scorsese es un director, productor, escritor y actor estadounidense. Una de las mayores figuras del Hollywood moderno, es considerado uno de los directores más influyentes de la historia.'),
(3, 'Quentin Tarantino', 'Estadounidense', '1963-03-27', 'Quentin Jerome Tarantino es un director, escritor, productor y actor estadounidense comenzo en 1990 como un director independiente con su primer pelicula Perros de la Calle y desde entonces carrera siempre fue exitosa.'),
(4, 'Wes Anderson', 'Estadounidense', '1969-05-01', 'Wes Anderson es un cineasta estadounidense, sus películas son conocidas por su simetría, excentricismo y estilos de narrativa únicos.'),
(5, 'David Lynch', 'Estadounidense', '1946-01-20', 'David Keith Lynch es un director, pintor, artista visual, escritor y músico estadounidense. Ha desarrollado su estilo cinematográfico único el cual es descripto por su no importa');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `id_director` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `sinopsis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `id_director`, `genero`, `year`, `sinopsis`) VALUES
(3, 'Fight Club', 1, 'Drama', '1999', 'Edward Norton se vuelve loco'),
(4, 'Pulp Fiction', 3, 'Accion', '1994', 'Falopa'),
(6, 'Reservoir Dogs', 3, 'Accion', '1992', 'Se mueren todos'),
(8, 'The Grand Budapest Hotel', 4, 'Drama', '2014', 'Voldemort maneja un hotel'),
(9, 'Isle of Dogs', 4, 'Drama', '2018', 'Perritos perdidos stopmotion'),
(10, 'Taxi Driver', 2, 'Drama', '1976', 'De Niro deja la mafia y se vuelve loco'),
(11, 'Shutter Island', 2, 'Drama', '2010', 'DiCaprio se vuelve loco '),
(12, 'Eraserhead', 5, 'Horror', '1977', 'Cosas raras'),
(19, 'Zodiac', 1, 'Crimen', '2007', 'asesino serial nunca es encontrado y deja pis'),
(20, 'Se7en', 1, 'Crimen', '1995', 'asesino serial ataca y deja pistas en base a '),
(21, 'The Social Network', 1, 'Drama', '2010', 'origen de facebook'),
(22, 'Goodfellas', 2, 'Crimen', '1990', 'buenos muchachos'),
(23, 'The Wolf of Wall Street', 2, 'Comedia', '2013', 'di caprio millonario mucha joda'),
(24, 'Killers of the Flower Moon', 2, 'Historica', '2023', 'de niro y dicaprio estafan a una familia de i');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(6, 'ro', '$2y$10$gyCP3D0nNLmv7hkC2KekCOn7i8Wh8X5joWGyVJ8qmydC/wgz6SAhS'),
(7, 'webadmin', '$2y$10$NQ9kevGQWUFDGvqE6ix3kucKrq3ewITihd/79jTLx9dTmt.4/ZNJW'),
(8, 'juani', '$2y$10$UzPlsYAmJBWeOWqgd9IbTe4mskPgNx.C7IwU0N9pzPpQ99DucCPHi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calificacion_usuario` (`id_usuario`),
  ADD KEY `fk_calificacion_pelis` (`id_pelis`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelis_director` (`id_director`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_pelis` FOREIGN KEY (`id_pelis`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `fk_calificacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_pelis_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
