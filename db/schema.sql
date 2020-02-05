-- mysqldump --compact -a -d -u cam -ptesttest tmpipc

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(32) COLLATE utf8_bin NOT NULL,
  `Password` varchar(32) COLLATE utf8_bin NOT NULL,
  `Role` enum('READ ONLY','ADMIN') COLLATE utf8_bin DEFAULT 'READ ONLY',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `userName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `obs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personID` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `fb_link` varchar(300) COLLATE utf8_bin NOT NULL,
  `obs_raw` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `det1_raw` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `det1_by` int(11) DEFAULT NULL,
  `det2_raw` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `det2_by` int(11) DEFAULT NULL,
  `taxonID` int(11) DEFAULT NULL,
  `notes` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `uploader` enum('Ripin','Randi','Cam') COLLATE utf8_bin NOT NULL DEFAULT 'Ripin',
  `photo1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo3` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo4` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo5` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo6` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo7` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo8` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo9` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `photo10` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fb_link` (`fb_link`),
  UNIQUE KEY `photo1` (`photo1`),
  KEY `taxonID` (`taxonID`),
  KEY `personID` (`personID`),
  KEY `det1_by` (`det1_by`),
  KEY `det2_by` (`det2_by`),
  CONSTRAINT `obs_ibfk_1` FOREIGN KEY (`taxonID`) REFERENCES `taxon` (`id`),
  CONSTRAINT `obs_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `person` (`id`),
  CONSTRAINT `obs_ibfk_3` FOREIGN KEY (`det1_by`) REFERENCES `person` (`id`),
  CONSTRAINT `obs_ibfk_4` FOREIGN KEY (`det2_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `home_place` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `taxon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fam` varchar(500) COLLATE utf8_bin NOT NULL,
  `genus` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `species` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `subtype` enum('ssp.','var.','f.') COLLATE utf8_bin DEFAULT NULL,
  `subsp` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genus` (`genus`,`species`,`subtype`,`subsp`,`author`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

