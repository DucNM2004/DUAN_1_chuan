-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2023 lúc 02:35 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `title_category` varchar(250) NOT NULL COMMENT 'Tên loại hàng',
  `description` text NOT NULL COMMENT 'miêu tả',
  `id_category_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title_category`, `description`, `id_category_type`) VALUES
(23, 'Hoodies & Sweats', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 1),
(24, 'Áo khoác', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 3),
(25, 'Chân váy ngắn', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 2),
(26, 'áo polo', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 3),
(27, 'Quần âu nam', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_type`
--

CREATE TABLE `category_type` (
  `id` int(11) NOT NULL COMMENT 'mã loại danh mục',
  `type` varchar(255) NOT NULL COMMENT 'tên thể loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category_type`
--

INSERT INTO `category_type` (`id`, `type`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'All');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL COMMENT 'Mã bình luận',
  `comment_content` varchar(255) NOT NULL COMMENT 'Nội dung bình luận',
  `idItem` int(11) NOT NULL COMMENT 'Mã hàng hóa được bình luận',
  `idPerson` int(11) NOT NULL COMMENT 'Mã người bình luận',
  `timeComment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL COMMENT 'Mã đăng nhập',
  `name_customer` varchar(250) NOT NULL COMMENT 'Họ và tên',
  `passWord` varchar(60) NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(250) NOT NULL COMMENT 'Địa chỉ email',
  `address` varchar(250) NOT NULL COMMENT 'Địa chỉ',
  `phone_number` varchar(10) NOT NULL COMMENT 'số điện thoại',
  `picture` varchar(250) DEFAULT NULL COMMENT 'Tên hình ảnh',
  `active` bit(1) DEFAULT b'0' COMMENT 'Trạng thái kích hoạt',
  `role` int(1) NOT NULL COMMENT 'Vai trò'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name_customer`, `passWord`, `email`, `address`, `phone_number`, `picture`, `active`, `role`) VALUES
