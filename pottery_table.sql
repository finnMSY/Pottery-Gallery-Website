-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 09:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pottery_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Username`, `Password`, `email`) VALUES
(2, 'admin', '$2y$10$vYc1PRqFt04FI3A75BwQbOGI9AofV4eCMEY95fYsJOgFLjQKktGtu', 'admin'),
(97, 'TigerLord', '$2y$10$vYc1PRqFt04FI3A75BwQbOGI9AofV4eCMEY95fYsJOgFLjQKktGtu', 'fmassey6@gmail.com'),
(113, 'Sammy', '$2y$10$WtRa3rN09jtPfPbxyx6P9OG2jbRALGag/JAtKC72qSUaZaK/3s2Au', 'hello@gmail.com'),
(114, 'world', '$2y$10$2JvVxZiQUKu//fedE.PE3OI35WXWo7USTEmLGTuFB23eAEfqf.Ct6', 'eee@eggman.com');

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `account_id`, `name`, `email`, `phone`, `address1`, `address2`, `town`, `country`) VALUES
(2, 97, 'Finn Richard Minson Massey', 'fmassey6@gmail.com', '0276124646', '40 Jamieson Road', 'Mahurangi West 0983', 'Auckland', 'New Zealand'),
(6, 113, 'Samuel Williamson', 'bruh@yahoo.com', '0800838383', '69 YourMomsHouse Road', '0969', '420 City', 'Bruh Land'),
(7, 2, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `category` varchar(20) NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `value`, `name`, `text`, `image`, `price`, `category`, `total_quantity`) VALUES
(1, 1, 'cup1', 'this is cup1', 'cup1.JPG', '4.00', 'cup', 20),
(2, 2, 'Bowl1', 'this is bowl1', 'bowl1.JPG', '36.00', 'bowl', 20),
(3, 3, 'plate1', 'this is plate1', 'plate1.JPG', '30.00', 'plate', 20),
(4, 4, 'cup2', 'this is a mat', 'cup2.JPG', '10.00', 'cup', 15),
(5, 5, 'bowl2', 'the is a hand', 'bowl2.JPG', '6.50', 'bowl', 15),
(6, 6, 'cup3', 'this is something', 'cup3.JPG', '55.00', 'cup', 15),
(7, 7, 'cup4', 'this is an aaron', 'cup4.JPG', '59.00', 'cup', 10),
(8, 8, 'plate2', 'this is a product', 'plate2.jpg', '13.00', 'plate', 10),
(28, 9, 'bowl3', 'this is product 9', 'bowl3.JPG', '8.00', 'bowl', 10),
(44, 10, 'cup5', 'this is product 10', 'cup5.JPG', '8.00', 'cup', 20),
(45, 11, 'cup6', 'A pretty girl', 'cup6.JPG', '130.00', 'cup', 20),
(49, 12, 'bowl4', 'this is a gg', 'bowl4.JPG', '60.00', 'bowl', 50),
(307, 13, 'cup7', 'this is cup7', 'cup7.JPG', '4.00', 'cup', 22),
(308, 14, 'plate3', 'palte3', 'plate3.JPG', '12.00', 'plate', 20),
(310, 16, 'cup8', 'this is cup8', 'cup8.jpg', '13.00', 'cup', 21),
(314, 17, 'cup9', 'this is a cup 9', 'cup9.jpg', '13.00', 'cup', 20),
(315, 18, 'Elephant', 'this is an elephant', 'download.jpeg', '12.00', 'plate', 22),
(316, 19, 'New Product ', 'This is a new product ', 'NewProduct.jpeg', '15.00', 'cup', 20);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Username`, `Email`, `Phone`, `Query`) VALUES
(3, 'TigerLord', 'fmassey6@gmail.com', '0276124646', 'the efjehwbfhjwebfhjwebfhjwebfhjwbefhjbwehfjwbefjhwbejhfbwjhebfjhwebfjhwebfjhwebfhwjebfw'),
(12, 'admin', 'fd', '6565', 'dfd'),
(13, 'admin', 'fd', '545', 'hhhhh'),
(19, 'dick', 'fmassey6@gmail.com', '6565', 'your names are working lol\r\n'),
(21, 'TigerLord', 'email@gmail.com', '027666666', 'Query');

