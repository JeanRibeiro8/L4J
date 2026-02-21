-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Nov-2023 às 02:01
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `l4j`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empregos`
--

DROP TABLE IF EXISTS `empregos`;
CREATE TABLE IF NOT EXISTS `empregos` (
  `empregos` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `empregador` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `descricao` text,
  `data_publicacao` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `endereco` text,
  `salario` decimal(10,2) DEFAULT NULL,
  `vaga` enum('aberta','fechada') DEFAULT 'aberta',
  `empresa` varchar(255) DEFAULT 'TECnolo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empregos`
--

INSERT INTO `empregos` (`empregos`, `id`, `empregador`, `email`, `telefone`, `descricao`, `data_publicacao`, `categoria`, `endereco`, `salario`, `vaga`, `empresa`) VALUES
(0, 1, 'Jean Ribeiro', 'jeeeean@gmail.com', '997123356', 'Olá, estamos buscando técnicos m informática para nossos projetos', '2023-10-07', 'TI', 'R. João Augusto Ferreira Leite, 79 - Santo Antonio, Lorena - SP, 12608-625', '3000.00', 'aberta', 'TECnolo'),
(0, 2, 'Pedro', 'pedrinhodu@gmail.com', '987654485', 'Precisamos de Advogados experiêntes', '2023-09-09', 'Advogado', 'Av. Tomaz Alves Figueiredo, 176 - Vila Hepacare, Lorena - SP, 12608-346', '7500.50', 'fechada', 'PedroCONSORCE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `img` longblob,
  `celular` varchar(15) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `idade` int DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `nivel` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `img`, `celular`, `rg`, `cep`, `idade`, `senha`, `email`, `nivel`) VALUES
(1, 'Jean', NULL, NULL, NULL, NULL, NULL, '123', 'jean@gmail.com', 0),
(2, 'Carlos', NULL, NULL, NULL, NULL, NULL, '321', 'carlos@gmail.com', 1),
(3, 'Mateus', NULL, NULL, NULL, NULL, NULL, '890', 'mateus@gmail.com', 1),
(4, 'Gabriel', NULL, NULL, NULL, NULL, NULL, '098', 'gabriel@gmail.com', 1),
(5, 'Maker', NULL, NULL, NULL, NULL, NULL, '0000', 'dsvmaker@gmail.com', 1),
(8, 'João ', 0x57616c6c70617065722e6a7067, '111', '1', '1', 1, '1', 'yyy@v', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
