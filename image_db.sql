-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 23 2019 г., 14:11
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `image_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_product` varchar(100) NOT NULL COMMENT 'id Продукта',
  `comment` varchar(500) NOT NULL COMMENT 'Комментарий к товару'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_product`, `comment`) VALUES
(2, '5648964798', 'Очень хороший автомобиль, классно рулится'),
(3, '11111111', 'Отличный желтый авто'),
(4, '899657', 'Классная тачка, жаль что красная'),
(6, '5648964798', 'Машина синяя уже хорошо!'),
(7, '1052', 'Кабриолет тачка для летних поездок'),
(8, '987963', 'Опять красная машина, неужели мало других расцветок машин'),
(9, '9879896', 'Крыша наверно из карбона'),
(10, '9633078', 'НАКОНЕЦ ТО ЦВЕТ ОТЛИЧНЫЙ ОТ КРАСНОГО'),
(11, '987963', 'Чёткая красная тачка'),
(12, '52616132', 'Света купи классную тачку'),
(14, '987552132', 'Камаро классная тачка'),
(15, '52616132', 'Белые полоски классные'),
(17, '899657', '     ');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL COMMENT 'id файла',
  `name` varchar(100) NOT NULL COMMENT 'имя файла',
  `url_img` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'адрес к файлу',
  `prise` int(20) NOT NULL COMMENT 'Цена товара',
  `currency` varchar(1) NOT NULL DEFAULT '$' COMMENT 'Знак валюты',
  `id_product` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'id товара',
  `desc_product` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Описание товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `url_img`, `prise`, `currency`, `id_product`, `desc_product`) VALUES
(36, 'Silver Stone', '01.jpg', 10000, '$', '10521', 'тачка огонь'),
(40, 'Ferrary 595', '03.jpg', 100050, '$', '987963', 'быстрая машина'),
(41, 'Ferrary Spider', '04.jpg', 150000, '$', '9879896', 'Мощная машина'),
(85, 'Ferrari 458 italia1', '950286_ferrari-458-italia_2560x1600_h.jpg', 250000, '$', '9633078', 'Белая Феррари'),
(97, 'Тачка синяя', 'R8-2.jpg', 234000, '$', '5648964798', 'тачка супер огонь супер'),
(112, 'Тачка желтая', 'tomswallpapers.com-65864.jpg', 222222, '$', '11111111', 'тачка супер огонь супер'),
(113, 'Хаммер', '237957-svetik_1440x900.jpg', 100000, '$', '966387', 'Внедорожник 4х4'),
(114, 'Corvet', '1004862_car-deluxe-viper-dodge-paper-wallpapers-cars-media-bikes_1920x1200_h.jpg', 20000, '$', '52616132', 'Крутая тачка'),
(115, 'Chevrolet', '674311_youwall-dodge-challenger-srt8-wallpapers-wallpaper-wallpapers_1920x1200_h.jpg', 60000, '$', '987552132', 'Chevrolet Camaro 2019'),
(117, 'Ferrary 258', '02.jpg', 150000, '$', '8799', 'Ferrary 258 Julieta'),
(152, 'Eurocopter EC135', 'heli1.jpg', 1000000, '$', 'EC135', 'Вместительный красный вертолёт'),
(153, 'EuroCopter EC235', 'heli2.jpg', 11000000, '$', 'EC235', 'Прекрасный вертолёт'),
(168, 'Вертолет heli3', 'heli3.jpg', 1500000, '$', '24345sdfsd', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_product` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url_img` varchar(250) NOT NULL,
  `prise` int(50) NOT NULL,
  `currency` varchar(2) NOT NULL DEFAULT '$',
  `count` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_users`, `id_product`, `name`, `url_img`, `prise`, `currency`, `count`, `id_order`) VALUES
