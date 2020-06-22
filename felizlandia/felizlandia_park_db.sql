-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 02:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `felizlandia_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `atracoes`
--

CREATE TABLE `atracoes` (
  `id_atracao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` varchar(1500) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atracoes`
--

INSERT INTO `atracoes` (`id_atracao`, `nome`, `valor`, `descricao`, `foto`, `categoria_id`) VALUES
(1, 'Carrossel', '23.00', 'colocar depois', '15924971055eeb93d13b6db.jpeg', 9),
(3, 'Roda Gigante', '20.00', 'colocar depois', '15924974555eeb952f6feb3.jpg', 11),
(4, 'Felizlândia Mount', '30.00', 'colocar depois', '15924969535eeb933971a4f.jpg', 6),
(7, 'Laser Tag', '12.00', 'aaa', '15925268375eec07f564eda.jpg', 7),
(9, 'Kamikaze', '12.00', 'aaa', '15926104655eed4ea1b64c9.jpg', 6),
(10, 'Show de Mágica', '12.00', 'aaa', '15925991215eed22511fb27.jpg', 5),
(11, 'Barco Viking', '13.00', 'dfsd', '15926112345eed51a2753f2.jpg', 7),
(12, 'High Water', '12.00', 'aaa', '15926117475eed53a3c568a.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(5, 'Show'),
(6, 'Radical'),
(7, 'Aventura'),
(9, 'Infantil'),
(10, 'Família'),
(11, 'Tradicional');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `email`, `password`) VALUES
(2, ' teste', 'teste1@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atracoes`
--
ALTER TABLE `atracoes`
  ADD PRIMARY KEY (`id_atracao`),
  ADD KEY `atracoes_ibfk_1` (`categoria_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `person`
  ADD UNIQUE (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atracoes`
--
ALTER TABLE `atracoes`
  MODIFY `id_atracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atracoes`
--
ALTER TABLE `atracoes`
  ADD CONSTRAINT `atracoes_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
