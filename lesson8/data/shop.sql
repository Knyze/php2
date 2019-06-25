-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2019 г., 12:05
-- Версия сервера: 5.7.25
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `session` varchar(100) DEFAULT NULL,
  `product_id` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `session`, `product_id`, `quantity`) VALUES
(1, '1', NULL, '1', 2),
(59, NULL, 'frspa1n5n4nd6dpttkm3ffea15', '2', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `contacts` text NOT NULL,
  `description` text NOT NULL,
  `sum` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'checkOut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session`, `contacts`, `description`, `sum`, `status`) VALUES
(17, 'frspa1n5n4nd6dpttkm3ffea15', '', 'BLAZE LEGGINGS, количество: 4, цена: 100; ALEXA SWEATER, количество: 1, цена: 80; ', 480, ''),
(18, 'frspa1n5n4nd6dpttkm3ffea15', '', 'ALEXA SWEATER, количество: 1, цена: 80; ', 80, ''),
(19, 'frspa1n5n4nd6dpttkm3ffea15', '25', 'ALEXA SWEATER, количество: 2, цена: 80; ', 160, 'inProcess');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(100) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `img` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img`, `price`) VALUES
(1, 'BLAZE LEGGINGS', '', 'BLAZE_LEGGINGS.png', 100),
(2, 'ALEXA SWEATER', '', 'ALEXA_SWEATER.png', 80),
(3, 'AGNES TOP', '', 'AGNES_TOP.png', 75),
(4, 'SYLVA SWEATER', '', 'SYLVA_SWEATER.jpg', 120);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `admin`) VALUES
(1, 'admin', '$2y$10$EfTgfO/2oKhSTaZgJRSSiutQMKWb2yp2/ObHJorxl0cnQZLaA2Yue', 1),
(2, 'user', '$2y$10$/cXlINN1J.RdTzUwNQwd5OzZzLxzEy/TWCGLPNl8ZVmuzAxinJ4AS', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
