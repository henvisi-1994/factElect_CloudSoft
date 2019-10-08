-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para facturacion
CREATE DATABASE IF NOT EXISTS `facturacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `facturacion`;

-- Volcando estructura para tabla facturacion.bodega
CREATE TABLE IF NOT EXISTS `bodega` (
  `id_bod` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciu` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `nombre_bod` varchar(30) DEFAULT NULL,
  `estado_bod` char(1) DEFAULT '0',
  `direcc_bod` text,
  `telef_bod` varchar(14) DEFAULT NULL,
  `cel_bod` varchar(14) DEFAULT NULL,
  `nomb_contac_bod` varchar(30) DEFAULT NULL,
  `fechaini_bod` date DEFAULT NULL,
  `fechafin_bod` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_bod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.bodega: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `bodega` DISABLE KEYS */;
REPLACE INTO `bodega` (`id_bod`, `id_ciu`, `id_pais`, `id_prov`, `nombre_bod`, `estado_bod`, `direcc_bod`, `telef_bod`, `cel_bod`, `nomb_contac_bod`, `fechaini_bod`, `fechafin_bod`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, 'Bodega 3', 'I', 'sssssdddddd', '072792829', '0980472010', 'Frank', '2019-04-15', '2019-04-30', '2019-04-16 00:09:13', '2019-04-16 00:09:13'),
	(2, 1, 1, 1, 'Bodega 5', 'I', 'cdcdcdcdc', '014012', '1111111', 'dcdcdc', '2019-04-15', '2019-04-29', '2019-04-26 16:14:16', '2019-04-16 00:12:14'),
	(3, 1, 1, 1, 'Bodega 8', 'A', 'bfbfbf', '01401224', '0980472010', 'mmmmmmmmmm', '2019-04-10', '2019-04-27', '2019-04-26 16:14:19', '2019-04-16 00:13:09'),
	(4, 1, 1, 1, 'Bodega 10', 'A', 'aaaaaaa', '5555555', '777777777', 'cccccccccc', '2019-04-16', '2019-04-25', '2019-04-26 16:14:22', '2019-04-16 00:18:09');
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_cat` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_cat` varchar(300) DEFAULT NULL,
  `observ_cat` varchar(300) DEFAULT NULL,
  `estado_cat` char(1) DEFAULT NULL,
  `fechaini_cat` date DEFAULT NULL,
  `fechafin_cat` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.categoria: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
