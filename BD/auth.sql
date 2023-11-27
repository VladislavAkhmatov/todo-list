-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 27 2023 г., 07:01
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auth`
--

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `system_name` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `system_name`, `name`) VALUES
(1, 'admin', 'Администратор'),
(2, 'user', 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role_id` int DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `lastname`, `name`, `role_id`, `login`, `password`) VALUES
(17, 'test', 'test', 2, 'local@local.ru', '$2y$10$kxyRZN72hqNswW/6g4rUTO/0NsdeXodkFoJ8XeZ52c6lVuBn6UAyW'),
(19, 'asdsad', 'sadsad', 2, 'asds@mail.ru', '$2y$10$yBw5mjYNoP2mb8b4utNnvuNnG734GMIi0cxNUL5rnUgTqlgzRcH7e'),
(20, 'asdsa', 'dsadas', 2, 'dsad@local.kz', '$2y$10$WEYKNPJDaZYZCd1JnIwHfeN7sDWDh7V.BW9cjjhUJwYSUU3bJKDeW'),
(26, 'asdsa', 'dsad', 2, 'sadsadasd@mail.ru', '$2y$10$.M5ehEbcr40ianMar5D1u.RynKFi8/b0dA94tKy1wnY1KxZ3gmVnW'),
(27, 'asdsa', 'dasdsad', 2, 'sadsad@mail.ru', '$2y$10$.AE6YLIdXIGr1yTjlKVnBuaXdBRQMQsdBy4mWqb2Adli2eRxWu03.'),
(30, 'test', 'test', 2, 'test@test.com', '$2y$10$.M5ehEbcr40ianMar5D1u.RynKFi8/b0dA94tKy1wnY1KxZ3gmVnW'),
(31, 'Бондарчик', 'Николай', 2, 'test123@mail.ru', '$2y$10$iKvjZJ6wbA99XuUpw5fU6.eEu670UA1nRXEUcstDyWk4VWq/f6lkK'),
(35, '123', '123', 2, '123@local.re', '$2y$10$LjPWTl0GnNFKd2aFpfEc9eoZEuxtXmLooOb06Lom.z0spRSAtnd9O'),
(36, 'Ахматов', 'Владислав', 1, 'akhmatov.vladislav@mail.ru', '$2y$10$pDdXwKw/Gg9pZ6Flq5qeJO/1HGswDiuNySjAws4WnKDA5Hmjf3Syu'),
(37, 'testGet', 'testGet', 2, 'testGet@local.re', '$2y$10$6xkcxClhJSIv.p9fuUm4dee01BrncA.iIyHXw3voASs.fwU7F7Ucq'),
(38, 'asdsadsa', 'asdsadsad', 2, 'sadsa@local.re', '$2y$10$M3A/qSPE6Okje6h3XbR/VO.CWmfsFtPq2ZUcHHKOeU/UqC2DW5CzC'),
(39, 'testtest', 'testtest', 2, 'testtest@local.re', '$2y$10$5rWAxgPV8hXbmliqFkvHS.oY7bUqEjhC08DycyYjl8gmmOufskT4W'),
(40, 'asdsadsad', 'sadsadsadsa', 2, 'dsadas@local.re', '$2y$10$CYxaesgkdJJJslq8904yAeqXReLelgGLQK53rJA4Dg7l2ho7CWYKi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
