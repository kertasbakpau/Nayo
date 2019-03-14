
CREATE TABLE `m_groupusers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(100) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Modified` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

CREATE TABLE `m_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `M_Groupuser_Id` int(11) DEFAULT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `IsLoggedIn` smallint(11) NOT NULL DEFAULT '0',
  `IsActive` smallint(11) NOT NULL DEFAULT '1',
  `Language` varchar(50) NOT NULL DEFAULT 'indonesia',
  `CreatedBy` varchar(50) DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Modified` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `m_users_M_Groupuser_Id_fk` (`M_Groupuser_Id`),
  CONSTRAINT `m_users_M_Groupuser_Id_fk` FOREIGN KEY (`M_Groupuser_Id`) REFERENCES `m_groupusers` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO m_users (Username, Password) VALUES ('superadmin', '18e31bae1483a116b33cc49e32591064')