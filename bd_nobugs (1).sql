-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Maio-2019 às 23:14
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_nobugs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eventos`
--

DROP TABLE IF EXISTS `tb_eventos`;
CREATE TABLE IF NOT EXISTS `tb_eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(1000) NOT NULL,
  `data_evento` date NOT NULL,
  `pontos` int(100) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eventos`
--

INSERT INTO `tb_eventos` (`id_evento`, `nome_evento`, `data_evento`, `pontos`) VALUES
(40, 'lolala', '2019-07-18', 7698),
(38, 'oi', '2019-05-22', 908),
(39, 'teste', '2020-07-08', 7888),
(37, 'aaaaaaaaaa', '2019-05-22', 3902),
(36, 'meme', '2019-05-17', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sessao`
--

DROP TABLE IF EXISTS `tb_sessao`;
CREATE TABLE IF NOT EXISTS `tb_sessao` (
  `login` varchar(10) NOT NULL,
  `senha` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sessao`
--

INSERT INTO `tb_sessao` (`login`, `senha`) VALUES
('admin', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `nome_usuario` varchar(80) NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` int(6) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `foto` longblob,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`nome_usuario`, `login`, `senha`, `cargo`, `foto`) VALUES
('gretchen', 'gretchen.fofa', 1234, 'diretora', 0x32303138303933302d677265746368656e2e706e67),
('tulla luana', 'tulla.luana', 123456, 'ouvidoria', NULL),
('nicole bahls', 'nick', 12345, 'jornalista', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios_eventos`
--

DROP TABLE IF EXISTS `tb_usuarios_eventos`;
CREATE TABLE IF NOT EXISTS `tb_usuarios_eventos` (
  `login_usuario` varchar(80) NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`login_usuario`,`id_evento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios_eventos`
--

INSERT INTO `tb_usuarios_eventos` (`login_usuario`, `id_evento`) VALUES
('gretchen.fofa', 38),
('gretchen.fofa', 39),
('gretchen.fofa', 40),
('tulla.luana', 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
