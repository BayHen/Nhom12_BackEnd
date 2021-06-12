-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 12, 2021 lúc 04:24 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available` int(11) NOT NULL,
  `product_feature` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_available`, `product_feature`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Sofa Trắng', 8500000, 'popular1.png', 'Mill Oil là bộ tản nhiệt đầy dầu cải tiến với công nghệ hiện đại nhất. Nếu bạn đang tìm kiếm thứ gì đó có thể làm cho nội thất của bạn trông tuyệt vời, đồng thời.', 10, 1, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(2, 'Sofa Đỏ', 8421182, 'popular2.png', 'Mill Oil là bộ tản nhiệt đầy dầu cải tiến với công nghệ hiện đại nhất. Nếu bạn đang tìm kiếm thứ gì đó có thể làm cho nội thất của bạn trông tuyệt vời, đồng thời.\r\n', 15, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(3, 'Sofa Xanh', 7200000, 'popular3.png', 'Mill Oil là bộ tản nhiệt đầy dầu cải tiến với công nghệ hiện đại nhất. Nếu bạn đang tìm kiếm thứ gì đó có thể làm cho nội thất của bạn trông tuyệt vời, đồng thời.', 20, 1, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(4, 'Sofa Vàng', 9000000, 'popular9.png', 'Mill Oil là bộ tản nhiệt đầy dầu cải tiến với công nghệ hiện đại nhất. Nếu bạn đang tìm kiếm thứ gì đó có thể làm cho nội thất của bạn trông tuyệt vời, đồng thời.', 13, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(5, 'Sofa Xanh Rêu', 6500000, 'popular8.png', 'Mill Oil là bộ tản nhiệt đầy dầu cải tiến với công nghệ hiện đại nhất. Nếu bạn đang tìm kiếm thứ gì đó có thể làm cho nội thất của bạn trông tuyệt vời, đồng thời.\r\n', 10, 0, 1, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(6, 'Invisible Table', 22125965, '1323035-kartell-invisible-table-a-jp.jpg', 'Chiếc bàn vô hình được tạo ra bởi nghệ sĩ và nhà thiết kế người Nhật Tokujin Yoshioka cho công ty Kartell của Ý. Bàn vô hình được tạo ra bằng cách sử dụng một khuôn đúc công nghiệp duy nhất', 10, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(7, 'Magic Mani Table - Red', 40948304, 'magic-mani-table-red-597718.jpg', 'Thêm một số kịch tính suy đồi vào ngôi nhà của bạn với chiếc bàn Magic Mani này từ Fornasetti. Được làm thủ công tại Ý, chiếc bàn này có họa tiết bàn tay độc đáo với một ngăn mở ở trung tâm.', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(8, 'Round Display Table - Golden/Black', 18988908, 'round-display-table-golden-black-937893.jpg', 'Thêm chút quyến rũ cho không gian sống của bạn với chiếc bàn trưng bày này từ Nordal. Tuyệt vời để trưng bày các sắp đặt hoa chào đón trong lối vào lớn hoặc làm nổi bật các tác phẩm nghệ thuật yêu thích của bạn.', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(9, 'Pennon Dining Table - Small - Ash', 138530195, 'pennon-dining-table-small-ash-215217.jpg', 'Tạo phong cách cho không gian vượt thời gian với bàn ăn Pennon từ ercol này. Được làm từ gỗ óc chó sẫm màu hoặc tro nhạt, bàn ăn này có hình bầu dục kiểu dáng đẹp và đơn giản.', 11, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(10, 'Round Wood Dining Table - Black', 15879613, 'round-wood-dining-table-black-999239.jpg', 'Cập nhật không gian ăn uống của bạn với bàn ăn này từ Nordal. Bằng gỗ linh sam đen bóng bẩy, chiếc bàn này có thiết kế đơn giản đẹp mắt.', 15, 0, 2, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(11, 'A Conversation Piece Lounge Chair', 27761562, 'a-conversation-piece-lounge-chair-black-slate-grey-972880.jpg', 'Hãy thư giãn và thư giãn thật phong cách với chiếc ghế salon Conversation Piece này từ UMAGE. Được chế tác chuyên nghiệp từ gỗ sồi nguyên khối, nó được thiết kế để khuyến khích sự thư giãn.', 20, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(12, 'Children\'s Lou Lou Ghost Chair', 6301874, 'children-s-lou-lou-ghost-chair-princess-517227.jpg', 'Tạo khu vực ghế ngồi cho những đứa trẻ nhỏ thư giãn với chiếc ghế dành cho Trẻ em Lou Lou Ghost này của Kartell. Hoàn hảo để sử dụng trong phòng chơi, phòng ngủ hoặc thậm chí là khu vực tiếp khách.', 20, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(13, 'Joline Lounge Chair ', 6635013, 'joline-lounge-chair-black-241222.jpg', 'Giữ nó bình thường trong nhà với chiếc ghế Joline từ Bloomingville này. Tuyệt vời cho các nhà kính và phòng tắm nắng, nó được làm từ cây gậy đan bằng liễu gai với màu đen bóng bẩy.', 15, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(14, 'Masters Chair ', 5052604, 'masters-chair-green-763985.jpg', 'Thích hợp để sử dụng ngoài trời và có nhiều màu sắc, thiết kế ghế thiết thực nhưng phong cách này cũng có thể xếp chồng lên nhau và dễ dàng cất giữ.', 10, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(15, 'Velvet Aunty Chair ', 9966400, 'velvet-aunty-chair-green-155850.jpg', 'Tự hào với phần lưng cong thanh lịch và chỗ ngồi êm ái, khung kim loại được hoàn thiện bằng bề mặt nhung polyester với tông màu xanh lá cây đậm. Hoàn hảo để đặt ở hành lang hoặc như một chỗ ngồi phụ trong phòng khách.', 15, 0, 3, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(16, 'Upholstered Button Tufted Platform Bed with Headboard Strong Wood Slat Support Mattress Foundation Easy Assembly Light Grey Twin', 2271424, '71XkPPFcttL._AC_SL1201_.jpg', 'Giường bọc nệm: thanh gỗ cứng và chắc chắn hỗ trợ vải bền\r\nGiường bọc nệm cỡ đôi ： món quà hoàn hảo cho bất kỳ ai cần khung giường cao cấp hoặc muốn nâng cấp khung hiện tại của họ. ', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(17, 'VECELO Twin Size Bed Frame Metal Platform Mattress Foundation with Headboard & Footboard/Easy Assemble, Black', 2498131, '81m6CY6ctvL._AC_SL1500_.jpg', 'Khung chân giường có thảm cao su chống xước: Thảm cao su bảo vệ có thể bảo vệ sàn nhà của bạn và giúp giường không bị trượt. Giải quyết vấn đề ồn ào / có tiếng kêu và ổn định hơn.', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(18, 'Zinus Platform, Steel, Black, Queen', 5000400, '91Uf+tE-T3L._AC_SL1500_.jpg', 'Băng đệm xốp được thêm vào khung thép để sử dụng không gây tiếng ồn và băng chống trượt trên các thanh gỗ ngăn không cho đệm của bạn di chuyển', 20, 1, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11'),
(19, 'DG Casa Cosmo Upholstered Platform Bed Frame Base with Storage Drawers, Queen Size in Beige Linen Style Fabric', 7200600, '815G1gP7N9L._AC_SL1500_.jpg', 'Đế khung giường nền cỡ Queen bằng vải lanh màu be với 4 ngăn kéo để đựng đồ tiện lợi như khăn trải giường, quần áo, giày dép hoặc sách', 15, 0, 4, '2021-06-01 00:43:50', '2021-06-04 01:30:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_username`, `user_password`, `user_permission`, `user_email_valid`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$12$4o/NfE4hi1kUOY4t5J3Eo.DwdVvo0GXFZxoE3mbKrBTCkC9AaiTrq', 9, 1, NULL, NULL),
(2, 'nguyencongdang12122001@gmail.com', 'dang', '$2y$12$nPZnhQRApFnj8K0aRuTlq.racC.pbO1miVYDQjD4V/rjX2oLpQora', 1, 0, '2021-06-11 08:18:03', '2021-06-11 08:18:03');

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
