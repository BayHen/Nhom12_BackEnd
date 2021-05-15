-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 11:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom_12`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Sofa', NULL, NULL),
(2, 'Table', NULL, NULL),
(3, 'Chair', NULL, NULL),
(4, 'Bed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment_rating` int(11) NOT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2021_04_12_024043_create_categories_table', 1),
(27, '2021_04_24_160356_create_orders_table', 1),
(28, '2021_04_27_020820_create_products_table', 1),
(29, '2021_04_28_020820_create_comments_table', 1),
(30, '2021_04_29_021344_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `detail_quantity` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_feature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_available`, `category_id`, `created_at`, `updated_at`, `product_feature`) VALUES
(1, 'Sofa trắng', 8000000, 'popular1.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 3, 1, NULL, NULL, 1),
(2, 'Sofa cam', 7900000, 'popular2.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 3, 1, NULL, NULL, 1),
(3, 'Sofa màu bơ đậu phộng', 8000000, 'popular3.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 5, 1, NULL, NULL, 0),
(4, 'Sofa xám', 7500000, 'popular7.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 3, 1, NULL, NULL, 1),
(5, 'Sofa cà phê', 7800000, 'popular8.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 5, 1, NULL, NULL, 1),
(6, 'Sofa vàng', 6000000, 'popular9.png', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where sh', 4, 1, NULL, NULL, 0),
(7, 'Invisible Table ', 6000000, '1323035-kartell-invisible-table-a-jp.jpg', 'Material: transparent PMMA\r\nDimensions: W100xH72xD100cm\r\nDesigned by Tokujin Yoshioka\r\nModern design with clear finish\r\nAlso available as a side table\r\nWipe carefully with a damp cloth to clean\r\nSupplier code: 05070/B4\r\nBarcode: 8058967169546\r\nBring simpl', 3, 2, NULL, NULL, 0),
(8, 'Round Wood Dining Table ', 5000000, 'round-wood-dining-table-black-999239.jpg', '4 seater dining table\r\nMaterial: fir wood, MDF, iron\r\nDimensions: H76xØ120cm\r\nPlain wooden top & legs\r\nIn a sleek black finish\r\nBrass coloured detailing connecting the legs\r\nSupplier code: 6942\r\nBarcode: 5708309148052\r\nUpdate your eating space with this d', 4, 2, NULL, NULL, 0),
(9, 'Magic Mani Table', 5500000, 'magic-mani-table-red-597718.jpg', 'Material: wood, iron\r\nDimensions: H46xW60xD60cm\r\nHand design\r\nIn red and white hues\r\nOpen compartment in the centre\r\nClassically influenced yet modern in style\r\nA celebration of the brand’s rich visual heritage\r\nExpertly handcrafted in Italy\r\nUsing the br', 6, 2, NULL, NULL, 1),
(10, 'Round Display Table', 5900000, 'round-display-table-golden-black-937893.jpg', 'Display table\r\nMaterial: iron, glass\r\nDimensions: H76xØ100cm\r\nRound in shape\r\nGlass top\r\nBrass coloured frame\r\nPerfect for large spaces\r\nSupplier code: 1894\r\nBarcode: 5708309146850\r\nAdd some glamour to your living space with this display table from Nordal', 3, 2, NULL, NULL, 0),
(11, 'Pennon Dining Table', 8000000, 'pennon-dining-table-small-ash-215217.jpg', '4-6 seater dining table\r\nMaterial: ash\r\nDimensions: H75xW198xD121cm\r\nDesigned by Norm Architects\r\nChic oval design\r\nIn pale ash wood\r\nMade in the UK\r\nSupplier code: 1811DM\r\nStyle timeless spaces with this Pennon dining table from ercol. Made from dark wal', 6, 2, NULL, NULL, 1),
(12, 'The Reader Chair', 6000000, 'the-reader-chair-black-slate-grey-386575.jpg', 'Material: solid oak, polyester, laminated veneer\r\nDimensions: H105xW78xD91cm\r\nSlate grey colour\r\nBlack oak finish\r\nLight, modern form\r\nWith a unique curved shell\r\nDesigned to reduce surrounding noise\r\nProvides a place of shelter\r\nDesigned in Denmark by To', 6, 3, NULL, NULL, 0),
(13, 'A Conversation Piece Lounge Chair', 5900000, 'a-conversation-piece-lounge-chair-black-slate-grey-972880.jpg', 'Material: solid oak, MDF, polyester, laminated veneer\r\nDimensions: H83xW70xD83cm\r\nSlate grey colour\r\nBlack oak finish\r\nErgonomic design\r\nDesigned by Anders Klem\r\nSupplier code: 5102+5503-5\r\nKick back and relax in style with this Conversation Piece lounge ', 6, 3, NULL, NULL, 1),
(14, 'Masters Chair', 7000000, 'masters-chair-green-763985.jpg', 'Material: polycarbonate 2.0 – partly obtained from ISCC certified industrial cellulose and paper waste\r\nDimensions: W57xH84xD47cm, seat height: 46cm\r\nDesigned by Philippe Starck with Eugeni Quitllet\r\nGreen colour\r\nMade from recycled materials\r\nSuitable fo', 3, 3, NULL, NULL, 1),
(15, 'Joline Lounge Chair', 4500000, 'joline-lounge-chair-black-241222.jpg', 'Chair\r\nMaterial: cane\r\nDimensions: H88xW60xD43cm\r\nWoven wicker cane design\r\nIn sleek black\r\nSupplier code: 82045986\r\nBarcode: 5711173230549\r\nKeep it casual in the home with this Joline chair from Bloomingville. Fabulous for conservatories and sun rooms, i', 6, 3, NULL, NULL, 0),
(16, 'Velvet Aunty Chair', 6700000, 'velvet-aunty-chair-green-155850.jpg', 'Chair\r\nMaterial: 100% polyester velvet\r\nDimensions: L52xW62xH85.5cm\r\nSeat height: H45cm\r\nMetal frame, upholstered legs\r\nDeep green tone\r\nMore chairs available separately\r\nSupplier code: 550-020-090\r\nBarcode: 8718142048324\r\nCreate an extra seating solution', 5, 3, NULL, NULL, 1),
(17, 'Children\'s Lou Lou Ghost Chair', 6900000, 'children-s-lou-lou-ghost-chair-princess-517227.jpg', 'Children’s chair\r\nMaterials: polycarbonate\r\nDimensions: W39.6xD36.5xH62cm\r\nSeat height: 31.7cm\r\nDesigned by Philippe Starck\r\nPink princess design\r\nMatching pieces available separately\r\nSupplier code: 0285566\r\nBarcode: 8058967237757\r\nCreate a seating area ', 6, 3, NULL, NULL, 0),
(18, 'Hand Chair', 5600000, 'hand-chair-white-533736.jpg', 'Chair\r\nMaterial: lacquered polyester\r\nDimensions: H90xØ54cm\r\nStriking hand shape\r\nIn shining white\r\nSuitable for indoor use only\r\nSupplier code: 510-020-003\r\nBarcode: 8718142060173\r\nLet us give you a helping hand in the home with this chair from Pols Pott', 5, 3, NULL, NULL, 0),
(19, 'Zinus Joseph', 7000000, '91Uf+tE-T3L._AC_SL1500_.jpg', 'Your purchase includes One Zinus Joseph Metal Platforma Bed Frame, 10-Inches in Full Size with all required tools for assembly. Mattress is not included\r\nBed frame dimensions: 54\" W x 75\" L x 10\" H. Weight limit: 500 lbs. Bed frame weight: 43lbs. Space be', 5, 4, NULL, NULL, 0),
(20, 'Charcoal Blue Linen Headboard & Platform Bed', 8000000, '71RDx5ZLK1L._AC_SL1500_.jpg', 'Your purchase includes One Home Life 51” Platform Bed with Headboard | Mattress is not included\r\nProduct dimensions – 77” L x 60” W x 51” H | Weight – 50 lbs.\r\nNo box spring required\r\nLinen platform bed with slats | Brand new - Comes in two boxes\r\nClassic', 5, 4, NULL, NULL, 0),
(21, 'Best Master Furniture Sophie Upholstered Tufted Platform Bed, Black Cal. King California', 8200000, '71hdB0WjyXL._AC_SL1500_.jpg', 'Material: Wood, fabric\r\nBed design: Platform\r\nColor: Beige, Black, Grey\r\nFabric type: Linen Blend', 5, 4, NULL, NULL, 1),
(22, 'DHP Rose Linen Tufted Upholstered Platform Bed, Button Tufted Headboard and Footboard with Wooden Slats', 9000000, '8105i83ezgL._AC_SL1500_.jpg', 'Contemporary design in linen upholstery with tufted details.\r\nBentwood slat system provides great ventilation. Slat bases allow air to pass freely beneath your bed, keeping your mattress fresher longer.\r\nVery good back support with excellent pressure dist', 6, 4, NULL, NULL, 1),
(23, 'Classic Brands Coventry Upholstered Platform Bed', 8900000, '81Anz0h+WOL._AC_SL1500_.jpg', 'This timeless sleek design upholstered headboard and bed frame makes a statement in any bedroom space\r\nDurable wood slat foundation with sturdy center support can be used with any size mattress; rectangular headboard reaches a little over 4-feet; 8-inch s', 5, 4, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_permission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
