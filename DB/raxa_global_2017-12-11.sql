# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.28)
# Base de datos: raxa_global
# Tiempo de Generación: 2017-12-11 15:54:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla Asignacion_Chip
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Asignacion_Chip`;

CREATE TABLE `Asignacion_Chip` (
  `ICCDID` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Fec_Asignacion` datetime NOT NULL,
  `Id_Colaborador` int(11) DEFAULT NULL,
  `Id_Almacen` int(11) DEFAULT NULL,
  `Id_Cat_Sts_Asig_Chip` int(11) DEFAULT NULL,
  `Id_Cat_Tipo_Producto` int(11) NOT NULL,
  `Vendido` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ICCDID`,`Fec_Asignacion`),
  KEY `R_6` (`Id_Colaborador`),
  KEY `R_11` (`Id_Cat_Sts_Asig_Chip`),
  KEY `R_14` (`Id_Almacen`),
  CONSTRAINT `asignacion_chip_ibfk_2` FOREIGN KEY (`Id_Colaborador`) REFERENCES `Cat_Colaboradores` (`Id_Colaborador`),
  CONSTRAINT `asignacion_chip_ibfk_3` FOREIGN KEY (`Id_Cat_Sts_Asig_Chip`) REFERENCES `Cat_Maestro` (`Id_Cat_Prim`),
  CONSTRAINT `asignacion_chip_ibfk_4` FOREIGN KEY (`Id_Almacen`) REFERENCES `Cat_Almacen` (`Id_Almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Asignacion_Chip` WRITE;
/*!40000 ALTER TABLE `Asignacion_Chip` DISABLE KEYS */;

INSERT INTO `Asignacion_Chip` (`ICCDID`, `Fec_Asignacion`, `Id_Colaborador`, `Id_Almacen`, `Id_Cat_Sts_Asig_Chip`, `Id_Cat_Tipo_Producto`, `Vendido`, `status`)
VALUES
	('8952050001701780596F','2017-08-24 03:44:13',8,NULL,3,378,0,1),
	('8952050001701780596F','2017-08-24 03:47:26',9,NULL,3,378,0,0),
	('8952050001701780661F','2017-08-24 03:59:16',NULL,1,3,378,0,1),
	('8952050001701780661F','2017-08-24 03:59:33',8,NULL,3,378,0,0),
	('8952050001701780679F','2017-08-24 03:59:16',NULL,1,3,378,0,1),
	('8952050001701780679F','2017-08-24 03:59:33',8,NULL,3,378,0,0),
	('8952050001701780687F','2017-08-24 03:59:16',NULL,1,3,378,0,1),
	('8952050001701780687F','2017-08-24 03:59:33',8,NULL,3,378,0,0),
	('8952050001701780695F','2017-08-24 03:59:16',NULL,1,3,378,1,1),
	('8952050001701780695F','2017-08-24 03:59:33',8,NULL,3,378,1,0),
	('8952050001701780703F','2017-08-24 03:59:16',NULL,1,3,378,0,1),
	('8952050001701780703F','2017-08-24 03:59:33',8,NULL,3,378,0,0),
	('8952050001701780711F','2017-08-24 03:59:16',NULL,1,3,378,0,1),
	('8952050001701780711F','2017-08-24 03:59:33',8,NULL,3,378,0,0),
	('8952050001701785199F','2017-08-29 21:43:17',NULL,1,3,378,0,0),
	('8952050001701785207F','2017-08-29 21:43:17',NULL,1,3,378,0,0);

/*!40000 ALTER TABLE `Asignacion_Chip` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Almacen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Almacen`;

