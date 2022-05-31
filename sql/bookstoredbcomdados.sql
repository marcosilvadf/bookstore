-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2022 às 15:20
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `complento` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `uf` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`, `logradouro`, `complento`, `numero`, `bairro`, `cidade`, `cpf`, `uf`, `cep`, `usuario_id`) VALUES
(7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_livro`
--

CREATE TABLE `cliente_livro` (
  `livro_id` int(11) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `avaliacao` tinyint(4) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `USUARIO_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `livro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 'Humanidades e Ciências Sociais'),
(15, 'Humor'),
(16, 'Memórias e autobiografia'),
(17, 'Realismo mágico'),
(18, 'Romance'),
(19, 'Tecnologia e Ciência Infantil'),
(20, 'Thrillere'),
(21, 'Suspense'),
(22, 'Viajem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `sinopse` text NOT NULL,
  `ano_publicacao` int(4) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `livropath` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `situacao` enum('ativado','desativado') NOT NULL,
  `GENERO_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `subtitulo`, `sinopse`, `ano_publicacao`, `capa`, `livropath`, `data_cadastro`, `situacao`, `GENERO_id`) VALUES
(3, 'livro teste', 'teste 01', 'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf', 2004, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-13 14:22:05', 'ativado', 1),
(4, 'As cronicas desconhecidas', 'conhecendo o desconhecido', 'o livro fala de absolutamente nada', 2005, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-15 14:48:39', 'ativado', 2),
(5, 'sem titulo', 'sem subtitulo', 'sem sinopse', 2000, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-15 18:22:40', 'ativado', 5),
(6, 'sem titulo', 'conhecendo o desconhecido', 'asdf', 2009, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:08:54', 'ativado', 18),
(7, 'As cronicas desconhecidas', 'conhecendo o desconhecido', '', 2022, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:10:27', 'ativado', 18),
(8, 'As cronicas desconhecidas', 'conhecendo o desconhecido', '', 2022, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:11:49', 'ativado', 18),
(9, 'As cronicas desconhecidas', 'conhecendo o desconhecido', '', 2022, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:14:14', 'ativado', 18),
(10, 'harry potter', 'e a fenix', 'asdf', 2018, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:18:08', 'ativado', 17),
(11, 'transformers', 'a era da extinçao', 'asdf', 2010, '/image/livrosCapas/6285630bdd137.png', '', '2022-05-18 21:20:11', 'ativado', 1),
(12, 'senhor dos aneis', 'fazendo pastel', 'asdf', 2000, '/image/livrosCapas/628570d9b00f9.jpg', '', '2022-05-18 22:19:05', 'ativado', 17),
(13, 'teste autoajuda', 'ajuda', 'testesstestese', 2006, '/image/livrosCapas/628805b201c88.png', '', '2022-05-20 21:18:42', 'ativado', 3),
(16, 'sem titulo', 'sem subtitulo', 'asdf', 2005, '/image/livrosCapas/628825959af7b.png', '/files/livros/628825959af90.pdf', '2022-05-20 23:34:45', 'ativado', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `livro_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  `tipo_pagamento` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(50) NOT NULL,
  `situacao` enum('ativado','desativado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `playlist`
--

INSERT INTO `playlist` (`id`, `data_criacao`, `titulo`, `situacao`) VALUES
(2, '2022-05-17 18:59:54', 'sem titulo', 'ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `situacao` enum('ativado','desativado') NOT NULL,
  `tipo` enum('administrador','cliente','autor') NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `data_nascimento`, `password`, `data_cadastro`, `situacao`, `tipo`, `celular`, `senha`) VALUES
(3, 'Admin', 'admin@gmail.com', '2022-05-18', '', '2022-05-01 17:33:48', 'ativado', 'administrador', '(61) 999999999', '21232f297a57a5a743894a0e4a801fc3'),
(21, 'Marcos', 'cliente1@gmail.com', '2001-09-18', '', '2022-05-20 22:46:08', 'ativado', 'cliente', '(33) 33333-3333', 'dfefdb66581190514404f57cdf74a8eb'),
(22, 'Marcos', 'autor@gmail.com', '2001-09-18', '', '2022-05-20 22:46:23', 'ativado', 'autor', '(33) 33333-3333', 'dfefdb66581190514404f57cdf74a8eb');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_AUTORES_USUARIOS1_idx` (`usuario_id`);

--
-- Índices para tabela `cliente_livro`
--
ALTER TABLE `cliente_livro`
  ADD PRIMARY KEY (`livro_id`),
  ADD KEY `fk_CLIENTES_has_LIVROS_LIVROS1_idx` (`livro_id`),
  ADD KEY `fk_CLIENTES_LIVROS_PLAYLISTS1_idx` (`playlist_id`),
  ADD KEY `fk_CLIENTES_LIVROS_AUTORES1_idx` (`autor_id`),
  ADD KEY `fk_CLIENTE_LIVRO_USUARIO1_idx` (`USUARIO_id`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_editora_LIVROS1_idx` (`livro_id`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`,`GENERO_id`),
  ADD KEY `fk_LIVRO_GENERO1_idx` (`GENERO_id`);

--
-- Índices para tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`livro_id`,`autor_id`),
  ADD KEY `fk_LIVROS_has_AUTORES_AUTORES1_idx` (`autor_id`),
  ADD KEY `fk_LIVROS_has_AUTORES_LIVROS1_idx` (`livro_id`);

--
-- Índices para tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_AUTORES_USUARIOS1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente_livro`
--
ALTER TABLE `cliente_livro`
  ADD CONSTRAINT `fk_CLIENTES_LIVROS_AUTORES1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTES_LIVROS_PLAYLISTS1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTES_has_LIVROS_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTE_LIVRO_USUARIO1` FOREIGN KEY (`USUARIO_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `editora`
--
ALTER TABLE `editora`
  ADD CONSTRAINT `fk_editora_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_LIVRO_GENERO1` FOREIGN KEY (`GENERO_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_AUTORES1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