REPLACE INTO `categoria` (`id_cat`, `id_emp`, `id_fec`, `nomb_cat`, `observ_cat`, `estado_cat`, `fechaini_cat`, `fechafin_cat`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'Ropa', '2016-05-09', 'A', '2016-05-09', '2018-07-12', '2019-04-04 12:12:35', '2019-04-04 12:12:35'),
	(2, 2, 2, 'Ropa1', 'fsdfsdf', 'A', '2019-04-03', '2019-04-27', '2019-04-03 20:16:36', '2019-04-03 20:16:36'),
	(3, 2, 2, 'Ropa2', 'fsdfsdf', 'A', '2019-04-03', '2019-04-27', '2019-04-03 20:17:04', '2019-04-03 20:17:04'),
	(4, 2, 2, 'Ropa3', 'zxczxc', 'A', '2019-03-03', '2019-04-27', '2019-04-03 20:28:03', '2019-04-03 20:28:03'),
	(5, 2, 2, 'Ropa8', 'aaaaaaaaaaaaaaaa', 'A', '2019-04-05', '2019-04-30', '2019-04-08 11:53:08', '2019-04-08 11:53:08');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.ciudad
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciu` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_prov` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_ciu` varchar(100) DEFAULT NULL,
  `estado_ciu` char(1) DEFAULT NULL,
  `fechaini_ciu` date DEFAULT NULL,
  `fechafin_ciu` date DEFAULT NULL,
  `observ_ciu` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ciu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.ciudad: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
REPLACE INTO `ciudad` (`id_ciu`, `id_emp`, `id_prov`, `id_fec`, `nomb_ciu`, `estado_ciu`, `fechaini_ciu`, `fechafin_ciu`, `observ_ciu`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 2, 'Santa Rosa', 'A', '2017-09-09', '2018-08-09', 'Ciudad vvvvv', '2019-04-15 18:59:31', '2019-04-15 18:59:31'),
	(2, 1, 1, 2, 'Pasaje', 'A', '2016-03-19', '2018-03-19', 'Ciudad yaa', '2019-04-15 18:59:34', '2019-04-15 18:59:34'),
	(3, 2, 1, 2, 'El Guabo', 'A', '2012-04-07', '2020-10-04', 'Ciudad Grande', '2019-04-15 18:59:36', '2019-04-15 18:59:36');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cli` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `cod_cli` varchar(20) DEFAULT NULL,
  `id_per` bigint(20) DEFAULT NULL,
  `observ_cli` varchar(200) DEFAULT NULL,
  `estado_cli` char(1) DEFAULT NULL,
  `fechaini_cli` date DEFAULT NULL,
  `fechafin_cli` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cli`),
  KEY `cliente_ibfk_1` (`id_per`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `persona` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
REPLACE INTO `cliente` (`id_cli`, `id_emp`, `id_fec`, `cod_cli`, `id_per`, `observ_cli`, `estado_cli`, `fechaini_cli`, `fechafin_cli`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'C001', 3, 'dasd', 'A', '2019-04-01', '2019-04-30', '2019-04-22 16:12:54', '2019-04-22 16:12:54');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.codformulario
CREATE TABLE IF NOT EXISTS `codformulario` (
  `id_codform` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_padcodform` bigint(20) DEFAULT NULL,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_codform` varchar(300) DEFAULT NULL,
  `observ_codform` varchar(300) DEFAULT NULL,
  `estado_codform` char(1) DEFAULT NULL,
  `fechaini_codform` date DEFAULT NULL,
  `fechafin_codform` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_codform`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.codformulario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `codformulario` DISABLE KEYS */;
REPLACE INTO `codformulario` (`id_codform`, `id_padcodform`, `id_emp`, `id_fec`, `nomb_codform`, `observ_codform`, `estado_codform`, `fechaini_codform`, `fechafin_codform`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 2, 'Formulario 101', 'dsadas', 'A', '2019-04-19', '2019-04-30', '2019-04-19 13:55:25', '2019-04-19 13:55:25'),
	(2, 1, 2, 2, 'Formulario 103', 'qdwqwe', 'A', '2019-04-19', '2019-04-29', '2019-04-19 18:58:52', '2019-04-19 18:58:52');
