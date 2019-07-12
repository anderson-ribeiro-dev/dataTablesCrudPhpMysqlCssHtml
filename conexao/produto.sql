-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2019 às 01:04
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saudevip`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `prod_nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prod_foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_valorpago` double NOT NULL,
  `prod_valorvenda` double NOT NULL,
  `prod_quantidade` double NOT NULL,
  `prod_unidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `prod_nome`, `prod_foto`, `prod_valorpago`, `prod_valorvenda`, `prod_quantidade`, `prod_unidade`) VALUES
(30, 'tomada', '1636211482.png', 4, 8, 3, 'unidade'),
(31, '5', '2115954990.png', 5, 5, 5, '5'),
(32, '6', '1397056590.png', 6, 6, 6, '6'),
(33, '7', '406386300.png', 7, 7, 7, '7'),
(34, '8', '556813739.png', 8, 8, 8, '8'),
(35, 'taxinhas', '1640481759.png', 10, 10, 10, 'pacote'),
(38, 'alicate ', '1186847846.png', 10, 20, 30, 'unidade'),
(39, 'martelo', '340553589.png', 5, 10, 3, 'unidade'),
(40, 'chave de boca', '266334352.png', 2, 7, 5, 'unidade'),
(41, 'chave estrela******', '1985744344.png', 5, 10, 2, 'unidade*****'),
(43, 'teste', '1083199186.png', 1, 2, 2, 'metros');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
