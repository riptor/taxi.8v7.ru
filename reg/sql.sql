-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 22 2016 г., 14:50
-- Версия сервера: 5.5.35-33.0
-- Версия PHP: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u0155832_taxi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` varchar(40) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `date0` varchar(100) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `chel` varchar(100) DEFAULT NULL,
  `mest` varchar(100) DEFAULT NULL,
  `adres001` varchar(500) DEFAULT NULL,
  `mani` varchar(100) DEFAULT NULL,
  `pone` varchar(100) DEFAULT NULL,
  `adres002` varchar(500) DEFAULT NULL,
  `vsakoe` varchar(500) DEFAULT NULL,
  `Geox` varchar(100) DEFAULT NULL,
  `Geoy` varchar(100) DEFAULT NULL,
  `vipolneno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `shotchik`
--

CREATE TABLE IF NOT EXISTS `shotchik` (
  `id` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `shotchik`
--

INSERT INTO `shotchik` (`id`) VALUES
('1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` varchar(32) NOT NULL,
  `name_user` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
