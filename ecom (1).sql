-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2022 at 03:16 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--
CREATE DATABASE IF NOT EXISTS `ecom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Women ', 1),
(2, 'Men ', 1),
(3, 'Kids ', 1),
(4, 'Girls', 1),
(5, 'BottomWear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL COMMENT 'mobile',
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(2, 'akansha', 'akansha@gmail.com', '7089909845', 'Test Query', '2022-03-31 00:00:00'),
(3, 'Pragya Singh', 'psingh272001@gmail.com', '7647893783', 'hii', '2022-04-25 02:50:30'),
(4, 'tina', 'tt12@gmail.com', '8904590390', 'dsfd', '2022-04-26 05:16:05'),
(5, 'tina', 'tt12@gmail.com', '8904590390', 'dsfd', '2022-04-26 05:16:43'),
(6, 'Siya', 'ss@gmail.com', '7893409890', 'This is great', '2022-04-26 05:19:10'),
(7, 'Aman', 'aman7890@gmail.com', '56907890498', 'Good great', '2022-04-26 05:21:50'),
(11, 'Ram', 'ram@gmail.com', '8906745212', 'juhsjfhlklhaf', '2022-04-27 06:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `paytm_status` varchar(10) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `paytm_status`, `added_on`) VALUES
(1, 3, 'Gonda', 'Gonda/up', 1101, 'cod', 6998, 'success', 2, '', '', '2022-04-29 09:06:57'),
(2, 5, 'delhi', 'delhi', 345600, 'COD', 599, 'Success', 5, '', '', '2022-04-29 09:17:40'),
(3, 3, 'Gonda', 'Gonda/up', 345600, 'COD', 999, 'Success', 4, '', '', '2022-04-29 09:27:34'),
(4, 3, 'Agra', 'UP', 345600, 'COD', 1999, 'Success', 3, '', '', '2022-04-30 01:43:42'),
(10, 1, 'Kanpur', 'Kanpur/UP', 345600, 'COD', 1999, 'Success', 5, '', '', '2022-04-30 03:20:21'),
(11, 1, 'Dwarka Sector 5', 'Delhi', 11011, 'COD', 999, 'Success', 1, '', '', '2022-05-02 05:38:29'),
(12, 1, 'Gwalior', 'MP', 34333, 'PayTm', 999, 'Success', 1, '', '', '2022-05-06 04:51:29'),
(13, 1, 'Mp', 'Mp', 345235, 'PayTm', 599, 'Success', 1, '', '', '2022-05-06 04:56:40'),
(14, 1, 'LUcknow', 'UP', 20002, 'PayTm', 2499, 'Success', 1, '', '', '2022-05-06 05:58:12'),
(15, 3, 'Pune', 'Maharastra', 45007, 'PayTm', 1797, 'Success', 1, '', '', '2022-05-06 07:46:50'),
(16, 3, 'Kanpur', 'Kanpur/UP', 123456, 'PayTm', 1999, 'Pending', 1, '', '', '2022-05-06 08:13:48'),
(17, 3, 'Agra', 'UP', 123456, 'PayTm', 599, 'Success', 1, '20220506111212800110', 'Success', '2022-05-06 08:17:06'),
(19, 3, 'Kanpur', 'Kanpur/UP', 123456, 'PayTm', 999, 'Success', 1, '20220506111212800110', 'Success', '2022-05-06 09:42:14'),
(20, 5, 'My Address', 'UP', 1234, 'PayTm', 2499, 'Success', 1, '20220506111212800110', 'Success', '2022-05-06 01:47:56'),
(22, 1, 'Hno111 Ghandhi Marg', 'Rewa/Mp', 12377, 'PayTm', 4499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 06:46:08'),
(23, 1, 'My Address', 'Jhansi', 284003, 'PayTm', 2499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 06:53:17'),
(24, 1, 'Gonda', 'Gonda/up', 78990, 'PayTm', 2499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 06:55:18'),
(25, 1, 'Kanpur', 'Kanpur/UP', 344443, 'PayTm', 2499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:00:05'),
(26, 1, 'Gonda', 'Kanpur/UP', 43532, 'PayTm', 2499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:02:28'),
(27, 3, 'My Address', 'delhi', 23432, 'PayTm', 1999, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:04:02'),
(28, 3, 'Gonda', 'UP', 243343525, 'PayTm', 2499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:08:24'),
(29, 1, 'My Address', 'Kanpur/UP', 32425, 'PayTm', 4499, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:11:34'),
(30, 3, 'Agra', 'Gonda/up', 23234, 'PayTm', 599, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:13:26'),
(31, 1, 'Agra', 'up', 1213, 'PayTm', 4498, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:15:01'),
(32, 5, 'Agra', 'Kanpur/UP', 11, 'PayTm', 999, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 07:18:29'),
(33, 5, 'Kanpur', 'Kanpur/UP', 43524, 'PayTm', 1999, 'Success', 1, '20220507111212800110', 'Success', '2022-05-07 01:25:52'),
(34, 5, 'Kanpur', 'Kanpur/UP', 1234567, 'PayTm', 1998, 'Success', 1, '20220508111212800110', 'Success', '2022-05-08 08:03:20'),
(35, 1, 'My Address', 'delhi', 13256, 'PayTm', 1999, 'Success', 1, '20220509111212800110', 'Success', '2022-05-09 07:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL COMMENT 'added_on',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product`, `qty`, `price`) VALUES
(1, 1, 2, 1, 2499),
(2, 1, 4, 1, 4499),
(3, 3, 7, 1, 999),
(4, 4, 9, 1, 1999),
(5, 6, 2, 6, 2499),
(6, 7, 9, 1, 1999),
(7, 8, 8, 1, 599),
(8, 9, 7, 5, 999),
(9, 10, 9, 1, 1999),
(10, 11, 7, 1, 999),
(11, 12, 7, 1, 999),
(12, 13, 8, 1, 599),
(13, 14, 2, 1, 2499),
(14, 15, 8, 3, 599),
(15, 16, 9, 1, 1999),
(16, 17, 8, 1, 599),
(17, 18, 2, 1, 2499),
(18, 19, 7, 1, 999),
(19, 20, 2, 1, 2499),
(20, 21, 8, 1, 599),
(21, 22, 4, 1, 4499),
(22, 23, 2, 1, 2499),
(23, 24, 2, 1, 2499),
(24, 25, 2, 1, 2499),
(25, 26, 2, 1, 2499),
(26, 27, 9, 1, 1999),
(27, 28, 2, 1, 2499),
(28, 29, 4, 1, 4499),
(29, 30, 8, 1, 599),
(30, 31, 9, 1, 1999),
(31, 31, 2, 1, 2499),
(32, 32, 7, 1, 999),
(33, 33, 9, 1, 1999),
(34, 34, 14, 2, 999),
(35, 35, 9, 1, 1999);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(2, 2, 'Floral Shirt', 2999, 2499, 2, 'is.jpg', 'Ralph Lauren', 'Floral Pastel Color Shirt for men ', 'Hawai shirt', 'white', 'Ralph Lauren Summer Collection', 1),
(3, 2, 'Check Shirt ', 2499, 1199, 4, 'sd.jpg', 'Check Shirt for men', 'Gray and white check Shirt', 'Shirt', 'Half sleeves Shirt', 'Shirt', 1),
(4, 1, 'Maxi Dress', 4999, 4499, 2, 'p1.jpg', 'ZARA', 'Maxi Floral Dress', 'Blue Floral Print', 'Maxi Dress', 'Summer Collection', 1),
(5, 4, 'Frock', 999, 799, 4, 'g1.jpg', 'Gini & Jony', 'Frock for girls', 'Frock', 'Pink Frock', 'Frock', 1),
(6, 4, 'Jeans Top ', 1599, 1199, 2, 'g2.jpg', 'Lilliput', 'Jeans Top Shrug', 'Red Top with Jeans', 'Jeans ', 'Jeans Top', 1),
(7, 3, 'Traditional Wear', 1899, 999, 3, 'g6.jfif', 'Lilliput', 'Traditional Wear', 'Dhoti Kurta', 'Red Kurta', 'Traditional Wear', 1),
(8, 3, 'A-line Dress', 899, 599, 2, 'g7.jpg', 'Nino Bambino', 'Blue Yellow Green', 'A-line Dress', 'A-line Dress', '2-5yrs', 1),
(9, 1, 'Dress', 2999, 1999, 3, 'p2.jpg', 'BIBA', 'Gown', 'Peach Color', 'A-line Dress', 'Dress', 1),
(10, 5, 'Jeans', 2999, 2199, 10, 'IMG-20220504-WA0016.jpg', 'PePe Jeans', 'Elevate the Uber-cool appeal of your outfit with these jeans. Exhibiting a lightly washed finish on its straight fit fabrication, these mid-rise jeans are made from cotton, poleyster and elastane. Black Jeans', 'Material: Cotton Blend, Denim', 'Leg Style: Straight Leg', 'Jeans, Denim, Black', 1),
(11, 2, 'Shirt for men', 1999, 1599, 12, 'IMG-20220504-WA0015.jpg', 'Allen Solly', 'The Finest Grade Cotton Used. Lightweight Shirt is probably the most comfortable of all season fabrics because it absorbs its own weight in moisture and wicks it away rapidly.', 'Men Shirt', 'Blue Shirt', 'Long Sleeve', 1),
(12, 2, 'Hubberholme Mandarin Collar Shirt', 999, 599, 12, 'IMG-20220504-WA0014.jpg', 'Peter England', 'Full Sleeves Neck Collar Fit regular Fabric 100% Cotton Country of Origin India. Care Info Machine Wash upto 30 degree gentle cycle, wash inside out, wash dark colors seperately, do not bleach, tumble dry low, warm iron. 100% Original Products', 'Collar Shirt', 'Full Sleeves', 'Cotton Shirt', 1),
(13, 2, 'Suit for Men', 19999, 17999, 9, 'IMG-20220504-WA0013.jpg', 'Blackberry', 'Suit: Front Style: Flat Pant Closure. Zipper Fly Material Acetate Closure. Smart Casual. Singly Breasted.', 'Blue Suit', 'Length:Regular', 'Smart Casual Formal Look', 1),
(14, 1, ' Dress', 1299, 999, 12, 'IMG-20220504-WA0009.jpg', 'Fab Alley', 'Add an extra touch to your luxury to your upcoming events with the Revolve Around me dress! This Gorgeous Maxi Dress features an A-line silhouette with a faux wrap bodice and sash-like waist tie. The finished look is soft,cinched in and perfect for formal occasions', 'Maxi Dress', '', 'V-neck Neckline', 1),
(15, 1, 'AKS 3-piece Clothing Set', 2999, 1599, 12, 'IMG-20220504-WA0008.jpg', 'Nykaa Fashion', 'It speaks about fashion along with elegance and royalty. The collection epitomizes the spirit of true Indian women with a blend of traditional finesse & edgy designs which is tailored by hands for discrete detailing. Traditional Wear.', 'Traditional Wear.', '3-piece Clothing Set', 'Size Regular', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_name`, `comment`, `added_on`) VALUES
(1, 9, 'Pragya', 'Great Product, Superb!!', '2022-05-07 06:04:55'),
(2, 9, 'Shreya Singh', 'Amazing product.', '2022-05-07 06:35:06'),
(3, 9, 'Akansha', 'Good Fabric', '2022-05-07 06:35:40'),
(4, 9, 'Riya', 'Must Buy Product', '2022-05-07 06:36:00'),
(5, 9, 'Siya', 'Wonderfull', '2022-05-07 06:36:21'),
(6, 9, 'Pragya', 'good', '2022-05-07 01:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL COMMENT 'added_on',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `cpassword`, `email`, `mobile`, `added_on`) VALUES
(1, 'Pragya', 'fof', 'fof', 'psingh272001@gmail.com', '8903248902', '2022-04-01 00:00:00'),
(2, 'Riya', 'riya', 'riya', 'rr@gmail.com', '8906745212', '0000-00-00 00:00:00'),
(3, 'Shreya Singh', 'shreya', 'shreya', 'ss@gmail.com', '7893409890', '2022-04-26 08:07:00'),
(4, 'Akansha Saxena', 'aka', 'aka', 'akansha@gmail.com', '7894058940', '2022-04-27 11:10:47'),
(5, 'aa', 'aa', 'aa', 'aa1@gamil.com', '7890789078', '2022-04-27 11:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'added_on',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(3, 1, 2, '2022-05-07 07:03:11'),
(4, 5, 7, '2022-05-07 01:28:56'),
(5, 5, 8, '2022-05-07 01:28:57'),
(6, 5, 10, '2022-05-08 03:47:45'),
(7, 5, 9, '2022-05-08 08:04:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
