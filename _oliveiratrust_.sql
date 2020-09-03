-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Set-2020 às 19:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oliveiratrust`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `IDcliente` int(11) NOT NULL,
  `IDproduto` int(11) NOT NULL,
  `IDagenda` int(11) NOT NULL,
  `situacao_atual` enum('Pago','Em aberto','cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`data`, `hora`, `IDcliente`, `IDproduto`, `IDagenda`, `situacao_atual`) VALUES
('2020-09-02', '12:24:00', 7, 6, 1, 'Em aberto'),
('2020-09-03', '19:12:00', 7, 4, 5, 'Pago'),
('2020-09-10', '15:13:00', 7, 2, 6, 'cancelado'),
('2020-09-02', '12:24:00', 7, 2, 7, 'Em aberto'),
('2020-09-04', '12:24:00', 4, 5, 11, 'Em aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `IDcliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nivel` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`IDcliente`, `nome`, `email`, `senha`, `telefone`, `nivel`) VALUES
(4, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '21994951589', 1),
(7, 'marcos', 'vasco-mp@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2189654523', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `IDproduto` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`IDproduto`, `nome_produto`) VALUES
(1, 'batata'),
(2, 'morango'),
(4, 'cocos'),
(5, 'maçã'),
(6, 'ameixa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDagenda`),
  ADD KEY `IDcliente` (`IDcliente`),
  ADD KEY `IDproduto` (`IDproduto`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDcliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`IDproduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `IDproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `cliente` (`IDcliente`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`IDproduto`) REFERENCES `produto` (`IDproduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
