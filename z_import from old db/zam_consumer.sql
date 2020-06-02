-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 23 2019 г., 13:25
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

--
-- База данных: `zam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zam_consumer_mig`
--

CREATE TABLE IF NOT EXISTS `zam_consumer` (
  `kod_consumer` bigint(20) NOT NULL,
  `name_consumer` varchar(49) DEFAULT NULL,
  `kod_grp` int(3) DEFAULT NULL,
  `kod_seti` int(2) DEFAULT NULL,
  `kod_rem` int(4) DEFAULT NULL,
  `kod_otr` int(2) NOT NULL,
  `kod_podotr` int(2) NOT NULL,
  UNIQUE KEY `kod_consumer` (`kod_consumer`),
  KEY `ind_kod_podotr` (`kod_podotr`),
  KEY `ind_kod_otr` (`kod_otr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zam_consumer_mig`
--
ALTER TABLE `zam_consumer`
  ADD CONSTRAINT `zam_consumer_ibfk_1` FOREIGN KEY (`kod_podotr`) REFERENCES `zam_otr` (`kod_podotr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
