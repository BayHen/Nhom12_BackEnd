-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 17, 2021 lúc 04:17 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `12`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Sofa', NULL, NULL),
(2, 'Table', NULL, NULL),
(3, 'Chair', NULL, NULL),
(4, 'Bed', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_rating` int(11) NOT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_rating`, `comment_content`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, -1, 'đẹp', 2, 15, '2021-06-15 21:01:34', '2021-06-15 21:01:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_04_12_024043_create_categories_table', 1),
(3, '2021_04_24_160356_create_orders_table', 1),
(4, '2021_04_27_020820_create_products_table', 1),
(5, '2021_04_28_020820_create_comments_table', 1),
(6, '2021_04_29_021344_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-06-15 21:43:06', '2021-06-17 08:42:00'),
(2, 1, 2, '2021-06-17 08:40:38', '2021-06-17 08:41:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `detail_quantity` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`detail_id`, `detail_quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 12, '2021-06-15 21:43:06', '2021-06-15 21:43:06'),
(2, 1, 1, 15, '2021-06-15 21:43:06', '2021-06-15 21:43:06'),
(3, 2, 2, 13, '2021-06-17 08:40:39', '2021-06-17 08:40:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available` int(11) NOT NULL,
  `product_feature` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_available`, `product_feature`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'SO-920 Sofa 3 Chỗ', 55224000, 'SO-920_6_d5f0b2ab-d557-4a6b-a81e-6f4e0c672656_672x672.jpg', 'Bộ Sofa da đa năng Nhật Bản SO-920 được điều khiển bằng cơ điện, có thể bật ra thành ghế thư giãn. Ghế ở giữa có thể gập xuống thành bàn, rất thích hợp cho nhu cầu nghỉ ngơi của gia đình, mang lại cho người sử dụng sự êm ái và thoải mái nhất.\r\nKích thước(W-D-H): 2030-990-1030(mm)', 10, 1, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(2, 'SO-915 Sofa 3 Chỗ', 28184000, 'SO-915_16_672x672.jpg', 'Bộ Sofa da Nhật Bản SO-915 có kích thước nhỏ gọn, thích hợp cho phòng khách nhỏ nhắn, mang đậm nét sang trọng vốn có của nghệ thuật thiết kế nội thất Nhật Bản và giúp mang lại sự êm ái và mềm mại cho người sử dụng.\r\nKích thước(W-D-H): 1980-930-910(mm)', 15, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(3, 'SO-912 Sofa 3 Chỗ', 7200000, 'SO-912_1_5d1f71e6-73f7-4620-af05-2d57df28c8c7_672x672.jpg', 'Bộ Sofa da Nhật Bản SO-912 gồm 1 sofa 2 chỗ và 1 cục giữa được sản xuất tại Nhật với thiết kế mang đậm nét sang trọng vốn có của nghệ thuật thiết kế nội thất Nhật Bản.\r\nKích thước (W-D-H): 2080-1020-1040 (mm)\r\n\r\n', 20, 1, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(4, 'SO-900 Sofa 3 Chỗ\r\n', 26800000, 'SO-900_3_6b0c9ab0-e252-4a4a-b022-edbf83d21f1b_672x672.jpg', 'Bộ Sofa da Nhật Bản SO-900 có kích thước nhỏ gọn, thích hợp cho phòng khách nhỏ nhắn, mang đậm nét sang trọng vốn có của nghệ thuật thiết kế nội thất Nhật Bản.\r\nKích thước (W-D-H): 1990/1050-920-870 (mm)', 13, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(5, 'SO-903 Sofa 3 Chỗ', 27100000, 'SO-903_7_fd1a6d0e-1f53-4131-a282-483b76f3f2f5_672x672.jpg', 'Bộ Sofa da Nhật Bản SO-903 có kích thước nhỏ gọn, cho phòng khách nhỏ nhắn, mang đậm nét sang trọng vốn có của nghệ thuật thiết kế nội thất Nhật Bản. Với tựa đầu cao của sofa mang lại sự thoải mái và thư giãn cho người ngồi.\r\nKích thước (W-D-D): 2000/890-890-890(mm)', 10, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(6, 'Invisible Table', 20500000, '1323035-kartell-invisible-table-a-jp.jpg', 'Chiếc bàn vô hình được tạo ra bởi nghệ sĩ và nhà thiết kế người Nhật Tokujin Yoshioka cho công ty Kartell của Ý. Bàn vô hình được tạo ra bằng cách sử dụng một khuôn đúc công nghiệp duy nhất.\r\nKích thước: W100xH31.5xD100cm', 10, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(7, 'Magic Mani Table - Red', 41100000, 'magic-mani-table-red-597718.jpg', 'Thêm một số kịch tính suy đồi vào ngôi nhà của bạn với chiếc bàn Magic Mani này từ Fornasetti. Được làm thủ công tại Ý, chiếc bàn này có họa tiết bàn tay độc đáo với một ngăn mở ở trung tâm.\r\nKích thước: H46xW60xD60cm', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(8, 'Round Display Table - Golden/Black', 18900000, 'round-display-table-golden-black-937893.jpg', 'Thêm chút quyến rũ cho không gian sống của bạn với chiếc bàn trưng bày này từ Nordal. Tuyệt vời để trưng bày các sắp đặt hoa chào đón trong lối vào lớn hoặc làm nổi bật các tác phẩm nghệ thuật yêu thích của bạn.\r\nKích thước: H76xØ100cm', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(9, 'Pennon Dining Table - Small - Ash', 18500000, 'pennon-dining-table-small-ash-215217.jpg', 'Tạo phong cách cho không gian vượt thời gian với bàn ăn Pennon từ ercol này. Được làm từ gỗ óc chó sẫm màu hoặc tro nhạt, bàn ăn này có hình bầu dục kiểu dáng đẹp và đơn giản.\r\nKích thước: H75xW198xD121cm', 11, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(10, 'Round Wood Dining Table - Black', 15900000, 'round-wood-dining-table-black-999239.jpg', 'Cập nhật không gian ăn uống của bạn với bàn ăn này từ Nordal. Bằng gỗ linh sam đen bóng bẩy, chiếc bàn này có thiết kế đơn giản đẹp mắt.\r\nKích thước: H76xØ120cm', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(11, 'A Conversation Piece Lounge Chair', 7800000, 'a-conversation-piece-lounge-chair-black-slate-grey-972880.jpg', 'Hãy thư giãn và thư giãn thật phong cách với chiếc ghế salon Conversation Piece này từ UMAGE. Được chế tác chuyên nghiệp từ gỗ sồi nguyên khối, nó được thiết kế để khuyến khích sự thư giãn.\r\nKích thước: H83xW70xD83cm', 20, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(12, 'Children\'s Lou Lou Ghost Chair', 6400000, 'children-s-lou-lou-ghost-chair-princess-517227.jpg', 'Tạo khu vực ghế ngồi cho những đứa trẻ nhỏ thư giãn với chiếc ghế dành cho Trẻ em Lou Lou Ghost này của Kartell. Hoàn hảo để sử dụng trong phòng chơi, phòng ngủ hoặc thậm chí là khu vực tiếp khách.\r\nKích thước: W39.6xD36.5xH62cm', 20, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(13, 'Joline Lounge Chair ', 6600000, 'joline-lounge-chair-black-241222.jpg', 'Giữ nó bình thường trong nhà với chiếc ghế Joline từ Bloomingville này. Tuyệt vời cho các nhà kính và phòng tắm nắng, nó được làm từ cây gậy đan bằng liễu gai với màu đen bóng bẩy.\r\nKích thước: H88xW60xD43cm', 15, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(14, 'Masters Chair ', 5100000, 'masters-chair-green-763985.jpg', 'Thích hợp để sử dụng ngoài trời và có nhiều màu sắc, thiết kế ghế thiết thực nhưng phong cách này cũng có thể xếp chồng lên nhau và dễ dàng cất giữ.\r\nKích thước: W57xH84xD47cm', 10, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(15, 'Velvet Aunty Chair ', 10100000, 'velvet-aunty-chair-green-155850.jpg', 'Tự hào với phần lưng cong thanh lịch và chỗ ngồi êm ái, khung kim loại được hoàn thiện bằng bề mặt nhung polyester với tông màu xanh lá cây đậm. Hoàn hảo để đặt ở hành lang hoặc như một chỗ ngồi phụ trong phòng khách.\r\nKích thước: L52xW62xH85.5cm', 15, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(16, 'Giường ngủ hiện đại bằng gỗ tự nhiên GHS-9089', 11500000, 'Giuong-ngu-hien-dai-bang-go-tu-nhien-GHS-9089-ava.png', 'Giường ngủ hiện đại có chiều cao thấp, cạnh giường được bo tròn, bề mặt láng mịn đảm bảo không gây tổn thương đến người dùng trong quá trình sử dụng. Được làm từ gỗ tự nhiên, giường ngủ có độ bền chắc ấn tượng và tuổi thọ ấn tượng.\r\nKích thước (D x R x C): 2230 x 1630 x 760 (mm)', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(17, 'Giường ngủ gỗ sồi tự nhiên chất lượng cao GHS-9046', 12500000, 'Giuong-ngu-go-soi-tu-nhien-chat-luong-cao-GHS-9046-ava.png', 'Luôn luôn thay đổi mẫu mã để đáp ứng nhu cầu thẩm mỹ của khách hàng, các mẫu giường ngủ gỗ sồi tự nhiên của Go Home mang phong cách thiết kế hiện đại cùng với kiểu dáng nhỏ gọn, tiết kiệm không gian sử dụng.\r\nKích thước (D x R x C): 2175 x 1560 x 904mm', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(18, 'Giường Gỗ tự nhiên bọc Da Hiện đại GHS-965', 13500000, 'giuong-ngu-phong-cach-hien-dai-trang-nha-ghs-965-thum.jpg', 'Chiếc giường là sự kết hợp khéo léo từ gỗ sồi tự nhiên, đệm mút, với tính hữu dụng cao có thể nằm ngủ hoặc tựa lưng thoải mái khi đọc sách, xem vô tuyến.\r\n\r\nKích thước: (D) 2280 x (R) 1960 x (C) 900', 20, 1, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(19, 'Giường ngủ hiện đại gỗ sồi tự nhiên GHS-9001', 13500000, '815G1gP7N9L._AC_SL1500_.jpg', 'Giường ngủ hiện đại gỗ sồi tự nhiên GHS-9001 chính là sản phẩm được nhiều khách hàng của Go Home đánh giá cao. Giường ngủ được làm từ gỗ sồi tự nhiên với thiết kế thêm tủ và hốc lưu trữ tiện lợi.\r\nKích thước (DxRxC): 2130 x 1800 x 950mm', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(20, 'Giường Gỗ tự nhiên, Giường Bắc Âu GHS-919', 13000000, 'giuong-go-tu-nhien-GHS-191-thum.jpg', 'Giường Gỗ tự nhiên Ghs-919 thiết kế đơn giản mà Hiện đại được làm bằng 100% Gỗ sồi tự nhiên. Kích thước sản phẩm đạt tiêu chuẩn phù hợp mọi không gian kiến trúc cho không gian nghỉ ngơi, thư giãn lý tưởng.\r\nKích thước: (D) 2000 x (R) 1500 x (C) 1000mm', 15, 1, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_permission` int(11) NOT NULL DEFAULT '1',
  `user_email_valid` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_username`, `user_password`, `user_permission`, `user_email_valid`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$12$4o/NfE4hi1kUOY4t5J3Eo.DwdVvo0GXFZxoE3mbKrBTCkC9AaiTrq', 9, 1, NULL, NULL),
(2, 'nguyencongdang12122001@gmail.com', 'dang', '$2y$12$nPZnhQRApFnj8K0aRuTlq.racC.pbO1miVYDQjD4V/rjX2oLpQora', 1, 1, '2021-06-11 08:18:03', '2021-06-12 09:42:22'),
(3, 'nguyencongdang.tdc2019@gmail.com', 'iwdang', '$2y$12$zkhQ8OEHQUjiWITqLGtOj.R2Ts6OzWqk.bryTLLCGVrK1tOEn0Qei', 1, 0, '2021-06-12 09:40:22', '2021-06-12 09:40:22');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
