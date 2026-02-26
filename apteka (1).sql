-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2026 г., 15:01
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apteka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id_articles` int NOT NULL,
  `articles_name` varchar(255) NOT NULL,
  `image` varchar(256) NOT NULL,
  `articles_description` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_articles`, `articles_name`, `image`, `articles_description`, `created_at`) VALUES
(2, '5 Способов защиты питомцев от клещей', 'assets/img/nFiNijrjhgKJBrjQnxaWQvF1xD0xyjelJXewLUj1.webp', 'С приходом весны владельцам домашних животных приходится беспокоиться о защите питомцев от укусов насекомых. Иксодовые клещи опасны не только для собак и кошек, но для хозяев, поскольку переносят тяжелые заболевания: пироплазмоз, боррелиоз (болезнь Лайма), эрлихиоз, анаплазмоз и энцефалит. Поэтому в период особой активности с ранней весны до поздней осени важно своевременно позаботиться о защите домашних животных от клещей.', '2026-02-25'),
(3, 'Для чего организму цинк: рассказываем о пользе и влиянии на здоровье', 'assets/img/WD5A3cM8tKPpe9RC6gvOZiGS9mUjglrAbW2mx3v8.webp', 'Какой микроэлемент можно назвать секретным агентом иммунитета? Знаменитый диетолог Майкл Мюррей считает, что это цинк. Минерал укрепляет здоровье и влияет на внешность. А его дефицит может грозить не только риском длительных простуд, но и трудностями в выполнении привычных действий на работе, проблемами с кожей и другими неприятностями.', '2026-02-25'),
(4, 'Мы продолжаем работать для вас', 'assets/img/jv78fLV8OqoKfbDzTp7cozRzeE6DGjsCzEyjGdeZ.webp', 'Коронавирусная инфекция в России набирает обороты. Новый штамм многие переносят легче, чем первые варианты вируса, но лекарства и товары для здоровья по-прежнему нужны каждому, кто заразился. И, конечно, коронавирус не отменил другие ситуации, в которых людям нужна помощь: спрос в аптеках на товары, не связанные с инфекцией, остаётся прежним.', '2026-02-25'),
(5, 'Как распознать корь до появления сыпи?', 'assets/img/LzWAa9u3MeZ7CzEEI1IzGLINObp7ovDQSjwhbCWE.webp', 'Корь — одна из самых заразных вирусных инфекций. Она передаётся воздушно-капельным путём, и почти все невакцинированные заражаются при контакте с больным. Часто инфекцию начинают подозревать по характерной сыпи, высокой температуре, кашлю и насморку. Как пишет «Российская газета», американские учёные напомнили о не самом очевидном признаке, который может проявляться раньше классических симптомов.', '2026-02-25');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `count_basket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Противоаллергические'),
(2, 'Профилактика аллергии'),
(3, 'Аллергены (проведение АСИТ)'),
(4, 'Аминокислоты'),
(5, 'Витамин Д'),
(6, 'Витамин С'),
(7, 'Боль в горле'),
(8, 'Кашель'),
(9, 'Насморк'),
(10, 'ВИЧ'),
(11, 'Гепатиты'),
(12, 'Герпес, ЦМВ, ВПЧ');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id_order` int NOT NULL,
  `id_status` int NOT NULL,
  `id_user` int NOT NULL,
  `order_sum` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `id_status`, `id_user`, `order_sum`, `created_at`, `update_at`) VALUES
