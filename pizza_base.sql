-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2023 г., 00:08
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `code`) VALUES
(1, '/images/banner1.jpg'),
(2, '/images/banner2.jpg'),
(3, '/images/banner3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `discount`
--

CREATE TABLE `discount` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `discount_avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `discount`
--

INSERT INTO `discount` (`id`, `title`, `price`, `discount_avatar`) VALUES
(1, 'Курица-гриль', 250, '/images/pizza2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name_user`, `message`) VALUES
(1, 'Александр', 'Привет это тест'),
(30, 'Александр', 'АлександрАлександрАлександрАлександрАлександр');

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `pizza_avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `title`, `price`, `pizza_avatar`) VALUES
(1, 'Мексика', 395, '/images/pizza1.png'),
(2, 'Курица-гриль', 450, '/images/pizza2.png'),
(3, 'Сырная', 290, '/images/pizza3.png'),
(4, 'Грибная', 395, '/images/pizza4.png'),
(5, 'Гавайская', 450, '/images/pizza1.png'),
(6, 'Ветчина и грибы', 290, '/images/pizza2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `potable`
--

CREATE TABLE `potable` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `potable_avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `potable`
--

INSERT INTO `potable` (`id`, `title`, `price`, `potable_avatar`) VALUES
(1, 'Кола', 90, '/images/cola.png'),
(2, 'Эвервесс Лемон-лайм', 75, '/images/evervess1.png'),
(3, 'Эвервесс Апельсин', 75, '/images/evervess2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `pizza_avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `pizza_avatar`) VALUES
(135, 'Мексика', 395, '/images/pizza1.png'),
(134, 'Мексика', 395, '/images/pizza1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `sauce`
--

CREATE TABLE `sauce` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `sauce_avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `sauce`
--

INSERT INTO `sauce` (`id`, `title`, `price`, `sauce_avatar`) VALUES
(1, 'Баффало соус', 50, '/images/sauce1.png'),
(2, 'Для пицца корочек', 50, '/images/sauce2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_ip` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_ip`) VALUES
(23, 'test@mail.ru', '14e1b600b1fd579f47433b88e8d85291', 0),
(24, 'alen@mail.ru', '14e1b600b1fd579f47433b88e8d85291', 0),
(25, 'jackman23@yandex.ru', '1fd3fac2c7525ee0c535253d1fa861e4', 0),
(26, 'jackman234@yandex.ru', '14e1b600b1fd579f47433b88e8d85291', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `potable`
--
ALTER TABLE `potable`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sauce`
--
ALTER TABLE `sauce`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `potable`
--
ALTER TABLE `potable`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT для таблицы `sauce`
--
ALTER TABLE `sauce`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
