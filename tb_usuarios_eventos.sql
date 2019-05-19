-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Maio-2019 às 23:15
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
