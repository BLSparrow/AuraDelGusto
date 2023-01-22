-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2022 г., 22:58
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_aura`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `prepayment` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `table_id`, `dateStart`, `dateEnd`, `prepayment`) VALUES
(1, 1, 1, '2022-06-06 23:08:33', '2022-06-07 03:50:01', '5.50');

-- --------------------------------------------------------

--
-- Структура таблицы `category_ingredients`
--

CREATE TABLE `category_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_ingredients`
--

INSERT INTO `category_ingredients` (`id`, `name`) VALUES
(1, 'Тесто'),
(2, 'Зелень'),
(3, 'Овощи-крупы'),
(4, 'Сыромолочная продукция'),
(5, 'Грибы'),
(6, 'Мясные изделия'),
(7, 'Вина'),
(8, 'Соуса'),
(9, 'Фрукты-ягоды'),
(10, 'Паста'),
(11, 'Морепродукты'),
(12, 'Остальное');

-- --------------------------------------------------------

--
-- Структура таблицы `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_products`
--

INSERT INTO `category_products` (`id`, `name`, `description`, `image`) VALUES
(1, 'Пицца', 'Традиционное итальянское блюдо в виде тонкой круглой лепёшки (пирога).', 'pizza.jpg'),
(2, 'Паста', 'Италия и паста — это практически синонимы.', 'pasts.jpg'),
(3, 'Салаты', 'Салаты, они и в Африке - салаты', 'salads.jpg'),
(4, 'Супы', 'Супы иногда подают в качестве примо, или первого блюда итальянской кухни', 'soups.jpg'),
(5, 'Десерты', 'Десерты, когда-то рожденные в Италии, уже стали традиционным лакомством во многих странах.', 'sweets.jpg'),
(6, 'Напитки', 'В Италии найдется превосходный вариант для всех случаев жизни.', 'drinks.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `cooks`
--

CREATE TABLE `cooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cooks`
--

INSERT INTO `cooks` (`id`, `name`, `image`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Франческо Баритоно', 'chefs/chefs-1.jpg', 'Шеф-повар', NULL, NULL),
(2, 'Лаура Арутинян', 'chefs/chefs-2.jpg', 'Кондитер', NULL, NULL),
(3, 'Антон Пан', 'chefs/chefs-3.jpg', 'Повар', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kcal` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `kcal`, `price`, `category_id`) VALUES
(1, 'дрожжевое тесто', 292, '77.00', 1),
(2, 'базилик зелёный', 27, '395.00', 2),
(3, 'масло оливковое', 898, '555.00', 8),
(4, 'соус томатный', 134, '640.00', 8),
(5, 'помидоры', 18, '200.00', 3),
(6, 'сыр Моцарелла', 242, '504.00', 4),
(7, 'сладкий перец', 31, '370.00', 3),
(8, 'оливки', 115, '480.00', 3),
(9, 'анчоусы', 131, '800.00', 11),
(10, 'шампиньоны', 27, '272.00', 5),
(11, 'куриное филе', 110, '460.00', 6),
(12, 'сыр Пармезан', 392, '900.00', 4),
(13, 'спагетти', 344, '216.00', 10),
(14, 'бекон', 393, '620.00', 6),
(15, 'яичный желток', 352, '390.00', 12),
(16, 'свинина', 259, '259.00', 6),
(17, 'говядина', 187, '570.00', 6),
(18, 'сельдерей', 14, '599.00', 2),
(19, 'красное вино', 250, '655.00', 7),
(20, 'белое вино', 150, '646.00', 7),
(21, 'лингвини', 157, '250.00', 10),
(22, 'креветки', 95, '451.00', 11),
(23, 'кальмар', 100, '528.00', 11),
(24, 'морской гребешок', 92, '839.00', 11),
(25, 'баклажаны', 24, '450.00', 3),
(26, 'фасоль', 14, '440.00', 3),
(27, 'картофель', 77, '285.00', 3),
(28, 'Панчетта', 460, '1010.00', 6),
(29, 'огурцы', 15, '214.00', 3),
(30, 'мороженное', 207, '406.00', 4),
(31, 'сливки', 206, '500.00', 4),
(32, 'кофе', 1, '750.00', 12),
(33, 'желатин', 355, '1200.00', 12),
(34, 'клубника', 41, '470.00', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient_menu`
--

CREATE TABLE `ingredient_menu` (
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredient_menu`
--

INSERT INTO `ingredient_menu` (`ingredient_id`, `menu_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(6, 2),
(8, 2),
(9, 2),
(1, 3),
(3, 3),
(4, 3),
(6, 3),
(7, 3),
(8, 3),
(10, 3),
(11, 3),
(2, 4),
(3, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(4, 5),
(12, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(21, 5),
(3, 6),
(5, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(12, 7),
(2, 8),
(3, 8),
(5, 8),
(6, 8),
(2, 9),
(5, 9),
(18, 9),
(20, 9),
(21, 9),
(26, 9),
(27, 9),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(2, 11),
(3, 11),
(18, 11),
(29, 11),
(31, 12),
(33, 12),
(34, 12),
(30, 13),
(32, 13),
(32, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `kilocalories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `image`, `category_id`, `weight`, `price`, `kilocalories`) VALUES
(1, 'Маргарита', 'Самая простая и, пожалуй, самая главная. Настоящая королева пицц - \"Маргарита\".', 'margarita.jpg', 1, 420, '425.00', 1384),
(2, 'Неаполитанская', 'Неаполитанская пицца — небольшая, пышная, с высокими бортами. В Неаполе её едят складывая пополам или даже вчетверо.', 'neopolitan.jpg', 1, 490, '390.00', 1220),
(3, 'Кальцоне', 'Это закрытая пицца. Ее загибают поперек и защипывают по краям, похожа на большой чебурек.', 'calzone.jpg', 1, 320, '455.00', 1260),
(4, 'Карбонара', 'Самая популярная итальянская паста в мире.', 'karbonara.jpg', 2, 290, '320.00', 500),
(5, 'Болоньезе', 'Изысканое сочетание макаронных изделий с соусом Болоньезе.', 'balonez.jpg', 2, 280, '370.00', 560),
(6, 'Лингвини с морепродуктами', 'Паста для любителей морепродуктов', 'lingvini.jpg', 2, 280, '410.00', 380),
(7, 'Пармеджано', 'Салат из печёного баклажана с Прованскими травами', 'baklazani_parmedzhano.jpg', 3, 150, '335.00', 220),
(8, 'Капрезе', 'Томатный взрыв, украшенный моцареллой', 'kapreze.jpg', 3, 120, '310.00', 172),
(9, 'Минестроне', 'Минестроне – не просто суп. Это символ итальянских принципов питания.', 'minestrone.jpg', 4, 235, '250.00', 233),
(10, 'Томатный гаспачо', 'Лёгкий овощной суп - прекрасная альтернатива окрошке.', 'tomat_gaspacho.jpg', 4, 230, '220.00', 205),
(11, 'Огуречный гаспачо', 'Лёгкий овощной суп - прекрасная альтернатива окрошке.', 'cucumber_gaspacho.jpg', 4, 230, '220.00', 205),
(12, 'Панна котта', 'Североитальянский десерт из сливок, сахара, желатина и ванили.', 'panacota.jpg', 5, 110, '200.00', 180),
(13, 'Аффогато', 'Десерт на основе кофе.', 'afogato.jpg', 5, 162, '235.00', 240),
(14, 'Капучино', 'Кофейный напиток, который традиционно готовят с двойным эспрессо, молоком и пеной.', 'kapuchino.jpeg', 6, 120, '90.00', 45),
(15, 'Чинотто', 'Итальянский ответ американской кока-коле', 'chinotto.jpg', 6, 330, '180.00', 143);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_02_28_140736_create_category_products_table', 1),
(4, '2022_02_28_141310_category_ingredients', 1),
(5, '2022_02_28_141311_create_menus_table', 1),
(6, '2022_02_28_141312_create_ingredients_table', 1),
(7, '2022_02_28_141606_create_roles_table', 1),
(8, '2022_02_28_141607_create_staff_table', 1),
(9, '2022_02_28_141827_create_tables_table', 1),
(10, '2022_02_28_150259_create_bookings_table', 1),
(11, '2022_04_20_081700_create_baskets_table', 1),
(12, '2022_04_20_081701_create_statuses_table', 1),
(13, '2022_04_20_081800_create_orders_table', 1),
(14, '2022_04_20_083342_create_order_items_table', 1),
(15, '2022_06_08_073813_create_cooks_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Админ'),
(2, 'Менеджер');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `login`, `email`, `password`, `role_id`) VALUES
(1, 'Test', 'test@mail.ru', '$2y$10$Dr5mSe8ABLKsEfRQ1KQGOO8vFv7ADUjzdRjVjLA7xWrbicE4/aoXO', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Новый'),
(2, 'Подтверждён'),
(3, 'Отменён');

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `number`, `image`, `quantity`) VALUES
(1, 1, 'table_for_2.jpg', 2),
(2, 2, 'table_for_2_2.jpg', 2),
(3, 3, 'table_for_4.jpg', 4),
(4, 4, 'table_for_4_2.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `tel`, `email`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deangelo', NULL, 'jailyn.pouros@hotmail.com', 'E#Xxx7XT)s,g-I', NULL, NULL, '2022-06-13 16:49:29', '2022-06-13 16:49:29'),
(2, 'Audrey', NULL, 'nsmith@hoeger.com', '=@^~4{Hhp11<:YH\"nK&', NULL, NULL, '2022-06-13 16:49:29', '2022-06-13 16:49:29'),
(3, 'Roberta', NULL, 'bettie.marks@yahoo.com', 'mgu(@\\u?\\', NULL, NULL, '2022-06-13 16:49:29', '2022-06-13 16:49:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baskets_user_id_foreign` (`user_id`),
  ADD KEY `baskets_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_table_id_foreign` (`table_id`);

--
-- Индексы таблицы `category_ingredients`
--
ALTER TABLE `category_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cooks`
--
ALTER TABLE `cooks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `ingredient_menu`
--
ALTER TABLE `ingredient_menu`
  ADD PRIMARY KEY (`ingredient_id`,`menu_id`),
  ADD KEY `ingredient_menu_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`),
  ADD KEY `staff_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category_ingredients`
--
ALTER TABLE `category_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `cooks`
--
ALTER TABLE `cooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baskets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingredient_menu`
--
ALTER TABLE `ingredient_menu`
  ADD CONSTRAINT `ingredient_menu_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredient_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
