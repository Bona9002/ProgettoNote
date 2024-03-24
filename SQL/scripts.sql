CREATE DATABASE IF NOT EXISTS `d&d`;
USE `d&d`;

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE `utenti` (
  `ute_id` int(11) NOT NULL AUTO_INCREMENT,
  `ute_username` varchar(50) NOT NULL UNIQUE,
  `ute_password` varchar(50) NOT NULL,
  `ute_email` varchar(50) NOT NULL,
  PRIMARY KEY(`ute_id`)
);


INSERT INTO `utenti` (`ute_id`, `ute_username`, `ute_password`, `ute_email`) VALUES
(1, 'bona', '1234', 'ciao@email');
