
-- Copiando estrutura do banco de dados para essentia
CREATE DATABASE IF NOT EXISTS `essentia` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `essentia`;

-- Copiando estrutura para tabela essentia.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fantasia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contato` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela essentia.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `razao_social`, `fantasia`, `cnpj`, `endereco`, `complemento`, `numero`, `bairro`, `cidade`, `cep`, `fone1`, `fone2`, `contato`, `email`, `imagem`) VALUES
	(1, 'XPTO1', 'Wagner Martins', '18.713.216/0001-20', NULL, NULL, NULL, NULL, NULL, NULL, '48-9152-7814', NULL, NULL, 'wagnorama@gmail.com', 'Fotolia_accountant.jpg'),
	(3, 'Essentia Pharma', 'Essentia', '00.000.000/0000-00', NULL, NULL, NULL, NULL, NULL, NULL, '48-9152-7814', NULL, NULL, 'wagnorama@gmail.com', 'Fotolia_107625790_L-1024x789.jpg');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
