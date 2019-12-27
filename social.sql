-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2019 lúc 02:38 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

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
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `stt` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`stt`, `postId`, `userId`, `content`, `createAt`) VALUES
(1, 13, 17, 'comment here', '2019-12-14 00:52:55'),
(2, 13, 17, 'comment here 1', '2019-12-14 00:53:12'),
(3, 13, 19, 'sdasdasda', '2019-12-14 02:52:44'),
(4, 13, 17, 'a', '2019-12-15 15:39:07'),
(5, 13, 17, 'b', '2019-12-15 15:39:12'),
(6, 13, 17, 'd', '2019-12-15 15:39:17'),
(7, 13, 17, 'a', '2019-12-15 15:46:10'),
(8, 13, 17, 'a', '2019-12-15 15:46:13'),
(9, 13, 17, 'a', '2019-12-15 15:46:51'),
(10, 13, 17, 'dsadad', '2019-12-15 15:46:55'),
(11, 13, 17, 'new', '2019-12-15 16:03:46'),
(12, 13, 17, 'new1', '2019-12-15 16:04:41'),
(13, 13, 17, 'fly me to the moon fly me to the moon fly me to the moon fly me to the moon fly me to the moon ', '2019-12-15 16:07:06'),
(14, 13, 17, 'fly me to the moon fly me to the moon fly me to the moon fly me to the moon fly me to the moon v v v', '2019-12-15 16:07:19'),
(15, 13, 17, ' convert convert convertconvert convert convert convertconvertconvertconvert convert convert convert', '2019-12-15 16:10:39'),
(16, 13, 19, 'nweadas', '2019-12-15 16:19:03'),
(17, 14, 17, 'hello', '2019-12-16 00:05:48'),
(18, 14, 17, 'its me', '2019-12-16 00:06:01'),
(19, 21, 17, 'hello', '2019-12-16 00:44:09'),
(20, 19, 17, 'asdad', '2019-12-16 00:58:12'),
(21, 21, 17, 'hi', '2019-12-16 12:50:27'),
(22, 22, 17, 'hi', '2019-12-16 12:51:36'),
(23, 22, 17, 'hello', '2019-12-16 14:38:25'),
(24, 22, 17, 'hi hi hi', '2019-12-16 15:07:09'),
(25, 21, 17, '1712', '2019-12-17 12:18:40'),
(26, 20, 17, 'hello', '2019-12-18 13:15:15'),
(28, 20, 17, 'sakjhfskajfs', '2019-12-18 13:19:00'),
(29, 20, 17, 'jdhaskjdsahjkdh', '2019-12-18 14:12:08'),
(30, 20, 17, 'aaaaa', '2019-12-18 14:18:55'),
(31, 20, 17, 'fddb', '2019-12-18 14:19:15'),
(32, 20, 17, 'sound', '2019-12-18 14:21:16'),
(33, 19, 18, 'fsdfsdfd', '2019-12-19 13:25:29'),
(34, 20, 17, 'new sound', '2019-12-19 13:29:32'),
(35, 19, 18, 'dasdsadsasadassda', '2019-12-19 13:31:01'),
(36, 19, 18, 'asdasdsa', '2019-12-19 13:31:10'),
(37, 20, 17, 'asASas', '2019-12-19 13:33:04'),
(38, 19, 18, 'gfgdhfjghj', '2019-12-19 13:43:32'),
(39, 19, 18, 'hgfgjhk', '2019-12-19 13:43:40'),
(40, 21, 17, '1', '2019-12-20 15:01:25'),
(41, 21, 17, '2', '2019-12-20 15:01:28'),
(42, 21, 17, '3', '2019-12-20 15:01:31'),
(43, 0, 17, 's', '2019-12-20 15:14:35'),
(44, 21, 17, 's', '2019-12-20 15:15:33'),
(45, 0, 17, 'a', '2019-12-20 15:15:41'),
(46, 20, 17, 'new1', '2019-12-23 12:35:44'),
(47, 0, 17, 'new2', '2019-12-23 12:36:18'),
(48, 20, 17, 'new2', '2019-12-23 12:40:44'),
(49, 21, 18, 'new11', '2019-12-23 13:10:29'),
(50, 14, 17, 'hello', '2019-12-23 13:13:54'),
(51, 14, 17, 'hihi', '2019-12-23 13:14:03'),
(52, 22, 17, 'dadasdas', '2019-12-25 15:37:42'),
(53, 30, 17, 'sdasasdas', '2019-12-27 19:19:08'),
(54, 30, 17, 'dsadsa', '2019-12-27 19:20:17'),
(55, 30, 17, 'dasdadas', '2019-12-27 19:20:36'),
(56, 30, 18, 'dadasd', '2019-12-27 19:21:06'),
(57, 29, 18, 'dsadaa', '2019-12-27 19:25:03'),
(58, 30, 18, 'new', '2019-12-27 19:25:19'),
(59, 15, 18, '1', '2019-12-27 19:28:14'),
(60, 30, 18, '1', '2019-12-27 19:32:43'),
(61, 30, 18, 'a', '2019-12-27 19:35:45'),
(62, 21, 19, 'hello', '2019-12-27 19:38:17'),
(63, 19, 19, 'asdadas', '2019-12-27 19:39:12');

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
(17, 19),
(18, 17),
(18, 19),
(19, 17),
(19, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`postId`, `userId`, `createAt`) VALUES
(0, 17, '2019-12-23 12:38:06'),
(8, 17, '2019-12-19 14:31:52'),
(8, 18, '2019-12-27 19:29:50'),
(13, 17, '2019-12-14 00:50:24'),
(14, 17, '2019-12-23 13:13:59'),
(15, 18, '2019-12-27 19:28:08'),
(19, 18, '2019-12-27 19:29:58'),
(20, 17, '2019-12-23 12:54:42'),
(20, 19, '2019-12-27 19:39:08'),
(21, 17, '2019-12-27 17:49:00'),
(22, 17, '2019-12-16 15:07:20'),
(30, 17, '2019-12-27 19:20:39'),
(30, 18, '2019-12-27 19:35:42'),
(30, 19, '2019-12-27 19:39:04'),
(31, 20, '2019-12-27 19:44:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `fromUserId` int(11) NOT NULL,
  `toUserId` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`Id`, `fromUserId`, `toUserId`, `createAt`, `content`, `userId`) VALUES
