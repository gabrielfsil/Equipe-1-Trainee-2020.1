-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 05:12 AM
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
(1, 'Carrossel', '23.00', 'Diversão suave e relaxante para as crianças, elas podem ouvir diferentes\r\n                      musicas enquanto usam o brinquedo.\r\nA idade mínima para esta atração é 3 anos e máxima 10 anos. A atração funciona de 00:00hs às 00:00hs.', '15924971055eeb93d13b6db.jpeg', 9),
(3, 'Roda Gigante', '20.00', 'Uma das atrações mais tradicionais do parque que possibilita admirar uma linda vista do mesmo, você sua família e amigos podem curtir altura de forma relaxante. A atração funciona de 00hs as 00hs.', '15924974555eeb952f6feb3.jpg', 17),
(4, 'Pets Park', '30.00', 'Não quer se divertir sozinho? Traga seu grande amigo temos espaços para seus pets também! Nessa área os bichinhos podem brincar e se exercitar com os donos. Funciona de 00hs às 00hs', '15933112225ef7fff66f92a.jpg', 10),
(7, 'Laser Tag', '12.00', 'Um jogo de esconde esconde mais divertido para aproveitar com os amigos e treinar sua mira com as armas de laser. A idade mínima para essa atração é 10 anos. A atração funciona de 00hs as 00hs.', '15925268375eec07f564eda.jpg', 7),
(9, 'Kamikaze', '12.00', 'Para sentir frio na barriga como nunca antes é o brinquedo mais recomendado, funciona como um pêndulo, mas diferente do Barco Viking ele dá voltas de 360º deixando você de cabeça para baixo por alguns segundos.', '15926104655eed4ea1b64c9.jpg', 6),
(10, 'Show de Mágica', '12.00', 'Temos apresenttações com os melhores mágicos da cidade com diversos números para todos os públicos.', '15925991215eed22511fb27.jpg', 5),
(11, 'Barco Viking', '13.00', 'Esta atração simula um barco em alto mar, podendo chegar a 10 metros com movimentos velozes de um lado para o outro.', '15926112345eed51a2753f2.jpg', 7),
(12, 'High Water', '23.50', 'Nossa montanha russa na água,nele os visitantes passeiam a 15 metros de altura até despencarem a 80 Kmh em um tanque de água. A idade mínima para essa atração é 12 anos. A atração funciona de 00hs a 00hs.', '15926117475eed53a3c568a.jpg', 6),
(16, 'Big Tower', '30.00', 'Com 100 metros, a Big Tower é uma das maiores torres radicais do mundo! Sua altura é equivalente a um prédio de mais de 30 andares. Na queda o elevador chega a uma velocidade de 120kmh.É uma experiência única.\r\nA idade mínima para esta atração é 14 anos.\r\nA atração funciona das 00hs as 00hs.', '15932812175ef78ac13cb8d.jpg', 6),
(17, 'Tirolesa', '26.00', 'Nosso parque conta com uma área para tirolesa de 15 metros de altura e 110 metros de percurso, que proporciona uma experiência única de passar por cima de todo o parque. A idade mínima pra essa atração é 14 anos. A atração funciona de 00hs às 00hs.\r\n', '15932994575ef7d2017057f.jpeg', 6),
(18, 'Epic High', '26.00', 'A segunda montanha russa mais alta do parque, com 27m de altura conta com 3 loopings e chega\r\n a quase 90kmh. A idade mínima para esta atração é 12 anos. São dois assentos por fileira. \r\nA atração funciona de 00:00hs às 00:00hs', '15933007875ef7d733e04a7.jpg', 6),
(19, 'Globo da Morte', '24.50', 'Aproveite esse incrível show com vários motoqueiros habilidosos que conseguem pilotar suas motos dentro de um globo! Essa atração é livre para todos os públicos e funciona das 00hs às 00hs.', '15933010815ef7d8590a964.jpg', 5),
(20, 'Paintball', '36.00', 'Uma alternativa mais radical ao Laser Tag um jogo de caça a bandeira onde você pode trocar tiros de tinta com seus amigos e formar equipes!A idade mínima para essa atração é 15 anos e funciona de 00hs as 00hs.', '15933016585ef7da9a52850.jpg', 7),
(21, 'Carrinho Bate-Bate', '34.00', 'Um dos brinquedos mais tradicionais do parque capaz de divertir muito você e sua família com o famoso choque entre carrinhos. A atração é livre para todos os públicos mas menores de 7 anos devem estar acompanhados dos pais. Funciona de 00hs às 00hs.', '15933110395ef7ff3f1fa9b.jpg', 17),
(22, 'Cassa do Terror', '23.00', 'Essa é para quem aprecia coisas horripilantes e sustos a casa do terror é cheia de surpresas, a idade mínima para essa atração é 12 anos. Funciona de 00hs as 00hs.', '15933027555ef7dee388f38.jpg', 7),
(23, 'Kids Place', '25.00', 'Esse espaço é dedicado às crianças com diferentes brinquedos além das piscinas de bolinha, a idade máxima para essa atração é 9 anos. Funciona de 00hs às 00hs', '15933031565ef7e07428f35.jpg', 9),
(24, 'Teatro Mágico', '36.00', 'Liderado pelo grupo musical O Teatro Mágico, trazem um show  projeto que reúne elementos do circo, do teatro, da poesia, da música, da literatura, essa atração é livre para todos os públicos. Funciona de 00hs às 00hs.', '15933033525ef7e138a78ce.jpg', 5),
(25, 'Campo de obstáculos', '34.00', 'Tenha uma dose moderada de aventura com nosso campo de obstáculos aproveite para se divertir enquanto gasta energia. A idade mínima para essa atração é 11 anos. Funciona de 00s às 00hs.', '15933037305ef7e2b2f3584.png', 7),
(27, 'Cinema 4d', '22.50', 'Quer ter a sensação de estar dentro de um filme? No nosso cinema 4d as salas conseguem reproduzir mais de 20 sensações – frio ou calor, vento, movimentos, cheiros, fumaça – graças a ventiladores, raios laser, máquinas de fumaça, duchas e poltronas que balançam, tremem e até simulam queda. É uma experiência incrível! A idade para a atração depende do filme. A atração funciona de 00hs a 00hs.\r\n', '15933109795ef7ff03abb55.jpg', 10),
(28, 'Samba', '22.00', 'Um roda-roda mais divertido o samba ou também chamado de \"pandeiro\" pode chegar a 50kmh. A idade mínima para essa atração é 12 anos. Funciona de 00hs as 00hs.', '15933051755ef7e85758243.jpg', 17),
(29, 'Felizlândia Mount', '40.00', 'A montanha russa mais alta e mais famosa do parque, com 32m de altura conta com 5 loopings e chega\r\n          a quase 100kmh. A idade mínima para esta atração é 12 anos. São dois assentos por fileira. \r\nA atração funciona de 00:00hs às 00:00hs\r\n', '15933111755ef7ffc73a585.jpg', 6);

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
(17, 'Tradicional');

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
(2, ' teste', 'teste@gmail.com', '87654321'),
(5, 'teste2', 'teste2@gmail.com', '87654321');

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atracoes`
--
ALTER TABLE `atracoes`
  MODIFY `id_atracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
