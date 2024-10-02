-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2024 às 19:18
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_autor` int(11) NOT NULL,
  `NomeAutor` varchar(20) NOT NULL,
  `Sobrenome` varchar(20) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Emily', 'Brontë', 'emily.bronte@example.com', '1818-07-30'),
(2, 'Gabriel', 'García Márquez', 'gabriel.garcia@example.com', '1927-03-06'),
(3, 'J.D.', 'Salinger', 'jd.salinger@example.com', '1919-01-01'),
(4, 'Stieg', 'Larsson', 'stieg.larsson@example.com', '1954-08-15'),
(5, 'Antoine', 'de Saint-Exupéry', 'antoine.saint@example.com', '1900-06-29'),
(6, 'Jane', 'Austen', 'jane.austen@example.com', '1775-12-16'),
(7, 'George', 'Orwell', 'george.orwell@example.com', '1903-06-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(1, 1, '1847-12-01', 'Thomas Cautley Newby'),
(2, 1, '1847-12-01', 'Thomas Cautley Newby'),
(3, 2, '1967-06-05', 'Editorial Sudamericana'),
(4, 3, '1951-07-16', 'Little, Brown and Company'),
(5, 4, '2005-08-01', 'Norstedts Förlag'),
(6, 4, '2005-08-01', 'Norstedts Förlag'),
(7, 5, '1943-04-06', 'Éditions Gallimard'),
(1, 5, '1943-04-06', 'Éditions Gallimard');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cid_livro` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `ISBN` varchar(17) NOT NULL,
  `Idioma` varchar(20) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cid_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, '\"O Morro dos Ventos Uivantes', 'Romance	', '978-85-359-0277-1', 'Português', 350),
(2, 'Cem Anos de Solidão', 'Ficção', '978-85-220-0962-4', 'Espanhol', 496),
(3, 'The Catcher in the Rye', 'Literatura', '978-0-316-76948-0', 'Inglês', 277),
(4, 'Os Homens que Não Amavam as Mulheres', 'Mistério', '978-85-98304-86-4', 'Português', 522),
(5, 'O Pequeno Príncipe', 'Infanto-juvenil', '978-3-16-148410-0', 'Francês', 96);

--
-- Índices para tabelas despejadas
--
CREATE TABLE `usuario`(
  `Login` varchar(5) NOT NULL,
  `Senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuario` (`Login`, `Senha`) VALUES
('a', 123),
('b', 456);
--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cid_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cid_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
