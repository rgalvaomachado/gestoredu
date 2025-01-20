-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2025 at 11:17 PM
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
-- Table structure for table `atribuicao`
--

CREATE TABLE `atribuicao` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_sala` int NOT NULL,
  `cod_disciplina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `atribuicao`
--

INSERT INTO `atribuicao` (`id`, `cod_usuario`, `cod_sala`, `cod_disciplina`) VALUES
(1, 4, 15, 1),
(2, 4, 16, 40);

-- --------------------------------------------------------

--
-- Table structure for table `certificado`
--

CREATE TABLE `certificado` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `conteudo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `tamanho_letra` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `certificado`
--

INSERT INTO `certificado` (`id`, `nome`, `conteudo`, `tamanho_letra`) VALUES
(2, 'certificado 2', 'Certifico que %nome% participou do Simpósio Anual do Programa de Pós Graduação em Biologia Geral e Aplicada, do Instituto de Biociências de Botucatu - UNESP, realizado entre os dias 19 e 21/05/2024 em Botucatu, São Paulo, na qualidade de ouvinte, com carga horária de 20 horas. %frequencia%', 0),
(3, 'certificado 3', 'conteudo do certificado 3', 0),
(4, 'certificado 1', '', 10),
(5, 'certificado 4', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `configuracao`
--

CREATE TABLE `configuracao` (
  `id` int NOT NULL,
  `chave` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `valor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `configuracao`
--

