-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 01, 2021 lúc 01:30 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpdev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `number` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `product_id`, `price`, `number`, `customer_id`) VALUES
(4, 'Goku SSJ3 Ichiban Kuji vs Omnibus Masterlise', 5, 1550000, 2, 2),
(5, 'Goku SSJ3 SCultures 6', 7, 950000, 1, 2),
(6, 'Gogeta Blue Grandista Ros', 4, 650000, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `timeCreated` int(255) NOT NULL,
  `view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `timeCreated`, `view`) VALUES
(2, 'Nguyễn Văn Tự Lực', 'Hẻm 336 Thủ Khoa Huân, Thanh Hải, Phan Thiết, Bình Thuận', '0344671778', 1609315011, 1),
(3, 'Nguyễn Huy Hoàng', '239/44 Trần Văn Đang, p.11, q.3, tp.HCM', '0366009082', 1609387706, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sort` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `sort`, `active`, `created_at`) VALUES
(1, 'Grandista', 1, 1, 1604406170),
(2, 'Ichiban Kuji', 1, 1, 1604406195),
(3, 'ADV - Adverge', 1, 1, 1607311690),
(4, 'WCF - World Collectionable Figure', 1, 1, 1607311703),
(5, 'Extreme', 1, 1, 1607311715),
(6, 'Battle', 1, 1, 1607311723),
(7, 'Scultures', 1, 1, 1607311732),
(8, 'MSP - Master Stars Piece', 1, 1, 1607505639),
(9, 'SMSP - Super Master Stars Piece', 1, 1, 1607505729),
(10, 'Resin', 1, 1, 1608279334);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(25) NOT NULL,
  `sale` int(25) DEFAULT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `sort` int(5) NOT NULL,
  `active` int(1) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `description`, `content`, `sort`, `active`, `menu_id`, `image`, `created_at`) VALUES
