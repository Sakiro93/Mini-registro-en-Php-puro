-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para articulo
CREATE DATABASE IF NOT EXISTS `Producto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Producto`;

-- Volcando estructura para tabla articulo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla articulo.categoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_Categoria`, `Descripcion_Categoria`) VALUES
	(1, 'Calzado'),
	(2, 'Herramientas'),
	(3, 'Tecnologia');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla articulo.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `id_Marca` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion_Marca` varchar(50) DEFAULT NULL,
  `id_Categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Marca`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla articulo.marca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`id_Marca`, `Descripcion_Marca`, `id_Categoria`) VALUES
	(5, 'Vans', 1),
	(6, 'Tony', 2),
	(7, 'DELL', 3),
	(8, 'Lenovo', 3);
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Volcando estructura para tabla articulo.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `foto_Producto` varchar(100) DEFAULT NULL,
  `descripcion_Producto` varchar(50) DEFAULT NULL,
  `id_Categoria` int(11) DEFAULT NULL,
  `id_Marca` int(11) DEFAULT NULL,
  `precio_Producto` double DEFAULT NULL,
  `stock_Producto` int(11) DEFAULT NULL,
  `iva_Producto` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla articulo.producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla articulo.segrol
CREATE TABLE IF NOT EXISTS `segrol` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolDescripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`rolId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla articulo.segrol: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `segrol` DISABLE KEYS */;
INSERT INTO `segrol` (`rolId`, `rolDescripcion`) VALUES
	(1, 'Administrador');
/*!40000 ALTER TABLE `segrol` ENABLE KEYS */;

-- Volcando estructura para tabla articulo.segusuario
CREATE TABLE IF NOT EXISTS `segusuario` (
  `usuId` int(11) NOT NULL AUTO_INCREMENT,
  `usuLogin` varchar(50) DEFAULT NULL,
  `usuClave` varchar(50) DEFAULT NULL,
  `usuNombre` varchar(100) DEFAULT NULL,
  `rolId` int(11) DEFAULT '0',
  `usuFecReg` datetime DEFAULT NULL,
  `usuFecMod` datetime DEFAULT NULL,
  `usuEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`usuId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla articulo.segusuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `segusuario` DISABLE KEYS */;
INSERT INTO `segusuario` (`usuId`, `usuLogin`, `usuClave`, `usuNombre`, `rolId`, `usuFecReg`, `usuFecMod`, `usuEstado`) VALUES
	(2, 'angel', '123', 'Angel Silva', 1, '2018-01-17 02:00:13', '2018-01-17 02:00:14', b'1');
/*!40000 ALTER TABLE `segusuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
