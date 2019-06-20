-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2019 lúc 03:52 AM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `googlephoto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) DEFAULT '0',
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album_detail`
--

CREATE TABLE `album_detail` (
  `detail_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `wistlist` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`image_id`, `user_id`, `image`, `path_image`, `description`, `location`, `date_create`, `date_update`, `deleted`, `wistlist`) VALUES
(49, 3, 'Screenshot (2).png', 'uploads/917381c4c61c9230932e7dd30edad64e.png', NULL, NULL, '2019-06-12 11:37:11', '2019-06-12 11:37:11', 0, 0),
(50, 4, 'Screenshot (3).png', 'uploads/32203d44568d32b486b1d4fef9e0df4a.png', NULL, NULL, '2019-06-12 11:37:11', '2019-06-12 11:37:11', 0, 0),
(51, 4, 'Screenshot (4).png', 'uploads/b7622b34ac854cf258ea578af51b3d1a.png', NULL, NULL, '2019-06-12 11:37:11', '2019-06-12 11:37:11', 0, 0),
(52, 4, 'Screenshot (1).png', 'uploads/f3fe70a563ff280e6f587f0b345a64e3.png', NULL, NULL, '2019-06-13 16:10:25', '2019-06-13 16:10:25', 0, 0),
(53, 4, 'Screenshot (2).png', 'uploads/917381c4c61c9230932e7dd30edad64e.png', NULL, NULL, '2019-06-13 16:10:25', '2019-06-13 16:10:25', 0, 0),
(54, 4, 'Screenshot (3).png', 'uploads/32203d44568d32b486b1d4fef9e0df4a.png', NULL, NULL, '2019-06-13 16:10:25', '2019-06-13 16:10:25', 0, 0),
(55, 4, 'Screenshot (4).png', 'uploads/b7622b34ac854cf258ea578af51b3d1a.png', NULL, NULL, '2019-06-13 16:10:25', '2019-06-13 16:10:25', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1559721028),
('m130524_201442_init', 1559721030),
('m190124_110200_add_verification_token_column_to_user_table', 1559721030);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `share`
--

CREATE TABLE `share` (
  `share_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT '10',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(3, 'Trần Cảnh Dinh', 'canhdinh', 'dinhtrancntt@gmail.com', 'BhXN-f-qZy3HPgn2pXfMR--IOd1Cvckh', '$2y$13$xOpslh/xPi2jPxIP2FrIs.38.jTtUaPoV9wWUww8sAfUQiSxW46XO', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'u54Qeubdmzq8xvQhkzToICwxVt-3tTK9_1559721785'),
(4, 'Admin', 'admin', 'admin@gmail.com', 'VH8vZV-76yFQAHvJqHOZEDjr3Qkr5DIt', '$2y$13$.sl1tWX7CCqsB9usY.xBm.EPqCB0FLUEY1O4ehNp0IX9EYLTYT3Gq', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'u8ehdmOG3dCff0GPhltblAQIj4emNb7e_1559729737'),
(5, 'Đào Minh Thái', 'thaidui', 'thaidui@gmail.com', 'AjaRR9xDj4wZfLIlU9NNOZblW77jli_1', '$2y$13$8Nf.McWn3EIwNNYKg1c9ce2SElXMa7pydddjCbp6mlO1LmNEUP2wK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'USyhVuJO0Ra6LNC6pt6HjNHNL3V-8sCh_1560396000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `album_detail`
--
ALTER TABLE `album_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `share`
--
ALTER TABLE `share`
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `album_detail`
--
ALTER TABLE `album_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `album_detail`
--
ALTER TABLE `album_detail`
  ADD CONSTRAINT `album_ib` FOREIGN KEY (`detail_id`) REFERENCES `album` (`album_id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `use_id_frk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
