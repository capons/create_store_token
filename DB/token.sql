-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 14 2016 г., 11:03
-- Версия сервера: 5.6.29
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `token`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(2, 'UA'),
(4, 'USA');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT '0',
  `address_line_1` varchar(255) DEFAULT '0',
  `address_line_2` varchar(255) DEFAULT '0',
  `town` varchar(255) DEFAULT '0',
  `post_code` varchar(255) DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `address_line_1`, `address_line_2`, `town`, `post_code`, `country_id`) VALUES
(4, 'Customer 1', 'Ukraine', 'Lenina 2', 'ZP', '69000', 2),
(5, 'Customer 2', 'wqdqwqdqw', 'wqdqwqdqw', 'asdasd', 'dasdasd', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT '0',
  `address_line_1` varchar(255) DEFAULT '0',
  `address_line_2` varchar(255) DEFAULT '0',
  `town` varchar(50) DEFAULT '0',
  `post_code` varchar(50) NOT NULL DEFAULT '0',
  `country_id` int(11) DEFAULT '0',
  `pouch_id_option` enum('barcode','increment') NOT NULL DEFAULT 'barcode',
  `number_of_tills` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stores`
--

INSERT INTO `stores` (`id`, `customer_id`, `name`, `address_line_1`, `address_line_2`, `town`, `post_code`, `country_id`, `pouch_id_option`, `number_of_tills`) VALUES
(2, 4, 'Store 1', '0', '0', '0', '0', 2, 'barcode', '0'),
(6, 4, 'Some store 2', 'adfqwfqwf', 'qewgwebteqwbowej', 'gowgowjepgoi', '51412', 2, 'increment', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `status` enum('new','active','expired') DEFAULT 'new',
  `access_token` varchar(80) DEFAULT NULL,
  `token` varchar(80) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tokens`
--

INSERT INTO `tokens` (`id`, `store_id`, `status`, `access_token`, `token`, `last_login`) VALUES
(1, NULL, 'new', NULL, 'X23NXQq7c45lCYemoUbZJId0AbsmaDkuwMi6tzyxc8V6fMRaOZFvueNj5VikT89DK0dqHnAWyHnCGvzQ', NULL),
(2, NULL, 'new', NULL, 'wJTptd6gmDeaN1MI3yiVEz98YYuUXMQvR8ulfgLmkFaSONVOCPIoKXA5bEZ7bKUw9hG70xcFQ6drvBW4', NULL),
(3, NULL, 'new', NULL, 'Bp0TD83Q6qSYnERUCfCmXbGVOrs4dPpIcSh1QaeMUxliVtE5LifJk0jlgtanrBXdF9qxyAFKjZ5TNHAW', NULL),
(4, NULL, 'new', NULL, 'tkk9HF4qyVoy5mExm9DoVgRrLS7j2ZGuFI2XabOOQa7C5MnfS0NHZ8AQzluMcEtU8TK4dvfIep61KGBY', NULL),
(5, NULL, 'new', NULL, 'mpzIkT75UgdckY6aeKDZ2Astv2OwpzZriFbSnYvwsTRFqyhc4oUu1IL4CMjf8HR03L5bfWJhmVG8EQxH', NULL),
(6, 2, 'new', NULL, 'hxYLHt74gHa84gWuKWsNkZRqRPSnYAVeGDii69SjLpmrMtC06XfabIJmoBc12dv7dI1VrnO3Fh5Xy5cC', NULL),
(7, 2, 'expired', NULL, 'mqN3HLPQ12IYX46OTVPAeMW7r60FiROLRUlb5Mo2kAcjhWiENEGZdwTD38Fgyfp1ZsBhzs7SgCGkfcJe', NULL),
(8, 2, 'new', NULL, 'ZVhmvTIbDSkO5YLoWye2PSaRA8i6LiwxdIlWTvFj5t01KQuH7do8R2B3qABEtMXXlsxDVNZJrCQ9b3mg', NULL),
(9, 2, 'new', NULL, 'd44YQOrtNnGTfcVerJsdaSCpHFR3JqK0FkHx53bPMhbgZU9WCIUyBqLs6Rt5ZfWxSijawz7GX1klDPji', NULL),
(10, 2, 'new', NULL, '5LcalALSkzYcneui30zQfS8M2UCoaoOYmwsmwvhZ8H2tjfOEH9FTIyn4UEvyIxgNP5TA3D0KBMsRiRlr', NULL),
(11, 2, 'new', NULL, 'nq8cn5St2hecf3dRaZQQSOIgz2717yGiOiRpYtEXUYbmNNsJxjAv51sf8KGX4eLrTuIyKBAkHaFTo390', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '0',
  `hash` varchar(255) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `hash`, `last_login`, `created_at`) VALUES
(1, 'pulsar557@gmail.com', '$2y$10$ScZ4I04MhLGdw3Z33/x8r.w3Gp1S31UO/PSLgH8VJGRdiNyRq8ZVm', '2016-08-31 04:45:10', '2016-08-30 10:16:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COUNTRY_ID` (`country_id`);

--
-- Индексы таблицы `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CUSTOMER_ID` (`customer_id`),
  ADD KEY `COUNTRY_ID` (`country_id`);

--
-- Индексы таблицы `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `STORE_ID` (`store_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_customers_countries` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Ограничения внешнего ключа таблицы `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `FK2_countries` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `FK__customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `FK1_store` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