(1, 'Goku SSJ3 Grandista NERO', 1540000, 0, '[Mô hình Dragon Ball chính hãng] - Goku Ssj3 Grandista Nero\r\nSize : cao 33cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #goku #grandista', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 1, 'uploads/1608865257-goku-ssj3-grand.jpg', 1607506201),
(2, 'Super Saiyan Son Goku Grandista', 1350000, 0, '[Mô hình Dragon Ball chính hãng] - Super Saiyan Son Goku Grandista\r\nSize : cao 33cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #goku #grandista', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 1, 'uploads/1608865245-goku-ssj-grand.jpg', 1607507433),
(3, 'Goku Blue Ichiban Kuji', 1240000, 0, '[Mô hình Dragon Ball chính hãng] - Goku blue - Ichiban kuji - 20th ver.Asian\r\nDòng sp: Ichiban kuji Asian.ver \r\nNsx: Bandai chính hãng\r\n#Dbshopvn #Dragonballshop #Gokublue #IChibankuji #Bandai', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 2, 'uploads/1608865235-goku-blue-chiban.jpg', 1607507784),
(4, 'Gogeta Blue Grandista Ros', 650000, 0, '[Mô hình Dragon Ball chính hãng] - Gogeta Blue Grandista Ros\r\nSize : cao 32cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #gogeta #grandista', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 1, 'uploads/1608865221-gogeta-grand.jpg', 1608274459),
(5, 'Goku SSJ3 Ichiban Kuji vs Omnibus Masterlise', 1550000, 0, '[Mô hình Dragon Ball chính hãng] - Goku SSJ3 Ichiban Kuji vs Omnibus Masterlise\r\nSize : cao 31cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #goku #grandista', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 2, 'uploads/1608865205-goku-ssj3-ichiban-vs-omnibus-masterlise.jpg', 1608275360),
(6, 'Extreme Saiyan Gogeta - Black', 1150000, 0, '[Mô hình Dragon Ball chính hãng] - Extreme Saiyan Gogeta - Black\r\nSize : cao 32cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #gogeta #extreme', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 5, 'uploads/1608865193-goku-black-extreme.jpg', 1608607224),
(7, 'Goku SSJ3 SCultures 6', 950000, 0, '[Mô hình Dragon Ball chính hãng] - Goku SSJ3 SCultures 6\r\nSize : cao 25cm\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #goku #grandista', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 7, 'uploads/1608865182-goku-ssj3-scultues6.jpg', 1608608262),
(8, 'Adverge - Set 1', 725000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 1\r\nSize : cao 5cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609411912-adv-set1.jpg', 1609411912),
(9, 'Adverge - Set 2', 1980000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 2\r\nSize : cao 5cm\r\nSố lượng : 11\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609412066-adv-set2.jpg', 1609412066),
(10, 'Adverge - Set 3', 970000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 3\r\nSize : cao 5cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609412255-adv-set3.jpg', 1609412255),
(11, 'Adverge - Set 4', 985000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 4\r\nSize : cao 5cm\r\nSố lượng : 7\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609412432-adv-set4.jpg', 1609412432),
(12, 'Adverge - Set 5', 1150000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 5\r\nSize : cao 5cm\r\nSố lượng : 5\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609412544-adv-set5.jpg', 1609412544),
(13, 'Adverge - Set 6', 1120000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 6\r\nSize : cao 5cm\r\nSố lượng : 7\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609420829-adv-set6.jpg', 1609420829),
(14, 'Adverge - Set 7', 1880000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 7\r\nSize : cao 5cm\r\nSố lượng : 8\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609420910-adv-set7.jpg', 1609420910),
(15, 'Adverge - Set 8', 1970000, 0, '[Mô hình Dragon Ball chính hãng] - Adverge - Set 8\r\nSize : cao 5cm\r\nSố lượng : 7\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #adverge', '&lt;p&gt;Thương hiệu: BANDAI&lt;/p&gt;\r\n\r\n&lt;p&gt;Chất liệu: Nhựa Pvc&lt;/p&gt;\r\n\r\n&lt;p&gt;Xuất xứ: Nhật Bản&lt;/p&gt;\r\n\r\n&lt;p&gt;TEM V&amp;Agrave;NG&lt;/p&gt;', 1, 1, 3, 'uploads/1609420981-adv-set8.jpg', 1609420981),
(16, 'WCF - Dragon Ball Nhân Vật - set 1', 1450000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 1\r\nSize : cao 7cm\r\nSố lượng : 5\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;a&lt;/p&gt;', 1, 1, 4, 'uploads/1609438908-wcf-set1.jpg', 1609438908),
(17, 'WCF - Dragon Ball Nhân Vật - set 2', 1680000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 2\r\nSize : cao 7cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;d&lt;/p&gt;', 1, 1, 4, 'uploads/1609439267-wcf-set2.jpg', 1609439267),
(18, 'WCF - Dragon Ball Nhân Vật - set 3', 1250000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 3\r\nSize : cao 7cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;g&lt;/p&gt;', 1, 1, 4, 'uploads/1609439386-wcf-set3.jpg', 1609439386),
(19, 'WCF - Dragon Ball Nhân Vật - set 4', 1370000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 4\r\nSize : cao 7cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;h&lt;/p&gt;', 1, 1, 4, 'uploads/1609439492-wcf-set4.jpg', 1609439492),
(20, 'WCF - Dragon Ball Nhân Vật - set 5', 1540000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 5\r\nSize : cao 7cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;f&lt;/p&gt;', 1, 1, 4, 'uploads/1609439574-wcf-set5.jpg', 1609439574),
(21, 'WCF - Dragon Ball Nhân Vật - set 6', 1760000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 6\r\nSize : cao 7cm\r\nSố lượng : 6\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;h&lt;/p&gt;', 1, 1, 4, 'uploads/1609439654-wcf-set6.jpg', 1609439654),
(22, 'WCF - Dragon Ball Nhân Vật - set 7', 1500000, 0, '[Mô hình Dragon Ball chính hãng] - WCF - Set 7\r\nSize : cao 7cm\r\nSố lượng : 5\r\nTình trạng : New full box 100%\r\nHàng chính hãng Bandai\r\n#dragonball #wcf', '&lt;p&gt;k&lt;/p&gt;', 1, 1, 4, 'uploads/1609439694-wcf-set7.jpg', 1609439694);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` int(1) NOT NULL,
  `created` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `created`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1605327599);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_customer` (`customer_id`),
  ADD KEY `cart_products` (`product_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_menus` (`menu_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
