-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2023 lúc 12:22 PM
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
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`) VALUES
(2, 1),
(1, 20),
(3, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) NOT NULL,
  `id_cart` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `id_size` int(10) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `id_cart`, `id_pro`, `id_size`, `price`, `quantity`, `total`) VALUES
(1, 1, 67, 4, 330, 2, 660),
(2, 1, 76, 4, 123, 2, 246),
(3, 1, 61, 1, 27.36, 1, 27),
(4, 2, 61, 1, 27.36, 1, 27),
(5, 3, 61, 1, 27.36, 1, 27),
(6, 3, 60, 4, 45, 1, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `title_category` varchar(250) NOT NULL COMMENT 'Tên loại hàng',
  `description` text NOT NULL COMMENT 'miêu tả',
  `id_category_type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title_category`, `description`, `id_category_type`, `status`) VALUES
(23, 'Hoodies & Sweats', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 2, 0),
(24, 'Áo khoác', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 3, 0),
(25, 'Chân váy ngắn', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 2, 0),
(26, 'áo polo', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 3, 0),
(27, 'Quần âu nam', 'Fashion has always been so temporary and uncertain. You can’t keep up with it.  This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fashion tendencies.', 1, 0),
(29, 'Quần jean', 'Quần jean loại mới đẹp phù hợp với cả nam nữ', 2, 0);

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

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `comment_content`, `idItem`, `idPerson`, `timeComment`) VALUES
(44, 'ahihi', 67, 20, '2023-11-06 14:09:49'),
(45, 'dd', 67, 20, '2023-11-17 01:27:30'),
(46, 'dd', 67, 27, '2023-11-17 01:43:24'),
(47, 'comment cua duc id sp 66', 66, 27, '2023-11-17 01:44:06'),
(49, 'hoho', 63, 27, '2023-11-17 01:54:46'),
(50, 'ggg', 67, 27, '2023-11-17 03:40:04'),
(51, 'ahihi', 64, 27, '2023-11-17 03:52:53'),
(52, 'duc duc', 63, 27, '2023-11-17 09:16:00'),
(54, 'huhu', 60, 1, '2023-11-22 10:56:20'),
(55, '45', 76, 1, '2023-11-24 07:41:23'),
(56, 'h', 63, 1, '2023-11-24 10:41:04'),
(57, 'huhu', 61, 20, '2023-11-27 12:40:55');

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
(1, 'admin', '123456', 'admin@fpt.edu.vn', '134/44/9 Nguyễn xá, Minh khai', '0848230200', 'PH39457 Nguyễn Minh Đức.jpg', b'0', 1),
(2, 'đặng tiến hưng', '123456', 'hungdtph23624@fpt.edu', '666 HELL', '0842569553', '', b'0', 2),
(20, 'Nguyễn Quang Đăng', '123', 'mrbat905@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0236798566', '8165126_image.jpg', b'0', 3),
(21, 'hung', '123456', 'hung@fpt.edu.vn', 'Dị sử - mỹ thành - mỹ lộc - nam định', '0946937769', '1668604341.jpg', b'0', 3),
(23, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '123', 'min83@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', '175973515_907604300074078_8498852808296764780_n.jpg', b'0', 3),
(24, 'haha', 'dd', 'dd@gmail.com', 'nguyen xa', '0957837377', NULL, b'0', 3),
(25, 'khanh', 'dd', 'khanh040413@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', NULL, b'0', 3),
(26, 'Nguyễn Đức', '123', 'ducnmph39457@fpt.edu.vn', '134/44/9 Nguyễn xá, Minh khai', '0848230200', NULL, b'0', 3),
(27, 'duc123456', '123', 'hihi@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', 'FB_IMG_1696485632316.jpg', b'0', 3),
(28, 'ggg', 'ggg', 'dfdfgd@gmail.com', 'ggg', 'ggg', NULL, b'0', 3),
(30, 'vv', '123', 'vv@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', '1700531093.jpg', b'0', 3),
(33, 'minhduc8883@gmail.com', '123', 'minhduc8883@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', '1700652401.webp', b'0', 3),
(34, 'duc', '123', 'minhduc8883@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230201', 'SPZ07934 (1).jpg', b'0', 3),
(44, 'fnvvb', '123', 'T@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', '1700702791.PNG', b'0', 3),
(45, 'y', '12', 'y@gmail.com', '134/44/9 Nguyễn xá, Minh khai', '0848230200', '1700821761.jpg', b'0', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'mã đơn hàng',
  `id_customer` int(11) NOT NULL COMMENT 'mã người dùng\r\n',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày đặt đơn',
  `order_address` varchar(255) NOT NULL,
  `order_phone` varchar(10) NOT NULL,
  `total` int(11) NOT NULL COMMENT 'tổng tiền của hóa đơn',
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `order_date`, `order_address`, `order_phone`, `total`, `order_status`) VALUES
(79, 20, '2023-11-09 04:47:10', '', '', 185, 5),
(80, 20, '2023-11-08 01:55:20', '', '', 14, 5),
(81, 20, '2023-12-03 01:55:24', '', '', 36, 5),
(82, 20, '2023-12-03 01:55:27', '', '', 14, 5),
(83, 20, '2023-12-03 01:55:36', '', '', 670, 5),
(84, 20, '2023-12-03 01:55:31', '', '', 72, 5),
(85, 20, '2023-12-03 01:55:40', '', '', 1600, 5),
(86, 20, '2023-12-01 10:35:31', '', '', 36, 4),
(87, 20, '2023-12-01 10:48:21', '', '', 36, 4),
(88, 20, '2023-12-01 10:49:29', '', '', 288, 4),
(89, 20, '2023-12-01 10:55:56', '', '', 270, 4),
(90, 20, '2023-12-01 10:57:47', '', '', 45, 3),
(91, 20, '2023-12-05 13:07:59', '', '', 45, 1),
(92, 20, '2023-12-07 11:06:11', '134/44/9 Nguyễn xá, Minh khai', '0236798566', 108, 5),
(93, 20, '2023-12-07 11:06:15', 'ahihi', '1234567', 27, 5),
(94, 20, '2023-12-07 11:06:19', 'Trinh van bo, nam tu liem, hanoi', '1234567', 42, 5),
(95, 20, '2023-12-05 13:29:46', '134/44/9 Nguyễn xá, Minh khai', '0236798566', 45, 2),
(96, 33, '2023-12-07 11:18:30', 'Trinh van bo, nam tu liem, hanoi', '1234567', 110, 5);

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
  `size` text NOT NULL COMMENT 'Size sản phẩm',
  `price` int(11) NOT NULL COMMENT 'giá sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'số lượng đặt ',
  `total` int(11) NOT NULL COMMENT 'tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `idProduct`, `product_name`, `product_picture`, `size`, `price`, `quantity`, `total`) VALUES
(64, 79, 62, 'Zara BASIC STRAPPY TOP', '1670417638.webp', '', 45, 3, 135),
(65, 79, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 1, 36),
(66, 79, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', '', 14, 1, 14),
(67, 80, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', '', 14, 1, 14),
(68, 81, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 1, 36),
(69, 82, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', '', 14, 1, 14),
(70, 83, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 1, 36),
(71, 83, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', '', 14, 1, 14),
(72, 83, 64, 'áo khoác hoodie nút phù hợp nam nữ', '1670917232.jfif', '', 155, 4, 620),
(73, 84, 61, 'Zara BASIC DENIM SHIRT', '1670417573.webp', '', 27, 1, 27),
(74, 84, 60, 'Boyfriend Easy Plaid Shir', '1700537968.webp', '', 45, 1, 45),
(75, 85, 67, 'chân váy ngắn chữ A', '1670917756.jfif', '', 400, 4, 1600),
(76, 86, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 1, 36),
(77, 87, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 1, 36),
(78, 88, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 8, 288),
(79, 89, 60, 'Boyfriend Easy Plaid Shir', '1700537968.webp', '', 45, 6, 270),
(80, 90, 60, 'Boyfriend Easy Plaid Shir', '1700537968.webp', '', 45, 1, 45),
(81, 91, 60, 'Boyfriend Easy Plaid Shir', '1700537968.webp', '', 45, 1, 45),
(82, 92, 63, 'Zara CROPPED SHIRT', '1670417693.webp', '', 36, 3, 108),
(83, 93, 61, 'Zara BASIC DENIM SHIRT', '1670417573.webp', '', 27, 1, 27),
(84, 94, 65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', '1670917380.jfif', '', 14, 3, 42),
(85, 95, 62, 'Zara BASIC STRAPPY TOP', '1670417638.webp', '', 45, 1, 45),
(86, 96, 62, 'Zara BASIC STRAPPY TOP', '1670417638.webp', '', 55, 2, 110);

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
(60, 'Boyfriend Easy Plaid Shir', 450, 10, '1700537968.webp', '2023-12-06 10:58:41', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 50, 92, 23),
(61, 'Zara BASIC DENIM SHIRT', 456, 6, '1670417573.webp', '2023-12-06 10:58:05', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 28, 133, 24),
(62, 'Zara BASIC STRAPPY TOP', 100, 45, '1670417638.webp', '2023-12-07 11:04:49', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 38, 1033, 24),
(63, 'Zara CROPPED SHIRT', 450, 8, '1670417693.webp', '2023-12-06 10:52:27', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 45, 1409, 25),
(64, 'áo khoác hoodie nút phù hợp nam nữ', 155, 0, '1670917232.jfif', '2023-12-06 10:54:49', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 38, 1873, 23),
(65, 'Áo hoodie dài tay có mũ nỉ trơn unisex nam nữ có 2 túi trước nhiều màu mặc mùa đông ấm ấp', 350, 4, '1670917380.jfif', '2023-12-06 11:06:45', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 43, 408, 23),
(66, 'Áo Khoác Bomber Neww York', 450, 0, '1670917503.jfif', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 68, 372, 24),
(67, 'chân váy ngắn chữ A', 400, 0, '1670917756.jfif', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 66, 224, 25),
(68, 'Áo Polo Local Brand Karants Signature Polo', 345, 0, '1670917887.jfif', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 70, 346, 26),
(74, 'Jacket black rumble', 300, 30, '1700475227.webp', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 50, 0, 23),
(75, 'Super cute shirt', 456, 22, '1669825321.png', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 33, 3, 23),
(76, 'T-shrit contestant', 300, 60, '1700486205.webp', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 5, 40, 24),
(77, 'Super Thin Polo Shirt', 500, 20, 'dosiin-dizi-clothing-ao-polo-nam-logo-dizi-thich-hop-cho-mac-hang-ngaythe-thaocong-so-lich-su-49499119.jpg', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 50, 0, 26),
(78, 'Hoodie new style', 300, 13, '1668775939.webp', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 45, 0, 23),
(79, 'PoloFORmen', 430, 36, 'dia-chi-ban-ao-polo-nam-chinh-hang-ha-noi_341.jpg', '2023-12-06 10:33:38', 'Một bộ sưu tập hoàn toàn mới được ra mắt làm thỏa mãn nhu cầu của giưới trẻ. Sự sáng tạo luôn là ưu tiên hàng đầu của chúng tôi. Mỗi mẫu quần áo đều mang đậm dấu ấn cá nhân, giúp bạn nổi bật và tỏa sáng trong đám đông.', 45, 0, 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` int(10) NOT NULL,
  `id_size` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity_size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `id_size`, `id_product`, `price`, `quantity_size`) VALUES
(2, 1, 60, 120, 10),
(3, 4, 67, 400, 3),
(4, 3, 65, 500, 9),
(5, 4, 62, 900, 7),
(7, 1, 64, 10, 10),
(9, 4, 66, 330, 22);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c` (`id_cart`),
  ADD KEY `id_p` (`id_pro`),
  ADD KEY `id_s` (`id_size`);

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
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `category_type`
--
ALTER TABLE `category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại danh mục', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đăng nhập', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã đơn hàng', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết hóa đơn', AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `id_c` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_p` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_s` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
