-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2019 às 05:33
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

CREATE DATABASE agenda;
USE agenda;
-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cidade` varchar(65) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `info` text,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `cidade`, `estado`, `email`, `info`, `categoria`) VALUES
(3, 'ClÃ©ber Machado', '(15) 5544-4455', 'Rio de Janeiro', 'RJ', 'cleber@globo.com', 'Hoje sim', 'Cliente'),
(4, 'Herson Capri', '(55) 9999-9999', 'SÃ£o Borja', 'RS', 'herson@capri.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nunc ipsum, malesuada ac mi sit amet, consectetur venenatis ipsum. Mauris eleifend varius turpis.', 'FuncionÃ¡rio'),
(5, 'Ednaldo Pereira', '(55) 3431-3431', 'SÃ£o Borja', 'RS', 'ednaldo@vale.com.br', '', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
