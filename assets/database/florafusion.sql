-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 07:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florafusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `my_cart`
--

CREATE TABLE `my_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_cart`
--

INSERT INTO `my_cart` (`cart_id`, `customer_id`, `product_id`, `product_price`, `quantity`) VALUES
(16, 2, 7, 200, 7),
(43, 1, 41, 15, 1),
(44, 1, 40, 15, 1),
(50, 1, 7, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `seller_id`, `customer_id`, `product_id`, `total_amount`, `status`, `order_date`) VALUES
(1, 3, 2, 7, '1400.00', 1, '2023-10-29 14:15:35'),
(2, 3, 1, 41, '15.00', 0, '2023-10-29 14:18:49'),
(3, 3, 1, 40, '15.00', 0, '2023-10-29 14:18:49'),
(28, 3, 1, 7, '200.00', 0, '2023-11-05 14:53:50'),
(29, 3, 1, 30, '500.00', 0, '2023-11-05 14:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_des` varchar(225) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `userID`, `product_image`, `product_name`, `product_qty`, `product_price`, `product_des`, `created_date`) VALUES
(7, 3, 'plant.jpeg', 'Snake Plant', 300, 200, 'asdfghjk', '2023-10-09 11:00:30'),
(29, 13, 'cactus.jpg', 'Cactus', 250, 500, 'Cactus plant', '2023-10-09 11:52:22'),
(30, 13, 'sunrose.jpg', 'Sun Rose Plant', 250, 500, 'Sun Rose Plant', '2023-10-09 11:52:16'),
(31, 13, 'pink.jpg', 'Pink Cactus', 500, 500, 'Pink Cactus', '2023-10-09 11:52:29'),
(32, 13, 'cactus.jpg', 'sakit', 200, 400, 'sakit na cactus', '2023-10-09 11:52:35'),
(36, 13, 'bleulock.jpg', '123', 123, 123, '123123', '2023-10-09 11:52:49'),
(40, 3, 'pink.jpg', 'pitik cactus', 15, 150, 'pitik cactus', '2023-11-02 07:42:06'),
(41, 3, 'cactus.jpg', 'cactus', 15, 300, 'cactus is a blah blah', '2023-11-02 07:41:30'),
(50, 3, 'FloraFusion.jpg', 'Sunflower', 20, 240, 'sunflower', '2023-11-09 04:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `checkout_url` varchar(225) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_graph`
--

CREATE TABLE `sales_graph` (
  `graph_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `total_sales` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sold_history`
--

CREATE TABLE `sold_history` (
  `history_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `tracker_id` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_description` text DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` text NOT NULL,
  `current_add` varchar(225) NOT NULL,
  `permanent_add` varchar(225) NOT NULL,
  `contact_no` text NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `password`, `role`, `status`, `image`, `current_add`, `permanent_add`, `contact_no`, `gender`, `birthday`, `created_date`) VALUES
(1, 'kimche', 'kimche@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 'bleulock.jpg', 'mahayahay bankal lapu-lapu city', 'mahayahay bankal lapu-lapu city', '09554593878', 1, '1995-11-10', '2023-09-27 14:57:24'),
(2, 'akogwapo', 'jeff@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, '1', '', 'qqwertyui', 'qwertyui', 123456789, '1992-02-16', '2023-09-27 14:59:32'),
(3, 'jeffrey', 'jeffreyigot07@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 1, '', '', '', '', 0, '0000-00-00', '2023-09-27 15:00:20'),
(4, 'jomong', 'jomong@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, '', 'mahayahay bankal lapu-lapu city', 'mahayahay bankal lapu-lapu city', '09554593878', 1999, '0000-00-00', '2023-09-29 15:26:18'),
(5, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, '', '', '', '', 0, '0000-00-00', '2023-10-01 04:23:16'),
(6, 'janah', 'jd@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 'defaultProfilePicture.jpg', '', '', '', 0, '0000-00-00', '2023-10-02 14:50:49'),
(11, 'x', 'xx@gmail.com', '9336ebf25087d91c818ee6e9ec29f8c1', 1, 1, 'imgScreenshot 2023-09-05 224156.png', 'mahayahay bankal lapu-lapu city', 'mahayahay bankal lapu-lapu city', '09554593878', 1, '2023-12-12', '2023-10-05 10:11:26'),
(12, 'xx', 'xxx@gmail.com', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 2, 1, 'defaultProfilePicture.jpg', '', '', '', 0, '0000-00-00', '2023-10-05 10:16:10'),
(13, 'jepoy', 'jepoy@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 1, 'imgcapstone.png', 'mahayahay bankal lapu-lapu city', 'mahayahay bankal lapu-lapu city', '09554593878', 1, '1995-10-10', '2023-10-07 08:00:46'),
(14, 'jason', 'jason@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 'defaultProfilePicture.jpg', '', '', '', 0, '0000-00-00', '2023-10-07 08:31:48'),
(15, 'jason', 'dee@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, '', '', '', '', 0, '0000-00-00', '2023-10-12 13:47:51'),
(16, 'jeffrey', 'jeffreyigot08@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 'myphoto.jpg', 'mahayahay bankal lapu lapu city', 'mahayahay bankal lapu lapu city', '09554593878', 1, '1995-11-10', '2023-10-30 15:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(30, 1, 7),
(31, 1, 40),
(32, 1, 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `my_cart`
--
ALTER TABLE `my_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sales_graph`
--
ALTER TABLE `sales_graph`
  ADD PRIMARY KEY (`graph_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `sold_history`
--
ALTER TABLE `sold_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`tracker_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `my_cart`
--
ALTER TABLE `my_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_graph`
--
ALTER TABLE `sales_graph`
  MODIFY `graph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sold_history`
--
ALTER TABLE `sold_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
