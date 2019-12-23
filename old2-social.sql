-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2019 lúc 09:37 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `social`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friendships`
--

CREATE TABLE `friendships` (
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `friendships`
--

INSERT INTO `friendships` (`userId1`, `userId2`) VALUES
(18, 17),
(18, 19),
(19, 17),
(19, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`userId1`, `userId2`, `title`) VALUES
(18, 17, 'Co nguoi da gui yeu cau ket ban!'),
(19, 17, 'Co nguoi da gui yeu cau ket ban!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `stt` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `displayName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imagePost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`stt`, `userId`, `displayName`, `content`, `createAt`, `imagePost`) VALUES
(8, 17, 'Bao Tran', 'temp', '2019-12-08 01:00:06', 'img/posts/2635827-annapurna-massif-4k-free-download-beautiful-wallpaper-for-desktop.jpg'),
(9, 17, 'Bao Tran', 'sample', '2019-12-08 01:00:06', 'img/posts/desert_cactus_sun_127193_2560x1440.jpg'),
(11, 17, 'Bao Tran', 'index', '2019-12-08 01:00:06', 'img/posts/fox_stone_fire_paper_figures_93387_1366x768.jpg'),
(12, 17, 'Bao Tran', 'post', '2019-12-08 01:00:06', 'img/posts/flowers_white_macro_127282_2560x1440.jpg'),
(13, 18, 'nguyenbao', '071219', '2019-12-07 00:00:00', 'img/posts/inscription_motivation_text_dark_background_119959_1366x768.jpg'),
(14, 19, 'Thuy Vy', 'rubik', '2019-12-08 00:59:31', 'img/posts/-b-2ic86j-j_2f7Ud018svc18xrs8pfxeklo_hp3of6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `displayName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ddmmyyyy` date NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `displayName`, `email`, `password`, `phone`, `ddmmyyyy`, `status`, `code`, `avatar`, `cover`) VALUES
(17, 'Bao Tran', 'tqbbao@gmail.com', '$2y$10$PMOUkb1dVPbt8hGeSzMweexhKeqT4bFJkimtF9.Guuvm1Ubtz/S0y', '0398107711', '1998-05-07', 1, '', 'img/avatars/-b-2ic86j-j_2f7Ud018svc18xrs8pfxeklo_hp3of6.jpg', 'img/header/anime-girl-car-drinking-coffee-co.jpg'),
(18, 'nguyenbao', 'n.c.baoooo@gmail.com', '$2y$10$PI5rmXwinP1Hlo4ul/ZX4uY0Wkns6h66TeJyVFkGh6YEjI8lGTKyS', '123456789', '1998-01-05', 1, '', 'img/avatars/25188427_891003521066010_907981000_n.jpg', 'img/header/none.jpg'),
(19, 'Thuy Vy', 'thuyvy@gmail.com', '$2y$10$OtHlLBgg6cVsrr9OcmsT9usRJIS6v7DSzGkk5v0dbH1VqGxgG10Ne', '123456789', '1998-10-22', 1, '', 'img/avatars/-b-2ic86j-j_2f7Ud018svc18xrs8pfxeklo_hp3of6.jpg', 'img/header/anime-girl-car-drinking-coffee-co.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`userId1`,`userId2`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`userId1`,`userId2`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
