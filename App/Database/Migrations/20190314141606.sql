CREATE TABLE `m_userprofiles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `M_User_Id` int(11) NOT NULL,
  `CompleteName` varchar(300) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `PhotoPath` varchar(300) DEFAULT NULL,
  `PhotoName` varchar(300) DEFAULT NULL,
  `AboutMe` varchar(1000) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Modified` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `m_userprofiles_M_User_Id_fk` (`M_User_Id`),
  CONSTRAINT `m_userprofiles_M_User_Id_fk` FOREIGN KEY (`M_User_Id`) REFERENCES `m_users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8
