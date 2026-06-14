-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 06:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 1),
(4, 2, 1),
(5, 18, 1),
(6, 16, 1),
(7, 8, 1),
(8, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `address`, `total_amount`, `order_date`, `latitude`, `longitude`, `status`, `user_id`, `total_price`) VALUES
(1, 'Sudiksha', '1234', 100.00, '2026-06-13 03:42:33', '28.6', '77.2', 'Delivered', NULL, NULL),
(2, NULL, NULL, NULL, '2026-06-13 05:46:53', '30.342055000000002', '78.385122', 'Delivered', 2, 299.00),
(3, NULL, NULL, NULL, '2026-06-13 05:53:51', '30.342055000000002', '78.385122', 'Delivered', 2, 350.00),
(4, 'Sudiksha Pundir', 'Lat: 30.341965, Lon: 78.38509', NULL, '2026-06-13 11:22:22', NULL, NULL, 'Delivered', NULL, NULL),
(5, 'khushiiii', 'Lat: 30.341954, Lon: 78.385082', NULL, '2026-06-14 03:45:51', NULL, NULL, 'Delivered', NULL, NULL),
(6, 'Sudiksha Pundir', 'Lat: 30.341954, Lon: 78.385082', NULL, '2026-06-14 04:00:38', NULL, NULL, 'Pending', NULL, NULL),
(7, 'Sudiksha Pundir', 'Lat: 30.341954, Lon: 78.385082', NULL, '2026-06-14 04:04:01', NULL, NULL, 'Pending', NULL, NULL),
(8, NULL, NULL, NULL, '2026-06-14 04:07:20', '28.6', '77.2', 'Pending', 1, NULL),
(9, NULL, NULL, NULL, '2026-06-14 04:08:53', 'latitude', 'longitude', 'Pending', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`) VALUES
(1, 'Milk', 35, 'milk.jpg', 0),
(2, 'Onions', 30, 'onion.jpg', 0),
(3, 'Baby Onions', 25, 'babyonion.jpg', 0),
(4, 'Potatoes', 20, 'potatoes.jpg', 0),
(5, 'Tomatoes', 30, 'tomatoes.jpg', 0),
(6, 'Spring Onions', 25, 'spring onion.jpg', 0),
(7, 'Paneer', 95, 'paneer.jpg', 0),
(8, 'Curd', 19, 'curd.jpg', 0),
(9, 'Yoghurt', 35, 'yoghurt.jpg', 0),
(10, 'Condensed Milk', 76, 'condensedmilk.jpg', 0),
(11, 'Ghee', 105, 'ghee.jpg', 0),
(12, 'Yellow Butter', 30, 'yellowbutter.jpg', 0),
(13, 'Cheese', 26, 'cheese.jpg', 0),
(14, 'Cabbage', 15, 'cabbage.jpg', 0),
(15, 'Cauliflower', 18, 'cauliflower.jpg', 0),
(16, 'Green Chillies', 10, 'green chillies.jpg', 0),
(17, 'Red Dried Chillies', 13, 'dried chillies.jpg', 0),
(18, 'Coriander', 9, 'coriander.jpg', 0),
(19, 'Headphones', 899, 'headphones.jpg', 0),
(20, 'Earphones', 356, 'earphones.jpg', 0),
(21, 'Neckband', 599, 'neckband.jpg', 0),
(22, 'Light Bulb', 39, 'bulb.jpg', 0),
(23, 'Tube Light', 240, 'tube light.jpg', 0),
(24, 'Electric Razor', 934, 'trimmer.jpg', 0),
(25, 'Led Strip', 399, 'led strip.jpg', 0),
(26, 'Toaster', 650, 'toaster.jpg', 0),
(27, 'Noise Earbuds', 367, 'earbuds.jpg', 0),
(28, 'Hair Dryer', 489, 'hair dryer.jpg', 0),
(29, 'Electric Iron', 699, 'iron.jpg', 0),
(30, 'Hair Straightener', 599, 'hair straightener.jpg', 0),
(31, 'Face Wash', 213, 'face wash.jpg', 0),
(32, 'Moisturizer', 350, 'Moisturizer.jpg', 0),
(33, 'Toner', 189, 'toner.jpg', 0),
(34, 'Face Serum', 487, 'Face serum.jpg', 0),
(35, 'Foundation', 423, 'foundation.jpg', 0),
(36, 'Shampoo', 206, 'shampoo.jpg', 0),
(37, 'Conditioner', 190, 'conditioner.jpg', 0),
(38, 'Concealer', 312, 'concealer.jpg', 0),
(39, 'Cotton Pads', 92, 'cottonpads.jpg', 0),
(40, 'Wishcare Lip Balm', 289, 'lip balm.jpg', 0),
(41, 'Hair Oil', 156, 'hair oil.jpg', 0),
(42, 'Lipstick', 200, 'lipstick.jpg', 0),
(43, 'Face Powder', 561, 'face powder.jpg', 0),
(44, 'Diet Coke', 40, 'dietcoke.jpg', 0),
(45, 'Lays ', 69, 'lays.jpg', 0),
(47, 'kurkure', 79, 'kurkure.jpg', 0),
(48, 'Popcorn', 32, 'popcorn.jpg', 0),
(49, 'Red Velvet cake', 429, 'Red velvet.jpg', 0),
(50, 'Dairy Milk Gift Hamper ', 90, 'dairymilk.jpg', 0),
(51, 'Ferrero Rocher', 110, 'ferrero rocher.jpg', 0),
(52, 'Fanta', 40, 'fanta.jpg', 0),
(53, 'Sprite', 40, 'sprite.jpg', 0),
(54, 'Fruit Cake', 565, 'fruit cake.jpg', 0),
(55, 'Strawberry Cake', 662, 'strawberry cake.jpg', 0),
(56, 'Namkeen Mixture', 43, 'mixture.jpg', 0),
(57, 'Bhujia', 40, 'bhujia.jpg', 0),
(58, 'Coca Cola', 40, 'cocacola.jpg', 0),
(59, 'Dark Chocolate', 45, 'darkchocolate.jpg', 0),
(60, 'Chocolate Overload Cake', 467, 'chocolateoverloadcake.jpg', 0),
(61, 'Frooti', 40, 'frooti.jpg', 0),
(62, 'Chocolate Overload Cake', 467, 'chocolateoverloadcake.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'consumer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`, `role`) VALUES
(1, 'Sudiksha', '9456552220', '$2y$10$gbiJIbQ98r.8QdxjGF9qb.ozE8qCQrg1DfYvXGoHsBPdnZniuufeW', 'retailer'),
(2, 'Sudiksha Pundir', '9837951634', '$2y$10$MsKQdghddydQwGRWXDhrz.vTcrgXKfoA3HtT9hrQqiOYPCn3GSAiC', 'consumer'),
(3, 'Sudiksha Pundir', '9837951634', '$2y$10$a5L0mZtgjqqbZe6QsIKoQuHPyyFbX2ySx.zOPAyeZlLNaswtFbqqK', 'consumer'),
(4, 'Sudiksha', '9837951634', '$2y$10$t2Z.hirCQ9K.gK/bAw44ROJVEXgEwUzFn7lXukQuXjI1ifASxK.YS', 'consumer'),
(5, 'Khushi', '2345165752', '$2y$10$V7I0zn2c.3eIzd/qJuqamuVLLrLLnN4i2mownanlE1m1.07NT15e2', 'retailer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