/*!40000 ALTER TABLE `codformulario` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.descuento
CREATE TABLE IF NOT EXISTS `descuento` (
  `id_desc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_desc` varchar(100) DEFAULT NULL,
  `observ_desc` varchar(300) DEFAULT NULL,
  `estado_desc` char(1) DEFAULT NULL,
  `fechaini_desc` date DEFAULT NULL,
  `fechafin_desc` date DEFAULT NULL,
  `control_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.descuento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `descuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `descuento` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.detalle_factura
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id_det_fact` int(11) NOT NULL AUTO_INCREMENT,
  `id_fact` int(11) NOT NULL DEFAULT '0',
  `id_prod` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  `precio_prod` double NOT NULL DEFAULT '0',
  `descuento` double NOT NULL DEFAULT '0',
  `neto` double NOT NULL DEFAULT '0',
  `iva` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_det_fact`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.detalle_factura: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
REPLACE INTO `detalle_factura` (`id_det_fact`, `id_fact`, `id_prod`, `cantidad`, `descripcion`, `precio_prod`, `descuento`, `neto`, `iva`, `total`, `created_at`, `updated_at`) VALUES
	(1, 6, 8, 1, 'Tuuuu', 200, 10, 190, 22.8, 190, '2019-10-08 02:20:37', '2019-10-08 02:20:37'),
	(2, 6, 8, 2, 'Tuuuu', 200, 20, 380, 45.6, 380, '2019-10-08 02:20:38', '2019-10-08 02:20:38'),
	(3, 6, 8, 1, 'Tuuuu', 200, 10, 190, 22.8, 190, '2019-10-08 02:28:55', '2019-10-08 02:28:55'),
	(4, 6, 8, 3, 'Tuuuu', 200, 30, 570, 68.4, 570.01, '2019-10-08 02:28:55', '2019-10-08 02:28:55');
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_emp` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ciu` bigint(20) DEFAULT NULL,
  `totestab_emp` char(3) DEFAULT NULL,
  `rucempresa_emp` varchar(15) DEFAULT NULL,
  `razon_emp` varchar(100) DEFAULT NULL,
  `nombre_emp` varchar(50) DEFAULT NULL,
  `apellido_emp` varchar(50) DEFAULT NULL,
  `contacto_emp` varchar(100) DEFAULT NULL,
  `direcc_emp` varchar(200) DEFAULT NULL,
  `telefono_emp` varchar(15) DEFAULT NULL,
  `celular_emp` varchar(15) DEFAULT NULL,
  `fax_emp` varchar(15) DEFAULT NULL,
  `email_emp` varchar(100) DEFAULT NULL,
  `estado_emp` char(1) DEFAULT NULL,
  `contador_emp` varchar(15) DEFAULT NULL,
  `tipcontrib_emp` varchar(25) DEFAULT NULL,
  `fechaini_emp` date DEFAULT NULL,
  `fechafin_emp` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.empresa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
REPLACE INTO `empresa` (`id_emp`, `id_ciu`, `totestab_emp`, `rucempresa_emp`, `razon_emp`, `nombre_emp`, `apellido_emp`, `contacto_emp`, `direcc_emp`, `telefono_emp`, `celular_emp`, `fax_emp`, `email_emp`, `estado_emp`, `contador_emp`, `tipcontrib_emp`, `fechaini_emp`, `fechafin_emp`, `created_at`, `updated_at`) VALUES
	(2, 1, '4', '07023456789001', 'sasdasdas', 'ddee', 'xczxczx', 'sdasdasd', 'sadasd', '345567889', '0923456778', '443546', 'sdsdsfsd@jkhjhk', 'A', 'dsdfsdf', 'N', '2015-03-07', '2019-03-07', '2019-04-17 12:27:00', '2019-04-17 12:27:00');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `id_fact` int(11) NOT NULL AUTO_INCREMENT,
  `id_formapago` bigint(20) NOT NULL,
  `id_per` bigint(20) NOT NULL,
  `num_fact` char(20) NOT NULL,
  `fecha_emision_fact` date NOT NULL,
  `hora_emision_fact` time NOT NULL,
  `vencimiento_fact` date NOT NULL,
  `estado_fact` char(2) NOT NULL,
  `tipo_fact` varchar(50) NOT NULL,
  `observ_fact` text NOT NULL,
  `subtotal_fact` double DEFAULT '0',
  `subcero_fact` double DEFAULT '0',
  `subiva_fact` double DEFAULT '0',
  `subice_fact` double DEFAULT '0',
  `total_fact` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fact`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.factura: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
REPLACE INTO `factura` (`id_fact`, `id_formapago`, `id_per`, `num_fact`, `fecha_emision_fact`, `hora_emision_fact`, `vencimiento_fact`, `estado_fact`, `tipo_fact`, `observ_fact`, `subtotal_fact`, `subcero_fact`, `subiva_fact`, `subice_fact`, `total_fact`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, '001-001-0000000001', '2018-03-23', '14:00:00', '2018-02-14', 'PA', 'Venta', '-', NULL, NULL, NULL, NULL, 120, '2019-04-23 15:23:58', '2019-04-23 15:23:58'),
	(6, 1, 3, '001-001-0000000002', '2019-10-07', '21:20:36', '2019-11-07', 'PA', 'Venta', '-', 570, 0, 68.4, 0, 570, '2019-10-08 02:20:37', '2019-10-08 02:20:37'),
	(7, 1, 3, '001-001-0000000002', '2019-10-07', '21:28:54', '2019-11-07', 'PA', 'Venta', '-', 760, 0, 91.2, 0, 760.01, '2019-10-08 02:28:54', '2019-10-08 02:28:54');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.fecha_periodo
CREATE TABLE IF NOT EXISTS `fecha_periodo` (
  `id_fec` bigint(2) NOT NULL AUTO_INCREMENT,
  `nomb_fec` varchar(150) DEFAULT NULL,
  `mesidentif_fec` varchar(6) DEFAULT NULL,
  `observ_fec` varchar(300) DEFAULT NULL,
  `estado_fec` char(3) DEFAULT NULL,
  `fechaini_fec` date DEFAULT NULL,
  `fechafin_fec` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fec`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.fecha_periodo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `fecha_periodo` DISABLE KEYS */;
