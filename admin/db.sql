/*
drop database budejovicepraha;
create database if not exists budejovicepraha default character set =utf8;
use database budejovicepraha;
*/	
CREATE USER 'budejovicepraha'@'localhost' IDENTIFIED BY 'changeit';
GRANT ALL PRIVILEGES ON budejovicepraha.* TO 'budejovicepraha'@'localhost' WITH GRANT OPTION;
GRANT ALL ON admin.* TO budejovicepraha@'localhost' IDENTIFIED BY 'changeit';	
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON budejovicepraha.* TO 'budejovicepraha'@'localhost' IDENTIFIED BY 'changeit';

CREATE TABLE `t_users` (
  `login` varchar(20) NOT NULL,
  `passwd` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`login`)
);


CREATE TABLE `t_aktuality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishdate` date DEFAULT NULL,
  `aktualita` varchar(2056) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

	



