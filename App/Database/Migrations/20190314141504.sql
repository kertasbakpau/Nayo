CREATE TABLE `m_usersettings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `M_User_Id` int(11) NOT NULL,
  `G_Language_Id` int(11) NOT NULL DEFAULT '1',
  `G_Color_Id` int(11) NOT NULL DEFAULT '1',
  `RowPerpage` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`Id`),
  KEY `m_usersettings_M_User_Id_fk` (`M_User_Id`),
  CONSTRAINT `m_usersettings_M_User_Id_fk` FOREIGN KEY (`M_User_Id`) REFERENCES `m_users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8
