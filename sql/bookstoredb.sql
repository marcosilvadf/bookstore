-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2022 às 22:26
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
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id`, `livro_id`, `comentario`, `playlist_id`, `usuario_id`) VALUES
(1, 13, 'testeee', NULL, 8),
(2, 14, 'testeee', NULL, 12),
(3, 14, 'alooooo', NULL, 12),
(28, NULL, NULL, 2, NULL),
(29, NULL, NULL, 3, NULL),
(30, NULL, NULL, 4, NULL),
(31, NULL, NULL, 5, NULL),
(32, NULL, NULL, 6, NULL),
(33, NULL, NULL, 7, NULL),
(34, NULL, NULL, 8, NULL),
(35, NULL, NULL, 9, NULL),
(36, 14, 'teste', NULL, 12),
(37, NULL, NULL, 10, 12),
(38, NULL, NULL, 11, NULL),
(39, NULL, NULL, 12, 12),
(40, NULL, NULL, 13, 12),
(46, 21, 'muito bom', NULL, 20),
(55, 16, 'livro estranho', NULL, 7),
(67, 16, 'muito bom', NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `uf` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT 'DF',
  `cep` varchar(10) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `logradouro`, `complemento`, `numero`, `bairro`, `cidade`, `cpf`, `uf`, `cep`, `usuario_id`) VALUES
(1, 'bairro', 'rua 12, conjunto B', '22', 'Mansões Camargo', 'Águas Lindas de Goiás', '123.456.789-00', 'GO', '72927-012', 8),
(2, 'bairro', 'rua 12, conjunto B', '22', 'Mansões Camargo', 'Águas Lindas de Goiás', '123.456.789-00', 'GO', '72927-012', 24),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'DF', NULL, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
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
  `situacao` enum('ativado','desativado') NOT NULL DEFAULT 'desativado',
  `genero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `subtitulo`, `sinopse`, `ano_publicacao`, `capa`, `livropath`, `data_cadastro`, `situacao`, `genero_id`) VALUES