(1, 'admin', '123456', 'admin@fpt.edu.vn', '666 HELL', '0101010101', 'topic7-8.png', b'0', 1),
(2, 'đặng tiến hưng', '123456', 'hungdtph23624@fpt.edu', '666 HELL', '0101010101', NULL, b'0', 2),
(20, 'Nguyễn Quang Đăng2', '123456', 'mrbat905@gmail.com', '666 HELL', '0101010101', '52601891_254868925449402_2500491944975663104_n.jpg', b'0', 3),
(21, 'đặng tiến hưng', '123456', 'hungdtph23624@fpt.edu.vn', 'Dị sử - mỹ thành - mỹ lộc - nam định', '0946937769', NULL, b'0', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'mã đơn hàng',
  `id_customer` int(11) NOT NULL COMMENT 'mã người dùng\r\n',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày đặt đơn',
  `total` int(11) NOT NULL COMMENT 'tổng tiền của hóa đơn',
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `order_date`, `total`, `order_status`) VALUES
(38, 20, '2023-11-01 09:01:42', 14, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'id chi tiết hóa đơn',
  `id_order` int(11) NOT NULL COMMENT 'id hóa đơn',
  `idProduct` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `product_name` varchar(250) NOT NULL COMMENT 'tên sản phẩm',
  `product_picture` varchar(250) NOT NULL COMMENT 'ảnh sản phẩm',
  `price` int(11) NOT NULL COMMENT 'giá sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'số lượng đặt ',
  `total` int(11) NOT NULL COMMENT 'tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `idProduct`, `product_name`, `product_picture`, `price`, `quantity`, `total`) VALUES
(37, 38, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', 14, 1, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'Mã hàng hóa',
  `name` varchar(250) NOT NULL COMMENT 'Tên hàng hóa',
  `price` float NOT NULL COMMENT 'Đơn giá',
  `saleOff` float NOT NULL COMMENT 'Mức giảm giá',
  `picture` varchar(256) NOT NULL COMMENT 'Hình ảnh',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày nhập hàng',
  `description` text NOT NULL COMMENT 'Mô tả hàng hóa',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng sản phẩm',
  `view_number` int(11) NOT NULL COMMENT 'Số lượt xem',
  `id_category` int(11) DEFAULT NULL COMMENT 'Mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `saleOff`, `picture`, `date_added`, `description`, `quantity`, `view_number`, `id_category`) VALUES
(59, 'Hollister Easy Plaid Shirt', 666, 555, '1670416922.webp', '2023-11-01 08:52:54', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 555, 555, 23),
(60, 'Boyfriend Easy Plaid Shir', 450, 0, '1670417508.webp', '2022-12-07 12:51:48', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 555, 0, 23),
(61, 'Zara BASIC DENIM SHIRT', 456, 6, '1670417573.webp', '2022-12-07 12:52:53', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 5, 66, NULL),
(62, 'Zara BASIC STRAPPY TOP', 100, 0, '1670417638.webp', '2022-12-07 12:53:58', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 555, 1000, NULL),
(63, 'Zara CROPPED SHIRT', 450, 8, '1670417693.webp', '2022-12-07 12:54:53', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as consumers always try to stay in touch with all the latest fashion tendencies.', 555, 1352, NULL),
(64, 'áo khoác hoodie nút phù hợp nam nữ', 155, 0, '1670917232.jfif', '2022-12-13 07:40:32', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 555, 837, 23),
(65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', 350, 4, '1670917380.jfif', '2023-11-01 09:01:42', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 554, 69, 23),
(66, 'Áo Khoác Bomber Neww York', 450, 0, '1670917503.jfif', '2023-11-01 01:47:45', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 69, 356, 24),
(67, 'chân váy ngắn chữ A', 400, 0, '1670917756.jfif', '2023-11-01 10:10:34', 'chân váy ngắn chữ A xếp ly lệch tà có quần trong 2 màu hottrend\r\n\r\n\r\n- Chân váy xếp ly chữ a phong cách ulzang chất liệu vitex cao cấp mang lại cảm giác thoải mái khi mặc\r\n\r\n-  Chân váy tennis tuy là chân váy ngắn nhưng thiết kế chiều dàinên ko quá ngắn xị em có thể tự tin mặc ko lo lộ hàng nhé\r\n\r\n- Chân váy xếp ly ngắn chữ a thiết kế theo phong cách chân váy xòe nên cực kì dễ mix đồ, mùa hè mix với sơ mi, áo thun, mùa đông mix với ghi lê bao xinh\r\n\r\n-  Chân váy có 2 màu đen, nâu\r\n\r\nS vòng eo 64\r\n\r\n M vòng eo 68\r\n\r\n L vòng eo 72\r\n\r\n- Giặt máy thì nên lật trái chân váy để giặt còn giặt tay thì ko cần ạ\r\n', 29999, 2771, 25),
(68, 'Áo Polo Local Brand Karants Signature Polo', 345, 0, '1670917887.jfif', '2022-12-13 07:51:27', '* Cách chọn size: Shop có để bảng chuẩn, nếu bạn chưa chọn được size bạn có thể inbox để được KARANTS tư vấn size chuẩn nha. \r\n\r\n* Lưu ý : Áo thuộc dạng form rộng, unisex, mặc thoải mái rồi nên khi đặt không cần nhích size ( trừ trường hợp thích oversize size hẳn )\r\n\r\n\r\n\r\n* Áo có 3 size : M - L - XL \r\n\r\n    M	     dưới 1m65	   -     dưới 60kg\r\n\r\n    L	     1m65 - 1m72   -   61-72kg\r\n\r\n    XL     1m65 - 1m82  -	 73-85kg\r\n\r\n\r\n\r\n* Chế độ bảo hành KARANTS:\r\n\r\n- Tất cả các sản phẩm đều được shop bảo hành\r\n\r\n- Đối với sản phẩm lỗi/đơn hàng thiếu sản phẩm, quý khách vui lòng nhắn tin/gọi ngay cho shop trong vòng 7 ngày (kể từ ngày nhận đơn hàng)\r\n\r\n- Nếu quá thời hạn 7 ngày kể từ ngày nhận đơn hàng, chế độ bảo hành của KARANTS sẽ hết hiệu lực', 4567, 344, 26);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_type` (`id_category_type`);

--
-- Chỉ mục cho bảng `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idItem` (`idItem`,`idPerson`),
  ADD KEY `idPerson` (`idPerson`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_customer`),
  ADD KEY `order_status` (`order_status`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `order_detail_ibfk_2` (`idProduct`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `category_type`
--
ALTER TABLE `category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại danh mục', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đăng nhập', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã đơn hàng', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết hóa đơn', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=69;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_category_type`) REFERENCES `category_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idPerson`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
