-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2020 às 20:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `felizlandia_park`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atracoes`
--

CREATE TABLE `atracoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` varchar(1500) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atracoes`
--

INSERT INTO `atracoes` (`id`, `nome`, `valor`, `descricao`, `foto`, `categoria_id`) VALUES
(12, 'Show de Mágica', '20.00', '                                                                                          sdasd                                                                                ', '15923805315ee9cc73056e0.jpg', 3),
(15, 'Montanha Russa', '35.00', 'sadfd', '15923801215ee9cad9862f3.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(11, 'Família'),
(15, 'Aventura'),
(17, 'Divertido'),
(18, 'Radical');

-- --------------------------------------------------------

--
-- Estrutura da tabela `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atracoes`
--
ALTER TABLE `atracoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AtracoesCategoria` (`categoria_id`);

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atracoes`
--
ALTER TABLE `atracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
