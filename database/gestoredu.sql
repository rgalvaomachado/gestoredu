-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 09:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestoredu`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuracao`
--

CREATE TABLE `configuracao` (
  `id` int NOT NULL,
  `chave` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `valor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `presenca`
--

CREATE TABLE `presenca` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_grupo` int NOT NULL,
  `cod_disciplina` int DEFAULT NULL,
  `cod_sala` int DEFAULT NULL,
  `presente` enum('S','N','J') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `projeto`
--

CREATE TABLE `projeto` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `rg` varchar(9) COLLATE utf8mb3_swedish_ci NOT NULL,
  `cpf` int NOT NULL,
  `rua` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `telefone` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `data_inscricao` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `grupos` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `disciplinas` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `salas` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
