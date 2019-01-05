# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: ns518.hostgator.com.br (MySQL 5.6.41-84.1)
# Base de Dados: paulo857_roubamonte
# Tempo de Geração: 2019-01-04 16:44:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela baralho
# ------------------------------------------------------------

DROP TABLE IF EXISTS `baralho`;

CREATE TABLE `baralho` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `nipe` varchar(20) DEFAULT NULL,
  `img` varchar(100) DEFAULT 'assets/img/baralho/',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `baralho` WRITE;
/*!40000 ALTER TABLE `baralho` DISABLE KEYS */;

INSERT INTO `baralho` (`id`, `numero`, `nipe`, `img`)
VALUES
	(1,1,'ouros','assets/img/baralho/1_ouros.png'),
	(2,2,'ouros','assets/img/baralho/2_ouros.png'),
	(3,3,'ouros','assets/img/baralho/3_ouros.png'),
	(4,4,'ouros','assets/img/baralho/4_ouros.png'),
	(5,5,'ouros','assets/img/baralho/5_ouros.png'),
	(6,6,'ouros','assets/img/baralho/6_ouros.png'),
	(7,7,'ouros','assets/img/baralho/7_ouros.png'),
	(8,8,'ouros','assets/img/baralho/8_ouros.png'),
	(9,9,'ouros','assets/img/baralho/9_ouros.png'),
	(10,10,'ouros','assets/img/baralho/10_ouros.png'),
	(11,11,'ouros','assets/img/baralho/11_ouros.png'),
	(12,12,'ouros','assets/img/baralho/12_ouros.png'),
	(13,13,'ouros','assets/img/baralho/13_ouros.png'),
	(14,1,'paus','assets/img/baralho/1_paus.png'),
	(15,2,'paus','assets/img/baralho/2_paus.png'),
	(16,3,'paus','assets/img/baralho/3_paus.png'),
	(17,4,'paus','assets/img/baralho/4_paus.png'),
	(18,5,'paus','assets/img/baralho/5_paus.png'),
	(19,6,'paus','assets/img/baralho/6_paus.png'),
	(20,7,'paus','assets/img/baralho/7_paus.png'),
	(21,8,'paus','assets/img/baralho/8_paus.png'),
	(22,9,'paus','assets/img/baralho/9_paus.png'),
	(23,10,'paus','assets/img/baralho/10_paus.png'),
	(24,11,'paus','assets/img/baralho/11_paus.png'),
	(25,12,'paus','assets/img/baralho/12_paus.png'),
	(26,13,'paus','assets/img/baralho/13_paus.png'),
	(27,1,'espadas','assets/img/baralho/1_espadas.png'),
	(28,2,'espadas','assets/img/baralho/2_espadas.png'),
	(29,3,'espadas','assets/img/baralho/3_espadas.png'),
	(30,4,'espadas','assets/img/baralho/4_espadas.png'),
	(31,5,'espadas','assets/img/baralho/5_espadas.png'),
	(32,6,'espadas','assets/img/baralho/6_espadas.png'),
	(33,7,'espadas','assets/img/baralho/7_espadas.png'),
	(34,8,'espadas','assets/img/baralho/8_espadas.png'),
	(35,9,'espadas','assets/img/baralho/9_espadas.png'),
	(36,10,'espadas','assets/img/baralho/10_espadas.png'),
	(37,11,'espadas','assets/img/baralho/11_espadas.png'),
	(38,12,'espadas','assets/img/baralho/12_espadas.png'),
	(39,13,'espadas','assets/img/baralho/13_espadas.png'),
	(40,1,'copas','assets/img/baralho/1_copas.png'),
	(41,2,'copas','assets/img/baralho/2_copas.png'),
	(42,3,'copas','assets/img/baralho/3_copas.png'),
	(43,4,'copas','assets/img/baralho/4_copas.png'),
	(44,5,'copas','assets/img/baralho/5_copas.png'),
	(45,6,'copas','assets/img/baralho/6_copas.png'),
	(46,7,'copas','assets/img/baralho/7_copas.png'),
	(47,8,'copas','assets/img/baralho/8_copas.png'),
	(48,9,'copas','assets/img/baralho/9_copas.png'),
	(49,10,'copas','assets/img/baralho/10_copas.png'),
	(50,11,'copas','assets/img/baralho/11_copas.png'),
	(51,12,'copas','assets/img/baralho/12_copas.png'),
	(52,13,'copas','assets/img/baralho/13_copas.png');