(1, 17, 19, '2019-12-27 17:48:45', 'new new', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `stt` int(11) NOT NULL,
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`stt`, `userId1`, `userId2`, `title`, `code`, `postId`, `createAt`) VALUES
(93, 19, 17, 'Da Like Bai Viet Cua Ban !', 1, 30, '2019-12-27 19:39:04'),
(94, 19, 18, 'Da Like Bai Viet Cua Ban !', 1, 20, '2019-12-27 19:39:08'),
(95, 19, 17, 'Da Comment Bai Viet Cua Ban !', 2, 19, '2019-12-27 19:39:12'),
(96, 18, 17, 'Sent a friend request', 0, 0, '2019-12-27 19:39:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `stt` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `displayName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagePost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`stt`, `userId`, `displayName`, `content`, `createAt`, `imagePost`, `privacy`) VALUES
(8, 17, 'Bao Tran', 'temp', '2019-12-08 01:00:06', 'img/posts/2635827-annapurna-massif-4k-free-download-beautiful-wallpaper-for-desktop.jpg', 1),
(9, 17, 'Bao Tran', 'sample', '2019-12-08 01:00:06', 'img/posts/desert_cactus_sun_127193_2560x1440.jpg', 1),
(11, 17, 'Bao Tran', 'index', '2019-12-08 01:00:06', 'img/posts/fox_stone_fire_paper_figures_93387_1366x768.jpg', 1),
(12, 17, 'Bao Tran', 'post', '2019-12-08 01:00:06', 'img/posts/flowers_white_macro_127282_2560x1440.jpg', 1),
(13, 18, 'samplename', '071219', '2019-12-07 00:00:00', 'img/posts/inscription_motivation_text_dark_background_119959_1366x768.jpg', 2),
(15, 17, 'Bao Tran', 'today 15-12', '2019-12-15 16:49:08', 'img/posts/16296141_399965353686072_697426716_n.jpg', 1),
(19, 17, 'Bao Tran', 'today', '2019-12-15 17:05:05', 'img/posts/IMG_20170209_145752-01-03.jpeg', 2),
(20, 18, 'samplename', 'teeerwerw', '2019-12-16 00:40:27', 'img/posts/tumblr_o9amx3X2NI1ufeoiyo1_540.jpg', 1),
(21, 19, 'Thuy Vy', 'today', '2019-12-16 00:43:51', 'img/posts/5modernlove-articlelarge-1547545810711380409092-crop-154754581699224134666-15476591475721058110959.jpg', 2),
(22, 17, 'Bao Tran', 'here', '2019-12-16 01:00:12', 'img/posts/neon_backlight_wall_127757_3840x2400.jpg', 3),
(29, 18, 'samplename', '+7987878', '2019-12-19 12:56:08', 'img/posts/16296141_399965353686072_697426716_n.jpg', 3),
(30, 17, 'Bao Tran', 'new', '2019-12-27 17:52:41', 'img/posts/5modernlove-articlelarge-1547545810711380409092-crop-154754581699224134666-15476591475721058110959.jpg', 1),
(31, 20, 'sample', 'ss', '2019-12-27 19:41:51', 'img/posts/5modernlove-articlelarge-1547545810711380409092-crop-154754581699224134666-15476591475721058110959.jpg', 1),
(32, 19, 'Thuy Vy', 'new', '2019-12-27 19:46:17', 'img/posts/neon_backlight_wall_127757_3840x2400.jpg', 1);

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
(17, 'Bao Tran', 'tqbbao@gmail.com', '$2y$10$igzNS6DihywSwbYrCi851Oslkoz8vi6asREYUX77f4ff4b1TBqZzm', '0398107711', '1998-05-07', 1, '', 'img/avatars/22308583_1230242453786401_6357182936824929281_n.jpg', 'img/header/anime-girl-car-drinking-coffee-co.jpg'),
(18, 'samplename', 'n.c.baoooo@gmail.com', '$2y$10$PI5rmXwinP1Hlo4ul/ZX4uY0Wkns6h66TeJyVFkGh6YEjI8lGTKyS', '123456789', '1998-01-05', 1, '', 'img/avatars/25188427_891003521066010_907981000_n.jpg', 'img/header/none.jpg'),
(19, 'Thuy Vy', 'thuyvy@gmail.com', '$2y$10$OtHlLBgg6cVsrr9OcmsT9usRJIS6v7DSzGkk5v0dbH1VqGxgG10Ne', '123456789', '1998-10-22', 1, '', 'img/avatars/-b-2ic86j-j_2f7Ud018svc18xrs8pfxeklo_hp3of6.jpg', 'img/header/anime-girl-car-drinking-coffee-co.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`userId1`,`userId2`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`postId`,`userId`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`stt`);

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
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
