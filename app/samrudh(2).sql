-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2014 at 05:53 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `created`, `modified`, `status`) VALUES
(1, '', '', '2014-10-19 08:59:14', '2014-10-19 09:41:35', 2),
(2, '', '', '2014-10-19 09:23:07', '2014-10-19 09:41:38', 2),
(3, 'asd', '<p>asdasd ss</p>', '2014-10-19 09:34:17', '2014-10-19 09:43:32', 1),
(4, 'Test -0002', '<p>asdasd</p>', '2014-10-19 09:44:02', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image_name`, `status`) VALUES
(9, 15, '102014_3665.jpg', 1),
(8, 14, '102014_9379.jpg', 1),
(7, 13, '102014_8118.jpg', 1),
(10, 13, '102014_7253.jpg', 1),
(11, 13, '102014_4263.jpg', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `mobile`, `message`, `captecha`, `created`, `status`) VALUES
(1, 'asdf', 'asdf@asdf.com', 'asdf', 'asdfasdfasdf', 1, '2014-10-10 22:37:10', 0),
(2, 'asdf', 'asdf@asdf.com', 'asdf', 'asdfasdfasdf', 1, '2014-10-10 22:39:20', 0),
(3, 'Jay Kumar Soni', 'jayksonii@gmail.com', 'jayasdfjaklfjls', 'asdfasdfasdf', 0, '2014-10-11 19:36:11', 0),
(4, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 09:51:30', 0),
(5, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 09:53:32', 0),
(6, 'Jay Soni', 'jayksonii@gmail.com', '7737896949', 'This is a test message.', 0, '2014-10-19 10:00:13', 0),
(7, 'dkb', 'dkb@gmail.com', '123123', '12323213', 0, '2014-10-19 10:02:58', 0),
(8, 'Sourabh Purohit', 'sourbh.purohit@gmail.com', '9928361377', 'This is a test Message.', 0, '2014-10-19 10:05:43', 0);

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
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `product_code`, `specification`, `category_id`, `keywords`, `in_stock`, `created`, `status`) VALUES
(13, 'Almirah', '', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 7, 'Alimirah ', 0, '2014-10-11 15:20:16', 1),
(14, 'Almirah', 'SE-Almirah-001', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 7, 'Almirah', 0, '2014-10-11 15:27:33', 1),
(15, 'Table', 'SE-Table-001', '<p>The furniture of any establishment reflects the aesthetic taste of the owners. Classy furniture with elegance and superlative design adds an aura to business and gives character to home. Samrudh Exports being a leading manufacturing and exporting house of exquisite iron &amp; wooden furniture, gifts, decorative items and home textile products is synonymous with superior quality, rich innovation and opulence. Creativity and continuous innovation drives Samrudh Exports. Our Company pioneered in innovating new concepts &amp; designs in Industrial Furniture, Recycled Furniture, Upholstered Furniture etc. and it has been well received by our clients. Company&rsquo;s customer centric approach, a vast array of products, supreme artwork and above all, an ability to imbue the traditional handicraft with the contemporary style ; all these factors have contributed in the Samrudh Exports rising to the top of the ladder in the industry.</p>', 8, 'table', 0, '2014-10-11 16:51:00', 1);

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