-- --------------------------------------------------------

--
-- Table structure for table `global_cart`
--

CREATE TABLE `global_cart` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `global_cart`
--

INSERT INTO `global_cart` (`id`, `account_id`, `product_id`, `quantity`) VALUES
(90, 2, 2, 2),
(91, 2, 8, 3),
(92, 2, 28, 6),
(93, 97, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pagename` varchar(50) NOT NULL,
  `pagenum` int(11) NOT NULL,
  `title1` varchar(150) NOT NULL,
  `paragraph1` text NOT NULL,
  `image1` varchar(50) NOT NULL,
  `title2` varchar(150) NOT NULL,
  `paragraph2` text NOT NULL,
  `image2` varchar(50) NOT NULL,
  `title3` varchar(150) NOT NULL,
  `paragraph3` text NOT NULL,
  `image3` varchar(100) NOT NULL,
  `navlink1` varchar(15) NOT NULL,
  `navlink2` varchar(15) NOT NULL,
  `navlink3` varchar(15) NOT NULL,
  `client_phone` varchar(30) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `client_instagram` varchar(30) NOT NULL,
  `client_facebook` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pagename`, `pagenum`, `title1`, `paragraph1`, `image1`, `title2`, `paragraph2`, `image2`, `title3`, `paragraph3`, `image3`, `navlink1`, `navlink2`, `navlink3`, `client_phone`, `client_email`, `client_instagram`, `client_facebook`) VALUES
(9, 'About Page', 2, 'About the Creator', 'My name is Rachel, and I am a local potter who has spent <br>\r\nmany years passionately investing time into this craft I love <br>\r\nso much. I live in the country and enjoy nature and all <br>\r\nthe beauty it offers. I try to show this within my work <br>\r\nas best as I can so I can show all of you the beauty <br>\r\nthat resides itself within nature and all that is living.', 'image1.png', 'The Workshop', 'I create my pottery at my house in <br>\r\n the country which gives me the opportunity to get <br>\r\n inspired every single day. I do this with  my own  <br> \r\nequipment and then bake my clay within a workshop <br>\r\nin Matakana making sure I keep within  the local area.', 'image2.png', 'The Enviroment', 'I put a lot of effort into my work to make sure<br>\r\n it is perfect, pleasing to look at, and useful. <br>\r\n  I hope that you all enjoy my work <br>\r\nas that is my main priority.', 'image3.png', '', '', '', '', '', '', ''),
(10, 'Contact Page', 3, '', '', '', '', '', '', '', '', '', '', '', '', '024683927', 'pakiriclay@gmail.com', 'instagram.com/PakiriClay', 'facebook.com/PakiriClay'),
(14, 'Navigation', 5, '', '', '', '', '', '', '', '', '', 'About', 'Store', 'Contact', '', '', '', ''),
(15, 'Store Page', 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Index Page', 1, 'Usefuld', 'Pottery that can actually be used in your daily life<br>\r\n while being built to last the test of time. ', 'Image1.png', 'Stylish', 'Pottery that can turn your house and  <br>\r\nyour life into a spectacular work of modern art.\r\n', 'Image2.png', 'Made for you', 'Pottery that is made with passion and precision<br>\r\n to make sure you get the best possible product.\r\n', 'Image3.png', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_cart`
--
ALTER TABLE `global_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`) USING BTREE,
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pagenum` (`pagenum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `global_cart`
--
ALTER TABLE `global_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_info`
--
ALTER TABLE `account_info`
  ADD CONSTRAINT `account_info_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`ID`);

--
-- Constraints for table `global_cart`
--
ALTER TABLE `global_cart`
  ADD CONSTRAINT `global_cart_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`ID`),
  ADD CONSTRAINT `global_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `cart_products` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`ID`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `cart_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
