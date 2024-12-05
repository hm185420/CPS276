DROP TABLE IF EXISTS `contactsTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactsTable` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(250) NOT NULL DEFAULT '',
  `phone` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `dob` varchar(10) NOT NULL DEFAULT '',
  `contacts` varchar(50) NOT NULL DEFAULT '',
  `age` varchar(5) NOT NULL DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
