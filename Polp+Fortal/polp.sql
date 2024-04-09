-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/04/2024 às 21:37
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `polp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `mercado`
--

CREATE TABLE `mercado` (
  `Id_Mercado` int(11) NOT NULL,
  `Nome_Mercado` varchar(255) NOT NULL,
  `Imagem_Mercado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mercado`
--

INSERT INTO `mercado` (`Id_Mercado`, `Nome_Mercado`, `Imagem_Mercado`) VALUES
(1, 'Popular Atacadista', '1674602642487'),
(3, 'Compremax', 'images (2).jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `Id_produto` int(11) NOT NULL,
  `Nome_Produto` varchar(255) NOT NULL,
  `Imagem_Produto` varchar(255) NOT NULL,
  `Pesquisas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`Id_produto`, `Nome_Produto`, `Imagem_Produto`, `Pesquisas`) VALUES
(1, 'Arroz Camil 3kg', '878df406bf2d17d6ed33e7ea9df17859.png', 269),
(2, 'Feijao kek2', 'images (2).jpeg', 82),
(3, 'Arroz Camil 2kg', 'images (2).jpeg', 84),
(4, 'CAFE PILAO', 'images (2).jpeg', 237);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome`, `Login`, `Senha`, `Tipo`) VALUES
(1, 'Vinicius Pereira Matos', 'vinipmatos700@gmail.com', 'eb72e98bd44a884fe6fb5f3be7218946', 0),
(2, 'Mateusujo', 'Mateusjo', 'e367edc91cf9c9be0250a2c53442ffef', 1),
(11, 'Compremax', 'nsei@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `valores`
--

CREATE TABLE `valores` (
  `Id_Valor` int(11) NOT NULL,
  `Id_Mercado` int(11) NOT NULL,
  `Id_Produto` int(11) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Preco_Anterior1` decimal(10,2) NOT NULL,
  `Preco_Anterior2` decimal(10,2) NOT NULL,
  `Preco_Anterior3` decimal(10,2) NOT NULL,
  `Preco_Anterior4` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `valores`
--

INSERT INTO `valores` (`Id_Valor`, `Id_Mercado`, `Id_Produto`, `Valor`, `Preco_Anterior1`, `Preco_Anterior2`, `Preco_Anterior3`, `Preco_Anterior4`) VALUES
(71, 1, 3, 4.00, 0.00, 0.00, 0.00, 0.00),
(72, 3, 3, 1.00, 0.00, 0.00, 0.00, 0.00),
(73, 1, 1, 46.00, 36.00, 26.00, 16.00, 6.00),
(74, 3, 1, 42.00, 32.00, 22.00, 12.00, 2.00),
(75, 1, 4, 7.00, 0.00, 0.00, 0.00, 0.00),
(76, 3, 4, 8.00, 0.00, 0.00, 0.00, 0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `mercado`
--
ALTER TABLE `mercado`
  ADD PRIMARY KEY (`Id_Mercado`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Índices de tabela `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`Id_Valor`),
  ADD KEY `FK_Mercado` (`Id_Mercado`),
  ADD KEY `FK_Produto` (`Id_Produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mercado`
--
ALTER TABLE `mercado`
  MODIFY `Id_Mercado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `valores`
--
ALTER TABLE `valores`
  MODIFY `Id_Valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `valores`
--
ALTER TABLE `valores`
  ADD CONSTRAINT `FK_Mercado` FOREIGN KEY (`Id_Mercado`) REFERENCES `mercado` (`Id_Mercado`),
  ADD CONSTRAINT `FK_Produto` FOREIGN KEY (`Id_Produto`) REFERENCES `produtos` (`Id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
