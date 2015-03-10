-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bracket_ro1`;
CREATE TABLE `bracket_ro1` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro1` (`spot`, `name`, `score`) VALUES
(1, '&nbsp;', 0);

DROP TABLE IF EXISTS `bracket_ro1024`;
CREATE TABLE `bracket_ro1024` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bracket_ro128`;
CREATE TABLE `bracket_ro128` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bracket_ro16`;
CREATE TABLE `bracket_ro16` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro16` (`spot`, `name`, `score`) VALUES
(1, '&nbsp;', 0),
(2, '&nbsp;', 0),
(3, '&nbsp;', 0),
(4, '&nbsp;', 0),
(5, '&nbsp;', 0),
(6, '&nbsp;', 0),
(7, '&nbsp;', 0),
(8, '&nbsp;', 0),
(9, '&nbsp;', 0),
(10,  '&nbsp;', 0),
(11,  '&nbsp;', 0),
(12,  '&nbsp;', 0),
(13,  '&nbsp;', 0),
(14,  '&nbsp;', 0),
(15,  '&nbsp;', 0),
(16,  '&nbsp;', 0);

DROP TABLE IF EXISTS `bracket_ro2`;
CREATE TABLE `bracket_ro2` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro2` (`spot`, `name`, `score`) VALUES
(1, '&nbsp;', 0),
(2, '&nbsp;', 0);

DROP TABLE IF EXISTS `bracket_ro2048`;
CREATE TABLE `bracket_ro2048` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bracket_ro256`;
CREATE TABLE `bracket_ro256` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bracket_ro32`;
CREATE TABLE `bracket_ro32` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro32` (`spot`, `name`, `score`) VALUES
(1, 'Name#1', 0),
(2, 'Name#4', 0),
(3, 'Name#33',  0),
(4, 'Name#32',  0),
(5, 'Name#17',  0),
(6, 'Name#15',  0),
(7, 'Name#28',  0),
(8, 'Name#3', 0),
(9, 'Name#24',  0),
(10,  'Name#27',  0),
(11,  'Name#8', 0),
(12,  'Name#40',  0),
(13,  'Name#39',  0),
(14,  'Name#30',  0),
(15,  'Name#35',  0),
(16,  'Name#22',  0),
(17,  'Name#16',  0),
(18,  'Name#25',  0),
(19,  'Name#38',  0),
(20,  'Name#19',  0),
(21,  'Name#9', 0),
(22,  'Name#34',  0),
(23,  'Name#6', 0),
(24,  'Name#13',  0),
(25,  '&nbsp;', 0),
(26,  '&nbsp;', 0),
(27,  '&nbsp;', 0),
(28,  '&nbsp;', 0),
(29,  '&nbsp;', 0),
(30,  '&nbsp;', 0),
(31,  '&nbsp;', 0),
(32,  '&nbsp;', 0);

DROP TABLE IF EXISTS `bracket_ro4`;
CREATE TABLE `bracket_ro4` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro4` (`spot`, `name`, `score`) VALUES
(1, '&nbsp;', 0),
(2, '&nbsp;', 0),
(3, '&nbsp;', 0),
(4, '&nbsp;', 0);