/*!40000 ALTER TABLE `baralho` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	('18f21f9d94a990a5180fdf9d580d991d','62.28.15.20','Mozilla/5.0 (iPhone; CPU iPhone OS 12_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15',1546606286,'a:4:{s:9:\"user_data\";s:0:\"\";s:7:\"jogador\";O:8:\"stdClass\":2:{s:7:\"apelido\";s:6:\"Teste2\";s:2:\"id\";i:151;}s:4:\"mesa\";O:8:\"stdClass\":3:{s:2:\"id\";s:2:\"73\";s:5:\"chave\";s:5:\"37c07\";s:8:\"iniciado\";s:1:\"0\";}s:10:\"vezJogador\";s:3:\"150\";}'),
	('4589b14bf7e4f56dd673f0830b59eee1','209.17.97.18','Mozilla/5.0 (compatible; Nimbostratus-Bot/v1.3.2; http://cloudsystemnetworks.com)',1546602719,''),
	('81dc13311c99f78db8eb2204d574e552','62.28.15.19','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge',1546611084,''),
	('9c9e67729240578b86fb508cb7ed1e44','62.28.15.19','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',1546606317,'a:3:{s:9:\"user_data\";s:0:\"\";s:4:\"mesa\";O:8:\"stdClass\":2:{s:2:\"id\";i:73;s:5:\"chave\";s:5:\"37c07\";}s:10:\"vezJogador\";s:3:\"150\";}'),
	('c8e43714458fe23e613bb45cda102f85','62.28.15.20','Mozilla/5.0 (Linux; Android 8.0.0; SM-G930F Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/7',1546606143,'a:4:{s:9:\"user_data\";s:0:\"\";s:7:\"jogador\";O:8:\"stdClass\":2:{s:7:\"apelido\";s:5:\"Teste\";s:2:\"id\";i:150;}s:4:\"mesa\";O:8:\"stdClass\":3:{s:2:\"id\";s:2:\"73\";s:5:\"chave\";s:5:\"37c07\";s:8:\"iniciado\";s:1:\"0\";}s:10:\"vezJogador\";s:3:\"150\";}');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela jogo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jogo`;

CREATE TABLE `jogo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) unsigned DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  `id_mesa_baralho` int(11) unsigned DEFAULT NULL,
  `monte` tinyint(2) DEFAULT NULL,
  `primeiro` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FkJogoMesa` (`id_mesa`),
  KEY `FkJogoUsuario` (`id_usuario`),
  KEY `FkJogoMesaBaralho` (`id_mesa_baralho`),
  CONSTRAINT `FkJogoMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkJogoMesaBaralho` FOREIGN KEY (`id_mesa_baralho`) REFERENCES `mesa_baralho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkJogoUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usu_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela mesa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mesa`;

CREATE TABLE `mesa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chave` char(20) DEFAULT NULL,
  `iniciado` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela mesa_baralho
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mesa_baralho`;

CREATE TABLE `mesa_baralho` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) unsigned DEFAULT NULL,
  `id_carta` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FkMesaBaralhoMesa` (`id_mesa`),
  KEY `FkMesaBaralhoBaralho` (`id_carta`),
  CONSTRAINT `FkMesaBaralhoBaralho` FOREIGN KEY (`id_carta`) REFERENCES `baralho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkMesaBaralhoMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela mesa_jogador
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mesa_jogador`;

CREATE TABLE `mesa_jogador` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_jogador` int(11) unsigned NOT NULL,
  `id_mesa` int(11) unsigned NOT NULL,
  `ordem` int(3) DEFAULT NULL,
  `vez` int(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FkMesaJogadorJogador` (`id_jogador`),
  KEY `FkMesaJogadorMesa` (`id_mesa`),
  CONSTRAINT `FkMesaJogadorJogador` FOREIGN KEY (`id_jogador`) REFERENCES `usu_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkMesaJogadorMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela temp_match
# ------------------------------------------------------------

DROP TABLE IF EXISTS `temp_match`;

CREATE TABLE `temp_match` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_carta` int(11) unsigned DEFAULT NULL,
  `id_mesa` int(11) unsigned DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FkTempMatchJogo` (`id_carta`),
  KEY `FkTempMatchMesa` (`id_mesa`),
  KEY `FkTempMatchUsuario` (`id_usuario`),
  CONSTRAINT `FkTempMatchJogo` FOREIGN KEY (`id_carta`) REFERENCES `jogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkTempMatchMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FkTempMatchUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usu_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela usu_usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usu_usuario`;

CREATE TABLE `usu_usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apelido` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
