-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 30 2020 г., 18:22
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zz_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nickname` varchar(256) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Datetime` datetime NOT NULL,
  `Message` varchar(256) NOT NULL,
  `Files` varchar(256) NOT NULL,
  `Filenames` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `Nickname`, `Title`, `Datetime`, `Message`, `Files`, `Filenames`) VALUES
(35, 'admin', 'test post1', '2020-04-30 18:08:21', 'test message 1', '', 'Без имени 1.odt;Снимок.PNG'),
(36, 'admin', 'test post 2', '2020-04-30 18:09:37', 'test message 2', '', 'IMG_7230.png;Без имени 1.odt;Снимок.PNG'),
(37, 'admin', 'test post 4', '2020-04-30 18:10:26', 'test message 4', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `Nickname` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Access` tinyint(1) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`Nickname`, `Password`, `Name`, `Email`, `Access`, `image`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Maxim Zubkov', 'qwerty@mail.ru', 1, 'profimg.jpg'),
('administratorq', 'efe6398127928f1b2e9ef3207fb82663', 'Максим Зубков', 'qweqwe@mail.ru', 0, NULL),
('maxim', '95ac3c545fa3f9c81939f8fa4d0511ca', 'maxim', 'maxim', 0, NULL),
('qwdwad', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'maxsnd', 'adwnajwd', 0, NULL),
('sadaas', '7815696ecbf1c96e6894b779456d330e', 'amsd', 'masdhuad', 0, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Nickname`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Nickname`) REFERENCES `profile` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
