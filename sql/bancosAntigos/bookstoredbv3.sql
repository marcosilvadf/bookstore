-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2022 às 19:10
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
(1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_livro`
--

CREATE TABLE `cliente_livro` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `avaliacao` tinyint(4) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `USUARIO_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente_livro`
--

INSERT INTO `cliente_livro` (`id`, `livro_id`, `comentario`, `avaliacao`, `playlist_id`, `autor_id`, `USUARIO_id`) VALUES
(9, 15, NULL, NULL, 10, NULL, 7);

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
(20, 'Thriller e suspense'),
(21, 'Viajem'),
(23, 'literatura');

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
(13, 'A arte da guerra', 'Sun Tzu', 'Sun Tzu disse: a guerra é de vital importância para o Estado; é o\r\ndomínio da vida ou da morte, é o caminho para a sobrevivência ou a\r\nperda do Império: é preciso manejá-la bem. Não refletir seriamente\r\nsobre tudo o que lhe concerne é dar prova de lastimável indiferença no\r\nque diz respeito à conservação ou à perda do que nos é mais querido; e\r\nisso não deve ocorrer entre nós.', 2010, '/image/livrosCapas/6288eb20c2c95.jpg', '/files/livros/6288eb20c2ca6.pdf', '2022-05-21 13:37:36', 'ativado', 12),
(14, 'A Revolução dos Bichos', 'George Orwell', 'Revolução dos Bichos é uma distopia, um livro alegórico de George Orwell, publicado em 17 de agosto de 1945, há setenta anos, na Inglaterra. De acordo com Orwell, o livro reflete os acontecimentos que se seguiram à Revolução Comunista de 1917.', 2015, '/image/livrosCapas/6288ed9184287.jpg', '/files/livros/6288ed918429c.pdf', '2022-05-21 13:48:01', 'ativado', 23),
(15, 'O Filho do Impostor', 'O Filho do Impostor', 'No decorrer da história ele acaba se envolvendo com um gangster da pesada chamado Murdock, que tem um bando de safados trabalhando pra ele e que aperta o cerco em torno de Dickson até que este aceita fazer alguns trabalhos pra ele.', 1978, '/image/livrosCapas/628a82acd0217.jpg', '/files/livros/628a82acd04e7.pdf', '2022-05-22 18:36:28', 'ativado', 1);

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
(10, '2022-05-23 17:07:07', 'Leituras', 'ativado');

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
(6, 'admin', 'admin@gmail.com', '2001-09-18', '', '2022-05-21 14:02:09', 'ativado', 'administrador', '(61) 99500-8325', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'marcos', 'marcos@cliente.com', '2001-09-18', '', '2022-05-21 14:04:18', 'ativado', 'cliente', '(61) 99500-8325', 'c5e3539121c4944f2bbe097b425ee774'),
(8, 'marcos', 'marcos@autor.com', '2001-09-18', '', '2022-05-21 14:04:32', 'ativado', 'autor', '(61) 99500-8325', 'c5e3539121c4944f2bbe097b425ee774');

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente_livro`
--
ALTER TABLE `cliente_livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
