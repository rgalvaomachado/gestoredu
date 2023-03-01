-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql209.epizy.com
-- Tempo de geração: 23/05/2022 às 01:11
-- Versão do servidor: 10.3.27-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_31638575_atenasystem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alune`
--

CREATE TABLE `alune` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `cod_sala` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comissao`
--

CREATE TABLE `comissao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitore`
--

CREATE TABLE `monitore` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `presenca`
--

CREATE TABLE `presenca` (
  `id` int(11) NOT NULL,
  `cod_alune` int(11) NOT NULL,
  `cod_sala` int(11) NOT NULL,
  `cod_tutore` int(11) NOT NULL,
  `cod_monitore` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `presente` enum('S','N','J') COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `representante`
--

CREATE TABLE `representante` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tutore`
--

CREATE TABLE `tutore` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `cod_disciplina` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alune`
--
ALTER TABLE `alune`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comissao`
--
ALTER TABLE `comissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `monitore`
--
ALTER TABLE `monitore`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tutore`
--
ALTER TABLE `tutore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alune`
--
ALTER TABLE `alune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comissao`
--
ALTER TABLE `comissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `monitore`
--
ALTER TABLE `monitore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `representante`
--
ALTER TABLE `representante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tutore`
--
ALTER TABLE `tutore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