REPLACE INTO `fecha_periodo` (`id_fec`, `nomb_fec`, `mesidentif_fec`, `observ_fec`, `estado_fec`, `fechaini_fec`, `fechafin_fec`, `created_at`, `updated_at`) VALUES
	(2, 'Primer Semestre', 'Enero', 'jddhasjkbajbk', 'A', '2018-03-07', '2019-02-07', '2019-03-07 13:00:43', '2019-04-22 13:11:23');
/*!40000 ALTER TABLE `fecha_periodo` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.formapago
CREATE TABLE IF NOT EXISTS `formapago` (
  `id_formapago` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_formapago` varchar(100) DEFAULT NULL,
  `observ_formapago` varchar(300) DEFAULT NULL,
  `estado_formapago` char(1) DEFAULT NULL,
  `fechaini_formapago` date DEFAULT NULL,
  `fechafin_formapago` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_formapago`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.formapago: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `formapago` DISABLE KEYS */;
REPLACE INTO `formapago` (`id_formapago`, `id_emp`, `id_fec`, `nomb_formapago`, `observ_formapago`, `estado_formapago`, `fechaini_formapago`, `fechafin_formapago`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'Efectivo', 'Pago en efectivo', 'A', '2019-04-19', '2019-04-30', '2019-04-19 18:47:20', '2019-04-19 18:47:20');
/*!40000 ALTER TABLE `formapago` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.identificacion
CREATE TABLE IF NOT EXISTS `identificacion` (
  `id_ident` bigint(20) NOT NULL AUTO_INCREMENT,
  `sri_ident` char(1) DEFAULT NULL,
  `descrip_ident` varchar(100) DEFAULT NULL,
  `observ_ident` varchar(300) DEFAULT NULL,
  `estado_ident` char(1) DEFAULT NULL,
  `fechaini_ident` date DEFAULT NULL,
  `fechafin_ident` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ident`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.identificacion: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `identificacion` DISABLE KEYS */;
REPLACE INTO `identificacion` (`id_ident`, `sri_ident`, `descrip_ident`, `observ_ident`, `estado_ident`, `fechaini_ident`, `fechafin_ident`, `created_at`, `updated_at`) VALUES
	(1, 'N', 'Mimi', 'Juuuu2', 'A', '2014-05-07', '2019-04-08', '2019-04-08 19:21:48', '2019-03-18 14:50:55'),
	(2, 'J', 'Persona Natural', 'Yaaaaa1', 'I', '2014-05-04', '2017-06-28', '2019-04-08 13:09:29', '2019-03-22 02:36:47'),
	(3, 'J', 'Persona Juridica Especial', 'Cliente Preferencial', 'A', '2015-04-06', '2019-05-06', '2019-03-22 02:55:50', '2019-03-22 02:55:50'),
	(4, 'N', 'aaaaaaaaa', 'bbbbbbbbbbb', 'I', '2019-04-08', '2019-04-30', '2019-04-08 19:24:42', '2019-04-09 00:24:10'),
	(5, 'N', 'aaaaaaaaaa', 'aaaaaaaaaaaa', 'P', '2019-04-08', '2019-05-02', '2019-04-09 00:30:10', '2019-04-09 00:30:10');
