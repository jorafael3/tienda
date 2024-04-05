-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: tienda
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `historial_compras` text DEFAULT NULL,
  `metodos_pago_preferidos` text DEFAULT NULL,
  `direcciones_envio_alternativas` text DEFAULT NULL,
  `preferencias_comunicacion` text DEFAULT NULL,
  `preferencias_privacidad` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_transaccion_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `saldo_anterior` int(11) DEFAULT NULL,
  `saldo_actual` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `numero_factura` varchar(50) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `tipo_documento` enum('venta','compra','ajuste') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex_tipos_transacciones`
--

DROP TABLE IF EXISTS `kardex_tipos_transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex_tipos_transacciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_tipo` (`nombre_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex_tipos_transacciones`
--

LOCK TABLES `kardex_tipos_transacciones` WRITE;
/*!40000 ALTER TABLE `kardex_tipos_transacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex_tipos_transacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_detalles`
--

DROP TABLE IF EXISTS `orden_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_detalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `total_linea` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_detalles`
--

LOCK TABLES `orden_detalles` WRITE;
/*!40000 ALTER TABLE `orden_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes_cab`
--

DROP TABLE IF EXISTS `ordenes_cab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenes_cab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_referencia` varchar(20) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `ordenes_cab_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes_cab`
--

LOCK TABLES `ordenes_cab` WRITE;
/*!40000 ALTER TABLE `ordenes_cab` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordenes_cab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros`
--

DROP TABLE IF EXISTS `parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_nombre` varchar(50) DEFAULT NULL,
  `pr_valor` float DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros`
--

LOCK TABLES `parametros` WRITE;
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
INSERT INTO `parametros` VALUES (1,'IMPUESTO IVA 0',0,'2024-04-03 18:00:52'),(2,'IMPUESTO IVA 15',15,'2024-04-03 18:00:52');
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros_horarios`
--

DROP TABLE IF EXISTS `parametros_horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros_horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(100) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_finalizacion` time DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros_horarios`
--

LOCK TABLES `parametros_horarios` WRITE;
/*!40000 ALTER TABLE `parametros_horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros_horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros_metodos_pago`
--

DROP TABLE IF EXISTS `parametros_metodos_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros_metodos_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `icono` varchar(100) DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros_metodos_pago`
--

LOCK TABLES `parametros_metodos_pago` WRITE;
/*!40000 ALTER TABLE `parametros_metodos_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametros_metodos_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros_tienda`
--

DROP TABLE IF EXISTS `parametros_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros_tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tienda` varchar(50) DEFAULT NULL,
  `email_tienda` varchar(100) DEFAULT NULL,
  `calle_tienda` varchar(100) DEFAULT NULL,
  `ciudad_tienda` varchar(100) DEFAULT NULL,
  `estado_tienda` varchar(100) DEFAULT NULL,
  `codigo_postal_tienda` varchar(20) DEFAULT NULL,
  `pais_tienda` varchar(100) DEFAULT NULL,
  `telefono1_tienda` varchar(10) DEFAULT NULL,
  `telefono2_tienda` varchar(10) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros_tienda`
--

