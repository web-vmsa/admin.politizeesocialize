-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Jan-2021 às 20:17
-- Versão do servidor: 10.3.20-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `politizeesocialize`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinantes`
--

DROP TABLE IF EXISTS `assinantes`;
CREATE TABLE IF NOT EXISTS `assinantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `tags` varchar(450) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicoes`
--

DROP TABLE IF EXISTS `competicoes`;
CREATE TABLE IF NOT EXISTS `competicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) CHARACTER SET latin1 NOT NULL,
  `alcunha` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `organizadora` varchar(250) CHARACTER SET latin1 NOT NULL,
  `logotipo` varchar(250) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

DROP TABLE IF EXISTS `equipes`;
CREATE TABLE IF NOT EXISTS `equipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `alcunha` varchar(150) NOT NULL,
  `escudo` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `jogo_prop` text NOT NULL,
  `placar` varchar(250) NOT NULL,
  `status_jogo` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `tags` varchar(450) NOT NULL,
  `url` varchar(500) NOT NULL,
  `arquivo` varchar(250) NOT NULL,
  `arquivo_prop` text NOT NULL,
  `lances` text NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `tags` varchar(450) NOT NULL,
  `url` varchar(500) NOT NULL,
  `arquivo` varchar(250) NOT NULL,
  `arquivo_prop` text NOT NULL,
  `postagem` text NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opinioes`
--

DROP TABLE IF EXISTS `opinioes`;
CREATE TABLE IF NOT EXISTS `opinioes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `tags` varchar(450) NOT NULL,
  `url` varchar(500) NOT NULL,
  `arquivo` varchar(250) NOT NULL,
  `arquivo_prop` text NOT NULL,
  `postagem` text NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `social` varchar(550) DEFAULT NULL,
  `biografia` varchar(150) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissoes` varchar(550) DEFAULT NULL,
  `usuario_prop` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
