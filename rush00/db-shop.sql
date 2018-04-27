-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3307
-- Время создания: Апр 08 2018 г., 08:26
-- Версия сервера: 5.7.21
-- Версия PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db-shop`
--
CREATE DATABASE IF NOT EXISTS `db-shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db-shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_product` int(11) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `price` smallint(6) NOT NULL,
  `img_url` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `price` smallint(6) NOT NULL,
  `category` varchar(256) NOT NULL,
  `sku` varchar(14) NOT NULL,
  `img_url` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `title`, `price`, `category`, `sku`, `img_url`) VALUES
(1, 'Carrots', 3, 'Vegetables', 'CARR001', 'https://img.tesco.com/Groceries/pi/205/0000003266205/IDShot_540x540.jpg'),
(2, 'Broccoli', 2, 'Vegetables', 'BROC001', 'https://img.tesco.com/Groceries/pi/000/0268280000000/IDShot_540x540.jpg'),
(3, 'Potatoes', 2, 'Vegetables', 'JACK001', 'https://img.tesco.com/Groceries/pi/665/0000003262665/IDShot_540x540.jpg'),
(4, 'Aubergine', 3, 'Vegetables', 'AUBE001', 'https://img.tesco.com/Groceries/pi/301/0000003270301/IDShot_540x540.jpg'),
(5, 'Bananas', 2, 'Fruits', 'BANA001', 'https://img.tesco.com/Groceries/pi/000/0261480000000/IDShot_540x540.jpg'),
(6, 'Blueberries', 4, 'Fruits', 'BLUE001', 'https://img.tesco.com/Groceries/pi/005/0000003257005/IDShot_540x540.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