(13, 'A arte da guerra', 'Sun Tzu', 'Sun Tzu disse: a guerra é de vital importância para o Estado; é o\r\ndomínio da vida ou da morte, é o caminho para a sobrevivência ou a\r\nperda do Império: é preciso manejá-la bem. Não refletir seriamente\r\nsobre tudo o que lhe concerne é dar prova de lastimável indiferença no\r\nque diz respeito à conservação ou à perda do que nos é mais querido; e\r\nisso não deve ocorrer entre nós.', 2006, '/image/livrosCapas/6288eb20c2c95.jpg', '/files/livros/6288eb20c2ca6.pdf', '2022-05-21 16:37:36', 'ativado', 1),
(14, 'A Revolução dos Bichos', 'George Orwell', 'Revolução dos Bichos é uma distopia, um livro alegórico de George Orwell, publicado em 17 de agosto de 1945, há setenta anos, na Inglaterra. De acordo com Orwell, o livro reflete os acontecimentos que se seguiram à Revolução Comunista de 1917.', 2015, '/image/livrosCapas/6288ed9184287.jpg', '/files/livros/6288ed918429c.pdf', '2022-05-21 16:48:01', 'ativado', 1),
(15, 'O Filho do Impostor', 'O Filho do Impostor', 'No decorrer da história ele acaba se envolvendo com um gangster da pesada chamado Murdock, que tem um bando de safados trabalhando pra ele e que aperta o cerco em torno de Dickson até que este aceita fazer alguns trabalhos pra ele.', 1978, '/image/livrosCapas/628a82acd0217.jpg', '/files/livros/628a82acd04e7.pdf', '2022-05-22 21:36:28', 'ativado', 1),
(16, 'Dom Casmurro', 'Machado de Asis', 'Dom Casmurro, um dos romances mais conhecidos do autor, foi publicado pela primeira vez em 1900. Bentinho, Capitu e Escobar são os protagonistas do enigmático triângulo amoroso criado por Machado de Assis e já fazem parte de nosso imaginário', 2019, '/image/livrosCapas/629cc6baf21c7.jpg', '/files/livros/629cc6baf21e6.pdf', '2022-06-05 18:07:38', 'ativado', 1),
(21, 'sem titulo', 'sem subtitulo', 'SDsdffe', 2006, '/image/livrosCapas/629e77954dda5.jpg', '/files/livros/629e77954ddb5.pdf', '2022-06-06 21:54:29', 'ativado', 17),
(22, 'sem titulo', 'sem subtitulo', 'SDsdffe', 2006, '/image/livrosCapas/629e78c596b9e.jpg', '/files/livros/629e78c596bae.pdf', '2022-06-06 21:59:33', 'ativado', 17),
(23, 'sem titulo', 'sem subtitulo', 'SDsdffe', 2006, '/image/livrosCapas/629e79e13be3d.jpg', '/files/livros/629e79e13be4a.pdf', '2022-06-06 22:04:17', 'desativado', 17),
(24, 'As cronicas desconhecidas', 'sem subtitulo', 'fdfwedf', 2005, '/image/livrosCapas/629e88e75fb12.jpg', '/files/livros/629e88e75fb2e.pdf', '2022-06-06 23:08:23', 'ativado', 18),
(25, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e8de66c82e.jpg', '/files/livros/629e8de66c843.pdf', '2022-06-06 23:29:42', 'desativado', 17),
(26, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e8f779e93d.jpg', '/files/livros/629e8f779e955.pdf', '2022-06-06 23:36:23', 'desativado', 17),
(27, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e921b1b15b.jpg', '/files/livros/629e921b1b171.pdf', '2022-06-06 23:47:39', 'desativado', 17),
(28, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e92f9ac9ee.jpg', '/files/livros/629e92f9aca02.pdf', '2022-06-06 23:51:21', 'ativado', 17),
(29, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e9320b89ec.jpg', '/files/livros/629e9320b8a02.pdf', '2022-06-06 23:52:00', 'desativado', 17),
(30, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e947b513ce.jpg', '/files/livros/629e947b513e1.pdf', '2022-06-06 23:57:47', 'desativado', 17),
(31, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e97a62f1dd.jpg', '/files/livros/629e97a62f1ec.pdf', '2022-06-07 00:11:18', 'desativado', 17),
(32, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e9822deab5.jpg', '/files/livros/629e9822deac1.pdf', '2022-06-07 00:13:22', 'desativado', 17),
(33, 'sem titulo', 'sem subtitulo', 'fdffd', 2006, '/image/livrosCapas/629e983cca663.jpg', '/files/livros/629e983cca66e.pdf', '2022-06-07 00:13:48', 'desativado', 17),
(34, 'sem titulo', 'sem subtitulo', 'efdfadsfdfcv', 2005, '/image/livrosCapas/629ed790a874b.jpg', '/files/livros/629ed790a8766.pdf', '2022-06-07 04:44:00', 'desativado', 19),
(35, 'Leituras', 'sem subtitulo', 'asdfdf', 2004, '/image/livrosCapas/629eefa72fc54.jpg', '/files/livros/629eefa72fc6c.pdf', '2022-06-07 06:26:47', 'desativado', 17),
(36, 'harry potter', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629ef956c7162.jpg', '/files/livros/629ef956c717f.pdf', '2022-06-07 07:08:06', 'desativado', 18),
(37, 'harry potter', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629ef9727cbea.jpg', '/files/livros/629ef9727cbf7.pdf', '2022-06-07 07:08:34', 'desativado', 18),
(38, 'harry potter', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629ef9b423b0a.jpg', '/files/livros/629ef9b423b17.pdf', '2022-06-07 07:09:40', 'desativado', 18),
(39, 'harry potter', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629efa29a43dd.jpg', '/files/livros/629efa29a43ec.pdf', '2022-06-07 07:11:37', 'desativado', 18),
(40, 'harry potter 4', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629efa34adc30.jpg', '/files/livros/629efa34adc40.pdf', '2022-06-07 07:11:48', 'desativado', 18),
(41, 'harry potter 5', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629efa71b9e1a.jpg', '/files/livros/629efa71b9e29.pdf', '2022-06-07 07:12:49', 'desativado', 18),
(42, 'harry potter 6', 'a honra', 'dfdfefa', 2006, '/image/livrosCapas/629efaba9a1cf.jpg', '/files/livros/629efaba9a1e0.pdf', '2022-06-07 07:14:02', 'desativado', 16),
(43, 'teste', 'sem subtitulo', 'asdfdds\\', 2005, '/image/livrosCapas/629f25b960afd.jpg', '/files/livros/629f25b960cd1.pdf', '2022-06-07 10:17:29', 'desativado', 1),
(44, 'harry potter', 'sem subtitulo', 'asdfdrrgg', 2005, '/image/livrosCapas/629f5ca386aaa.jpg', '/files/livros/629f5ca386af2.pdf', '2022-06-07 14:11:47', 'ativado', 1),
(45, 'Livro', 'livro', 'dfefdf', 2004, '/image/livrosCapas/629fc9bf0b8d0.jpg', '/files/livros/629fc9bf0bac4.pdf', '2022-06-07 21:57:19', 'desativado', 18),
(46, 'livro do autor', 'autor', 'asdf', 2004, '/image/livrosCapas/629fd7476d80a.jpg', '/files/livros/629fd7476d824.pdf', '2022-06-07 22:55:03', 'desativado', 18),
(47, 'sem titulo 2022', 'sem titulo 2022', 'sem titulo 2022', 2022, '/image/livrosCapas/629fde712de41.jpg', '/files/livros/629fde712de4d.pdf', '2022-06-07 23:25:37', 'desativado', 15),
(48, '2022 o livro', '2022 o livro', '2022 o livro', 2005, '/image/livrosCapas/629fdf055ecdf.jpg', '/files/livros/629fdf055ecef.pdf', '2022-06-07 23:28:05', 'desativado', 18),
(49, 'O retorno de 2020', 'O retorno de 2020', 'O retorno de 2020', 2005, '/image/livrosCapas/629fdf8fe0734.jpg', '/files/livros/629fdf8fe0742.pdf', '2022-06-07 23:30:23', 'desativado', 17),
(50, 'etc', 'etc', 'asdff', 2005, '/image/livrosCapas/629feffb4ad4b.jpg', '/files/livros/629feffb4ad5f.pdf', '2022-06-08 00:40:27', 'desativado', 16),
(51, 'teste autoajuda', 'teste autoajuda', 'teste autoajuda', 2022, '/image/livrosCapas/62a07a438a9df.jpg', '/files/livros/62a07a438ac30.pdf', '2022-06-08 10:30:27', 'ativado', 19),
(52, 'harry potter', 'sem subtitulo', 'harry potter', 2022, '/image/livrosCapas/62a08aca55824.jpg', '/files/livros/62a08aca55837.pdf', '2022-06-08 11:40:58', 'ativado', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `livro_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor` decimal(9,2) NOT NULL,
  `tipo_pagamento` enum('pix','boleto') NOT NULL,
  `comprovante` varchar(255) NOT NULL,
  `preco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`livro_id`, `autor_id`, `data_cadastro`, `valor`, `tipo_pagamento`, `comprovante`, `preco_id`) VALUES
(23, 1, '2022-06-07 03:00:00', '0.00', 'pix', 'caminho', 3),
(24, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629e892da60ae.pdf', 3),
(25, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629e8decc4891.pdf', 3),
(26, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629e8f8027fe2.jpg', 3),
(27, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/livrosCapas/629e921fdd071.jpg', 3),
(28, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629e92fda86d7.jpg', 3),
(30, 1, '2022-06-07 03:00:00', '35.00', 'pix', 'sem', 3),
(32, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629e982654967.jpg', 3),
(33, 1, '2022-06-07 03:00:00', '35.00', 'pix', 'sem', 3),
(34, 1, '2022-06-07 03:00:00', '35.00', 'pix', 'sem', 3),
(35, 1, '2022-06-07 03:00:00', '35.00', 'pix', 'sem', 3),
(36, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629ef966316f0.jpg', 3),
(37, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629ef976c1939.jpg', 3),
(38, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629ef9c9d33d8.jpg', 3),
(39, 1, '2022-06-07 03:00:00', '35.00', 'pix', 'sem', 3),
(40, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629efa382f68b.jpg', 3),
(41, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629efa762396f.jpg', 3),
(42, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629efabe45381.jpg', 3),
(43, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629f25bf52637.pdf', 3),
(44, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629f5cb19a50c.pdf', 3),
(45, 1, '2022-06-07 03:00:00', '35.00', 'pix', '/image/comprovantes/629fc9c426c8c.pdf', 3),
(46, 2, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/629fd755dff85.pdf', 3),
(47, 1, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/629fde7532158.pdf', 3),
(48, 1, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/629fdf09e359f.pdf', 3),
(49, 1, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/629fdf957e8c4.pdf', 3),
(50, 3, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/629fefff25f29.jpg', 3),
(51, 1, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/62a07a5c20fab.pdf', 3),
(52, 1, '2022-06-08 03:00:00', '35.00', 'pix', '/image/comprovantes/62a08adbe242b.pdf', 3);

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
(2, '2022-06-07 04:10:14', 'teste', 'ativado'),
(3, '2022-06-07 04:10:26', 'teste', 'ativado'),
(4, '2022-06-07 04:10:59', 'teste', 'ativado'),
(5, '2022-06-07 04:12:38', 'aqui', 'ativado'),
(6, '2022-06-07 04:14:34', 'sem titulo', 'ativado'),
(7, '2022-06-07 04:15:40', 'sem titulo', 'ativado'),
(8, '2022-06-07 04:19:22', 'teste', 'ativado'),
(9, '2022-06-07 04:21:05', 'sem titulo', 'ativado'),
(10, '2022-06-07 04:25:11', 'sem titulo', 'ativado'),
(11, '2022-06-07 04:28:37', 'sem titulo', 'ativado'),
(12, '2022-06-07 04:32:02', 'sem titulo', 'ativado'),
(13, '2022-06-07 04:32:08', 'As cronicas desconhecidas', 'ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `preco`
--

INSERT INTO `preco` (`id`, `valor`) VALUES
(1, '30.00'),
(2, '25.00'),
(3, '35.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `situacao` enum('ativado','desativado') NOT NULL DEFAULT 'ativado',
  `tipo` enum('administrador','cliente','autor') NOT NULL DEFAULT 'cliente',
  `senha` varchar(100) NOT NULL,
  `celular` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `data_nascimento`, `data_cadastro`, `situacao`, `tipo`, `senha`, `celular`) VALUES
(6, 'admin', 'admin@gmail.com', '2001-09-18', '2022-05-21 17:02:09', 'ativado', 'administrador', '21232f297a57a5a743894a0e4a801fc3', '(61) 99500-8325'),
(7, 'marcos', 'marcos@cliente.com', '2001-09-18', '2022-05-21 17:04:18', 'ativado', 'cliente', 'c5e3539121c4944f2bbe097b425ee774', '(99) 99999-9999'),
(8, 'marcos', 'marcos@autor.com', '2001-09-18', '2022-05-21 17:04:32', 'ativado', 'autor', 'c5e3539121c4944f2bbe097b425ee774', '(66) 66666-6666'),
(10, 'professor', 'teste@cliente.com', '2022-05-28', '2022-05-29 03:15:43', 'ativado', 'cliente', '698dc19d489c4e4db73e28a713eab07b', '(61) 99500-8325'),
(11, 'Antonio', 'antonio@cliente.com', '2022-06-07', '2022-05-30 20:53:00', 'ativado', 'cliente', 'c5e3539121c4944f2bbe097b425ee774', '(61) 99500-8325'),
(12, 'thz', 'thz@cliente.com', '2001-01-01', '2022-05-30 21:36:33', 'ativado', 'cliente', 'a2a1238086bfce5ab2c4315a0ad3941b', '(44) 44444-4444'),
(16, 'antonio', 'antonio@autor.com', '2022-06-05', '2022-06-06 03:28:16', 'ativado', 'autor', '4a181673429f0b6abbfd452f0f3b5950', '(61) 99500-8325'),
(19, 'teste', 'teste@gmail.com', '2001-09-18', '2022-06-07 06:03:02', 'ativado', 'cliente', '698dc19d489c4e4db73e28a713eab07b', '(55) 55555-5555'),
(20, 'joao', 'gerson@cliente.com', '2000-01-01', '2022-06-07 12:54:48', 'ativado', 'cliente', '2e3746e131d178d04609038957bfa567', '(44) 44444-4444'),
(21, 'etc', 'etc@aluno.com', '2001-09-18', '2022-06-07 14:06:16', 'ativado', 'cliente', 'e80f17310109447772dca82b45ef35a5', '(33) 33333-3333'),
(22, 'Antonio Marcos', 'santossilvabarra2001@gmail.com', '2022-06-07', '2022-06-07 14:08:06', 'ativado', 'cliente', 'c5e3539121c4944f2bbe097b425ee774', '(61) 99500-8325'),
(24, 'autor', 'autor@gmail.com', '2001-09-18', '2022-06-07 22:54:03', 'ativado', 'autor', '7a25cefdc710b155828e91df70fe7478', '(88) 88888-8888'),
(25, 'etc', 'etc@autor.com', '2001-09-18', '2022-06-08 00:40:00', 'ativado', 'autor', 'e80f17310109447772dca82b45ef35a5', '(44) 44444-4444'),
(26, 'joao', 'joao@cliente.com', '2001-09-18', '2022-06-08 10:41:16', 'ativado', 'cliente', 'dccd96c256bc7dd39bae41a405f25e43', '(66) 66666-6666'),
(27, 'gabriel', 'gabriel@cliente.com', '2001-09-18', '2022-06-08 11:38:18', 'ativado', 'cliente', '698dc19d489c4e4db73e28a713eab07b', '(44) 44444-4444');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CLIENTES_has_LIVROS_LIVROS1` (`livro_id`),
  ADD KEY `fk_CLIENTES_LIVROS_PLAYLISTS1` (`playlist_id`),
  ADD KEY `fk_CLIENTE_LIVRO_USUARIO1` (`usuario_id`);

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_AUTORES_USUARIOS1` (`usuario_id`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_editora_LIVROS1` (`livro_id`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`,`genero_id`),
  ADD KEY `fk_LIVRO_GENERO1` (`genero_id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`livro_id`,`autor_id`,`preco_id`),
  ADD KEY `fk_LIVROS_has_AUTORES_AUTORES1` (`autor_id`),
  ADD KEY `fk_PAGAMENTO_PRECO1` (`preco_id`);

--
-- Índices para tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `preco`
--
ALTER TABLE `preco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acesso`
--
ALTER TABLE `acesso`
  ADD CONSTRAINT `fk_CLIENTES_LIVROS_PLAYLISTS1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTES_has_LIVROS_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLIENTE_LIVRO_USUARIO1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_AUTORES_USUARIOS1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `editora`
--
ALTER TABLE `editora`
  ADD CONSTRAINT `fk_editora_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_LIVRO_GENERO1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_AUTORES1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIVROS_has_AUTORES_LIVROS1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PAGAMENTO_PRECO1` FOREIGN KEY (`preco_id`) REFERENCES `preco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