INSERT INTO `configuracao` (`id`, `chave`, `valor`) VALUES
(1, 'tipo_frequencia', 2),
(2, 'frequencia', 5),
(3, 'aluno_nascimento', 1),
(4, 'aluno_rg', 1),
(5, 'aluno_cpf', 1),
(6, 'aluno_endereco', 0),
(7, 'aluno_telefone', 1),
(8, 'professor_telefone', 0),
(9, 'professor_nascimento', 0),
(10, 'professor_rg', 1),
(11, 'professor_cpf', 0),
(12, 'professor_endereco', 0),
(13, 'aluno_trabalho', 1),
(14, 'multi_chamada', 0),
(15, 'tamanho_letra_certificado', 80);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`) VALUES
(1, 'POO'),
(5, 'Futebol 1'),
(36, 'Futsal Ginasio'),
(37, 'Dar cadeirada'),
(38, 'Conversar com pombo mendigo'),
(40, 'Teste 22'),
(41, 'Teste 30'),
(42, 'projeto');

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(2, 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_sala` int NOT NULL,
  `cod_disciplina` int NOT NULL,
  `dia_semana` int NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `cor` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id`, `cod_usuario`, `cod_sala`, `cod_disciplina`, `dia_semana`, `hora_inicio`, `hora_fim`, `cor`) VALUES
(3, 6, 14, 38, 6, '09:00:00', '15:00:00', '#ff0000'),
(4, 6, 11, 1, 4, '15:01:00', '22:22:00', '#ffeb0a'),
(5, 4, 14, 1, 5, '01:00:00', '02:00:00', '#00ff00'),
(6, 4, 11, 1, 5, '10:00:00', '11:00:00', '#00ff33'),
(7, 7, 14, 1, 6, '22:00:00', '23:00:00', '#ff0000'),
(8, 6, 14, 1, 2, '15:00:00', '16:00:00', '#f73636'),
(9, 7, 16, 36, 2, '09:00:00', '10:30:00', '#ffffff'),
(10, 7, 16, 36, 3, '14:00:00', '15:30:00', '#ffffff'),
(11, 7, 14, 36, 1, '01:00:00', '02:00:00', '#49d100'),
(12, 7, 14, 36, 3, '01:00:00', '02:00:00', '#ff0a0a');

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

--
-- Dumping data for table `presenca`
--

INSERT INTO `presenca` (`id`, `cod_usuario`, `cod_grupo`, `cod_disciplina`, `cod_sala`, `presente`, `data`) VALUES
(1, 8, 1, 5, 2, 'S', '2023-07-18'),
(2, 8, 1, 5, 2, 'S', '2023-07-19'),
(3, 12, 1, 32, 11, 'S', '2024-05-08'),
(4, 15, 1, 32, 11, 'S', '2024-05-08'),
(5, 12, 1, 32, 11, 'S', '2024-05-14'),
(6, 15, 1, 32, 11, 'N', '2024-05-14'),
(7, 16, 2, 5, 11, 'S', '2024-05-13'),
(8, 15, 1, 5, 11, 'S', '2024-05-13'),
(9, 17, 1, 5, 11, 'N', '2024-05-13'),
(10, 17, 1, 5, 11, 'S', '2024-05-14'),
(11, 17, 1, 5, 11, 'S', '2024-05-15'),
(12, 17, 1, 5, 11, 'S', '2024-05-11'),
(13, 18, 1, 5, 11, 'S', '2024-05-15'),
(14, 15, 1, 5, 11, 'S', '2024-05-15'),
(15, 18, 1, 5, 11, 'N', '2024-05-18'),
(16, 18, 1, 5, 11, 'S', '2024-05-17'),
(17, 3, 1, 5, 11, 'S', '2024-05-20'),
(18, 3, 1, 5, 11, 'S', '2024-05-21'),
(19, 1, 1, 34, 12, 'S', '2024-06-03'),
(20, 1, 1, 34, 12, 'S', '2024-06-04'),
(21, 5, 1, 34, 12, 'S', '2024-06-03'),
(22, 1, 1, 33, 12, 'S', '2024-07-17'),
(23, 9, 1, 36, 16, 'N', '2024-09-15'),
(24, 1, 1, 36, 16, 'N', '2024-09-15'),
(25, 9, 1, 36, 16, 'N', '2024-09-16'),
(26, 1, 1, 36, 16, 'N', '2024-09-16'),
(27, 9, 1, 36, 16, 'S', '2024-09-17'),
(28, 1, 1, 36, 16, 'S', '2024-09-17'),
(31, 9, 1, 35, 15, 'N', '2024-09-15'),
(32, 1, 1, 35, 15, 'N', '2024-09-15'),
(33, 9, 1, 36, 15, 'S', '2024-09-15'),
(34, 1, 1, 36, 15, 'S', '2024-09-15'),
(35, 9, 1, 36, 15, 'S', '2024-09-16'),
(36, 1, 1, 36, 15, 'S', '2024-09-16'),
(37, 9, 1, 37, 23, 'S', '2024-09-15'),
(38, 9, 1, 37, 23, 'S', '2024-09-17'),
(39, 9, 1, 37, 23, 'S', '2024-09-17'),
(40, 9, 1, 37, 23, 'S', '2024-09-17'),
(41, 9, 1, 37, 23, 'S', '2024-09-17'),
(42, 9, 1, 37, 23, 'N', '2024-09-17'),
(43, 9, 1, 37, 23, 'N', '2024-09-17'),
(44, 9, 1, 37, 23, 'S', '2024-09-17'),
(45, 15, 1, 37, 15, 'S', '2024-11-30'),
(46, 9, 1, 1, 15, 'S', '2024-11-07'),
(47, 15, 1, 1, 15, 'N', '2024-11-07'),
(48, 9, 1, 1, 15, 'S', '2024-11-05'),
(49, 15, 1, 1, 15, 'N', '2024-11-05'),
(50, 9, 1, 1, 15, 'S', '2024-11-03'),
(51, 15, 1, 1, 15, 'N', '2024-11-03'),
(52, 9, 1, 1, 15, 'S', '2024-11-04'),
(53, 15, 1, 1, 15, 'N', '2024-11-04'),
(54, 9, 1, 1, 15, 'S', '2024-11-09'),
(55, 15, 1, 1, 15, 'N', '2024-11-09'),
(56, 9, 1, 1, 15, 'S', '2024-11-08'),
(57, 15, 1, 1, 15, 'N', '2024-11-08'),
(58, 9, 1, 36, 14, 'S', '2024-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `projeto`
--

CREATE TABLE `projeto` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `projeto`
--

INSERT INTO `projeto` (`id`, `nome`) VALUES
(1, 'Projeto'),
(18, 'teste'),
(19, 'teste'),
(20, 'teste'),
(21, 'teste'),
(22, 'teste'),
(24, '1'),
(25, '3'),
(26, '2'),
(27, 'projeto 10'),
(28, 'Projeto Teste'),
(29, 'Projeto Teste'),
(30, 'Projeto Teste 2'),
(31, 'Projeto Teste 2'),
(32, 'Projeto Teste 2');

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id`, `nome`) VALUES
(11, 'Unesp Botucatu'),
(14, 'Uniplan'),
(15, 'Ginasio'),
(16, 'Suman'),
(22, 'Teste 3'),
(23, 'Turminha do Romulo'),
(24, 'Sala 1');

-- --------------------------------------------------------

--
-- Table structure for table `sala_disciplina`
--

