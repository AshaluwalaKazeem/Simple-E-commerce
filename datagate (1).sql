-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2020 at 11:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datagate`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(1, 'shirt'),
(2, 'Shoes'),
(3, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT 1,
  `name` text NOT NULL,
  `brand` varchar(300) NOT NULL,
  `price_current` int(11) NOT NULL,
  `price_previous` int(11) NOT NULL,
  `promotion` text NOT NULL,
  `description_short` text NOT NULL,
  `description_long` longtext NOT NULL,
  `specification` text NOT NULL,
  `stock_value` varchar(200) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category`, `name`, `brand`, `price_current`, `price_previous`, `promotion`, `description_short`, `description_long`, `specification`, `stock_value`, `image1`, `image2`, `image3`, `image4`) VALUES
(16, 1, 'Your Boy is here45', 'Gucci', 300, 400, 'No Promotion', '234', '234', '2323', 'new', 'insta-2.jpg', 'rp-4.jpg', 'rp-3.jpg', 'rp-2.jpg'),
(21, 2, '23', '23', 2323, 2323, '32323', '2323', '2323', '2323', 'new', 'rp-3.jpg', 'rp-4.jpg', 'product-1.jpg', 'product-4.jpg'),
(22, 3, 'sdf', '23', 2323, 2323, '2323', '2323', '2323', '232', 'new', 'product-1.jpg', 'product-2.jpg', 'product-4.jpg', 'thumb-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_cart`
--

CREATE TABLE `users_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_brand` varchar(300) NOT NULL,
  `product_price_current` int(11) NOT NULL,
  `product_price_previous` int(11) NOT NULL,
  `product_promotion` text NOT NULL,
  `product_description_short` text NOT NULL,
  `product_description_long` longtext NOT NULL,
  `product_specification` varchar(300) NOT NULL,
  `product_stock_value` varchar(300) NOT NULL,
  `product_image1` varchar(300) NOT NULL,
  `product_image2` varchar(300) NOT NULL,
  `product_image3` varchar(300) NOT NULL,
  `product_image4` varchar(300) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_cart`
--

INSERT INTO `users_cart` (`id`, `user_id`, `product_id`, `product_name`, `product_brand`, `product_price_current`, `product_price_previous`, `product_promotion`, `product_description_short`, `product_description_long`, `product_specification`, `product_stock_value`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_quantity`) VALUES
(19, 1, 16, 'Your Boy is here', '234', 223, 223, '234', '234', '234', '2323', 'new', 'insta-2.jpg', 'rp-4.jpg', 'rp-3.jpg', 'rp-2.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_cart`
--
ALTER TABLE `users_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_cart`
--
ALTER TABLE `users_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