DROP TABLE IF EXISTS `bracket_ro512`;
CREATE TABLE `bracket_ro512` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bracket_ro64`;
CREATE TABLE `bracket_ro64` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro64` (`spot`, `name`, `score`) VALUES
(1, '*BYE*',  0),
(3, '*BYE*',  0),
(5, '*BYE*',  0),
(7, '*BYE*',  0),
(9, '*BYE*',  0),
(11,  '*BYE*',  0),
(13,  '*BYE*',  0),
(15,  '*BYE*',  0),
(17,  '*BYE*',  0),
(19,  '*BYE*',  0),
(21,  '*BYE*',  0),
(23,  '*BYE*',  0),
(25,  '*BYE*',  0),
(27,  '*BYE*',  0),
(29,  '*BYE*',  0),
(31,  '*BYE*',  0),
(33,  '*BYE*',  0),
(35,  '*BYE*',  0),
(37,  '*BYE*',  0),
(39,  '*BYE*',  0),
(41,  '*BYE*',  0),
(43,  '*BYE*',  0),
(45,  '*BYE*',  0),
(47,  '*BYE*',  0),
(2, 'Name#1', 2),
(4, 'Name#4', 2),
(6, 'Name#33',  2),
(8, 'Name#32',  2),
(10,  'Name#17',  2),
(12,  'Name#15',  2),
(14,  'Name#28',  2),
(16,  'Name#3', 2),
(18,  'Name#24',  2),
(20,  'Name#27',  2),
(22,  'Name#8', 2),
(24,  'Name#40',  2),
(26,  'Name#39',  2),
(28,  'Name#30',  2),
(30,  'Name#35',  2),
(32,  'Name#22',  2),
(34,  'Name#16',  2),
(36,  'Name#25',  2),
(38,  'Name#38',  2),
(40,  'Name#19',  2),
(42,  'Name#9', 2),
(44,  'Name#34',  2),
(46,  'Name#6', 2),
(48,  'Name#13',  2),
(50,  'Name#37',  0),
(52,  'Name#10',  0),
(54,  'Name#21',  0),
(56,  'Name#2', 0),
(58,  'Name#5', 0),
(60,  'Name#11',  0),
(62,  'Name#36',  0),
(64,  'Name#7', 0),
(49,  'Name#26',  0),
(51,  'Name#18',  0),
(53,  'Name#12',  0),
(55,  'Name#20',  0),
(57,  'Name#29',  0),
(59,  'Name#14',  0),
(61,  'Name#23',  0),
(63,  'Name#31',  0);

DROP TABLE IF EXISTS `bracket_ro8`;
CREATE TABLE `bracket_ro8` (
  `spot` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `score` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bracket_ro8` (`spot`, `name`, `score`) VALUES
(1, '&nbsp;', 0),
(2, '&nbsp;', 0),
(3, '&nbsp;', 0),
(4, '&nbsp;', 0),
(5, '&nbsp;', 0),
(6, '&nbsp;', 0),
(7, '&nbsp;', 0),
(8, '&nbsp;', 0);

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `data` char(30) NOT NULL,
  `value` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `data` (`data`, `value`) VALUES
('bracket', 'bracket_ro64');

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `spot` int(20) NOT NULL,
  `name` char(20) NOT NULL DEFAULT ''''''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `participants` (`spot`, `name`) VALUES
(1, 'Name#1'),
(2, 'Name#2'),
(3, 'Name#3'),
(4, 'Name#4'),
(5, 'Name#5'),
(6, 'Name#6'),
(7, 'Name#7'),
(8, 'Name#8'),
(9, 'Name#9'),
(10,  'Name#10'),
(11,  'Name#11'),
(12,  'Name#12'),
(13,  'Name#13'),
(14,  'Name#14'),
(15,  'Name#15'),
(16,  'Name#16'),
(17,  'Name#17'),
(18,  'Name#18'),
(19,  'Name#19'),
(20,  'Name#20'),
(21,  'Name#21'),
(22,  'Name#22'),
(23,  'Name#23'),
(24,  'Name#24'),
(25,  'Name#25'),
(26,  'Name#26'),
(27,  'Name#27'),
(28,  'Name#28'),
(29,  'Name#29'),
(30,  'Name#30'),
(31,  'Name#31'),
(32,  'Name#32'),
(33,  'Name#33'),
(34,  'Name#34'),
(35,  'Name#35'),
(36,  'Name#36'),
(37,  'Name#37'),
(38,  'Name#38'),
(39,  'Name#39'),
(40,  'Name#40');

DROP TABLE IF EXISTS `ro16`;
CREATE TABLE `ro16` (
  `spot` int(11) NOT NULL,
  `name` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ro16` (`spot`, `name`) VALUES
(2, '-'),
(3, '-'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-'),
(9, '-'),
(10,  '-'),
(11,  '-'),
(12,  '-'),
(13,  '-'),
(14,  '-'),
(15,  '-'),
(16,  '-'),
(1, '-');

DROP TABLE IF EXISTS `ro8`;
CREATE TABLE `ro8` (
  `spot` int(11) NOT NULL,
  `name` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ro8` (`spot`, `name`) VALUES
(1, '-'),
(2, '-'),
(3, '-'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `rights` char(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`name`, `password`, `rights`) VALUES
('admin', 'admin',  'superadmin');

-- 2015-03-10 12:30:33