/*!40000 ALTER TABLE `identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inv` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usu` bigint(20) DEFAULT NULL,
  `id_bod` bigint(20) DEFAULT NULL,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `descrpcion_inv` varchar(300) DEFAULT NULL,
  `fecha_inv` date DEFAULT NULL,
  `numprod_inv` double DEFAULT NULL,
  `numexist_inv` double DEFAULT NULL,
  `capneto_inv` double DEFAULT NULL,
  `cappvp_inv` date DEFAULT NULL,
  `util_inv` date DEFAULT NULL,
  `observ_inv` varchar(300) DEFAULT NULL,
  `estado_inv` char(1) DEFAULT NULL,
  `fechaini_inv` date DEFAULT NULL,
  `fechafin_inv` date DEFAULT NULL,
  `control_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.inventario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.iva
CREATE TABLE IF NOT EXISTS `iva` (
  `id_iva` int(11) NOT NULL AUTO_INCREMENT,
  `porcentaje_iva` double NOT NULL,
  `fecha_ini_iva` date NOT NULL,
  `fecha_fin_iva` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.iva: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
REPLACE INTO `iva` (`id_iva`, `porcentaje_iva`, `fecha_ini_iva`, `fecha_fin_iva`, `created_at`, `updated_at`) VALUES
	(1, 12, '1975-04-25', '2030-05-02', '2019-05-02 12:18:31', '2019-05-02 12:18:31');
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_marca` varchar(300) DEFAULT NULL,
  `observ_marca` varchar(300) DEFAULT NULL,
  `estado_marca` char(1) DEFAULT NULL,
  `fechaini_marca` date DEFAULT NULL,
  `fechafin_marca` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.marca: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
REPLACE INTO `marca` (`id_marca`, `nomb_marca`, `observ_marca`, `estado_marca`, `fechaini_marca`, `fechafin_marca`, `created_at`, `updated_at`) VALUES
	(4, 'Matel', 'Figura de Acción22222', 'A', '2018-08-09', '2019-02-09', '2019-04-08 12:54:24', '2019-04-08 12:54:24'),
	(5, 'Hot Weells', 'Juguete de Carro', 'I', '2016-04-06', '2014-05-20', '2019-04-08 12:59:04', '2019-04-08 12:59:04'),
	(6, 'Unilever', 'Productos Basicos', 'I', '2008-01-03', '2018-06-05', '2019-04-08 12:43:35', '2019-04-08 12:43:35'),
	(7, 'Hasbro', 'juego de mesa', 'A', '2019-02-09', '2020-02-03', '2019-03-27 15:19:20', '2019-03-27 15:19:20');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla facturacion.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_pais` varchar(50) DEFAULT NULL,
  `estado_pais` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.pais: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
REPLACE INTO `pais` (`id_pais`, `nomb_pais`, `estado_pais`, `created_at`, `updated_at`) VALUES
	(1, 'Ecuador', 'A', '2019-04-15 18:58:38', '2019-04-15 18:58:38'),
	(2, 'Perú', 'P', '2019-04-16 15:39:37', '2019-04-16 15:39:37');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.param_docs
CREATE TABLE IF NOT EXISTS `param_docs` (
  `id_param_docs` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_param_docs` varchar(100) DEFAULT NULL,
  `observ_param_docs` varchar(300) DEFAULT NULL,
  `estado_param_docs` char(1) DEFAULT NULL,
  `fechaini_param_docs` date DEFAULT NULL,
  `fechafin_param_docs` date DEFAULT NULL,
  `control_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_param_docs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.param_docs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `param_docs` DISABLE KEYS */;
/*!40000 ALTER TABLE `param_docs` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.param_porc
CREATE TABLE IF NOT EXISTS `param_porc` (
  `id_param_porc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_param_porc` varchar(100) DEFAULT NULL,
  `observ_param_porc` varchar(300) DEFAULT NULL,
  `estado_param_porc` char(1) DEFAULT NULL,
  `fechaini_param_porc` date DEFAULT NULL,
  `fechafin_param_porc` date DEFAULT NULL,
  `control_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_param_porc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.param_porc: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `param_porc` DISABLE KEYS */;
