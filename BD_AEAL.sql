CREATE DATABASE  IF NOT EXISTS `bd_aeal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_aeal`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: bd_aeal
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `nPerId` int(11) unsigned NOT NULL auto_increment,
  `nUbiId` int(11) NOT NULL,
  `cPerApellidoPaterno` varchar(50) collate utf8_spanish2_ci default NULL,
  `cPerApellidoMaterno` varchar(50) collate utf8_spanish2_ci default NULL,
  `cPerNombres` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `cPerEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  `cUbiIdDepartamento` char(2) collate utf8_spanish2_ci default NULL,
  `cUbiIdProvincia` char(2) collate utf8_spanish2_ci default NULL,
  `cUbiIdDistrito` char(2) collate utf8_spanish2_ci default NULL,
  `cPerRandom` varchar(100) collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`nPerId`),
  KEY `fk_persona_ubigeo1_idx` (`nUbiId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,0,'Vinces ','Ortiz','Jose','0',NULL,NULL,NULL,NULL),(2,1,'Castro','Aurora','Diego Armando','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia_persona`
--

DROP TABLE IF EXISTS `noticia_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia_persona` (
  `nNpeId` int(11) NOT NULL auto_increment,
  `nNotId` int(11) NOT NULL,
  `nPerId` int(11) NOT NULL,
  `cNpeEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nNpeId`),
  KEY `fk_noticia_persona_noticia1_idx` (`nNotId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia_persona`
--

LOCK TABLES `noticia_persona` WRITE;
/*!40000 ALTER TABLE `noticia_persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multitabla`
--

DROP TABLE IF EXISTS `multitabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multitabla` (
  `nMutId` int(11) NOT NULL auto_increment,
  `nMulIdPadre` int(11) default NULL,
  `cMulDescripcion` varchar(250) collate utf8_spanish2_ci NOT NULL,
  `cMulEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nMutId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multitabla`
--

LOCK TABLES `multitabla` WRITE;
/*!40000 ALTER TABLE `multitabla` DISABLE KEYS */;
/*!40000 ALTER TABLE `multitabla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_juridica`
--

DROP TABLE IF EXISTS `persona_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_juridica` (
  `nPerId` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`nPerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_juridica`
--

LOCK TABLES `persona_juridica` WRITE;
/*!40000 ALTER TABLE `persona_juridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto_detalle`
--

DROP TABLE IF EXISTS `objeto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto_detalle` (
  `nOdetId` int(11) NOT NULL auto_increment,
  `nObjId` int(11) NOT NULL,
  `cOdetNombreArchivo` varchar(200) NOT NULL,
  `nOdetTipo` int(11) NOT NULL,
  `cOdetPlataforma` char(1) default NULL,
  `cOdetEstado` char(1) default NULL,
  PRIMARY KEY  (`nOdetId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto_detalle`
--

LOCK TABLES `objeto_detalle` WRITE;
/*!40000 ALTER TABLE `objeto_detalle` DISABLE KEYS */;
INSERT INTO `objeto_detalle` VALUES (1,1,'../comunicados/bandejap',1,'W','1'),(2,2,'../publicidad/bandejap',1,'W','1'),(3,3,'../exalumnos/bandejap',1,'W','1'),(4,4,'../empleos/bandejap',1,'W','1'),(5,5,'../servicios/bandejap',1,'W','1'),(6,6,'../promociones/bandejap',1,'W','1'),(7,7,'../eventos/bandejap',1,'W','1'),(8,8,'../onomasticos/bandejap',1,'W','1');
/*!40000 ALTER TABLE `objeto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias_iconos`
--

DROP TABLE IF EXISTS `noticias_iconos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias_iconos` (
  `nNicId` int(11) NOT NULL auto_increment,
  `nNotId` int(11) NOT NULL,
  `nNicTipoIcono` int(11) NOT NULL,
  `cNicEstado` char(1) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`nNicId`),
  KEY `fk_noticias_iconos_noticia1_idx` (`nNotId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias_iconos`
--

LOCK TABLES `noticias_iconos` WRITE;
/*!40000 ALTER TABLE `noticias_iconos` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias_iconos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_noticia`
--

DROP TABLE IF EXISTS `tipo_noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_noticia` (
  `nTnoId` int(11) NOT NULL auto_increment,
  `nMulTipoGrupo` int(11) NOT NULL COMMENT 'MULTITABLA-->SE LLAMABA nNotTipoGrupo',
  `cTnoDescripcion` varchar(100) collate utf8_spanish2_ci default NULL,
  `nTnoOrden` int(11) NOT NULL,
  `cTnoEstado` char(1) collate utf8_spanish2_ci default '0',
  PRIMARY KEY  (`nTnoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_noticia`
--

LOCK TABLES `tipo_noticia` WRITE;
/*!40000 ALTER TABLE `tipo_noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubigeo`
--

DROP TABLE IF EXISTS `ubigeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubigeo` (
  `nUbiId` int(11) NOT NULL auto_increment,
  `nMulTipoPais` int(11) NOT NULL COMMENT 'MULTITABLA--->nMutId: Codigo del pais',
  `cUbiIdDepartamento` char(2) collate utf8_spanish2_ci NOT NULL,
  `cUbiIdProvincia` char(2) collate utf8_spanish2_ci NOT NULL,
  `cUbiIdDistrito` char(2) collate utf8_spanish2_ci NOT NULL,
  `cUbiDescripcion` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `cUbiEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nUbiId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
INSERT INTO `ubigeo` VALUES (1,1,'1','1','2','1','0');
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_objeto`
--

DROP TABLE IF EXISTS `usuario_objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_objeto` (
  `nUobId` int(11) NOT NULL auto_increment,
  `nUsuCodigo` int(11) NOT NULL,
  `nObjId` int(11) NOT NULL,
  `dUobFecharegistro` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `bUobEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nUobId`),
  KEY `opcionpersona` (`nUobId`),
  KEY `fk_usuario_objeto_usuario_idx` (`nUsuCodigo`),
  KEY `fk_usuario_objeto_objeto1_idx` (`nObjId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_objeto`
--

LOCK TABLES `usuario_objeto` WRITE;
/*!40000 ALTER TABLE `usuario_objeto` DISABLE KEYS */;
INSERT INTO `usuario_objeto` VALUES (1,1,1,'2012-11-24 05:00:11','1'),(2,1,2,'2012-11-24 05:00:11','1'),(3,1,3,'2012-11-24 05:07:10','1'),(4,1,4,'2012-11-24 05:07:56','1');
/*!40000 ALTER TABLE `usuario_objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto`
--

DROP TABLE IF EXISTS `objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto` (
  `nObjId` int(11) NOT NULL auto_increment,
  `nAplId` int(11) NOT NULL,
  `cObjNombre` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `cObjNombreArchivo` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `bObjTipo` int(11) NOT NULL,
  `nObjIdPadre` int(11) NOT NULL,
  `cObjEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nObjId`),
  KEY `fk_objeto_aplicaciones1_idx` (`nAplId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,1,'COMUNICADOS','',0,0,'1'),(2,1,'PUBLICIDAD','',0,0,'1'),(3,2,'EX-ALUMNOS','',0,0,'1'),(4,3,'EMPLEOS OFRECIDOS','',0,0,'1'),(5,3,'SERVICIOS PROFESIONALES','',0,0,'1'),(6,4,'PROMOCIONES','',0,0,'1'),(7,4,'EVENTOS','',0,0,'1'),(8,4,'ONOMASTICOS','',0,0,'1');
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nUsuCodigo` int(11) NOT NULL auto_increment,
  `nPerId` int(11) NOT NULL,
  `cUsuNick` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `cUsuClave` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `nUsuTipo` int(11) NOT NULL,
  `cUsuEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nUsuCodigo`),
  KEY `fklogin` (`nUsuTipo`),
  KEY `fk_usuario_persona1_idx` (`nPerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'jvinceso','202cb962ac59075b964b07152d234b70',1,'0'),(2,1,'yamasaky','marvel',1,'0');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_natural`
--

DROP TABLE IF EXISTS `persona_natural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_natural` (
  `nPerId` int(11) NOT NULL,
  `bPnaSexo` bit(1) NOT NULL,
  `dPnaFechaNacimiento` date NOT NULL,
  `dPnaFechaRegistro` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `nPnaEdad` char(2) collate utf8_spanish2_ci default NULL,
  `nPnaEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nPerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_natural`
--

LOCK TABLES `persona_natural` WRITE;
/*!40000 ALTER TABLE `persona_natural` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_natural` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `nMulId` int(11) NOT NULL auto_increment,
  `nMutTipo` int(11) default NULL COMMENT 'MULTITABLA',
  `nMulTipoCategoria` int(11) default NULL COMMENT 'MULTITABLA',
  `cMulLinkMinuatura` varchar(255) collate utf8_spanish2_ci default NULL,
  `cMulLink` varchar(2000) collate utf8_spanish2_ci default NULL,
  `cMulTitulo` text collate utf8_spanish2_ci,
  `cMulDescripcion` text collate utf8_spanish2_ci,
  `dMulFechaInicial` datetime default NULL,
  `dMulFechaFinal` datetime default NULL,
  `cMulEstado` char(1) collate utf8_spanish2_ci default '0',
  `nMulOrden` int(11) default NULL,
  `cMulRandom` varchar(100) collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`nMulId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia_multimedia`
--

DROP TABLE IF EXISTS `noticia_multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia_multimedia` (
  `nNmuId` int(11) NOT NULL auto_increment,
  `nNotId` int(11) NOT NULL,
  `nMulId` int(11) NOT NULL,
  `bNmuEsPrincipal` bit(1) NOT NULL default '\0',
  `cNmuEstado` char(1) collate utf8_spanish2_ci default '0',
  PRIMARY KEY  (`nNmuId`),
  KEY `fk_noticia_multimedia_noticia1_idx` (`nNotId`),
  KEY `fk_noticia_multimedia_multimedia1_idx` (`nMulId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia_multimedia`
--

LOCK TABLES `noticia_multimedia` WRITE;
/*!40000 ALTER TABLE `noticia_multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia_multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aplicaciones`
--

DROP TABLE IF EXISTS `aplicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aplicaciones` (
  `nAplId` int(11) NOT NULL auto_increment,
  `cAplDescripcion` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `cAplImagenUrl` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `cAplEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nAplId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aplicaciones`
--

LOCK TABLES `aplicaciones` WRITE;
/*!40000 ALTER TABLE `aplicaciones` DISABLE KEYS */;
INSERT INTO `aplicaciones` VALUES (1,'INFORMACION PUBLICA','icon-list-alt','1'),(2,'ASOCIADOS','icon-user','1'),(3,'BOLSA DE TRABAJO','icon-briefcase','1'),(4,'INFORMACION EX-ALUMNOS','icon-home','1');
/*!40000 ALTER TABLE `aplicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `nNotId` int(11) NOT NULL auto_increment,
  `nUsuCodigo` int(11) NOT NULL,
  `nTnoId` int(11) NOT NULL,
  `cNotTitulo` varchar(500) collate utf8_spanish2_ci default NULL,
  `cNotSumilla` varchar(500) collate utf8_spanish2_ci default NULL,
  `cNotContenido` text collate utf8_spanish2_ci,
  `dNotfecharegistro` datetime default NULL,
  `dNotFechaInicial` datetime default NULL,
  `dNotFechaFinal` datetime default NULL,
  `cNotLugar` varchar(100) collate utf8_spanish2_ci default NULL,
  `cNotHora` time default NULL,
  `cNotEstado` char(1) collate utf8_spanish2_ci default '0',
  `nNotOrden` int(11) default NULL,
  `nNotNivelAcceso` int(11) default NULL,
  `nNotNumeroAccesos` int(11) default '0',
  `cNotRandom` varchar(100) collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`nNotId`),
  KEY `fk_noticia_usuario1_idx` (`nUsuCodigo`),
  KEY `fk_noticia_tipo_noticia1_idx` (`nTnoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_detalle`
--

DROP TABLE IF EXISTS `persona_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_detalle` (
  `nPdeId` int(11) NOT NULL auto_increment,
  `nPerId` int(11) NOT NULL,
  `nMulTipoDato` int(11) NOT NULL COMMENT 'MULTITABLA---->cPdeValor:dni,correo,telefono',
  `cPdeValor` varchar(200) collate utf8_spanish2_ci default NULL,
  `cPedEstado` char(1) collate utf8_spanish2_ci NOT NULL default '0',
  PRIMARY KEY  (`nPdeId`),
  KEY `fk_persona_detalle_persona1_idx` (`nPerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_detalle`
--

LOCK TABLES `persona_detalle` WRITE;
/*!40000 ALTER TABLE `persona_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bd_aeal'
--
/*!50003 DROP PROCEDURE IF EXISTS `usp_s_menu_todos` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `usp_s_menu_todos`(
IN p_cOdetPlataforma char(1),  
IN p_nUsuId int,  
IN p_nAplId int  
)
BEGIN
 Select 
    apl.nAplId,
    apl.cAplDescripcion,
	apl.cAplImagenUrl,
    obj.nObjId,
    obj.cObjNombre,
    objdet.nOdetId,
    objdet.nOdetTipo,
    objdet.cOdetNombreArchivo
From
    aplicaciones apl
        INNER JOIN
    OBJETO obj ON obj.nAplId = apl.nAplId
        INNER JOIN
    OBJETO_DETALLE objdet ON objdet.nObjId = obj.nObjId
        INNER JOIN
    USUARIO_OBJETO usuobj ON usuobj.nObjId = obj.nObjId
where
    objdet.cOdetPlataforma = p_cOdetPlataforma
        AND apl.cAplEstado = '1'
        AND obj.cObjEstado = '1'
        AND objdet.cOdetEstado = '1'
        AND objdet.nOdetTipo = '1'
        AND usuobj.nUsuCodigo = p_nUsuId
        AND apl.nAplId = p_nAplId
order by apl.cAplDescripcion , obj.cObjNombre;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_s_usuario_login` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `usp_s_usuario_login`(
 p_cUsuNick varchar(100),
 p_cUsuClave varchar(100)
)
BEGIN
SELECT 
    nPerId, nUsuCodigo
FROM
    usuario
WHERE
    cUsuNick = p_cUsuNick
	AND cUsuClave = p_cUsuClave
        AND cUsuEstado = 0;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-24  9:43:30
