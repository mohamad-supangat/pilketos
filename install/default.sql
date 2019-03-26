-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `v_coblos`;
CREATE TABLE `v_coblos` (`nama_calon` varchar(55), `id` int(11), `nis` varchar(8), `c_id` int(11), `nama` varchar(55), `kelas` int(2), `jurusan` varchar(3));


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `x_calon`;
CREATE TABLE `x_calon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `x_calon` (`id`, `nis`, `nama`, `foto`, `keterangan`) VALUES
(5,	'158586',	'SUPANGAT 158586',	'image825.png',	'<p>Pilih budin aja kelalen</p>\r\n'),
(6,	'158587',	'SUPANGAT 158587',	'image840.png',	'<p>Coblos Nomer 2 yo bos</p>\r\n');

DROP TABLE IF EXISTS `x_coblos`;
CREATE TABLE `x_coblos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(8) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `x_login`;
CREATE TABLE `x_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(8) NOT NULL,
  `pwd` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `lvl` varchar(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `x_login` (`id`, `nis`, `pwd`, `nama`, `kelas`, `jurusan`, `lvl`) VALUES
(1,	'0000',	'admin',	'Supangat Oy',	0,	'',	'1'),
(155,	'158586',	'SUPANGAT158586',	'SUPANGAT 158586',	12,	'TKJ',	'2'),
(156,	'158587',	'SUPANGAT158587',	'SUPANGAT 158587',	12,	'TKJ',	'2'),
(157,	'158588',	'SUPANGAT158588',	'SUPANGAT 158588',	12,	'TKJ',	'2'),
(158,	'158589',	'SUPANGAT158589',	'SUPANGAT 158589',	12,	'TKJ',	'2'),
(159,	'158590',	'SUPANGAT158590',	'SUPANGAT 158590',	12,	'TKJ',	'2'),
(160,	'158591',	'SUPANGAT158591',	'SUPANGAT 158591',	12,	'TKJ',	'2'),
(161,	'158592',	'SUPANGAT158592',	'SUPANGAT 158592',	12,	'TKJ',	'2'),
(162,	'158593',	'SUPANGAT158593',	'SUPANGAT 158593',	12,	'TKJ',	'2'),
(163,	'158594',	'SUPANGAT158594',	'SUPANGAT 158594',	12,	'TKJ',	'2'),
(164,	'158595',	'SUPANGAT158595',	'SUPANGAT 158595',	12,	'TKJ',	'2'),
(165,	'158596',	'SUPANGAT158596',	'SUPANGAT 158596',	12,	'TKJ',	'2'),
(166,	'158597',	'SUPANGAT158597',	'SUPANGAT 158597',	12,	'TKJ',	'2'),
(167,	'158598',	'SUPANGAT158598',	'SUPANGAT 158598',	12,	'TKJ',	'2'),
(168,	'158599',	'SUPANGAT158599',	'SUPANGAT 158599',	12,	'TKJ',	'2'),
(169,	'158600',	'SUPANGAT158600',	'SUPANGAT 158600',	12,	'TKJ',	'2'),
(170,	'158601',	'SUPANGAT158601',	'SUPANGAT 158601',	12,	'TKJ',	'2'),
(171,	'158602',	'SUPANGAT158602',	'SUPANGAT 158602',	12,	'TKJ',	'2');

DROP TABLE IF EXISTS `v_coblos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_coblos` AS select `x_calon`.`nama` AS `nama_calon`,`x_coblos`.`id` AS `id`,`x_coblos`.`nis` AS `nis`,`x_coblos`.`c_id` AS `c_id`,`x_login`.`nama` AS `nama`,`x_login`.`kelas` AS `kelas`,`x_login`.`jurusan` AS `jurusan` from ((`x_coblos` join `x_login` on((`x_coblos`.`nis` = `x_login`.`nis`))) join `x_calon` on((`x_coblos`.`c_id` = `x_calon`.`id`)));

-- 2018-08-24 22:48:03