/*!40000 ALTER TABLE `param_porc` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id_per` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_contrib` bigint(20) DEFAULT NULL,
  `id_ident` bigint(20) DEFAULT NULL,
  `doc_per` varchar(30) DEFAULT NULL,
  `organiz_per` varchar(100) DEFAULT NULL,
  `nombre_per` varchar(100) DEFAULT NULL,
  `apel_per` varchar(100) DEFAULT NULL,
  `id_ciu` bigint(20) DEFAULT NULL,
  `fono1_per` varchar(15) DEFAULT NULL,
  `fono2_per` varchar(15) DEFAULT NULL,
  `cel1_per` varchar(15) DEFAULT NULL,
  `cel2_per` varchar(15) DEFAULT NULL,
  `fecnac_per` date DEFAULT NULL,
  `direc_per` varchar(450) DEFAULT NULL,
  `correo_per` varchar(50) DEFAULT NULL,
  `estado_per` char(1) DEFAULT NULL,
  `fechaini_per` date DEFAULT NULL,
  `fechafin_per` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_per`),
  KEY `persona_ibfk_2` (`id_contrib`),
  KEY `persona_ibfk_3` (`id_ciu`),
  KEY `id_ident` (`id_ident`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`id_contrib`) REFERENCES `tip_contrib` (`id_contrib`) ON DELETE NO ACTION,
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`id_ciu`) REFERENCES `ciudad` (`id_ciu`) ON DELETE NO ACTION,
  CONSTRAINT `persona_ibfk_4` FOREIGN KEY (`id_ident`) REFERENCES `identificacion` (`id_ident`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.persona: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
REPLACE INTO `persona` (`id_per`, `id_contrib`, `id_ident`, `doc_per`, `organiz_per`, `nombre_per`, `apel_per`, `id_ciu`, `fono1_per`, `fono2_per`, `cel1_per`, `cel2_per`, `fecnac_per`, `direc_per`, `correo_per`, `estado_per`, `fechaini_per`, `fechafin_per`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'jnkjnjn', 'njnkjnkj', 'Henry', 'Simbana', 2, '020156065', '0560560165', '505601650', '0506506', '1993-02-01', 'bhbhbhbjbjh', '65050650@gmail.com', 'A', '2011-05-09', '2018-04-06', '2019-03-19 10:40:26', '2019-03-19 10:40:26'),
	(2, 1, 1, '0705332989', 'Fybeca', 'Frank', 'Narvaez', 1, '0980472010', '24789', '2178965', '114789654', '1990-02-04', 'vxfvxvdv', 'Hy_mj@gmail.com', 'A', '2012-05-01', '2018-04-06', '2019-03-19 10:35:41', '2019-03-19 10:35:41'),
	(3, 2, 2, '0712323123', 'asdasd', 'dasdasd', 'dsfdf', 1, '+593 072987634', '+593 07234313', '0992323232231', '0996544568', '1998-06-25', 'adfdsdf', 'ddsdfs@fdsfsdf.com', 'A', '2019-04-22', '2019-04-01', '2019-04-22 16:12:30', '2019-04-22 16:12:30');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_prod` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_bod` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `codigo_prod` varchar(50) DEFAULT NULL,
  `codbarra_prod` varchar(300) DEFAULT NULL,
  `descripcion_prod` varchar(300) DEFAULT NULL,
  `id_marca` bigint(20) DEFAULT NULL,
  `id_cat` bigint(20) DEFAULT NULL,
  `present_prod` varchar(50) DEFAULT NULL,
  `precio_prod` double DEFAULT NULL,
  `ubicacion_prod` varchar(200) DEFAULT NULL,
  `stockmin_prod` int(11) DEFAULT NULL,
  `stockmax_prod` int(11) DEFAULT NULL,
  `fechaing_prod` date DEFAULT NULL,
  `fechaelab_prod` date DEFAULT NULL,
  `fechacad_prod` date DEFAULT NULL,
  `aplicaiva_prod` char(1) DEFAULT NULL,
  `aplicaice_prod` char(1) DEFAULT NULL,
  `util_prod` double DEFAULT NULL,
  `comision_prod` double DEFAULT NULL,
  `imagen_prod` varchar(500) DEFAULT NULL,
  `observ_prod` varchar(500) DEFAULT NULL,
  `estado_prod` char(1) DEFAULT NULL,
  `fechaini_prod` date DEFAULT NULL,
  `fechafin_prod` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.producto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`id_prod`, `id_emp`, `id_bod`, `id_fec`, `codigo_prod`, `codbarra_prod`, `descripcion_prod`, `id_marca`, `id_cat`, `present_prod`, `precio_prod`, `ubicacion_prod`, `stockmin_prod`, `stockmax_prod`, `fechaing_prod`, `fechaelab_prod`, `fechacad_prod`, `aplicaiva_prod`, `aplicaice_prod`, `util_prod`, `comision_prod`, `imagen_prod`, `observ_prod`, `estado_prod`, `fechaini_prod`, `fechafin_prod`, `created_at`, `updated_at`) VALUES
	(7, 2, 1, 2, 'p001', 'dewdwe', 'rfrfrfrfrfrfr', 5, 1, 'GNFNG', 0.1, 'vfvdf', 150, 300, NULL, '2015-09-08', '2020-05-08', 'S', 'S', 0.1, 0.1, '1553272061_producto.jpg', 'frfrf', 'A', '2016-08-09', '2019-05-08', '2019-04-26 14:55:23', '2019-04-26 14:55:23'),
	(8, 2, 2, 2, 'p002', 'Yaaa', 'Tuuuu', 6, 2, 'GNFNG', 200, 'Sur', 50, 200, '2018-06-09', '2019-04-09', '2023-05-04', 'S', 'S', 10, 10, '1553278052_ESCUELA DE SISTEMAS.png', 'Este', 'A', '2018-06-09', '2012-03-05', '2019-04-26 16:14:05', '2019-04-26 16:14:05');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_prov` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `cod_prov` varchar(20) DEFAULT NULL,
  `id_per` bigint(20) DEFAULT NULL,
  `obser_prov` varchar(200) DEFAULT NULL,
  `estado_prov` char(1) DEFAULT NULL,
  `fechaini_prov` date DEFAULT NULL,
  `fechafin_prov` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prov`),
  KEY `id_per` (`id_per`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `persona` (`id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
REPLACE INTO `proveedor` (`id_prov`, `id_emp`, `id_fec`, `cod_prov`, `id_per`, `obser_prov`, `estado_prov`, `fechaini_prov`, `fechafin_prov`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'c001', 1, 'aaaaaaaaaaaa', 'A', '2019-07-23', '2019-05-21', '2019-04-08 11:48:12', '2019-04-08 11:48:12');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.provincia
CREATE TABLE IF NOT EXISTS `provincia` (
  `id_prov` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` int(11) DEFAULT NULL,
  `nomb_prov` varchar(50) DEFAULT NULL,
  `estado_prov` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.provincia: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
REPLACE INTO `provincia` (`id_prov`, `id_pais`, `nomb_prov`, `estado_prov`, `created_at`, `updated_at`) VALUES
	(1, 1, 'El Oro', 'A', '2019-04-15 18:59:11', '2019-04-15 18:59:11'),
	(2, 1, 'Pichincha', 'I', '2019-04-16 22:46:04', '2019-04-16 22:46:04');
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_rol` varchar(50) DEFAULT NULL,
  `observ_rol` varchar(300) DEFAULT NULL,
  `estado_rol` char(1) DEFAULT NULL,
  `fechaini_rol` date DEFAULT NULL,
  `fechafin_rol` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.roles: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id_rol`, `id_emp`, `id_fec`, `nomb_rol`, `observ_rol`, `estado_rol`, `fechaini_rol`, `fechafin_rol`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'Administrador', 'dczxczxc', 'A', '2019-04-01', '2019-04-30', '2019-04-17 17:00:47', '2019-04-17 16:51:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.tipo_docum
CREATE TABLE IF NOT EXISTS `tipo_docum` (
  `id_doc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_doc` varchar(100) DEFAULT NULL,
  `observ_doc` varchar(300) DEFAULT NULL,
  `estado_doc` char(1) DEFAULT NULL,
  `fechaini_doc` date DEFAULT NULL,
  `fechafin_doc` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.tipo_docum: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_docum` DISABLE KEYS */;
