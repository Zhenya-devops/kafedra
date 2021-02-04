SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `boss_job`;
CREATE TABLE `boss_job` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL,
  `autor` varchar(40) NOT NULL,
  `view_job` varchar(20) NOT NULL,
  `id_raspisanie` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_job`),
  UNIQUE KEY `id_raspisanie` (`id_raspisanie`),
  CONSTRAINT `boss_job_ibfk_1` FOREIGN KEY (`id_raspisanie`) REFERENCES `shtat_rasp` (`id_raspisanie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `discip`;
CREATE TABLE `discip` (
  `id_discip` int(11) NOT NULL AUTO_INCREMENT,
  `name_discip` varchar(40) NOT NULL,
  `fakultet` varchar(40) NOT NULL,
  `specialty` varchar(40) NOT NULL,
  `id_kafedra` int(11) NOT NULL,
  PRIMARY KEY (`id_discip`),
  KEY `id_kafedra` (`id_kafedra`),
  CONSTRAINT `discip_ibfk_1` FOREIGN KEY (`id_kafedra`) REFERENCES `kafedra` (`id_kafedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `discip` (`id_discip`, `name_discip`, `fakultet`, `specialty`, `id_kafedra`) VALUES
(1,	'ТРПО',	'Математический',	'ПОИТ',	1);

DROP TABLE IF EXISTS `kafedra`;
CREATE TABLE `kafedra` (
  `id_kafedra` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `fakultet` varchar(20) NOT NULL,
  `zav_kafedr` varchar(20) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kafedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `kafedra` (`id_kafedra`, `name`, `fakultet`, `zav_kafedr`, `number`) VALUES
(1,	'Математики и ИТ',	'Математический',	'Иванов И.А.',	'+375293333333');

DROP TABLE IF EXISTS `shtat_rasp`;
CREATE TABLE `shtat_rasp` (
  `id_raspisanie` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(30) NOT NULL,
  `id_kafedra` int(11) NOT NULL,
  `position` varchar(40) NOT NULL,
  `rank` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_raspisanie`),
  UNIQUE KEY `id_kafedra` (`id_kafedra`),
  CONSTRAINT `shtat_rasp_ibfk_1` FOREIGN KEY (`id_kafedra`) REFERENCES `kafedra` (`id_kafedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `teacher_poruch`;
CREATE TABLE `teacher_poruch` (
  `id_poruch` int(11) NOT NULL AUTO_INCREMENT,
  `id_raspisanie` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `lection` int(3) DEFAULT NULL,
  `seminar` int(3) DEFAULT NULL,
  `praction` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_poruch`),
  UNIQUE KEY `id_raspisanie` (`id_raspisanie`),
  KEY `teacher_poruch_ibfk_2` (`id_plan`),
  CONSTRAINT `teacher_poruch_ibfk_1` FOREIGN KEY (`id_raspisanie`) REFERENCES `shtat_rasp` (`id_raspisanie`),
  CONSTRAINT `teacher_poruch_ibfk_2` FOREIGN KEY (`id_plan`) REFERENCES `uch_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `uch_plan`;
CREATE TABLE `uch_plan` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `form_obuch` varchar(10) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `kurs` int(1) NOT NULL,
  `id_discip` int(11) NOT NULL,
  `semestr` int(2) NOT NULL,
  `col_chasov` int(3) NOT NULL,
  `itg_contr` date DEFAULT NULL,
  PRIMARY KEY (`id_plan`),
  UNIQUE KEY `id_discip` (`id_discip`),
  CONSTRAINT `uch_plan_ibfk_1` FOREIGN KEY (`id_discip`) REFERENCES `kafedra` (`id_kafedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `uch_posob`;
CREATE TABLE `uch_posob` (
  `id_posob` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `year_izd` varchar(4) DEFAULT NULL,
  `geolog_izd` varchar(20) NOT NULL,
  `id_kafedra` int(11) NOT NULL,
  PRIMARY KEY (`id_posob`),
  UNIQUE KEY `id_kafedra` (`id_kafedra`),
  CONSTRAINT `uch_posob_ibfk_1` FOREIGN KEY (`id_kafedra`) REFERENCES `kafedra` (`id_kafedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;