-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 03:12 PM
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
-- Database: `craftmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Hand-Painted Silk Scarf', 65, 'uploads/Hand-Painted Silk Scarf.jpg'),
(2, 'Handcrafted Wooden Cutting Boa', 55, 'uploads/Handcrafted Wooden Cutting Boa.jpg'),
(3, 'Artisanal Scented Soy Candle S', 40, 'uploads/Artisanal Scented Soy Candle S.jpg'),
(4, 'Handwoven Basket', 30, 'uploads/Handwoven Basket.jpg'),
(5, 'Handmade Leather Journal', 35, 'uploads/Handmade Leather Journal.jpg'),
(6, 'Hand-Embroidered Throw Pillow', 45, 'uploads/Hand-Embroidered Throw Pillow.jpg'),
(7, 'Hand-Forged Iron Wall Hook Set', 20, 'uploads/Hand-Forged Iron Wall Hook Set.jpg'),
(8, 'Hand-Carved Stone Sculpture', 75, 'uploads/Hand-Carved Stone Sculpture.jpg'),
(9, 'Artisanal Chocolate Truffles', 20, 'uploads/Artisanal Chocolate Truffles.jpg'),
(10, 'Hand-Painted Ceramic Mug', 24, 'uploads/Hand-Painted Ceramic Mug.jpg'),
(11, 'Handcrafted Beaded Earrings', 30, 'uploads/Handcrafted Beaded Earrings.jpg'),
(12, 'Handwoven Macrame Wall Hanging', 40, 'uploads/Handwoven Macrame Wall Hanging.jpg'),
(13, 'Hand-Dyed Silk Ribbon', 15, 'uploads/Hand-Dyed Silk Ribbon.jpg'),
(14, 'Handmade Wooden Puzzle', 20, 'uploads/Handmade Wooden Puzzle.jpg'),
(15, 'Hand-Crafted Artisanal Soap Se', 30, 'uploads/Hand-Crafted Artisanal Soap Se.jpg'),
(16, 'Hand-Blown Glass Vase', 50, 'uploads/Hand-Blown Glass Vase.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_id`, `first_name`, `last_name`, `phone`, `registration_time`, `password`, `status`) VALUES
(65, 'userlearn8866@gmail.com', 'MD1', 'MD2', 0, '2024-04-18 11:35:03', 'Risen', ''),
(66, 'userlearn8877@gmail.com', 'MD3', 'MD4', 0, '2024-04-18 11:36:16', 'e10adc3949ba59abbe56e057f20f883e', ''),
(67, 'userlearn4455@gmail.com', 'Ali', 'usman', 0, '2024-04-18 11:37:37', 'e10adc3949ba59abbe56e057f20f883e', ''),
(68, 'userlearn1234@gmail.com', 'sad', 'asd', 0, '2024-04-18 12:59:32', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `status` enum('Added To Cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`id`, `user_id`, `item_id`, `status`) VALUES
(11, 67, 6, 'Confirmed'),
(17, 67, 1, 'Confirmed'),
(18, 67, 5, 'Confirmed'),
(19, 67, 6, 'Confirmed'),
(20, 67, 1, 'Confirmed'),
(23, 67, 1, 'Confirmed'),
(24, 67, 2, 'Confirmed'),
(25, 67, 9, 'Confirmed'),
(27, 68, 2, 'Confirmed'),
(28, 68, 2, 'Confirmed'),
(29, 68, 2, 'Confirmed'),
(30, 68, 3, 'Confirmed'),
(31, 68, 3, 'Confirmed'),
(32, 68, 16, 'Confirmed'),
(33, 68, 2, 'Confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `users_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_products_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