REPLACE INTO `tipo_docum` (`id_doc`, `id_emp`, `id_fec`, `nomb_doc`, `observ_doc`, `estado_doc`, `fechaini_doc`, `fechafin_doc`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'Foooo', 'sdsasd', 'A', '2019-04-01', '2019-04-30', '2019-04-22 20:44:38', '2019-04-22 20:44:38');
/*!40000 ALTER TABLE `tipo_docum` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.tip_contrib
CREATE TABLE IF NOT EXISTS `tip_contrib` (
  `id_contrib` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_contrib` varchar(100) DEFAULT NULL,
  `obser_contrib` varchar(300) DEFAULT NULL,
  `estado_contrib` char(1) DEFAULT NULL,
  `fechaini_contrib` date DEFAULT NULL,
  `fechafin_contrib` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contrib`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.tip_contrib: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tip_contrib` DISABLE KEYS */;
REPLACE INTO `tip_contrib` (`id_contrib`, `nomb_contrib`, `obser_contrib`, `estado_contrib`, `fechaini_contrib`, `fechafin_contrib`, `created_at`, `updated_at`) VALUES
	(1, 'Jorge', 'Contribuyente VIP', 'A', '2012-03-18', '2019-03-18', '2019-04-08 18:08:06', '2019-04-08 18:08:06'),
	(2, 'Juan Roberto', 'Cliente Preferencial', 'I', '2011-02-04', '2018-05-03', '2019-04-08 18:08:00', '2019-04-08 18:08:00'),
	(5, 'Frank', 'yaaaaaaaaa', 'I', '2019-04-08', '2019-04-30', '2019-04-08 19:35:49', '2019-04-08 19:35:49'),
	(6, 'Henry', 'dddddd', 'A', '2019-04-15', '2019-04-30', '2019-04-09 00:36:06', '2019-04-09 00:36:06'),
	(7, 'Pepe', 'Yaaaa222', 'A', '2019-04-15', '2019-04-30', '2019-04-15 22:08:35', '2019-04-15 22:08:35');