CREATE TABLE `Cat_Almacen` (
  `Id_Almacen` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Sucursal` int(11) DEFAULT NULL,
  `Direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Colonia` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Almacen`),
  KEY `R_15` (`Id_Sucursal`),
  CONSTRAINT `cat_almacen_ibfk_1` FOREIGN KEY (`Id_Sucursal`) REFERENCES `Cat_Sucursal` (`Id_Sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Almacen` WRITE;
/*!40000 ALTER TABLE `Cat_Almacen` DISABLE KEYS */;

INSERT INTO `Cat_Almacen` (`Id_Almacen`, `Nombre`, `Id_Sucursal`, `Direccion`, `Colonia`, `CP`)
VALUES
	(1,'Guadalquivir',1,'Rio Guadalquivir # 2','sadcvasdfasdf',125635),
	(2,'Araucarias Piso 3',3,'Av. Araucarias 54 Piso 3','Shaop',911901),
	(3,'Puebla Almacen',2,'fsghxdfgh','sfghsdfghsf',0);

/*!40000 ALTER TABLE `Cat_Almacen` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Carrier
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Carrier`;

CREATE TABLE `Cat_Carrier` (
  `Id_Carrier` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Carrier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Carrier` WRITE;
/*!40000 ALTER TABLE `Cat_Carrier` DISABLE KEYS */;

INSERT INTO `Cat_Carrier` (`Id_Carrier`, `Nombre`)
VALUES
	(1,'AT&T'),
	(2,'Telcel'),
	(3,'Flash Mobile'),
	(4,'Virgin Mobile'),
	(5,'Movistar');

/*!40000 ALTER TABLE `Cat_Carrier` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Ciudad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Ciudad`;

CREATE TABLE `Cat_Ciudad` (
  `Id_Ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL,
  PRIMARY KEY (`Id_Ciudad`),
  KEY `R_2` (`Id_Estado`),
  CONSTRAINT `cat_ciudad_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `Cat_Estado` (`Id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Ciudad` WRITE;
/*!40000 ALTER TABLE `Cat_Ciudad` DISABLE KEYS */;

INSERT INTO `Cat_Ciudad` (`Id_Ciudad`, `Nombre`, `Id_Estado`)
VALUES
	(1,'Delegacion Cuauhtemoc',1),
	(2,'Xalapa',2),
	(3,'Puebla Capital',5);

/*!40000 ALTER TABLE `Cat_Ciudad` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Colaboradores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Colaboradores`;

CREATE TABLE `Cat_Colaboradores` (
  `Id_Colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `Jefe_Inmediato` int(11) DEFAULT NULL,
  `Id_Cat_Puesto` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Ap_Pat` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Ap_Mat` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Fec_Nac` date DEFAULT NULL,
  `Calle` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Colonia` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Municipio` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CP` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Pais` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Tel` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Cel` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IMEI` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Cel2` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IMEI2` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Grupo` int(11) DEFAULT NULL,
  `Activo` tinyint(4) NOT NULL,
  `Password` varchar(240) COLLATE latin1_spanish_ci NOT NULL,
  `User` varchar(240) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Colaborador`),
  KEY `R_34` (`Id_Grupo`),
  CONSTRAINT `cat_colaboradores_ibfk_1` FOREIGN KEY (`Id_Grupo`) REFERENCES `Cat_Grupo` (`Id_Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Colaboradores` WRITE;
/*!40000 ALTER TABLE `Cat_Colaboradores` DISABLE KEYS */;

INSERT INTO `Cat_Colaboradores` (`Id_Colaborador`, `Jefe_Inmediato`, `Id_Cat_Puesto`, `Nombre`, `Ap_Pat`, `Ap_Mat`, `Fec_Nac`, `Calle`, `Colonia`, `Municipio`, `CP`, `Estado`, `Pais`, `Tel`, `Cel`, `IMEI`, `Cel2`, `IMEI2`, `email`, `Id_Grupo`, `Activo`, `Password`, `User`)
VALUES
	(1,1,331,'Administrador','Administrador','Administrador','1979-04-20','dfghjmk','fghnjm','ghjk','12345','sdfghj','cfvgbhn','1234567890','1234567890',NULL,NULL,NULL,'alavalle@raxaglobal.com',3,0,'f244523644957c611be31b42be90e8978ff125884b3f700176a0e6f9e65a08ebeef5b993e976417218c1dd3ade88bdce5599cd39b71893a52905b53550b43d60efFd5y/EY7ZzjK2LQv/9p3uLb8Zovl5qz39hAMDORlc=','admin'),
	(2,NULL,362,'Mario ','Meraz','Dominguez','1979-04-20','0','0','0','04500','0','0','1234567890','1234567890','0','0','0','mario.meraz@gmail.com',NULL,1,'90cf8ff6fce04d8c6b2be989f743e340e67e1422815007000087817576f114cac9bd1f6ab01d9def7364bfef2d12eba4712106919e862323f4dee6d1e5c5af6dq2k4pia+14N6IC3byngIx2QZeLBnkKnGqdsP78kY+tc=','mario.meraz'),
	(5,6,363,'Alejandro Mauricio','Lavalle','Zorrilla','1973-03-05','CAMINO VIEJO A HUIXQUILUCAN 170 K204','Ex Hacienda Jesus del Monte','HUIXQUILUCAN','52764','Edo de Mexico','México','5552908602','1234567890','','0','0','alavalle@raxaglobal.com',1,1,'14c08ce6576304c952d6792d5113353d5745c5ecb5efa1eb9c17288d6e9f51a19c84fc7d4211a3be56e18cd9228826d837762c455fa33b51cbe3d65a849ba088/bidF3bOG7YDCKjx89ntM4fFCaYHDp22SrabuhtKPe0=','alavalle'),
	(6,1,332,'Alejandro','Hernandez','Gonzalez','1972-08-11','asdf','zsdf','zsdf','12345','Vearacruz','México','123444','123455',NULL,NULL,NULL,'ahernandez@raxaglobal.com',3,0,'40505e513026d313045d7a4dce0970fb6d4ea4b1f737e59988516ead541eba61756c587096d9c6a64d7ffd857867b6daf80db4a25e13626506ee86ed71ab2a8a7Tl/FF5W04dg/Xd74IXqQ5/Zzbspxpvlpyh6PWJykfY=','ahernandez'),
	(7,6,334,'Hector','Santamaria','asdgf','2017-08-17','afdg','zsfg','asdg','12345','sdf','asdf','1234567890','1234567890','','','','nosorno@raxaglobal.com',1,1,'29d382fdc81a9e99d9513826c3003d01a93a606b480ba8fd1e1dee9c9825ef07721fd53330ec1461aea3bb8a5f4c6308b2b0b8d5af0a3a2302e8a7de6fa02a3dycJ06i/1IGxeKRweThcdgYUCfNFY4fnUoWmqoWJfXKk=','hsantamaria'),
	(8,7,335,'MARIA DEL MAR','Alatorre','VALLE','2017-08-16','CAMINO VIEJO A HUIXQUILUCAN','EXHACIENDA JESUS DEL MONTE','HUIXQUILUCAN','52772','ESTADO DE MEXICO','Mexico','1234567890','1234567890','','','','malatorre@raxaglobal.com',1,1,'55a7aa92db8fc07aef1813d6dbbfe8e438a1c5cf7ed1e2146f7f38e2e89f1a3b375da344c40f1152b08172aa0b26f198fda11e222347e12b81198f261ee2e69dMWoPR7T6/B/OXJ9cT+8/Ab8P4+HE1QzWeAtALVeyrZs=','malatorre'),
	(9,8,341,'Natalia','Osorno','GZ','2017-08-16','adfg','sdfg','sdfg','12365','sdfg','sdfg','1234567890','1234567890','','','','nosorno@raxaglobal.com',1,1,'68992faa3943fbef28e2281488d193f0aeb0347392daf8fa9346967851e9eafd3e3f94c318b3b935f93a8e2bd199057bed6573292564c61d636bad9efbba3c2bBg7JtrMtn/k5rDW1P5XgRhW2nzf41a958R0IRwxK/zc=','nosorno'),
	(10,9,344,'Cuauhtemoc','zxcvzxcv','Lider','2017-08-22','adfga','sdfg','sdfg','12345','sdfg','sdfg','0','0',NULL,NULL,NULL,'cuauhtemoc@raxaglobal.com',1,0,'5b957072b5b4c02c348bc7ad675f50ec799b7f217b3ae9d52319ec5444a680ff609b9cf939fad42b9528aa931fa269ef4379e689354fd0948ce33e4167ca9c57M5OtqhU4AFXA37/Yi3qhUgDeO43+E98JR9VxqmfpLlY=','cuauhtemoc'),
	(11,9,344,'Norma','Ferra','Lider','2017-08-15','dfgsd','sdfgsdfg','sdfgsdfg','12345','sdfgs','sdfg','1234567890','1234567890','','','','nferra@raxaglobal.com',1,1,'5546c4aae90eec6b2aa369db1837707fa8f20936d2a63fb51986b97dac0185fb40d7de4baf0280b451ebfe84195f45d3b93074d8832968aa6fec1167cb804c44gGkxadVKJkxfQXvjxNHgyYJ3iMMwxgO1SQlE0w1t3qw=','nferra'),
	(12,10,345,'Ejec 1 ','Cuahutemoc','ejecutivo','2017-08-16','xcvb','xcvb','xcvb','0','xcvb','xcvb','0','0',NULL,NULL,NULL,'ejec1@raxaglobal.com',1,0,'49b1a51da113fc78834e9b680906b79111d47e01ed9ee186100415d25205f4ff2a13a9d11c153d7e641b64b9bd698f13c79bcf7a51a4156e58833642523471c5K4qmf8s1wqd3zeCcO00NL7tGADspJC7y85UOC8UNHpA=','ejec1'),
	(13,11,341,'Ejec 2','Norma','ejecutivo','2017-08-18','zxcvzxcv','zxcvzxcv','zxcvzxcv','12345','vxczbzxcvb','zxcvzxcv','1234567890','1234567890',NULL,NULL,NULL,'ejec2@raxaglobal.com',1,0,'6c4a169abbc4d7e3637d6d2629251af30255f7ae5333eda7259338c9614400c8c188c8d044fdd01f3798752657460c77cf0924afa238651f2caad4056d1a330dFBfhQwJ4Dol5fsWLpLT4USqiDk0M0YAa+GocsBdB0lA=','ejec2'),
	(14,7,334,'Patricia','Hernandez','Gonzalez','2017-08-17','asdfasdf','asdfasdf','asdfasdf','12345','sdfasd','fasdfasdf','1234567890','1234567890','','1234567890','','phernandez@raxaglobal.com',3,1,'ee5719d2a0389da126cc03a9e68775bf5b134a353329e95ee1147c5d75976ab4329708e21a7fca792bcde4060551c7fb505e9ccf99fe1ed0256c99dfd1d15ae6nGclhbReR7lqtN3R9ubRm3kDRZx78yJHgMpibOdo+GE=','hsantamaria'),
	(15,7,335,'prueba','eorea','oiaos','2017-09-28','343','34','34','34454','34','34','4444444444','4444444444','asd','asd','','asdasd@asdasd.com',1,1,'15d52b949068a9ee9c087cd068c185d1c1d70368084a59c0d41bc7989bcf4082cd24282a815099dd026bcee766b35ad22802d7361bc7bcffd8b09210589896540wW5m6HiyjZzvUFaJmZ1pTUJs6sA1UTg0/pP1z7YOt4=','pruebaeo44');

/*!40000 ALTER TABLE `Cat_Colaboradores` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Estado
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Estado`;

CREATE TABLE `Cat_Estado` (
  `Id_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Zona` int(11) NOT NULL,
  PRIMARY KEY (`Id_Estado`),
  KEY `R_1` (`Id_Zona`),
  CONSTRAINT `cat_estado_ibfk_1` FOREIGN KEY (`Id_Zona`) REFERENCES `Cat_Zona` (`Id_Zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Estado` WRITE;
/*!40000 ALTER TABLE `Cat_Estado` DISABLE KEYS */;

INSERT INTO `Cat_Estado` (`Id_Estado`, `Nombre`, `Id_Zona`)
VALUES
	(1,'CDMX',1),
	(2,'Veracruz',3),
	(3,'Campeche',4),
	(4,'Tabasco',4),
	(5,'Puebla',3),
	(6,'Aguascalientes',5);

/*!40000 ALTER TABLE `Cat_Estado` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Grupo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Grupo`;

CREATE TABLE `Cat_Grupo` (
  `Id_Grupo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Grupo`),
  KEY `R_16` (`Id_Ciudad`),
  CONSTRAINT `cat_grupo_ibfk_1` FOREIGN KEY (`Id_Ciudad`) REFERENCES `Cat_Ciudad` (`Id_Ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Grupo` WRITE;
/*!40000 ALTER TABLE `Cat_Grupo` DISABLE KEYS */;

INSERT INTO `Cat_Grupo` (`Id_Grupo`, `Nombre`, `Id_Ciudad`)
VALUES
	(1,'CDMX 1',1),
	(2,'Xalapa 7.1',2),
	(3,'Corporativo Araucarias',2);

/*!40000 ALTER TABLE `Cat_Grupo` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Maestro
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Maestro`;

CREATE TABLE `Cat_Maestro` (
  `Id_Cat_Prim` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cat_Sec` int(11) DEFAULT NULL,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `String1` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `String2` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `String3` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `String4` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `String5` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Cat_Prim`),
  KEY `R_9` (`Id_Cat_Sec`),
  CONSTRAINT `cat_maestro_ibfk_1` FOREIGN KEY (`Id_Cat_Sec`) REFERENCES `Cat_Maestro` (`Id_Cat_Prim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Maestro` WRITE;
/*!40000 ALTER TABLE `Cat_Maestro` DISABLE KEYS */;

INSERT INTO `Cat_Maestro` (`Id_Cat_Prim`, `Id_Cat_Sec`, `Nombre`, `String1`, `String2`, `String3`, `String4`, `String5`)
VALUES
	(1,NULL,'','','','','',''),
	(2,1,'Estatus de Asignacion de CHIP','','','','',''),
	(3,2,'Virgen','','','','',''),
	(4,2,'Quemado','','','','',''),
	(5,2,'Robado o Notificado Perdido','','','','',''),
	(6,2,'Cobrado','','','','',''),
	(7,1,'Estatus Portabilidad','','','','',''),
	(8,7,'Pendiente Validacion de Calidad','','','','',''),
	(9,7,'Transito','','','','',''),
	(10,7,'En tramite','','','','',''),
	(11,7,'Portado','','','','',''),
	(12,7,'Error','','','','',''),
	(13,7,'Cancelado','','','','',''),
	(14,1,'Fase Portabilidad','','','','',''),
	(15,14,'Registrado','','','','',''),
	(16,14,'Cliente Validado','','','','',''),
	(17,14,'SIM Activado','','','','',''),
	(18,14,'Portabilidad Generada','','','','',''),
	(19,14,'En Proceso AT&T','','','','',''),
	(20,14,'Programada AT&T','','','','',''),
	(21,14,'Finalizada AT&T','','','','',''),
	(22,14,'Recargado RAXA','','','','',''),
	(23,14,'Cierre Portabilidad','','','','',''),
	(24,14,'Validacion de 7 Dias','','','','',''),
	(25,14,'Validacion de 14 Dias','','','','',''),
	(26,14,'Validacion de 40 Dias','','','','',''),
	(27,14,'Validacion de 60 Dias','','','','',''),
	(28,14,'Validacion de 90 Dias','','','','',''),
	(29,14,'Validacion de 120 Dias','','','','',''),
	(30,14,'Validacion de 180 Dias','','','','',''),
	(31,1,'Ladas','#LADA','Covertura','','',''),
	(32,31,'AGUASCALIENTES','','','','',''),
	(33,32,'AGUASCALIENTES ','449','SI','','',''),
	(34,32,'CALVILLO','495','SI','','',''),
	(35,32,'RINCON ROMOS ','465','SI','','',''),
	(36,31,'BAJA CALIFORNIA NORTE','','','','',''),
	(37,36,'ENSENADA','646','SI','','',''),
	(38,36,'MEXICALI','686','SI','','',''),
	(39,36,'ROSARITO','661','SI','','',''),
	(40,36,'TECATE','665','SI','','',''),
	(41,36,'TIJUANA','664','SI','','',''),
	(42,31,'BAJA CALIFORNIA SUR','','','','',''),
	(43,42,'CABO SAN LUCAS','624','SI','','',''),
	(44,42,'LA PAZ','612','SI','','',''),
	(45,42,'SAN JOSE DEL CABO','624','SI','','',''),
	(46,31,'CAMPECHE','','','','',''),
	(47,46,'CALKINI','996','SI','','',''),
	(48,46,'CAMPECHE','981','SI','','',''),
	(49,46,'CHAMPOTON','982','SI','','',''),
	(50,46,'CIUDAD DEL CARMEN','938','SI','','',''),
	(51,31,'CHIAPAS','','','','',''),
	(52,51,'CINTALAPA DE FIGUEROA','968','SI','','',''),
	(53,51,'COMITAN','963','SI','','',''),
	(54,51,'OCOSINGO','919','SI','','',''),
	(55,51,'PALENQUE','916','SI','','',''),
	(56,51,'REFORMA','916','SI','','',''),
	(57,51,'SAN CRISTOBAL DE LAS CASAS','967','SI','','',''),
	(58,51,'TAPACHULA','962','SI','','',''),
	(59,51,'TONALA','966','SI','','',''),
	(60,51,'TUXTLA GUTIERREZ','961','SI','','',''),
	(61,31,'CHIHUAHA','','','','',''),
	(62,61,'CHIHUAHA','614','SI','','',''),
	(63,61,'CUAUHTEMOC','625','SI','','',''),
	(64,61,'DELICIAS','639','SI','','',''),
	(65,61,'HIDALGO DEL PARRAL','627','SI','','',''),
	(66,61,'JOSE MARIANO JIMENEZ','629','SI','','',''),
	(67,61,'JUAREZ','656','SI','','',''),
	(68,61,'NUEVO CASAS GRANDES','636','NO','','',''),
	(69,61,'SANTA ROSALIA DEL CAMARGO','648','SI','','',''),
	(70,31,'COAHUILA','','','','',''),
	(71,70,'ALLENDE','862','NO','','',''),
	(72,70,'CIUDAD ACUÑA','877','SI','','',''),
	(73,70,'FRANCISCO I MADERO','872','SI','','',''),
	(74,70,'MONCLOVA','866','SI','','',''),
	(75,70,'PIEDRAS NEGRAS','878','SI','','',''),
	(76,70,'SALTILLO','844','SI','','',''),
	(77,70,'TORREON','871','SI','','',''),
	(78,31,'COLIMA','','','','',''),
	(79,78,'COLIMA','312','SI','','',''),
	(80,78,'MANZANILLO','314','SI','','',''),
	(81,78,'TECOMAN','313','SI','','',''),
	(82,31,'DISTRITO FEDERAL','','','','',''),
	(83,82,'AREA METROPOLITANA ','55','SI','','',''),
	(84,31,'DURANGO','','','','',''),
	(85,84,'CIUDAD GUADALUPE VICTORIA','676','SI','','',''),
	(86,84,'DURANGO','618','NO','','',''),
	(87,84,'FRANCISCO I MADERO','677','SI','','',''),
	(88,84,'VICTORIA DE DURANGO','676','SI','','',''),
	(89,31,'ESTADO DE MEXICO','','','','',''),
	(90,89,'IXTAPAN DE LA SAL','721','SI','','',''),
	(91,89,'TEXCOCO DE MORA','595','SI','','',''),
	(92,89,'TOLUCA','722','SI','','',''),
	(93,31,'ESTADO DE MEXICO ','','','','',''),
	(94,93,'ATLACOMULCO','712','SI','','',''),
	(95,31,'GUANAJUATO','','','','',''),
	(96,95,'ABASOLO','429','SI','','',''),
	(97,95,'ACAMBARO','417','SI','','',''),
	(98,95,'APASEO EL GRANDE','413','SI','','',''),
	(99,95,'CELAYA','461','SI','','',''),
	(100,95,'COMONFORT','412','SI','','',''),
	(101,95,'CORTAZAR','411','SI','','',''),
	(102,95,'DOLORES HIDALGO','418','SI','','',''),
	(103,95,'GUANAJUATO','473','SI','','',''),
	(104,95,'IRAPUATO','462','SI','','',''),
	(105,95,'JERECUARO','421','SI','','',''),
	(106,95,'LEON','477','SI','','',''),
	(107,95,'MOROLEON','445','SI','','',''),
	(108,95,'PENJAMO','469','SI','','',''),
	(109,95,'SALAMANCA','464','SI','','',''),
	(110,95,'SALVATIERRA','466','SI','','',''),
	(111,95,'SAN FELIPE','428','SI','','',''),
	(112,95,'SAN FRANCISCO DEL RINCON','476','SI','','',''),
	(113,95,'SAN JOSE ITURBIDE','419','SI','','',''),
	(114,95,'SAN LUIS DE LA PAZ','468','SI','','',''),
	(115,95,'SAN MIGUEL ALLENDE','415','SI','','',''),
	(116,95,'SILAO','472','SI','','',''),
	(117,95,'VALLE DE SANTIAGO ','456','SI','','',''),
	(118,31,'GUERRERO','','','','',''),
	(119,118,'ACAPULCO','744','SI','','',''),
	(120,118,'ARCELIA','732','SI','','',''),
	(121,118,'ATOYAC DE ALVAREZ','742','SI','','',''),
	(122,118,'BUENAVISTA DE CUELLAR','727','NO','','',''),
	(123,118,'CHILAPA DE ALVAREZ','756','SI','','',''),
	(124,118,'CHILPANCINGO','747','SI','','',''),
	(125,118,'CIUDAD ALTAMIRANO','767','SI','','',''),
	(126,118,'IGUALA','733','SI','','',''),
	(127,118,'OMETEPEC','741','NO','','',''),
	(128,118,'TAXCO','762','SI','','',''),
	(129,118,'TIXTLA DE GUERRERO','754','SI','','',''),
	(130,118,'TLAPA DE COMONFORT','757','SI','','',''),
	(131,118,'ZIHUATANEJO','755','SI','','',''),
	(132,31,'HIDALGO','','','','',''),
	(133,132,'PACHUCA','771','SI','','',''),
	(134,132,'TIZAYUCA','779','SI','','',''),
	(135,132,'TULA DE ALLENDE','773','SI','','',''),
	(136,132,'TULANCINGO','775','SI','','',''),
	(137,31,'HIDALGO ','','','','',''),
	(138,137,'ACTOPAN','772','SI','','',''),
	(139,31,'JALISCO','','','','',''),
	(140,139,'AMECA','375','SI','','',''),
	(141,139,'ARANDAS','348','SI','','',''),
	(142,139,'ATOTONILCO EL ALTO','391','SI','','',''),
	(143,139,'AUTLAN DE NAVARRO','317','SI','','',''),
	(144,139,'BARRA DE NAVIDAD','315','SI','','',''),
	(145,139,'CHAPALA','376','SI','','',''),
	(146,139,'CIUDAD GUZMAN','341','SI','','',''),
	(147,139,'ENCARNACION DE DIAZ','475','SI','','',''),
	(148,139,'GUADALAJARA','33','SI','','',''),
	(149,139,'JALOSTOTITLAN','431','SI','','',''),
	(150,139,'LA BARCA','393','SI','','',''),
	(151,139,'LAGOS DE MORENO','474','SI','','',''),
	(152,139,'OCOTLAN ','392','SI','','',''),
	(153,139,'OJUELOS DE JALISCO ','496','SI','','',''),
	(154,139,'PUERTO VALLARTA','322','SI','','',''),
	(155,139,'SAN JUAN DE LOS LAGOS ','395','SI','','',''),
	(156,139,'SAN MIGUEL EL ALTO ','347','SI','','',''),
	(157,139,'TALA','384','SI','','',''),
	(158,139,'TEPATITLAN','378','SI','','',''),
	(159,139,'TEQUILA','374','SI','','',''),
	(160,139,'ZAPOTLANEJO','373','SI','','',''),
	(161,31,'MICHOACAN','','','','',''),
	(162,161,'LA PIEDAD','352','SI','','',''),
	(163,161,'LAZARO CARDENAS','753','SI','','',''),
	(164,161,'MARAVATIO','447','SI','','',''),
	(165,161,'MORELIA ','443','SI','','',''),
	(166,161,'PATZCUARO','434','SI','','',''),
	(167,161,'SAHUAYO','353','SI','','',''),
	(168,161,'SAN FRANCISCO DE LOS REYES ','711','SI','','',''),
	(169,161,'URUAPAN','452','SI','','',''),
	(170,161,'ZACAPU','436','SI','','',''),
	(171,161,'ZAMORA','351','SI','','',''),
	(172,31,'MICHOACAN ','','','','',''),
	(173,172,'APATZINGAN ','453','SI','','',''),
	(174,172,'ZITACUARO','715','SI','','',''),
	(175,31,'MORELOS','','','','',''),
	(176,175,'CUAUTLA','735','SI','','',''),
	(177,175,'CUERNAVACA','777','SI','','',''),
	(178,31,'NAYARIT','','','','',''),
	(179,178,'ACAPONETA NAYARIT','325','SI','','',''),
	(180,178,'TEPIC','311','SI','','',''),
	(181,31,'NUEVO LEON ','','','','',''),
	(182,181,'CADEREYTA JIMENEZ','828','SI','','',''),
	(183,181,'CIUDAD DE ALLENDE','826','SI','','',''),
	(184,181,'CIUDAD SABINAS HIDALGO','824','SI','','',''),
	(185,181,'LINARES','821','SI','','',''),
	(186,181,'MONTE MORELOS','826','SI','','',''),
	(187,181,'MONTERREY','2522','SI','','',''),
	(188,31,'OAXACA ','','','','',''),
	(189,188,'BAHIA DE HUATULCO ','958','SI','','',''),
	(190,188,'HUAJUAPAN DE LEON','953','SI','','',''),
	(191,188,'HUAUTLA DE JIMENEZ','236','NO','','',''),
	(192,188,'JUCHITAN','971','SI','','',''),
	(193,188,'LOMA BONITA','281','NO','','',''),
	(194,188,'OAXACA','951','SI','','',''),
	(195,188,'SALINA CRUZ','971','SI','','',''),
	(196,188,'SAN PEDRO MIXTEPEC DISTRITO 22','954','NO','','',''),
	(197,188,'TEHUANTEPEC','971','SI','','',''),
	(198,188,'TUXTEPEC','287','SI','','',''),
	(199,31,'PUEBLA','','','','',''),
	(200,199,'ATLIXCO','244','SI','','',''),
	(201,199,'CHIAUTLA','275','NO','','',''),
	(202,199,'CIUDAD SERDAN','245','SI','','',''),
	(203,199,'HUAUCHINANGO','776','SI','','',''),
	(204,199,'HUEJOTZINGO','227','SI','','',''),
	(205,199,'IZUCAR DE MATAMOROS','243','NO','','',''),
	(206,199,'PUEBLA','222','SI','','',''),
	(207,199,'SAN JOSE CHIAPA','276','NO','','',''),
	(208,199,'SAN MARTIN TEXMELUCAN','248','SI','','',''),
	(209,199,'TECALI DE HERRERA','224','NO','','',''),
	(210,199,'TECAMACHALCO','249','SI','','',''),
	(211,199,'TEHUACAN','238','SI','','',''),
	(212,199,'TEPEACA','223','NO','','',''),
	(213,199,'TEZIUTLAN ','231','SI','','',''),
	(214,199,'XICOTEPEC','764','NO','','',''),
	(215,199,'ZACAPOAXTLA','233','NO','','',''),
	(216,31,'QUERETARO','','','','',''),
	(217,216,'AMEALCO','448','SI','','',''),
	(218,216,'CADEREYTA','441','SI','','',''),
	(219,216,'EZEQUIEL MONTES','441','SI','','',''),
	(220,216,'PEDRO ESCOBEDO','448','SI','','',''),
	(221,216,'QUERETARO','442','SI','','',''),
	(222,216,'SAN JUAN DEL RIO ','427','SI','','',''),
	(223,216,'TEQUISQUIAPAN ','414','SI','','',''),
	(224,31,'QUINTANA ROO','','','','',''),
	(225,224,'CHETUMAL','983','SI','','',''),
	(226,224,'COZUMEL','987','SI','','',''),
	(227,224,'PLAYA DEL CARMEN ','984','SI','','',''),
	(228,31,'QUINTANA ROO ','','','','',''),
	(229,228,'CANCUN ','998','SI','','',''),
	(230,31,'SAN LUIS POTOSI','','','','',''),
	(231,230,'CIUDAD VALLES','481','SI','','',''),
	(232,230,'EBANO','845','NO','','',''),
	(233,230,'MATEHUALA','488','SI','','',''),
	(234,230,'RIO VERDE','487','SI','','',''),
	(235,230,'SAN LUIS POTOSI','444','SI','','',''),
	(236,230,'TAMUIN','489','SI','','',''),
	(237,31,'SINALOA ','','','','',''),
	(238,237,'CULIACAN','667','SI','','',''),
	(239,237,'EL ROSARIO','694','SI','','',''),
	(240,237,'ESCUINAPAN','695','SI','','',''),
	(241,237,'GUAMUCHIL','673','SI','','',''),
	(242,237,'GUASAVE','687','SI','','',''),
	(243,237,'LOS MOCHIS','668','SI','','',''),
	(244,237,'MAZATLAN ','669','SI','','',''),
	(245,237,'MOCORITO','673','SI','','',''),
	(246,237,'NAVOLATO','672','SI','','',''),
	(247,237,'TOPOLOBANPO','668','SI','','',''),
	(248,31,'SONORA','','','','',''),
	(249,248,'CANANEA','645','NO','','',''),
	(250,248,'CIUDAD OBREGON','644','SI','','',''),
	(251,248,'GUAYMAS','622','SI','','',''),
	(252,248,'HERMOSILLO ','662','SI','','',''),
	(253,248,'HEROICA NOGALES','631','SI','','',''),
	(254,248,'NAVOJOA','442','SI','','',''),
	(255,248,'PUERTO PEÑASCO','638','SI','','',''),
	(256,248,'SAN LUIS RIO COLORADO ','653','SI','','',''),
	(257,31,'TABASCO ','','','','',''),
	(258,257,'CARDENAS','937','SI','','',''),
	(259,257,'COMALCALCO','933','SI','','',''),
	(260,257,'EMILIANO ZAPATA','932','SI','','',''),
	(261,257,'HUIMANGUILLA','917','NO','','',''),
	(262,257,'JALPA DE MENDEZ ','914','SI','','',''),
	(263,257,'MACUSPANA ','936','SI','','',''),
	(264,257,'TEAPA','932','SI','','',''),
	(265,257,'VILLA HERMOSA','993','SI','','',''),
	(266,31,'TAMAULIPAS ','','','','',''),
	(267,266,'ABASOLO','835','NO','','',''),
	(268,266,'CIUDAD MANTE','831','SI','','',''),
	(269,266,'CIUDAD RIO BRAVO','899','SI','','',''),
	(270,266,'CIUDAD VICTORIA','834','SI','','',''),
	(271,266,'HEROICA MATAMOROS','868','SI','','',''),
	(272,266,'MIGUEL ALEMAN','897','SI','','',''),
	(273,266,'NUEVO LAREDO','867','SI','','',''),
	(274,266,'REYNOSA','899','SI','','',''),
	(275,266,'TAMPICO ','833','SI','','',''),
	(276,266,'VALLE HERMOSO','894','SI','','',''),
	(277,31,'TLAXCALA','','','','',''),
	(278,277,'APIZACO','241','SI','','',''),
	(279,277,'CALPULALPAN','749','SI','','',''),
	(280,277,'HUAMANTLA','247','SI','','',''),
	(281,31,'TLAXCALA ','','','','',''),
	(282,281,'TLAXCALA','246','SI','','',''),
	(283,31,'VERACRUZ','','','','',''),
	(284,283,'ACAYUCAN','924','SI','','',''),
	(285,283,'AGUA DULCE','923','SI','','',''),
	(286,283,'ALTO LUCERO DE GUTIERREZ BARRIOS','279','NO','','',''),
	(287,283,'ALVARADO','297','NO','','',''),
	(288,283,'ANGEL R. CABADA','284','NO','','',''),
	(289,283,'CERRO AZUL ','785','SI','','',''),
	(290,283,'COATZACOALCOS','921','SI','','',''),
	(291,283,'CORDOBA','271','SI','','',''),
	(292,283,'COSAMALOAPAN','288','SI','','',''),
	(293,283,'JALACINGO','226','SI','','',''),
	(294,283,'JOSE CARDEL','296','SI','','',''),
	(295,283,'JUAN RODRIGUEZ CLARA','283','NO','','',''),
	(296,283,'LAS CHOAPAS','923','SI','','',''),
	(297,283,'MAHUIXTLAN','228','SI','','',''),
	(298,283,'MARTINEZ DE LA TORRE','232','SI','','',''),
	(299,283,'MINATITLAN','922','SI','','',''),
	(300,283,'MISANTLA','235','NO','','',''),
	(301,283,'OMEALCA','278','NO','','',''),
	(302,283,'ORIZABA ','272','SI','','',''),
	(303,283,'PANUCO','846','NO','','',''),
	(304,283,'PAPANTLA','784','SI','','',''),
	(305,283,'PASO DEL MACHO ','273','NO','','',''),
	(306,283,'PEROTE','282','NO','','',''),
	(307,283,'POZA RICA','782','SI','','',''),
	(308,283,'SAN ANDRES TUXTLA','294','SI','','',''),
	(309,283,'TECOLUTLA','766','NO','','',''),
	(310,283,'TIERRA BLANCA ','274','SI','','',''),
	(311,283,'TIHUATLAN','746','NO','','',''),
	(312,283,'TLALIXCOYAN','285','NO','','',''),
	(313,283,'TLAPACOYAN','225','NO','','',''),
	(314,283,'TUXPAM ','783','SI','','',''),
	(315,283,'VERACRUZ','229','SI','','',''),
	(316,283,'XALAPA','228','SI','','',''),
	(317,283,'ZACATLAN','797','NO','','',''),
	(318,31,'YUCATAN ','','','','',''),
	(319,317,'IZAMAL ','988','SI','','',''),
	(320,317,'MERIDA','999','SI','','',''),
	(321,317,'TICUL ','997','SI','','',''),
	(322,317,'TIZIMIN','986','SI','','',''),
	(323,317,'VALLADOLID','985','SI','','',''),
	(324,31,'ZACATECAS','','','','',''),
	(325,324,'FRESNILLO ','493','SI','','',''),
	(326,324,'JEREZ DE GARCIA SALINAS','494','SI','','',''),
	(327,324,'RIO GRANDE','498','SI','','',''),
	(328,324,'VICTOR ROSALES','496','SI','','',''),
	(329,324,'ZACATECAS','492','SI','','',''),
	(330,1,'Areas','','','','',''),
	(331,330,'Direccion General','','','','',''),
	(332,331,'Director General','Administrativo','1','','',''),
	(333,330,'Comercial','','','','',''),
	(334,333,'Director Comercial','Administrativo','1','','',''),
	(335,333,'Gerente Comercial','Administrativo','2','','',''),
	(336,333,'Gerente Comercial (Accesorios)','Administrativo','2','','',''),
	(337,333,'Enlace Life Movile','Administrativo','3','','',''),
	(338,333,'Jefe de Inventarios','Administrativo','3','','',''),
	(339,333,'Coordinador Ventas','Calle y Cadenas comerciales','3','','',''),
	(340,333,'Ejecutivo de Ventas','Calle y Cadenas comerciales','4','','',''),
	(341,333,'Gerente Sr','Portabilidad','2','','',''),
	(343,333,'Gerente Jr','Portabilidad','4','','',''),
	(344,333,'Lider','Portabilidad','5','','',''),
	(345,333,'Ejecutivo','Portabilidad','6','','',''),
	(346,333,'Coordinador de Postpago','Postpago','3','','',''),
	(347,333,'Ejecutivo Postpago','Postpago','4','','',''),
	(348,330,'Juridico','','','','',''),
	(349,348,'Director Juridico','Administrativo','1','','',''),
	(350,330,'Operaciones','','','','',''),
	(351,350,'Director de Operaciones','Administrativo','1','','',''),
	(352,350,'Supervisor de Portabilidad','Administrativo','2','','',''),
	(353,350,'Supervisor de Calidad y Call Center','Administrativo','2','','',''),
	(354,350,'Supervisor de Analisis de Lineas','Administrativo','2','','',''),
	(355,350,'Ejecutivo de Portabilidad','Administrativo','3','','',''),
	(356,350,'Ejecutivo de Calidad y Call Center','Administrativo','3','','',''),
	(357,350,'Ejecutivo de Analisis de Lineas','Administrativo','3','','',''),
	(358,350,'Vacio','Administrativo','3','','',''),
	(359,330,'Mercadotecnia y Publicidad','','','','',''),
	(360,359,'Director de Mercadotecnia','Administrativo','1','','',''),
	(361,359,'Vacio','Administrativo','2','','',''),
	(362,330,'TI y Procesos','','','','',''),
	(363,362,'Director de TI y Procesos','Administrativo','1','','',''),
	(364,362,'Ejecutivo de Infraestructura y Operación','Administrativo','2','','',''),
	(365,362,'Ejecutivo de Desarrollo','Administrativo','2','','',''),
	(366,330,'Finanzas','','','','',''),
	(367,366,'Director de Finanzas','Administrativo','1','','',''),
	(368,366,'Vacio','Administrativo','2','','',''),
	(369,366,'Vacio','Administrativo','2','','',''),
	(370,366,'Vacio','Administrativo','2','','',''),
	(371,366,'Vacio','Administrativo','2','','',''),
	(372,330,'Recursos Humanos','','','','',''),
	(373,372,'Director de Recurso Humanos','Administrativo','1','','',''),
	(374,372,'Vacio','Administrativo','2','','',''),
	(375,372,'Vacio','Administrativo','2','','',''),
	(376,372,'Vacio','Administrativo','2','','',''),
	(377,1,'Catalogo Tipo Producto','','','','',''),
	(378,377,'Chip Portabilidad','','','','',''),
	(379,377,'Chip Beneficios','','','','',''),
	(380,1,'Catalogo Grupo Comercial','','','','',''),
	(381,380,'Mexico 1','','','','',''),
	(382,380,'Jalapa 7','','','','',''),
	(383,1,'Error de Portabilidad','','','','',''),
	(384,383,'NIP Incorrecto','','','','',''),
	(385,383,'Numero No Existe','','','','',''),
	(386,383,'ICCID Incorrecto','','','','',''),
	(387,383,'Numero previemante Portado','','','','',''),
	(388,383,'Cliente no solicito la portabilidad','','','','',''),
	(389,383,'Linea Fija (No Procede)','','','','',''),
	(390,383,'Ya es Cliente AT&T','','','','',''),
	(391,383,'Tramite Pendiente','','','','',''),
	(392,383,'Numero Corporativo','','','','',''),
	(393,383,'Numero con Plan','','','','',''),
	(394,383,'Error de Asignacion de LADA','','','','',''),
	(395,383,'Sin Covertura','','','','',''),
	(396,383,'Chip Extraviado','','','','',''),
	(434,1,'Empresas',NULL,NULL,NULL,NULL,NULL),
	(435,1,'Departamentos',NULL,NULL,NULL,NULL,NULL),
	(436,434,'RAXA GLOBAL',NULL,NULL,NULL,NULL,NULL),
	(437,435,'Juridico',NULL,NULL,NULL,NULL,NULL),
	(438,435,'Comercial',NULL,NULL,NULL,NULL,NULL),
	(439,435,'Operaciones',NULL,NULL,NULL,NULL,NULL),
	(440,435,'Mercadotecnia y Publicidad',NULL,NULL,NULL,NULL,NULL),
	(441,435,'TI y Procesos',NULL,NULL,NULL,NULL,NULL),
	(442,435,'Finanzas',NULL,NULL,NULL,NULL,NULL),
	(443,435,'Recursos Humanos',NULL,NULL,NULL,NULL,NULL),
	(449,1,'Menu','0',NULL,NULL,NULL,NULL),
	(453,449,'Producto','1','dropdown-pro',NULL,NULL,'#!'),
	(454,449,'Seguimiento','1','dropdown-seg',NULL,NULL,'#!'),
	(455,449,'Consultas','1','dropdown-con',NULL,NULL,'#!'),
	(456,449,'Administración','1','dropdown-adm',NULL,NULL,'#!'),
	(457,453,'Registro de Portabilidad','2','dropdown-pro',NULL,NULL,'RegPortabilidad/'),
	(458,453,'Asignacion de SIM\'s','2','dropdown-pro',NULL,NULL,'AsignacionChip/'),
	(459,454,'Validación de Calidad','2','dropdown-seg',NULL,NULL,'Seguimiento/ValSIM/'),
	(460,454,'Activación  SIM','2','dropdown-seg',NULL,NULL,'Seguimiento/ActSIM/'),
	(461,454,'Activación  SIM Beneficios','2','dropdown-seg',NULL,NULL,'Seguimiento/ActSIMBeneficio/'),
	(462,454,'Generación de Portabilidad','2','dropdown-seg',NULL,NULL,'Seguimiento/GenPorta/'),
	(463,454,'Recarga Promoción','2','dropdown-seg',NULL,NULL,'#!'),
	(464,454,'Validación de Actividad','2','dropdown-seg','','','#!'),
	(465,455,'Portabilidad','2','dropdown-con','','','#!'),
	(466,455,'Asignacion de SIMs','2','dropdown-con','','','Consultas/ActSIM/'),
	(467,455,'SIM de Beneficios','2','dropdown-con','','','Consultas/ActSIMBeneficio/'),
	(468,456,'Catalogo Estatico','2','dropdown-adm','dropdown-estatico','','#!'),
	(469,456,'Catalogo Dinamico','2','dropdown-adm','dropdown-dinamico','','#!'),
	(470,456,'Salida del Inv. Central','2','dropdown-adm','','','SalidaInv/'),
	(471,469,'Maestro/Cadenas','3','dropdown-dinamico','','','Catalogos/Cadenas/'),
	(472,468,'Zona','3','dropdown-estatico','','','Catalogos/Zona/'),
	(473,468,'Estado','3','dropdown-estatico','','','Catalogos/Estado/'),
	(474,468,'Ciudad/Mun/Del','3','dropdown-estatico','','','Catalogos/Ciudad/'),
	(475,468,'Sucursal','3','dropdown-estatico','','','Catalogos/Sucursal/'),
	(476,468,'Almacen','3','dropdown-estatico','','','Catalogos/Almacen/'),
	(477,468,'Grupo','3','dropdown-estatico','','','Catalogos/Grupo/'),
	(478,468,'Colaboradores','3','dropdown-estatico','','','Catalogos/Colaborador/'),
	(479,468,'Carrier','3','dropdown-estatico','','','Catalogos/Carrier/'),
	(480,468,'Maestro','3','Catalagos/maestro/','','','Catalogos/Maestro/'),
	(481,468,'Perfiles','3','dropdown-estatico','','','Perfiles/'),
	(486,453,'Asignacion de SIMs entre Almacen','2','dropdown-pro','','','AsignacionChip/Almacen/'),
	(489,454,'Log/Consultas','2','',NULL,'NO','Consultas/Log/'),
	(491,468,'Zona Nuevo','3','','','NO','Catalogos/newZona/'),
	(492,468,'Menu  - Perfiles','3','','','NO','Perfiles/MenuPerfil/'),
	(493,468,'Colaborador  - Perfiles','3','','','NO','Perfiles/ColaboradorPerfil/'),
	(494,468,'Zona Editar','3','','','NO','Catalogos/editZona/'),
	(495,468,'Estado Nuevo','3','','','NO','Catalogos/newEstado/'),
	(496,468,'Estado Editar','3','','','NO','Catalogos/editEstado/'),
	(497,468,'Ciudad Nuevo','3','','','NO','Catalogos/newCiudad/'),
	(498,468,'Ciudad Editar','3','','','NO','Catalogos/editCiudad/'),
	(499,468,'Sucursal Nuevo','3','','','NO','Catalogos/newSucursal/'),
	(500,468,'Sucursal Editar','3','','','NO','Catalogos/editSucursal/'),
	(501,468,'Almacen Nuevo','3','','','NO','Catalogos/newAlmacen/'),
	(502,468,'Almacen Editar','3','','','NO','Catalogos/editAlmacen/'),
	(503,468,'Grupo Nuevo','3','','','NO','Catalogos/newGrupo/'),
	(504,468,'Grupo Editar','3','','','NO','Catalogos/editGrupo/'),
	(505,468,'Colaborador Nuevo','3','','','NO','Catalogos/newColaborador/'),
	(506,468,'Colaborador Editar','3','','','NO','Catalogos/editColaborador/'),
	(507,468,'Carrier Nuevo','3','','','NO','Catalogos/newCarrier/'),
	(508,468,'Carrier Editar','3','','','NO','Catalogos/editCarrier/'),
	(509,468,'Maestro Nuevo','3','','','NO','Catalogos/newMaestro/'),
	(510,468,'Maestro Editar','3','','','NO','Catalogos/editMaestro/'),
	(511,454,'Editar Log/Consultas','2','',NULL,'NO','Consultas/EditLog/'),
	(512,454,'Cuarentena','2','',NULL,'NO','Seguimiento/Cuarentena/');

/*!40000 ALTER TABLE `Cat_Maestro` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Perfiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Perfiles`;

CREATE TABLE `Cat_Perfiles` (
  `Id_Perfil` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Id_Cat_Departamento` int(11) DEFAULT NULL,
  `Id_Cat_Empresa` int(11) DEFAULT NULL,
  `Perfil_Padre_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Cat_Perfiles` WRITE;
/*!40000 ALTER TABLE `Cat_Perfiles` DISABLE KEYS */;

INSERT INTO `Cat_Perfiles` (`Id_Perfil`, `Descripcion`, `Id_Cat_Departamento`, `Id_Cat_Empresa`, `Perfil_Padre_Id`)
VALUES
	(2,'Administrador',439,436,NULL),
	(6,'Coordinador de Call Center y Control de Chips',439,436,NULL),
	(7,'Coordinador Portabilidad',439,436,NULL),
	(8,'Coordinador de Soporte Técnico',439,436,NULL),
	(9,'Coordinador Evaluación de Lineas',439,436,NULL),
	(10,'Control de Chips',439,436,NULL),
	(11,'Validador de Calidad',439,436,NULL),
	(12,'Activador de Lineas',439,436,NULL),
	(13,'Generador de Portabilidades',439,436,NULL),
	(14,'Ejecutivo de soporte Técnico',439,436,NULL),
	(15,'Ejecutivo de Análisis de Lineas',439,436,NULL),
	(16,'Gerente Comercial',438,436,NULL),
	(17,'Gerente Sr',438,436,NULL),
	(18,'Gerente Jr',438,436,NULL),
	(19,'Lider',438,436,NULL),
	(20,'Executivo',438,436,NULL),
	(21,'Invitado',438,436,NULL),
	(22,'Director Comercial',438,436,NULL),
	(23,'Director Operativo',439,436,NULL),
	(24,'Director TI',441,436,NULL),
	(25,'Ejecutivo TI',441,436,NULL);

/*!40000 ALTER TABLE `Cat_Perfiles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Sucursal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Sucursal`;

CREATE TABLE `Cat_Sucursal` (
  `Id_Sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Ciudad` int(11) NOT NULL,
  PRIMARY KEY (`Id_Sucursal`),
  KEY `R_3` (`Id_Ciudad`),
  CONSTRAINT `cat_sucursal_ibfk_1` FOREIGN KEY (`Id_Ciudad`) REFERENCES `Cat_Ciudad` (`Id_Ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Sucursal` WRITE;
/*!40000 ALTER TABLE `Cat_Sucursal` DISABLE KEYS */;

INSERT INTO `Cat_Sucursal` (`Id_Sucursal`, `Nombre`, `Id_Ciudad`)
VALUES
	(1,'Oficina Guadalquivir',1),
	(2,'Puebla 23 , Centro',3),
	(3,'Araucarias 54',2);

/*!40000 ALTER TABLE `Cat_Sucursal` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Cat_Zona
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat_Zona`;

CREATE TABLE `Cat_Zona` (
  `Id_Zona` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Cat_Zona` WRITE;
/*!40000 ALTER TABLE `Cat_Zona` DISABLE KEYS */;

INSERT INTO `Cat_Zona` (`Id_Zona`, `Nombre`)
VALUES
	(1,'Centro'),
	(3,'Sur'),
	(4,'Sureste'),
	(5,'Norte'),
	(8,'asdasd');

/*!40000 ALTER TABLE `Cat_Zona` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Colaborador_Perfil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Colaborador_Perfil`;

CREATE TABLE `Colaborador_Perfil` (
  `Id_Colaborador_Perfil` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Id_Colaborador` int(11) DEFAULT NULL,
  `Id_Perfil` int(11) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`Id_Colaborador_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Colaborador_Perfil` WRITE;
/*!40000 ALTER TABLE `Colaborador_Perfil` DISABLE KEYS */;

INSERT INTO `Colaborador_Perfil` (`Id_Colaborador_Perfil`, `Id_Colaborador`, `Id_Perfil`, `Activo`)
VALUES
	(12,1,2,1),
	(13,2,2,1),
	(20,5,2,1),
	(21,9,17,1),
	(22,10,19,1),
	(23,11,19,1),
	(24,12,20,1),
	(25,13,20,1),
	(26,8,16,1),
	(27,7,22,1),
	(28,14,16,1);

/*!40000 ALTER TABLE `Colaborador_Perfil` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Lineas_RAXA
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Lineas_RAXA`;

CREATE TABLE `Lineas_RAXA` (
  `Num_Cliente` int(11) NOT NULL,
  `Id_Colaborador` int(11) DEFAULT NULL,
  `Nom_Persona_Porta` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NIP_Portar` int(11) DEFAULT NULL,
  `Vigencia_NIP` date DEFAULT NULL,
  `Num_Tel_Temporal` decimal(10,0) DEFAULT NULL,
  `Id_Carrier` int(11) DEFAULT NULL,
  `ICCDID` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Fecha_Registro_Porta` datetime DEFAULT NULL,
  `Georeferencia` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Cat_Fase_Portabilidad` int(11) DEFAULT NULL,
  `Tel_Fijo_Alterno` decimal(10,0) DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Porta` int(11) DEFAULT NULL,
  `Id_Cat_Tipo_Producto` int(11) DEFAULT NULL,
  `Foto_Credencial_ICCDID` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_Cat_Error_Portabilidad` int(11) DEFAULT NULL,
  `bloqueo` tinyint(4) DEFAULT '0',
  `Id_Cat_Validacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`Num_Cliente`),
  KEY `R_22` (`Id_Carrier`),
  KEY `R_33` (`Id_Colaborador`),
  KEY `R_36` (`ICCDID`),
  CONSTRAINT `lineas_raxa_ibfk_1` FOREIGN KEY (`Id_Carrier`) REFERENCES `Cat_Carrier` (`Id_Carrier`),
  CONSTRAINT `lineas_raxa_ibfk_2` FOREIGN KEY (`Id_Colaborador`) REFERENCES `Cat_Colaboradores` (`Id_Colaborador`),
  CONSTRAINT `lineas_raxa_ibfk_3` FOREIGN KEY (`ICCDID`) REFERENCES `Salida_Inv_Central` (`ICCDID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Lineas_RAXA` WRITE;
/*!40000 ALTER TABLE `Lineas_RAXA` DISABLE KEYS */;

INSERT INTO `Lineas_RAXA` (`Num_Cliente`, `Id_Colaborador`, `Nom_Persona_Porta`, `NIP_Portar`, `Vigencia_NIP`, `Num_Tel_Temporal`, `Id_Carrier`, `ICCDID`, `Fecha_Registro_Porta`, `Georeferencia`, `Id_Cat_Fase_Portabilidad`, `Tel_Fijo_Alterno`, `email`, `Id_Porta`, `Id_Cat_Tipo_Producto`, `Foto_Credencial_ICCDID`, `Id_Cat_Error_Portabilidad`, `bloqueo`, `Id_Cat_Validacion`)
VALUES
	(1234567891,2,'Mario Meraz',1234,'2017-08-26',NULL,3,'8952050001701781040F','2017-08-24 00:57:36',NULL,15,1234567890,'mario.meraz@gmail.com',NULL,378,'captura_2017-08-22_a',391,0,NULL),
	(1234567894,2,'Mario Meraz',1234,'2017-08-19',NULL,3,'8952050001701781040F','2017-08-24 00:59:53',NULL,16,1234567890,'mario.meraz@gmail.com',NULL,378,NULL,384,0,8),
	(2147483643,2,'Mario Meraz',2215,'2017-08-16',7228687751,1,'8952050001701781032F','2017-08-23 02:42:16',NULL,15,7228687751,'mario.meraz@gmail.com',NULL,378,NULL,NULL,0,NULL);

/*!40000 ALTER TABLE `Lineas_RAXA` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Menu_Perfiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Menu_Perfiles`;

CREATE TABLE `Menu_Perfiles` (
  `Id_Menu_Perfil` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Perfil` int(11) DEFAULT NULL,
  `Id_Cat_Menu` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`Id_Menu_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Menu_Perfiles` WRITE;
/*!40000 ALTER TABLE `Menu_Perfiles` DISABLE KEYS */;

INSERT INTO `Menu_Perfiles` (`Id_Menu_Perfil`, `Id_Perfil`, `Id_Cat_Menu`, `Descripcion`)
VALUES
	(83,6,453,''),
	(84,6,458,''),
	(85,7,454,''),
	(86,7,460,''),
	(87,7,462,''),
	(90,8,455,''),
	(91,8,465,''),
	(92,9,454,''),
	(93,9,461,''),
	(94,9,464,''),
	(97,11,454,''),
	(98,11,461,''),
	(99,11,459,''),
	(100,12,454,''),
	(101,12,460,''),
	(102,13,454,''),
	(103,13,462,''),
	(104,14,455,''),
	(105,14,465,''),
	(106,15,454,''),
	(107,15,464,''),
	(147,18,455,''),
	(148,18,466,''),
	(149,18,465,''),
	(150,18,453,''),
	(151,18,458,''),
	(152,18,457,''),
	(153,17,455,''),
	(154,17,466,''),
	(155,17,465,''),
	(156,17,453,''),
	(157,17,458,''),
	(158,17,457,''),
	(159,16,455,''),
	(160,16,466,''),
	(161,16,467,''),
	(162,16,465,''),
	(163,16,453,''),
	(164,16,458,''),
	(165,16,457,''),
	(166,19,455,''),
	(167,19,466,''),
	(168,19,465,''),
	(169,19,453,''),
	(170,19,458,''),
	(171,19,457,''),
	(172,20,455,''),
	(173,20,465,''),
	(174,20,453,''),
	(175,20,458,''),
	(176,20,457,''),
	(177,21,455,''),
	(178,21,466,''),
	(179,21,465,''),
	(180,21,453,''),
	(181,21,458,''),
	(182,21,457,''),
	(183,22,455,''),
	(184,22,466,''),
	(185,22,467,''),
	(186,22,465,''),
	(187,22,453,''),
	(188,22,458,''),
	(189,22,457,''),
	(190,23,455,''),
	(191,23,466,''),
	(192,23,467,''),
	(193,23,465,''),
	(194,23,453,''),
	(195,23,458,''),
	(196,23,454,''),
	(197,23,460,''),
	(198,23,461,''),
	(199,23,462,''),
	(200,23,463,''),
	(201,23,464,''),
	(202,23,459,''),
	(232,25,456,''),
	(233,25,469,''),
	(234,25,471,''),
	(235,25,468,''),
	(236,25,476,''),
	(237,25,479,''),
	(238,25,474,''),
	(239,25,478,''),
	(240,25,473,''),
	(241,25,477,''),
	(242,25,480,''),
	(243,25,481,''),
	(244,25,475,''),
	(245,25,472,''),
	(275,24,456,''),
	(276,24,469,''),
	(277,24,471,''),
	(278,24,468,''),
	(279,24,476,''),
	(280,24,479,''),
	(281,24,474,''),
	(282,24,478,''),
	(283,24,473,''),
	(284,24,477,''),
	(285,24,480,''),
	(286,24,481,''),
	(287,24,475,''),
	(288,24,472,''),
	(289,24,470,''),
	(290,24,455,''),
	(291,24,466,''),
	(292,24,467,''),
	(293,24,465,''),
	(294,24,453,''),
	(295,24,458,''),
	(296,24,457,''),
	(297,24,454,''),
	(298,24,460,''),
	(299,24,461,''),
	(300,24,462,''),
	(301,24,463,''),
	(302,24,464,''),
	(303,24,459,''),
	(304,10,470,''),
	(305,10,453,''),
	(306,10,458,''),
	(736,2,456,''),
	(737,2,469,''),
	(738,2,471,''),
	(739,2,468,''),
	(740,2,476,''),
	(741,2,502,''),
	(742,2,501,''),
	(743,2,479,''),
	(744,2,508,''),
	(745,2,507,''),
	(746,2,498,''),
	(747,2,497,''),
	(748,2,474,''),
	(749,2,493,''),
	(750,2,506,''),
	(751,2,505,''),
	(752,2,478,''),
	(753,2,473,''),
	(754,2,496,''),
	(755,2,495,''),
	(756,2,477,''),
	(757,2,504,''),
	(758,2,503,''),
	(759,2,480,''),
	(760,2,510,''),
	(761,2,509,''),
	(762,2,492,''),
	(763,2,481,''),
	(764,2,475,''),
	(765,2,500,''),
	(766,2,499,''),
	(767,2,472,''),
	(768,2,494,''),
	(769,2,491,''),
	(770,2,470,''),
	(771,2,455,''),
	(772,2,466,''),
	(773,2,467,''),
	(774,2,465,''),
	(775,2,453,''),
	(776,2,458,''),
	(777,2,486,''),
	(778,2,457,''),
	(779,2,454,''),
	(780,2,460,''),
	(781,2,461,''),
	(782,2,511,''),
	(783,2,462,''),
	(784,2,489,''),
	(785,2,490,''),
	(786,2,463,''),
	(787,2,464,''),
	(788,2,459,'');

/*!40000 ALTER TABLE `Menu_Perfiles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Roles_Sistema
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Roles_Sistema`;

CREATE TABLE `Roles_Sistema` (
  `Id_Cat_Rol` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Id_Colaborador` int(11) NOT NULL,
  `Id_Jefe_Inmediato` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Id_Sucursal` int(11) DEFAULT NULL,
  `Id_Ciudad` int(11) DEFAULT NULL,
  `Id_Estado` int(11) DEFAULT NULL,
  `Id_Zona` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Cat_Rol`,`Id_Colaborador`),
  KEY `R_44` (`Id_Jefe_Inmediato`),
  CONSTRAINT `roles_sistema_ibfk_3` FOREIGN KEY (`Id_Jefe_Inmediato`) REFERENCES `Cat_Colaboradores` (`Id_Colaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



# Volcado de tabla Salida_Inv_Central
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Salida_Inv_Central`;

CREATE TABLE `Salida_Inv_Central` (
  `ICCDID` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Salida_Inv_Central` date DEFAULT NULL,
  `Fecha_Entrada_RAXA_Ctrl` date DEFAULT NULL,
  `Fecha_Salida_RAXA_Ctrl` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ICCDID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Salida_Inv_Central` WRITE;
/*!40000 ALTER TABLE `Salida_Inv_Central` DISABLE KEYS */;

INSERT INTO `Salida_Inv_Central` (`ICCDID`, `Fecha_Salida_Inv_Central`, `Fecha_Entrada_RAXA_Ctrl`, `Fecha_Salida_RAXA_Ctrl`)
VALUES
	('8952050001701780307F','2017-07-25','2017-07-25','2017-08-22 01:02:51'),
	('8952050001701780315F','2017-07-25','2017-07-25','2017-08-22 00:59:24'),
	('8952050001701780323F','2017-07-25','2017-07-25','2017-08-22 00:59:24'),
	('8952050001701780331F','2017-07-25','2017-07-25','2017-08-22 00:59:24'),
	('8952050001701780349F','2017-07-25','2017-07-25','2017-08-22 00:59:24'),
	('8952050001701780356F','2017-07-25','2017-07-25','2017-08-22 00:59:24'),
	('8952050001701780364F','2017-07-25','2017-07-25','2017-08-22 01:02:51'),
	('8952050001701780372F','2017-07-25','2017-07-25','2017-08-22 01:02:51'),
	('8952050001701780380F','2017-07-25','2017-07-25','2017-08-22 01:03:37'),
	('8952050001701780398F','2017-07-25','2017-07-25','2017-08-22 01:03:37'),
	('8952050001701780406F','2017-07-25','2017-07-25','2017-08-22 04:21:04'),
	('8952050001701780414F','2017-07-25','2017-07-25','2017-08-22 04:21:04'),
	('8952050001701780422F','2017-07-25','2017-07-25','2017-08-22 04:21:04'),
	('8952050001701780430F','2017-07-25','2017-07-25','2017-08-24 01:46:22'),
	('8952050001701780448F','2017-07-25','2017-07-25','2017-08-24 01:46:22'),
	('8952050001701780455F','2017-07-25','2017-07-25','2017-08-23 22:59:22'),
	('8952050001701780463F','2017-07-25','2017-07-25','2017-08-23 22:59:22'),
	('8952050001701780471F','2017-07-25','2017-07-25','2017-08-22 01:04:45'),
	('8952050001701780489F','2017-07-25','2017-07-25','2017-08-22 01:04:45'),
	('8952050001701780497F','2017-07-25','2017-07-25','2017-08-22 01:04:45'),
	('8952050001701780505F','2017-07-25','2017-07-25','2017-08-22 01:04:45'),
	('8952050001701780513F','2017-07-25','2017-07-25','2017-08-22 01:04:45'),
	('8952050001701780521F','2017-07-25','2017-07-25','2017-08-23 22:59:22'),
	('8952050001701780539F','2017-07-25','2017-07-25','2017-08-24 01:50:44'),
	('8952050001701780547F','2017-07-25','2017-07-25','2017-08-24 01:50:44'),
	('8952050001701780554F','2017-07-25','2017-07-25','2017-08-24 01:50:44'),
	('8952050001701780562F','2017-07-25','2017-07-25','2017-08-24 01:50:44'),
	('8952050001701780570F','2017-07-25','2017-07-25','2017-08-24 01:50:44'),
	('8952050001701780588F','2017-07-25','2017-07-25','2017-08-24 03:44:34'),
	('8952050001701780596F','2017-07-25','2017-07-25','2017-08-24 03:47:26'),
	('8952050001701780604F','2017-07-25','2017-07-25',NULL),
	('8952050001701780612F','2017-07-25','2017-07-25',NULL),
	('8952050001701780620F','2017-07-25','2017-07-25',NULL),
	('8952050001701780638F','2017-07-25','2017-07-25',NULL),
	('8952050001701780646F','2017-07-25','2017-07-25',NULL),
	('8952050001701780653F','2017-07-25','2017-07-25',NULL),
	('8952050001701780661F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780679F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780687F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780695F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780703F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780711F','2017-07-25','2017-07-25','2017-08-24 03:59:33'),
	('8952050001701780729F','2017-07-25','2017-07-25',NULL),
	('8952050001701780737F','2017-07-25','2017-07-25',NULL),
	('8952050001701780745F','2017-07-25','2017-07-25',NULL),
	('8952050001701780752F','2017-07-25','2017-07-25',NULL),
	('8952050001701780760F','2017-07-25','2017-07-25',NULL),
	('8952050001701780778F','2017-07-25','2017-07-25',NULL),
	('8952050001701780786F','2017-07-25','2017-07-25',NULL),
	('8952050001701780794F','2017-07-25','2017-07-25',NULL),
	('8952050001701780802F','2017-07-25','2017-07-25',NULL),
	('8952050001701780810F','2017-07-25','2017-07-25',NULL),
	('8952050001701780828F','2017-07-25','2017-07-25',NULL),
	('8952050001701780836F','2017-07-25','2017-07-25',NULL),
	('8952050001701780844F','2017-07-25','2017-07-25',NULL),
	('8952050001701780851F','2017-07-25','2017-07-25',NULL),
	('8952050001701780869F','2017-07-25','2017-07-25',NULL),
	('8952050001701780877F','2017-07-25','2017-07-25',NULL),
	('8952050001701780885F','2017-07-25','2017-07-25',NULL),
	('8952050001701780893F','2017-07-25','2017-07-25',NULL),
	('8952050001701780901F','2017-07-25','2017-07-25',NULL),
	('8952050001701780919F','2017-07-25','2017-07-25',NULL),
	('8952050001701780927F','2017-07-25','2017-07-25',NULL),
	('8952050001701780935F','2017-07-25','2017-07-25',NULL),
	('8952050001701780943F','2017-07-25','2017-07-25',NULL),
	('8952050001701780950F','2017-07-25','2017-07-25',NULL),
	('8952050001701780968F','2017-07-25','2017-07-25',NULL),
	('8952050001701780976F','2017-07-25','2017-07-25',NULL),
	('8952050001701780984F','2017-07-25','2017-07-25',NULL),
	('8952050001701780992F','2017-07-25','2017-07-25',NULL),
	('8952050001701781008F','2017-07-25','2017-07-25','2017-08-22 08:51:07'),
	('8952050001701781016F','2017-07-25','2017-07-25','2017-08-22 08:51:07'),
	('8952050001701781024F','2017-07-25','2017-07-25','2017-08-22 08:51:07'),
	('8952050001701781032F','2017-07-25','2017-07-25','2017-08-23 22:06:41'),
	('8952050001701781040F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781057F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781065F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781073F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781081F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781099F','2017-07-25','2017-07-25','2017-08-22 08:50:22'),
	('8952050001701781107F','2017-07-25','2017-07-25',NULL),
	('8952050001701781115F','2017-07-25','2017-07-25',NULL),
	('8952050001701781123F','2017-07-25','2017-07-25',NULL),
	('8952050001701781131F','2017-07-25','2017-07-25',NULL),
	('8952050001701781149F','2017-07-25','2017-07-25',NULL),
	('8952050001701781156F','2017-07-25','2017-07-25',NULL),
	('8952050001701781164F','2017-07-25','2017-07-25',NULL),
	('8952050001701781172F','2017-07-25','2017-07-25',NULL),
	('8952050001701781180F','2017-07-25','2017-07-25',NULL),
	('8952050001701781198F','2017-07-25','2017-07-25',NULL),
	('8952050001701781206F','2017-07-25','2017-07-25',NULL),
	('8952050001701781214F','2017-07-25','2017-07-25',NULL),
	('8952050001701781222F','2017-07-25','2017-07-25',NULL),
	('8952050001701781230F','2017-07-25','2017-07-25',NULL),
	('8952050001701781248F','2017-07-25','2017-07-25',NULL),
	('8952050001701781255F','2017-07-25','2017-07-25',NULL),
	('8952050001701781263F','2017-07-25','2017-07-25',NULL),
	('8952050001701781271F','2017-07-25','2017-07-25',NULL),
	('8952050001701781289F','2017-07-25','2017-07-25',NULL),
	('8952050001701781297F','2017-07-25','2017-07-25',NULL),
	('8952050001701781305F','2017-07-25','2017-07-25',NULL),
	('8952050001701781313F','2017-07-25','2017-07-25',NULL),
	('8952050001701781321F','2017-07-25','2017-07-25',NULL),
	('8952050001701781339F','2017-07-25','2017-07-25',NULL),
	('8952050001701781347F','2017-07-25','2017-07-25',NULL),
	('8952050001701781354F','2017-07-25','2017-07-25',NULL),
	('8952050001701781362F','2017-07-25','2017-07-25',NULL),
	('8952050001701781370F','2017-07-25','2017-07-25',NULL),
	('8952050001701781388F','2017-07-25','2017-07-25',NULL),
	('8952050001701781396F','2017-07-25','2017-07-25',NULL),
	('8952050001701781404F','2017-07-25','2017-07-25',NULL),
	('8952050001701781412F','2017-07-25','2017-07-25',NULL),
	('8952050001701781420F','2017-07-25','2017-07-25',NULL),
	('8952050001701781438F','2017-07-25','2017-07-25',NULL),
	('8952050001701781446F','2017-07-25','2017-07-25',NULL),
	('8952050001701781453F','2017-07-25','2017-07-25',NULL),
	('8952050001701781461F','2017-07-25','2017-07-25',NULL),
	('8952050001701781479F','2017-07-25','2017-07-25',NULL),
	('8952050001701781487F','2017-07-25','2017-07-25',NULL),
	('8952050001701781495F','2017-07-25','2017-07-25',NULL),
	('8952050001701781503F','2017-07-25','2017-07-25',NULL),
	('8952050001701781511F','2017-07-25','2017-07-25',NULL),
	('8952050001701781529F','2017-07-25','2017-07-25',NULL),
	('8952050001701781537F','2017-07-25','2017-07-25',NULL),
	('8952050001701781545F','2017-07-25','2017-07-25',NULL),
	('8952050001701781552F','2017-07-25','2017-07-25',NULL),
	('8952050001701781560F','2017-07-25','2017-07-25',NULL),
	('8952050001701781578F','2017-07-25','2017-07-25',NULL),
	('8952050001701781586F','2017-07-25','2017-07-25',NULL),
	('8952050001701781594F','2017-07-25','2017-07-25',NULL),
	('8952050001701781602F','2017-07-25','2017-07-25',NULL),
	('8952050001701781610F','2017-07-25','2017-07-25',NULL),
	('8952050001701781628F','2017-07-25','2017-07-25',NULL),
	('8952050001701781636F','2017-07-25','2017-07-25',NULL),
	('8952050001701781644F','2017-07-25','2017-07-25',NULL),
	('8952050001701781651F','2017-07-25','2017-07-25',NULL),
	('8952050001701781669F','2017-07-25','2017-07-25',NULL),
	('8952050001701781677F','2017-07-25','2017-07-25',NULL),
	('8952050001701781685F','2017-07-25','2017-07-25',NULL),
	('8952050001701781693F','2017-07-25','2017-07-25',NULL),
	('8952050001701781701F','2017-07-25','2017-07-25',NULL),
	('8952050001701781719F','2017-07-25','2017-07-25',NULL),
	('8952050001701781727F','2017-07-25','2017-07-25',NULL),
	('8952050001701781735F','2017-07-25','2017-07-25',NULL),
	('8952050001701781743F','2017-07-25','2017-07-25',NULL),
	('8952050001701781750F','2017-07-25','2017-07-25',NULL),
	('8952050001701781768F','2017-07-25','2017-07-25',NULL),
	('8952050001701781776F','2017-07-25','2017-07-25',NULL),
	('8952050001701781784F','2017-07-25','2017-07-25',NULL),
	('8952050001701781792F','2017-07-25','2017-07-25',NULL),
	('8952050001701781800F','2017-07-25','2017-07-25',NULL),
	('8952050001701781818F','2017-07-25','2017-07-25',NULL),
	('8952050001701781826F','2017-07-25','2017-07-25',NULL),
	('8952050001701781834F','2017-07-25','2017-07-25',NULL),
	('8952050001701781842F','2017-07-25','2017-07-25',NULL),
	('8952050001701781859F','2017-07-25','2017-07-25',NULL),
	('8952050001701781867F','2017-07-25','2017-07-25',NULL),
	('8952050001701781875F','2017-07-25','2017-07-25',NULL),
	('8952050001701781883F','2017-07-25','2017-07-25',NULL),
	('8952050001701781891F','2017-07-25','2017-07-25',NULL),
	('8952050001701781909F','2017-07-25','2017-07-25',NULL),
	('8952050001701781917F','2017-07-25','2017-07-25',NULL),
	('8952050001701781925F','2017-07-25','2017-07-25',NULL),
	('8952050001701781933F','2017-07-25','2017-07-25',NULL),
	('8952050001701781941F','2017-07-25','2017-07-25',NULL),
	('8952050001701781958F','2017-07-25','2017-07-25',NULL),
	('8952050001701781966F','2017-07-25','2017-07-25',NULL),
	('8952050001701781974F','2017-07-25','2017-07-25',NULL),
	('8952050001701781982F','2017-07-25','2017-07-25',NULL),
	('8952050001701781990F','2017-07-25','2017-07-25',NULL),
	('8952050001701782006F','2017-07-25','2017-07-25',NULL),
	('8952050001701782014F','2017-07-25','2017-07-25',NULL),
	('8952050001701782022F','2017-07-25','2017-07-25',NULL),
	('8952050001701782030F','2017-07-25','2017-07-25',NULL),
	('8952050001701782048F','2017-07-25','2017-07-25',NULL),
	('8952050001701782055F','2017-07-25','2017-07-25',NULL),
	('8952050001701782063F','2017-07-25','2017-07-25',NULL),
	('8952050001701782071F','2017-07-25','2017-07-25',NULL),
	('8952050001701782089F','2017-07-25','2017-07-25',NULL),
	('8952050001701782097F','2017-07-25','2017-07-25',NULL),
	('8952050001701782105F','2017-07-25','2017-07-25',NULL),
	('8952050001701782113F','2017-07-25','2017-07-25',NULL),
	('8952050001701782121F','2017-07-25','2017-07-25',NULL),
	('8952050001701782139F','2017-07-25','2017-07-25',NULL),
	('8952050001701782147F','2017-07-25','2017-07-25',NULL),
	('8952050001701782154F','2017-07-25','2017-07-25',NULL),
	('8952050001701782162F','2017-07-25','2017-07-25',NULL),
	('8952050001701782170F','2017-07-25','2017-07-25',NULL),
	('8952050001701782188F','2017-07-25','2017-07-25',NULL),
	('8952050001701782196F','2017-07-25','2017-07-25',NULL),
	('8952050001701782204F','2017-07-25','2017-07-25',NULL),
	('8952050001701782212F','2017-07-25','2017-07-25',NULL),
	('8952050001701782220F','2017-07-25','2017-07-25',NULL),
	('8952050001701782238F','2017-07-25','2017-07-25',NULL),
	('8952050001701782246F','2017-07-25','2017-07-25',NULL),
	('8952050001701782253F','2017-07-25','2017-07-25',NULL),
	('8952050001701782261F','2017-07-25','2017-07-25',NULL),
	('8952050001701782279F','2017-07-25','2017-07-25',NULL),
	('8952050001701782287F','2017-07-25','2017-07-25',NULL),
	('8952050001701782295F','2017-07-25','2017-07-25',NULL),
	('8952050001701784309F','2017-07-25','2017-07-25',NULL),
	('8952050001701784317F','2017-07-25','2017-07-25',NULL),
	('8952050001701784325F','2017-07-25','2017-07-25',NULL),
	('8952050001701784333F','2017-07-25','2017-07-25',NULL),
	('8952050001701784341F','2017-07-25','2017-07-25',NULL),
	('8952050001701784358F','2017-07-25','2017-07-25',NULL),
	('8952050001701784366F','2017-07-25','2017-07-25',NULL),
	('8952050001701784374F','2017-07-25','2017-07-25',NULL),
	('8952050001701784382F','2017-07-25','2017-07-25',NULL),
	('8952050001701784390F','2017-07-25','2017-07-25',NULL),
	('8952050001701784408F','2017-07-25','2017-07-25',NULL),
	('8952050001701784416F','2017-07-25','2017-07-25',NULL),
	('8952050001701784424F','2017-07-25','2017-07-25',NULL),
	('8952050001701784432F','2017-07-25','2017-07-25',NULL),
	('8952050001701784440F','2017-07-25','2017-07-25',NULL),
	('8952050001701784457F','2017-07-25','2017-07-25',NULL),
	('8952050001701784465F','2017-07-25','2017-07-25',NULL),
	('8952050001701784473F','2017-07-25','2017-07-25',NULL),
	('8952050001701784481F','2017-07-25','2017-07-25',NULL),
	('8952050001701784499F','2017-07-25','2017-07-25',NULL),
	('8952050001701784507F','2017-07-25','2017-07-25',NULL),
	('8952050001701784515F','2017-07-25','2017-07-25',NULL),
	('8952050001701784523F','2017-07-25','2017-07-25',NULL),
	('8952050001701784531F','2017-07-25','2017-07-25',NULL),
	('8952050001701784549F','2017-07-25','2017-07-25',NULL),
	('8952050001701784556F','2017-07-25','2017-07-25',NULL),
	('8952050001701784564F','2017-07-25','2017-07-25',NULL),
	('8952050001701784572F','2017-07-25','2017-07-25',NULL),
	('8952050001701784580F','2017-07-25','2017-07-25',NULL),
	('8952050001701784598F','2017-07-25','2017-07-25',NULL),
	('8952050001701784606F','2017-07-25','2017-07-25',NULL),
	('8952050001701784614F','2017-07-25','2017-07-25',NULL),
	('8952050001701784622F','2017-07-25','2017-07-25',NULL),
	('8952050001701784630F','2017-07-25','2017-07-25',NULL),
	('8952050001701784648F','2017-07-25','2017-07-25',NULL),
	('8952050001701784655F','2017-07-25','2017-07-25',NULL),
	('8952050001701784663F','2017-07-25','2017-07-25',NULL),
	('8952050001701784671F','2017-07-25','2017-07-25',NULL),
	('8952050001701784689F','2017-07-25','2017-07-25',NULL),
	('8952050001701784697F','2017-07-25','2017-07-25',NULL),
	('8952050001701784705F','2017-07-25','2017-07-25',NULL),
	('8952050001701784713F','2017-07-25','2017-07-25',NULL),
	('8952050001701784721F','2017-07-25','2017-07-25',NULL),
	('8952050001701784739F','2017-07-25','2017-07-25',NULL),
	('8952050001701784747F','2017-07-25','2017-07-25',NULL),
	('8952050001701784754F','2017-07-25','2017-07-25',NULL),
	('8952050001701784762F','2017-07-25','2017-07-25',NULL),
	('8952050001701784770F','2017-07-25','2017-07-25',NULL),
	('8952050001701784788F','2017-07-25','2017-07-25',NULL),
	('8952050001701784796F','2017-07-25','2017-07-25',NULL),
	('8952050001701784804F','2017-07-25','2017-07-25',NULL),
	('8952050001701784812F','2017-07-25','2017-07-25',NULL),
	('8952050001701784820F','2017-07-25','2017-07-25',NULL),
	('8952050001701784838F','2017-07-25','2017-07-25',NULL),
	('8952050001701784846F','2017-07-25','2017-07-25',NULL),
	('8952050001701784853F','2017-07-25','2017-07-25',NULL),
	('8952050001701784861F','2017-07-25','2017-07-25',NULL),
	('8952050001701784879F','2017-07-25','2017-07-25',NULL),
	('8952050001701784887F','2017-07-25','2017-07-25',NULL),
	('8952050001701784895F','2017-07-25','2017-07-25',NULL),
	('8952050001701784903F','2017-07-25','2017-07-25',NULL),
	('8952050001701784911F','2017-07-25','2017-07-25',NULL),
	('8952050001701784929F','2017-07-25','2017-07-25',NULL),
	('8952050001701784937F','2017-07-25','2017-07-25',NULL),
	('8952050001701784945F','2017-07-25','2017-07-25',NULL),
	('8952050001701784952F','2017-07-25','2017-07-25',NULL),
	('8952050001701784960F','2017-07-25','2017-07-25',NULL),
	('8952050001701784978F','2017-07-25','2017-07-25',NULL),
	('8952050001701784986F','2017-07-25','2017-07-25',NULL),
	('8952050001701784994F','2017-07-25','2017-07-25',NULL),
	('8952050001701785009F','2017-07-25','2017-07-25',NULL),
	('8952050001701785017F','2017-07-25','2017-07-25',NULL),
	('8952050001701785025F','2017-07-25','2017-07-25',NULL),
	('8952050001701785033F','2017-07-25','2017-07-25',NULL),
	('8952050001701785041F','2017-07-25','2017-07-25',NULL),
	('8952050001701785058F','2017-07-25','2017-07-25',NULL),
	('8952050001701785066F','2017-07-25','2017-07-25',NULL),
	('8952050001701785074F','2017-07-25','2017-07-25',NULL),
	('8952050001701785082F','2017-07-25','2017-07-25',NULL),
	('8952050001701785090F','2017-07-25','2017-07-25','2017-08-22 08:37:38'),
	('8952050001701785108F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785116F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785124F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785132F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785140F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785157F','2017-07-25','2017-07-25','2017-08-22 08:44:33'),
	('8952050001701785165F','2017-07-25','2017-07-25',NULL),
	('8952050001701785173F','2017-07-25','2017-07-25',NULL),
	('8952050001701785181F','2017-07-25','2017-07-25',NULL),
	('8952050001701785199F','2017-07-25','2017-07-25','2017-08-29 21:43:17'),
	('8952050001701785207F','2017-07-25','2017-07-25','2017-08-29 21:43:17'),
	('8952050001701785215F','2017-07-25','2017-07-25',NULL),
	('8952050001701785223F','2017-07-25','2017-07-25',NULL),
	('8952050001701785231F','2017-07-25','2017-07-25',NULL),
	('8952050001701785249F','2017-07-25','2017-07-25','2017-08-22 08:13:34'),
	('8952050001701785256F','2017-07-25','2017-07-25','2017-08-22 08:13:34'),
	('8952050001701785264F','2017-07-25','2017-07-25','2017-08-22 08:13:34'),
	('8952050001701785272F','2017-07-25','2017-07-25',NULL),
	('8952050001701785280F','2017-07-25','2017-07-25',NULL),
	('8952050001701785298F','2017-07-25','2017-07-25',NULL);

/*!40000 ALTER TABLE `Salida_Inv_Central` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Seg_Lineas_RAXA
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Seg_Lineas_RAXA`;

CREATE TABLE `Seg_Lineas_RAXA` (
  `Fecha_Actividad` datetime NOT NULL,
  `Num_Cliente` int(11) NOT NULL,
  `Id_Colaborador` int(11) DEFAULT NULL,
  `Id_Cat_Status` int(11) DEFAULT NULL,
  `Id_Cat_Error_Portabilidad` int(11) DEFAULT NULL,
  `Descripcion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Num_Llamadas_Entrantes` int(11) DEFAULT NULL,
  `Num_Llamadas_Salientes` int(11) DEFAULT NULL,
  `Num_SMS` int(11) DEFAULT NULL,
  `Num_Datos` int(11) DEFAULT NULL,
  `Num_Actv_Total` int(11) DEFAULT NULL,
  `Fecha_Recarga` date DEFAULT NULL,
  `Monto_Recarga` double(10,2) DEFAULT '0.00',
  `Fecha_Val_Actividad` datetime DEFAULT NULL,
  PRIMARY KEY (`Fecha_Actividad`,`Num_Cliente`),
  KEY `R_26` (`Num_Cliente`),
  KEY `R_27` (`Id_Cat_Status`),
  KEY `R_28` (`Id_Colaborador`),
  KEY `R_40` (`Id_Cat_Error_Portabilidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

LOCK TABLES `Seg_Lineas_RAXA` WRITE;
/*!40000 ALTER TABLE `Seg_Lineas_RAXA` DISABLE KEYS */;

INSERT INTO `Seg_Lineas_RAXA` (`Fecha_Actividad`, `Num_Cliente`, `Id_Colaborador`, `Id_Cat_Status`, `Id_Cat_Error_Portabilidad`, `Descripcion`, `Num_Llamadas_Entrantes`, `Num_Llamadas_Salientes`, `Num_SMS`, `Num_Datos`, `Num_Actv_Total`, `Fecha_Recarga`, `Monto_Recarga`, `Fecha_Val_Actividad`)
VALUES
	('2017-08-23 02:42:16',2147483647,8,NULL,NULL,'REGISTRO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('2017-08-24 00:54:20',1234567890,8,NULL,NULL,'REGISTRO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('2017-08-24 00:57:36',1234567891,8,NULL,NULL,'REGISTRO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('2017-08-24 00:59:53',1234567894,8,NULL,NULL,'REGISTRO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('2017-09-05 18:29:44',1234567899,8,11,387,'REGISTRO INICIAL',23,0,32,0,0,'2017-09-21',1200.00,'2017-09-08 20:16:08');

/*!40000 ALTER TABLE `Seg_Lineas_RAXA` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
