DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT'',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

LOCK TABLES `admins` WRITE;

INSERT INTO `admins` VALUES (1,'HyoJin Moon','hmoon3@wccnet.edu','$2y$10$DxByF9dL.hHAT9v7hda5MeHjE.cOHJrAk2x0Q3SwOYiIaTjcnmYf2','admin');

UNLOCK TABLES;


-- Dump completed on 2017-07-08 15:08:01