/*!40000 ALTER TABLE `tip_contrib` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.unidad
CREATE TABLE IF NOT EXISTS `unidad` (
  `id_unidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_unidad` varchar(50) DEFAULT NULL,
  `observ_unidad` varchar(300) DEFAULT NULL,
  `estado_unidad` char(1) DEFAULT NULL,
  `fechaini_unidad` date DEFAULT NULL,
  `fechafin_unidad` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.unidad: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
REPLACE INTO `unidad` (`id_unidad`, `nomb_unidad`, `observ_unidad`, `estado_unidad`, `fechaini_unidad`, `fechafin_unidad`, `created_at`, `updated_at`) VALUES
	(1, 'Sacos', 'Livianos', 'A', '2018-05-09', '2018-06-10', '2019-04-08 12:55:13', '2019-04-08 12:55:13'),
	(2, 'Quintales', 'Pesados', 'A', '2012-02-03', '2013-04-08', '2019-03-20 19:26:42', '2019-03-20 19:26:42'),
	(3, 'Arroba', 'bbbbbbb', 'I', '2019-04-08', '2019-04-26', '2019-04-08 12:58:50', '2019-04-08 12:58:50');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;

-- Volcando estructura para tabla facturacion.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_rol` bigint(20) DEFAULT NULL,
  `id_emp` bigint(20) DEFAULT NULL,
  `id_fec` bigint(20) DEFAULT NULL,
  `nomb_usu` varchar(50) DEFAULT NULL,
  `clave_usu` varchar(500) DEFAULT NULL,
  `observ_usu` varchar(300) DEFAULT NULL,
  `estado_usu` char(1) DEFAULT NULL,
  `fechaini_usu` date DEFAULT NULL,
  `fechafin_usu` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla facturacion.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id_usu`, `id_rol`, `id_emp`, `id_fec`, `nomb_usu`, `clave_usu`, `observ_usu`, `estado_usu`, `fechaini_usu`, `fechafin_usu`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 2, 'henry', '$2y$10$RfEGL4jLpntGvNVw6qXVW.7Qnh3j9jilaN6sMmZ2Nr4GOXiWVtwS.', 'sdasdas', 'A', '2019-04-01', '2019-04-30', '2019-04-22 19:08:36', NULL, '2019-04-23 00:08:36', '2019-04-23 00:08:36');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
