-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 11 2020 г., 08:52
-- Версия сервера: 10.3.17-MariaDB-0+deb10u1
-- Версия PHP: 7.3.9-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c1_taxi_8v7_ru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `DataVipolneno` varchar(20) DEFAULT NULL,
  `Geox` varchar(20) DEFAULT NULL,
  `Geoy` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `mest` varchar(5) DEFAULT NULL,
  `adres001` varchar(500) DEFAULT NULL,
  `paradnaya` varchar(1) DEFAULT NULL,
  `adres002` varchar(500) DEFAULT NULL,
  `mani` varchar(100) DEFAULT NULL,
  `rez001` varchar(100) DEFAULT NULL,
  `rez002` varchar(100) DEFAULT NULL,
  `rez003` varchar(100) DEFAULT NULL,
  `rez004` varchar(100) DEFAULT NULL,
  `rez005` varchar(100) DEFAULT NULL,
  `vipolneno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `login`, `date`, `DataVipolneno`, `Geox`, `Geoy`, `ip`, `mest`, `adres001`, `paradnaya`, `adres002`, `mani`, `rez001`, `rez002`, `rez003`, `rez004`, `rez005`, `vipolneno`) VALUES
(1, 'serg', '2016/07/01  11.31.50', NULL, '55.83157793284014', '38.499685716502356', '178.208.230.130', '', 'Ð Ð¾ÑÑÐ¸Ñ, ÐœÐ¾ÑÐºÐ¾Ð²ÑÐºÐ°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ, ÐÐ¾Ð³Ð¸Ð½ÑÐºÐ¸Ð¹ Ñ€Ð°Ð¹Ð¾Ð½', '1', '', '', NULL, NULL, NULL, NULL, NULL, 'ÐÐµÑ‚');

-- --------------------------------------------------------

--
-- Структура таблицы `invite`
--

CREATE TABLE `invite` (
  `id` int(3) NOT NULL,
  `Invite` varchar(10) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `refal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `invite`
--

INSERT INTO `invite` (`id`, `Invite`, `login`, `refal`) VALUES
(1, '3870138847', 'serg', NULL),
(2, '9003396168', 'null', NULL),
(3, '0836629216', 'null', NULL),
(4, '2223022945', 'null', NULL),
(5, '5294989677', 'mor', NULL),
(6, '00', 'null', 'mor'),
(7, '11', 'null', 'mor'),
(8, '22', 'null', 'mor'),
(9, '88', 'null', 'mor'),
(10, '33', 'null', 'mor'),
(11, '69', 'null', 'mor'),
(12, '55', 'null', 'mor'),
(13, '32', 'null', 'mor'),
(14, '05', 'null', 'mor'),
(15, '72', 'null', 'mor'),
(16, '93', 'null', 'mor'),
(17, '91', 'null', 'mor'),
(18, '57', 'null', 'mor'),
(19, '69', 'null', 'mor'),
(20, '17', 'null', 'mor'),
(21, '66', 'null', 'mor'),
(22, '89', 'null', 'mor'),
(23, '95', 'null', 'mor'),
(24, '68', 'null', 'serg'),
(25, '40', 'null', 'serg'),
(26, '68', 'null', 'serg'),
(27, '03', 'null', 'serg'),
(28, '79', 'null', 'serg'),
(29, '92', 'null', 'serg'),
(30, '01', 'null', 'serg'),
(31, '86', 'null', 'serg'),
(32, '97', 'null', 'serg'),
(33, '60', 'null', 'serg'),
(34, '23', 'null', 'serg'),
(35, '13', 'null', 'serg'),
(36, '30', 'null', 'serg'),
(37, '91', 'null', 'serg'),
(38, '02', 'null', 'serg'),
(39, '98', 'null', 'serg'),
(40, '99', 'null', 'serg'),
(41, '64', 'null', 'serg'),
(42, '97', 'null', 'serg'),
(43, '38', 'null', 'serg'),
(44, '71', 'null', 'serg');

-- --------------------------------------------------------

--
-- Структура таблицы `shotchik`
--

CREATE TABLE `shotchik` (
  `id` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `shotchik`
--

INSERT INTO `shotchik` (`id`) VALUES
('2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dostup` varchar(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pone` varchar(20) NOT NULL,
  `VerefyPone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `VerefyMail` varchar(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `reg_date` varchar(32) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `name_2` varchar(32) NOT NULL,
  `name_3` varchar(32) NOT NULL,
  `name_4` varchar(32) NOT NULL,
  `hash` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `dostup`, `login`, `pone`, `VerefyPone`, `email`, `VerefyMail`, `password`, `reg_date`, `ip`, `name_2`, `name_3`, `name_4`, `hash`) VALUES
(1, '', 'serg', '9028546864', 'No', 'sachernukhin@7v8.ru', 'No', '31f8769cfb2359799695fe8d64f87f309ad00b84', '03-03-2016 РІ 08:35', '127.0.0.1', 'РЎРµСЂРіРµР№', 'Р§РµСЂРЅСѓС…РёРЅ', 'РЎРµСЂРіРµР№', ''),
(2, '', 'mor', '', 'No', 'morovbut@7v8.ru', 'No', '31f8769cfb2359799695fe8d64f87f309ad00b84', '22-03-2016 Ð² 18:11', '178.208.230.130', '', '', '', '0f3a0a62ad7603babc80ce1fd984a47e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
