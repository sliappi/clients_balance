-- Adminer 4.8.1 MySQL 8.0.36-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`cat_id`, `description`) VALUES
(1,	'Industry'),
(2,	'Commercial'),
(3,	'Naval');

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `cat_id` int NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `companies` (`com_id`, `name`, `cat_id`, `amount`) VALUES
(1,	'Test Company',	1,	100),
(2,	'Test Company 2',	1,	150),
(3,	'Test Company 3',	2,	1000);

-- 2024-04-22 20:54:18
