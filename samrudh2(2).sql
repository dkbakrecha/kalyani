-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2014 at 04:54 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samrudh2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created`, `modified`, `status`) VALUES
(1, 'Industrial Furniture', '2014-12-25 14:07:45', '2014-12-25 14:07:45', 1),
(2, 'Wooden Furniture', '2014-12-25 14:07:49', '2014-12-25 14:07:49', 1),
(3, 'Home Furnishings', '2014-12-25 14:07:54', '2014-12-25 14:07:54', 1),
(4, 'Gifts & Accessories', '2014-12-25 14:07:59', '2014-12-25 14:07:59', 1),
(5, 'Wall Decor', '2014-12-25 14:08:04', '2014-12-25 14:08:04', 1),
(6, 'Flooring', '2014-12-25 14:08:08', '2014-12-25 14:08:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cmspages`
--

CREATE TABLE IF NOT EXISTS `cmspages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_name` varchar(255) NOT NULL,
  `parent_key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '''0''=>disable,''1''=>enable',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cmspages`
--

INSERT INTO `cmspages` (`id`, `unique_name`, `parent_key`, `title`, `description`, `created`, `updated`, `status`) VALUES
(8, 'Who We Are....', 'Who We Are....', 'Who We Are....', '<p><strong>Samrudh Exports </strong>is a newly established company in year 2014.We deal in all type of furniture making and its exports. We manufacture wooden, iron and Upholstery items.</p>', '2014-10-10 00:00:00', '2014-12-14 18:47:38', 1),
(9, 'Our Strength', 'Our Strength', 'Why Us', '<p>Though it is a new baby in this world of experienced players, but the person behind this unit Mr. Gaurav Bhandari has a vast experience of more than ten years working as a Director in a government recognized export house. His familiarity of working with giants in the industry like Cost Plus, Global views, Costco, Hooker furniture, William Sonoma, Maison De Monde (France) etc. gives Samrudh exports an edge over its competitors.</p>', '2014-10-10 00:00:00', '2014-12-14 18:48:12', 1),
(10, 'To Know More', 'To Know More', 'Our Strength', '<p>As the word Samrudh in Sanskrit means &quot;one who is positive in all dimensions&quot; keeping the meaning of the word alive we are trying to build our organization and win the confidence of our customers by following our strengths with are as follows</p><ul><li>Our Team</li><li>Innovative ideas</li><li>Global outlook</li><li>Our Love for the work we do</li></ul><p>More importantly we don&#39;t believe that we have competition as we are striving hard step by step to improve our quality and work on innovative designs so that we can institute ourselves as the market leader when it comes to quality and designs.</p>', '0000-00-00 00:00:00', '2014-12-14 18:48:47', 1),
(13, 'Why Us', 'Why Us', 'To Know More', '<p>To discover our abilities we would always welcome you at our facility and showroom at the below address and would hope that you give us a chance to our company to show you our capabilities.</p><p>We believe in team work and our team would definitely take us on the path of growth. At the moment our facility is in 1000 mtrs of area and we are in process of establishing one more unit in an area of 2000 mtrs .</p>', '0000-00-00 00:00:00', '2014-12-14 18:49:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact`, `description`, `status`) VALUES
(1, 'Dharmendra Bagrecha', 'dkbakrecha@gmail.com', '7737928605', 'Web developer\r\nchttp://lassyarea.com', 1),
(2, 'Jai Soni', 'jaiksonii@gmail.com', '1234567890', 'Web Developer\r\nhttp://classyarea.com', 1),
(3, 'demo', 'test@example.com', '2134567', '', 2),
(7, 'Meenu', 'meenu.soni@gmail.com', '1234567', '', 1),
(8, 'Vijay Chouhan', 'jsoni2016@gmail.com', '123456789', '', 1),
(9, 'Jay Soni', 'jayksonii@gmail.com', '1234567', '', 1),
(10, 'Monika Soni', 'meenu@gmail.com', '123456789', '', 1),
(11, 'Yahoo', 'yahoo@gmail.com', '1234567', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_contents`
--

CREATE TABLE IF NOT EXISTS `email_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `modified` datetime NOT NULL,
  `status` smallint(2) NOT NULL COMMENT '0:Disabled; 1:Enabled; 2:Deleted',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`unique_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `email_contents`
--

INSERT INTO `email_contents` (`id`, `unique_name`, `title`, `subject`, `content`, `keywords`, `modified`, `status`) VALUES
(1, 'FORGOT_PASSWORD', 'Forget Password', 'Reset Password', '<p>Hi, <strong>{{receiver}}</strong>:</p><p>We have received a request to reset your password. \r\nUsername : {{username}}\r\npassword : {{password}}\r\n</p><p><strong></strong></p><p>Thanks!<br /></p>', '{{receiver}},{{username}},{{password}}', '2014-10-08 20:25:07', 0),
(2, 'COMPOSE_MAIL', 'Compose mail admin', 'Greeting', '<p>Hi, <strong>{{receiver}}</strong>:</p>', '{{receiver}}', '2014-10-08 20:25:10', 0),
(3, 'CONTACT_US', 'Contact Us', 'User Mail Inquiry', '<p>Dear Admin:</p><p>You have received an inquiry mail from <strong>{{name}}</strong>.</p><p><strong>E-mail:</strong> {{email}}<br /><strong>Message</strong>: {{message}}</p><p>Thanks!</p><p>Team <strong>&quot;My Chemistry Resources</strong>&quot;</p>', '{{name}},{{email}},{{message}}', '2014-09-25 09:24:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '''0''= Disable , ''1''= Enable,''2''=Delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `created`, `modified`, `status`) VALUES
(11, 'NEW FAQ', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2014-11-23 12:26:01', '2014-12-14 13:20:37', 1),
(5, 'Where we are located', '<p>lj;jkljkljklj</p>', '2014-10-25 19:25:07', '2014-12-14 13:20:34', 1),
(6, 'Do you have a showroom?', '<p>Yes. Although not open to the public, you may visit us by appointment only. If you are in Jodhpur or intend to visit, please&nbsp;<strong>Contact us</strong>&nbsp;so we can arrange to show you our warehouse, factories and showrooms.</p>', '2014-10-25 19:31:16', '0000-00-00 00:00:00', 1),
(7, 'How can we place an order?', '<p>You can place your order by e-mail and&nbsp;fax; all Orders are accepted on T.T Basis (wire transfer).</p>', '2014-10-25 19:31:48', '0000-00-00 00:00:00', 1),
(8, 'When the order is confirmed?', '<p>Orders are confirmed as soon as we received 30% advance of the total value of consignment if on T.T basis, DP basis or else if we confirm L/C at our bank if on L/C basis.</p>', '2014-10-25 19:32:18', '0000-00-00 00:00:00', 1),
(9, 'Faq Test', '<p>This is test text.</p>', '2014-11-16 20:52:46', '2014-11-23 06:28:01', 2),
(10, 'Test1', '<p>asd</p>', '2014-11-16 20:54:23', '2014-11-23 06:24:26', 2),
(12, 'NEW FAQ2', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2014-11-23 12:30:52', '2014-11-23 07:01:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image_name`, `status`) VALUES
(1, 1, '122014_3084.jpg', 1),
(2, 2, '122014_8024.jpg', 1),
(3, 3, '122014_4593.jpg', 1),
(4, 4, '122014_9658.jpg', 1),
(5, 5, '122014_1180.jpg', 1),
(6, 6, '122014_4697.jpg', 1),
(7, 7, '122014_8097.jpg', 1),
(8, 8, '122014_2746.jpg', 1),
(9, 9, '122014_9391.jpg', 1),
(10, 10, '122014_3453.jpg', 1),
(11, 11, '122014_1159.jpg', 1),
(12, 12, '122014_2939.jpg', 1),
(13, 13, '122014_1010.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `captecha` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '''0''=>''unread'',''1''=>''read'',''2''=>''deleted''',
  `type` int(11) NOT NULL COMMENT '''0''=>''contact us'',''1''=>''enquiry'',''2''=>''send mail''',
  `product_id` int(11) NOT NULL COMMENT '=>0  == product id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `specification` text NOT NULL,
  `features` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `in_stock` int(11) NOT NULL DEFAULT '0' COMMENT '1 = in stock',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `view_count` int(11) NOT NULL COMMENT 'increase by 1 on every view',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '''0''=>''inactive'',''1''=>''active'',''2''=>''Deleted by user''',
  `is_show` int(11) NOT NULL COMMENT '''0''=>''not show'',''1''=>''show''',
  `is_offer` int(11) NOT NULL COMMENT '''0''=>''no offer'',''1''=>''offer',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `product_code`, `specification`, `features`, `category_id`, `sub_category_id`, `keywords`, `in_stock`, `created`, `modified`, `view_count`, `status`, `is_show`, `is_offer`) VALUES
(1, 'IRON CONTAINER', 'SE-IIC-1001', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '100x90x30', 1, 4, 'IRON CONTAINER', 0, '2014-12-28 15:49:57', '2014-12-28 11:19:57', 1, 1, 0, 0),
(2, 'IRON CHAIRS', 'SE-IIC-1002', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '25 x 40 x 100', 1, 4, 'IRON CHAIR', 0, '2014-12-28 15:49:30', '2014-12-28 11:19:30', 3, 1, 0, 0),
(3, 'WOODEN CHAIR', 'SE-WCS-1003', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x50x100', 2, 2, 'WOODEN CHAIR', 0, '2014-12-28 15:51:48', '2014-12-28 11:21:48', 0, 1, 0, 0),
(4, 'GATE HOOKS', 'SE-HHH-1004', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x50x100', 3, 6, 'IRON GATE HOOKS', 0, '2014-12-28 15:45:58', '2014-12-28 11:15:58', 0, 1, 1, 0),
(5, 'CANDLE HOLDER', 'SE-HCH-1005', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '100x100x100', 3, 7, 'IRON CANDLE HOLDER', 0, '2014-12-28 15:46:00', '2014-12-28 11:16:00', 0, 1, 1, 0),
(6, 'Magazine Holder', 'SE-GMH-1006', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x50x100', 4, 10, 'Magazing Holder', 0, '2014-12-28 15:46:01', '2014-12-28 11:16:01', 0, 1, 1, 0),
(7, 'IRON PHOTO FRAME', 'SE-WPF-1007', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '100x90x30', 5, 9, 'PHOTO FRAME', 0, '2014-12-28 15:48:44', '2014-12-28 11:18:44', 0, 1, 1, 0),
(8, 'IRON MIRROR FRAME', 'SE-FMF-1008', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x100x25', 6, 11, 'IRON MIRRON FRAME', 0, '2014-12-28 15:48:54', '2014-12-28 11:18:54', 0, 1, 1, 0),
(9, 'WOODEN PHOTO FRAME', 'SE-WPF-1009', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '200x300x500', 5, 9, 'WOODEN FRAME', 0, '2014-12-25 19:35:15', '2014-12-25 14:48:47', 0, 2, 0, 0),
(10, 'BOX CABINETS', 'SE-IC-1010', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x100x25', 1, 5, 'IRON BOX CABINETS', 0, '2014-12-28 15:51:08', '2014-12-28 11:21:08', 0, 1, 1, 0),
(11, 'IRON STOOLS', 'SRE-WCS-1011', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '100x100x100', 2, 2, 'STOOLS', 0, '2014-12-28 15:48:29', '2014-12-28 11:18:29', 0, 1, 1, 0),
(12, 'NEW CANDLE', 'SRE-HCH-1012', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '100x100x100', 3, 7, 'IRON NEW CANDLE', 0, '2014-12-28 15:45:38', '2014-12-28 11:15:38', 0, 1, 0, 0),
(13, 'NEW PHOTO FRAME', 'SRE-WPF-1013', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '10x50x100', 5, 9, 'IRON PHOTO', 0, '2014-12-28 15:45:37', '2014-12-28 11:15:37', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

CREATE TABLE IF NOT EXISTS `search_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_words` varchar(255) NOT NULL,
  `create` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hits` int(11) NOT NULL COMMENT '''increase by 1 on every hit''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`id`, `search_words`, `create`, `modified`, `hits`) VALUES
(2, 'table', '0000-00-00 00:00:00', '2014-12-09 19:12:10', 14),
(4, 'doors', '0000-00-00 00:00:00', '2014-12-21 14:01:55', 39),
(5, 'charis', '0000-00-00 00:00:00', '2014-10-23 10:01:29', 2),
(28, 'abc', '0000-00-00 00:00:00', '2014-12-21 13:52:05', 5),
(29, 'tables', '0000-00-00 00:00:00', '2014-12-25 18:10:10', 140),
(34, 'iron', '0000-00-00 00:00:00', '2014-10-23 10:10:32', 4),
(35, 'Windows', '0000-00-00 00:00:00', '2014-10-23 10:11:17', 2),
(36, 'Speakers', '0000-00-00 00:00:00', '2014-10-23 10:14:16', 3),
(37, 'iron doors', '0000-00-00 00:00:00', '2014-10-25 10:56:53', 3),
(38, 'orkut', '0000-00-00 00:00:00', '2014-10-25 20:08:03', 2),
(39, 'orkutss', '0000-00-00 00:00:00', '2014-10-25 20:09:01', 1),
(40, 'orkutsss', '0000-00-00 00:00:00', '2014-10-25 20:12:21', 2),
(41, 'hfjruy', '0000-00-00 00:00:00', '2014-10-25 20:12:33', 1),
(42, 'asd', '0000-00-00 00:00:00', '2014-10-26 12:58:56', 5),
(43, 'gsfdgas', '0000-00-00 00:00:00', '2014-10-25 20:14:54', 1),
(44, 'gsfdgasdf', '0000-00-00 00:00:00', '2014-10-25 20:15:39', 2),
(45, 'asdf', '0000-00-00 00:00:00', '2014-12-15 18:44:00', 4),
(46, 'asdfggg', '0000-00-00 00:00:00', '2014-10-25 20:20:39', 2),
(47, 'asdfgggjk', '0000-00-00 00:00:00', '2014-10-25 20:20:44', 1),
(48, 'asdfgggjksdgg', '0000-00-00 00:00:00', '2014-10-25 20:21:13', 1),
(49, 'asdfggdff', '0000-00-00 00:00:00', '2014-10-25 20:27:15', 1),
(50, 'asdffdsadf', '0000-00-00 00:00:00', '2014-10-25 20:28:03', 2),
(51, 'tablejhj', '0000-00-00 00:00:00', '2014-10-25 20:28:21', 1),
(52, 'almirah', '0000-00-00 00:00:00', '2014-10-25 20:36:06', 1),
(53, 'test', '0000-00-00 00:00:00', '2014-10-25 20:36:29', 1),
(54, 'te', '0000-00-00 00:00:00', '2014-10-25 20:43:19', 1),
(55, 'sdcaddcfasd', '0000-00-00 00:00:00', '2014-10-26 08:29:45', 3),
(56, 'wood', '0000-00-00 00:00:00', '2014-10-26 13:47:04', 1),
(57, 'fuck', '0000-00-00 00:00:00', '2014-12-03 19:24:42', 2),
(58, 'Tp', '0000-00-00 00:00:00', '2014-12-03 19:55:39', 9),
(59, 'tp', '0000-00-00 00:00:00', '2014-12-21 13:49:28', 169),
(60, 'chairs', '0000-00-00 00:00:00', '2014-12-04 20:14:46', 18),
(61, 'iron chair', '0000-00-00 00:00:00', '2014-12-04 15:34:30', 1),
(62, '', '0000-00-00 00:00:00', '2014-12-15 18:07:25', 16),
(63, 'clss', '0000-00-00 00:00:00', '2014-12-04 20:13:47', 1),
(64, 'yahoo', '0000-00-00 00:00:00', '2014-12-05 19:06:05', 3),
(65, 'a', '0000-00-00 00:00:00', '2014-12-25 18:12:16', 3),
(66, 't', '0000-00-00 00:00:00', '2014-12-21 13:52:15', 8),
(67, 'ab', '0000-00-00 00:00:00', '2014-12-04 21:00:50', 3),
(68, 'hi', '0000-00-00 00:00:00', '2014-12-08 12:51:22', 6),
(69, 'lap', '0000-00-00 00:00:00', '2014-12-08 12:51:27', 1),
(70, 'ch', '0000-00-00 00:00:00', '2014-12-09 19:12:21', 1),
(71, 'pi', '0000-00-00 00:00:00', '2014-12-09 19:43:28', 5),
(72, 'TP', '0000-00-00 00:00:00', '2014-12-15 19:27:45', 2),
(73, 'asdd', '0000-00-00 00:00:00', '2014-12-25 18:12:25', 4),
(74, 'd', '0000-00-00 00:00:00', '2014-12-21 13:52:30', 1),
(75, 'door', '0000-00-00 00:00:00', '2014-12-21 14:02:00', 1),
(76, '100', '0000-00-00 00:00:00', '2014-12-22 16:55:16', 1),
(77, 'ta', '0000-00-00 00:00:00', '2014-12-22 16:55:24', 1),
(78, 'wooden', '0000-00-00 00:00:00', '2014-12-25 21:01:40', 2),
(79, 'haala bool', '0000-00-00 00:00:00', '2014-12-25 21:02:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE IF NOT EXISTS `sitesettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `key` varchar(40) NOT NULL,
  `value` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '''0''=>''inactive'',''1''=>''active''',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `title`, `key`, `value`, `status`) VALUES
(1, 'Company Name', 'Site.company_name', 'SAMRUDH EXPORTS', 1),
(2, 'Contact us Mail', 'Site.email', 'sales@samrudhexim.com', 1),
(3, 'Company Phone', 'Site.mobile', '1234567890', 1),
(5, 'Skype', 'Site.skype', 'abcdef', 1),
(6, 'facebook', 'Site.facebook', 'www.facebook.com/samrudh', 1),
(7, 'twitter', 'Site.twitter', 'www.twitter.com/samrudh', 1),
(8, 'linkedin', 'Site.linkedin', 'www.linkedin.com/samrudh', 1),
(9, 'Address', 'Site.address', 'Plot No. 9 A, New Nakoda <br>Industrial Area, 2nd PhaseBasni,<br> Jodhpur, Rajasthan INDIA 342001', 1),
(10, 'Registered address', 'Site.registeredaddress', 'Plot No. 580, 10 C Road <br> Sardarpura Jodhpur <br> Rajasthan INDIA 342001', 1),
(11, 'Music File', 'Site.musicfile', '3553', 0),
(12, 'Music Play', 'Site.play', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_code_keyword` varchar(3) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL COMMENT '''0''=>''inactive'',''1''=>''active''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `product_code_keyword`, `created`, `modified`, `status`) VALUES
(1, 1, 'Chairs & Stools', 'ICS', '2014-12-25 18:49:48', '2014-12-25 14:19:48', 2),
(2, 2, 'Chairs & Stools', 'WCS', '2014-12-25 14:20:16', '2014-12-25 14:20:16', 1),
(3, 2, 'Drawer Chest', 'WDC', '2014-12-25 14:20:38', '2014-12-25 14:20:38', 1),
(4, 1, 'Industrial Containers', 'IIC', '2014-12-25 14:21:12', '2014-12-25 14:21:12', 1),
(5, 1, 'Industrial Cabinets', 'IC', '2014-12-25 14:22:45', '2014-12-25 14:22:45', 1),
(6, 3, 'Hooks & Hangers', 'HHH', '2014-12-25 14:23:03', '2014-12-25 14:23:03', 1),
(7, 3, 'Candle Holder', 'HCH', '2014-12-25 14:23:19', '2014-12-25 14:23:19', 1),
(8, 4, 'Photo Frame', 'GPF', '2014-12-25 19:35:55', '2014-12-25 14:24:42', 1),
(9, 5, 'Photo Frame', 'WPF', '2014-12-25 19:37:25', '2014-12-25 15:05:15', 1),
(10, 4, 'Magazine Holder', 'GMH', '2014-12-25 14:25:27', '2014-12-25 14:25:27', 1),
(11, 6, 'Mirror Frames', 'FMF', '2014-12-25 14:25:44', '2014-12-25 14:25:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`) VALUES
(1, 'admin', 'a060f147249ad57079e51776fd145fd8a7a32839', 'admin', '', '2014-10-05 09:57:14', '2014-11-16 17:39:23'),
(2, 'member', '8b86551f7cd3f9d2225a43934ec491934c49199e', 'member', 'member@example.com', '2014-10-09 23:09:50', '2014-10-09 23:09:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