LOCK TABLES `parametros_tienda` WRITE;
/*!40000 ALTER TABLE `parametros_tienda` DISABLE KEYS */;
INSERT INTO `parametros_tienda` VALUES (1,'TIENDA NOMBRE','jalvaradoe3@gmail.com','av 123','guayaquil','GUayas','90010','Ecuador','1111111','22222222','2024-04-04 10:11:29'),(2,'TIENDA 2','jalvaradoe3@gmail.com','av 123','guayaquil','GUayas','90010','Ecuador','1111111','22222222','2024-04-04 10:11:29');
/*!40000 ALTER TABLE `parametros_tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_categorias`
--

DROP TABLE IF EXISTS `productos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(100) DEFAULT NULL,
  `cat_descripcion` text DEFAULT NULL,
  `cat_icon` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_categorias`
--

LOCK TABLES `productos_categorias` WRITE;
/*!40000 ALTER TABLE `productos_categorias` DISABLE KEYS */;
INSERT INTO `productos_categorias` VALUES (1,'HAMBURGUESAS','Productos relacionados con hamburguesas','icono-hamburguesa.png','2024-04-03 17:59:18'),(2,'Bebidas','Bebidas refrescantes y energéticas','icono-bebidas.png','2024-04-03 18:02:25'),(3,'Postres','Deliciosos postres y dulces','icono-postres.png','2024-04-04 18:02:25');
/*!40000 ALTER TABLE `productos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_fichero`
--

DROP TABLE IF EXISTS `productos_fichero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_fichero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nombre` varchar(100) DEFAULT NULL,
  `prod_codigo` varchar(100) DEFAULT NULL,
  `prod_descripcion` text DEFAULT NULL,
  `prod_precio` float DEFAULT NULL,
  `prod_costo` float DEFAULT NULL,
  `prod_lleva_impuesto` int(11) DEFAULT NULL,
  `prod_impuesto_id` int(11) DEFAULT NULL,
  `prod_cat_id` int(11) DEFAULT NULL,
  `prod_subcat_id` int(11) DEFAULT NULL,
  `prod_activo` int(11) DEFAULT 1,
  `prod_cantidad_stock` int(11) DEFAULT NULL,
  `prod_proveedor_id` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  `fecha_modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_fichero`
--

LOCK TABLES `productos_fichero` WRITE;
/*!40000 ALTER TABLE `productos_fichero` DISABLE KEYS */;
INSERT INTO `productos_fichero` VALUES (1,'Hamburguesa Clásica','HBG001','Hamburguesa clásica con carne de res, lechuga, tomate y queso',5.99,3.5,1,1,1,1,1,50,1,'2024-04-03 17:58:55','2024-04-03 22:58:55'),(2,'Hamburguesa de Pollo','HBG002','Hamburguesa de pollo con lechuga, tomate y mayonesa',6.49,4,1,1,1,1,1,50,1,'2024-04-03 17:58:55','2024-04-03 22:58:55'),(3,'Hamburguesa Vegetariana','HBG003','Hamburguesa vegetariana con falafel, lechuga, tomate y salsa de tahini',7.99,5,1,1,1,1,1,30,1,'2024-04-03 17:58:55','2024-04-03 22:58:55'),(4,'Hamburguesa BBQ','HBG004','Hamburguesa con salsa barbacoa, cebolla caramelizada y queso cheddar',6.99,4.5,1,1,1,1,1,40,1,'2024-04-03 18:02:01','2024-04-03 23:02:01'),(5,'Hamburguesa Picante','HBG005','Hamburguesa con jalapeños, guacamole y salsa picante',7.49,5,1,1,1,1,1,30,1,'2024-04-03 18:02:01','2024-04-03 23:02:01'),(6,'Hamburguesa de Pavo','HBG006','Hamburguesa de pavo con lechuga, tomate y mostaza',6.49,4,1,1,1,1,1,50,1,'2024-04-03 18:02:01','2024-04-03 23:02:01'),(7,'Coca-Cola','CC001','Refresco de cola carbonatado',1.99,1,1,1,2,1,1,200,1,'2024-04-03 18:03:47','2024-04-03 23:03:47'),(8,'Jugo de Naranja','JN001','Jugo de naranja natural exprimido',2.49,1.5,1,1,2,2,1,150,1,'2024-04-03 18:03:47','2024-04-03 23:03:47'),(9,'Helado de Vainilla','HV001','Helado de vainilla cremoso',3.99,2,1,1,3,1,1,100,1,'2024-04-03 18:03:55','2024-04-03 23:03:55'),(10,'Tarta de Manzana','TM001','Tarta de manzana casera con canela',5.49,3,1,1,3,2,1,50,1,'2024-04-03 18:03:55','2024-04-03 23:03:55');
/*!40000 ALTER TABLE `productos_fichero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_subcategorias`
--

DROP TABLE IF EXISTS `productos_subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_nombre` varchar(100) DEFAULT NULL,
  `sub_descripcion` text DEFAULT NULL,
  `sub_icon` varchar(100) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_subcategorias`
--

LOCK TABLES `productos_subcategorias` WRITE;
/*!40000 ALTER TABLE `productos_subcategorias` DISABLE KEYS */;
INSERT INTO `productos_subcategorias` VALUES (1,'HAMBRGRS - SOLAS','Hamburguesas individuales sin acompañamientos','icono-hamburguesa-sola.png',1,'2024-04-03 17:59:22'),(2,'Refrescos','Bebidas gaseosas y refrescantes','icono-refrescos.png',2,'2024-04-03 18:02:28'),(3,'Jugos Naturales','Jugos de frutas naturales','icono-jugos.png',2,'2024-04-03 18:02:28'),(4,'Helados','Deliciosos helados de diferentes sabores','icono-helados.png',3,'2024-04-03 18:02:30'),(5,'Tartas','Tartas caseras de diferentes sabores','icono-tartas.png',3,'2024-04-04 18:02:30');
/*!40000 ALTER TABLE `productos_subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tienda'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-05 17:29:15
