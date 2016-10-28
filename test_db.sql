-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Жов 28 2016 р., 17:35
-- Версія сервера: 5.5.52-0+deb8u1
-- Версія PHP: 5.6.26-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `test_db`
--
CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `test_db`;

-- --------------------------------------------------------

--
-- Структура таблиці `roster_table`
--

CREATE TABLE IF NOT EXISTS `roster_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `player_profile` text COLLATE utf8_unicode_ci NOT NULL,
  `image_profile` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `roster_table`
--

INSERT INTO `roster_table` (`id`, `first_name`, `last_name`, `number`, `position`, `age`, `player_profile`, `image_profile`) VALUES
(1, 'Test', 'Output', 10, 'Forvard', 27, 'Born and raised in central Argentina, Messi was diagnosed with a growth hormone deficiency as a child. At age 13, he relocated to Spain to join Barcelona, who agreed to pay for his medical treatment. After a fast progression through Barcelona''s youth academy, Messi made his competitive debut aged 17 in October 2004. Despite being injury-prone during his early career, he established himself as an integral player for the club within the next three years, finishing 2007 as a finalist for both the Ballon d''Or and FIFA World Player of the Year award, a feat he repeated the following year. His first uninterrupted campaign came in the 2008-09 season, during which he helped Barcelona achieve the first treble in Spanish football. At 22 years old, Messi won the Ballon d''Or and FIFA World Player of the Year award by record voting margins.Three successful seasons followed, with Messi winning three consecutive FIFA Ballons d''Or, including an unprecedented fourth. His personal best campaign to date was the 2011-12 season, in which he set the La Liga and European records for most goals scored in a single season, while establishing himself as Barcelona''s all-time top scorer in official competitions in March 2012. He again struggled with injury during the following two seasons, twice finishing second for the Ballon d''Or behind Cristiano Ronaldo, his perceived career rival. Messi regained his best form during the 2014-15 campaign, breaking the all-time goalscoring records in both La Liga and the Champions League in November 2014, and led Barcelona to a historic second treble. He is currently the second best goalscorer in the history of the European Cup/Champions League.', ''),
(6, 'mewithoutyou', '', 1, '', 45, 'The Fox, The Crow And The Cookie.', '');

-- --------------------------------------------------------

--
-- Структура таблиці `users_tabl`
--

CREATE TABLE IF NOT EXISTS `users_tabl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(76) COLLATE utf8_unicode_ci NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users_tabl`
--

INSERT INTO `users_tabl` (`id`, `username`, `email`, `password`, `added`) VALUES
(63, 'Test', 'test@mail.com', '$2y$14$9Cy0Lz/8V.bBDNEaDb9gPe4ts2yXO0JelP2mNfff//DSlrJUvfLz6', '2016-10-28 14:04:06');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `roster_table`
--
ALTER TABLE `roster_table`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users_tabl`
--
ALTER TABLE `users_tabl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `roster_table`
--
ALTER TABLE `roster_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `users_tabl`
--
ALTER TABLE `users_tabl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