(3, 1, 2, '480', '2026-02-25 14:59:20', '2026-02-25 14:59:20'),
(4, 2, 2, '3895', '2026-02-25 15:18:46', '2026-02-25 15:18:46');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id_order_product` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int NOT NULL,
  `id_category` int NOT NULL,
  `image` varchar(256) NOT NULL,
  `product_active_substance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_expiration_date` varchar(255) NOT NULL,
  `product_producer` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `image`, `product_active_substance`, `product_expiration_date`, `product_producer`, `product_name`, `product_description`, `price`) VALUES
(4, 1, 'assets/img/WcOY0UFnO1OF213efCApaCXb3QA3U9zcGvk9PBiM.jpg', 'Хлоропирамин', 'Длинный срок', 'ЭГИС, Венгрия', 'Супрастин', 'Супрастин. При внезапной аллергии. Для детей с 3-х лет и взрослых.  Классический антигистаминный препарат; Начало действия через 15?30 минут*; Качество, проверенное временем.  *Инструкция по медицинскому применению препарата Супрастин  Белые, или серовато-белые таблетки в виде диска с фаской, с гравировкой “SUPRASTIN” на одной стороне таблетки и риской на другой стороне, без или почти без запаха.', 160),
(5, 2, 'assets/img/I1edKyGUTqdXqS0OMAjaNpYwq6BXHoqO0OSe6a7l.webp', 'эктоин', 'Длинный срок', 'ЯДРАН-ГАЛЕНСКИ ЛАБОРАТОРИЙ а.о., Хорватия', 'Аква Марис Эктоин спрей назальный', 'Спрей назальный Аква Марис® Эктоин содержит комбинацию эктоина и изотонического раствора морской соли. Эктоин является компонентом, который в природных условиях вырабатывают галофильные микроорганизмы, способные существовать в чрезвычайно неблагоприятных условиях внешней среды.  Благодаря высокой гидрофильности (сродство к молекулам воды), эктоин образует с ними прочные кластеры, формируя неощутимый защитный «эктоин гидрокомплекс» на поверхности слизистой оболочки носа.  Данный комплекс препятствует контакту аллергенов с клетками слизистой оболочки носа, защищая от возникновения аллергической реакции и снижая выраженность проявлений аллергического ринита.  При этом аллергены фиксируются на поверхности гидрокомплекса и могут быть эффективно удалены из полости носа при промывании или высмаркивании.  Раствор натуральной морской соли, входящий в состав Аква Марис® Эктоин, способствует механическому удалению аллергенов с поверхности слизистой оболочки носа и очищает ее поверхность от осевшей уличной и домашней пыли.  Микроэлементы и минералы морской соли улучшают функцию мерцательного эпителия, оказывают противовоспалительное и восстановительное действие на слизистую оболочку полости носа.  Изотонический раствор натуральной морской соли способствует механическому удалению с поверхности слизистой носа аллергенов, очищает поверхность слизистой от осевшей на ней уличной и домашней пыли.  Микроэлементы и минералы натуральной морской соли улучшают функцию мерцательного эпителия, оказывают противовоспалительное и восстановительное действия на слизистую оболочку полости носа.', 606),
(6, 3, 'assets/img/7T5uLJ1RyJrbLyLFwIfTsUb4OaFknepziEVyqYQp.jpg', 'аллергены трав пыльцевые', 'Длинный срок', 'СТАЛЛЕРЖЕН АО', 'Оралейр таб подъязычные 100 ИР+300 ИР', 'Круглые двояковыпуклые таблетки от белого до бежевого цвета с возможными вкраплениями от светло-коричневого до темно-коричневого цвета с гравировкой 100 на каждой стороне для таблетки с активностью 100 ИР и гравировкой 300 на каждой стороне для таблетки с активностью 300 ИР.', 6625),
(7, 4, 'assets/img/jfm4vm4coLhJ5K3eFmuO8BaEF8GOOX3ZkOwfzKUi.webp', 'Эвалар', 'Длинный срок', 'Эвалар ЗАО, Россия', 'Глицин Форте Эвалар', 'В норме у человека преобладает влияние парасимпатической нервной системы (спокойствие), а при длительной нервной нагрузке баланс нарушается и более активной становится симпатическая нервная система (активность). В результате повышенная активность, которая необходима человеку для решения конкретных задач, становится преобладающим состоянием перевозбуждения, которым сложно управлять. При этом снижается концентрация внимания, появляется чувство беспокойства, все труднее найти выход из сложной ситуации. Умственное напряжение, невозможность уснуть, расслабиться приводят к истощению нервной системы. С проблемой такого уровня сложно справиться самому. Во всем мире для решения этих проблем широко используется глицин – как нелекарственное средство, способствующее уменьшению стресса и умственного перенапряжения, причем в значительных количествах.', 182),
(8, 5, 'assets/img/FFwqDwWwNu4pAV1t9FYHzKRQFhJ5Ylw0oCS98wEH.webp', 'Холекальциферол', 'Длинный срок', 'Master Pharm S.A., Польша', 'Детримакс Актив/Detrimax Active масляный раствор', 'Прием витамина D3 способствует снижению заболеваемости ОРВИ, в том числе новой коронавирусной инфекции COVID-192. Доказано, что в странах, где у пациентов с COVID-19 более высокое содержание в организме витамина D3 риск осложнений значительно ниже3. Витамин D3 повышает защитные силы организма, снижает уровень «цитокинового шторма» (гипервоспаления), поддерживает функцию легких.', 765),
(9, 6, 'assets/img/dCkEb0VYP3wp5yoGhId8RGKe9BqLQW8fV7Wp0bg0.jpg', 'аскорбиновая кислота', 'Длинный срок', 'Maya Food Industries M.T.M. Ltd, Израиль', 'Bonbonc Витамин С со вкусом апельсина пастилки для детей с 3', 'Витамин С способствует повышению защитных сил организма, поддержанию иммунной системы, в том числе в сезон простуд, снижению риска развития простудных заболеваний.', 779),
(10, 7, 'assets/img/BwAWg6XbUbUnNGal3SRNCcVQsnyBmw788NPMsN5U.jpg', 'бензалкония хлорид+бензокаин+тиротрицин', 'Длинный срок', 'БИННОФАРМ ГРУПП', 'Лоротрицин-АЛИУМ таб для рассасывания', 'Круглые двояковыпуклые таблетки белого или почти белого цвета, с мятным запахом.', 431),
(11, 8, 'assets/img/wVKwI8UiQiMToDpngxu7F0hxvVYV5IiLOqVXZPMj.jpg', 'ацетилцистеин', 'Длинный срок', 'САНДОЗ', 'АЦЦ Лонг таб шипучие 600 мг', 'Круглые плоскоцилиндрические таблетки белого цвета, с фаской и риской на одной стороне, с запахом ежевики. Возможно наличие слабого серного запаха. Восстановленный раствор: бесцветный прозрачный раствор с запахом ежевики, возможно наличие слабого серного запаха.', 455),
(12, 9, 'assets/img/HF6uSpBNfrht3RiYxT5B7fm9MiLqq4EGmp1bJfs9.jpg', 'ипратропия бромид+ксилометазолин', 'Длинный срок', 'Снуп', 'Снуп Экстра спрей назальный 10 мл', 'Прозрачная бесцветная или слегка окрашенная жидкость', 251),
(14, 10, 'assets/img/YuN2poYftP5hviWLEIUJxzDs4ZC6iPOti2v3pttp.jpg', 'тенофовир', 'Длинный срок', 'Макиз-Фарма, Россия', 'Теноф 300 таб п/об пленочной', 'Внешний вид товара может отличаться от изображённого на фотографии. Имеются противопоказания. Необходимо ознакомиться с инструкцией или проконсультироваться со специалистом', 480),
(15, 11, 'assets/img/iRoxpjH8df0l8M8piNGikRx3yntCESQpdmwSaNf7.jpg', 'рибавирин', 'Длинный срок', 'ПРАНАФАРМ', 'Рибавирин', 'Круглые, плоскоцилиндрические таблетки белого или белого с желтоватым оттенком цвета, с фаской и риской.', 211),
(16, 12, 'assets/img/NdNJFwNig7eUIgN65ax6q8yVDSCXvPgNd4iSpp8H.jpg', 'валацикловир', 'Длинный срок', 'ВЕЛФАРМ', 'Валацикловир Велфарм', 'Овальные двояковыпуклые таблетки, покрытые пленочной оболочкой, белого или почти белого цвета. На поперечном разрезе внутренний слой белого или почти белого цвета.', 2202);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `status_name`) VALUES
(1, 'принят'),
(2, 'в работе'),
(3, 'доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `id_role` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `name`, `surname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 1, 'Максим', 'Пономарев', 'maksponom07@mail.ru', '$2y$12$k4LmlmXU1magZNdPadkawue2Tx5eTK0Oga.jcViyx1rrjibrzDRYq', '2026-02-16 16:16:52', '2026-02-16 16:16:52'),
(7, 2, 'admin', 'admin', 'admin@mail.ru', '$2y$12$ADT8SUQhlhiQGTwYcJfbkOPnx.WimCHaZx8N4yv6UDvLO4AHt2T6W', '2026-02-24 14:09:24', '2026-02-24 14:09:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_status` (`id_status`) USING BTREE;

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order_product`),
  ADD UNIQUE KEY `id_order` (`id_order`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`) USING BTREE;

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id_order_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