CREATE TABLE `sala_disciplina` (
  `id` int NOT NULL,
  `cod_sala` int NOT NULL,
  `cod_disciplina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `sala_disciplina`
--

INSERT INTO `sala_disciplina` (`id`, `cod_sala`, `cod_disciplina`) VALUES
(5, 16, 40),
(6, 14, 36),
(7, 23, 38),
(13, 16, 39),
(14, 16, 41),
(21, 15, 5),
(22, 24, 36),
(30, 22, 41),
(33, 22, 1),
(34, 22, 5),
(35, 11, 1),
(36, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `rg` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `cpf` bigint DEFAULT NULL,
  `rua` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `bairro` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `cidade` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `telefone` bigint DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `data_inscricao` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `data_nascimento`, `rg`, `cpf`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `telefone`, `email`, `senha`, `data_inscricao`) VALUES
(1, 'dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dev@hubis.com.br', 'MTIz', '2024-11-21'),
(4, 'professor 1', NULL, '12313', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-07-17'),
(6, 'professor 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-07-17'),
(7, 'Professor Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-09-09'),
(8, 'Luan 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(9, 'Aluno Luan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-09-10'),
(12, 'Professor 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-09-11'),
(15, 'Aluno Professor', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2024-11-19'),
(25, 'Teste 1', '2024-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14'),
(26, 'Teste 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14'),
(27, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(28, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(29, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(30, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(31, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(32, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(33, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(34, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(35, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(36, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-15'),
(48, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_grupo`
--

CREATE TABLE `usuario_grupo` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_grupo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id`, `cod_usuario`, `cod_grupo`) VALUES
(28, 6, 2),
(29, 5, 2),
(112, 3, 1),
(117, 12, 2),
(123, 7, 2),
(126, 1, 1),
(127, 10, 1),
(128, 11, 1),
(444, 13, 1),
(445, 14, 1),
(446, 15, 1),
(448, 9, 1),
(453, 4, 2),
(456, 8, 1),
(457, 37, 1),
(458, 38, 1),
(459, 39, 1),
(460, 40, 1),
(461, 41, 1),
(462, 42, 1),
(463, 43, 1),
(464, 44, 1),
(465, 45, 1),
(466, 46, 1),
(467, 47, 1),
(468, 48, 1),
(469, 49, 1),
(470, 50, 1),
(471, 51, 1),
(472, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_projeto`
--

CREATE TABLE `usuario_projeto` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_projeto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `usuario_projeto`
--

INSERT INTO `usuario_projeto` (`id`, `cod_usuario`, `cod_projeto`) VALUES
(1, 52, 26),
(6, 48, 32);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_sala`
--

CREATE TABLE `usuario_sala` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_sala` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `usuario_sala`
--

INSERT INTO `usuario_sala` (`id`, `cod_usuario`, `cod_sala`) VALUES
(21, 8, 18),
(22, 8, 14),
(202, 12, 16),
(203, 12, 11),
(211, 7, 15),
(212, 7, 16),
(221, 1, 15),
(222, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_sala_disciplina`
--

CREATE TABLE `usuario_sala_disciplina` (
  `id` int NOT NULL,
  `cod_usuario` int NOT NULL,
  `cod_sala` int NOT NULL,
  `cod_disciplina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `usuario_sala_disciplina`
--

INSERT INTO `usuario_sala_disciplina` (`id`, `cod_usuario`, `cod_sala`, `cod_disciplina`) VALUES
(16, 9, 16, 40),
(18, 9, 14, 36),
(19, 9, 23, 38),
(25, 9, 15, 1),
(26, 9, 15, 37),
(27, 15, 15, 37),
(29, 9, 16, 1),
(31, 1, 14, 36),
(32, 8, 11, 1),
(34, 48, 15, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribuicao`
--
ALTER TABLE `atribuicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `horario`
--
ALTER TABLE `horario`
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
-- Indexes for table `sala_disciplina`
--
ALTER TABLE `sala_disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_projeto`
--
ALTER TABLE `usuario_projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_sala`
--
ALTER TABLE `usuario_sala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_sala_disciplina`
--
ALTER TABLE `usuario_sala_disciplina`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribuicao`
--
ALTER TABLE `atribuicao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sala_disciplina`
--
ALTER TABLE `sala_disciplina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `usuario_projeto`
--
ALTER TABLE `usuario_projeto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario_sala`
--
ALTER TABLE `usuario_sala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `usuario_sala_disciplina`
--
ALTER TABLE `usuario_sala_disciplina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