(1, 35, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 1, 10),
(2, 35, '9633078', 'Ferrari 458 italia', '950286_ferrari-458-italia_2560x1600_h.jpg', 250000, '$', 1, 10),
(3, 35, '987963', 'Ferrary', '03.jpg', 115000, '$', 1, 10),
(7, 33, '5648964798', 'Тачка синяя', 'R8-2.jpg', 234000, '$', 1, 12),
(8, 33, '8799', 'Ferrary 258', '02.jpg', 150000, '$', 1, 12),
(9, 33, '52616132', 'Corvet', '1004862_car-deluxe-viper-dodge-paper-wallpapers-cars-media-bikes_1920x1200_h.jpg', 20000, '$', 1, 12),
(11, 34, '987963', 'Ferrary', '03.jpg', 115000, '$', 1, 14),
(12, 34, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 1, 14),
(14, 34, '5648964798', 'Тачка синяя', 'R8-2.jpg', 234000, '$', 1, 14),
(15, 35, '987963', 'Ferrary', '03.jpg', 115000, '$', 1, 15),
(16, 35, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 1, 15),
(17, 35, '9633078', 'Ferrari 458 italia', '950286_ferrari-458-italia_2560x1600_h.jpg', 250000, '$', 1, 15),
(20, 35, '987552132', 'Chevrolet', '674311_youwall-dodge-challenger-srt8-wallpapers-wallpaper-wallpapers_1920x1200_h.jpg', 60000, '$', 8, 16),
(22, 34, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 1, 17),
(23, 34, '9633078', 'Ferrari 458 italia', '950286_ferrari-458-italia_2560x1600_h.jpg', 250000, '$', 1, 17),
(24, 34, '987963', 'Ferrary', '03.jpg', 115000, '$', 1, 17),
(25, 34, '1052', 'Тачка 1', '01.jpg', 10000, '$', 1, 17),
(26, 34, '11111111', 'Тачка желтая', 'tomswallpapers.com-65864.jpg', 222222, '$', 2, 17),
(27, 39, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 1, 18),
(28, 39, '987963', 'Ferrary', '03.jpg', 115000, '$', 1, 18),
(29, 39, '11111111', 'Тачка желтая', 'tomswallpapers.com-65864.jpg', 222222, '$', 1, 18),
(31, 38, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 10, 20),
(48, 35, '966387', 'Хаммер', '237957-svetik_1440x900.jpg', 100000, '$', 1, 54),
(49, 35, '52616132', 'Corvet', '1004862_car-deluxe-viper-dodge-paper-wallpapers-cars-media-bikes_1920x1200_h.jpg', 20000, '$', 1, 54),
(50, 35, '987552132', 'Chevrolet', '674311_youwall-dodge-challenger-srt8-wallpapers-wallpaper-wallpapers_1920x1200_h.jpg', 60000, '$', 1, 54),
(56, 34, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 23, 56),
(58, 35, '987963', 'Ferrary 595', '03.jpg', 100050, '$', 2, 57),
(59, 35, '9879896', 'Ferrary Spider', '04.jpg', 150000, '$', 2, 57);

-- --------------------------------------------------------

--
-- Структура таблицы `useradress`
--

CREATE TABLE `useradress` (
  `id` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nameUser` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `telephone` varchar(64) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `adress` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `useradress`
--

INSERT INTO `useradress` (`id`, `id_user`, `nameUser`, `lastName`, `telephone`, `email`, `adress`, `status`) VALUES
(10, 35, 'Джон', 'Сноу', '8798798', 'uywetqyu@asdhj', 'dsefsdfew', 'Новый'),
(12, 33, 'Света', 'Сноу', '11111', 'snow@mail.com', 'Владивосток', 'Новый'),
(14, 34, 'Джон', 'Романов', '5555555', 'iyriqw@udqwwq', 'ываыввы', 'Новый'),
(15, 35, 'Эдуард', 'Эдуардович', '9999999', '9999999@rt.ru', 'Хабаровск ул. Монтажная д14', 'Новый'),
(16, 35, 'Дмитрий', 'Иванов Петров', '9898797', 'dmitryi@mr.ru', 'г.Вологда', 'В работе'),
(17, 34, 'Владимир', 'Петров', '000332211', '000332211@try.ru', 'Россия, г. Курск, ул Космонавтов д.7', 'Новый'),
(18, 39, 'Большой Босс', 'Большой Босс', '9999999', '9999999@rt.ru', 'Планета марс ', 'Новый'),
(20, 38, 'Евгений', 'Лисовский', '99999999', '99999999@try.ru', 'г.Ростов на Дону , ул.Ленина д.190', 'Обработан'),
(54, 35, 'Виталий', 'Владимир', '999999', 'vlad@ranmb.ru', 'Владивосток', 'Оплачен'),
(56, 34, 'Дмитрий', 'Юрьев', '80880000', 'yandex@ya.ru', 'г.Москва', 'Оплачен'),
(57, 35, 'Евгений', 'Евгений', '33325435643', 'iyriqw@udqwwq.ru', 'Москва', 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '0',
  `login` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `login`, `pass`) VALUES
(33, 'Administrator', 1, 'admin', '$2y$10$3CTO/24yYpri6T97t91aMOlqsQ2faoF8qQEaINXbkTH/WltE0c7K6'),
(34, 'user', 0, 'user', '$2y$10$3BjmFOs4LeNYzDZ2.1vFEeInjl4pv4p2N5JJCrWi/CYTL5HMCylYK'),
(35, 'roman', 0, 'roman', '$2y$10$a0TRW4cZ5fKuH6.kbJYR..HwVzViBf4OP1pP71TxOKYILV8kls0.W'),
(36, 'triuy', 0, 'iuyer', '$2y$10$reSSswh5.BgPjo6DGnf5Quf7PFEtwKOD4jEE2rgJJKv0s7xNo/7sy'),
(37, 'Super boss', 0, 'oireoir', '$2y$10$cau1PFsvWRuklUPJTw0zCecfXdaWbgsG6PbuX3PlDzb6Npe64girK'),
(38, 'ruslan', 0, 'ruslan', '$2y$10$.P0JlD.VP7ubqd8ctatrceWgYs2ovpaUAMN4rYLnYktp1czqPRzM.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment` (`comment`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `useradress`
--
ALTER TABLE `useradress`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id файла', AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `useradress`
--
ALTER TABLE `useradress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
