-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `complento` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `uf` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_AUTORES_USUARIOS1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_livro`
--

CREATE TABLE IF NOT EXISTS `cliente_livro` (
  `livro_id` int(11) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `avaliacao` tinyint(4) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `USUARIO_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`livro_id`),
  KEY `fk_CLIENTES_has_LIVROS_LIVROS1_idx` (`livro_id`),
  KEY `fk_CLIENTES_LIVROS_PLAYLISTS1_idx` (`playlist_id`),
  KEY `fk_CLIENTES_LIVROS_AUTORES1_idx` (`autor_id`),
  KEY `fk_CLIENTE_LIVRO_USUARIO1_idx` (`USUARIO_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` char(18) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `livro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_editora_LIVROS1_idx` (`livro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`) VALUES
(1, 'Ação e aventura'),
(2, 'Arte e Fotografia'),
(3, 'Autoajuda'),
(4, 'Biografia Gastronomia'),
(5, 'Científica'),
(6, 'Conto Infantil'),
(7, 'Distopia'),
(8, 'Fantasia'),
(9, 'Ficção'),
(10, 'Ficção histórica'),
(11, 'Ficção Policial'),
(12, 'História'),
(13, 'Horror'),
(14, 'Humanidades e CiênciasSociais'),
(15, 'Humor'),
(16, 'Memórias e autobiografia'),
(17, 'Realismo mágico'),
(18, 'Romance'),
(19, 'Tecnologiae Ciência Infantil'),
(20, 'Thrillere'),
(21, 'Suspense'),
(22, 'Viajem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `sinopse` text NOT NULL,
  `ano_publicacao` int(4) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `situacao` enum('ativado','desativado') NOT NULL,
  `GENERO_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`GENERO_id`),
  KEY `fk_LIVRO_GENERO1_idx` (`GENERO_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `subtitulo`, `sinopse`, `ano_publicacao`, `capa`, `data_cadastro`, `situacao`, `GENERO_id`) VALUES
(3, 'livro teste', 'teste 01', 'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf', 2004, 'teste/teste', '2022-05-13 14:22:05', 'ativado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_autor`
--

CREATE TABLE IF NOT EXISTS `livro_autor` (
  `livro_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  `tipo_pagamento` tinyint(4) NOT NULL,
  PRIMARY KEY (`livro_id`,`autor_id`),
  KEY `fk_LIVROS_has_AUTORES_AUTORES1_idx` (`autor_id`),
  KEY `fk_LIVROS_has_AUTORES_LIVROS1_idx` (`livro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `situacao` enum('ativado','desativado') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `situacao` enum('ativado','desativado') NOT NULL,
  `tipo` enum('administrador','cliente','autor') NOT NULL,
  `celular1` varchar(15) DEFAULT NULL,
  `celular2` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EMAIL_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_AUTORES_USUARIOS1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `cliente_livro`
--
ALTER TABLE `cliente_livro`
  ADD CONSTRAINT `fk_CLIENTES_has_LIVROS_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTES_LIVROS_PLAYLISTS1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTES_LIVROS_AUTORES1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTE_LIVRO_USUARIO1` FOREIGN KEY (`USUARIO_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `editora`
--
ALTER TABLE `editora`
  ADD CONSTRAINT `fk_editora_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_LIVRO_GENERO1` FOREIGN KEY (`GENERO_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_AUTORES1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
