-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 05:20 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelis_director` (`id_director`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_pelis_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
