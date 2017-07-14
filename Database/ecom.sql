-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 07:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bottom_sliders`
--

CREATE TABLE IF NOT EXISTS `bottom_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `n_price` decimal(6,2) NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bottom_sliders`
--

INSERT INTO `bottom_sliders` (`id`, `name`, `desc`, `model`, `location`, `phone`, `price`, `n_price`, `quantity`, `stock`, `status`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Camera', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'Alpha a7', 'Dhaka', '01717251095', 699.00, 0.00, '7', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420627761-pSNYNA-ILCE7K~B_main_v786.png', '2015-01-07 04:49:21', '2015-01-07 04:49:21'),
(3, 'Vanity bag', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'vanity bag 4', 'Rajshahi', '01717251095', 20.00, 0.00, '10', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420627800-58fefb00364dfc4464280df82fd8d946_w631_h687_q50.jpg', '2015-01-07 04:50:00', '2015-01-07 04:50:00'),
(4, 'vanity bag 3', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'vanity bag 2', 'Rajshahi', '01717251095', 9.00, 0.00, '21', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420627834-f2e10eb022f3aa0d1d093fe564c0a048_w631_h687_q50.jpg', '2015-01-07 04:50:34', '2015-01-07 04:50:34'),
(5, 'vanity bag 30', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'vanity bag 45', 'Dhaka', '01717251095', 99.00, 0.00, '3', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420627881-9d5865a8378748062227f882003fa21c_w631_h687_q50.jpg', '2015-01-07 04:51:21', '2015-01-07 04:51:21'),
(6, 'Cycle One', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'cycle one', 'Rajshahi', '01717251095', 399.00, 0.00, '5', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420627916-Tango-Side-Seamless-WEB_1024x1024.jpg', '2015-01-07 04:51:56', '2015-01-07 04:51:56'),
(7, 'vanity bag 2v', 'This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site This is a demo product in this site ', 'vanity bag 250', 'Rajshahi', '01717251095', 8.00, 0.00, '3', 'In Stock', 'Enable', 'assets/dist/products/bottom-slider/1420634765-test.jpg', '2015-01-07 06:46:06', '2015-01-07 06:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_20_175539_create_users_table', 1),
('2014_12_21_102500_create_session_table', 1),
('2014_12_24_203632_create_products_table', 2),
('2014_12_24_211645_create_products_table', 3),
('2014_12_24_213206_create_products_table', 4),
('2015_01_06_171917_create_slider_table', 5),
('2015_01_06_181007_create_slider_table', 6),
('2015_01_06_183417_create_sliders_table', 7),
('2015_01_07_102445_create_BottomSliders_table', 8),
('2015_01_07_103708_create_bottom_sliders_table', 9),
('2015_01_07_103931_create_bottomsliders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `n_price` decimal(6,2) NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `model`, `location`, `phone`, `price`, `n_price`, `quantity`, `stock`, `status`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Vanity bag', 'vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag', 'vanity bag 250', 'Rajshahi', '01717251095', 9.00, 5.00, '3', 'In Stock', 'Enable', 'assets/dist/products/1421028473-2dcfe0c211e73f37692fe8b1f518c525_w723_h1001_q50.jpg', '2015-01-05 07:07:55', '2015-01-11 20:07:53'),
(15, 'vanity bag 2', 'vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag', 'vanity bag 45', 'Dhaka', '01717251095', 8.00, 0.00, '', 'In Stock', 'Disable', 'assets/dist/products/1420463379-f2e10eb022f3aa0d1d093fe564c0a048_w631_h687_q50.jpg', '2015-01-05 07:09:39', '2015-01-05 07:09:39'),
(16, 'vanity bag 3', 'vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag vanity bag', 'vanity bag 4', 'Dhaka', '01717251095', 9.00, 0.00, '', 'In Stock', 'Disable', 'assets/dist/products/1420463549-9d5865a8378748062227f882003fa21c_w631_h687_q50.jpg', '2015-01-05 07:12:29', '2015-01-05 07:12:29'),
(17, 'vanity bag 30', 'vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3 vanity bag 3', 'vanity bag 21', 'Dhaka', '01717251095', 8.00, 0.00, '3', 'In Stock', 'Enable', 'assets/dist/products/1420481648-58fefb00364dfc4464280df82fd8d946_w631_h687_q50.jpg', '2015-01-05 12:14:09', '2015-01-05 12:14:09'),
(18, 'Boy 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quod eius, sequi ducimus. Voluptate ab esse maiores corporis. Soluta laborum dolorum ratione, reiciendis molestias, impedit repellat debitis odio autem maxime?', 'boy one', 'Rajshahi', '01717251095', 125.00, 99.00, '2', 'In Stock', 'Enable', 'assets/dist/products/1421028207-b95ca74538a4597d7c4d2a7f4fdd9a72.jpg', '2015-01-05 13:03:45', '2015-01-11 20:03:27'),
(19, 'Boy 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quod eius, sequi ducimus. Voluptate ab esse maiores corporis. Soluta laborum dolorum ratione, reiciendis molestias, impedit repellat debitis odio autem maxime?', 'boy two', 'Rajshahi', '01717251095', 199.00, 0.00, '5', 'In Stock', 'Enable', 'assets/dist/products/1421015453-Tango-Side-Seamless-WEB_1024x1024.jpg', '2015-01-05 13:04:26', '2015-01-11 16:30:54'),
(27, 'Product One', ' Product One Product One Product One  Product One Product One Product One  Product One Product One Product One  Product One Product One Product One', 'cycle one', 'Rajshahi', '01717251095', 699.00, 499.00, '5', 'In Stock', 'Enable', 'assets/dist/products/1421030476-e34c58ed3b717ce47fe9e4622bb30a9c.jpg', '2015-01-11 20:41:16', '2015-01-11 20:41:16'),
(28, 'Product Ones', ' Product Ones Product Ones  Product Ones Product Ones  Product Ones Product Ones  Product Ones Product Ones  Product Ones Product Ones  Product Ones Product Ones', 'Alpha a7', 'Dhaka', '01717251095', 450.00, 0.00, '2', 'In Stock', 'Enable', 'assets/dist/products/1421030561-edfc291b121723375c635f76465ca413.jpg', '2015-01-11 20:42:41', '2015-01-11 20:42:41'),
(29, 'Cycle One', 'Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One Cycle One', 'cycle one', 'Dhaka', '01717251095', 450.00, 0.00, '25', 'In Stock', 'Enable', 'assets/dist/products/1421030596-Tango-Side-Seamless-WEB_1024x1024.jpg', '2015-01-11 20:43:17', '2015-01-11 20:43:17'),
(30, 'Camera', 'Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera Camera', 'Alpha a7', 'Rajshahi', '01717251095', 699.00, 0.00, '20', 'In Stock', 'Enable', 'assets/dist/products/1421030650-pSNYNA-ILCE7K~B_main_v786.png', '2015-01-11 20:44:10', '2015-01-11 20:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `desc`, `width`, `height`, `status`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Product Two', 'This is a second product in this site.', '580', '450', 'Active', 'assets/dist/products/slider/1420617166-edab2fa6d0503ef2a9bab67396b9ffce.jpg', '2015-01-07 01:52:46', '2015-01-07 01:52:46'),
(6, 'Head Phone', 'This is a demo slider image', '580', '450', 'In Active', 'assets/dist/products/slider/6-1421015857-e34c58ed3b717ce47fe9e4622bb30a9c.jpg', '2015-01-08 06:27:04', '2015-01-11 16:37:38'),
(7, 'Head Phone', 'Head Phone', '580', '450', 'Active', 'assets/dist/products/slider/7-1420888019-b95ca74538a4597d7c4d2a7f4fdd9a72.jpg', '2015-01-08 08:31:20', '2015-01-10 05:06:59'),
(8, 'Head Phone', 'Head Phone', '580', '450', 'Active', 'assets/dist/products/slider/1420728049-pSNYNA-ILCE7K~B_main_v786.png', '2015-01-08 08:40:49', '2015-01-08 08:40:49'),
(9, 'Head Phone', 'Head Phone', '580', '450', 'Active', 'assets/dist/products/slider/9-1421022733-9d5865a8378748062227f882003fa21c_w631_h687_q50.jpg', '2015-01-08 08:43:50', '2015-01-11 18:32:13'),
(10, 'adminSSS', 'adminSSS', '580', '450', 'Active', 'assets/dist/products/slider/10-f2e10eb022f3aa0d1d093fe564c0a048_w631_h687_q50.jpg', '2015-01-08 10:52:43', '2015-01-11 03:25:29'),
(11, 'Head Phone', 'Head PhoneHead PhoneHead Phone', '580', '450', 'In Active', 'assets/dist/products/slider/11-1420887970-Tango-Side-Seamless-WEB_1024x1024.jpg', '2015-01-10 02:55:34', '2015-01-10 05:06:11'),
(12, 'Head Phone', ' Head Phone Head PhoneHead Phone', '580', '450', 'In Active', 'assets/dist/products/slider/12-pSNYNA-ILCE7K~B_main_v786.png', '2015-01-10 05:15:38', '2015-01-10 05:31:43'),
(13, 'Head Phone', ' Head Phone Head Phone', '580', '450', 'Active', 'assets/dist/products/slider/13-1421004199-pSNYNA-ILCE7K~B_main_v786.png', '2015-01-11 06:57:22', '2015-01-11 13:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'AL-AMIN', 'admin', 'admin@gmail.com', '$2y$10$0YVnuG1z1Ik7LoR2Um6pBOQ1IUmyEiM6oug/WjRQK4OuQ4.p51xc.', '', 'w6uw4AA4XxwyofC4NfCowb12H0VxiRktN8V1inlg1by3jyaaslvaGfv1hRuL', '2014-12-22 01:58:34', '2015-01-11 12:14:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
