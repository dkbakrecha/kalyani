-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2014 at 08:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samrudh`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`) VALUES
(7, 'Wooden Furniture', 1),
(8, 'Industrial Furniture', 1);

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
(8, 'Who We Are....', 'Who We Are....', 'Who We Are....', '<strong>Samrudh Exports </strong>is a newly established company in year 2014.We deal in all type of furniture making and its exports. We manufacture wooden, iron and Upholstery items. ', '2014-10-10 00:00:00', '2014-10-10 00:00:00', 1),
(9, 'Our Strength', 'Our Strength', 'Our Strength', '<p>As the word Samrudh in Sanskrit means &quot;one who is positive in all dimensions&quot; keeping the meaning of the word alive we are trying to build our organization and win the confidence of our customers by following our strengths with are as follows</p><ul><li>Our Team</li><li>Innovative ideas</li><li>Global outlook</li><li>Our Love for the work we do</li></ul><p>More importantly we don&#39;t believe that we have competition as we are striving hard step by step to improve our quality and work on innovative designs so that we can institute ourselves as the market leader when it comes to quality and designs.</p>', '2014-10-10 00:00:00', '2014-10-10 21:31:37', 1),
(10, 'To Know More', 'To Know More', 'To Know More', '<p>To discover our abilities we would always welcome you at our facility and showroom at the below address and would hope that you give us a chance to our company to show you our capabilities.</p><p>We believe in team work and our team would definitely take us on the path of growth. At the moment our facility is in 1000 mtrs of area and we are in process of establishing one more unit in an area of 2000 mtrs .</p>', '0000-00-00 00:00:00', '2014-10-10 21:44:03', 1),
(13, 'Why Us', 'Why Us', 'Why Us', 'Though it is a new baby in this world of experienced\r\n                        players, but the person behind this unit Mr. Gaurav\r\n                        Bhandari has a vast experience of more than ten\r\n                        years working as a Director in a government\r\n                        recognized export house. His familiarity of working\r\n                        with giants in the industry like Cost Plus, Global\r\n                        views, Costco, Hooker furniture, William Sonoma,\r\n                        Maison\r\n                        De Monde (France) etc. gives Samrudh\r\n                        exports an edge over its competitors.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact`, `description`, `status`) VALUES
(1, 'Dharmendra Bagrecha', 'dkbakrecha@gmail.com', '7737928605', 'Web developer\r\nchttp://lassyarea.com', 1),
(2, 'Jai Soni', 'jaiksonii@gmail.com', '1234567890', 'Web Developer\r\nhttp://classyarea.com', 1),
(3, 'demo', 'test@example.com', '2134567', '', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `created`, `modified`, `status`) VALUES
(1, '', '', '2014-10-19 08:59:14', '2014-10-19 04:11:35', 2),
(2, '', '', '2014-10-19 09:23:07', '2014-10-19 04:11:38', 2),
(3, 'asd', '<p>asdasd ss</p>', '2014-10-19 09:34:17', '2014-10-25 14:00:51', 2),
(4, 'Test -0002', '<p>asdasd</p>', '2014-10-19 09:44:02', '2014-10-25 14:00:54', 2),
(5, 'Where we are located', '<p>The quick brown fox jumps over the lazy fox.</p>', '2014-10-25 19:25:07', '0000-00-00 00:00:00', 1),
(6, 'Do you have a showroom?', '<p>Yes. Although not open to the public, you may visit us by appointment only. If you are in Jodhpur or intend to visit, please&nbsp;<strong>Contact us</strong>&nbsp;so we can arrange to show you our warehouse, factories and showrooms.</p>', '2014-10-25 19:31:16', '0000-00-00 00:00:00', 1),
(7, 'How can we place an order?', '<p>You can place your order by e-mail and&nbsp;fax; all Orders are accepted on T.T Basis (wire transfer).</p>', '2014-10-25 19:31:48', '0000-00-00 00:00:00', 1),
(8, 'When the order is confirmed?', '<p>Orders are confirmed as soon as we received 30% advance of the total value of consignment if on T.T basis, DP basis or else if we confirm L/C at our bank if on L/C basis.</p>', '2014-10-25 19:32:18', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image_name`, `status`) VALUES
(9, 15, '102014_3665.jpg', 1),
(8, 14, '102014_9379.jpg', 1),
(7, 13, '102014_8118.jpg', 1),
(10, 13, '102014_7253.jpg', 1),
(11, 13, '102014_4263.jpg', 1),
(12, 16, '102014_8731.jpg', 1),
(13, 16, '102014_5808.jpg', 1),
(14, 17, '102014_6085.jpg', 1),
(15, 17, '102014_1846.jpg', 1),
(16, 18, '102014_4382.jpg', 1),
(17, 18, '102014_1180.jpg', 1),
(18, 19, '102014_5978.jpg', 1),
(19, 19, '102014_6309.jpg', 1),
(20, 20, '102014_9055.jpg', 1),
(21, 20, '102014_5697.jpg', 1),
(22, 21, '102014_4016.jpg', 1),
(23, 21, '102014_3601.jpg', 1),
(24, 22, '102014_5475.jpg', 1),
(25, 22, '102014_9376.jpg', 1),
(26, 23, '102014_9909.jpg', 1),
(27, 23, '102014_2667.jpg', 1),
(28, 24, '102014_5808.jpg', 1),
(29, 24, '102014_1783.jpg', 1),
(30, 25, '102014_2415.jpg', 1),
(31, 25, '102014_1129.jpg', 1);

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
  `status` int(11) NOT NULL COMMENT '''0''=>''unread'',''1''=>''read''',
  `type` int(11) NOT NULL COMMENT '''0''=>''contact us'',''1''=>''enquiry'',''2''=>''send mail''',
  `producd_id` int(11) NOT NULL COMMENT '=>0  == product id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `mobile`, `message`, `captecha`, `created`, `status`, `type`, `producd_id`) VALUES
(1, 'asdf', 'asdf@asdf.com', 'asdf', 'asdfasdfasdf', 1, '2014-10-10 17:07:10', 0, 0, 0),
(2, 'asdf', 'asdf@asdf.com', 'asdf', 'asdfasdfasdf', 1, '2014-10-10 17:09:20', 0, 0, 0),
(3, 'Jay Kumar Soni', 'jayksonii@gmail.com', 'jayasdfjaklfjls', 'asdfasdfasdf', 0, '2014-10-11 14:06:11', 0, 0, 0),
(4, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 04:21:30', 0, 0, 0),
(5, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 04:23:32', 0, 0, 0),
(6, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 04:30:13', 0, 0, 0),
(7, 'dkb', 'dkb@gmail.com', '123123', '12323213', 0, '2014-10-19 04:32:58', 0, 0, 0),
(8, 'Sourabh Purohit', 'sourbh.purohit@gmail.com', '9928361377', 'This is a test Message.', 0, '2014-10-19 04:35:43', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `specification` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `in_stock` int(11) NOT NULL DEFAULT '0' COMMENT '1 = in stock',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view_count` int(11) NOT NULL COMMENT 'increase by 1 on every view',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_show` int(11) NOT NULL COMMENT '''0''=>''not show'',''1''=>''show''',
  `is_offer` int(11) NOT NULL COMMENT '''0''=>''no offer'',''1''=>''offer',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `product_code`, `specification`, `category_id`, `keywords`, `in_stock`, `created`, `view_count`, `status`, `is_show`, `is_offer`) VALUES
(13, 'Almirah', '', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 7, 'Alimirah ,wooden almirah', 0, '2014-10-25 09:18:40', 0, 1, 0, 0),
(14, 'Almirah', 'SE-Almirah-001', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 7, 'Almirah,iron almirah', 0, '2014-10-25 12:18:42', 0, 1, 0, 0),
(15, 'Table', 'SE-Table-001', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 8, 'table', 0, '2014-10-11 11:21:00', 0, 1, 0, 0),
(22, 'Test Product 6', 'SE-Table-006', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'good,gopod', 0, '2014-10-25 09:47:00', 0, 1, 0, 0),
(21, 'Test Product 6', 'SE-Table-006', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'abc,abc]', 0, '2014-10-25 09:45:43', 0, 1, 0, 0),
(18, 'Test Product 3', 'SE - Test 3', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'box,wooden box', 0, '2014-10-25 09:32:26', 0, 1, 0, 0),
(19, 'Test Product 4', 'SE - Test 4', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'Test ,test', 0, '2014-10-25 09:34:55', 0, 1, 0, 0),
(20, 'Test Product 5', 'SE-Table-005', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'abc,abc1', 0, '2014-10-25 09:39:28', 0, 1, 0, 0),
(23, 'Test Product 7', 'SE-Table-007', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, '', 0, '2014-10-25 09:52:01', 0, 1, 0, 0),
(24, 'Test Product 8', 'SE-Table-008', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'testttt,taeteta ', 0, '2014-10-25 09:53:49', 0, 1, 0, 0),
(25, 'Test Product 8', 'SE-Table-008', '<p>Colorful and rustic accent to home; Funky and functional, this iron &amp; reclaimed wood trunk features hand forged iron accents and is a great storage solution for the living room. The colorful painted exterior is just the right complement to any d&eacute;cor and the spacious interior is perfect for additional storage.</p>', 7, 'yyy,uuyy', 0, '2014-10-25 09:55:27', 0, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`id`, `search_words`, `create`, `modified`, `hits`) VALUES
(2, 'table', '0000-00-00 00:00:00', '2014-10-26 08:39:49', 8),
(4, 'doors', '0000-00-00 00:00:00', '2014-10-23 10:01:40', 2),
(5, 'charis', '0000-00-00 00:00:00', '2014-10-23 10:01:29', 2),
(28, 'abc', '0000-00-00 00:00:00', '2014-10-23 10:25:55', 4),
(29, 'tables', '0000-00-00 00:00:00', '2014-10-23 10:13:12', 6),
(34, 'iron', '0000-00-00 00:00:00', '2014-10-23 10:10:32', 4),
(35, 'Windows', '0000-00-00 00:00:00', '2014-10-23 10:11:17', 2),
(36, 'Speakers', '0000-00-00 00:00:00', '2014-10-23 10:14:16', 3),
(37, 'iron doors', '0000-00-00 00:00:00', '2014-10-25 10:56:53', 3),
(38, 'orkut', '0000-00-00 00:00:00', '2014-10-25 20:08:03', 2),
(39, 'orkutss', '0000-00-00 00:00:00', '2014-10-25 20:09:01', 1),
(40, 'orkutsss', '0000-00-00 00:00:00', '2014-10-25 20:12:21', 2),
(41, 'hfjruy', '0000-00-00 00:00:00', '2014-10-25 20:12:33', 1),
(42, 'asd', '0000-00-00 00:00:00', '2014-10-26 08:27:33', 3),
(43, 'gsfdgas', '0000-00-00 00:00:00', '2014-10-25 20:14:54', 1),
(44, 'gsfdgasdf', '0000-00-00 00:00:00', '2014-10-25 20:15:39', 2),
(45, 'asdf', '0000-00-00 00:00:00', '2014-10-25 20:27:20', 3),
(46, 'asdfggg', '0000-00-00 00:00:00', '2014-10-25 20:20:39', 2),
(47, 'asdfgggjk', '0000-00-00 00:00:00', '2014-10-25 20:20:44', 1),
(48, 'asdfgggjksdgg', '0000-00-00 00:00:00', '2014-10-25 20:21:13', 1),
(49, 'asdfggdff', '0000-00-00 00:00:00', '2014-10-25 20:27:15', 1),
(50, 'asdffdsadf', '0000-00-00 00:00:00', '2014-10-25 20:28:03', 2),
(51, 'tablejhj', '0000-00-00 00:00:00', '2014-10-25 20:28:21', 1),
(52, 'almirah', '0000-00-00 00:00:00', '2014-10-25 20:36:06', 1),
(53, 'test', '0000-00-00 00:00:00', '2014-10-25 20:36:29', 1),
(54, 'te', '0000-00-00 00:00:00', '2014-10-25 20:43:19', 1),
(55, 'sdcaddcfasd', '0000-00-00 00:00:00', '2014-10-26 08:29:45', 3);

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
(2, 'Contact us Mail', 'Site.email', 'samrudh@gmail.com', 1),
(3, 'Company Phone', 'Site.mobile', '7737896949', 1),
(5, 'Skype', 'Site.skype', 'abcedec', 1),
(6, 'facebook', 'Site.facebook', 'www.facebook.com/samrudh', 1),
(7, 'twitter', 'Site.twitter', 'twitter.link', 1),
(8, 'linkedin', 'Site.linkedin', 'linkedin.link', 1),
(9, 'Address', 'Site.address', 'Plot No. 9 A, New Nakoda<br> Industrial Area, 2nd PhaseBasni,<br> Jodhpur, Rajasthan INDIA 342001<br>', 1),
(10, 'Registered address', 'Site.registeredaddress', 'Plot No. 580, 10 C Road <br>Sardarpura Jodhpur <br>Rajasthan INDIA 342001', 1),
(11, 'Music File', 'Site.musicfile', '3553', 0),
(12, 'Music Play', 'Site.play', '1', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`) VALUES
(1, 'admin', '8b86551f7cd3f9d2225a43934ec491934c49199e', 'admin', '', '2014-10-05 09:57:14', '2014-10-18 17:02:03'),
(2, 'member', '8b86551f7cd3f9d2225a43934ec491934c49199e', 'member', 'member@example.com', '2014-10-09 23:09:50', '2014-10-09 23:09:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
