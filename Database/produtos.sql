-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Mar-2022 às 14:44
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtos`
--
CREATE DATABASE IF NOT EXISTS `produtos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `produtos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `sku`, `estoque`, `imagem`) VALUES
(1, 'Coca-Cola', '8,99', 'CCLAT', 1000, 'codigo_1.jpg'),
(2, 'Samsung Galaxy S8', '1.500,00', 'CELSGS8', 500, 'codigo_2.jpg'),
(3, 'iPhone X 64gb', '3.500,00', 'CELIPXCE64', 45, 'codigo_3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `variacao`
--

DROP TABLE IF EXISTS `variacao`;
CREATE TABLE IF NOT EXISTS `variacao` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `variacao`
--

INSERT INTO `variacao` (`id`, `tipo`, `descricao`) VALUES
(1, '2', 'Lata de Coca-Cola com variação de tamanho - lote de 350ml e 500ml'),
(2, '1', 'Smartphone Samsung Galaxy S8 com variação de cor - Preto e vermelho'),
(3, '3', 'iPhone X 64gb com variação de cor (cinza ou branco) e tamanho (normal ou Plus)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
