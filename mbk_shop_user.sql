-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 06 2018 г., 11:47
-- Версия сервера: 5.6.38-log
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mbk_shop_user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `captiopn` varchar(255) NOT NULL,
  `price` varchar(75) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `lots`
--

CREATE TABLE `lots` (
  `lot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lots`
--

INSERT INTO `lots` (`lot_id`, `user_id`, `title`, `about`, `price`, `image`) VALUES
(1, 1, 'Айфон 5с', 'Крутой телефон', 2000, 'no_image.jpg'),
(2, 1, 'IPhone XS Max 256 GB Silver', 'aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>aaaaaanj jk gvj cyi ctyiv ciu vuo<?=$this->path?>', 14000, 'no_image.jpg'),
(3, 2, 'JJBasdkjasdl', 'anbjsdmmzvz;lsdlal;', 12111, 'no_image.jpg'),
(4, 1, 'Samsung J7 (2018)', 'Лучший телефон на рынке телефонав', 10999, 'no_image.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`) VALUES
(13, 'Maxim', 'emaxim.news@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '380636015336'),
(14, 'Kostya Karaman', 'kostya.karaman4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '+555522145');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `surname`) VALUES
(1, 'emaxim.news@gmail.com', '926d61bbf37d585b3db5354f90288b69', 'Maxim', 'Shibkov'),
(2, 'demo@admin.ru', '926d61bbf37d585b3db5354f90288b69', 'Demo', 'User');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`lot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT для таблицы `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lots`
--
ALTER TABLE `lots`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `users_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
