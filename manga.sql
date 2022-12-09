-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2022 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manga`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id` int(11) NOT NULL,
  `id_manga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` varchar(225) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_comment`
--

INSERT INTO `tb_comment` (`id`, `id_manga`, `id_user`, `content`, `create_at`) VALUES
(1, 5, 1, 'truyện hay lắm các bạn ơi 💖 ', '2022-12-03 00:00:58'),
(2, 11, 2, 'truyện hay💖💖💖', '2022-12-03 00:02:04'),
(3, 12, 3, 'truyện hay lắm các bạn, nên đọc nhé Vote 100000❤❤', '2022-12-03 00:03:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_img_content`
--

CREATE TABLE `tb_img_content` (
  `id` int(11) NOT NULL,
  `link_img` varchar(225) NOT NULL,
  `id_manga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_img_content`
--

INSERT INTO `tb_img_content` (`id`, `link_img`, `id_manga`) VALUES
(1, 'https://st.ntcdntempv3.com/data/comics/131/dai-vuong-tha-mang.jpg', 5),
(2, 'https://st.ntcdntempv3.com/data/comics/176/van-co-chi-ton.jpg', 12),
(3, 'https://st.ntcdntempv3.com/data/comics/32/vo-luyen-dinh-phong.jpg', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_manga`
--

CREATE TABLE `tb_manga` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `avatar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_manga`
--

INSERT INTO `tb_manga` (`id`, `name`, `author`, `year`, `avatar`) VALUES
(5, 'ĐẠI VƯƠNG THA MẠNG', 'Duyệt Động văn hóa', 2019, 'https://st.ntcdntempv3.com/data/comics/131/dai-vuong-tha-mang.jpg'),
(10, 'BẠN HỌC CỦA TÔI LÀ LÍNH ĐÁNH THUÊ', 'Dang cap nhat', 2021, 'https://st.ntcdntempv3.com/data/comics/220/ban-hoc-cua-toi-la-linh-danh-thue.jpg'),
(11, 'VÕ LUYỆN ĐỈNH PHONG', 'Đang cập nhật', 2018, 'https://st.ntcdntempv3.com/data/comics/32/vo-luyen-dinh-phong.jpg'),
(12, 'VẠN CỔ CHÍ TÔN', 'Đang cập nhật', 2021, 'https://st.ntcdntempv3.com/data/comics/176/van-co-chi-ton.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `email`, `fullname`) VALUES
(1, 'admin123', '123456', 'admin123@gmail.com', 'Admin'),
(2, 'phu123', '123456', 'phu123@gmail.com', 'Ngọc PHú'),
(3, 'trang123', '123456', 'trang123@gmail.com', 'Trang'),
(5, 'quanghuy123', '123456', 'quanghuy123@gmail.com', 'Nguyễn Quang Huy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_img_content`
--
ALTER TABLE `tb_img_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manga` (`id_manga`);

--
-- Chỉ mục cho bảng `tb_manga`
--
ALTER TABLE `tb_manga`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_img_content`
--
ALTER TABLE `tb_img_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_manga`
--
ALTER TABLE `tb_manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_img_content`
--
ALTER TABLE `tb_img_content`
  ADD CONSTRAINT `tb_img_content_ibfk_1` FOREIGN KEY (`id_manga`) REFERENCES `tb_manga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
